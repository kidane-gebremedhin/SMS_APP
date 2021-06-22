<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class transfer_results_from_school_to_school extends Model
{
    protected $table="transfer_results_from_school_to_school";

    public function request(){
      return $this->belongsTo('App\transfer_requests_from_school_to_school', 'requestId', 'id');
    }

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
    
}
