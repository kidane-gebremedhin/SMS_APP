<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job;
use Auth;
use DB;

class jobController extends Controller
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
       
       $jobs=job::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("jobs.ajax.index")->with('jobs', $jobs);

       return view("jobs.http.index")->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
	if($request->ajax())
	    return view('jobs.ajax.create');

	    return view('jobs.http.create');
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

        $job=job::where('name', '=', $request->name)->first();
        if($job!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $job=new job;
        $job->name=$request->name;
        $job->remark=$request->remark;
        $job->createdByUserId=Auth::guard('web')->user()->id;
        $job->save();
        return redirect()->route("jobs.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $job=job::find($id);
        if($request->ajax())
            return view("jobs.ajax.show")->with('job', $job);
        return view("jobs.http.show")->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$job=job::find($id);
        
	if($request->ajax())
	    return view('jobs.ajax.edit')->with('job', $job);

	    return view('jobs.http.edit')->with('job', $job);
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
        $job=job::where('name', '=', $request->name)->first();
        if($job!=null && $job->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $job=job::find($id);
        $job->name=$request->name;
        $job->remark=$request->remark;
        $job->createdByUserId=Auth::guard('web')->user()->id;
        $job->save();

        return redirect()->route("jobs.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $job=job::find($id);
       if($request->ajax())
        return view('jobs.ajax.delete-confirm')->with('job', $job);
        
        return view('jobs.http.delete-confirm')->with('job', $job);
    }
 	public function destroy($id, Request $request)
    {
        $job=job::find($id);
        $job->delete();

        return redirect()->route('jobs.index');
    }

}
