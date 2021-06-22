<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class currency_type extends Model
{
    protected $table="currencytypes";


    public function createdByUser(){
        return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
}
