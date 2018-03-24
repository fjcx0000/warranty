<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Worksheet\WorksheetRepositoryContract;
use Datatables;
use App\Models\WorkSheet;
use App\Models\Carrier;
use App\Models\Supplier;
use Carbon;

class WorksheetController extends Controller
{
    private $worksheetRepo;
    public function __construct(WorksheetRepositoryContract $worksheetRepo)
    {
        $this->worksheetRepo = $worksheetRepo;
    }
    public function worksheetIndex(Request $request)
    {
        if ($request->has('processPhase'))
            $processPhase = $request->processPhase;
        else
            $processPhase = 'NOENQ';
        return view('worksheet.list')->with('processPhase',$processPhase);
    }
    public function getWorksheets(Request $request)
    {
        $this->validate($request,[
            'processPhase'=>'required',
        ]);

        if ($request->processPhase == 'NOENQ') {
            return Datatables::of(collect([]))->make(true);
        }
        if($request->has('sheetCode'))
            $sheetCode = '%'.$request->sheetCode.'%';
        else
            $sheetCode = '%';
        if($request->has('clientMobile'))
            $clientMobile = '%'.$request->clientMobile.'%';
        else
            $clientMobile = '%';
        if($request->has('channelID'))
            $channelID = $request->channelID;
        else
            $channelID = '%';
        if($request->has('goodsno'))
            $goodsno = $request->goodsno;
        else
            $goodsno = '%';
        if($request->has('startDate'))
            $startDate = $request->startDate." 00:00:00";
        else
            $startDate = '2018-01-01 00:00:00';
        if($request->has('endDate'))
            $endDate = $request->endDate." 23:59:59";
        else
            $endDate = Carbon::now()->toDateString()." 23:59:59";
        if($request->processPhase == 'All')
            $processPhase = '%';
        else
            $processPhase = $request->processPhase;

        $worksheets = WorkSheet::where([
            ['sheetCode','like', $sheetCode],
            ['clientMobile','like', $clientMobile],
            ['channelID','like', $channelID],
            ['goodsno','like', $goodsno],
            ['created_at','>=', Carbon::parse($startDate)],
            ['created_at','<=', Carbon::parse($endDate)],
            ['processPhase','like', $processPhase]
        ])->get();

        return Datatables::of($worksheets)
            ->addColumn('operations', function ($worksheet) {
                if ($worksheet->status == 1)
                    return '<button class="btn btn-xs btn-info btnWorksheetDetail" data-id="'.$worksheet->sheetCode.'"><span class="glyphicon glyphicon-log-in"></span> 查看</button>';
                else if($worksheet->status == 2)
                    return '<button class="btn btn-xs btn-danger btnWorksheetDetail" data-id="'.$worksheet->sheetCode.'"><span class="glyphicon glyphicon-log-in"></span> 查看</button>';
                else
                    return '<button class="btn btn-xs btn-primary btnWorksheetDetail" data-id="'.$worksheet->sheetCode.'"><span class="glyphicon glyphicon-log-in"></span> 处理</button>'
                        .'<button class="btn btn-xs btn-success btnWorksheetPrint" data-id="'.$worksheet->sheetCode.'"><span class="glyphicon glyphicon-print"></span> 打印</button>';
            })
            ->editColumn('serviceType', function($worksheet) {
                return config('warranty.serviceTypeName.'.$worksheet->serviceType);
            })
            ->editColumn('processPhase', function($worksheet) {
                return config('warranty.processPhaseName.'.$worksheet->processPhase);
            })
            ->make(true);
    }
    public function getWorksheetDetails(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
        ]);

        $worksheet = $this->worksheetRepo->getWorksheetDetails($request->sheetCode);

        return $worksheet;
    }
    public function getCarriers(Request $request)
    {
        return Carrier::all();
    }
    public function getSuppliers(Request $request)
    {
        return Supplier::all();
    }
    public function processAuth(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
            'sku'=>'required',
            'serviceType'=>'required',
        ]);

        return $this->worksheetRepo->processAuth($request);
    }
    public function processWaitshoes(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
            'sku'=>'required',
            'serviceType'=>'required',
        ]);

        return $this->worksheetRepo->processWaitshoes($request);
    }
    public function processRepair(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
            'repairResult'=>'required',
        ]);

        return $this->worksheetRepo->processRepair($request);
    }
    public function processSendback(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
            'carrierID'=>'required',
            'trackNumber'=>'required',
            'fee'=>'required',
        ]);

        return $this->worksheetRepo->processSendback($request);
    }
    public function changeStatus(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
            'status'=>'required',
        ]);

        return $this->worksheetRepo->changeStatus($request);

    }

}
