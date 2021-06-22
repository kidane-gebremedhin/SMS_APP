<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class country extends Model
{
    protected $table="countries";

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }

}
