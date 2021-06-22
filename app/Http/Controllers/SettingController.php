<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use DB;
use Session;
use Auth;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth:web');
    }
    public function index(Request $request){

        $setting=Setting::orderBy('id', 'desc')->first();

    	if($request->ajax())
    	return view('settings.ajax.index')->withSetting($setting);
    	
    	return view('settings.http.index')->withSetting($setting);
    }

    public function update($id, Request $request){
    		$setting=Setting::find($id);

 //           $setting->countViewsAllowedIntervalInHours=$request->countViewsAllowedIntervalInHours;
            $setting->paginationSize=$request->paginationSize;
            $setting->reportGenerationDate=$request->reportGenerationDate;
            $setting->reportIntervalInMonths=$request->reportIntervalInMonths;
		    $setting->save();
    	
        \App\Global_var::logAction($request, 'Updated System Settings');
    	return redirect()->route('settings.index');
    }
}
