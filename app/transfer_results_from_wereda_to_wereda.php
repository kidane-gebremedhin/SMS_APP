<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class transfer_results_from_wereda_to_wereda extends Model
{
    protected $table="transfer_results_from_wereda_to_wereda";

    public function request(){
      return $this->belongsTo('App\transfer_requests_from_wereda_to_wereda', 'requestId', 'id');
    }

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
    
}
