<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\language_string;
use App\Global_var;
use Auth;
use DB;
use App\Providers\AppServiceProvider;
 use Illuminate\Contracts\View\View;

class Language_stringController extends Controller
{
    public $paginationSize;

    public function __construct(){
        $this->middleware('auth:web')->except(['language_interpreter', 'changeLanguage']);
    
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        
     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function language_interpreter(Request $request, $keyWord)
    {
        $language_strings=Language_string::all();
        return Global_var::getLangString($keyWord, $language_strings);
   }

    public function changeLanguage(Request $request, $lang)
    {
    \Cookie::queue('selectedLang', $lang, 60*24*7);
    \App\Global_var::$selectedLang=$lang;

    return back();
   }

    public function create(Request $request)
    {
    if($request->ajax())
        return view('language_strings.ajax.create');

        return view('language_strings.http.create');
   }


    public function store(Request $request)
    {
        $keyWord='keyWord';
        $eng='eng';
        $amh='amh';
        $tig='tig';
        $language_string=language_string::where('keyWord', '=', $request->keyWord)->first();
        if($language_string!=null){
            return ['error', 'Keyword_Already_Taken'];
        }

         $this->validate($request, [
            $keyWord=>'required|unique:language_strings',
            $eng=>'required',
            $amh=>'required',
            $tig=>'required'
            ]);
        
        $language_string=new language_string;
        $language_string->keyWord=$request->$keyWord;
        $language_string->eng=$request->$eng;
        $language_string->amh=$request->$amh;
        $language_string->tig=$request->$tig;
        $language_string->save();

     \App\Global_var::logAction($request, 'Created new Language String: '.$language_string->keyWord);
       return redirect()->route("language_strings.create");
   }

    public function edit(Request $request)
    {
     $language_strings=language_string::orderBy("id", "desc")->paginate(1);//$this->paginationSize);

        
    if($request->ajax())
        return view('language_strings.ajax.edit')->withLanguage_strings($language_strings);

        return view('language_strings.http.edit')->withLanguage_strings($language_strings);
   }


    public function update(Request $request)
    {
     $language_strings=language_string::all();
//$request=$request->request;
     $errorCount=0;
     $u=1;
     foreach ($language_strings as $language_string) {
        $id=$language_string->id;
        $keyWord=$language_string->id.'_keyWord';
        $eng=$language_string->id.'_eng';
        $amh=$language_string->id.'_amh';
        $tig=$language_string->id.'_tig';

        $old_language_string=language_string::where('keyWord', '=', $request->$keyWord)->where('id', '!=', $language_string->id)->first();
        if($old_language_string!=null){
            $errorCount++;
            continue;
            //return ['error', 'Keyword_Already_Taken'];
        }
        
         /*$this->validate($request, [
            $keyWord=>'required|unique:language_strings',
            $eng=>'required',
            $amh=>'required',
            $tig=>'required'
            ]);*/
if($request->$keyWord==null){
    continue;
}

        $language_string->keyWord=$request->$keyWord;
        $language_string->eng=$request->$eng;
        $language_string->amh=$request->$amh;
        $language_string->tig=$request->$tig;
        $language_string->save();
/*echo ($u++)."_____________________________";
    echo "<br>".$language_string->id." ".$language_string->$keyWord." ".$language_string->$eng." ".$language_string->$amh." ".$language_string->$tig;
    echo "<br>".$request->$id." ".$request->$keyWord." ".$request->$eng." ".$request->$amh." ".$request->$tig;*/
        }

//return "Force End!";
     \App\Global_var::logAction($request, 'Updated Language Strings');
        if($errorCount>0)
            return ['error', $errorCount.' Duplicates Found and Ommited!'];
        return redirect()->route("language_strings.edit");
   }

}
