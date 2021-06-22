<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\request_type;
use Auth;
use DB;

class request_typeController extends Controller
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
       
       $request_types=request_type::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("request_types.ajax.index")->with('request_types', $request_types);

       return view("request_types.http.index")->with('request_types', $request_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
	if($request->ajax())
	    return view('request_types.ajax.create');

	    return view('request_types.http.create');
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

        $request_type=request_type::where('name', '=', $request->name)->first();
        if($request_type!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $request_type=new request_type;
        $request_type->name=$request->name;
        $request_type->remark=$request->remark;
        $request_type->createdByUserId=Auth::guard('web')->user()->id;
        $request_type->save();
        return redirect()->route("request_types.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $request_type=request_type::find($id);
        if($request->ajax())
            return view("request_types.ajax.show")->with('request_type', $request_type);
        return view("request_types.http.show")->with('request_type', $request_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$request_type=request_type::find($id);
        
	if($request->ajax())
	    return view('request_types.ajax.edit')->with('request_type', $request_type);

	    return view('request_types.http.edit')->with('request_type', $request_type);
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
        $request_type=request_type::where('name', '=', $request->name)->first();
        if($request_type!=null && $request_type->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $request_type=request_type::find($id);
        $request_type->name=$request->name;
        $request_type->remark=$request->remark;
        $request_type->createdByUserId=Auth::guard('web')->user()->id;
        $request_type->save();

        return redirect()->route("request_types.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $request_type=request_type::find($id);
       if($request->ajax())
        return view('request_types.ajax.delete-confirm')->with('request_type', $request_type);
        
        return view('request_types.http.delete-confirm')->with('request_type', $request_type);
    }
 	public function destroy($id, Request $request)
    {
        $request_type=request_type::find($id);
        $request_type->delete();

        return redirect()->route('request_types.index');
    }

}
