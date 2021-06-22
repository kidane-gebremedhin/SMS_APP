<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\location;
use Auth;
use DB;

class locationController extends Controller
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
       
       $locations=location::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("locations.ajax.index")->with('locations', $locations);

       return view("locations.http.index")->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
	if($request->ajax())
	    return view('locations.ajax.create');

	    return view('locations.http.create');
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
            'name'=>'required'
            ]);

        $location=location::where('name', '=', $request->name)->first();
        if($location!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $location=new location;
        $location->name=$request->name;
        $location->remark=$request->remark;
        $location->createdByUserId=Auth::guard('web')->user()->id;
        $location->save();
        return redirect()->route("locations.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $location=location::find($id);
        if($request->ajax())
            return view("locations.ajax.show")->with('location', $location);
        return view("locations.http.show")->with('location', $location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$location=location::find($id);
        
	if($request->ajax())
	    return view('locations.ajax.edit')->with('location', $location);

	    return view('locations.http.edit')->with('location', $location);
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
        $location=location::where('name', '=', $request->name)->first();
        if($location!=null && $location->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $location=location::find($id);
        $location->name=$request->name;
        $location->remark=$request->remark;
        $location->createdByUserId=Auth::guard('web')->user()->id;
        $location->save();

        return redirect()->route("locations.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $location=location::find($id);
       if($request->ajax())
        return view('locations.ajax.delete-confirm')->with('location', $location);
        
        return view('locations.http.delete-confirm')->with('location', $location);
    }
 	public function destroy($id, Request $request)
    {
        $location=location::find($id);
        $location->delete();

        return redirect()->route('locations.index');
    }

}
