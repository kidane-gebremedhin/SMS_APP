<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Resource;
use App\Role;
use App\User;
use App\Role_Resource;
use App\Role_action;
use App\role_document_permission;
use App\document;
use DB;
use Auth;
use Session;

class permissionController extends Controller
{
  public function __construct(){
    $this->middleware('auth:web');
  }
 
public function step1(Request $request){
        $resources=Resource::all();
      $roles=Role::all();
  
    if($request->ajax())
      return view('permissions.ajax.page1')->withResources($resources)->withRoles($roles);

      return view('permissions.http.page1')->withResources($resources)->withRoles($roles);
    }
   
public function document_role_permissions($id, Request $request){
    $document=document::find($id);
    $roles=Role::where('isDeleted', 'false')->get();
   
    if($request->ajax())
      return view('permissions.ajax.document_role_permissions')->with('roles', $roles)->with('document', $document);
    return view('permissions.http.document_role_permissions')->with('roles', $roles)->with('document', $document);
}
   
public function step2($id, Request $request){
    $role=Role::find($id);
    $resources=Resource::all();
   
    if($request->ajax())
      return view('permissions.ajax.page2')->withRole($role)->withResources($resources);
    return view('permissions.http.page2')->withRole($role)->withResources($resources);
}
  
public function savePermission(Request $request, $actionType){
    $role=Role::find($request->roleId);
    $resources=Resource::all();
  if($actionType=='allow_action'){
        $role_action=Role_action::where('roleId', '=', $request->roleId)->where('resourceId', '=', $request->resourceId)->first();
        if($role_action==null)
        $role_action=new Role_action;
        $role_action->roleId=$request->roleId;
        $role_action->resourceId=$request->resourceId;
        if($request->checked=='true'){
        $role_action->$actionType=1;
        }
        else{
        $role_action->$actionType=0;
        }

        $role_action->save();
     
  }
else{
      if($actionType!='show' && $actionType!='index' && $actionType!='store' && $actionType!='update' && $actionType!='destroy')
      return ['error', 'Action '.$actionType.' not found!'];

      $roleResource=Role_Resource::where('roleId', '=', $request->roleId)->where('resourceId', '=', $request->resourceId)->first();
      if($roleResource==null)
      $roleResource=new Role_Resource;
      $roleResource->roleId=$request->roleId;
      $roleResource->resourceId=$request->resourceId;
      if($request->checked=='true'){
      $roleResource->$actionType=1;
      }
      else{
      $roleResource->$actionType=0;
      }

      $roleResource->save();
}


        \App\Global_var::logAction($request, 'Changed '.$actionType.' Permission of roleId: '.$role->id);

      if($request->ajax())
        return 'Permission change saved!';
      else
        return redirect()->route('permissions.step2', $request->roleId);
}

public function checkAllPermissions(Request $request, $actionType){
    $role=Role::find($request->roleId);
  if($actionType=='allow_action'){
    $action_resources=Resource::where('is_crud', '=', 'false')->get();
      foreach ($action_resources as $resource) {
          $role_action=Role_action::where('roleId', '=', $request->roleId)->where('resourceId', '=', $resource->id)->first();
          if($role_action==null)
            $role_action=new Role_action;

          $role_action->roleId=$request->roleId;
          $role_action->resourceId=$resource->id;
        if($request->checked=='true'){
          $role_action->$actionType=1;
        }
        else{
          $role_action->$actionType=0;
          }
          $role_action->save();
        }
  }
  else{
    if($actionType!='show' && $actionType!='index' && $actionType!='store' && $actionType!='update' && $actionType!='destroy')
      return ['error', 'Action '.$actionType.' not found!'];

    $crud_resources=Resource::where('is_crud', '=', 'true')->get();
  foreach ($crud_resources as $resource) {
      $roleResource=Role_Resource::where('roleId', '=', $request->roleId)->where('resourceId', '=', $resource->id)->first();
      if($roleResource==null)
        $roleResource=new Role_Resource;

      $roleResource->roleId=$request->roleId;
      $roleResource->resourceId=$resource->id;
    if($request->checked=='true'){
      $roleResource->$actionType=1;
    }
    else{
      $roleResource->$actionType=0;
      }
      $roleResource->save();
    }
    }
    
    \App\Global_var::logAction($request, 'Changed all '.$actionType.' Permissions of roleId: '.$role->id);
   return redirect()->route('permissions.step2', $request->roleId);
}

/*--document permissions*/
public function saveDocumentPermission(Request $request, $actionType){
    $role=Role::find($request->roleId);

      if($actionType!='show' && $actionType!='update' && $actionType!='destroy' && $actionType!='share' && $actionType!='download')
      return ['error', 'Action '.$actionType.' not found!'];

      $roleResource=role_document_permission::where('roleId', '=', $request->roleId)->where('documentId', '=', $request->resourceId)->first();
      if($roleResource==null)
        $roleResource=new role_document_permission;
      $roleResource->roleId=$request->roleId;
      $roleResource->documentId=$request->resourceId;
      if($request->checked=='true'){
      $roleResource->$actionType=1;
      }
      else{
      $roleResource->$actionType=0;
      }

      $roleResource->save();

      \App\Global_var::logAction($request, 'Changed documentId: '.$request->resourceId.' '.$actionType.' Permission of roleId: '.$role->id);

      if($request->ajax())
        return 'Permission change saved!';
      else
        return redirect()->route('permissions.step2', $request->roleId);
}


public function checkAllDocumentPermissions(Request $request, $actionType){
    $role=Role::find($request->roleId);
    if($actionType!='all_actions' && $actionType!='show' && $actionType!='share' && $actionType!='update' && $actionType!='destroy' && $actionType!='download')
      return ['error', 'Action '.$actionType.' not found!'];

    $roles=Role::where('isDeleted', '=', 'false')->get();
  foreach ($roles as $role) {
      $roleResource=role_document_permission::where('documentId', '=', $request->documentId)->where('roleId', '=', $role->id)->first();
      if($roleResource==null)
        $roleResource=new role_document_permission;

      $roleResource->documentId=$request->documentId;
      $roleResource->roleId=$role->id;
  
        if($request->checked=='true'){
          if($actionType=='all_actions'){
              $roleResource->show=1;
              $roleResource->share=1;
              $roleResource->update=1;
              $roleResource->destroy=1;
              $roleResource->download=1;
            }else{
                $roleResource->$actionType=1;
            }
        }
        else{
          if($actionType=='all_actions'){
              $roleResource->show=0;
              $roleResource->share=0;
              $roleResource->update=0;
              $roleResource->destroy=0;
              $roleResource->download=0;
            }else{
                $roleResource->$actionType=0;
            }
        }

      $roleResource->save();
    }
    
  \App\Global_var::logAction($request, 'Changed documentId: '.$request->documentId.' '.$actionType.' All Permissions of roleId: '.$role->id);
   return redirect()->route('permissions.document_role_permissions', $request->documentId);
}

/*--endof permissions--*/

/*--Approvements*/
public function saveAprovements(Request $request){
    $role=Role::find($request->roleId);
    $resources=Resource::all();
    if($request->checked=='true'){
        $role->approvableResources()->sync([$request->resourceId], false);
      }
      else{
          $resource=Resource::find($request->resourceId);
          $resource->approvers()->detach();
        }
   //return redirect()->route('permissions.step2', $request->roleId);
}

public function checkAllApprovements(Request $request){

    $role=Role::find($request->roleId);
    if($request->checked=='true'){
      $resourcesIdArray=DB::table('resources')->pluck('id')->toArray();
        $role->approvableResources()->sync($resourcesIdArray, false);
      }
      else{
          $role->approvableResources()->detach();
        }
   return redirect()->route('permissions.step2', $request->roleId);
}

/*--Authorizations*/
public function saveAuthrizations(Request $request){

    $role=Role::find($request->roleId);
    $resources=Resource::all();
    if($request->checked=='true'){
        $role->authorizableResources()->sync([$request->resourceId], false);
      }
      else{
          $resource=Resource::find($request->resourceId);
          $resource->authorizers()->detach();
        }
   //return redirect()->route('permissions.step2', $request->roleId);
}

public function checkAllAuthrizations(Request $request){
  
    $role=Role::find($request->roleId);
    if($request->checked=='true'){
      $resourcesIdArray=DB::table('resources')->pluck('id')->toArray();
        $role->authorizableResources()->sync($resourcesIdArray, false);
      }
      else{
          $role->authorizableResources()->detach();
        }
   return redirect()->route('permissions.step2', $request->roleId);
}
/*--Receives*/
public function saveReceivers(Request $request){

    $role=Role::find($request->roleId);
    $resources=Resource::all();
    if($request->checked=='true'){
        $role->receivableResources()->sync([$request->resourceId], false);
      }
      else{
          $resource=Resource::find($request->resourceId);
          $resource->receivers()->detach();
        }
   //return redirect()->route('permissions.step2', $request->roleId);
}

public function checkAllReceivers(Request $request){
  
    $role=Role::find($request->roleId);
    if($request->checked=='true'){
      $resourcesIdArray=DB::table('resources')->pluck('id')->toArray();
        $role->receivableResources()->sync($resourcesIdArray, false);
      }
      else{
          $role->receivableResources()->detach();
        }
   return redirect()->route('permissions.step2', $request->roleId);
}
/*--Checkers*/
public function saveCheckers(Request $request){

    $role=Role::find($request->roleId);
    $resources=Resource::all();
    if($request->checked=='true'){
        $role->checkableResources()->sync([$request->resourceId], false);
      }
      else{
          $resource=Resource::find($request->resourceId);
          $resource->checkers()->detach();
        }
   //return redirect()->route('permissions.step2', $request->roleId);
}

public function checkAllCheckers(Request $request){
  
    $role=Role::find($request->roleId);
    if($request->checked=='true'){
      $resourcesIdArray=DB::table('resources')->pluck('id')->toArray();
        $role->checkableResources()->sync($resourcesIdArray, false);
      }
      else{
          $role->checkableResources()->detach();
        }
   return redirect()->route('permissions.step2', $request->roleId);
}
/*--Inspectors*/
public function saveInspectors(Request $request){
   
    $role=Role::find($request->roleId);
    $resources=Resource::all();
    if($request->checked=='true'){
        $role->inspectableResources()->sync([$request->resourceId], false);
      }
      else{
          $resource=Resource::find($request->resourceId);
          $resource->inspectors()->detach();
        }
   //return redirect()->route('permissions.step2', $request->roleId);
}

public function checkAllInspectors(Request $request){
   
    $role=Role::find($request->roleId);
    if($request->checked=='true'){
      $resourcesIdArray=DB::table('resources')->pluck('id')->toArray();
        $role->inspectableResources()->sync($resourcesIdArray, false);
      }
      else{
          $role->inspectableResources()->detach();
        }
   return redirect()->route('permissions.step2', $request->roleId);
}



public function listPermittedResources(){
  $roleId=Auth::guard('web')->user()!=null? (Auth::guard('web')->user()->role!=null? Auth::guard('web')->user()->role->id: 0): 0;
  if($roleId==0)
    return 'Logged in with Unknown Role';
  $role=Role::find($roleId);
  $resources=$role->resources;
  //$resourceIds=App\Role_Resource::where('roleId', '=', $roleId)->get();
  return view('layouts.sidebar-include')->withResources($resources);
}

public function store(Request $request){
   
     $usersAll=User::all();
      $staffs=array();
      $users=array();
      $staffIndex=0;
      $userIndex=0;

$user_roles=Role::all();
$resources=Resource::all();
//echo $user_roles[0]->roleName;
      foreach($resources as $resource){
        for ($index=0; $index<$user_roles->count(); $index++) {         
      $role=$user_roles[$index]->roleName."".$resource->id;//role{{$resource->id}}
     if($request->$role!="on"){
            Session::put('roleId', $user_roles[$index]->id);
           $resource->users()->detach();
          }
    if($request->$role=="on"){
     foreach ($usersAll as $user) {
/*      echo $user->role->roleName." = ".$user_roles[$index]->roleName."<br>";*/
    if($user->role!=null && $user->role->roleName==$user_roles[$index]->roleName){
        $user->save();
 
  $data=array();
  $rowData[0] = [
     $resource->id => [ 'roleId' =>$user->role->id ],
     
 ];
  $user->resources()->sync($rowData[0], false);
          }
      }
    }  
}
      }

      Session::flash('success', 'Permmissions Saved');
      return redirect()->route('permissions.create');   
    }

public function store2(Request $request){
 
      $usersAll=User::all();
      $staffs=array();
      $users=array();
      $staffIndex=0;
      $userIndex=0;

$user_roles=Role::all();
$resources=Resource::all();
//echo $user_roles[0]->roleName;
      foreach($resources as $resource){
        for ($index=0; $index<$user_roles->count(); $index++) {         
      $role=$user_roles[$index]->roleName."".$resource->id;//role{{$resource->id}}
     if($request->$role!="on"){
            Session::put('roleId', $user_roles[$index]->id);
           $resource->users()->detach();
          }
    if($request->$role=="on"){
     foreach ($usersAll as $user) {
/*      echo $user->role->roleName." = ".$user_roles[$index]->roleName."<br>";*/
        if($user->role!=null && $user->role->roleName==$user_roles[$index]->roleName){
  $user->save();
 
  $data=array();
  $rowData[0] = [
     $resource->id => [ 'roleId' =>$user->role->id ],
     
 ];
  $user->resources()->sync($rowData[0], false);
          }
      }
    }  
}
      }

      Session::flash('success', 'Permmissions Saved');
      return redirect()->route('permissions.create');   
    }

}
