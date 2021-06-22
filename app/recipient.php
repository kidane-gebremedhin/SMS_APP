<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class recipient extends Model
{
    protected $table="recipients";

   public function category(){
    	return $this->belongsTo('App\recipient_category', 'categoryId', 'id');
    }
   public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
    
}
