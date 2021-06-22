<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transfer_requests_from_school_to_school;
use App\teacher;
use Auth;
use DB;

class transfer_requests_from_school_to_schoolController extends Controller
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
       $currentUser=Auth::guard('web')->user();       
       $transfer_requests_from_school_to_schools=transfer_requests_from_school_to_school::where('isDeleted', 'false')->whereIn('toSchoolId', $currentUser->schools()->pluck('id'))->orderBy("id", "desc")->paginate($this->paginationSize);
       $transfer_requests_from_school_to_schools_out=transfer_requests_from_school_to_school::where('isDeleted', 'false')->whereIn('fromSchoolId', $currentUser->schools()->pluck('id'))->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("transfer_requests_from_school_to_schools.ajax.index")->with('transfer_requests_from_school_to_schools', $transfer_requests_from_school_to_schools)->with('transfer_requests_from_school_to_schools_out', $transfer_requests_from_school_to_schools_out);

       return view("transfer_requests_from_school_to_schools.http.index")->with('transfer_requests_from_school_to_schools', $transfer_requests_from_school_to_schools)->with('transfer_requests_from_school_to_schools_out', $transfer_requests_from_school_to_schools_out);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
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
	    return view('transfer_requests_from_school_to_schools.ajax.create')->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types)->with('jobs', $jobs)->with('teachers', $teachers)->with('years', $years)->with('genders', $genders);

	    return view('transfer_requests_from_school_to_schools.http.create')->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types)->with('jobs', $jobs)->with('teachers', $teachers)->with('years', $years)->with('genders', $genders);
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

        $transfer_requests_from_school_to_school=transfer_requests_from_school_to_school::where('teacherId', $request->teacherId)->where('roundId', $request->roundId)->where('requestTypeId', $request->requestTypeId)->first();
        if($transfer_requests_from_school_to_school!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }


    $marriageInfoAttachement_path=null;
    $isDisabledAttachement_path=null;
    $healthIssueInfoAttachement_path=null;
    $appointmentInfoAttachement_path=null;
    //Upload marriageInfoAttachement
    if($request->hasFile('marriageInfoAttachement')){
            $file = $request->file('marriageInfoAttachement');
            $filename = time().'-'.$file->getClientOriginalName();
            $public_path = 'images/attachments/';
            //File::mkdir($public_path);
            $file->move($public_path, $filename);
            $marriageInfoAttachement_path=$public_path.$filename;
        }

    //Upload isDisabledAttachement
    if($request->hasFile('isDisabledAttachement')){
            $file = $request->file('isDisabledAttachement');
            $filename = time().'-'.$file->getClientOriginalName();
            $public_path = 'images/attachments/';
            //File::mkdir($public_path);
            $file->move($public_path, $filename);
            $isDisabledAttachement_path=$public_path.$filename;
        }

    //Upload healthIssueInfoAttachement
    if($request->hasFile('healthIssueInfoAttachement')){
            $file = $request->file('healthIssueInfoAttachement');
            $filename = time().'-'.$file->getClientOriginalName();
            $public_path = 'images/attachments/';
            //File::mkdir($public_path);
            $file->move($public_path, $filename);
            $healthIssueInfoAttachement_path=$public_path.$filename;
        }

    //Upload appointmentInfoAttachement
    if($request->hasFile('appointmentInfoAttachement')){
            $file = $request->file('appointmentInfoAttachement');
            $filename = time().'-'.$file->getClientOriginalName();
            $public_path = 'images/attachments/';
            //File::mkdir($public_path);
            $file->move($public_path, $filename);
            $appointmentInfoAttachement_path=$public_path.$filename;
        }

        $teacher=new teacher;
        $teacher->firstName=$request->firstName;
        $teacher->lastName=$request->lastName;
        $teacher->middleName=$request->middleName;
        $teacher->gender=$request->gender;
        $teacher->recruitmentYear=$request->recruitmentYear;

        $teacher->maritalStatus=$request->maritalStatus=='on'? 'true':'false';
        $teacher->hasProvidedMarriageInfo=$request->hasProvidedMarriageInfo=='on'? 'true':'false';
        if($marriageInfoAttachement_path!=null)
            $teacher->marriageInfoAttachement=$marriageInfoAttachement_path;
        //$teacher->marriageInfoAttachement=$request->marriageInfoAttachement;
        $teacher->merriagePartnerId=$request->merriagePartnerId;
        $teacher->merriagePartnerWeredaId=$request->merriagePartnerWeredaId;
        $teacher->merriagePartnerSchoolId=$request->merriagePartnerSchoolId;

        $teacher->hasHealthIssue=$request->hasHealthIssue=='on'? 'true':'false';
        $teacher->isDisabled=$request->isDisabled=='on'? 'true':'false';
        if($isDisabledAttachement_path!=null)
            $teacher->isDisabledAttachement=$isDisabledAttachement_path;
        //$teacher->isDisabledAttachement=$request->isDisabledAttachement;
        $teacher->hasProvidedHealthIssueInfo=$request->hasProvidedHealthIssueInfo=='on'? 'true':'false';
        if($healthIssueInfoAttachement_path!=null)
            $teacher->healthIssueInfoAttachement=$healthIssueInfoAttachement_path;
        //$teacher->healthIssueInfoAttachement=$request->healthIssueInfoAttachement;

        $teacher->isAppointed=$request->isAppointed=='on'? 'true':'false';
        $teacher->hasProvidedAppointmentInfo=$request->hasProvidedAppointmentInfo=='on'? 'true':'false';
        if($appointmentInfoAttachement_path!=null)
            $teacher->appointmentInfoAttachement=$appointmentInfoAttachement_path;
        //$teacher->appointmentInfoAttachement=$request->appointmentInfoAttachement;

        $teacher->educationalLevelId=$request->educationalLevelId;
        $teacher->regularJobId=$request->regularJobId;
        $teacher->graduatedSubjectId=$request->graduatedSubjectId;
        $teacher->teachingSubjectId=$request->teachingSubjectId;
        $teacher->save();

        $transfer_requests_from_school_to_school=new transfer_requests_from_school_to_school;
        $transfer_requests_from_school_to_school->teacherId=$teacher->id;
        $transfer_requests_from_school_to_school->roundId=$request->roundId;
        $transfer_requests_from_school_to_school->requestTypeId=$request->requestTypeId;
        $transfer_requests_from_school_to_school->actualServiceYears=$request->actualServiceYears;
        $transfer_requests_from_school_to_school->calculatedServiceYears=$transfer_requests_from_school_to_school->actualServiceYears + $request->bonusServiceYears;
        $transfer_requests_from_school_to_school->transferReason=$request->transferReason;
        $transfer_requests_from_school_to_school->isWillingToTransferAlone=$request->isWillingToTransferAlone=='on'? 'true':'false';
        $transfer_requests_from_school_to_school->isEthinic=$request->isEthinic=='on'? 'true':'false';
        $transfer_requests_from_school_to_school->fromSchoolId=$request->fromSchoolId;
        $transfer_requests_from_school_to_school->toSchoolId=$request->toSchoolId;
        $transfer_requests_from_school_to_school->date=(new \App\Date_class)->getCurrentDate();
        $transfer_requests_from_school_to_school->remark=$request->remark;
        $transfer_requests_from_school_to_school->createdByUserId=Auth::guard('web')->user()->id;
        $transfer_requests_from_school_to_school->save();
        return redirect()->route("transfer_requests_from_school_to_schools.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $transfer_requests_from_school_to_school=transfer_requests_from_school_to_school::find($id);
        if($request->ajax())
            return view("transfer_requests_from_school_to_schools.ajax.show")->with('transfer_requests_from_school_to_school', $transfer_requests_from_school_to_school);
        return view("transfer_requests_from_school_to_schools.http.show")->with('transfer_requests_from_school_to_school', $transfer_requests_from_school_to_school);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$transfer_requests_from_school_to_school=transfer_requests_from_school_to_school::find($id);
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
	    return view('transfer_requests_from_school_to_schools.ajax.edit')->with('transfer_requests_from_school_to_school', $transfer_requests_from_school_to_school)->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types)->with('jobs', $jobs)->with('teachers', $teachers)->with('years', $years)->with('genders', $genders);

	    return view('transfer_requests_from_school_to_schools.http.edit')->with('transfer_requests_from_school_to_school', $transfer_requests_from_school_to_school)->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types)->with('jobs', $jobs)->with('teachers', $teachers)->with('years', $years)->with('genders', $genders);
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

        $transfer_requests_from_school_to_school=transfer_requests_from_school_to_school::where('teacherId', $request->teacherId)->where('roundId', $request->roundId)->where('requestTypeId', $request->requestTypeId)->first();
        if($transfer_requests_from_school_to_school!=null && $transfer_requests_from_school_to_school->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
            }


    $marriageInfoAttachement_path=null;
    $isDisabledAttachement_path=null;
    $healthIssueInfoAttachement_path=null;
    $appointmentInfoAttachement_path=null;
    //Upload marriageInfoAttachement
    if($request->hasFile('marriageInfoAttachement')){
            $file = $request->file('marriageInfoAttachement');
            $filename = time().'-'.$file->getClientOriginalName();
            $public_path = 'images/attachments/';
            //File::mkdir($public_path);
            $file->move($public_path, $filename);
            $marriageInfoAttachement_path=$public_path.$filename;
        }

    //Upload isDisabledAttachement
    if($request->hasFile('isDisabledAttachement')){
            $file = $request->file('isDisabledAttachement');
            $filename = time().'-'.$file->getClientOriginalName();
            $public_path = 'images/attachments/';
            //File::mkdir($public_path);
            $file->move($public_path, $filename);
            $isDisabledAttachement_path=$public_path.$filename;
        }

    //Upload healthIssueInfoAttachement
    if($request->hasFile('healthIssueInfoAttachement')){
            $file = $request->file('healthIssueInfoAttachement');
            $filename = time().'-'.$file->getClientOriginalName();
            $public_path = 'images/attachments/';
            //File::mkdir($public_path);
            $file->move($public_path, $filename);
            $healthIssueInfoAttachement_path=$public_path.$filename;
        }

    //Upload appointmentInfoAttachement
    if($request->hasFile('appointmentInfoAttachement')){
            $file = $request->file('appointmentInfoAttachement');
            $filename = time().'-'.$file->getClientOriginalName();
            $public_path = 'images/attachments/';
            //File::mkdir($public_path);
            $file->move($public_path, $filename);
            $appointmentInfoAttachement_path=$public_path.$filename;
        }
        
        $transfer_requests_from_school_to_school=transfer_requests_from_school_to_school::find($id);
        $transfer_requests_from_school_to_school->roundId=$request->roundId;
        $transfer_requests_from_school_to_school->requestTypeId=$request->requestTypeId;
        $transfer_requests_from_school_to_school->actualServiceYears=$request->actualServiceYears;
        $transfer_requests_from_school_to_school->calculatedServiceYears=$transfer_requests_from_school_to_school->actualServiceYears + $request->bonusServiceYears;
        $transfer_requests_from_school_to_school->transferReason=$request->transferReason;
        $transfer_requests_from_school_to_school->isWillingToTransferAlone=$request->isWillingToTransferAlone=='on'? 'true':'false';
        $transfer_requests_from_school_to_school->isEthinic=$request->isEthinic=='on'? 'true':'false';
        $transfer_requests_from_school_to_school->fromSchoolId=$request->fromSchoolId;
        $transfer_requests_from_school_to_school->toSchoolId=$request->toSchoolId;
        $transfer_requests_from_school_to_school->remark=$request->remark;
        $transfer_requests_from_school_to_school->updatedByUserId=Auth::guard('web')->user()->id;
        $transfer_requests_from_school_to_school->save();


        $teacher=$transfer_requests_from_school_to_school->teacher;
        if($teacher==null)
            $teacher=new teacher;
        $teacher->firstName=$request->firstName;
        $teacher->lastName=$request->lastName;
        $teacher->middleName=$request->middleName;
        $teacher->gender=$request->gender;
        $teacher->recruitmentYear=$request->recruitmentYear;

        $teacher->maritalStatus=$request->maritalStatus=='on'? 'true':'false';
        $teacher->hasProvidedMarriageInfo=$request->hasProvidedMarriageInfo=='on'? 'true':'false';
        if($marriageInfoAttachement_path!=null)
            $teacher->marriageInfoAttachement=$marriageInfoAttachement_path;
        //$teacher->marriageInfoAttachement=$request->marriageInfoAttachement;
        $teacher->merriagePartnerId=$request->merriagePartnerId;
        $teacher->merriagePartnerWeredaId=$request->merriagePartnerWeredaId;
        $teacher->merriagePartnerSchoolId=$request->merriagePartnerSchoolId;

        $teacher->hasHealthIssue=$request->hasHealthIssue=='on'? 'true':'false';
        $teacher->isDisabled=$request->isDisabled=='on'? 'true':'false';
        if($isDisabledAttachement_path!=null)
            $teacher->isDisabledAttachement=$isDisabledAttachement_path;
        //$teacher->isDisabledAttachement=$request->isDisabledAttachement;
        $teacher->hasProvidedHealthIssueInfo=$request->hasProvidedHealthIssueInfo=='on'? 'true':'false';
        if($healthIssueInfoAttachement_path!=null)
            $teacher->healthIssueInfoAttachement=$healthIssueInfoAttachement_path;
        //$teacher->healthIssueInfoAttachement=$request->healthIssueInfoAttachement;

        $teacher->isAppointed=$request->isAppointed=='on'? 'true':'false';
        $teacher->hasProvidedAppointmentInfo=$request->hasProvidedAppointmentInfo=='on'? 'true':'false';
        if($appointmentInfoAttachement_path!=null)
            $teacher->appointmentInfoAttachement=$appointmentInfoAttachement_path;
        //$teacher->appointmentInfoAttachement=$request->appointmentInfoAttachement;

        $teacher->educationalLevelId=$request->educationalLevelId;
        $teacher->regularJobId=$request->regularJobId;
        $teacher->graduatedSubjectId=$request->graduatedSubjectId;
        $teacher->teachingSubjectId=$request->teachingSubjectId;
        $teacher->save();

        return redirect()->route("transfer_requests_from_school_to_schools.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $transfer_requests_from_school_to_school=transfer_requests_from_school_to_school::find($id);
       if($request->ajax())
        return view('transfer_requests_from_school_to_schools.ajax.delete-confirm')->with('transfer_requests_from_school_to_school', $transfer_requests_from_school_to_school);
        
        return view('transfer_requests_from_school_to_schools.http.delete-confirm')->with('transfer_requests_from_school_to_school', $transfer_requests_from_school_to_school);
    }
 	public function destroy($id, Request $request)
    {
        $transfer_requests_from_school_to_school=transfer_requests_from_school_to_school::find($id);
        $transfer_requests_from_school_to_school->isDeleted='true';
        $transfer_requests_from_school_to_school->deletedByUserId=$request->deletedByUserId;
        $transfer_requests_from_school_to_school->save();

        return redirect()->route('transfer_requests_from_school_to_schools.index');
    }

}
