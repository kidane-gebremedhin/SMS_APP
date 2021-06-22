<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class wereda_teacher_acceptance_capacity extends Model
{
    protected $table="wereda_teacher_acceptance_capacity";

  	public function round(){
    	return $this->belongsTo('App\round', 'roundId', 'id');
    }
  	public function requestType(){
    	return $this->belongsTo('App\request_type', 'requestTypeId', 'id');
    }
  	public function wereda(){
    	return $this->belongsTo('App\wereda', 'weredaId', 'id');
    }
  	public function educationalLevel(){
    	return $this->belongsTo('App\educational_level', 'educationalLevelId', 'id');
    }
  	public function subject(){
    	return $this->belongsTo('App\subject', 'subjectId', 'id');
    }

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
    
}
