<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\school;
use App\zone;
use App\wereda;
use Auth;
use DB;

class schoolController extends Controller
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
       $schools=school::where('isDeleted', 'false')->whereIn('id', $currentUser->schools()->pluck('id'))->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("schools.ajax.index")->with('schools', $schools);

       return view("schools.http.index")->with('schools', $schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    $zones=DB::table('zones')->pluck('name', 'id')->toArray();
    $regions=DB::table('regions')->pluck("name", "id")->toArray();
    $weredas=DB::table('weredas')->pluck('name', 'id')->toArray();
    
	if($request->ajax())
	    return view('schools.ajax.create')->with('weredas', $weredas)->with('zones', $zones)->with('regions', $regions);

	    return view('schools.http.create')->with('weredas', $weredas)->with('zones', $zones)->with('regions', $regions);;
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
            'regionId'=>'required|integer',
            'zoneId'=>'required|integer',
            'weredaId'=>'required|integer',
            'name'=>'required'
            ]);

        $school=school::where("weredaId", "=", $request->weredaId)->where('name', '=', $request->name)->first();
        if($school!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
            }
        $school=new school;
        $school->regionId=$request->regionId;
        $school->zoneId=$request->zoneId;
        $school->weredaId=$request->weredaId;
        $school->name=$request->name;
        $school->principal=$request->principal;
        $school->phoneNumber=$request->phoneNumber;
        $school->email=$request->email;
        $school->isEthinic=$request->isEthinic=='on'? 'true':'false';
        $school->remark=$request->remark;
        $school->createdByUserId=Auth::guard('web')->user()->id;
        $school->save();
        return redirect()->route("schools.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $school=school::find($id);
        if($request->ajax())
            return view("schools.ajax.show")->with('school', $school);
        return view("schools.http.show")->with('school', $school);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
       $regions=DB::table('regions')->pluck("name", "id")->toArray();
        $zones=DB::table('zones')->pluck('name', 'id')->toArray();     
       $weredas=DB::table('weredas')->pluck("name", "id")->toArray();
    	$school=school::find($id);
        
	if($request->ajax())
	    return view('schools.ajax.edit')->with('school', $school)->with('weredas', $weredas)->with('zones', $zones)->with('regions', $regions);;

	    return view('schools.http.edit')->with('school', $school)->with('weredas', $weredas)->with('zones', $zones)->with('regions', $regions);;
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
        $school=school::where("weredaId", "=", $request->weredaId)->where('name', '=', $request->name)->first();
        if($school!=null && $school->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
            }
         $this->validate($request, [
            'regionId'=>'required|integer',
            'zoneId'=>'required|integer',
            'weredaId'=>'required|integer',
            'name'=>'required'
            ]);

        $school=school::find($id);
        $school->regionId=$request->regionId;
        $school->zoneId=$request->zoneId;
        $school->weredaId=$request->weredaId;
        $school->name=$request->name;
        $school->principal=$request->principal;
        $school->phoneNumber=$request->phoneNumber;
        $school->email=$request->email;
        $school->isEthinic=$request->isEthinic=='on'? 'true':'false';
        $school->remark=$request->remark;
        $school->createdByUserId=Auth::guard('web')->user()->id;
        $school->save();

        return redirect()->route("schools.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $school=school::find($id);
       if($request->ajax())
        return view('schools.ajax.delete-confirm')->with('school', $school);
        
        return view('schools.http.delete-confirm')->with('school', $school);
    }
 	public function destroy($id, Request $request)
    {
        $school=school::find($id);
        $school->delete();

        return redirect()->route('schools.index');
    }

}
