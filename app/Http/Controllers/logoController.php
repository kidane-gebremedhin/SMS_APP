<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;
use App\Setting;
use App\language_string;
use Session;
use DB;
use Excel;

class logoController extends Controller
{
    
public function __construct(){
    $this->middleware('auth:web');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $logos =Logo::paginate(5);
        return view('logo.index')->withLogos ($logos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
     $logo=Logo::first();
    $setting=Setting::first();

        if($request->ajax())
        return view("logo.ajax.edit")->with('logo', $logo)->with('setting', $setting);

       return view("logo.http.edit")->with('logo', $logo)->with('setting', $setting);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function update(Request $request)
    {
        //dd($request);
    if($request->hasFile('language_strings_file')){
    $path = $request->file('language_strings_file')->getRealPath();
    $data = Excel::load($path)->get();
        $count=0;
    if($data->count()){
    //language_string::where('id', '>', 0)->delete();
    foreach ($data as $key => $value) {
      if(language_string::where('keyWord', '=', $value->key_word)->first()!=null)
        continue;
        
        $count+=1;
        $language_string=new \App\language_string;
        $language_string->keyWord=$value->key_word;
        $language_string->eng=$value->english;
        $language_string->amh=$value->amharic;
        $language_string->tig=$value->tigrigna;
        $language_string->save();

        echo $value->key_word.' | '.$value->english.' | '.$value->amharic.' | '.$value->tigrigna.'<br>';
       //$arr[] = ['title' => $value->title, 'description' => $value->description];
    }
    echo $count."-Rows Imported Successfully";
    }
    }
       

$logo=Logo::first();  
if($logo==null)
$logo=new Logo;

        if($request->hasFile('logoImage')){
             $image=$request->file('logoImage');
             $extension=$image->getClientOriginalExtension();
             if(strtolower($extension)=="jpg" ||strtolower($extension)=="jpeg" ||strtolower($extension)=="png" ||strtolower($extension)=="gif" ||strtolower($extension)=="webp")
             {
             $filename=time().'.'.$extension;
             $location='images/'.$filename;
             \Image::make($image)->resize(200, 200)->save($location);
        
             $logo->logoImage=$filename;
            
         }
         else{
            if($request->ajax())
                return ['error', 'Invalid_Format'];
            Session::flash('danger', 'Invalid Format only JPG, PNG, GIF or WebP s are allowed');
            return redirect()->back()->withInput($request->all()); 
         }
     }

        if($request->hasFile('backgroundImage')){
             $image_2=$request->file('backgroundImage');
             $extension_2=$image_2->getClientOriginalExtension();
             if(strtolower($extension_2)=="jpg" ||strtolower($extension_2)=="jpeg" ||strtolower($extension_2)=="png" ||strtolower($extension_2)=="gif" ||strtolower($extension_2)=="webp")
             {
             $filename_2=(time()+10).'.'.$extension_2;
             $location_2='images/'.$filename_2;
             \Image::make($image_2)->resize(1500, 848)->save($location_2);
        
             $logo->backgroundImage=$filename_2;
            
         }
         else{
            if($request->ajax())
                return ['error', 'Invalid_Format'];
            Session::flash('danger', 'Invalid Format only JPG, PNG, GIF or WebP s are allowed');
            return redirect()->back()->withInput($request->all()); 
         }
     }

        $logo->logoText=$request->logoText;
        $logo->save();

        //check if paginationSize is set
            $setting=Setting::first();
            if($setting==null)
                $setting=new Setting;
            if($request->paginationSize!=null && $request->paginationSize>0)
                $setting->paginationSize=$request->paginationSize;
            if($request->lengthOfSingleResultInMilliSeconds!=null)
                $setting->lengthOfSingleResultInMilliSeconds=$request->lengthOfSingleResultInMilliSeconds;
        
            $setting->save();

    \App\Global_var::logAction($request, 'Updated System UI');
         Session::flash('success', 'Logo  Updated Successfully');
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
    }
}
