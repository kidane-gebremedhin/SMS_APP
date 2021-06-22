<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subject;
use App\sent_sms_message;
use App\recipient_category;
use App\recipient;
use App\Date_class;
use App\location_product_price;
use App\product_type;
use App\location;
use App\round;
use App\Logo;
use Auth;
use DB;

use App\Jobs\SendSMS;
class smsController extends Controller
{
    public $paginationSize;

    public function __construct(){
        $this->middleware('auth:web');
    
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        

    }
   
    public function sentBulkSMSMessages(Request $request){

       $messages=sent_sms_message::orderBy("id", "desc")->paginate($this->paginationSize);

	if($request->ajax())
	        return view('sms_messages.ajax.sent_bulk_sms_messages')->with('messages', $messages);
        return view('sms_messages.http.sent_bulk_sms_messages')->with('messages', $messages);
    }
	
	
    public function sendBulkSMSForm(Request $request){
	$round=round::find($request->roundId);
	$message="";
if($round!=null){
	$logo=Logo::first();
	$message=$logo!=null? $logo->logoText: "ዶት ሓበሬታ ዕዳጋ";

	$product_types=product_type::where('isDeleted', 'false')->orderBy("id", "desc")->get();
	$locations=location::where('isDeleted', 'false')->orderBy("id", "desc")->get();
	foreach($product_types as $product_type){
		$message=$message."\n\n".$product_type->name;
		foreach($locations as $location){
			$location_product_price=location_product_price::where('roundId', $round->id)->where('productId', $product_type->id)->where('locationId', $location->id)->first();
			
			if($location_product_price==null)
				continue;
			$measurmentType = \App\location_product_price::productLocationMeasurmentType($product_type->id, $location->id, $round->id);
			$message=$message."\n".$location->name.": ".$location_product_price->price." ብር/".($measurmentType!=null? $measurmentType->name: '');
		}	
	}
}

	$recipient_categories=recipient_category::where('isDeleted', 'false')->orderBy("id", "desc");
	$rounds=round::where('isDeleted', 'false')->orderBy("id", "desc");

	if($request->ajax())
	        return view('sms_messages.ajax.send_bulk_sms_message')->with('recipient_categories', $recipient_categories)->with('message', $message)->with('rounds', $rounds)->with('round', $round);
        return view('sms_messages.http.send_bulk_sms_message')->with('recipient_categories', $recipient_categories)->with('message', $message)->with('rounds', $rounds)->with('round', $round);
    }
    public function sendBulkSMS(Request $request){
//	ini_set('max_execution_time', 0);

	$sendToAllCategories=$request->sendToAllCategories;
	$message=$request->message;
	$message='Date: '.(new Date_class)->getCurrentDate()."\n".$message;
	
	$counter=0;

	$categoryIds=$request->categoryIds;
	if($sendToAllCategories=="on"){
		$categoryIds=recipient_category::where('isDeleted', 'false')->get()->pluck('id');
	}
	else if($categoryIds==null){
	   $errMessage="No_Recipients_Selected";
	   if($request->ajax())
                return ['error', $errMessage]; 
	    \Session::flash('danger', $errMessage);
            return back();
	}
	 
//change to shell directory
$old_path = getcwd();
$shell_path = storage_path().'/shell_scripts';
chdir($shell_path);

	$recipientPhoneNumbers=[];
	foreach($categoryIds as $categoryId){
		$recipients=recipient::where('isDeleted', 'false')->where('categoryId', $categoryId)->get();
		foreach($recipients as $recipient){
			$number=$recipient->phoneNumber;
			array_push($recipientPhoneNumbers, $number);
			/*
			//send sms 
			$output = shell_exec('./send_sms.sh "'.$number.'" "'.$message.'"');
			usleep(200*1000);//0.2 seconds
			*/
			
			//dispatch(new SendSMS($number, $message));

			if(true){
			   $counter++;
			   $sent_sms_message=new sent_sms_message;
			   $sent_sms_message->categoryId=$categoryId;
			   $sent_sms_message->recipientId=$recipient->id;
			   $sent_sms_message->message=$message;
			   $sent_sms_message->date=(new Date_class)->getCurrentDate();
        		   $sent_sms_message->createdByUserId=Auth::guard('web')->user()->id;
			   $sent_sms_message->save();
			}
		}

	}
	
	dispatch(new SendSMS($recipientPhoneNumbers, $message));
//	sleep(15*120);
//	dd('end');

//return to old path
chdir($old_path);

#dd("SMS Sent to: ".$counter." recipients");
	return redirect()->route('sent_bulk_sms_messages');
    }


    public function sentSMSMessages(Request $request){
	
	$messages=[];

	if($request->ajax())
	        return view('sms_messages.ajax.sent_sms_messages')->with('messages', $messages);
        return view('sms_messages.http.sent_sms_messages')->with('messages', $messages);
    }
    public function sendSMSForm(Request $request){
	$recipient_categories=recipient_category::where('isDeleted', 'false')->orderBy("id", "desc");
	
	if($request->ajax())
	        return view('sms_messages.ajax.send_sms_message')->with('recipient_categories', $recipient_categories);
        return view('sms_messages.http.send_sms_message')->with('recipient_categories', $recipient_categories);
    }
    public function sendSMS(Request $request){
    $categoryIds=$request->categoryIds;

    if($request->sendToAllCategories=="on" || ($categoryIds!=null && count($categoryIds)>0)){
	$this->sendMultipleSMS($request);
    }
    else{
	$number=$request->phoneNumber;//"0919054098";
	$message=$request->message;//"Dear Customers,";
	$message='Date: '.(new Date_class)->getCurrentDate()."\n".$message;
/*
	$old_path = getcwd();
	$shell_path = storage_path().'/shell_scripts';
	chdir($shell_path);
	$output = shell_exec('./send_sms.sh "'.$number.'" "'.$message.'"');
	chdir($old_path);
	*/
		dispatch(new SendSMS([$number], $message));
    }
	//dd($output);
	//$messages=$responseArray['Messages']['Message'];
	return redirect()->route('sent_sms_messages');
    }


    public function sendMultipleSMS(Request $request){
	
	$sendToAllCategories=$request->sendToAllCategories;
	$message=$request->message;
	$message='Date: '.(new Date_class)->getCurrentDate()."\n".$message;

	$counter=0;

	$categoryIds=$request->categoryIds;
	if($sendToAllCategories=="on"){
		$categoryIds=recipient_category::where('isDeleted', 'false')->get()->pluck('id');
	}
	 
//change to shell directory
$old_path = getcwd();
$shell_path = storage_path().'/shell_scripts';
chdir($shell_path);
	
	foreach($categoryIds as $categoryId){

		$recipients=recipient::where('isDeleted', 'false')->where('categoryId', $categoryId)->get();
		foreach($recipients as $recipient){
			$number=$recipient->phoneNumber;
			/*
			//send sms 
			$output = shell_exec('./send_sms.sh "'.$number.'" "'.$message.'"');
			usleep(200*1000);//0.2 seconds
			*/
			dispatch(new SendSMS([$number], $message));

			if(true){
			   $counter++;
			   $sent_sms_message=new sent_sms_message;
			   $sent_sms_message->categoryId=$categoryId;
			   $sent_sms_message->recipientId=$recipient->id;
			   $sent_sms_message->message=$message;
			   $sent_sms_message->date=(new Date_class)->getCurrentDate();
        		   $sent_sms_message->createdByUserId=Auth::guard('web')->user()->id;
			   $sent_sms_message->save();
			}
		}
	}

chdir($old_path);

	return true;
    }

	

    public function readSMS(Request $request){
	$messages=\App\Global_var::readSMS();
	//dd($messages);
	if($request->ajax())
	        return view('sms_messages.ajax.received_sms_messages')->with('messages', $messages);
        return view('sms_messages.http.received_sms_messages')->with('messages', $messages);
    }
}
