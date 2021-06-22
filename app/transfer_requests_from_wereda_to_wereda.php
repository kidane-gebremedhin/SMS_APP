<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class transfer_requests_from_wereda_to_wereda extends Model
{
    protected $table="transfer_requests_from_wereda_to_wereda";

    public function primaryScoreData(){
      $score=0;
      $hasVetoPower=false;
      $teacher=$this->teacher;
      //return 0 if invalid
      if($teacher==null)
        return 0;

      $transferCategoryWeights=transfer_category::where('isDeleted', 'false')->where('status', 'active')->where('isPrimary', 'true')->pluck('weight', 'name')->toArray();
      $mappedTransferCategoryNames=Global_var::mappedTransferCategoryNames();
      //handle Male and Female weights dynamically
      if(isset($transferCategoryWeights[$mappedTransferCategoryNames[$teacher->gender]])){
        $hasVetoPower=Global_var::hasVetoPower($teacher->gender);
        $score+=$transferCategoryWeights[$mappedTransferCategoryNames[$teacher->gender]];
      }
      if($this->isEthinic=='true' && isset($transferCategoryWeights[$mappedTransferCategoryNames['isEthinic']])){
        $score+=$transferCategoryWeights[$mappedTransferCategoryNames['isEthinic']];
        $hasVetoPower=Global_var::hasVetoPower($teacher->gender);
      }
      if($teacher->hasHealthIssue=='true' && isset($transferCategoryWeights[$mappedTransferCategoryNames['hasHealthIssue']])){
        $score+=$transferCategoryWeights[$mappedTransferCategoryNames['hasHealthIssue']];
        $hasVetoPower=Global_var::hasVetoPower($teacher->gender);
      }
      if($teacher->isPhysicalyDisabled=='true' && isset($transferCategoryWeights[$mappedTransferCategoryNames['isPhysicalyDisabled']])){
        $score+=$transferCategoryWeights[$mappedTransferCategoryNames['isPhysicalyDisabled']];
        $hasVetoPower=Global_var::hasVetoPower($teacher->isPhysicalyDisabled);
      }
      if($teacher->isAppointed=='true' && isset($transferCategoryWeights[$mappedTransferCategoryNames['isAppointed']])){
        $score+=$transferCategoryWeights[$mappedTransferCategoryNames['isAppointed']];
        $hasVetoPower=Global_var::hasVetoPower($teacher->isAppointed);
      }
      //to give the deserved weight  
      $score+=$this->calculatedServiceYears * 100;

      return ['hasVetoPower'=>$hasVetoPower, 'score'=>$score];
    }
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
    public function merriagePartnerWereda(){
      return $this->belongsTo('App\wereda', 'merriagePartnerWeredaId', 'id');
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
