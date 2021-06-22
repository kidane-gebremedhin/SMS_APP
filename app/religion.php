<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class religion extends Model
{
    protected $table="religion";

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }

}
