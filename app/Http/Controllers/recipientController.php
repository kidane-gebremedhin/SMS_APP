<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recipient;
use App\recipient_category;
use Auth;
use DB;
use Session;
use Excel;

class recipientController extends Controller
{
    public $paginationSize;

    public function __construct(){
        $this->middleware('auth:web');
    
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       
       $recipients=recipient::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("recipients.ajax.index")->with('recipients', $recipients);

       return view("recipients.http.index")->with('recipients', $recipients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
    
        $recipient_categories=recipient_category::where('isDeleted', 'false')->orderBy("id", "desc")->get();

	if($request->ajax())
	    return view('recipients.ajax.create')->with('recipient_categories', $recipient_categories);

	    return view('recipients.http.create')->with('recipient_categories', $recipient_categories);
    }


    /**
     * Stock a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
	    'categoryId'=>'required',
            'fullName'=>'required',
            'phoneNumber'=>'required',
            ]);

        $recipient=recipient::where('categoryId', '=', $request->categoryId)->where('fullName', '=', $request->fullName)->where('phoneNumber', '=', $request->phoneNumber)->first();
        if($recipient!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $recipient=new recipient;
        $recipient->categoryId=$request->categoryId;
        $recipient->fullName=$request->fullName;
        $recipient->phoneNumber=$request->phoneNumber;
        $recipient->remark=$request->remark;
        $recipient->createdByUserId=Auth::guard('web')->user()->id;
        $recipient->save();
        return redirect()->route("recipients.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $recipient=recipient::find($id);
        if($request->ajax())
            return view("recipients.ajax.show")->with('recipient', $recipient);
        return view("recipients.http.show")->with('recipient', $recipient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$recipient=recipient::find($id);      
        $recipient_categories=recipient_category::where('isDeleted', 'false')->orderBy("id", "desc")->get();

	if($request->ajax())
	    return view('recipients.ajax.edit')->with('recipient', $recipient)->with('recipient_categories', $recipient_categories);

	    return view('recipients.http.edit')->with('recipient', $recipient)->with('recipient_categories', $recipient_categories);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipient=recipient::where('categoryId', '=', $request->categoryId)->where('fullName', '=', $request->fullName)->where('phoneNumber', '=', $request->phoneNumber)->first();
        if($recipient!=null && $recipient->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
	    'categoryId'=>'required',
            'fullName'=>'required',
            'phoneNumber'=>'required',
            ]);

        $recipient=recipient::find($id);
        $recipient->categoryId=$request->categoryId;
        $recipient->fullName=$request->fullName;
        $recipient->phoneNumber=$request->phoneNumber;
        $recipient->remark=$request->remark;
        $recipient->createdByUserId=Auth::guard('web')->user()->id;
        $recipient->save();

        return redirect()->route("recipients.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $recipient=recipient::find($id);
       if($request->ajax())
        return view('recipients.ajax.delete-confirm')->with('recipient', $recipient);
        
        return view('recipients.http.delete-confirm')->with('recipient', $recipient);
    }
 	public function destroy($id, Request $request)
    {
        $recipient=recipient::find($id);
        $recipient->delete();

        return redirect()->route('recipients.index');
    }


public function importRecipientsFromExcel(Request $request)
    {
    if($request->hasFile('recipients')){
        $path = $request->file('recipients')->getRealPath();
        $data = Excel::load($path)->get();
        //dd($data);
        $count=0;
    if($data->count()){
    Session::put('showProgress', true);
     foreach ($data as $key => $value) {
        Session::put('progressEndPoint', Session::get('progressEndPoint')+count($value));        
     }
    //language_string::where('id', '>', 0)->delete();
    foreach ($data as $key => $value) {
        $title=$value->getTitle();

    //TO SKIP THE 4 LINE HEADERS    
    /*for ($i=1; $i<count($value); $i++)*/ {
   // Session::put('progressCurrentLevel', $i-2);

$deactivationReason='';
$firstName=''; $lastName=''; $middleName=''; 

$fullName=trim($value['full_name']);
$phoneNumber=trim($value['phone_number']);
if(substr($phoneNumber, 0, 1)!=0)
    $phoneNumber="0".$phoneNumber;
$remark=trim($value['remark']);
$nameArr=explode(" ", $fullName);
if(count($nameArr)==0)
    continue;

if(count($nameArr)>0)
    $firstName=$nameArr[0];
if(count($nameArr)>1)
    $lastName=$nameArr[1];
if(count($nameArr)>2)
    $middleName=$nameArr[2];

//$gender=trim($value['gender'])=='ተባ' || trim($value['gender'])=='Male'? 'Male': 'Female';
$categoryName=trim($value['recipient_category']);
$category=recipient_category::where('name', $categoryName)->first();
if($category==null){
    //$deactivationReason=$deactivationReason.'Unkown Educational Level '.$value['recipient_category'].' | ';
    $category=new recipient_category;
    $category->name=$categoryName;
    $category->createdByUserId=Auth::guard('web')->user()->id;
    $category->save();
}
$categoryId=$category!=null? $category->id: 0;

    $recipient=new recipient;
    $recipient->categoryId=$categoryId;
    $recipient->fullName=$fullName;
    $recipient->phoneNumber=$phoneNumber;
    $recipient->remark=$remark;
    $recipient->createdByUserId=Auth::guard('web')->user()->id;
    $recipient->save();

        $count+=1;
    }
    }
    }
    }

    return redirect()->route("recipients.index");
    }
}
