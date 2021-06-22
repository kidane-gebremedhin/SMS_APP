<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\zone;
use Auth;
use DB;

class zoneController extends Controller
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
       $zones=zone::where('isDeleted', 'false')->whereIn('id', $currentUser->zones()->pluck('id'))->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("zones.ajax.index")->withZones($zones);

       return view("zones.http.index")->withZones($zones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
       $regions=DB::table('regions')->pluck("name", "id")->toArray();
        
	if($request->ajax())
	    return view('zones.ajax.create')->with('regions', $regions);

	    return view('zones.http.create')->with('regions', $regions);
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
            'name'=>'required'
            ]);
 $zone=zone::where("regionId", "=", $request->regionId)->where('name', '=', $request->name)->first();
        if($zone!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
        $zone=new zone;
        $zone->regionId=$request->regionId;
        $zone->name=$request->name;
        $zone->remark=$request->remark;
        $zone->createdByUserId=Auth::guard('web')->user()->id;
        $zone->save();
        return redirect()->route("zones.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $zone=zone::find($id);
        if($request->ajax())
            return view("zones.ajax.show")->withZone($zone);
        return view("zones.http.show")->withZone($zone);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$zone=zone::find($id);
       $regions=DB::table('regions')->pluck("name", "id")->toArray();
        
	if($request->ajax())
	    return view('zones.ajax.edit')->withZone($zone)->with('regions', $regions);;

	    return view('zones.http.edit')->withZone($zone)->with('regions', $regions);;
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
        $zone=zone::where("regionId", "=", $request->regionId)->where('name', '=', $request->name)->first();
        if($zone!=null && $zone->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'regionId'=>'required|integer',
            'name'=>'required'
            ]);

        $zone=zone::find($id);
        $zone->regionId=$request->regionId;
        $zone->name=$request->name;
        $zone->remark=$request->remark;
        $zone->createdByUserId=Auth::guard('web')->user()->id;
        $zone->save();

        return redirect()->route("zones.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $zone=zone::find($id);
       if($request->ajax())
        return view('zones.ajax.delete-confirm')->withZone($zone);
        
        return view('zones.http.delete-confirm')->withZone($zone);
    }
 	public function destroy($id, Request $request)
    {
        $zone=zone::find($id);
        $zone->delete();

        return redirect()->route('zones.index');
    }

}
