<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class teacher extends Model
{
    protected $table="teachers";

  	public function transfer_requests_from_wereda_to_weredas(){
    	return $this->hasMany('App\transfer_requests_from_wereda_to_wereda', 'teacherId', 'id');
    }
    public function merriagePartner(){
      return $this->belongsTo('App\teacher', 'merriagePartnerId', 'id');
    }
  	public function merriagePartnerWereda(){
    	return $this->belongsTo('App\wereda', 'merriagePartnerWeredaId', 'id');
    }
  	public function merriagePartnerSchool(){
    	return $this->belongsTo('App\school', 'merriagePartnerSchoolId', 'id');
    }
  	public function educationalLevel(){
    	return $this->belongsTo('App\educational_level', 'educationalLevelId', 'id');
    }
  	public function regularJob(){
    	return $this->belongsTo('App\job', 'regularJobId', 'id');
    }
  	public function graduatedSubject(){
    	return $this->belongsTo('App\subject', 'graduatedSubjectId', 'id');
    }
  	public function teachingSubject(){
    	return $this->belongsTo('App\subject', 'teachingSubjectId', 'id');
    }

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
    
}
