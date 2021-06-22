<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;


class wereda extends Model
{
    protected $table="weredas";

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }

    public function schools(){
      return $this->hasMany('App\school', 'weredaId', 'id')->orderBy('id', 'desc');
    }
    public function zone(){
      return $this->belongsTo('App\zone', 'zoneId', 'id');
    }
  	public function region(){
    	return $this->belongsTo('App\region', 'regionId', 'id');
    }

}
