<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wereda;
use App\zone;
use Auth;
use DB;

class weredaController extends Controller
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
       $weredas=wereda::where('isDeleted', 'false')->whereIn('id', $currentUser->weredas()->pluck('id'))->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("weredas.ajax.index")->withWeredas($weredas);

       return view("weredas.http.index")->withWeredas($weredas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    $zones=DB::table('zones')->pluck('name', 'id')->toArray();
       $regions=DB::table('regions')->pluck("name", "id")->toArray();
    
	if($request->ajax())
	    return view('weredas.ajax.create')->withZones($zones)->with('regions', $regions);

	    return view('weredas.http.create')->withZones($zones)->with('regions', $regions);;
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
            'name'=>'required'
            ]);

        $Wereda=wereda::where("regionId", "=", $request->regionId)->where('zoneId', '=', $request->zoneId)->where('name', '=', $request->name)->first();
        if($Wereda!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
            }
        $Wereda=new wereda;
        $Wereda->regionId=$request->regionId;
        $Wereda->zoneId=$request->zoneId;
        $Wereda->name=$request->name;
        $Wereda->officeHead=$request->officeHead;
        $Wereda->phoneNumber=$request->phoneNumber;
        $Wereda->email=$request->email;
        $Wereda->isEthinic=$request->isEthinic=='on'? 'true':'false';
        $Wereda->remark=$request->remark;
        $Wereda->createdByUserId=Auth::guard('web')->user()->id;
        $Wereda->save();
        return redirect()->route("weredas.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $Wereda=wereda::find($id);
        if($request->ajax())
            return view("weredas.ajax.show")->withWereda($Wereda);
        return view("weredas.http.show")->withWereda($Wereda);
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
	$Wereda=wereda::find($id);
        
	if($request->ajax())
	    return view('weredas.ajax.edit')->withWereda($Wereda)->withZones($zones)->with('regions', $regions);;

	    return view('weredas.http.edit')->withWereda($Wereda)->withZones($zones)->with('regions', $regions);;
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
        $Wereda=wereda::where("regionId", "=", $request->regionId)->where('zoneId', '=', $request->zoneId)->where('name', '=', $request->name)->first();
        if($Wereda!=null && $Wereda->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
            }
         $this->validate($request, [
            'regionId'=>'required|integer',
            'zoneId'=>'required|integer',
            'name'=>'required'
            ]);

        $Wereda=wereda::find($id);
        $Wereda->regionId=$request->regionId;
        $Wereda->zoneId=$request->zoneId;
        $Wereda->name=$request->name;
        $Wereda->officeHead=$request->officeHead;
        $Wereda->phoneNumber=$request->phoneNumber;
        $Wereda->email=$request->email;
        $Wereda->isEthinic=$request->isEthinic=='on'? 'true':'false';
        $Wereda->remark=$request->remark;
        $Wereda->createdByUserId=Auth::guard('web')->user()->id;
        $Wereda->save();

        return redirect()->route("weredas.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $Wereda=wereda::find($id);
       if($request->ajax())
        return view('weredas.ajax.delete-confirm')->withWereda($Wereda);
        
        return view('weredas.http.delete-confirm')->withWereda($Wereda);
    }
 	public function destroy($id, Request $request)
    {
        $Wereda=wereda::find($id);
        $Wereda->delete();

        return redirect()->route('weredas.index');
    }

}
