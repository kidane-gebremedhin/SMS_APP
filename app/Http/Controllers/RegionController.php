<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\region;
use Auth;
use DB;

class regionController extends Controller
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
       
       $regions=region::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("regions.ajax.index")->withRegions($regions);

       return view("regions.http.index")->withRegions($regions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
    $countries=DB::table('countries')->pluck('name', 'id')->toArray();
        
	if($request->ajax())
	    return view('regions.ajax.create')->withCountries($countries);

	    return view('regions.http.create')->withCountries($countries);
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
            'countryId'=>'required',
            'name'=>'required'
            ]);
 $region=region::where('name', '=', $request->name)->first();
        if($region!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $region=new region;
        $region->countryId=$request->countryId;
        $region->name=$request->name;
        $region->remark=$request->remark;
        $region->createdByUserId=Auth::guard('web')->user()->id;
        $region->save();
        return redirect()->route("regions.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $region=region::find($id);
        if($request->ajax())
            return view("regions.ajax.show")->withRegion($region);
        return view("regions.http.show")->withRegion($region);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$region=region::find($id);
    $countries=DB::table('countries')->pluck('name', 'id')->toArray();
        
	if($request->ajax())
	    return view('regions.ajax.edit')->withRegion($region)->withCountries($countries);

	    return view('regions.http.edit')->withRegion($region)->withCountries($countries);
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
        $region=region::where('name', '=', $request->name)->first();
        if($region!=null && $region->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'countryId'=>'required',
            'name'=>'required'
            ]);

        $region=region::find($id);
        $region->countryId=$request->countryId;
        $region->name=$request->name;
        $region->remark=$request->remark;
        $region->createdByUserId=Auth::guard('web')->user()->id;
        $region->save();

        return redirect()->route("regions.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $region=region::find($id);
       if($request->ajax())
        return view('regions.ajax.delete-confirm')->withRegion($region);
        
        return view('regions.http.delete-confirm')->withRegion($region);
    }
 	public function destroy($id, Request $request)
    {
        $region=region::find($id);
        $region->delete();

        return redirect()->route('regions.index');
    }

}
