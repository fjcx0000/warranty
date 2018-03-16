<?php
/**
 * Created by PhpStorm.
 * User: think
 * Date: 11/02/2018
 * Time: 10:56 PM
 */

namespace App\Repositories\Worksheet;
use App\Models\WorkSheet;
use App\Models\Product;
use App\Models\WorkLog;
use App\Models\PostRecord;
use App\Models\Carrier;
use App\Models\NegotiationRecord;
use App\Models\RepairRecord;
use App\Models\ExchangeRecord;
use App\Models\RefundRecord;
use App\Models\ClientPayment;
use Storage;
use Carbon;
use Auth;


class WorksheetRepository implements WorksheetRepositoryContract
{
    public function getWorksheetDetails($sheetCode)
    {
        $worksheet = WorkSheet::where('sheetCode',$sheetCode)->get()->first();
        $worksheet->picWhole = Storage::url($worksheet->picWhole);
        $worksheet->picDamage = Storage::url($worksheet->picDamage);
        $worksheet->picBottom = Storage::url($worksheet->picBottom);

        $worksheet->serviceTypeName = config('warranty.serviceTypeName.'.$worksheet->serviceType);
        $worksheet->issueCodeName = config('warranty.issueCodeName.'.$worksheet->issueCode);

        return $worksheet;
    }

    public function processAuth($request)
    {
        $worksheet = WorkSheet::where('sheetcode', $request->sheetCode)->get()->first();

        $remark = "服务方式:".config('warranty.serviceTypeName.'.$request->serviceType)
            .'<br>备注信息'.$request->remark;
        $this->writeLog($worksheet,$remark);

        if ($worksheet->sku != $request->sku) {
            $product = Product::find($request->sku);
            $worksheet->sku = $request->sku;
            $worksheet->goodsno = $product->goodsno;
            $worksheet->goodsname = $product->goodsname;
            $worksheet->colordesc = $product->colordesc;
            $worksheet->sizedesc = $product->sizedesc;
        }
        $worksheet->serviceType = $request->serviceType;
        $worksheet->issueCode = $request->issueCode;

        if ($worksheet->serviceType != 'G') { //非协商，召回,登记post record
            if ($worksheet->issueCode == 'T001') {
                $clientpayment = new ClientPayment;
                $clientpayment->sheetID = $worksheet->id;
                $clientpayment->type = 'P';
                $clientpayment->method = $request->paymentMethod;
                $clientpayment->amount = $request->paymentAmount;
                $clientpayment->save();
            } else {
                $postrecord = new PostRecord;
                $postrecord->sheetID = $worksheet->id;
                $postrecord->type = 'R';
                $postrecord->carrierID = 0;
                $postrecord->carrierName = $request->carrierName;
                $postrecord->trackNumber = $request->trackNumber;
                $postrecord->fee = $request->fee;
                $postrecord->itemDesc = $worksheet->goodsno."-".$worksheet->goodsname."-".$worksheet->colordesc."-".$worksheet->sizedesc;
                $postrecord->save();
            }
            $worksheet->processPhase = 'waitshoes';
        } else {  //记录协商结果
            $negotiationrecord = new NegotiationRecord;
            $negotiationrecord->sheetID = $worksheet->id;
            $negotiationrecord->content = $request->content;
            $negotiationrecord->compensation = $request->compensation;
            $negotiationrecord->save();
            $worksheet->status = 1; //close
            $worksheet->processPhase = 'finish';
        }

        $worksheet->save();

        return "processed successfully";
    }

    public function processWaitshoes($request)
    {
        $worksheet = WorkSheet::where('sheetcode', $request->sheetCode)->get()->first();
        //记录日志
        $remark = "服务方式:".config('warranty.serviceTypeName.'.$request->serviceType)
            .'<br>备注信息'.$request->remark;
        if ($worksheet->serviceType == 'H') {  //换鞋
            $product = Product::find($request->newsku);
            $remark .= "<br> 更换为:".$product->goodsno."-".$product->goodsname."-".$product->colordesc."-".$product->sizedesc;
        }
        $this->writeLog($worksheet,$remark);

        if ($worksheet->sku != $request->sku) {
            $product = Product::find($request->sku);
            $worksheet->sku = $request->sku;
            $worksheet->goodsno = $product->goodsno;
            $worksheet->goodsname = $product->goodsname;
            $worksheet->colordesc = $product->colordesc;
            $worksheet->sizedesc = $product->sizedesc;
        }
        $worksheet->serviceType = $request->serviceType;
        $worksheet->supplierID = $request->supplierID;
        $worksheet->issueCode = $request->issueCode;

        if ($worksheet->serviceType == 'X') { //修鞋
            $repairrecord = new RepairRecord;
            $repairrecord->sheetID = $worksheet->id;
            $repairrecord->sendDate = Carbon::parse($request->sendDate);
            $repairrecord->expectDate = Carbon::parse($request->expectDate);
            $repairrecord->save();
            $worksheet->processPhase = 'repair';
        } elseif ($worksheet->serviceType == 'H') {  //换鞋
            $exchangerecord = new ExchangeRecord;
            $exchangerecord->sheetID = $worksheet->id;
            $exchangerecord->replace_sku = $request->newsku;
            $exchangerecord->restock_flag = (boolean)$request->restockFlag;
            $exchangerecord->erp_process_flag =  false; //未处理
            $exchangerecord->save();
            $worksheet->processPhase = 'sendback';
        } elseif ($worksheet->serviceType == 'T') {  //退货
            $refundrecord = new RefundRecord;
            $refundrecord->sheetID = $worksheet->id;
            $refundrecord->restock_flag = (boolean)$request->restockFlag;
            $refundrecord->erp_process_flag =  false; //未处理
            $refundrecord->account_process_flag =  false; //未处理
            $refundrecord->save();
            $worksheet->processPhase = 'refund';
        }

        $worksheet->save();

        return "processed successfully";
    }

    public function processRepair($request)
    {
        $worksheet = WorkSheet::where('sheetcode', $request->sheetCode)->get()->first();
        //记录日志


        $repairrecord = RepairRecord::where('sheetID',$worksheet->id)->get()->first();
        if ($request->repairResult == 'T') {
            $remark = "工厂维修结果:".config('warranty.repairResult.'.$request->repairResult).'-'.$request->remark;
            $this->writeLog($worksheet,$remark);
            $repairrecord->returnDate = Carbon::now();
            $worksheet->processPhase = 'sendback';
        } else {  //未修好
            $remark = "工厂维修结果:".config('warranty.repairResult.'.$request->repairResult).'-'.$request->remark
                ."; 维修提交日期:".$request->sendDate
                ."; 预期返回日期:".$request->expectDate;
            $this->writeLog($worksheet,$remark);

            $repairrecord->sendDate = Carbon::parse($request->sendDate);
            $repairrecord->expectDate = Carbon::parse($request->expectDate);
        }
        $repairrecord->save();
        $worksheet->save();
    }

    public function processSendback($request)
    {
        $worksheet = WorkSheet::where('sheetcode', $request->sheetCode)->get()->first();

        $postrecord = new PostRecord;
        $postrecord->sheetID = $worksheet->id;
        $postrecord->type = 'S';
        $postrecord->carrierID = $request->carrierID;
        $postrecord->carrierName = Carrier::find($request->carrierID)->name;
        $postrecord->trackNumber = $request->trackNumber;
        $postrecord->fee = $request->fee;
        if ($worksheet->serviceType == 'X') {
            $postrecord->itemDesc = $worksheet->goodsno."-".$worksheet->goodsname."-".$worksheet->colordesc."-".$worksheet->sizedesc;
        } else {
            $exchangerecord = ExchangeRecord::where('sheetID', $worksheet->id)->get()->first();
            $product = Product::find($exchangerecord->replace_sku);
            $postrecord->itemDesc = $product->goodsno."-".$product->goodsname."-".$product->colordesc."-".$product->sizedesc;
        }
        $postrecord->save();
        $remark = "快递公司:".Carrier::find($request->carrierID)->name."; 快递单号:".$request->trackNumber
            ."; 快递费用:".$request->fee."<br>寄回物品:".$postrecord->itemDesc
            ."<br>工单处理结束.";
        $this->writeLog($worksheet,$remark);
        $worksheet->processPhase = 'finish';
        $worksheet->status = 1;
        $worksheet->save();

    }

    public function getWorksheetPhaseCount($processPhase)
    {
        return WorkSheet::where('processPhase', $processPhase)->count();
    }

    private function writeLog($worksheet,$remark)
    {
        //记录日志
        $worklog = new WorkLog;
        $worklog->sheetID = $worksheet->id;
        $worklog->remark = $remark;
        $worklog->processPhase = $worksheet->processPhase;
        $worklog->userID = Auth::id();
        $worklog->save();
    }
}