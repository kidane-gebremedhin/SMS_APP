<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    protected $table='logs';

    public function user(){
    	return $this->belongsTo('App\User', 'userId', 'id');
    }
}
