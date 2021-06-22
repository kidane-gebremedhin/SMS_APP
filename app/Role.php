<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Role extends Model
{
    public function hasDocumentPermission($resourceId, $actionType){
            if($this->isAdmin())
                return true;

            $configuredResource=$this->configuredDocument_Resources->where('documentId', '=', $resourceId)->first();

        if($configuredResource!=null && $configuredResource->$actionType==1){
            return true;
        }
        return false;
    }

    public function hasPermission($resourceId, $actionType){
        if($this->isAdmin())
            return true;

        if($actionType=='allow_action')
            $configuredResource=$this->configuredAction_Resources->where('resourceId', '=', $resourceId)->first();
        else 
            $configuredResource=$this->configuredCrud_Resources->where('resourceId', '=', $resourceId)->first();
        

        if($configuredResource!=null && $configuredResource->$actionType==1){
            return true;
        }
        return false;
    }

    public function isPriceEntry(){
        if($this->roleName=='Price Entry')
            return true;
        return false;
    }
    public function isAdmin(){
        if($this->roleName=='superadmin')
            return true;
        return false;
    }
    public function isZoneAdmin(){
        if($this->roleName=='Zone Admin')
            return true;
        return false;
    }
    public function isWeredaAdmin(){
        if($this->roleName=='Wereda Admin')
            return true;
        return false;
    }
    public function isSchoolAdmin(){
        if($this->roleName=='School Admin')
            return true;
        return false;
    }
    public function isEducationalLeadership(){
        if($this->roleName=='Educational Leadership')
            return true;
        return false;
    }
    public function isTeacher(){
        if($this->roleName=='Teacher')
            return true;
        return false;
    }
    public function isPublic(){
        if($this->roleName=='Viewer')
            return true;
        return false;
    }


    public function hasFull_Permission($actionType){
        if($this->isAdmin())
            return true;
        
        if($actionType=='allow_action'){
            $resources=Resource::where('is_crud', '=', 'false')->get();
            $configuredResources=$this->configuredAction_Resources;
        }
        else {
            $resources=Resource::where('is_crud', '=', 'true')->get();
            $configuredResources=$this->configuredCrud_Resources;
        }

        if(count($configuredResources->where($actionType, '=', 1))>=count($resources))
            return true;
        return false;
    }

    public function users(){
    	return $this->hasMany('App\User', 'roleId', 'id')->wherePivot('roleId',  Session::get('roleId'))->withPivot('roleId');
    }

    public function resources(){
        return $this->belongsToMany('App\Resource', 'role_resource', 'roleId', 'resourceId');
    }
    public function resources_menuLevel_1(){
        return $this->belongsToMany('App\Resource', 'role_resource', 'roleId', 'resourceId')->where('menuLevel', '=', '1');
    }
    public function resources_menuLevel_2(){
        return $this->belongsToMany('App\Resource', 'role_resource', 'roleId', 'resourceId')->where('menuLevel', '=', '2');
    }
    public function resources_menuLevel_3(){
        return $this->belongsToMany('App\Resource', 'role_resource', 'roleId', 'resourceId')->where('menuLevel', '=', '3');
    }

    public function configuredAction_Resources(){
        return $this->hasMany('App\Role_action', 'roleId', 'id');
    }
    public function configuredCrud_Resources(){
        return $this->hasMany('App\Role_Resource', 'roleId', 'id');
    }
    public function configuredDocument_Resources(){
        return $this->hasMany('App\role_document_permission', 'roleId', 'id');
    }

    public function authorizableResources(){
        return $this->belongsToMany('App\Resource', 'Role_Authorize_Resources', 'roleId', 'resourceId');
    }

    public function receivableResources(){
        return $this->belongsToMany('App\Resource', 'Role_Receive_Resources', 'roleId', 'resourceId');
    }

    public function checkableResources(){
        return $this->belongsToMany('App\Resource', 'Role_Check_Resources', 'roleId', 'resourceId');
    }

    public function inspectableResources(){
        return $this->belongsToMany('App\Resource', 'Role_Inspect_Resources', 'roleId', 'resourceId');
    }



}
