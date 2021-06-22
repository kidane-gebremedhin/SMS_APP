<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subject;
use Auth;
use DB;

class subjectController extends Controller
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
       
       $subjects=subject::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("subjects.ajax.index")->with('subjects', $subjects);

       return view("subjects.http.index")->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
	if($request->ajax())
	    return view('subjects.ajax.create');

	    return view('subjects.http.create');
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

        $subject=subject::where('name', '=', $request->name)->first();
        if($subject!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $subject=new subject;
        $subject->name=$request->name;
        $subject->remark=$request->remark;
        $subject->createdByUserId=Auth::guard('web')->user()->id;
        $subject->save();
        return redirect()->route("subjects.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $subject=subject::find($id);
        if($request->ajax())
            return view("subjects.ajax.show")->with('subject', $subject);
        return view("subjects.http.show")->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$subject=subject::find($id);
        
	if($request->ajax())
	    return view('subjects.ajax.edit')->with('subject', $subject);

	    return view('subjects.http.edit')->with('subject', $subject);
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
        $subject=subject::where('name', '=', $request->name)->first();
        if($subject!=null && $subject->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $subject=subject::find($id);
        $subject->name=$request->name;
        $subject->remark=$request->remark;
        $subject->createdByUserId=Auth::guard('web')->user()->id;
        $subject->save();

        return redirect()->route("subjects.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $subject=subject::find($id);
       if($request->ajax())
        return view('subjects.ajax.delete-confirm')->with('subject', $subject);
        
        return view('subjects.http.delete-confirm')->with('subject', $subject);
    }
 	public function destroy($id, Request $request)
    {
        $subject=subject::find($id);
        $subject->delete();

        return redirect()->route('subjects.index');
    }

}
