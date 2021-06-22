<?php

namespace App;
use Cookie;
use Session;
use DB;
use Illuminate\Support\Collection;
use Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use hisorange\BrowserDetect\Parser as Browser;

class Global_var
{
    protected $table="language_strings";

    public static $selectedLang="tig";
    public static $cookieLifeTime=60*60*24*365;
    //public static $view_count_interval_in_hours=1;//24*60;
    public static $reportIntervalInMonths=6;
    public static $newYear_dayMonth="1/1";

public static function readSMS(){

	$PAGENUMBER=1; 
	$PAGINATIONSIZE=50;
	$messages=array();

	$old_path = getcwd();
	$shell_path = storage_path().'/shell_scripts';
	chdir($shell_path);

	/*
	$number="0919054098";
	$message="Dear Developer KG Again! Now everything is ready to go:";
	*/
   for($PAGENUMBER=1; true; $PAGENUMBER++){
	
	$output = shell_exec('./read_sms.sh "'.$PAGENUMBER.'" "'.$PAGINATIONSIZE.'"');
	
	// Load the XML
	$xmlResponse = simplexml_load_string($output);
	// JSON encode the XML, and then JSON decode to an array.
	$responseArray = json_decode(json_encode($xmlResponse), true);
	$currentPageMessagesCount=$responseArray['Count'];
	if($currentPageMessagesCount==0)
		break;
	$currentPageMessages=$responseArray['Messages']['Message'];
//dd($currentPageMessages);
	foreach($currentPageMessages as $message){
		array_push($messages, $message);
	}
	//echo $PAGENUMBER.': '.$responseArray['Count']."<br>";
	//dd($output);		
    }
//dd($messages[count($messages)-1]['Phone']);
//dd("End");
	#$output = shell_exec('./send_sms.sh "'.$number.'" "'.$message.'"');
	chdir($old_path);

	/*
	foreach($responseArray['Messages']['Message'] as $message){
	echo 'PhoneNumber: '.$message["Phone"].' Date: '.$message["Date"]."<br>Message: ".$message['Content']."<br>____________________________________________<br>";
	}
	*/
	//dd($messages);
return $messages;
}

public static function adminLevels(){
    $language_strings=\App\language_string::orderBy('id', 'desc')->get();
  return ['Regional Admin'=>Global_var::getLangString('Regional Admin', $language_strings), 'Zone Admin'=>Global_var::getLangString('Zone Admin', $language_strings), 'Wereda Admin'=>Global_var::getLangString('Wereda Admin', $language_strings), 'School Admin'=>Global_var::getLangString('School Admin', $language_strings)];
}

public static function mappedTransferCategoryNames(){
    $language_strings=\App\language_string::orderBy('id', 'desc')->get();

  return ['calculatedServiceYears'=>Global_var::getLangString('Service Years', $language_strings), 'hasHealthIssue'=>Global_var::getLangString('Health Issue', $language_strings), 'isDisabled'=>Global_var::getLangString('Physical Disability', $language_strings), 'isAppointed'=>Global_var::getLangString('Governmental Appointment', $language_strings), 'Female'=>Global_var::getLangString('Female', $language_strings), 'maritalStatus'=>Global_var::getLangString('Merriage', $language_strings), 'isEthinic'=>Global_var::getLangString('Minority Ethinic', $language_strings)];
}

public static function hasVetoPower($name){
  $transfer_category=transfer_category::where('isDeleted', 'false')->where('status', 'active')->where('name', $name)->first();
  if($transfer_category==null)
    return false;
  return $transfer_category->hasVetoPower=='true';
}

public static function authors() {
  return [];

$authors=DB::table('authors')->where('isDeleted', 'false')->get();
$authorsArr=array();
foreach ($authors as $author) {
  $authorsArr[$author->id]=$author->firstName." ".$author->lastName;
}

return $authorsArr;
}  

public static function publishers() {
  return [];

$publishers=DB::table('publishers')->where('isDeleted', 'false')->get();
$publishersArr=array();
foreach ($publishers as $publisher) {
  $publishersArr[$publisher->id]=$publisher->name;
}

return $publishersArr;
}       
//generates a random password of length minimum 8 
//contains at least one lower case letter, one upper case letter,
// one number and one special character, 
//not including ambiguous characters like iIl|1 0oO 
public static function generatePassword($len = 8) {

    //enforce min length 8
    if($len < 8)
        $len = 8;

    //define character libraries - remove ambiguous characters like iIl|1 0oO
    $sets = array();
    $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    $sets[] = '23456789';
    $sets[]  = '!$#%';
//    $sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';

    $password = '';
    
    //append a character from each set - gets first 4 characters
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
    }

    //use all characters to fill up to $len
    while(strlen($password) < $len) {
        //get a random set
        $randomSet = $sets[array_rand($sets)];
        
        //add a random char from the random set
        $password .= $randomSet[array_rand(str_split($randomSet))]; 
    }
    
    //shuffle the password string before returning!
    return str_shuffle($password);
}


public static function countViewsAllowedIntervalInHours(){
  return DB::table('settings')->first()!=null? DB::table('settings')->first()->countViewsAllowedIntervalInHours: 24;        
}
public static function currentUser(){
    $currentUser=Auth::guard('web')->user();
    if($currentUser==null){
        $role=Role::where('roleName', 'Viewer')->first();
        $currentUser=new User;
        $currentUser->roleId=$role->id;      
    }
    return $currentUser;
}
public static function languages(){
    $language_strings=\App\language_string::orderBy('id', 'desc')->get();

  return ['tig'=>Global_var::getLangString('Tigrigna', $language_strings), 'amh'=>Global_var::getLangString('Amharic', $language_strings), 'eng'=>Global_var::getLangString('English', $language_strings)];
}
public static function roles(){
    $language_strings=\App\language_string::orderBy('id', 'desc')->get();
    $roles=DB::table('roles')->where("isDeleted", "=", "false")->where("roleName", "!=", "Viewer")->pluck("roleName", "id")->toArray();
   /*$translated_roles=array();
    foreach ($roles as $role) {
      $translated_roles[$role->roleName]=Global_var::getLangString($role->roleName, $language_strings);
    }
*/
  return $roles;//$translated_roles;
}

public static function documentCategories(){
    $language_strings=\App\language_string::orderBy('id', 'desc')->get();

  return ['Video'=>Global_var::getLangString('Video', $language_strings), 'Audio'=>Global_var::getLangString('Audio', $language_strings), 'Image'=>Global_var::getLangString('Image', $language_strings), 'News_Paper'=>Global_var::getLangString('News_Paper', $language_strings), 'Magazine'=>Global_var::getLangString('Magazine', $language_strings), 'Book'=>Global_var::getLangString('Book', $language_strings), 'Text_Document'=>Global_var::getLangString('Text_Document', $language_strings)];
}

public static function documentSub_categories(){
    $language_strings=\App\language_string::orderBy('id', 'desc')->get();

  return ['Entertainment'=>Global_var::getLangString('Entertainment', $language_strings), 'Documentary'=>Global_var::getLangString('Documentary', $language_strings), 'Economic'=>Global_var::getLangString('Economic', $language_strings), 'Sport'=>Global_var::getLangString('Sport', $language_strings), 'War'=>Global_var::getLangString('War', $language_strings), 'Other'=>Global_var::getLangString('Other', $language_strings)];
}

public static function integers(){
  $numbers = array();
  for($i=1; $i<=100; $i++) {
    $numbers[$i]=$i;
  }
  return $numbers;
}

public static function years(){
  $years = array();
  $currentYear=(new Date_class)->getCurrentYear();
  for($i=($currentYear-100); $i<=($currentYear+100); $i++) {
    $years[$i]=$i;
  }
  return $years;
}

public static function isChrome(){
    return Browser::isChrome();
}
public static function getBrowserData(){
  // You can always get the result object from the facade if you wish to operate with it.
BrowserDetect::detect(); // Will resolve and return with the 'browser.result' container.

// Calls are mirrored to the result object for easier use.
$browserVersion=BrowserDetect::browserVersion(); // return '3.6' string.

// Supporting human readable formats.
$browserName=BrowserDetect::browserName(); // return 'Firefox 3.6' string.

// Or can be objective.
$browserFamily=BrowserDetect::browserFamily(); // return 'Firefox' string.
return Browser::browserName();//$browserName;//.' - '.$browserVersion.'- '.$browserFamily;
}
public static function logAction($request, $subject){
        $log=new log;
        $log->userId=Auth::guard('web')->user()!=null? Auth::guard('web')->user()->id:0;
        $log->subject=$subject;
        $log->url=$request->fullUrl();//url()
        $log->method=$request->method();
        $log->ip=$request->ip();
        $log->agent=$request->header('User-Agent');
        $log->created_at=\Carbon\Carbon::now()->toDateTimeString();
        $log->updated_at=\Carbon\Carbon::now()->toDateTimeString();
        //$log->save();
  
  $data=json_encode(['userId'=>$log->userId, 'subject'=>$log->subject, 'url'=>$log->url, 'method'=>$log->method, 'ip'=>$log->ip, 'agent'=>$log->agent, 'created_at'=>$log->created_at, 'updated_at'=>$log->updated_at]);

  // Log::useFiles(storage_path('/logs/app_log.log'));
  // Log::info($data);

    $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents(storage_path('/logs/app_log.log'), $data.',|', FILE_APPEND);


} 

public static function makeLog($obj){
        $log=new log;
        $log->userId=$obj['userId'];
        $log->user=User::find($log->userId);
        $log->subject=$obj['subject'];
        $log->url=$obj['url'];
        $log->method=$obj['method'];
        $log->ip=$obj['ip'];
        $log->agent=$obj['agent'];
        $log->created_at=$obj['created_at'];
        $log->updated_at=$obj['updated_at'];
  
  return $log;
} 

public static function isWithIn_One_YearInterval($ksi_mezgeb_brki){
  $dateDiff=Date_class::getDateDiffernece(\App\Global_var::getReport_One_YearInterval()[0], $ksi_mezgeb_brki->entryDate);
  if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
      return false;

  $dateDiff=Date_class::getDateDiffernece($ksi_mezgeb_brki->entryDate, \App\Global_var::getReport_One_YearInterval()[1]);

  if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
      return false;

//dd($dateDiff->days." ".$dateDiff->invert);
  return true;
}
public static function is_Date_WithIn_One_YearInterval($date){
  $dateDiff=Date_class::getDateDiffernece(\App\Global_var::getReport_One_YearInterval()[0], $date);
  if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
      return false;

  $dateDiff=Date_class::getDateDiffernece($date, \App\Global_var::getReport_One_YearInterval()[1]);

  if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
      return false;

//dd($dateDiff->days." ".$dateDiff->invert);
  return true;
}


public static function isWithIn_DateInterval($date){
  $dateDiff=Date_class::getDateDiffernece(\App\Global_var::getReport_DateInterval()[0], $date);
  if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
      return false;

  $dateDiff=Date_class::getDateDiffernece($date, \App\Global_var::getReport_DateInterval()[1]);

  if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
      return false;

//dd($dateDiff->days." ".$dateDiff->invert);
  return true;
}

public static function isWithIn_GivenInterval($givenDate, $initialDate, $finalDate){
  $dateDiff=Date_class::getDateDiffernece($initialDate, $givenDate);
  if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
      return false;

  $dateDiff=Date_class::getDateDiffernece($givenDate, $finalDate);

  if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
      return false;

//dd($dateDiff->days." ".$dateDiff->invert);
  return true;
}

public static function isFirstDateEarlier($initialDate, $finalDate){
  $dateDiff=Date_class::getDateDiffernece($initialDate, $finalDate);

  if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
      return false;

//dd($dateDiff->days." ".$dateDiff->invert);
  return true;
}

public static function getReport_DateInterval(){
  $currentYear=Date_class::getCurrentYear();
  $reportDate_Start=\Session::get('startDate')!=null? \Session::get('startDate'): Global_var::$newYear_dayMonth.'/'.$currentYear;
  $reportDate_End=\Session::get('endDate')!=null? \Session::get('endDate'): Global_var::$newYear_dayMonth.'/'.($currentYear+1);

  return [$reportDate_Start, $reportDate_End];
}
public static function getReport_One_YearInterval(){
  $currentYear=Date_class::getCurrentYear();
  $reportDate_Start=Global_var::$newYear_dayMonth.'/'.$currentYear;
  $reportDate_End=Global_var::$newYear_dayMonth.'/'.($currentYear+1);

  return [$reportDate_Start, $reportDate_End];
}

public static function generateRank_category($array, $categoryIndex){
    $collection=new Collection($array/*[
    ['name'=>'sue', 'age'=>23],
    ['name'=>'simon', 'age'=>38],
    ['name'=>'jane', 'age'=>25],
    ['name'=>'dave', 'age'=>59],
    ]*/);

$sorted_collection=$collection->sortByDesc('percent_'.$categoryIndex);
//dd($categoryIndex);
//dd($sorted_collection);
/*print_r($sorted_collection);
echo "<br><br>";
  return;*/
  $new_rank_array=array();

   $RANK = 1;
    $rank_offset = 0;

    $arrayIndex=0;
    if(!isset($sorted_collection[$arrayIndex]['percent_'.$categoryIndex]))
      $arrayIndex=1;
     
    $current_maximam = $sorted_collection/*->first()*/[$arrayIndex]['percent_'.$categoryIndex];
    //echo '<br>'.$categoryIndex.' hh '.($current_maximam);
    foreach($sorted_collection as $collection)
    {
      if(!isset($collection['brki_'.$categoryIndex]) || !isset($collection['percent_'.$categoryIndex]))
        continue;

        $key=$collection['brki_'.$categoryIndex];
        $value=$collection['percent_'.$categoryIndex];
//dd($key);
//dd($value);
        if ($value < $current_maximam)
        {
            $RANK = $RANK + $rank_offset;
            $rank_offset = 1;
            $current_maximam = $value;
        }
        else if($value == $current_maximam)
        {
            $rank_offset ++;
        }

    $new_rank_array[$key]=$RANK;
}
return $new_rank_array;
}

public static function generateRank($array){
  
  $collection=new Collection($array/*[
    ['name'=>'sue', 'age'=>23],
    ['name'=>'simon', 'age'=>38],
    ['name'=>'jane', 'age'=>25],
    ['name'=>'dave', 'age'=>59],
    ]*/);

$sorted_collection=$collection->sortByDesc('percent');
/*print_r($sorted_collection);
echo "<br><br>";
  return;*/
  $new_rank_array=array();

   $RANK = 1;
    $rank_offset = 0;
    $current_maximam = $sorted_collection->first()['percent'];
    foreach($sorted_collection as $collection)
    {
        $key=$collection['brki'];
        $value=$collection['percent'];

        if ($value < $current_maximam)
        {
            $RANK = $RANK + $rank_offset;
            $rank_offset = 1;
            $current_maximam = $value;
        }
        else if($value == $current_maximam)
        {
            $rank_offset ++;
        }

    $new_rank_array[$key]=$RANK;
}
//dd($new_rank_array);
return $new_rank_array;
}

public static function round($number, $decimalPoint){
  return round($number*pow(10, $decimalPoint))/pow(10, $decimalPoint);
}

public static function getGenders(){
    $language_strings=\App\language_string::orderBy('id', 'desc')->get();

  return ['Male'=>Global_var::getLangString('Male', $language_strings), 'Female'=>Global_var::getLangString('Female', $language_strings)];
}
public static function teachers(){
    $teachers=teacher::where('isDeleted', 'false')->get();
    $teachersArr=array();
    foreach ($teachers as $teacher) {
     $teachersArr[$teacher->id]=$teacher->firstName.' '.$teacher->lastName.' '.$teacher->middleName;
    }
  return $teachersArr;
}

public static function getLangString($keyWord, $language_strings){
$selectedLang=Session::get('selectedLang');
    return $language_strings!=null && $selectedLang!='' && $language_strings->where('keyWord', '=', $keyWord)->first()!=null? $language_strings->where('keyWord', '=', $keyWord)->first()->$selectedLang: str_replace('_', ' ', $keyWord); //split with _
}

 
 public static function existsInArray($array, $item){
  
    if($array==null)
      return false;
    foreach ($array as $elem) {
     if($elem==$item)
        return true;
    }
    return false;
 }

 public static function removeArrayAt($array, $index){
  $newArr=array();
  $arrLength=count($array);

  for($i=0; $i<$arrLength; $i++) {
    if($i==$index)
      continue;
    array_push($newArr, $array[$i]);
  }

  return $newArr;
 }


}
