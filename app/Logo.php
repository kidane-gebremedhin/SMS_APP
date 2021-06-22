<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table="generals";
    
    public function createdByUser(){
        return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
}
