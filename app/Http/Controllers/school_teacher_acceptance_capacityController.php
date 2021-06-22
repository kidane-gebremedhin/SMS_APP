<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\school_teacher_acceptance_capacity;
use Auth;
use DB;

class school_teacher_acceptance_capacityController extends Controller
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
       $school_teacher_acceptance_capacities=school_teacher_acceptance_capacity::where('isDeleted', 'false')->whereIn('schoolId', $currentUser->schools()->pluck('id'))->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("school_teacher_acceptance_capacities.ajax.index")->with('school_teacher_acceptance_capacities', $school_teacher_acceptance_capacities);

       return view("school_teacher_acceptance_capacities.http.index")->with('school_teacher_acceptance_capacities', $school_teacher_acceptance_capacities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
    $currentUser=Auth::guard('web')->user();              
    $regions=DB::table('regions')->pluck("name", "id")->toArray();
    $zones=DB::table('zones')->where('regionId', $currentUser->regionId)->pluck('name', 'id')->toArray();
    $schools=DB::table('schools');
    if($currentUser->isZone())
        $schools=$schools->where('zoneId', $currentUser->zoneId);
    if($currentUser->isWereda())
        $schools=$schools->where('weredaId', $currentUser->weredaId);
    if($currentUser->isSchool())
        $schools=$schools->where('id', $currentUser->schoolId);
    $schools=$schools->pluck('name', 'id')->toArray();

    $rounds=DB::table('rounds')->pluck('name', 'id')->toArray();
    $subjects=DB::table('subjects')->pluck('name', 'id')->toArray();
    $educational_levels=DB::table('educational_levels')->pluck('name', 'id')->toArray();
    $request_types=DB::table('request_types')->pluck('name', 'id')->toArray();
        
	if($request->ajax())
	    return view('school_teacher_acceptance_capacities.ajax.create')->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types);

	    return view('school_teacher_acceptance_capacities.http.create')->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types);
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
            'roundId'=>'required',
            'requestTypeId'=>'required',
            'schoolId'=>'required',
            'educationalLevelId'=>'required',
            'subjectId'=>'required',
            ]);

        $school_teacher_acceptance_capacity=school_teacher_acceptance_capacity::where('roundId', $request->roundId)->where('requestTypeId', $request->requestTypeId)->where('schoolId', $request->schoolId)->where('educationalLevelId', $request->educationalLevelId)->where('subjectId', $request->subjectId)->first();
        if($school_teacher_acceptance_capacity!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $school_teacher_acceptance_capacity=new school_teacher_acceptance_capacity;
        $school_teacher_acceptance_capacity->roundId=$request->roundId;
        $school_teacher_acceptance_capacity->requestTypeId=$request->requestTypeId;
        $school_teacher_acceptance_capacity->schoolId=$request->schoolId;
        $school_teacher_acceptance_capacity->educationalLevelId=$request->educationalLevelId;
        $school_teacher_acceptance_capacity->subjectId=$request->subjectId;
        $school_teacher_acceptance_capacity->quantity=$request->quantity;
        $school_teacher_acceptance_capacity->date=(new \App\Date_class)->getCurrentDate();
        $school_teacher_acceptance_capacity->remark=$request->remark;
        $school_teacher_acceptance_capacity->createdByUserId=Auth::guard('web')->user()->id;
        $school_teacher_acceptance_capacity->save();
        return redirect()->route("school_teacher_acceptance_capacities.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $school_teacher_acceptance_capacity=school_teacher_acceptance_capacity::find($id);
        if($request->ajax())
            return view("school_teacher_acceptance_capacities.ajax.show")->with('school_teacher_acceptance_capacity', $school_teacher_acceptance_capacity);
        return view("school_teacher_acceptance_capacities.http.show")->with('school_teacher_acceptance_capacity', $school_teacher_acceptance_capacity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {    
    $currentUser=Auth::guard('web')->user();              
    
	$school_teacher_acceptance_capacity=school_teacher_acceptance_capacity::find($id);
    $regions=DB::table('regions')->pluck("name", "id")->toArray();
    $zones=DB::table('zones')->where('regionId', $currentUser->regionId)->pluck('name', 'id')->toArray();
    $schools=DB::table('schools');
    if($currentUser->isZone())
        $schools=$schools->where('zoneId', $currentUser->zoneId);
    if($currentUser->isWereda())
        $schools=$schools->where('weredaId', $currentUser->weredaId);
    if($currentUser->isSchool())
        $schools=$schools->where('id', $currentUser->schoolId);
    $schools=$schools->pluck('name', 'id')->toArray();

    $rounds=DB::table('rounds')->pluck('name', 'id')->toArray();
    $subjects=DB::table('subjects')->pluck('name', 'id')->toArray();
    $educational_levels=DB::table('educational_levels')->pluck('name', 'id')->toArray();
    $request_types=DB::table('request_types')->pluck('name', 'id')->toArray();

	if($request->ajax())
	    return view('school_teacher_acceptance_capacities.ajax.edit')->with('school_teacher_acceptance_capacity', $school_teacher_acceptance_capacity)->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types);

	    return view('school_teacher_acceptance_capacities.http.edit')->with('school_teacher_acceptance_capacity', $school_teacher_acceptance_capacity)->with('regions', $regions)->with('zones', $zones)->with('schools', $schools)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types);
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
            'roundId'=>'required',
            'requestTypeId'=>'required',
            'schoolId'=>'required',
            'educationalLevelId'=>'required',
            'subjectId'=>'required',
            ]);

        $school_teacher_acceptance_capacity=school_teacher_acceptance_capacity::where('roundId', $request->roundId)->where('requestTypeId', $request->requestTypeId)->where('schoolId', $request->schoolId)->where('educationalLevelId', $request->educationalLevelId)->where('subjectId', $request->subjectId)->first();
        if($school_teacher_acceptance_capacity!=null && $school_teacher_acceptance_capacity->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
        $school_teacher_acceptance_capacity=school_teacher_acceptance_capacity::find($id);
        $school_teacher_acceptance_capacity->roundId=$request->roundId;
        $school_teacher_acceptance_capacity->requestTypeId=$request->requestTypeId;
        $school_teacher_acceptance_capacity->schoolId=$request->schoolId;
        $school_teacher_acceptance_capacity->educationalLevelId=$request->educationalLevelId;
        $school_teacher_acceptance_capacity->subjectId=$request->subjectId;
        $school_teacher_acceptance_capacity->quantity=$request->quantity;
        $school_teacher_acceptance_capacity->date=(new \App\Date_class)->getCurrentDate();
        $school_teacher_acceptance_capacity->remark=$request->remark;
        $school_teacher_acceptance_capacity->updatedByUserId=Auth::guard('web')->user()->id;
        $school_teacher_acceptance_capacity->save();
        return redirect()->route("school_teacher_acceptance_capacities.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $school_teacher_acceptance_capacity=school_teacher_acceptance_capacity::find($id);
       if($request->ajax())
        return view('school_teacher_acceptance_capacities.ajax.delete-confirm')->with('school_teacher_acceptance_capacity', $school_teacher_acceptance_capacity);
        
        return view('school_teacher_acceptance_capacities.http.delete-confirm')->with('school_teacher_acceptance_capacity', $school_teacher_acceptance_capacity);
    }
 	public function destroy($id, Request $request)
    {
        $school_teacher_acceptance_capacity=school_teacher_acceptance_capacity::find($id);
        $school_teacher_acceptance_capacity->isDeleted='true';
        $school_teacher_acceptance_capacity->deletedByUserId=$request->deletedByUserId;
        $school_teacher_acceptance_capacity->save();

        return redirect()->route('school_teacher_acceptance_capacities.index');
    }

}
