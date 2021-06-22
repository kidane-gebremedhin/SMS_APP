<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transfer_category;
use App\Global_var;
use Auth;
use DB;

class transfer_categoryController extends Controller
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
       
       $transfer_categories=transfer_category::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("transfer_categories.ajax.index")->with('transfer_categories', $transfer_categories);

       return view("transfer_categories.http.index")->with('transfer_categories', $transfer_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
    $integers=Global_var::integers();
	if($request->ajax())
	    return view('transfer_categories.ajax.create')->with('integers', $integers);

	    return view('transfer_categories.http.create')->with('integers', $integers);
    }


    /**
     * Stock a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //adding new  transfer category not supported
        $message='adding new  transfer category not supported';
        if($request->ajax())
            return ['error', $message];
        \Session::flash('danger', $message);
        return back();

        $this->validate($request, [
            'name'=>'required'
            ]);

        $transfer_category=transfer_category::where('name', '=', $request->name)->first();
        if($transfer_category!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $transfer_category=new transfer_category;
        $transfer_category->name=$request->name;
        $transfer_category->name=$request->name;
        if($request->level!=null)
            $transfer_category->level=$request->level;
        if($request->priority!=null)
            $transfer_category->priority=$request->priority;
        /*if($request->weight==null)
            $request->weight=0;
        $transfer_category->weight=$request->weight;
        $transfer_category->hasVetoPower=$request->hasVetoPower;*/
        $transfer_category->remark=$request->remark;
        $transfer_category->createdByUserId=Auth::guard('web')->user()->id;
        $transfer_category->save();
        return redirect()->route("transfer_categories.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $transfer_category=transfer_category::find($id);
        if($request->ajax())
            return view("transfer_categories.ajax.show")->with('transfer_category', $transfer_category);
        return view("transfer_categories.http.show")->with('transfer_category', $transfer_category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$transfer_category=transfer_category::find($id);
    $integers=Global_var::integers();
        
	if($request->ajax())
	    return view('transfer_categories.ajax.edit')->with('transfer_category', $transfer_category)->with('integers', $integers);

	    return view('transfer_categories.http.edit')->with('transfer_category', $transfer_category)->with('integers', $integers);
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
        $transfer_category=transfer_category::where('name', '=', $request->name)->first();
        if($transfer_category!=null && $transfer_category->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $transfer_category=transfer_category::find($id);
        $transfer_category->name=$request->name;
        $transfer_category->name=$request->name;
        if($request->level!=null)
            $transfer_category->level=$request->level;
        if($request->priority!=null)
            $transfer_category->priority=$request->priority;
        /*if($request->weight==null)
            $request->weight=0;
        $transfer_category->weight=$request->weight;
        $transfer_category->hasVetoPower=$request->hasVetoPower;*/
        $transfer_category->remark=$request->remark;
        $transfer_category->createdByUserId=Auth::guard('web')->user()->id;
        $transfer_category->save();

        return redirect()->route("transfer_categories.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $transfer_category=transfer_category::find($id);
       if($request->ajax())
        return view('transfer_categories.ajax.delete-confirm')->with('transfer_category', $transfer_category);
        
        return view('transfer_categories.http.delete-confirm')->with('transfer_category', $transfer_category);
    }
 	public function destroy($id, Request $request)
    {
        $transfer_category=transfer_category::find($id);
        $transfer_category->delete();

        return redirect()->route('transfer_categories.index');
    }

}
