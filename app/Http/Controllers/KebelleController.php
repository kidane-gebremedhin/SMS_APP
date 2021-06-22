<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kebelle;
use DB;
use Auth;

class KebelleController extends Controller
{
    public $paginationSize;
    public $vatPercent=15;
    
    public function __construct(){
        $this->middleware('auth:web')->except('region_zones', 'zone_weredas', 'wereda_tabyas', 'wereda_subWeredas', 'tabya_kebelles', 'unAssigned_zone_weredas', 'unAssigned_wereda_tabyas', 'unAssigned_tabya_kebelles');
    
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       
       $kebelles=kebelle::orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("kebelles.ajax.index")->withKebelles($kebelles);

       return view("kebelles.http.index")->withKebelles($kebelles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
        $tabyas=DB::table('tabyas')->pluck('name', 'id')->toArray();
		$weredas=DB::table('weredas')->pluck('name', 'id')->toArray();
        $zones=DB::table('zones')->pluck('name', 'id')->toArray();
	$regions=DB::table('regions')->pluck("name", "id")->toArray();
    if($request->ajax())
	    return view('kebelles.ajax.create')->withWeredas($weredas)->withZones($zones)->withTabyas($tabyas)->with('regions', $regions);

	    return view('kebelles.http.create')->withWeredas($weredas)->withZones($zones)->withTabyas($tabyas)->with('regions', $regions);
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
            'tabyaId'=>'required|integer',
            'name'=>'required',
            ]);
        $oldKebelle=kebelle::where("regionId", "=", $request->regionId)->where("zoneId", "=", $request->zoneId)->where("weredaId", "=", $request->weredaId)->where("tabyaId", "=", $request->tabyaId)->where("name", "=", $request->name)->first();
        if($oldKebelle!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
             return back();
        }

        $Kebelle=new kebelle;
        $Kebelle->regionId=$request->regionId;
        $Kebelle->zoneId=$request->zoneId;
        $Kebelle->weredaId=$request->weredaId;
        $Kebelle->tabyaId=$request->tabyaId;
        $Kebelle->name=$request->name;
        $Kebelle->remark=$request->remark;
        $Kebelle->createdByUserId=Auth::guard('web')->user()->id;
        $Kebelle->save();
        return redirect()->route("kebelles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $Kebelle=kebelle::find($id);
        if($request->ajax())
            return view("kebelles.ajax.show")->withKebelle($Kebelle);
        return view("kebelles.http.show")->withKebelle($Kebelle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
		$Kebelle=kebelle::find($id);
    $tabyas=DB::table('tabyas')->pluck('name', 'id')->toArray();
	$weredas=DB::table('weredas')->pluck('name', 'id')->toArray();
    $zones=DB::table('zones')->pluck('name', 'id')->toArray();
	$regions=DB::table('regions')->pluck("name", "id")->toArray();
    if($request->ajax())
	    return view('kebelles.ajax.edit')->withKebelle($Kebelle)->withWeredas($weredas)->withZones($zones)->withTabyas($tabyas)->with('regions', $regions);

	    return view('kebelles.http.edit')->withKebelle($Kebelle)->withWeredas($weredas)->withZones($zones)->withTabyas($tabyas)->with('regions', $regions);
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
        $kebelle=kebelle::where("regionId", "=", $request->regionId)->where('zoneId', '=', $request->zoneId)->where('weredaId', '=', $request->weredaId)->where("name", "=", $request->name)->first();
        if($kebelle!=null && $kebelle->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
        
        $this->validate($request, [
            'regionId'=>'required|integer',
            'zoneId'=>'required|integer',
            'weredaId'=>'required|integer',
            'tabyaId'=>'required|integer',
            'name'=>'required',
            ]);

       $Kebelle=kebelle::find($id);
        $Kebelle->regionId=$request->regionId;
        $Kebelle->zoneId=$request->zoneId;
        $Kebelle->weredaId=$request->weredaId;
        $Kebelle->tabyaId=$request->tabyaId;
        $Kebelle->name=$request->name;
        $Kebelle->remark=$request->remark;
        $Kebelle->createdByUserId=Auth::guard('web')->user()->id;
        $Kebelle->save();

        return redirect()->route("kebelles.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $Kebelle=kebelle::find($id);
       if($request->ajax())
        return view('kebelles.ajax.delete-confirm')->withKebelle($Kebelle);
        
        return view('kebelles.http.delete-confirm')->withKebelle($Kebelle);
    }
 	public function destroy($id, Request $request)
    {
        $Kebelle=kebelle::find($id);
        $Kebelle->delete();

        return redirect()->route('kebelles.index');
    }

    
    public function region_zones($regionId){
      $zone=DB::table('zones')->where('regionId', '=', $regionId)->pluck('name', 'id')->toArray();
      return $zone;
    }
    public function zone_weredas($zoneId){
      $weredas=DB::table('weredas')->where('zoneId', '=', $zoneId)->pluck('name', 'id')->toArray();
      return $weredas;
    }
    public function wereda_schools($weredaId){
      $schools=DB::table('schools')->where('weredaId', '=', $weredaId)->pluck('name', 'id')->toArray();
      return $schools;
    }
    public function wereda_tabyas($weredaId){
      $tabyas=DB::table('tabyas')->where('weredaId', '=', $weredaId)->pluck('name', 'id')->toArray();
      return $tabyas;
    }

    public function wereda_subWeredas($weredaId){
      $sub_weredas=DB::table('sub_weredas')->where('weredaId', '=', $weredaId)->pluck('name', 'id')->toArray();
      return $sub_weredas;
    }

    public function tabya_kebelles($tabyaId){
      $kebelles=DB::table('kebelles')->where('tabyaId', '=', $tabyaId)->pluck('name', 'id')->toArray();
      return $kebelles;
    }
    
    public function unAssigned_zone_weredas($zoneId){
     /* $Assigned_weredas=DB::table('user_zone_wereda_kebelles')->where('zoneId', '=', $zoneId)->pluck('weredaId')->toArray();
      $weredas=DB::table('weredas')->where('zoneId', '=', $zoneId)->whereNotIn('id', $Assigned_weredas)->pluck('name', 'id')->toArray();*/
      $weredas=DB::table('weredas')->where('zoneId', '=', $zoneId)->pluck('name', 'id')->toArray();

      return $weredas;
    }
    public function unAssigned_wereda_tabyas($weredaId){
      $Assigned_tabyas=DB::table('user_zone_wereda_kebelles')->where('weredaId', '=', $weredaId)->pluck('tabyaId')->toArray();
      $tabyas=DB::table('tabyas')->where('weredaId', '=', $weredaId)->whereNotIn('id', $Assigned_tabyas)->pluck('name', 'id')->toArray();

      return $tabyas;
    }
    public function unAssigned_tabya_kebelles($tabyaId){
      $Assigned_kebelles=DB::table('user_zone_wereda_kebelles')->where('tabyaId', '=', $tabyaId)->pluck('kebelleId')->toArray();
      $kebelles=DB::table('kebelles')->where('tabyaId', '=', $tabyaId)->whereNotIn('kebelleId', $Assigned_kebelles)->pluck('name', 'id')->toArray();
      return $kebelles;
    }

}
