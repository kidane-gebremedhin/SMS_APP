<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use mysqli;
use Hash;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Illuminate\Support\Facades\Input;
use App\User_zone_wereda_tabya;
use App\message;
use App\user_message;
use App\Role;
use Session;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
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

    public function getUser($id){
        return User::find($id);
    }

    public function manageAccountsPage(Request $request, $id=null){
        $currentUserId=$id!=null? $id: (Auth::guard('web')->user()!=null? Auth::guard('web')->user()->id: 0);
    if($currentUserId==0){
        if($request->ajax())
            return 'unauthorized';
        //return redirect('/login');
        return back();
        }
        
    $user=User::find($currentUserId);
    $roles=\App\Global_var::roles();

        if($request->ajax())
        return view("users.ajax.manage_account")->with('user', $user)->with('roles', $roles);

       return view("users.http.manage_account")->with('user', $user)->with('roles', $roles);
    }

    public function manageAccounts(Request $request, $id=null){
//    $currentUserId=Auth::guard('web')->user()!=null? Auth::guard('web')->user()->id: 0;
    $currentUserId=$id!=null? $id: (Auth::guard('web')->user()!=null? Auth::guard('web')->user()->id: 0);
    if($currentUserId !=(Auth::guard('web')->user()!=null? Auth::guard('web')->user()->id: 0)){
        $message='unauthorized';
        if($request->ajax())
            return ['error', $message];
        //return redirect('/login');
            \Session::flash('danger', $message);
        return back();
    }

    if($currentUserId==0){
        $message='unauthorized';
        if($request->ajax())
            return ['error', $message];
        //return redirect('/login');
            \Session::flash('danger', $message);
        return back();
        }
        $user=User::where('email', '=', $request->email)->first();
        if($user!=null && $user->id!=$currentUserId){
        $message='Invalid email';
            if($request->ajax())
                return ['error', $message];
            \Session::flash('danger', $message);
            return back();
        }


        $user=User::find($currentUserId);

        if($request->password!=null){
         if($request->password!=$request->cpassword){
        $message='Password not match';
            if($request->ajax())
                return ['error', $message];
            \Session::flash('danger', $message);
            return back();
        }
        if(!Hash::check($request->oldPassword, $user->password)){
            $message='Old Password not correct';
             
             if($request->ajax())
                return ['error', $message];
            \Session::flash('danger', $message);
            return back();
        }
    }
     
     if ($request->password!=null && (strlen($request->password)<6 || !preg_match('/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/', $request->password) )) {
            $message='Password must contain aleast one letter, digit and special character.';
            if($request->ajax())
                return ["error", $message];
            \Session::flash('danger', $message);
            return back()->withInput($request->except(['password', 'confirmPassword']));
            }   
   
    /*if($user->changedPassword!="true" && !$user->isUser() && ($request->password==null || $request->password=="" || Hash::check($request->password, $user->password))){
        $message='New Password is similar to old password.';
            if($request->ajax())
                return ['error', $message];
            \Session::flash('danger', $message);
            return back();
    }*/

        $user->fullName=$request->fullName;
        $user->phoneNumber=$request->phoneNumber;
        $user->email=$request->email;
        if($request->password!=null)
            $user->password=bcrypt($request->password);
        $user->changedPassword="true";
        $user->save();

        Session::flash('message', 'Dear '.$user->email.' Your account updated successfully.');

        \App\Global_var::logAction($request, 'User profile updated ID '.$user->id.' Email: '.$user->email);
        return redirect()->route('home');
    }

public function changeStatus($id, Request $request){
    if(Auth::guard('web')->user()->id==$id){
                return ["error", "Owner can not change status."];
            }

        $user=User::find($id);
        $user->status=($user->status=='active'? 'inactive': 'active');
        $user->save();

        \App\Global_var::logAction($request, 'User ID: '.$user->id.'active status changed');
        return redirect()->route("users.index");
    }


public function approveNewUser($id, $approvalStatus, Request $request){
        $redirectToNewUsers=true;
        
        if(Auth::guard('web')->user()->id==$id){
                return ["error", "User can not approve itself."];
            }

        $user=User::find($id);
        if($user->isDeleted=='true')
            $redirectToNewUsers=false;

        if($approvalStatus==1){
            $user->isDeleted='false';
            $user->isApproved='true';
            $user->status='active';
            $user->approvedByUserId=Auth::guard('web')->user()->id;
        \App\Global_var::logAction($request, 'New user Id: '.$user->id.' Email: '.$user->email.' Approval Request Accepted');
        }
        else if($approvalStatus==0){
            $user->isDeleted='true';
            $user->status='inactive';
            $user->deletedByUserId=Auth::guard('web')->user()->id;
        \App\Global_var::logAction($request, 'New user Id: '.$user->id.' Email: '.$user->email.' Approval Request Rejected');
        }

        $user->save();

        if(!$redirectToNewUsers)//from rejected Users
            return redirect()->route("users.rejectedUsers");
        return redirect()->route("users.newUsers");
    }
    
    public function newUsers(Request $request)
    {
       $users=User::where('isDeleted', 'false')->where('isApproved', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

        \App\Global_var::logAction($request, 'New Users list viewed');
       if($request->ajax())
        return view("users.ajax.new_users")->withUsers($users);

       return view("users.http.new_users")->withUsers($users);
    }
    
    public function rejectedUsers(Request $request)
    {
       $users=User::where('isDeleted', 'true')->where('isApproved', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

        \App\Global_var::logAction($request, 'Rejected Users list viewed');
       if($request->ajax())
        return view("users.ajax.rejected_users")->withUsers($users);

       return view("users.http.rejected_users")->withUsers($users);
    }
    
    public function index(Request $request)
    {
       $users=User::where('isDeleted', 'false')/*->where('isApproved', 'true')*/->orderBy("id", "desc")->paginate($this->paginationSize);

        \App\Global_var::logAction($request, 'Users list viewed');
       if($request->ajax())
        return view("users.ajax.index")->withUsers($users);

       return view("users.http.index")->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $regions=DB::table('regions')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
        $zones=DB::table('zones')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
        $weredas=DB::table('weredas')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
        $schools=DB::table('schools')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
        $roles=\App\Global_var::roles();
        $adminLevels=\App\Global_var::adminLevels();

        if($request->ajax())
            return view("users.ajax.create")->with('roles', $roles)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('schools', $schools)->with('adminLevels', $adminLevels);
        return view("users.http.create")->with('roles', $roles)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('schools', $schools)->with('adminLevels', $adminLevels);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $user=User::where('userName', '=', $request->userName)->first();
        if($user!=null){
            $message='Username already taken. Please try another.';
            if($request->ajax())
                return ['error', $message];

            \Session::flash('danger', $message);
            return back()->withInput($request->except(['password', 'confirmPassword']));
        } 

        if($request->password!=$request->confirmPassword){
            $message='Passwords not match';
            if($request->ajax())
                return ['error', $message];
            \Session::flash('danger', $message);
            return back()->withInput($request->except(['password', 'confirmPassword']));
            }    

    if (strlen($request->password)<6 || !preg_match('/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/', $request->password) ) {
            $message='Password must contain aleast one letter, digit and special character.';
            if($request->ajax())
                return ["error", $message];
            \Session::flash('danger', $message);
            return back()->withInput($request->except(['password', 'confirmPassword']));
            }   
    $this->validate($request, [
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',            
            ]);


        $user=new User;
        $user->adminLevel=$request->adminLevel;
        $user->regionId=$request->regionId;
        $user->zoneId=$request->zoneId;
        $user->weredaId=$request->weredaId;
        $user->schoolId=$request->schoolId;

        $user->roleId=$request->roleId;
        $user->fullName=$request->fullName;
        $user->phoneNumber=$request->phoneNumber;
        $user->email=$request->email;
        $user->userName=$request->userName;
        $user->password=bcrypt($request->password);
        $user->createdByUserId=Auth::guard('web')->user()->id;
        $user->status='active';
        /*
        $mailSent=$user->sendEmail($request);
        if(!$mailSent){
            $user->delete();
            $message="Account not created! Registration Email failed to be sent. Please try again.";
            if($request->ajax())
                return ["error", $message];
            \Session::flash('danger', $message);
            return back()->withInput($request->except(['password', 'confirmPassword']));
        }*/

        $user->save();


        \App\Global_var::logAction($request, 'Created new user ID: '.$user->id);
        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $user=User::find($id);
        \App\Global_var::logAction($request, 'Viewed user Id'.$user->id.' Email: '.$user->email.' details');
        if($request->ajax())
            return view("users.ajax.show")->withUser($user);
        return view("users.http.show")->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        $regions=DB::table('regions')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
        $zones=DB::table('zones')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
        $weredas=DB::table('weredas')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
        $schools=DB::table('schools')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
        $roles=\App\Global_var::roles();
        $adminLevels=\App\Global_var::adminLevels();

        $user=User::find($id);

        if($request->ajax())
            return view("users.ajax.edit")->withUser($user)->with('roles', $roles)->with('roles', $roles)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('schools', $schools)->with('adminLevels', $adminLevels);
        return view("users.http.edit")->withUser($user)->with('roles', $roles)->with('roles', $roles)->with('regions', $regions)->with('zones', $zones)->with('weredas', $weredas)->with('schools', $schools)->with('adminLevels', $adminLevels);
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
        $user=User::where('email', '=', $request->email)->first();
        if($user!=null && $user->id!=$id){
            $message='Email already taken. Please try another.';
            if($request->ajax())
                return ['error', $message];
            \Session::flash('danger', $message);
            return back();
        }/*
        $user=User::where('userName', '=', $request->userName)->first();
        if($user!=null && $user->id!=$id){
            $message='Username already taken. Please try another.';
            if($request->ajax())
                return ['error', $message];
            \Session::flash('danger', $message);
            return back();
        }*/
        
     if ($request->password!=null && (strlen($request->password)<6 || !preg_match('/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/', $request->password) )) {
            $message='Password must contain aleast one letter, digit and special character.';
            if($request->ajax())
                return ["error", $message];
            \Session::flash('danger', $message);
            return back()->withInput($request->except(['password', 'confirmPassword']));
            }   

    $this->validate($request, [
            ]);
    if($request->password!=$request->confirmPassword){
                return ["error", "Passwords not match"];
            }

        $user=User::find($id);
        $user->adminLevel=$request->adminLevel;
        $user->regionId=$request->regionId;
        $user->zoneId=$request->zoneId;
        $user->weredaId=$request->weredaId;
        $user->schoolId=$request->schoolId;

        $user->roleId=$request->roleId;
        $user->fullName=$request->fullName;
        $user->phoneNumber=$request->phoneNumber;
        $user->email=$request->email;
        //$user->userName=$request->userName;
        if($request->password!="" && $request->password==$request->confirmPassword)
            $user->password=bcrypt($request->password);
        $user->updatedByUserId=Auth::guard('web')->user()->id;
        $user->save();

        \App\Global_var::logAction($request, 'Updated user Id: '.$user->id.' Email: '.$user->email.' details');
        return redirect()->route("users.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {        
    $user=User::find($id);
       if($request->ajax())
        return view('users.ajax.delete-confirm')->withUser($user);
        
        return view('users.http.delete-confirm')->withUser($user);
    }

 public function destroy($id, Request $request)
    {   
        if(Auth::guard('web')->user()->id==$id){
                return ["error", "User can not delete itself."];
            }

        $user=User::find($id);
        //$user->delete();
        $user->isDeleted='true';
        $user->save();

        \App\Global_var::logAction($request, 'Deleted user Id: '.$user->id.' Email: '.$user->email);
        return redirect()->route('users.index');
    }

    public function usersImport(Request $request)
    {

        $roles=DB::table('roles')->pluck('roleName', 'id')->toArray(); 

        if($request->ajax())
            return view("users.ajax.import")->with('roles', $roles);
        return view("users.http.import")->with('roles', $roles);
    }

    public function usersImportPost(Request $request)
    {
        $rules = array(
            'file' => 'required',
            /*'num_records' => 'required',*/
        );

        $validator = Validator::make(Input::all(), $rules);
        // process the form
        if ($validator->fails()) 
        {
            return redirect(route('home'))->withErrors($validator);
        }
        else 
        {
            try {
                Excel::load(Input::file('file'), function ($reader) {

                    foreach ($reader->toArray() as $row) {
                        User::firstOrCreate($row);
                        $user=new User;
                        $user->roleId=0;
                        $user->email="user";
                        $user->email="user@gmail.com";
                        $user->phoneNumber="0919054098";
                        $user->password="user";
                        $user->save();
                    }
                });
                \Session::flash('success', 'Users uploaded successfully.');
           
        \App\Global_var::logAction($request, 'Imported users from excel');
                return redirect(route('users.index'));
            } catch (\Exception $e) {
                \Session::flash('error', $e->getMessage());
                return redirect(route('users.index'));
            }
        } 
    } 
}
