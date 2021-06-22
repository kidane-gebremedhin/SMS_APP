<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\log;
use Auth;
use DB;

class logsController extends Controller
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

    public function logsAll(Request $request)
    {
    //$logs=log::orderBy("id", "desc")->paginate($this->paginationSize);
$logs=array();
if(!file_exists(storage_path('/logs/app_log.log')))
    return ['error', 'Log file does not exist'];
$logsJsonString = file_get_contents(storage_path('/logs/app_log.log'));
$logsArr=explode(',|', $logsJsonString);

foreach ($logsArr as $log) {
    if($log==null || $log=='')
        continue;

    $data = json_decode(($log), true);
    array_push($logs, \App\Global_var::makeLog($data));
}

    \App\Global_var::logAction($request, 'Viewed logs');
       if($request->ajax())
        return view("logs.ajax.index")->with('logs', $logs);

       return view("logs.http.index")->with('logs', $logs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
    }


    /**
     * Stock a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
    
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
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
    
    }
    public function destroy($id)
    {
        
    }

    public function clearLogs_confirmation(Request $request)
    {
       if($request->ajax())
        return view('logs.ajax.clearLogs_confirmation');
        
        return view('logs.http.clearLogs_confirmation');
    }
    public function clearLogs(Request $request)
    {
        $logs=log::all();
        foreach ($logs as $log) {
            $log->delete();
        }

    \App\Global_var::logAction($request, 'Cleared logs');
        return redirect()->route('logs.logsAll');
    }

}
