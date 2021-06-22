<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\General;
use DB;
use Auth;
use Carbon\Carbon;
use App\Role;
use App\Global_var;
use App\user;
use App\sent_sms_message;
use DateTime;
use Andegna;
use Session;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $paginationSize;
    
    public function __construct()
    {
        $this->middleware('auth:web', ['except'=>['getLiveCount', 'showWelcomePage']]);
     
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
public function testCamera(Request $request)
{
     $uploaded=Global_var::base64ToImage($request);
     if($uploaded)
        return "success";
    else
        return "Error occured";
}

/*---NEW---*/
public function search_menus(Request $request, $key=''){
    $key=str_replace(" ", "_", $key); 
    $resources=Resource::where('routeName', 'like', '%' . $key . '%')->orWhere('entityName', 'like', '%' . $key . '%')->get();

    if($request->ajax())
        return view('dashboards.ajax.search_menus')->with("searched_resources", $resources);
    return redirect()->route('home');
    }

public function approvals_intro(Request $request){
    if($request->ajax())
        return view('users.ajax.approvals_intro');
    return view('users.http.approvals_intro');
    }
public function upload_video(Request $request){ 
             $data=$request->all();
              $rules=[
                'video'          =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'];
             $validator = Validator($data,$rules);

             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{
                        $video=$data['video'];
                        $input = time().$video->getClientOriginalExtension();
                        $destinationPath = 'uploads/videos';
                        $video->move($destinationPath, $input);

                            $user['video']       =$input;
                            $user['created_at']  =date('Y-m-d h:i:s');
                            $user['updated_at']  =date('Y-m-d h:i:s');
                            $user['user_id']     =session('user_id');
                            DB::table('user_videos')->insert($user);
                            return redirect()->back()->with('upload_success','upload_success');
                    }
}
 public function upload(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = storage_path().'/app/public/uploads/';
            return $file->move($path, $filename);
        }

    }
public function generateDocx()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();


        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";


        $section->addImage("http://itsolutionstuff.com/frontTheme/images/logo.png");
        $section->addText($description);


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('/app/public/new_dir/helloWorld22.docx'));
        } catch (Exception $e) {
        }


        return response()->download(storage_path('/app/public/new_dir/helloWorld22.docx'));
    }
/*---END OF NEW---*/



    public function generateReportByDateInterval(Request $request){
        $startDate=$request->startDate;
        $endDate=$request->endDate;
        $nextUrl=$request->nextUrl;
        $category=$request->category;
        /*if($startDate>$endDate)
            return ['error', 'Negative_Date_Interval'];*/
        Session::put("startDate", $startDate);
        Session::put("endDate", $endDate);
        Session::put("category", $category);

        /*echo $startDate." ".$endDate."<br>";
        echo "<br>From Session<br>";
        echo Session::get('startDate')." ".Session::get('endDate')."<br>";
        dd($nextUrl);*/
        return redirect($nextUrl);
    }

    public function showWelcomePage(Request $request){
	
        /*to authenticate*/
        //return redirect("/login");
        return redirect()->route("public_login");
        //return redirect()->route('documents.playlist');
    }   

    public function manageMore(Request $request){
        $roleId=Auth::guard('web')->user()!=null? (Auth::guard('web')->user()->role!=null? Auth::guard('web')->user()->role->id: 0): 0;
        $role=Role::find($roleId);
         $resources=$role->resources_menuLevel_2;
        if($request->ajax())
        return view('resources.ajax.manageMore')->withResources($resources);
        
        return view('resources.http.manageMore')->withResources($resources);
    }

    public function system_metadata(Request $request){
        if($request->ajax())
        return view('sub_menu_pages.ajax.system_metadata');
        
        return view('sub_menu_pages.http.system_metadata');
    }
    public function address_structure(Request $request){
        if($request->ajax())
        return view('sub_menu_pages.ajax.address_structure');
        
        return view('sub_menu_pages.http.address_structure');
    }

    public function manageMore_3rdLevel(Request $request){
        $roleId=Auth::guard('web')->user()!=null? (Auth::guard('web')->user()->role!=null? Auth::guard('web')->user()->role->id: 0): 0;
        $role=Role::find($roleId);
         $resources=$role->resources_menuLevel_3;
        if($request->ajax())
        return view('resources.ajax.manageMore')->withResources($resources);
        
        return view('resources.http.manageMore')->withResources($resources);
    }

    public function dashboardData()
    {

        $data=array(
                    'ksiMezgeb' => [],//$ksiMezgeb, 
                    'ksiMezgebClosed' => [],//$ksiMezgebClosed, 
                    'ksiMezgebAppeal' => [],//$ksiMezgebAppeal, 
                    'ksiMezgebNotDecided' => [],//$ksiMezgebNotDecided,

                    'ksiZtemesretelom' => [],//$ksiZtemesretelom,
                    'bezhiAkabiHgiZretalu' => [],//$bezhiAkabiHgiZretalu,
                    'bezhiBAkabiHgiZtedegefu' => [],//$bezhiBAkabiHgiZtedegefu,
                    'bezhiAkabiHgiZretalomYgbeaniMezagbti' => [],//$bezhiAkabiHgiZretalomYgbeaniMezagbti,
                    'bezhiKebedtiMezagbti' => [],//$bezhiKebedtiMezagbti,
                    'bezhiKttlZtegeberelomKebedtiMezagbti' => [],//$bezhiKttlZtegeberelomKebedtiMezagbti,


                    'ftabherMezgeb' => [],//$ftabherMezgeb, 
                    'ftabherMezgebClosed' => [],//$ftabherMezgebClosed, 
                    'ftabherMezgebAppeal' => [],//$ftabherMezgebAppeal, 
                    'ftabherMezgebNotDecided' => [],//$ftabherMezgebNotDecided,
   
                    'ftabher_ksiZtemesretelom' => [],//$ftabher_ksiZtemesretelom,
                    'ftabher_bezhiAkabiHgiZretalu' => [],//$ftabher_bezhiAkabiHgiZretalu,
                    'ftabher_bezhiBAkabiHgiZtedegefu' => [],//$ftabher_bezhiBAkabiHgiZtedegefu,
                    'ftabher_bezhiAkabiHgiZretalomYgbeaniMezagbti' => [],//$ftabher_bezhiAkabiHgiZretalomYgbeaniMezagbti,
                     );

    return $data;
    }

    public function productLocationPricesPrint(Request $request, $locationId=0, $productTypeId=0){
    $rounds=\App\round::where('isDeleted', 'false')/*->orderBy("id", "desc")*/->get();
    $product_types=\App\product_type::where('isDeleted', 'false');
    if($productTypeId!=0)
      $product_types=$product_types->where('id', $productTypeId);
    $product_types=$product_types->get();

    $locations=\App\location::where('isDeleted', 'false');
    if($locationId!=0)
      $locations=$locations->where('id', $locationId);
    $locations=$locations->get();

    $product_location_price_data=array();
foreach($product_types as $product_type){
      $productRoundPrice=0;
    foreach($locations as $location){ 
        foreach($rounds as $round){ 
          $productRoundPrice+=\App\location_product_price::productLocationPrice($product_type->id, $location->id, $round->id);
            }
    $row=[$product_type->name, $location->name, round($productRoundPrice/count($locations), 2).' Birr'];
    array_push($product_location_price_data, $row);
    }
    }
    //dd($product_location_price_data);

    if($request->ajax())
        return view('excel.ajax.productLocationPricesPrintable')->with('product_location_price_data', $product_location_price_data)
                ->with('productTypeId',$productTypeId)
                ->with('locationId',$locationId);
       return view('excel.http.productLocationPricesPrintable')->with('product_location_price_data', $product_location_price_data)
                ->with('productTypeId',$productTypeId)
                ->with('locationId',$locationId);
    }

    public function index(Request $request)
    {
       $is_search_request=$request->is_search_request;
       $productTypeId=$request->productTypeId;
       $locationId=$request->locationId;

        $dashboardData = $this->dashboardData(); 
         $product_types=\App\product_type::where('isDeleted', 'false');///*->orderBy("id", "desc")*/->get();
	if($productTypeId!=null)
	  $product_types=$product_types->where('id', $productTypeId);
	$product_types=$product_types->get();

         $locations=\App\location::where('isDeleted', 'false');///*->orderBy("id", "desc")*/->get();
	if($locationId!=null)
	  $locations=$locations->where('id', $locationId);
	$locations=$locations->get();

         $rounds=\App\round::where('isDeleted', 'false')/*->orderBy("id", "desc")*/->get();
        $recipient_categories=\App\recipient_category::where('isDeleted', 'false')/*->orderBy("id", "desc")*/->get();
       $recipients=\App\recipient::where('isDeleted', 'false')/*->orderBy("id", "desc")*/->get();
       $sent_messages=\App\sent_sms_message::all();//orderBy("id", "desc")->get();
	//this causes a halt when moden is not inserted
	$received_messages=[];//\App\Global_var::readSMS();
 

     \App\Global_var::logAction($request, 'Visited Dashboard');

	if($is_search_request)
            return view('dashboards.ajax.home-partial')
                ->with('dashboardData',$dashboardData)
                ->with('product_types',$product_types)
                ->with('rounds',$rounds)
                ->with('locations',$locations)
                ->with('recipient_categories',$recipient_categories)
                ->with('recipients',$recipients)
                ->with('sent_messages',$sent_messages)
                ->with('received_messages',$received_messages)
                ->with('productTypeId',$productTypeId)
                ->with('locationId',$locationId);

       if($request->ajax())
        return view('dashboards.ajax.home')
                ->with('dashboardData',$dashboardData)
                ->with('product_types',$product_types)
                ->with('rounds',$rounds)
                ->with('locations',$locations)
                ->with('recipient_categories',$recipient_categories)
                ->with('recipients',$recipients)
                ->with('sent_messages',$sent_messages)
                ->with('received_messages',$received_messages)
                ->with('productTypeId',$productTypeId)
                ->with('locationId',$locationId);;

        return view('dashboards.http.home')
                ->with('dashboardData',$dashboardData)
                ->with('product_types',$product_types)
                ->with('rounds',$rounds)
                ->with('locations',$locations)
                ->with('recipient_categories',$recipient_categories)
                ->with('recipients',$recipients)
                ->with('sent_messages',$sent_messages)
                ->with('received_messages',$received_messages)
                ->with('productTypeId',$productTypeId)
                ->with('locationId',$locationId);;
    }


public function getLiveCount(){
$currentUser=Auth::guard('web')->user();

/*$oilNeededVehicles=\App\Global_var::oilNeededVehicles();
$serviceNeededVehicles=\App\Global_var::serviceNeededVehicles();
$idCardExpiredToffegas=\App\Global_var::idCardExpiredToffegas();
$driverLicenseExpiredToffegas=\App\Global_var::driverLicenseExpiredToffegas();*/

   $dashboardData=$this->dashboardData();
    $data = array(
        'oilNeededVehiclesCount' => 0,//count($oilNeededVehicles),
        'serviceNeededVehiclesCount' => 0,//count($serviceNeededVehicles),
        'idCardExpiredToffegasCount' => 0,//count($idCardExpiredToffegas),
        'driverLicenseExpiredToffegasCount' => 0,//count($driverLicenseExpiredToffegas),
        );
    return $data;
}

}
