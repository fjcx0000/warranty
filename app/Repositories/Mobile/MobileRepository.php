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
        $workSheet = new WorkSheet();
        $seqno = sprintf('%06d', $this->getSequence());
        $workSheet->sheetCode = 'E'.$seqno;
        $workSheet->clientName = $request->clientName;
        $workSheet->clientMobile = $request->clientMobile;
        $workSheet->channelID = $request->channelID;
        if ($request->channelServiceReq) {
            $workSheet->channelServiceReq = $request->channelServiceReq;
        }
        if ($request->sku) {
            $product = Product::find($request->sku);
            $workSheet->sku = $request->sku;
            $workSheet->goodsno = $product->goodsno;
            $workSheet->colordesc = $product->colordesc;
            $workSheet->sizedesc = $product->sizedesc;
        }
        $workSheet->status = 0; //开启
        $workSheet->processPhase = 'init'; //工单创建初始阶段

        $workSheet->save();

        return $workSheet->sheetCode;
    }

    public function uploadWorkSheet($request)
    {
        $worksheet = WorkSheet::where('sheetCode',$request->sheetCode)
            ->get()->first();
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