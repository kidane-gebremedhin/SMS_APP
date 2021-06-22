<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Resource extends Model
{
   
    protected $table="resources";

    public function users(){
    	return $this->belongsToMany('App\User', 'user_resource', 'resourceId', 'userId')->wherePivot('roleId',  Session::get('roleId'))->withPivot('roleId');
    }
    public function roles(){
    	return $this->belongsToMany('App\Role', 'role_resource', 'resourceId', 'roleId');
    }
    public function approvers(){
        return $this->belongsToMany('App\Role', 'role_approve_resources', 'resourceId', 'roleId');
    }
    public function authorizers(){
        return $this->belongsToMany('App\Role', 'Role_Authorize_Resources', 'resourceId', 'roleId');
    }
    public function recievers(){
        return $this->belongsToMany('App\Role', 'Role_Receive_Resources', 'resourceId', 'roleId');
    }
    public function checkers(){
        return $this->belongsToMany('App\Role', 'Role_Check_Resources', 'resourceId', 'roleId');
    }
    public function inspectors(){
        return $this->belongsToMany('App\Role', 'Role_Inspect_Resources', 'resourceId', 'roleId');
    }
}
