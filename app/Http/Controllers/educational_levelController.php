<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\educational_level;
use Auth;
use DB;

class educational_levelController extends Controller
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
       
       $educational_levels=educational_level::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("educational_levels.ajax.index")->with('educational_levels', $educational_levels);

       return view("educational_levels.http.index")->with('educational_levels', $educational_levels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
	if($request->ajax())
	    return view('educational_levels.ajax.create');

	    return view('educational_levels.http.create');
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

        $educational_level=educational_level::where('name', '=', $request->name)->first();
        if($educational_level!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $educational_level=new educational_level;
        $educational_level->name=$request->name;
        $educational_level->remark=$request->remark;
        $educational_level->createdByUserId=Auth::guard('web')->user()->id;
        $educational_level->save();
        return redirect()->route("educational_levels.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $educational_level=educational_level::find($id);
        if($request->ajax())
            return view("educational_levels.ajax.show")->with('educational_level', $educational_level);
        return view("educational_levels.http.show")->with('educational_level', $educational_level);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$educational_level=educational_level::find($id);
        
	if($request->ajax())
	    return view('educational_levels.ajax.edit')->with('educational_level', $educational_level);

	    return view('educational_levels.http.edit')->with('educational_level', $educational_level);
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
        $educational_level=educational_level::where('name', '=', $request->name)->first();
        if($educational_level!=null && $educational_level->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $educational_level=educational_level::find($id);
        $educational_level->name=$request->name;
        $educational_level->remark=$request->remark;
        $educational_level->createdByUserId=Auth::guard('web')->user()->id;
        $educational_level->save();

        return redirect()->route("educational_levels.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $educational_level=educational_level::find($id);
       if($request->ajax())
        return view('educational_levels.ajax.delete-confirm')->with('educational_level', $educational_level);
        
        return view('educational_levels.http.delete-confirm')->with('educational_level', $educational_level);
    }
 	public function destroy($id, Request $request)
    {
        $educational_level=educational_level::find($id);
        $educational_level->delete();

        return redirect()->route('educational_levels.index');
    }

}
