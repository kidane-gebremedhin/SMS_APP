<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use Auth;
use DB;

class countriesController extends Controller
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
       
       $Countries=country::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("Countries.ajax.index")->withCountries($Countries);

       return view("Countries.http.index")->withCountries($Countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
        
	if($request->ajax())
	    return view('Countries.ajax.create');

	    return view('Countries.http.create');
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

        $country=country::where('name', '=', $request->name)->first();
         if($country!=null){
             if($request->ajax())
                return ['error', "Duplicate_Entry"];
        return back();
        }
        
        $country=new country;
        $country->name=$request->name;
        $country->remark=$request->remark;
        $country->createdByUserId=Auth::guard('web')->user()->id;
        $country->save();
        return redirect()->route("countries.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $country=country::find($id);
        if($request->ajax())
            return view("Countries.ajax.show")->withcountry($country);
        return view("Countries.http.show")->withcountry($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$country=country::find($id);
        
	if($request->ajax())
	    return view('Countries.ajax.edit')->withcountry($country);

	    return view('Countries.http.edit')->withcountry($country);
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
        $country=country::where('name', '=', $request->name)->first();
         if($country!=null && $country->id!=$id){
             if($request->ajax())
                return ['error', "Duplicate_Entry"];
        return back();
        }
        
         $this->validate($request, [
            'name'=>'required'
            ]);

        $country=country::find($id);
        $country->name=$request->name;
        $country->remark=$request->remark;
        $country->createdByUserId=Auth::guard('web')->user()->id;
        $country->save();

        return redirect()->route("countries.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $country=country::find($id);
       if($request->ajax())
        return view('Countries.ajax.delete-confirm')->withcountry($country);
        
        return view('Countries.http.delete-confirm')->withcountry($country);
    }
 	public function destroy($id, Request $request)
    {
        $country=country::find($id);
        $country->delete();

        return redirect()->route('countries.index');
    }

}
