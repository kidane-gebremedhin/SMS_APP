<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recipient_category;
use Auth;
use DB;

class recipient_categoryController extends Controller
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
       
       $recipient_categories=recipient_category::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("recipient_categories.ajax.index")->with('recipient_categories', $recipient_categories);

       return view("recipient_categories.http.index")->with('recipient_categories', $recipient_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
  if($request->ajax())
      return view('recipient_categories.ajax.create');

      return view('recipient_categories.http.create');
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

        $recipient_category=recipient_category::where('name', '=', $request->name)->first();
        if($recipient_category!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $recipient_category=new recipient_category;
        $recipient_category->name=$request->name;
        $recipient_category->remark=$request->remark;
        $recipient_category->createdByUserId=Auth::guard('web')->user()->id;
        $recipient_category->save();
        return redirect()->route("recipient_categories.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $recipient_category=recipient_category::find($id);
        if($request->ajax())
            return view("recipient_categories.ajax.show")->with('recipient_category', $recipient_category);
        return view("recipient_categories.http.show")->with('recipient_category', $recipient_category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
  $recipient_category=recipient_category::find($id);
        
  if($request->ajax())
      return view('recipient_categories.ajax.edit')->with('recipient_category', $recipient_category);

      return view('recipient_categories.http.edit')->with('recipient_category', $recipient_category);
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
        $recipient_category=recipient_category::where('name', '=', $request->name)->first();
        if($recipient_category!=null && $recipient_category->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $recipient_category=recipient_category::find($id);
        $recipient_category->name=$request->name;
        $recipient_category->remark=$request->remark;
        $recipient_category->createdByUserId=Auth::guard('web')->user()->id;
        $recipient_category->save();

        return redirect()->route("recipient_categories.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $recipient_category=recipient_category::find($id);
       if($request->ajax())
        return view('recipient_categories.ajax.delete-confirm')->with('recipient_category', $recipient_category);
        
        return view('recipient_categories.http.delete-confirm')->with('recipient_category', $recipient_category);
    }
  public function destroy($id, Request $request)
    {
        $recipient_category=recipient_category::find($id);
        $recipient_category->delete();

        return redirect()->route('recipient_categories.index');
    }

}
