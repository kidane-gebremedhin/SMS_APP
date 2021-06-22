<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;


class school extends Model
{
    protected $table="schools";

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }

  	public function wereda(){
    	return $this->belongsTo('App\wereda', 'weredaId', 'id');
    }
  	public function zone(){
    	return $this->belongsTo('App\zone', 'zoneId', 'id');
    }
  	public function region(){
    	return $this->belongsTo('App\region', 'regionId', 'id');
    }
   
}