<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Mobile\MobileRepositoryContract;
use App\Repositories\Worksheet\WorksheetRepositoryContract;
use DB;
use Storage;
use App\Models\WorkSheet;


class MobileController extends Controller
{

    private $sizeOrderList = [
        'L4','L5','L6','L7','L8','L9','L10','L11','L12','L13','L14','L15','L16',
        '34','35','36','37','38','39','40','41','42','43','44','45','46',
        'XS','S','M','L','XL',
        '4\5','6\7','8\9','10\11','12\13','1\2'];
    protected $mobileRepo;
    protected $worksheetRepo;

    public function __construct(
        MobileRepositoryContract $mobileRepo,
        WorksheetRepositoryContract $worksheetRepo)
    {
        $this->mobileRepo = $mobileRepo;
        $this->worksheetRepo = $worksheetRepo;
    }

    public function index()
    {
        /*
        $agent = new Agent();
        if ($agent->isDesktop()) {
            return redirect('/');
        }
        */
        return view('mobile.index');
    }
    public function agentIndex(Request $request)
    {
        if (!$request->session()->has('agentChannelID'))
        {
            return redirect('mobile/agentlogin');
            //return view('mobile.agentlogin');
        }
        return view('mobile.agentindex');
    }
    public function agentLogin()
    {
        return view('mobile.agentlogin');
    }
    public function agentLoginCheck(Request $request)
    {
        $this->validate($request,[
            'channelID'=>'required',
            'password'=>'required',
        ]);
        if (!$this->mobileRepo->agentAuth($request->channelID,$request->password))
        {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', '渠道编号或密码错误');
            return view('mobile.agentlogin');
        }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', '欢迎你，'.$request->channelID);
        $request->session()->put('agentChannelID',$request->channelID);
        return redirect()->route('mobile.agentindex');
    }
    public function agentLogout(Request $request)
    {
        $request->session()->forget('agentChannelID');
        return redirect()->route('mobile.index');
    }
    public function agentChangePassword(Request $request)
    {
        $this->validate($request,[
            'password'=>'required',
        ]);
        if (!$request->session()->has('agentChannelID'))
        {
            return response()->json(['error' => '请先登录'], 404);
        }
        $channelID = $request->session()->get('agentChannelID');
        $this->mobileRepo->agentChangePassword($channelID,$request->password);
        return "密码修改成功";

    }
    public function getProducts(Request $request)
    {
        if (empty($request->term) && empty($request->query))
        {
            return response()->json(['error' => 'Parameter term missing'], 404);
        }

        if($request->has('term'))
            $qryStr = "%".$request->term."%";
        if($request->has('query'))
            $qryStr = "%".$request->input('query')."%";


        $goods = DB::table('products')
            ->select('goodsno', 'goodsname')
            ->where( 'goodsno','like', $qryStr )
            ->orWhere( 'goodsname','like', $qryStr )
            ->distinct()
            ->get();
        $goodslist = $goods->map(function($item, $key) {
            return $item->goodsno.'-'.$item->goodsname;
        });
        return $goodslist->all();
    }
    public function getColors(Request $request)
    {
        if(empty($goodsno = $request->goodsno))
            return [];
        $colors = DB::table('products')
            ->select('colorcode','colordesc')
            ->where('goodsno','=',$goodsno)
            ->orderBy('colorcode')
            ->distinct()
            ->get();
        return $colors->all();
    }
    public function getSizes(Request $request)
    {

        if(empty($goodsno = $request->goodsno))
            return [];
        if(empty($colorcode = $request->colorcode))
            return [];
        $sizes = DB::table('products')
            ->select('sku','sizedesc')
            ->where('goodsno','=',$goodsno)
            ->where('colorcode','=',$colorcode)
            ->distinct()
            ->get();
        $sizesArray = $sizes->all();

        usort($sizesArray, function($a,$b) {
            $posi_a = array_search($a->sizedesc, $this->sizeOrderList);
            $posi_b = array_search($b->sizedesc, $this->sizeOrderList);
            return $posi_a - $posi_b;
        });
        return $sizesArray;
    }

    public function applyWorksheet(Request $request)
    {
        $this->validate($request,[
            'clientName'=>'required',
            'clientMobile'=>'required',
        ]);

        if (!$request->session()->has('agentChannelID'))
        {
            return response()->json(['error' => '请先登录'], 404);
        }

        $request->merge(['channelID'=>$request->session()->get('agentChannelID')]);
        $request->merge(['sku'=>$request->size]);

        $sheetCode = $this->mobileRepo->applyWorksheet($request);

        return $sheetCode;
    }

    public function worksheetClientConfirm(Request $request)
    {
        return view('mobile.clientconfirm')
            ->with([
                'clientMobile' => $request->clientMobile,
                'sheetCode' => $request->sheetCode,
            ]);
    }
    public function  worksheetUploadIndex(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
            'clientMobile'=>'required',
        ]);

        $worksheet = WorkSheet::where('sheetCode',$request->sheetCode)
            ->where('clientMobile',$request->clientMobile)
            ->get()->first();
        if (is_null($worksheet)) {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', '工单号或手机号错误，请重新输入');
            return redirect()->back();
        }
        return view('mobile.sheetupload',[
            'sheetCode'=>$worksheet->sheetCode,
            'clientName'=>$worksheet->clientName,
            'clientMobile'=>$worksheet->clientMobile,
        ]);

    }
    public function imageUpload(Request $request)
    {
        $this->validate($request, [
            'sheetCode' => 'required',
            'imagetype' => 'required',
            'base64img' => 'required',
        ]);

        $base64_image_content = $request->base64img;


        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
            $image_type = $result[2]; //data:image/jpeg;base64,
            $image_binary = base64_decode(str_replace($result[1], '', $base64_image_content));
            $path = 'public/'.$request->sheetCode.'_'.$request->imagetype.'.'.$image_type;
            Storage::put($path, $image_binary);
            $worksheet = WorkSheet::where('sheetCode',$request->sheetCode)
                            ->get()->first();
            $fieldname = 'pic'.ucfirst($request->imagetype);
            $worksheet->$fieldname = $path;
            $worksheet->save();
            return $path;
        }
    }
    public function worksheetUpload(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
            'issueDesc'=>'required',
            'clientReceiverName'=>'required',
            'clientReceiverMobile'=>'required',
            'clientAddress1'=>'required',
            'clientAddressCity'=>'required',
            'clientAddressProvince'=>'required',

        ]);

        try {
            $this->mobileRepo->uploadWorkSheet($request);
            return "upload successfully";
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }

    }
    public function worksheetEnqIndex(Request $requst)
    {
        return view('mobile.sheetenquiry');
    }
    public function getWorksheetList(Request $request)
    {
        if (!$request->session()->has('agentChannelID')) { //client
            if($request->has('sheetCode'))
                $sheetCode = $request->sheetCode;
            else
                $sheetCode = "";
            if($request->has('clientMobile'))
                $clientMobile = $request->clientMobile;
            else
                $clientMobile = "";
            $channelID = "%";
        } else { //agent
            if($request->has('sheetCode'))
                $sheetCode = "%".$request->sheetCode."%";
            else
                $sheetCode = "%";
            if($request->has('clientMobile'))
                $clientMobile = "%".$request->clientMobile."%";
            else
                $clientMobile = "%";
            $channelID = $request->session()->get('agentChannelID');
        }
        $sheetlist = DB::table('work_sheet')
            ->select('sheetCode','clientName','clientMobile','serviceType','processPhase')
            ->where(function ($query) use($sheetCode,$clientMobile,$channelID) {
                $query->where([
                    ['sheetCode','like', $sheetCode],
                    ['channelID', 'like', $channelID]
                ]);
            })->orWhere(function ($query) use($sheetCode,$clientMobile,$channelID) {
                $query->where([
                    ['clientMobile','like', $clientMobile],
                    ['channelID', 'like', $channelID]
                ]);
            })->get();
        $sheetlist = $sheetlist->map(function($item,$key){
            $item->serviceTypeName = config('warranty.serviceTypeName.'.$item->serviceType);
            $item->processPhaseName = config('warranty.processPhaseName.'.$item->processPhase);
            return $item;
        });
        return $sheetlist;
    }
    public function getWorksheetDetails(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
        ]);

        $worksheet = $this->worksheetRepo->getWorksheetDetails($request->sheetCode);

        return $worksheet;

    }
    public function uploadPostrecord(Request $request)
    {
        $this->validate($request,[
            'sheetCode'=>'required',
            'carrierName'=>'required',
            'trackNumber'=>'required',
        ]);

        try {
            $this->mobileRepo->uploadPostrecord($request);
            return "upload successfully";
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
