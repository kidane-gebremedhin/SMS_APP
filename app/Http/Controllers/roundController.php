<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\round;
use Auth;
use DB;

class roundController extends Controller
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
       
       $rounds=round::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("rounds.ajax.index")->with('rounds', $rounds);

       return view("rounds.http.index")->with('rounds', $rounds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
	if($request->ajax())
	    return view('rounds.ajax.create');

	    return view('rounds.http.create');
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

        $round=round::where('name', '=', $request->name)->first();
        if($round!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $round=new round;
        $round->name=$request->name;
        $round->remark=$request->remark;
        $round->createdByUserId=Auth::guard('web')->user()->id;
        $round->save();
        return redirect()->route("rounds.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $round=round::find($id);
        if($request->ajax())
            return view("rounds.ajax.show")->with('round', $round);
        return view("rounds.http.show")->with('round', $round);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$round=round::find($id);
        
	if($request->ajax())
	    return view('rounds.ajax.edit')->with('round', $round);

	    return view('rounds.http.edit')->with('round', $round);
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
        $round=round::where('name', '=', $request->name)->first();
        if($round!=null && $round->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $round=round::find($id);
        $round->name=$request->name;
        $round->remark=$request->remark;
        $round->createdByUserId=Auth::guard('web')->user()->id;
        $round->save();

        return redirect()->route("rounds.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $round=round::find($id);
       if($request->ajax())
        return view('rounds.ajax.delete-confirm')->with('round', $round);
        
        return view('rounds.http.delete-confirm')->with('round', $round);
    }
 	public function destroy($id, Request $request)
    {
        $round=round::find($id);
        $round->delete();

        return redirect()->route('rounds.index');
    }

}
