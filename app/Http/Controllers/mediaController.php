<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\media;
use App\document_edition;
use Auth;
use DB;
use Session;

 class mediaController extends Controller
 {
//     public $paginationSize;

//     public function __construct(){
//         $this->middleware('auth:web');
    
//      $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        
//     }


// public function streamText_Image($editionId)
//     {
//         $document_edition=document_edition::find($editionId);
//         if($document_edition==null)
//             return ["error", "Requested file not found"];

//         $file_path = $document_edition->path;
//         $filename=$document_edition->getFileName();

//         $headers = array(
//         // 'Content-Type: text/pdf',
//         'Content-Disposition: attachment; filename='.$filename,
//         );
//         if ( file_exists( $file_path ) ) {
//         return \Response::file( $file_path, $headers );
//         } else {
//         exit( 'Requested file does not exist on our server!' );
//         }
//     }

//     public function streamMedia(Request $request, $editionId){
//         $document_edition=document_edition::find($editionId);
//         if($document_edition==null || $document_edition->document==null)
//             return ['error', 'Requested dcument not found.'];

//         $tmp=null;
//         switch ($document_edition->document->category) {
//             case 'Video':
//                 $tmp = new \App\VideoStream($document_edition->path);
//                 break;
//             case 'Audio':
//                 $tmp = new \App\VideoStream($document_edition->path);
//                 break;
//             case 'Image':
//                 $tmp = new \App\VideoStream($document_edition->path);
//                 break;
//             case 'Text_Document':
//                 $tmp = new \App\VideoStream($document_edition->path);
//                 break;
//             default:
//                 return ['error', 'Unsupported document type.'];
//                 break;
//         }

//         if($tmp==null)
//             return ['error', 'Unsupported document type.'];

//         $tmp->start();
//     }

//     public function streamVideo(Request $request){
//         $media_path = storage_path().'/app/public/uploads/video2.mp4';
//         $tmp = new \App\VideoStream($media_path);
//         $tmp->start();
//     }
//     public function streamAudio(Request $request){
//         $media_path = storage_path().'/app/public/uploads/audio1.mp3';
//         $tmp = new \App\VideoStream($media_path);
//         $tmp->start();
//     }

//     public function kv_read_word($input_file){
//         $kv_strip_texts = '';
//         $kv_texts = '';
//         if(!$input_file || !file_exists($input_file)){ 
//          echo "Not found ".$input_file."<br>";
//             return false;
//         }
//         $zip = zip_open($input_file);
//         if (!$zip || is_numeric($zip)) return false;
//         while ($zip_entry = zip_read($zip)) {
//         if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
//         if (zip_entry_name($zip_entry) != "word/document.xml") continue;
//         $kv_texts .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
//         zip_entry_close($zip_entry);
//         }
//         zip_close($zip);
//         $kv_texts = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $kv_texts);
//         $kv_texts = str_replace('</w:r></w:p>', "\r\n", $kv_texts);
//         $kv_strip_texts = nl2br(strip_tags($kv_texts,''));
//     return $kv_strip_texts;
//     }

//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */

//     public function index(Request $request)
//     {
//         $kv_texts = $this->kv_read_word(storage_path().'/app/public/new_dir/helloWorld22.docx');
//         if($kv_texts !== false) {
//         echo nl2br($kv_texts);
//         }
//         else {
//         echo "Can't Read that file.";
//         }
//         return;
//        //$medias=media::orderBy("id", "desc")->paginate($this->paginationSize);

//        if($request->ajax())
//         return view("medias.ajax.index");//->with('medias', $medias);

//        return view("medias.http.index");//->with('medias', $medias);
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
// public function create(Request $request){
    
        
//     if($request->ajax())
//         return view('medias.ajax.create');

//         return view('medias.http.create');
//     }


//     /**
//      * Stock a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $this->validate($request, [
//             'name'=>'required'
//             ]);
//  $media=media::where('name', '=', $request->name)->first();
//         if($media!=null){
//             if($request->ajax())
//                 return ['error', "Duplicate_Entry"];
//             return back();
//         }
//         $media=new media;
//         $media->name=$request->name;
//         $media->remark=$request->remark;
//         $media->createdByUserId=Auth::guard('web')->user()->id;
//         $media->save();
//         return redirect()->route("medias.index");
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id, Request $request)
//     {
//         $document_edition=document_edition::find($id);
//         if($request->ajax())
//             return view("medias.ajax.show")->with('document_edition', $document_edition);
//         return view("medias.http.show")->with('document_edition', $document_edition);
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id, Request $request)
//     {
//     $media=media::find($id);
        
//     if($request->ajax())
//         return view('medias.ajax.edit')->with('media', $media);

//         return view('medias.http.edit')->with('media', $media);
//    }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         $media=media::where('name', '=', $request->name)->first();
//         if($media!=null && $media->id!=$id){
//             if($request->ajax())
//                 return ['error', "Duplicate_Entry"];
//             return back();
//         }

//        $this->validate($request, [
//             'name'=>'required'
//             ]);
//         $media=media::find($id);
//         $media->name=$request->name;
//         $media->remark=$request->remark;
//         $media->updatedByUserId=Auth::guard('web')->user()->id;
//         $media->save();

//         return redirect()->route("medias.show", $id);
//    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function delete($id, Request $request)
//     {
//        $media=media::find($id);
//        if($request->ajax())
//         return view('medias.ajax.delete-confirm')->with('media', $media);
        
//         return view('medias.http.delete-confirm')->with('media', $media);
//     }
//     public function destroy($id)
//     {
//         $media=media::find($id);
//         $media->delete();

//         return redirect()->route('medias.index');
//     }

 }
