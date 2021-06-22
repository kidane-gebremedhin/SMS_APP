<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use DB;
use Auth;

class aboutController extends Controller
{
    public $paginationSize;
    public function __construct(){
        $this->middleware('auth:web', ['except', ['index', 'show']]);
        
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       
       $abouts=About::orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("abouts.ajax.index")->withAbouts($abouts);

       return view("abouts.http.index")->withAbouts($abouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax())
            return view("abouts.ajax.create");
        return view("abouts.http.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
            ]);

        $about=new About;
        $about->title=$request->title;
        $about->body=$request->body;
        $about->createdByUserId=Auth::guard('web')->user()->id;
        $about->save();
        return redirect()->route("abouts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $about=About::find($id);
        if($request->ajax())
            return view("abouts.ajax.show")->withAbout($about);
        return view("abouts.http.show")->withAbout($about);
    } 


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        $about=About::find($id);

        if($request->ajax())
            return view("abouts.ajax.edit")->withAbout($about);
        return view("abouts.http.edit")->withAbout($about);
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
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
            ]);

        $about=About::find($id);
        $about->title=$request->title;
        $about->body=$request->body;
        $about->createdByUserId=Auth::guard('web')->user()->id;
        $about->save();

        return redirect()->route("abouts.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $about=About::find($id);
       if($request->ajax())
        return view('abouts.ajax.delete-confirm')->withAbout($about);
        
        return view('abouts.http.delete-confirm')->withAbout($about);
    }
 public function destroy($id, Request $request)
    {
        $about=About::find($id);
        $about->delete();

        return redirect()->route('abouts.index');
    }
}
