<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wereda_teacher_acceptance_capacity;
use Auth;
use DB;

class wereda_teacher_acceptance_capacityController extends Controller
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
       $wereda_teacher_acceptance_capacities=wereda_teacher_acceptance_capacity::where('isDeleted', 'false')->whereIn('weredaId', $currentUser->weredas()->pluck('id'))->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("wereda_teacher_acceptance_capacities.ajax.index")->with('wereda_teacher_acceptance_capacities', $wereda_teacher_acceptance_capacities);

       return view("wereda_teacher_acceptance_capacities.http.index")->with('wereda_teacher_acceptance_capacities', $wereda_teacher_acceptance_capacities);
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
    $weredas=DB::table('weredas');
    if($currentUser->isZone())
        $weredas=$weredas->where('zoneId', $currentUser->zoneId);
    if($currentUser->isWereda())
        $weredas=$weredas->where('id', $currentUser->weredaId);
    $weredas=$weredas->pluck('name', 'id')->toArray();
    
    $rounds=DB::table('rounds')->pluck('name', 'id')->toArray();
    $subjects=DB::table('subjects')->pluck('name', 'id')->toArray();
    $educational_levels=DB::table('educational_levels')->pluck('name', 'id')->toArray();
    $request_types=DB::table('request_types')->pluck('name', 'id')->toArray();
        
	if($request->ajax())
	    return view('wereda_teacher_acceptance_capacities.ajax.create')->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types);

	    return view('wereda_teacher_acceptance_capacities.http.create')->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types);
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
            'weredaId'=>'required',
            'educationalLevelId'=>'required',
            'subjectId'=>'required',
            ]);

        $wereda_teacher_acceptance_capacity=wereda_teacher_acceptance_capacity::where('roundId', $request->roundId)->where('requestTypeId', $request->requestTypeId)->where('weredaId', $request->weredaId)->where('educationalLevelId', $request->educationalLevelId)->where('subjectId', $request->subjectId)->first();
        if($wereda_teacher_acceptance_capacity!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $wereda_teacher_acceptance_capacity=new wereda_teacher_acceptance_capacity;
        $wereda_teacher_acceptance_capacity->roundId=$request->roundId;
        $wereda_teacher_acceptance_capacity->requestTypeId=$request->requestTypeId;
        $wereda_teacher_acceptance_capacity->weredaId=$request->weredaId;
        $wereda_teacher_acceptance_capacity->educationalLevelId=$request->educationalLevelId;
        $wereda_teacher_acceptance_capacity->subjectId=$request->subjectId;
        $wereda_teacher_acceptance_capacity->quantity=$request->quantity;
        $wereda_teacher_acceptance_capacity->date=(new \App\Date_class)->getCurrentDate();
        $wereda_teacher_acceptance_capacity->remark=$request->remark;
        $wereda_teacher_acceptance_capacity->createdByUserId=Auth::guard('web')->user()->id;
        $wereda_teacher_acceptance_capacity->save();
        return redirect()->route("wereda_teacher_acceptance_capacities.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $wereda_teacher_acceptance_capacity=wereda_teacher_acceptance_capacity::find($id);
        if($request->ajax())
            return view("wereda_teacher_acceptance_capacities.ajax.show")->with('wereda_teacher_acceptance_capacity', $wereda_teacher_acceptance_capacity);
        return view("wereda_teacher_acceptance_capacities.http.show")->with('wereda_teacher_acceptance_capacity', $wereda_teacher_acceptance_capacity);
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
	$wereda_teacher_acceptance_capacity=wereda_teacher_acceptance_capacity::find($id);
    $regions=DB::table('regions')->pluck("name", "id")->toArray();
    $zones=DB::table('zones')->where('regionId', $currentUser->regionId)->pluck('name', 'id')->toArray();
    $weredas=DB::table('weredas');
    if($currentUser->isZone())
        $weredas=$weredas->where('zoneId', $currentUser->zoneId);
    if($currentUser->isWereda())
        $weredas=$weredas->where('id', $currentUser->weredaId);
    $weredas=$weredas->pluck('name', 'id')->toArray();
        
    $rounds=DB::table('rounds')->pluck('name', 'id')->toArray();
    $subjects=DB::table('subjects')->pluck('name', 'id')->toArray();
    $educational_levels=DB::table('educational_levels')->pluck('name', 'id')->toArray();
    $request_types=DB::table('request_types')->pluck('name', 'id')->toArray();

	if($request->ajax())
	    return view('wereda_teacher_acceptance_capacities.ajax.edit')->with('wereda_teacher_acceptance_capacity', $wereda_teacher_acceptance_capacity)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types);

	    return view('wereda_teacher_acceptance_capacities.http.edit')->with('wereda_teacher_acceptance_capacity', $wereda_teacher_acceptance_capacity)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('rounds', $rounds)->with('subjects', $subjects)->with('educational_levels', $educational_levels)->with('request_types', $request_types);
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
            'weredaId'=>'required',
            'educationalLevelId'=>'required',
            'subjectId'=>'required',
            ]);

        $wereda_teacher_acceptance_capacity=wereda_teacher_acceptance_capacity::where('roundId', $request->roundId)->where('requestTypeId', $request->requestTypeId)->where('weredaId', $request->weredaId)->where('educationalLevelId', $request->educationalLevelId)->where('subjectId', $request->subjectId)->first();
        if($wereda_teacher_acceptance_capacity!=null && $wereda_teacher_acceptance_capacity->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
        $wereda_teacher_acceptance_capacity=wereda_teacher_acceptance_capacity::find($id);
        $wereda_teacher_acceptance_capacity->roundId=$request->roundId;
        $wereda_teacher_acceptance_capacity->requestTypeId=$request->requestTypeId;
        $wereda_teacher_acceptance_capacity->weredaId=$request->weredaId;
        $wereda_teacher_acceptance_capacity->educationalLevelId=$request->educationalLevelId;
        $wereda_teacher_acceptance_capacity->subjectId=$request->subjectId;
        $wereda_teacher_acceptance_capacity->quantity=$request->quantity;
        $wereda_teacher_acceptance_capacity->date=(new \App\Date_class)->getCurrentDate();
        $wereda_teacher_acceptance_capacity->remark=$request->remark;
        $wereda_teacher_acceptance_capacity->updatedByUserId=Auth::guard('web')->user()->id;
        $wereda_teacher_acceptance_capacity->save();
        return redirect()->route("wereda_teacher_acceptance_capacities.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $wereda_teacher_acceptance_capacity=wereda_teacher_acceptance_capacity::find($id);
       if($request->ajax())
        return view('wereda_teacher_acceptance_capacities.ajax.delete-confirm')->with('wereda_teacher_acceptance_capacity', $wereda_teacher_acceptance_capacity);
        
        return view('wereda_teacher_acceptance_capacities.http.delete-confirm')->with('wereda_teacher_acceptance_capacity', $wereda_teacher_acceptance_capacity);
    }
 	public function destroy($id, Request $request)
    {
        $wereda_teacher_acceptance_capacity=wereda_teacher_acceptance_capacity::find($id);
        $wereda_teacher_acceptance_capacity->isDeleted='true';
        $wereda_teacher_acceptance_capacity->deletedByUserId=$request->deletedByUserId;
        $wereda_teacher_acceptance_capacity->save();

        return redirect()->route('wereda_teacher_acceptance_capacities.index');
    }

}
