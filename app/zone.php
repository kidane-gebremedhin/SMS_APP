<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;


class zone extends Model
{
    protected $table="zones";

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }

    public function schools(){
      return $this->hasMany('App\school', 'zoneId', 'id')->orderBy('id', 'desc');
    }
    public function weredas(){
      return $this->hasMany('App\wereda', 'zoneId', 'id')->orderBy('id', 'desc');
    }

    public function region(){
      return $this->belongsTo('App\region', 'regionId', 'id')->orderBy('id', 'desc');
    }    

}
