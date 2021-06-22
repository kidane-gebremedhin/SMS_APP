<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transfer_requests_from_wereda_to_wereda;
use App\transfer_requests_from_school_to_school;
use App\teacher;
use App\wereda_teacher_acceptance_capacity;
use App\school_teacher_acceptance_capacity;
use App\wereda;
use App\transfer_category;
use App\subject;
use App\Global_var;
use App\request_type;
use App\transfer_results_from_wereda_to_wereda;
use App\transfer_results_from_school_to_school;
use Auth;
use DB;

class transfer_resultsController extends Controller
{
    public $paginationSize;
    private $subject;
    private $category;
    private $weredaCapacity;
    private $schoolCapacity;

    public function __construct(){
        $this->middleware('auth:web');
    
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function transfer_results_from_wereda_to_weredas(Request $request)
    {
       
       $transfer_results_from_wereda_to_weredas=transfer_results_from_wereda_to_wereda::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("transfer_results_from_wereda_to_weredas.ajax.index")->with('transfer_results_from_wereda_to_weredas', $transfer_results_from_wereda_to_weredas);

       return view("transfer_results_from_wereda_to_weredas.http.index")->with('transfer_results_from_wereda_to_weredas', $transfer_results_from_wereda_to_weredas);
    }

    public function transfer_results_from_school_to_schools(Request $request)
    {
       
       $transfer_results_from_school_to_schools=transfer_results_from_school_to_school::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("transfer_results_from_school_to_schools.ajax.index")->with('transfer_results_from_school_to_schools', $transfer_results_from_school_to_schools);

       return view("transfer_results_from_school_to_schools.http.index")->with('transfer_results_from_school_to_schools', $transfer_results_from_school_to_schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function generate_transfer_results_from_wereda_to_wereda(Request $request, $roundId=1){

    $this->makeWeredaTransfers($roundId);

    $transfer_requests_from_wereda_to_weredas=transfer_results_from_wereda_to_wereda::all();

    if($request->ajax())
        return view('transfer_results.ajax.generate_transfer_results_from_wereda_to_weredas')->with('transfer_requests_from_wereda_to_weredas', $transfer_requests_from_wereda_to_weredas);

        return view('transfer_results.http.generate_transfer_results_from_wereda_to_weredas')->with('transfer_requests_from_wereda_to_weredas', $transfer_requests_from_wereda_to_weredas);
    }

public function generate_transfer_results_from_school_to_school(Request $request, $roundId=1){

    $this->makeSchoolTransfers($roundId);

    $transfer_requests_from_school_to_schools=transfer_results_from_school_to_school::all();

    if($request->ajax())
        return view('transfer_results.ajax.generate_transfer_results_from_school_to_schools')->with('transfer_requests_from_school_to_schools', $transfer_requests_from_school_to_schools);

        return view('transfer_results.http.generate_transfer_results_from_school_to_schools')->with('transfer_requests_from_school_to_schools', $transfer_requests_from_school_to_schools);
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
            'firstName'=>'required',
            'lastName'=>'required',
            'middleName'=>'required',
            'gender'=>'required',
            'recruitmentYear'=>'required',
            'actualServiceYears'=>'required',
            'roundId'=>'required',
            'requestTypeId'=>'required',
            'toSchoolId'=>'required',
            'educationalLevelId'=>'required',
            ]);

        $transfer_requests_from_wereda_to_wereda=transfer_requests_from_wereda_to_wereda::where('teacherId', $request->teacherId)->where('roundId', $request->roundId)->where('requestTypeId', $request->requestTypeId)->first();
        if($transfer_requests_from_wereda_to_wereda!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }

        $teacher=new teacher;
        $teacher->firstName=$request->firstName;
        $teacher->lastName=$request->lastName;
        $teacher->middleName=$request->middleName;
        $teacher->gender=$request->gender;
        $teacher->recruitmentYear=$request->recruitmentYear;

        $teacher->maritalStatus=$request->maritalStatus=='on'? 'true':'false';
        $teacher->hasProvidedMarriageInfo=$request->hasProvidedMarriageInfo=='on'? 'true':'false';
        $teacher->marriageInfoAttachement=$request->marriageInfoAttachement;
        $teacher->merriagePartnerId=$request->merriagePartnerId;
        $teacher->merriagePartnerWeredaId=$request->merriagePartnerWeredaId;
        $teacher->merriagePartnerSchoolId=$request->merriagePartnerSchoolId;

        $teacher->hasHealthIssue=$request->hasHealthIssue=='on'? 'true':'false';
        $teacher->hasProvidedHealthIssueInfo=$request->hasProvidedHealthIssueInfo=='on'? 'true':'false';
        $teacher->healthIssueInfoAttachement=$request->healthIssueInfoAttachement;

        $teacher->isAppointed=$request->isAppointed=='on'? 'true':'false';
        $teacher->hasProvidedAppointmentInfo=$request->hasProvidedAppointmentInfo=='on'? 'true':'false';
        $teacher->appointmentInfoAttachement=$request->appointmentInfoAttachement;

        $teacher->educationalLevelId=$request->educationalLevelId;
        $teacher->regularJobId=$request->regularJobId;
        $teacher->graduatedSubjectId=$request->graduatedSubjectId;
        $teacher->teachingSubjectId=$request->teachingSubjectId;
        $teacher->save();

        $transfer_requests_from_wereda_to_wereda=new transfer_requests_from_wereda_to_wereda;
        $transfer_requests_from_wereda_to_wereda->teacherId=$teacher->id;
        $transfer_requests_from_wereda_to_wereda->roundId=$request->roundId;
        $transfer_requests_from_wereda_to_wereda->requestTypeId=$request->requestTypeId;
        $transfer_requests_from_wereda_to_wereda->actualServiceYears=$request->actualServiceYears;
        $transfer_requests_from_wereda_to_wereda->calculatedServiceYears=$transfer_requests_from_wereda_to_wereda->actualServiceYears + $request->bonusServiceYears;
        $transfer_requests_from_wereda_to_wereda->transferReason=$request->transferReason;
        $transfer_requests_from_wereda_to_wereda->isWillingToTransferAlone=$request->isWillingToTransferAlone=='on'? 'true':'false';
        $transfer_requests_from_wereda_to_wereda->isEthinic=$request->isEthinic=='on'? 'true':'false';
        $transfer_requests_from_wereda_to_wereda->fromSchoolId=$request->fromSchoolId;
        $transfer_requests_from_wereda_to_wereda->toSchoolId=$request->toSchoolId;
        $transfer_requests_from_wereda_to_wereda->date=(new \App\Date_class)->getCurrentDate();
        $transfer_requests_from_wereda_to_wereda->remark=$request->remark;
        $transfer_requests_from_wereda_to_wereda->createdByUserId=Auth::guard('web')->user()->id;
        $transfer_requests_from_wereda_to_wereda->save();
        return redirect()->route("transfer_requests_from_wereda_to_weredas.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $transfer_requests_from_wereda_to_wereda=transfer_requests_from_wereda_to_wereda::find($id);
        if($request->ajax())
            return view("transfer_requests_from_wereda_to_weredas.ajax.show")->with('transfer_requests_from_wereda_to_wereda', $transfer_requests_from_wereda_to_wereda);
        return view("transfer_requests_from_wereda_to_weredas.http.show")->with('transfer_requests_from_wereda_to_wereda', $transfer_requests_from_wereda_to_wereda);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$transfer_requests_from_wereda_to_wereda=transfer_requests_from_wereda_to_wereda::find($id);
    $regions=DB::table('regions')->pluck("name", "id")->toArray();
    $zones=DB::table('zones')->pluck('name', 'id')->toArray();
    $schools=DB::table('schools')->pluck('name', 'id')->toArray();
    $rounds=DB::table('rounds')->pluck('name', 'id')->toArray();
    $subjects=DB::table('subjects')->pluck('name', 'id')->toArray();
    $educational_levels=DB::table('educational_levels')->pluck('name', 'id')->toArray();
    $request_types=DB::table('request_types')->pluck('name', 'id')->toArray();
    $jobs=DB::table('jobs')->pluck('name', 'id')->toArray();
    $teachers=\App\Global_var::teachers();
    $years=\App\Global_var::years();
    $genders=\App\Global_var::getGenders();

	if($request->ajax())
	    return view('transfer_requests_from_wereda_to_weredas.ajax.edit')->with('transfer_requests_from_wereda_to_wereda', $transfer_requests_from_wereda_to_wereda)->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types)->with('jobs', $jobs)->with('teachers', $teachers)->with('years', $years)->with('genders', $genders);

	    return view('transfer_requests_from_wereda_to_weredas.http.edit')->with('transfer_requests_from_wereda_to_wereda', $transfer_requests_from_wereda_to_wereda)->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types)->with('jobs', $jobs)->with('teachers', $teachers)->with('years', $years)->with('genders', $genders);
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

        $this->validate($request, [
            'firstName'=>'required',
            'lastName'=>'required',
            'middleName'=>'required',
            'gender'=>'required',
            'recruitmentYear'=>'required',
            'actualServiceYears'=>'required',
            'roundId'=>'required',
            'requestTypeId'=>'required',
            'toSchoolId'=>'required',
            'educationalLevelId'=>'required',
            ]);

        $transfer_requests_from_wereda_to_wereda=transfer_requests_from_wereda_to_wereda::where('teacherId', $request->teacherId)->where('roundId', $request->roundId)->where('requestTypeId', $request->requestTypeId)->first();
        if($transfer_requests_from_wereda_to_wereda!=null && $transfer_requests_from_wereda_to_wereda->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
            }
        $transfer_requests_from_wereda_to_wereda=transfer_requests_from_wereda_to_wereda::find($id);
        $transfer_requests_from_wereda_to_wereda->roundId=$request->roundId;
        $transfer_requests_from_wereda_to_wereda->requestTypeId=$request->requestTypeId;
        $transfer_requests_from_wereda_to_wereda->actualServiceYears=$request->actualServiceYears;
        $transfer_requests_from_wereda_to_wereda->calculatedServiceYears=$transfer_requests_from_wereda_to_wereda->actualServiceYears + $request->bonusServiceYears;
        $transfer_requests_from_wereda_to_wereda->transferReason=$request->transferReason;
        $transfer_requests_from_wereda_to_wereda->isWillingToTransferAlone=$request->isWillingToTransferAlone=='on'? 'true':'false';
        $transfer_requests_from_wereda_to_wereda->isEthinic=$request->isEthinic=='on'? 'true':'false';
        $transfer_requests_from_wereda_to_wereda->fromSchoolId=$request->fromSchoolId;
        $transfer_requests_from_wereda_to_wereda->toSchoolId=$request->toSchoolId;
        $transfer_requests_from_wereda_to_wereda->remark=$request->remark;
        $transfer_requests_from_wereda_to_wereda->updatedByUserId=Auth::guard('web')->user()->id;
        $transfer_requests_from_wereda_to_wereda->save();


        $teacher=$transfer_requests_from_wereda_to_wereda->teacher;
        if($teacher==null)
            $teacher=new teacher;
        $teacher->firstName=$request->firstName;
        $teacher->lastName=$request->lastName;
        $teacher->middleName=$request->middleName;
        $teacher->gender=$request->gender;
        $teacher->recruitmentYear=$request->recruitmentYear;

        $teacher->maritalStatus=$request->maritalStatus=='on'? 'true':'false';
        $teacher->hasProvidedMarriageInfo=$request->hasProvidedMarriageInfo=='on'? 'true':'false';
        $teacher->marriageInfoAttachement=$request->marriageInfoAttachement;
        $teacher->merriagePartnerId=$request->merriagePartnerId;
        $teacher->merriagePartnerWeredaId=$request->merriagePartnerWeredaId;
        $teacher->merriagePartnerSchoolId=$request->merriagePartnerSchoolId;

        $teacher->hasHealthIssue=$request->hasHealthIssue=='on'? 'true':'false';
        $teacher->hasProvidedHealthIssueInfo=$request->hasProvidedHealthIssueInfo=='on'? 'true':'false';
        $teacher->healthIssueInfoAttachement=$request->healthIssueInfoAttachement;

        $teacher->isAppointed=$request->isAppointed=='on'? 'true':'false';
        $teacher->hasProvidedAppointmentInfo=$request->hasProvidedAppointmentInfo=='on'? 'true':'false';
        $teacher->appointmentInfoAttachement=$request->appointmentInfoAttachement;

        $teacher->educationalLevelId=$request->educationalLevelId;
        $teacher->regularJobId=$request->regularJobId;
        $teacher->graduatedSubjectId=$request->graduatedSubjectId;
        $teacher->teachingSubjectId=$request->teachingSubjectId;
        $teacher->save();

        return redirect()->route("transfer_requests_from_wereda_to_weredas.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $transfer_requests_from_wereda_to_wereda=transfer_requests_from_wereda_to_wereda::find($id);
       if($request->ajax())
        return view('transfer_requests_from_wereda_to_weredas.ajax.delete-confirm')->with('transfer_requests_from_wereda_to_wereda', $transfer_requests_from_wereda_to_wereda);
        
        return view('transfer_requests_from_wereda_to_weredas.http.delete-confirm')->with('transfer_requests_from_wereda_to_wereda', $transfer_requests_from_wereda_to_wereda);
    }
 	public function destroy($id, Request $request)
    {
        $transfer_requests_from_wereda_to_wereda=transfer_requests_from_wereda_to_wereda::find($id);
        $transfer_requests_from_wereda_to_wereda->isDeleted='true';
        $transfer_requests_from_wereda_to_wereda->deletedByUserId=$request->deletedByUserId;
        $transfer_requests_from_wereda_to_wereda->save();

        return redirect()->route('transfer_requests_from_wereda_to_weredas.index');
    }

    public function makeWeredaTransfers($roundId) {
    
    /*$transfer_requestIds=[20, 1, 5, 8, 30, 40, 50, 60, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $results=$this->getRandomWeredaWinners($transfer_requestIds, 18);

        foreach ($results as $result) {
           // echo $result.", ";
        }

        dd("end");*/

//delete round old data
$old_results=transfer_results_from_wereda_to_wereda::where('roundId', $roundId)->get();
foreach ($old_results as $old_result) {
    $old_result->delete();
}
//--end of deletion

        $transferResults=array();
        $levels=transfer_category::where('isDeleted', 'false')->where('status', 'active')->orderBy('level', 'asc')->distinct()->pluck('level');

        $request_types=request_type::where('isDeleted', 'false')->get();
    foreach($request_types as $request_type){
    $wereda_teacher_acceptance_capacities = wereda_teacher_acceptance_capacity::where('isDeleted', 'false')->where('status', 'active')->where('roundId', $roundId)->where('requestTypeId', $request_type->id);
        $weredaTransferedCount=0;
        foreach($wereda_teacher_acceptance_capacities->get() as $weredaCapacity)
        {
            $current_wereda=$weredaCapacity->wereda;
            if($current_wereda==null)
                continue;
            $transfer_requests_from_wereda_to_weredas=transfer_requests_from_wereda_to_wereda::where('isDeleted', 'false')/*->where('isApproved', 'true')*/->where('status', 'active')->where('roundId', $roundId)->where('requestTypeId', $request_type->id)->where('toWeredaId', $weredaCapacity->weredaId);
            //$subjects=subject::whereIn('id', $wereda_teacher_acceptance_capacities->get()->whereIn('weredaId', $weredaCapacity->weredaId)->pluck('subjectId'))->get();

            $subject=subject::find($weredaCapacity->subjectId);
                $this->subject=$subject;
                $this->weredaCapacity=$weredaCapacity;
                $requests_to_woreda_with_subject = $transfer_requests_from_wereda_to_weredas->get()->filter(function($transferRequest){
                    if($transferRequest->teacher==null || $transferRequest->teacher->educationalLevelId != $this->weredaCapacity->educationalLevelId){
                        dd($transferRequest);
                        return false;
                    }
                    if($transferRequest->requestType->name!='Teacher')
                        return true;
                    return $transferRequest->teacher!=null && $transferRequest->teacher->graduatedSubjectId==$this->subject->id; });

                //
                $filtered_transfer_requests=transfer_requests_from_wereda_to_wereda::whereIn('id', $requests_to_woreda_with_subject->pluck('id'));

                if(count($filtered_transfer_requests->get())==0)
                    continue;
                //filter based on categories

                    //$levels=transfer_category::where('isDeleted', 'false')->where('status', 'active')->orderBy('level', 'asc')->pluck('level')->distinct();
                    $remained_capacity=$weredaCapacity->quantity;
                    $transfered_quantity=0;
                    $remained_valid_competitors=$filtered_transfer_requests->get();
                    foreach ($levels as $level) {
                            if($remained_capacity==0)
                                break;
                            $priority_transferCategories=transfer_category::where('isDeleted', 'false')->where('status', 'active')->where('level', $level)->orderBy('priority', 'asc')->get();

$shuffled_priorities=array();
        foreach ($priority_transferCategories as $category) {
            $similar_priorities=transfer_category::where('isDeleted', 'false')->where('status', 'active')->where('level', $level)->where('priority', $category->priority)->get();
            $shuffled_array=$this->getRandomNumbers($similar_priorities->pluck('id'));
            foreach ($shuffled_array as $id) {
                $transfer_category=transfer_category::find($id);

                if(Global_var::existsInArray($shuffled_priorities, $transfer_category))
                    continue;
                array_push($shuffled_priorities, $transfer_category);
            }
        }

//dd($shuffled_priorities);

                            foreach ($shuffled_priorities as $category) {
                                $this->category=$category;

                                if($remained_capacity==0)
                                    break;

                                if($category->shortCode=='calculatedServiceYears'){
                                    $selected_transfer_requests=null;//reset prev values
                                    //$remained_valid_competitors=$remained_valid_competitors->get();
                                    $selected_transfer_requests=transfer_requests_from_wereda_to_wereda::whereIn('id', $filtered_transfer_requests->pluck('id'))->whereIn('id', $remained_valid_competitors->pluck('id'))->orderBy($category->shortCode, 'desc')->limit($remained_capacity)->get();

                                    if(count($selected_transfer_requests)==0)
                                        continue;
                                    
                                    $lastRow=$selected_transfer_requests->last();
                                    $remained_valid_competitors=$filtered_transfer_requests->whereIn('id', $remained_valid_competitors->pluck('id'))->where($category->shortCode, $lastRow->calculatedServiceYears)->get();

                                    $temp_selected_least_score_rows=$selected_transfer_requests->where($category->shortCode, $lastRow->calculatedServiceYears);


                                    $transfer_requests=transfer_requests_from_wereda_to_wereda::whereIn('id', $selected_transfer_requests->pluck('id'));
                                    $transfered_quantity += count($selected_transfer_requests);
                                    $currentTransferCount=count($selected_transfer_requests);
                                    if(count($remained_valid_competitors)>1){
                                        $transfer_requests=$transfer_requests->whereNotIn('id', $temp_selected_least_score_rows->pluck('id'));
                                        $transfered_quantity -= count($temp_selected_least_score_rows);
                                        $currentTransferCount -=count($temp_selected_least_score_rows);

                                    }

                                    $remained_capacity -= $currentTransferCount;

                                   // dd($transfer_requests);

                                    foreach ($transfer_requests->get() as $transfer_request) {
                                        array_push($transferResults, $transfer_request);
                                    }

                              // echo ($category->shortCode.' '.$transfered_quantity." ".$remained_capacity)."<br>";
                                }
                                else if($category->shortCode=='Female'){
                                    $selected_transfer_requests=[];//reset prev values
                                    $selected_transfer_requestIds=[];
                                    foreach ($filtered_transfer_requests->whereIn('id', $remained_valid_competitors->pluck('id'))->get() as $transferRequest) {
                                        $attrName=$this->category->shortCode;
                                        $isQualified=$transferRequest->teacher!=null && $transferRequest->teacher->gender==$attrName;

                                        if($isQualified)
                                            array_push($selected_transfer_requestIds, $transferRequest->id);
                                    }
                                    $selected_transfer_requests=transfer_requests_from_wereda_to_wereda::whereIn('id', $selected_transfer_requestIds)->get();

                                    //preceed to next criteria if more than remained_capacity as all are valid
                                    if(count($selected_transfer_requests)>$remained_capacity)
                                        continue;
                                    $random_winners=$this->getRandomWeredaWinners($selected_transfer_requests, $remained_capacity);
                                    //$lastRow=$selected_transfer_requests->last();
                                    $remained_valid_competitors=$filtered_transfer_requests->whereNotIn('id', $random_winners->pluck('id'))->get();

                                    //$temp_selected_least_score_rows=$selected_transfer_requests->where($category->shortCode, $lastRow->calculatedServiceYears)->get();

                                    $transfered_quantity += count($random_winners);
                                    $currentTransferCount=count($random_winners);
                                    $remained_capacity -= $currentTransferCount;
                                    foreach ($random_winners as $random_winner) {
                                        array_push($transferResults, $random_winner);
                                    }
                               // echo ($category->shortCode.' '.$transfered_quantity." ".$remained_capacity)."<br>";
                                }
                                else{
                                    $selected_transfer_requests=[];//reset prev values
                                    $selected_transfer_requestIds=[];
                                    foreach ($filtered_transfer_requests->whereIn('id', $remained_valid_competitors->pluck('id'))->get() as $transferRequest) {
                                        $attrName=$this->category->shortCode;
                                        $isQualified=true;
                                        if($attrName=='isEthinic'){
                                            $isQualified=$current_wereda->isEthinic=='false' || $transferRequest->$attrName=='true';
                                        }
                                        else
                                            $isQualified=$transferRequest->teacher!=null && $transferRequest->teacher->$attrName=='true'? true: false;

                                        if($isQualified)
                                            array_push($selected_transfer_requestIds, $transferRequest->id);
                                    }
                                    $selected_transfer_requests=transfer_requests_from_wereda_to_wereda::whereIn('id', $selected_transfer_requestIds)->get();

                                    //preceed to next criteria if more than remained_capacity as all are valid
                                    if(count($selected_transfer_requests)>$remained_capacity)
                                        continue;
                                    $random_winners=$this->getRandomWeredaWinners($selected_transfer_requests, $remained_capacity);

                                    //$lastRow=$selected_transfer_requests->last();
                                    $remained_valid_competitors=$filtered_transfer_requests->whereNotIn('id', $random_winners->pluck('id'))->get();

                                    //$temp_selected_least_score_rows=$selected_transfer_requests->where($category->shortCode, $lastRow->calculatedServiceYears)->get();

                                    $transfered_quantity += count($random_winners);
                                    $currentTransferCount=count($random_winners);
                                    $remained_capacity -= $currentTransferCount;
                                    foreach ($random_winners as $random_winner) {
                                        array_push($transferResults, $random_winner);
                                    }

                               // echo ($category->shortCode.' '.$transfered_quantity." ".$remained_capacity)."<br>";

                                // if($category->shortCode=='isDisabled')
                                // dd($category->shortCode.' '.$transfered_quantity." ".$remained_capacity);

                                }
                            }
                            //IF $REMAINED_CAPACITY > 0 && transfered_quantity < #REQUESTS MAKE RADOM SELECTION
                }

//-----make rando selection for remaining requests
$transferdIds=array();                
foreach ($transferResults as $result) {
array_push($transferdIds, $result->id);
}
$transferQuantityCheckSum=$weredaCapacity->quantity;
if($transferQuantityCheckSum > count($transfer_requests_from_wereda_to_weredas->get())){
    $transferQuantityCheckSum=count($transfer_requests_from_wereda_to_weredas->get());
}

if($transfered_quantity  < $transferQuantityCheckSum){
    $remainingQty=$transferQuantityCheckSum - $transfered_quantity;
    $random_winners=$this->getRandomWeredaWinners($transfer_requests_from_wereda_to_weredas->whereNotIn('id', $transferdIds)->get(), $remainingQty);
    //dd($random_winners);
   // echo 'random selected: '.count($random_winners)."<br>";
    foreach ($random_winners as $random_winner) {
        array_push($transferResults, $random_winner);
    }
}
//-----end of make rando selection for remaining requests


}
}


//store in db
foreach ($transferResults as $req) {
    $result=transfer_results_from_wereda_to_wereda::where('requestId', $req->id)->first();
    if($result==null)
        $result=new transfer_results_from_wereda_to_wereda;
    $result->roundId=$roundId;
    $result->requestId=$req->id;
    $result->date=(new \App\Date_class)->getCurrentDate();
    $result->createdByUserId=Auth::guard('web')->user()->id;
    $result->save();
}
    return $transferResults;
}


    public function makeSchoolTransfers($roundId) {
    
    /*$transfer_requestIds=[20, 1, 5, 8, 30, 40, 50, 60, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $results=$this->getRandomSchoolWinners($transfer_requestIds, 18);

        foreach ($results as $result) {
           // echo $result.", ";
        }

        dd("end");*/

//delete round old data
$old_results=transfer_results_from_school_to_school::where('roundId', $roundId)->get();
foreach ($old_results as $old_result) {
    $old_result->delete();
}
//--end of deletion

        $transferResults=array();
        $levels=transfer_category::where('isDeleted', 'false')->where('status', 'active')->orderBy('level', 'asc')->distinct()->pluck('level');

        $request_types=request_type::where('isDeleted', 'false')->get();
    foreach($request_types as $request_type){
    $school_teacher_acceptance_capacities = school_teacher_acceptance_capacity::where('isDeleted', 'false')->where('status', 'active')->where('roundId', $roundId)->where('requestTypeId', $request_type->id);
        $schoolTransferedCount=0;
        foreach($school_teacher_acceptance_capacities->get() as $schoolCapacity)
        {
            $current_school=$schoolCapacity->school;
            if($current_school==null)
                continue;
            $transfer_requests_from_school_to_schools=transfer_requests_from_school_to_school::where('isDeleted', 'false')/*->where('isApproved', 'true')*/->where('status', 'active')->where('roundId', $roundId)->where('requestTypeId', $request_type->id)->where('toschoolId', $schoolCapacity->schoolId);
            //$subjects=subject::whereIn('id', $school_teacher_acceptance_capacities->get()->whereIn('schoolId', $schoolCapacity->schoolId)->pluck('subjectId'))->get();

            $subject=subject::find($schoolCapacity->subjectId);
                $this->subject=$subject;
                $this->schoolCapacity=$schoolCapacity;
                $requests_to_woreda_with_subject = $transfer_requests_from_school_to_schools->get()->filter(function($transferRequest){                    
                    if($transferRequest->teacher==null || $transferRequest->teacher->educationalLevelId != $this->schoolCapacity->educationalLevelId){
                        //dd($transferRequest);
                        return false;
                    }
                    if($transferRequest->requestType->name!='Teacher')
                        return true;
                    return $transferRequest->teacher!=null && $transferRequest->teacher->graduatedSubjectId==$this->subject->id; });

                //
                $filtered_transfer_requests=transfer_requests_from_school_to_school::whereIn('id', $requests_to_woreda_with_subject->pluck('id'));
    
                if(count($filtered_transfer_requests->get())==0)
                    continue;
                //filter based on categories

                    //$levels=transfer_category::where('isDeleted', 'false')->where('status', 'active')->orderBy('level', 'asc')->pluck('level')->distinct();
                    $remained_capacity=$schoolCapacity->quantity;
                    $transfered_quantity=0;
                    $remained_valid_competitors=$filtered_transfer_requests->get();
                    foreach ($levels as $level) {
                            if($remained_capacity==0)
                                break;
                            $priority_transferCategories=transfer_category::where('isDeleted', 'false')->where('status', 'active')->where('level', $level)->orderBy('priority', 'asc')->get();

$shuffled_priorities=array();
        foreach ($priority_transferCategories as $category) {
            $similar_priorities=transfer_category::where('isDeleted', 'false')->where('status', 'active')->where('level', $level)->where('priority', $category->priority)->get();
            $shuffled_array=$this->getRandomNumbers($similar_priorities->pluck('id'));
            foreach ($shuffled_array as $id) {
                $transfer_category=transfer_category::find($id);

                if(Global_var::existsInArray($shuffled_priorities, $transfer_category))
                    continue;
                array_push($shuffled_priorities, $transfer_category);
            }
        }

//dd($shuffled_priorities);

                            foreach ($shuffled_priorities as $category) {
                                $this->category=$category;

                                if($remained_capacity==0)
                                    break;

                                if($category->shortCode=='calculatedServiceYears'){

                                    $selected_transfer_requests=null;//reset prev values
                                    //$remained_valid_competitors=$remained_valid_competitors->get();
                                    $selected_transfer_requests=transfer_requests_from_school_to_school::whereIn('id', $filtered_transfer_requests->pluck('id'))->whereIn('id', $remained_valid_competitors->pluck('id'))->orderBy($category->shortCode, 'desc')->limit($remained_capacity)->get();

                                    if(count($selected_transfer_requests)==0)
                                        continue;
                                    $lastRow=$selected_transfer_requests->last();
                                    $remained_valid_competitors=$filtered_transfer_requests->whereIn('id', $remained_valid_competitors->pluck('id'))->where($category->shortCode, $lastRow->calculatedServiceYears)->get();

                                    $temp_selected_least_score_rows=$selected_transfer_requests->where($category->shortCode, $lastRow->calculatedServiceYears);


                                    $transfer_requests=transfer_requests_from_school_to_school::whereIn('id', $selected_transfer_requests->pluck('id'));
                                    $transfered_quantity += count($selected_transfer_requests);
                                    $currentTransferCount=count($selected_transfer_requests);
                                    if(count($remained_valid_competitors)>1){
                                        $transfer_requests=$transfer_requests->whereNotIn('id', $temp_selected_least_score_rows->pluck('id'));
                                        $transfered_quantity -= count($temp_selected_least_score_rows);
                                        $currentTransferCount -=count($temp_selected_least_score_rows);

                                    }

                                    $remained_capacity -= $currentTransferCount;

                                   // dd($transfer_requests);

                                    foreach ($transfer_requests->get() as $transfer_request) {
                                        array_push($transferResults, $transfer_request);
                                    }

                              // echo ($category->shortCode.' '.$transfered_quantity." ".$remained_capacity)."<br>";
                                }
                                else if($category->shortCode=='Female'){
                                    $selected_transfer_requests=[];//reset prev values
                                    $selected_transfer_requestIds=[];
                                    foreach ($filtered_transfer_requests->whereIn('id', $remained_valid_competitors->pluck('id'))->get() as $transferRequest) {
                                        $attrName=$this->category->shortCode;
                                        $isQualified=$transferRequest->teacher!=null && $transferRequest->teacher->gender==$attrName;

                                        if($isQualified)
                                            array_push($selected_transfer_requestIds, $transferRequest->id);
                                    }
                                    $selected_transfer_requests=transfer_requests_from_school_to_school::whereIn('id', $selected_transfer_requestIds)->get();


                                    //preceed to next criteria if more than remained_capacity as all are valid
                                    if(count($selected_transfer_requests)>$remained_capacity)
                                        continue;

                                    $random_winners=$this->getRandomSchoolWinners($selected_transfer_requests, $remained_capacity);
                                    //$lastRow=$selected_transfer_requests->last();
                                    $remained_valid_competitors=$filtered_transfer_requests->whereNotIn('id', $random_winners->pluck('id'))->get();

                                    //$temp_selected_least_score_rows=$selected_transfer_requests->where($category->shortCode, $lastRow->calculatedServiceYears)->get();

                                    $transfered_quantity += count($random_winners);
                                    $currentTransferCount=count($random_winners);
                                    $remained_capacity -= $currentTransferCount;
                                    foreach ($random_winners as $random_winner) {
                                        array_push($transferResults, $random_winner);
                                    }
                               // echo ($category->shortCode.' '.$transfered_quantity." ".$remained_capacity)."<br>";
                                }
                                else{
                                    $selected_transfer_requests=[];//reset prev values
                                    $selected_transfer_requestIds=[];
                                    foreach ($filtered_transfer_requests->whereIn('id', $remained_valid_competitors->pluck('id'))->get() as $transferRequest) {
                                        $attrName=$this->category->shortCode;
                                        $isQualified=true;
                                        if($attrName=='isEthinic'){
                                            $isQualified=$current_school->isEthinic=='false' || $transferRequest->$attrName=='true';
                                        }
                                        else
                                            $isQualified=$transferRequest->teacher!=null && $transferRequest->teacher->$attrName=='true'? true: false;

                                        if($isQualified)
                                            array_push($selected_transfer_requestIds, $transferRequest->id);
                                    }
                                    $selected_transfer_requests=transfer_requests_from_school_to_school::whereIn('id', $selected_transfer_requestIds)->get();

                                    //preceed to next criteria if more than remained_capacity as all are valid
                                    if(count($selected_transfer_requests)>$remained_capacity)
                                        continue;
                                    $random_winners=$this->getRandomSchoolWinners($selected_transfer_requests, $remained_capacity);
                                    
                                    //$lastRow=$selected_transfer_requests->last();
                                    $remained_valid_competitors=$filtered_transfer_requests->whereNotIn('id', $random_winners->pluck('id'))->get();

                                    //$temp_selected_least_score_rows=$selected_transfer_requests->where($category->shortCode, $lastRow->calculatedServiceYears)->get();

                                    $transfered_quantity += count($random_winners);
                                    $currentTransferCount=count($random_winners);
                                    $remained_capacity -= $currentTransferCount;
                                    foreach ($random_winners as $random_winner) {
                                        array_push($transferResults, $random_winner);
                                    }

                               // echo ($category->shortCode.' '.$transfered_quantity." ".$remained_capacity)."<br>";

                                // if($category->shortCode=='isDisabled')
                                // dd($category->shortCode.' '.$transfered_quantity." ".$remained_capacity);

                                }
                            }
                            //IF $REMAINED_CAPACITY > 0 && transfered_quantity < #REQUESTS MAKE RADOM SELECTION
                }

//-----make rando selection for remaining requests
$transferdIds=array();                
foreach ($transferResults as $result) {
array_push($transferdIds, $result->id);
}

$transferQuantityCheckSum=$schoolCapacity->quantity;
if($transferQuantityCheckSum > count($transfer_requests_from_school_to_schools->get())){
    $transferQuantityCheckSum=count($transfer_requests_from_school_to_schools->get());
}

if($transfered_quantity  < $transferQuantityCheckSum){
    $remainingQty=$transferQuantityCheckSum - $transfered_quantity;
    $random_winners=$this->getRandomSchoolWinners($transfer_requests_from_school_to_schools->whereNotIn('id', $transferdIds)->get(), $remainingQty);
    //dd($random_winners);
   // echo 'random selected: '.count($random_winners)."<br>";
    foreach ($random_winners as $random_winner) {
        array_push($transferResults, $random_winner);
    }
}
//-----end of make rando selection for remaining requests


}
}


//store in db
foreach ($transferResults as $req) {
    $result=transfer_results_from_school_to_school::where('requestId', $req->id)->first();
    if($result==null)
        $result=new transfer_results_from_school_to_school;
    $result->roundId=$roundId;
    $result->requestId=$req->id;
    $result->date=(new \App\Date_class)->getCurrentDate();
    $result->createdByUserId=Auth::guard('web')->user()->id;
    $result->save();
}
    return $transferResults;
}



private function getRandomWeredaWinners($transfer_requests, $capacity){
    $capacity=count($transfer_requests)>$capacity? $capacity: count($transfer_requests);
    $transfer_requestIds=$transfer_requests;//->pluck('id')->toArray();
    $winnerIds=array();
    for ($i=0; $i<$capacity; $i++) {
        $arrLength=count($transfer_requestIds);
        if($arrLength==0)
            continue;
        $randIndex=mt_rand(0, $arrLength-1);//-1 as it is inclusive
        $randItem=$transfer_requestIds[$randIndex];
        /*if(Global_var::existsInArray($winnerIds, $randItem))
            continue;*/
        array_push($winnerIds, $randItem->id);
        $transfer_requestIds=Global_var::removeArrayAt($transfer_requestIds, $randIndex);
    }

    return transfer_requests_from_wereda_to_wereda::whereIn('id', $winnerIds)->get();
}

private function getRandomSchoolWinners($transfer_requests, $capacity){
    $capacity=count($transfer_requests)>$capacity? $capacity: count($transfer_requests);
    $transfer_requestIds=$transfer_requests;//->pluck('id')->toArray();
    $winnerIds=array();
    for ($i=0; $i<$capacity; $i++) {
        $arrLength=count($transfer_requestIds);
        if($arrLength==0)
            continue;
        $randIndex=mt_rand(0, $arrLength-1);//-1 as it is inclusive
        $randItem=$transfer_requestIds[$randIndex];
        /*if(Global_var::existsInArray($winnerIds, $randItem))
            continue;*/
        array_push($winnerIds, $randItem->id);
        $transfer_requestIds=Global_var::removeArrayAt($transfer_requestIds, $randIndex);
    }

    return transfer_requests_from_school_to_school::whereIn('id', $winnerIds)->get();
}


private function getRandomNumbers($array){
    $shuffled_array=array();
    $output_size=count($array);
    $arrLength=$output_size;
    for ($i=0; $i<$output_size; $i++) {
        $randIndex=mt_rand(0, $arrLength-1);//-1 as it is inclusive
        $randItem=$array[$randIndex];
        array_push($shuffled_array, $randItem);
        $array=Global_var::removeArrayAt($array, $randIndex);
        $arrLength=count($array);
    }
    return $shuffled_array;
}


}
