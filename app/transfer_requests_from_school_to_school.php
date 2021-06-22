<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class transfer_requests_from_school_to_school extends Model
{
    protected $table="transfer_requests_from_school_to_school";

    public function teacher(){
      return $this->belongsTo('App\teacher', 'teacherId', 'id');
    }
    public function round(){
      return $this->belongsTo('App\round', 'roundId', 'id');
    }
  	public function requestType(){
    	return $this->belongsTo('App\request_type', 'requestTypeId', 'id');
    }
    public function fromWereda(){
      return $this->belongsTo('App\wereda', 'fromWeredaId', 'id');
    }
    public function toWereda(){
      return $this->belongsTo('App\wereda', 'toWeredaId', 'id');
    }
    public function fromSchool(){
      return $this->belongsTo('App\school', 'fromSchoolId', 'id');
    }
    public function toSchool(){
      return $this->belongsTo('App\school', 'toSchoolId', 'id');
    }
    public function merriagePartnerSchool(){
      return $this->belongsTo('App\school', 'merriagePartnerSchoolId', 'id');
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
