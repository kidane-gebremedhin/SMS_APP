<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\measurment_type;
use Auth;
use DB;

class measurment_typeController extends Controller
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
       
       $measurment_types=measurment_type::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("measurment_types.ajax.index")->with('measurment_types', $measurment_types);

       return view("measurment_types.http.index")->with('measurment_types', $measurment_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
	if($request->ajax())
	    return view('measurment_types.ajax.create');

	    return view('measurment_types.http.create');
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

        $measurment_type=measurment_type::where('name', '=', $request->name)->first();
        if($measurment_type!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $measurment_type=new measurment_type;
        $measurment_type->name=$request->name;
        $measurment_type->remark=$request->remark;
        $measurment_type->createdByUserId=Auth::guard('web')->user()->id;
        $measurment_type->save();
        return redirect()->route("measurment_types.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $measurment_type=measurment_type::find($id);
        if($request->ajax())
            return view("measurment_types.ajax.show")->with('measurment_type', $measurment_type);
        return view("measurment_types.http.show")->with('measurment_type', $measurment_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$measurment_type=measurment_type::find($id);
        
	if($request->ajax())
	    return view('measurment_types.ajax.edit')->with('measurment_type', $measurment_type);

	    return view('measurment_types.http.edit')->with('measurment_type', $measurment_type);
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
        $measurment_type=measurment_type::where('name', '=', $request->name)->first();
        if($measurment_type!=null && $measurment_type->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $measurment_type=measurment_type::find($id);
        $measurment_type->name=$request->name;
        $measurment_type->remark=$request->remark;
        $measurment_type->createdByUserId=Auth::guard('web')->user()->id;
        $measurment_type->save();

        return redirect()->route("measurment_types.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $measurment_type=measurment_type::find($id);
       if($request->ajax())
        return view('measurment_types.ajax.delete-confirm')->with('measurment_type', $measurment_type);
        
        return view('measurment_types.http.delete-confirm')->with('measurment_type', $measurment_type);
    }
 	public function destroy($id, Request $request)
    {
        $measurment_type=measurment_type::find($id);
        $measurment_type->delete();

        return redirect()->route('measurment_types.index');
    }

}
