<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;
use Auth;
use DB;

class roleController extends Controller
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
       
       $roles=role::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

        \App\Global_var::logAction($request, 'Viewed Roles List');
       if($request->ajax())
        return view("roles.ajax.index")->with('roles', $roles);

       return view("roles.http.index")->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
    if($request->ajax())
        return view('roles.ajax.create');

        return view('roles.http.create');
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
            'roleName'=>'required'
            ]);
 $role=role::where('roleName', '=', $request->roleName)->first();
        if($role!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
        $role=new role;
        $role->roleName=$request->roleName;
        $role->remark=$request->remark;
        $role->createdByUserId=Auth::guard('web')->user()->id;
        $role->save();
        \App\Global_var::logAction($request, 'Created new role Id: '.$role->id);
        return redirect()->route("roles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $role=role::find($id);
        \App\Global_var::logAction($request, 'Viewed role Id: '.$role->id.' Details');
        if($request->ajax())
            return view("roles.ajax.show")->with('role', $role);
        return view("roles.http.show")->with('role', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
    $role=role::find($id);
        
    if($request->ajax())
        return view('roles.ajax.edit')->with('role', $role);

        return view('roles.http.edit')->with('role', $role);
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
        $role=role::where('roleName', '=', $request->roleName)->first();
        if($role!=null && $role->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }

       $this->validate($request, [
            'roleName'=>'required'
            ]);
        $role=role::find($id);
        $role->roleName=$request->roleName;
        $role->remark=$request->remark;
        $role->updatedByUserId=Auth::guard('web')->user()->id;
        $role->save();

        \App\Global_var::logAction($request, 'Updated role Id: '.$role->id.' Details');
        return redirect()->route("roles.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $role=role::find($id);
       if($request->ajax())
        return view('roles.ajax.delete-confirm')->with('role', $role);
        
        return view('roles.http.delete-confirm')->with('role', $role);
    }
    public function destroy($id, Request $request)
    {
        $role=role::find($id);
        $role->delete();

        \App\Global_var::logAction($request, 'Deleted role Id: '.$role->id.'');
        return redirect()->route('roles.index');
    }

}
