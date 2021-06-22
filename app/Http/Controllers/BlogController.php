<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DB;
use Auth;

class blogController extends Controller
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
       
       $blogs=Blog::orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("blogs.ajax.index")->withBlogs($blogs);

       return view("blogs.http.index")->withBlogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax())
            return view("blogs.ajax.create");
        return view("blogs.http.create");
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

        $blog=new Blog;
        if($request->hasFile('image')){
             $image=$request->file('image');
             $extension=$image->getClientOriginalExtension();
             if(strtolower($extension)=="jpg" ||strtolower($extension)=="jpeg" ||strtolower($extension)=="png" ||strtolower($extension)=="gif" ||strtolower($extension)=="webp")
             {
             $filename=time().'.'.$extension;
             $location=public_path('images/blogs/'.$filename);
             \Image::make($image)->resize(120, 120)->save($location);

            $blog->image=$filename;

            }
            }

        $blog->title=$request->title;
        $blog->body=$request->body;
        $blog->createdByUserId=Auth::guard('web')->user()->id;
        $blog->save();
        return redirect()->route("blogs.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $blog=Blog::find($id);
        if($request->ajax())
            return view("blogs.ajax.show")->withBlog($blog);
        return view("blogs.http.show")->withBlog($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        $blog=Blog::find($id);

        if($request->ajax())
            return view("blogs.ajax.edit")->withBlog($blog);
        return view("blogs.http.edit")->withBlog($blog);
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

        $blog=Blog::find($id);
            if($request->hasFile('image')){
             $image=$request->file('image');
             $extension=$image->getClientOriginalExtension();
             if(strtolower($extension)=="jpg" ||strtolower($extension)=="jpeg" ||strtolower($extension)=="png" ||strtolower($extension)=="gif" ||strtolower($extension)=="webp")
             {
             $filename=time().'.'.$extension;
             $location=public_path('images/blogs/'.$filename);
             \Image::make($image)->resize(120, 120)->save($location);

            $blog->image=$filename;

            }
            }
        
        $blog->title=$request->title;
        $blog->body=$request->body;
        $blog->createdByUserId=Auth::guard('web')->user()->id;
        $blog->save();

        return redirect()->route("blogs.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $blog=Blog::find($id);
       if($request->ajax())
        return view('blogs.ajax.delete-confirm')->withBlog($blog);
        
        return view('blogs.http.delete-confirm')->withBlog($blog);
    }
 public function destroy($id, Request $request)
    {
        $blog=Blog::find($id);
        $blog->delete();

        return redirect()->route('blogs.index');
    }
}
