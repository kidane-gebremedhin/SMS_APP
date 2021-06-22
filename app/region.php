<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class region extends Model
{
    protected $table="regions";



public function heavy_crime_ksi_mezgebat(){
  return $this->ksi_mezgebat()->where('crimeWeight', '=', 'Medium_And_Havy');
      //return $this->hasMany('App\ksi_mezgeb', 'regionId', 'id')->where('crimeWeight', '=', 'Medium_And_Havy')->orderBy('id', 'desc');
    }
 public function leading_investigation_of_heavy_crimes(){
      $leading_investigation_of_heavy_crimes=\App\leading_investigation_of_heavy_crime::where('id', '>', 0);
      return $leading_investigation_of_heavy_crimes;
    }
 public function human_rights(){
      $human_rights=\App\human_right::where('regionId', '=', $this->id);
      return $human_rights;
    }
  public function complains_by_customerData(){
      $Complains_Count_Male=0;
      $Complains_Count_Female=0;
      $Complained_In_Police=0;
      $Complained_In_Justice_Office=0;
      $Complained_Other=0;
      $Complained_In_Case_Delayed=0;
      $Complained_In_Investigation_Request=0;
      $Complained_In_Document_Closed=0;
      $Complained_In_Appeal_Request=0;
      $Complained_In_Service_Complain=0;
      $Complained_In_Human_Right_Voilence=0;
      $Complained_In_Unethical=0;
      $Complained_In_Other=0;
      $Responce_Fully_Accepted=0;
      $Responce_Partially_Accepted=0;
      $Responce_Fully_Rejected=0;
      $Efficiency_Quantity=0;
      $Quality_Quantity=0;
      $Satisfaction_Quantity=0;
      $Rank_Efficiency=0;
      $Rank_Quality=0;
      $Rank_Satisfaction=0;

      $complains_by_customer=$this->complains_by_customer();/*
      \App\complains_by_customer::where('zoneId', '=', $this->id);*/
      foreach ($complains_by_customer as $complain) {
            if($complain->gender=="Male")
              $Complains_Count_Male++;
            if($complain->gender=="Female")
              $Complains_Count_Female++;
          
            if($complain->complained_to_party=="In_Police")
              $Complained_In_Police++;
            if($complain->complained_to_party=="In_Justice_Office")
              $Complained_In_Justice_Office++;
            if($complain->complained_to_party=="Other")
              $Complained_Other++;
          
            if($complain->complain_type=="Case_Delayed")
              $Complained_In_Case_Delayed++;
            if($complain->complain_type=="Investigation_Request")
              $Complained_In_Investigation_Request++;
            if($complain->complain_type=="Document_Closed")
              $Complained_In_Document_Closed++;
            if($complain->complain_type=="Appeal_Request")
              $Complained_In_Appeal_Request++;
            if($complain->complain_type=="Service_Complain")
              $Complained_In_Service_Complain++;
            if($complain->complain_type=="Human_Right_Voilence")
              $Complained_In_Human_Right_Voilence++;
            if($complain->complain_type=="Unethical")
              $Complained_In_Unethical++;
            if($complain->complain_type=="Other")
              $Complained_In_Other++;
        
        
        if($complain->response_type=="Fully_Accepted")
          $Responce_Fully_Accepted++;
        if($complain->response_type=="Partially_Accepted")
          $Responce_Partially_Accepted++;
        if($complain->response_type=="Fully_Rejected")
          $Responce_Fully_Rejected++;

        if($complain->efficiency=="Decided_In_Less_Than_45_Minutes")
          $Efficiency_Quantity++;
        if($complain->quality=="Approved_By_Higher_Level")
          $Quality_Quantity++;
        if($complain->satisfaction_status!=null && $complain->satisfaction_status->keyWord=="Satisfied")
          $Satisfaction_Quantity++;
      }

      $data_array=array(
                        'Complains_Count_Male'=>$Complains_Count_Male, 
                        'Complains_Count_Female'=>$Complains_Count_Female, 
                        'Complained_In_Police'=>$Complained_In_Police, 
                        'Complained_In_Justice_Office'=>$Complained_In_Justice_Office, 
                        'Complained_Other'=>$Complained_Other, 
                        'Complained_In_Case_Delayed'=>$Complained_In_Case_Delayed, 
                        'Complained_In_Investigation_Request'=>$Complained_In_Investigation_Request, 
                        'Complained_In_Document_Closed'=>$Complained_In_Document_Closed, 
                        'Complained_In_Appeal_Request'=>$Complained_In_Appeal_Request, 
                        'Complained_In_Service_Complain'=>$Complained_In_Service_Complain, 
                        'Complained_In_Human_Right_Voilence'=>$Complained_In_Human_Right_Voilence, 
                        'Complained_In_Unethical'=>$Complained_In_Unethical, 
                        'Complained_In_Other'=>$Complained_In_Other, 
                        'Responce_Fully_Accepted'=>$Responce_Fully_Accepted, 
                        'Responce_Partially_Accepted'=>$Responce_Partially_Accepted, 
                        'Responce_Fully_Rejected'=>$Responce_Fully_Rejected, 
                        'Efficiency_Quantity'=>$Efficiency_Quantity, 
                        'Quality_Quantity'=>$Quality_Quantity, 
                        'Satisfaction_Quantity'=>$Satisfaction_Quantity, 
                        );

      return $data_array;
    }
 
  public function Supported_Needy_Parties(){
      $Supported_Needy_Parties_Count=0;
      $child_male=0; $child_female=0; $female=0; $disabled_male=0;
      $disabled_female=0; $elders_male=0;
      $elders_female=0; $others_male=0;
      $others_female=0;
      $giving_priority=0;
$efficiency_count=0;
$effectiveness_count=0;

      $law_advice_count=0; $accuse_responce_count=0; $argument_count=0; $other_advice_count=0; 
      $Supported_Needy_Parties=$this->glgalot_ntsadgaf_hgi();/*
      \App\glgalot_ntsadgaf_hgi::where('region', '=', $this->id);*/
      foreach ($Supported_Needy_Parties as $Needy_Party) {
          $Supported_Needy_Parties_Count++;
          /*if($Needy_Party->gender=="Female")
            $female++;*/
        if($Needy_Party->glgalot_given_party_type!=null){
          if($Needy_Party->glgalot_given_party_type->keyWord=="Female"){
            $female++;
          }
          else if($Needy_Party->glgalot_given_party_type->keyWord=="Child"){
            if($Needy_Party->gender=="Male")
              $child_male++;
            if($Needy_Party->gender=="Female")
              $child_female++;
          }
          else if($Needy_Party->glgalot_given_party_type->keyWord=="Disabled"){
            if($Needy_Party->gender=="Male")
              $disabled_male++;
            if($Needy_Party->gender=="Female")
              $disabled_female++;
          }
          else if($Needy_Party->glgalot_given_party_type->keyWord=="Elders"){
            if($Needy_Party->gender=="Male")
              $elders_male++;
            if($Needy_Party->gender=="Female")
              $elders_female++;
          }
          else{
            if($Needy_Party->gender=="Male")
              $others_male++;
            if($Needy_Party->gender=="Female")
              $others_female++;
          }
        }
        
    if($Needy_Party->effectiveness!=null && $Needy_Party->effectiveness->keyWord=="Effective")
      $effectiveness_count++;

        if($Needy_Party->priority_given=="ዝተውሃበ")
          $giving_priority++;
        if($Needy_Party->aynet_glgalot!=null){
          if($Needy_Party->aynet_glgalot->keyWord=="Advice_Of_Law"){
              $law_advice_count++;
          }
          else if($Needy_Party->aynet_glgalot->keyWord=="Accusal_Preparation"){
              $accuse_responce_count++;
          }
          else if($Needy_Party->aynet_glgalot->keyWord=="Argument"){
              $argument_count++;
          }
          else{
            $other_advice_count++;
          } 
        }

      }

      $data_array=array('Supported_Needy_Parties_Count'=>$Supported_Needy_Parties_Count,
                        'child_male'=>$child_male, 
                        'child_female'=>$child_female, 
                        'female'=>$female,
                        'disabled_male'=>$disabled_male,
                        'disabled_female'=>$disabled_female,
                        'elders_male'=>$elders_male,
                        'elders_female'=>$elders_female,
                        'others_male'=>$others_male,
                        'others_female'=>$others_female,

                        'giving_priority'=>$giving_priority, 
                        'law_advice_count'=>$law_advice_count, 
                        'accuse_responce_count'=>$accuse_responce_count, 
                        'argument_count'=>$argument_count,
                        'other_advice_count'=>$other_advice_count,
                        'efficiency_count'=>$efficiency_count,
                        'effectiveness_count'=>$effectiveness_count,
                        );

      return $data_array;
    }

  public function free_law_support_for_organizations(){
      $governmental_orgs_count=0;
      $developmental_orgs_count=0;

      $followed_up_governmental_orgs_count=0;
      $followed_up_developmental_orgs_count=0;

      $annual_plan_for_research=0;
      $researched_governmental_orgs_count=0;
      $researched_developmental_orgs_count=0;

      $law_advice_count=0; $accuse_responce_count=0; $argument_count=0; $other_advice_count=0; 
      $effective_count=0; $quality_count=0;
      $kttln_dgafn_abyate_eyo=$this->kttln_dgafn_abyate_eyo();/*\App\kttln_dgafn_abyate_eyo::where('region', '=', $this->id);*/
      foreach ($kttln_dgafn_abyate_eyo as $dgaf) {

          if($dgaf->dgaf_given_organization_type->keyWord=="Regional_Organization" || $dgaf->dgaf_given_organization_type->keyWord=="Federal_Organization"){
            $followed_up_governmental_orgs_count++;
            
          }
          else if($dgaf->dgaf_given_organization_type->keyWord=="Developmental_Regional_Organization" || $dgaf->dgaf_given_organization_type->keyWord=="Developmental_Federal_Organization"){
            $followed_up_developmental_orgs_count++;
          }

        if($dgaf->aynet_glgalot!=null){
          if($dgaf->aynet_glgalot->keyWord=="Advice_Of_Law"){
              $law_advice_count++;
          }
          else if($dgaf->aynet_glgalot->keyWord=="Accusal_Preparation"){
              $accuse_responce_count++;
          }
          else if($dgaf->aynet_glgalot->keyWord=="Argument"){
              $argument_count++;
          }
          else{
            $other_advice_count++;
          } 
        }

        if($dgaf->effectiveness!=null && $dgaf->effectiveness->keyWord=="Efficient"){
              $effective_count++;
          }
        if($dgaf->quality!=null && $dgaf->quality->keyWord=="Quality"){
              $quality_count++;
          }
      }

      $data_array=array(
                        'governmental_orgs_count'=>$governmental_orgs_count, 
                        'developmental_orgs_count'=>$developmental_orgs_count,
                        'followed_up_governmental_orgs_count'=>$followed_up_governmental_orgs_count, 
                        'followed_up_developmental_orgs_count'=>$followed_up_developmental_orgs_count,

                        'researched_governmental_orgs_count'=>$researched_governmental_orgs_count,
                        'researched_developmental_orgs_count'=>$researched_developmental_orgs_count,

                        'law_advice_count'=>$law_advice_count, 
                        'accuse_responce_count'=>$accuse_responce_count, 
                        'argument_count'=>$argument_count,
                        'other_advice_count'=>$other_advice_count,

                        'effective_count'=>$effective_count,
                        'quality_count'=>$quality_count,
                        );

      return $data_array;
    }


 public function Shortage_Of_Food_And_Water($isInPrison){
    if($isInPrison=="true")
    $human_right_complain_records=\App\human_right_prison_complain_record::whereIn('human_rightId', (new Collection($this->human_right_prison()))->pluck('id'))->get();
    else
    $human_right_complain_records=\App\human_right_complain_record::whereIn('human_rightId', (new Collection($this->human_right())) ->pluck('id'))->get();

      $count=0; $true_count=0; $solved_count=0;
      foreach ($human_right_complain_records as $complain_record) {
        if($complain_record->aynet_trean==null)
          continue;
        if($complain_record->aynet_trean->keyWord=="Shortage_Of_Food" || $complain_record->aynet_trean->keyWord=="Shortage_Of_Water"){
          $count++;
        if($complain_record->truthness_status->keyWord=="true"){
          $true_count++;
          if($complain_record->solution_status=="Solved")
            $solved_count++;
          }
          }
      }
      return [$count, $true_count, $solved_count];
    }
 public function Width_And_Quality($isInPrison){
    if($isInPrison=="true")
    $human_right_complain_records=\App\human_right_prison_complain_record::whereIn('human_rightId', (new Collection($this->human_right_prison()))->pluck('id'))->get();
    else
    $human_right_complain_records=\App\human_right_complain_record::whereIn('human_rightId', (new Collection($this->human_right()))->pluck('id'))->get();

      $count=0; $true_count=0; $solved_count=0;
      foreach ($human_right_complain_records as $complain_record) {
        if($complain_record->aynet_trean==null)
          continue;
        if($complain_record->aynet_trean->keyWord=="Width_Place" || $complain_record->aynet_trean->keyWord=="Quality_Place"){
          $count++;
          if($complain_record->truthness_status->keyWord=="true"){
          $true_count++;
          if($complain_record->solution_status=="Solved")
            $solved_count++;
          }
        }
      }
      return [$count, $true_count, $solved_count];
    }
 public function Investigation_Delay($isInPrison){
    if($isInPrison=="true")
    $human_right_complain_records=\App\human_right_prison_complain_record::whereIn('human_rightId', (new Collection($this->human_right_prison()))->pluck('id'))->get();
    else
    $human_right_complain_records=\App\human_right_complain_record::whereIn('human_rightId', (new Collection($this->human_right()))->pluck('id'))->get();
    
    $count=0; $true_count=0; $solved_count=0;
      foreach ($human_right_complain_records as $complain_record) {
        if($complain_record->aynet_trean==null)
          continue;
        if($complain_record->aynet_trean->keyWord=="Investigation_Delay"){
          $count++;
          if($complain_record->truthness_status->keyWord=="true"){
          $true_count++;
          if($complain_record->solution_status=="Solved")
            $solved_count++;
          }
        }
      }
      return [$count, $true_count, $solved_count];
    }
 public function Court_Delay($isInPrison){
    if($isInPrison=="true")
    $human_right_complain_records=\App\human_right_prison_complain_record::whereIn('human_rightId', (new Collection($this->human_right_prison()))->pluck('id'))->get();
    else
    $human_right_complain_records=\App\human_right_complain_record::whereIn('human_rightId', (new Collection($this->human_right()))->pluck('id'))->get();

      $count=0; $true_count=0; $solved_count=0;
      foreach ($human_right_complain_records as $complain_record) {
        if($complain_record->aynet_trean==null)
          continue;
        if($complain_record->aynet_trean->keyWord=="Court_Delay"){
          $count++;
          if($complain_record->truthness_status->keyWord=="true"){
          $true_count++;
          if($complain_record->solution_status=="Solved")
            $solved_count++;
          }
        }
      }
      return [$count, $true_count, $solved_count];
    }
 public function Familly_Relation_Denied($isInPrison){
    if($isInPrison=="true")
    $human_right_complain_records=\App\human_right_prison_complain_record::whereIn('human_rightId', (new Collection($this->human_right_prison()))->pluck('id'))->get();
    else
    $human_right_complain_records=\App\human_right_complain_record::whereIn('human_rightId', (new Collection($this->human_right()))->pluck('id'))->get();

      $count=0; $true_count=0; $solved_count=0;
      foreach ($human_right_complain_records as $complain_record) {
        if($complain_record->aynet_trean==null)
          continue;
        if($complain_record->aynet_trean->keyWord=="Familly_Relation_Denied"){
          $count++;
          if($complain_record->truthness_status->keyWord=="true"){
          $true_count++;
          if($complain_record->solution_status=="Solved")
            $solved_count++;
          }
        }
      }
      return [$count, $true_count, $solved_count];
    }
 public function Challenge($isInPrison){
    if($isInPrison=="true")
    $human_right_complain_records=\App\human_right_prison_complain_record::whereIn('human_rightId', (new Collection($this->human_right_prison()))->pluck('id'))->get();
    else
    $human_right_complain_records=\App\human_right_complain_record::whereIn('human_rightId', (new Collection($this->human_right()))->pluck('id'))->get();

      $count=0; $true_count=0; $solved_count=0;
      foreach ($human_right_complain_records as $complain_record) {
        if($complain_record->aynet_trean==null)
          continue;
        if($complain_record->aynet_trean->keyWord=="Challenge"){
          $count++;
          if($complain_record->truthness_status->keyWord=="true"){
          $true_count++;
          if($complain_record->solution_status=="Solved")
            $solved_count++;
          }
        }
      }
      return [$count, $true_count, $solved_count];
    }
 public function Shock($isInPrison){
    if($isInPrison=="true")
    $human_right_complain_records=\App\human_right_prison_complain_record::whereIn('human_rightId', (new Collection($this->human_right_prison()))->pluck('id'))->get();
    else
    $human_right_complain_records=\App\human_right_complain_record::whereIn('human_rightId', (new Collection($this->human_right()))->pluck('id'))->get();

      $count=0; $true_count=0; $solved_count=0;
      foreach ($human_right_complain_records as $complain_record) {
        if($complain_record->aynet_trean==null)
          continue;
        if($complain_record->aynet_trean->keyWord=="Shock_When_Prisoned" || $complain_record->aynet_trean->keyWord=="Shock_When_Arrested"){
          $count++;
          if($complain_record->truthness_status->keyWord=="true"){
          $true_count++;
          if($complain_record->solution_status=="Solved")
            $solved_count++;
          }
        }
      }
      return [$count, $true_count, $solved_count];
    }
 public function Other($isInPrison){
    if($isInPrison=="true")
    $human_right_complain_records=\App\human_right_prison_complain_record::whereIn('human_rightId', (new Collection($this->human_right_prison()))->pluck('id'))->get();
    else
    $human_right_complain_records=\App\human_right_complain_record::whereIn('human_rightId', (new Collection($this->human_right()))->pluck('id'))->get();

      $count=0; $true_count=0; $solved_count=0;
      foreach ($human_right_complain_records as $complain_record) {
        if($complain_record->aynet_trean==null)
          continue;
        if($complain_record->aynet_trean->keyWord=="Other"){
          $count++;
          if($complain_record->truthness_status->keyWord=="true"){
          $true_count++;
          if($complain_record->solution_status=="Solved")
            $solved_count++;
          }
        }
      }
      return [$count, $true_count, $solved_count];
    }



 public function Needed_Witness_Count(){
      $witness_follow_ups=$this->witness_follow_up();//\App\witness_follow_up::where('region', '=', $this->id)->get();
      $male_count=0; $female_count=0;
      foreach ($witness_follow_ups as $follow_up) {
          if($follow_up->witness_gender=="Male")
            $male_count++;
          if($follow_up->witness_gender=="Female")
            $female_count++;
        
      }
      return [$male_count, $female_count];
    }

 public function Witnessed_Count(){
      $witness_follow_ups=$this->witness_follow_up();//\App\witness_follow_up::where('region', '=', $this->id)->get();
      $male_count=0; $female_count=0;
      foreach ($witness_follow_ups as $follow_up) {
      if(!$follow_up->isAvaliable_In_Court())
        continue;

          if($follow_up->witness_gender=="Male")
            $male_count++;
          if($follow_up->witness_gender=="Female")
            $female_count++;
        
      }
      return [$male_count, $female_count];
    }
 public function From_All_Witnesses_Secured_By_Follow_Up(){
      $witness_follow_ups=$this->witness_follow_up();//\App\witness_follow_up::where('region', '=', $this->id)->get();
      $male_count=0; $female_count=0;
      foreach ($witness_follow_ups as $follow_up) {
        if(!$follow_up->isAvaliable_In_Court())
        continue;
      
        if($follow_up->witness_safety_status!=null && $follow_up->witness_safety_status->keyWord=='Secured'){
          if($follow_up->witness_gender=="Male")
            $male_count++;
          if($follow_up->witness_gender=="Female")
            $female_count++;
        }
      }
      return [$male_count, $female_count];
    }

 public function Challenged_Witnesses_Supported(){
      $witness_follow_ups=$this->witness_follow_up();//\App\witness_follow_up::where('region', '=', $this->id)->get();
      $male_count=0; $female_count=0;
      foreach ($witness_follow_ups as $follow_up) {
        if(!$follow_up->isAvaliable_In_Court())
        continue;
      
      if($follow_up->kunetat_tetseno_mftar=="ዝበፅሖ" && $follow_up->kunetat_dgaf=="ድጋፍ ዝተገበረሉ"){
          if($follow_up->witness_gender=="Male")
            $male_count++;
          if($follow_up->witness_gender=="Female")
            $female_count++;
        }
      }
      return [$male_count, $female_count];
    }


 public function Witnessed_As_Is(){
      $witness_follow_ups=$this->witness_follow_up();//\App\witness_follow_up::where('region', '=', $this->id)->get();
      $male_count=0; $female_count=0;
      foreach ($witness_follow_ups as $follow_up) {
         if(!$follow_up->isAvaliable_In_Court())
        continue;

      if($follow_up->witness_correctness_statusId!='Witnessed_As_Is')
        continue;
      
       if($follow_up->witness_gender=="Male")
            $male_count++;
          if($follow_up->witness_gender=="Female")
            $female_count++;
      }
      return [$male_count, $female_count];
    }
 public function Witnessed_A_Lie_And_Accused(){
      $witness_follow_ups=$this->witness_follow_up();//\App\witness_follow_up::where('region', '=', $this->id)->get();
      $male_count=0; $female_count=0;
      foreach ($witness_follow_ups as $follow_up) {
      if(!$follow_up->isAvaliable_In_Court())
        continue;
      
      if($follow_up->witness_correctness_statusId!='Witnessed_A_Lie')
        continue;
      if($follow_up->witness_not_correct_accused!='Accused_For_Lie')
        continue;

      if($follow_up->witness_gender=="Male")
            $male_count++;
          if($follow_up->witness_gender=="Female")
            $female_count++;
      }
      return [$male_count, $female_count];
    }



 public function Payment_Of_Allowance(){
      $witness_follow_ups=$this->witness_follow_up();//\App\witness_follow_up::where('region', '=', $this->id)->get();
      $total_count=0; $paid_count=0; $paid_amount=0;
      foreach ($witness_follow_ups as $follow_up) {
        $total_count++;
          if($follow_up->witness_payment_status!=null && $follow_up->witness_payment_status->keyWord=="Paid"){
            $paid_count++;
            $paid_amount+=$follow_up->witness_paid_amount;
          }
      }
      return [$total_count, $paid_count, $paid_amount];
    }

 public function Appointment_Count(){
      $witness_follow_ups=$this->witness_follow_up();//\App\witness_follow_up::where('region', '=', $this->id)->get();
      $one_time=0; $two_time=0; $three_time=0; $more_time=0; 
      foreach ($witness_follow_ups as $follow_up) {
          if($follow_up->witness_appointment_count==1)
            $one_time++;
          if($follow_up->witness_appointment_count==2)
            $two_time++;
          if($follow_up->witness_appointment_count==3)
            $three_time++;
          if($follow_up->witness_appointment_count>=4)
            $more_time++;
      }
      return [$one_time, $two_time, $three_time, $more_time];
    }





  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }

  	public function country(){
    	return $this->belongsTo('App\country', 'countryId', 'id')->orderBy('id', 'desc');
    }

    public function zones(){
      return $this->hasMany('App\zone', 'regionId', 'id')->orderBy('id', 'desc');
    }
    public function weredas(){
      return $this->hasMany('App\wereda', 'regionId', 'id')->orderBy('id', 'desc');
    }
    public function schools(){
      return $this->hasMany('App\school', 'regionId', 'id')->orderBy('id', 'desc');
    }
    public function tabyas(){
      return $this->hasMany('App\tabya', 'regionId', 'id')->orderBy('id', 'desc');
    }
    public function kebelles(){
      return $this->hasMany('App\kebelle', 'regionId', 'id')->orderBy('id', 'desc');
    }

  public function ksi_mezgebat(){
      $ksi_mezgebIds=[];
      foreach ($this->ksi_mezgeb_brkitat() as $ksi_mezgeb_brki) {
        if($ksi_mezgeb_brki->ksi_mezgeb==null || $ksi_mezgeb_brki->isCompleted!="true")
          continue;
      array_push($ksi_mezgebIds, $ksi_mezgeb_brki->ksi_mezgeb->id);

      }
      return ksi_mezgeb::whereIn('id', $ksi_mezgebIds)->orderBy('id', 'desc')->get();
      //return $this->hasMany('App\ksi_mezgeb', 'regionId', 'id')->orderBy('id', 'desc');
    }
    
    public function ksi_mezgeb_brkitat(){
      $currentUser=\Auth::guard('web')->user();
      $ksi_mezgebIds=[];
$ksi_mezgeb_brkitat_Array=array();
      $ksi_mezgeb_brkitat=$currentUser->ksi_mezgeb_brkitat();//\App\ksi_mezgeb_brki::where('isCompleted', '=', 'true')->get();
      foreach ($ksi_mezgeb_brkitat as $ksi_mezgeb_brki) {
        $ksi_mezgeb=$ksi_mezgeb_brki->ksi_mezgeb;
        if($ksi_mezgeb==null)
          continue;
        if(!$ksi_mezgeb_brki->isDirect() && $ksi_mezgeb->getLastBrki!=null && ($ksi_mezgeb->getLastBrki->keyWord=="Wereda" || $ksi_mezgeb->getLastBrki->keyWord=="Zone"))
            continue;

        if($currentUser->isAdmin() && $ksi_mezgeb_brki->isDirect() && ($ksi_mezgeb->created_a_brki=="Wereda" || $ksi_mezgeb->created_a_brki=="Zone"))
            continue;

          if($ksi_mezgeb==null || $ksi_mezgeb->regionId!=$this->id || (!$currentUser->isAdmin() && $ksi_mezgeb_brki->isDirect() && $ksi_mezgeb->created_a_brki!="Region" && $ksi_mezgeb->created_a_brki!='Breaking_Region' && $ksi_mezgeb->created_a_brki!='Federal' && $ksi_mezgeb->created_a_brki!='Breaking_Federal' && $ksi_mezgeb->created_a_brki!='HF_Region' && $ksi_mezgeb->created_a_brki!='HF_Federal'))
            continue;

/*---------Test Area---------*/
/*
$currentYear=Date_class::getCurrentYear();
$reportDate_Start=\Session::get('startDate')!=null? \Session::get('startDate'): Global_var::$newYear_dayMonth.'/'.$currentYear;
$reportDate_End=\Session::get('endDate')!=null? \Session::get('endDate'): Global_var::$newYear_dayMonth.'/'.($currentYear+1);
$dateDiff=Date_class::getDateDiffernece($reportDate_Start, $ksi_mezgeb_brki->entryDate);

if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
    continue;

$dateDiff=Date_class::getDateDiffernece($ksi_mezgeb_brki->entryDate, $reportDate_End);

if($dateDiff->days>0 && $dateDiff->invert==0)//inverted=0 means negative diff
    continue;
*/

/*echo $reportDate_Start." - ".$ksi_mezgeb_brki->entryDate." - ".$reportDate_End;
print_r($dateDiff);
echo $ksi_mezgeb_brki->entryDate." ".$reportDate_End;
dd($dateDiff);*/
/*----------------*/


      /*$dateDiff=Date_class::getDateDiffernece($ksi_mezgeb_brki->entryDate, (new Date_class)->getCurrentDate());
      if($dateDiff->m>Global_var::$reportIntervalInMonths)//if greater than 6 months
        continue;*/
if(Session::get('Rounded')!='true'){
  if(!\App\Global_var::isWithIn_DateInterval($ksi_mezgeb_brki))
  continue;
}

Session::put('Rounded', 'false');
if(!$ksi_mezgeb_brki->isNewDocument() && !$ksi_mezgeb_brki->isRoundedDocument())
  continue;
         /*if(!Global_var::existsInArray($ksi_mezgebIds, $ksi_mezgeb_brki->ksi_mezgebId))
        array_push($ksi_mezgebIds, $ksi_mezgeb_brki->ksi_mezgebId);
      else if(!$ksi_mezgeb_brki->isDirect() && $ksi_mezgeb_brki->isAppealedToNextBrki())
        continue;*/
      
      array_push($ksi_mezgeb_brkitat_Array, $ksi_mezgeb_brki);
      }

      return $ksi_mezgeb_brkitat_Array;
    }
  



    public function ftabher_mezgebat(){
      $ksi_mezgebIds=[];
      foreach ($this->ftabher_mezgeb_brkitat() as $ksi_mezgeb_brki) {
        if($ksi_mezgeb_brki->ksi_mezgeb==null || $ksi_mezgeb_brki->isCompleted!="true")
          continue;
      array_push($ksi_mezgebIds, $ksi_mezgeb_brki->ksi_mezgeb->id);

      }
      return ftabher_mezgeb::whereIn('id', $ksi_mezgebIds)->orderBy('id', 'desc')->get();
    }
    
    public function ftabher_mezgeb_brkitat(){
      $currentUser=\Auth::guard('web')->user();
      $ksi_mezgebIds=[];
$ksi_mezgeb_brkitat_Array=array();
      $ksi_mezgeb_brkitat=$currentUser->ftabher_mezgeb_brkitat();//\App\ksi_mezgeb_brki::where('isCompleted', '=', 'true')->get();
      foreach ($ksi_mezgeb_brkitat as $ksi_mezgeb_brki) {
        $ksi_mezgeb=$ksi_mezgeb_brki->ksi_mezgeb;
        if($ksi_mezgeb==null)
          continue;
        if(!$ksi_mezgeb_brki->isDirect() && $ksi_mezgeb->getLastBrki!=null && ($ksi_mezgeb->getLastBrki->keyWord=="Wereda" || $ksi_mezgeb->getLastBrki->keyWord=="Zone"))
            continue;

        if($currentUser->isAdmin() && $ksi_mezgeb_brki->isDirect() && ($ksi_mezgeb->created_a_brki=="Wereda" || $ksi_mezgeb->created_a_brki=="Zone"))
            continue;

          if($ksi_mezgeb==null || $ksi_mezgeb->regionId!=$this->id || (!$currentUser->isAdmin() && $ksi_mezgeb_brki->isDirect() && $ksi_mezgeb->created_a_brki!="Region" && $ksi_mezgeb->created_a_brki!='Breaking_Region' && $ksi_mezgeb->created_a_brki!='Federal' && $ksi_mezgeb->created_a_brki!='Breaking_Federal' && $ksi_mezgeb->created_a_brki!='HF_Region' && $ksi_mezgeb->created_a_brki!='HF_Federal'))
            continue;
      /*$dateDiff=Date_class::getDateDiffernece($ksi_mezgeb_brki->entryDate, (new Date_class)->getCurrentDate());
      if($dateDiff->m>Global_var::$reportIntervalInMonths)//if greater than 6 months
        continue;*/
if(Session::get('Rounded')!='true'){
  if(!\App\Global_var::isWithIn_DateInterval($ksi_mezgeb_brki))
  continue;
}

Session::put('Rounded', 'false');
if(!$ksi_mezgeb_brki->isNewDocument() && !$ksi_mezgeb_brki->isRoundedDocument())
  continue;
   
      /*if(!Global_var::existsInArray($ksi_mezgebIds, $ksi_mezgeb_brki->ksi_mezgebId))
        array_push($ksi_mezgebIds, $ksi_mezgeb_brki->ksi_mezgebId);
      else if(!$ksi_mezgeb_brki->isDirect() && $ksi_mezgeb_brki->isAppealedToNextBrki())
        continue;*/
      
      array_push($ksi_mezgeb_brkitat_Array, $ksi_mezgeb_brki);
      }

      return $ksi_mezgeb_brkitat_Array;
    }
   


   /*---------SERVICES---------*/
    public function glgalot_ntsadgaf_hgi(){
      $currentUser=\Auth::guard('web')->user();
      $entities=[];
      if(!$currentUser->isRegion() && !$currentUser->isAdmin())
        return $entities;

      $glgalot_ntsadgaf_hgi=$currentUser->glgalot_ntsadgaf_hgi();
      foreach ($glgalot_ntsadgaf_hgi as $entity) {
        
        if($currentUser->isAdmin() && ($entity->created_a_brki=="Wereda" || $entity->created_a_brki=="Zone"))
            continue;

          if($entity->regionId!=$this->id || (!$currentUser->isAdmin() && $entity->created_a_brki!="Region" && $entity->created_a_brki!='Breaking_Region' && $entity->created_a_brki!='Federal' && $entity->created_a_brki!='Breaking_Federal' && $entity->created_a_brki!='HF_Region' && $entity->created_a_brki!='HF_Federal'))
            continue;
     /* $dateDiff=Date_class::getDateDiffernece($entity->entryDate, (new Date_class)->getCurrentDate());
      if($dateDiff->m>Global_var::$reportIntervalInMonths)//if greater than 6 months
        continue;*/
if(!\App\Global_var::isWithIn_DateInterval($entity))
  continue;

      /*if(Global_var::existsInArray($entities, $entity))
        continue;*/

      array_push($entities, $entity);
      }

      return $entities;
    }
  
    public function human_right(){
      $currentUser=\Auth::guard('web')->user();
      $entities=[];
      if(!$currentUser->isRegion() && !$currentUser->isAdmin())
        return $entities;

      $human_right=$currentUser->human_right();
      foreach ($human_right as $entity) {
        
        if($currentUser->isAdmin() && ($entity->created_a_brki=="Wereda" || $entity->created_a_brki=="Zone"))
            continue;

          if($entity->regionId!=$this->id || (!$currentUser->isAdmin() && $entity->created_a_brki!="Region" && $entity->created_a_brki!='Breaking_Region' && $entity->created_a_brki!='Federal' && $entity->created_a_brki!='Breaking_Federal' && $entity->created_a_brki!='HF_Region' && $entity->created_a_brki!='HF_Federal'))
            continue;
      /*$dateDiff=Date_class::getDateDiffernece($entity->entryDate, (new Date_class)->getCurrentDate());
      if($dateDiff->m>Global_var::$reportIntervalInMonths)//if greater than 6 months
        continue;*/
if(!\App\Global_var::isWithIn_DateInterval($entity))
  continue;
      
      /*if(Global_var::existsInArray($entities, $entity))
        continue;*/

      array_push($entities, $entity);
      }

      return $entities;
    }
  
    public function human_right_prison(){
      $currentUser=\Auth::guard('web')->user();
      $entities=[];
      if(!$currentUser->isRegion() && !$currentUser->isAdmin())
        return $entities;

      $human_right_prison=$currentUser->human_right_prison();
      foreach ($human_right_prison as $entity) {
        
        if($currentUser->isAdmin() && ($entity->created_a_brki=="Wereda" || $entity->created_a_brki=="Zone"))
            continue;

          if($entity->regionId!=$this->id || (!$currentUser->isAdmin() && $entity->created_a_brki!="Region" && $entity->created_a_brki!='Breaking_Region' && $entity->created_a_brki!='Federal' && $entity->created_a_brki!='Breaking_Federal' && $entity->created_a_brki!='HF_Region' && $entity->created_a_brki!='HF_Federal'))
            continue;
      /*$dateDiff=Date_class::getDateDiffernece($entity->entryDate, (new Date_class)->getCurrentDate());
      if($dateDiff->m>Global_var::$reportIntervalInMonths)//if greater than 6 months
        continue;*/
if(!\App\Global_var::isWithIn_DateInterval($entity))
  continue;
      
      /*if(Global_var::existsInArray($entities, $entity))
        continue;*/

      array_push($entities, $entity);
      }

      return $entities;
    }
  
    public function kttln_dgafn_abyate_eyo(){
      $currentUser=\Auth::guard('web')->user();
      $entities=[];
      if(!$currentUser->isRegion() && !$currentUser->isAdmin())
        return $entities;

      $kttln_dgafn_abyate_eyo=$currentUser->kttln_dgafn_abyate_eyo();
      foreach ($kttln_dgafn_abyate_eyo as $entity) {
        
        if($currentUser->isAdmin() && ($entity->created_a_brki=="Wereda" || $entity->created_a_brki=="Zone"))
            continue;

          if($entity->regionId!=$this->id || (!$currentUser->isAdmin() && $entity->created_a_brki!="Region" && $entity->created_a_brki!='Breaking_Region' && $entity->created_a_brki!='Federal' && $entity->created_a_brki!='Breaking_Federal' && $entity->created_a_brki!='HF_Region' && $entity->created_a_brki!='HF_Federal'))
            continue;
      /*$dateDiff=Date_class::getDateDiffernece($entity->entryDate, (new Date_class)->getCurrentDate());
      if($dateDiff->m>Global_var::$reportIntervalInMonths)//if greater than 6 months
        continue;*/
if(!\App\Global_var::isWithIn_DateInterval($entity))
  continue;
      // dd(\App\Global_var::getReport_DateInterval()[0]." ".$entity->entryDate." ".\App\Global_var::getReport_DateInterval()[1]);
      /*if(Global_var::existsInArray($entities, $entity))
        continue;*/

      array_push($entities, $entity);
      }

      return $entities;
    }
  
    public function leading_investigation_of_heavy_crime(){
      $currentUser=\Auth::guard('web')->user();
      $entities=[];
      if(!$currentUser->isRegion() && !$currentUser->isAdmin())
        return $entities;

      $leading_investigation_of_heavy_crime=$currentUser->leading_investigation_of_heavy_crime();
      foreach ($leading_investigation_of_heavy_crime as $entity) {
        
        if($currentUser->isAdmin() && ($entity->created_a_brki=="Wereda" || $entity->created_a_brki=="Zone"))
            continue;

          if($entity->regionId!=$this->id || (!$currentUser->isAdmin() && $entity->created_a_brki!="Region" && $entity->created_a_brki!='Breaking_Region' && $entity->created_a_brki!='Federal' && $entity->created_a_brki!='Breaking_Federal' && $entity->created_a_brki!='HF_Region' && $entity->created_a_brki!='HF_Federal'))
            continue;
      /*$dateDiff=Date_class::getDateDiffernece($entity->entryDate, (new Date_class)->getCurrentDate());
      if($dateDiff->m>Global_var::$reportIntervalInMonths)//if greater than 6 months
        continue;*/
if(!\App\Global_var::isWithIn_DateInterval($entity))
  continue;
      
      /*if(Global_var::existsInArray($entities, $entity))
        continue;*/

      array_push($entities, $entity);
      }

      return $entities;
    }
  
    public function witness_follow_up(){
      $currentUser=\Auth::guard('web')->user();
      $entities=[];
      if(!$currentUser->isRegion() && !$currentUser->isAdmin())
        return $entities;

      $witness_follow_up=$currentUser->witness_follow_up();
      foreach ($witness_follow_up as $entity) {
        
        if($currentUser->isAdmin() && ($entity->created_a_brki=="Wereda" || $entity->created_a_brki=="Zone"))
            continue;

          if($entity->regionId!=$this->id || (!$currentUser->isAdmin() && $entity->created_a_brki!="Region" && $entity->created_a_brki!='Breaking_Region' && $entity->created_a_brki!='Federal' && $entity->created_a_brki!='Breaking_Federal' && $entity->created_a_brki!='HF_Region' && $entity->created_a_brki!='HF_Federal'))
            continue;
      /*$dateDiff=Date_class::getDateDiffernece($entity->entryDate, (new Date_class)->getCurrentDate());
      if($dateDiff->m>Global_var::$reportIntervalInMonths)//if greater than 6 months
        continue;*/
if(!\App\Global_var::isWithIn_DateInterval($entity))
  continue;
      
      /*if(Global_var::existsInArray($entities, $entity))
        continue;*/

      array_push($entities, $entity);
      }

      return $entities;
    }
    public function complains_by_customer(){
      $currentUser=\Auth::guard('web')->user();
      $entities=[];
      if(!$currentUser->isRegion() && !$currentUser->isAdmin())
        return $entities;

      $complains_by_customer=$currentUser->complains_by_customer();
      foreach ($complains_by_customer as $entity) {
        
        if($currentUser->isAdmin() && ($entity->created_a_brki=="Wereda" || $entity->created_a_brki=="Zone"))
            continue;

          if($entity->regionId!=$this->id || (!$currentUser->isAdmin() && $entity->created_a_brki!="Region" && $entity->created_a_brki!='Breaking_Region' && $entity->created_a_brki!='Federal' && $entity->created_a_brki!='Breaking_Federal' && $entity->created_a_brki!='HF_Region' && $entity->created_a_brki!='HF_Federal'))
            continue;
      /*$dateDiff=Date_class::getDateDiffernece($entity->entryDate, (new Date_class)->getCurrentDate());
      if($dateDiff->m>Global_var::$reportIntervalInMonths)//if greater than 6 months
        continue;*/
if(!\App\Global_var::isWithIn_DateInterval($entity))
  continue;
      
      /*if(Global_var::existsInArray($entities, $entity))
        continue;*/

      array_push($entities, $entity);
      }

      return $entities;
    }
  
    
}
