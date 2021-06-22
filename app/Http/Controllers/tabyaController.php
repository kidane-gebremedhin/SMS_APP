<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabya;
use DB;
use Auth;
use Session;

class tabyaController extends Controller
{
    public $paginationSize;
    public $vatPercent=15;
    
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
       
       $tabyas=tabya::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("tabyas.ajax.index")->withTabyas($tabyas);

       return view("tabyas.http.index")->withTabyas($tabyas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
		$weredas=DB::table('weredas')->pluck('name', 'id')->toArray();
        $zones=DB::table('zones')->pluck('name', 'id')->toArray();
        $regions=DB::table('regions')->pluck("name", "id")->toArray();
	if($request->ajax())
	    return view('tabyas.ajax.create')->withWeredas($weredas)->withZones($zones)->with('regions', $regions);

	    return view('tabyas.http.create')->withWeredas($weredas)->withZones($zones)->with('regions', $regions);
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
            'name'=>'required',
            ]);
        $oldtabya=tabya::where("regionId", "=", $request->regionId)->where("zoneId", "=", $request->zoneId)->where("weredaId", "=", $request->weredaId)->where("name", "=", $request->name)->first();
        if($oldtabya!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }

        $tabya=new tabya;
        $tabya->regionId=$request->regionId;
        $tabya->zoneId=$request->zoneId;
        $tabya->weredaId=$request->weredaId;
        $tabya->name=$request->name;
        $tabya->remark=$request->remark;
        $tabya->createdByUserId=Auth::guard('web')->user()->id;
        $tabya->save();
        return redirect()->route("tabyas.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $tabya=tabya::find($id);
        if($request->ajax())
            return view("tabyas.ajax.show")->withTabya($tabya);
        return view("tabyas.http.show")->withTabya($tabya);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
		$tabya=tabya::find($id);
	$weredas=DB::table('weredas')->pluck('name', 'id')->toArray();
        $zones=DB::table('zones')->pluck('name', 'id')->toArray();
	$regions=DB::table('regions')->pluck("name", "id")->toArray();
    if($request->ajax())
	    return view('tabyas.ajax.edit')->withTabya($tabya)->withWeredas($weredas)->withZones($zones)->with('regions', $regions);

	    return view('tabyas.http.edit')->withTabya($tabya)->withWeredas($weredas)->withZones($zones)->with('regions', $regions);
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
        $tabya=tabya::where("regionId", "=", $request->regionId)->where('zoneId', '=', $request->zoneId)->where('weredaId', '=', $request->weredaId)->where("name", "=", $request->name)->first();
        if($tabya!=null && $tabya->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
        $this->validate($request, [
            'regionId'=>'required|integer',
            'zoneId'=>'required|integer',
            'weredaId'=>'required|integer',
            'name'=>'required',
            ]);

       $tabya=tabya::find($id);
        $tabya->regionId=$request->regionId;
        $tabya->zoneId=$request->zoneId;
        $tabya->weredaId=$request->weredaId;
        $tabya->name=$request->name;
        $tabya->remark=$request->remark;
        $tabya->createdByUserId=Auth::guard('web')->user()->id;
        $tabya->save();

        return redirect()->route("tabyas.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $tabya=tabya::find($id);
       if($request->ajax())
        return view('tabyas.ajax.delete-confirm')->withTabya($tabya);
        
        return view('tabyas.http.delete-confirm')->withTabya($tabya);
    }
 	public function destroy(Request $request, $id)
    {
        $tabya=tabya::find($id);
         $ጣብያ_ሃፍቲ_ተፈጥሮታት=$tabya->ጣብያ_ማሕበራት;
         $ጣብያ_ማሕበራት=$tabya->ጣብያ_ትካላት;
         $ጣብያ_ትካላት=$tabya->ጣብያ_ሃፍቲ_ተፈጥሮታት;
       if(count($ጣብያ_ሃፍቲ_ተፈጥሮታት)>0 || count($ጣብያ_ማሕበራት)>0 || count($ጣብያ_ትካላት)>0){
        if($request->ajax())
            return ['error', 'Error! ትካላት ፣ ማሕበራት ፣ ሃፍቲታት ተፈጥሮ ዝሓዘ ጣብያ ምስራዝ ኣይከኣልን። ብቅድሚያ ምስ ጣብያ '.$tabya->name.' ዝተተሓሓዘ ሓበሬታ ይሰርዙ።'];
        return back();
        }
        $tabya->delete();

        Session::flash('danger', 'Error! ትካላት ፣ ማሕበራት ፣ ሃፍቲታት ተፈጥሮ ዝሓዘ ጣብያ ምስራዝ ኣይከኣልን። ብቅድሚያ ምስ ጣብያ '.$tabya->name.' ዝተተሓሓዘ ሓበሬታ ይሰርዙ።');
        return redirect()->route('tabyas.index');
    }

}
