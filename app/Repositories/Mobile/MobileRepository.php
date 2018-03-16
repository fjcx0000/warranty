<?php
/**
 * Created by PhpStorm.
 * User: think
 * Date: 30/01/2018
 * Time: 11:15 PM
 */

namespace App\Repositories\Mobile;

use App\Models\Channel;
use App\Models\WorksheetSeqno;
use App\Models\WorkSheet;
use App\Models\WorkLog;
use App\Models\Product;
use DB;


class MobileRepository implements MobileRepositoryContract
{
    public function agentAuth($channelID, $password)
    {
        $channel = Channel::find($channelID);
        if(is_null($channel) || $channel->authCode != $password)
            return false;
        else
            return true;
    }

    public function agentChangePassword($channelID, $password)
    {
        $channel = Channel::find($channelID);
        $channel->authCode = $password;
        $channel->save();
    }

    public function applyWorkSheet($request)
    {
        $worksheet = new WorkSheet();
        $seqno = sprintf('%06d', $this->getSequence());
        $worksheet->sheetCode = 'E'.$seqno;
        $worksheet->clientName = $request->clientName;
        $worksheet->clientMobile = $request->clientMobile;
        $worksheet->channelID = $request->channelID;
        $worksheet->issueCode = $request->issueCode;
        if ($request->channelServiceReq) {
            $worksheet->channelServiceReq = $request->channelServiceReq;
        }
        if ($request->sku) {
            $product = Product::find($request->sku);
            $worksheet->sku = $request->sku;
            $worksheet->goodsno = $product->goodsno;
            $worksheet->goodsname = $product->goodsname;
            $worksheet->colordesc = $product->colordesc;
            $worksheet->sizedesc = $product->sizedesc;
        }
        $worksheet->status = 0; //开启
        $worksheet->processPhase = 'init'; //工单创建初始阶段

        $worksheet->save();

        $worklog = new WorkLog();
        $worklog->sheetID = $worksheet->id;
        $worklog->remark = "工单申请成功,代理商建议是".$worksheet->channelServiceReq;
        $worklog->processPhase = $worksheet->processPhase;
        $worklog->save();

        return $worksheet->sheetCode;
    }

    public function uploadWorkSheet($request)
    {
        $worksheet = WorkSheet::where('sheetCode',$request->sheetCode)
            ->get()->first();
        if ($worksheet->processPhase != 'init' && $worksheet->processPhase != 'auth') //工单已审核，不能再上传信息
            throw new \Exception("工单已审核，不能再上传信息");

        $worksheet->clientReceiverName = $request->clientReceiverName;
        $worksheet->clientReceiverMobile = $request->clientReceiverMobile;
        $worksheet->clientAddress1 = $request->clientAddress1;
        $worksheet->clientAddress2 = $request->has('clientAddress2') ? $request->clientAddress2 : '';
        $worksheet->clientAddressTown = $request->has('clientAddressTown') ? $request->clientAddressTown : '';
        $worksheet->clientAddressCity = $request->clientAddressCity;
        $worksheet->clientAddressProvince = $request->clientAddressProvince;
        $worksheet->issueDesc = $request->issueDesc;
        $worksheet->processPhase = 'auth';
        $worksheet->save();

        $worklog = new WorkLog();
        $worklog->sheetID = $worksheet->id;
        $worklog->remark = "图片和客户地址信息上传成功，客户问题描述是：".$worksheet->issueDesc;
        $worklog->processPhase = $worksheet->processPhase;
        $worklog->save();
    }

    private function getSequence()
    {
       $sequences = DB::table('worksheet_seqno')
                        ->select('seqno')
                        ->get()->first();
       $seqno = $sequences->seqno + 1;
       DB::table('worksheet_seqno')->update(['seqno'=>$seqno]);
       return $seqno;
    }

}