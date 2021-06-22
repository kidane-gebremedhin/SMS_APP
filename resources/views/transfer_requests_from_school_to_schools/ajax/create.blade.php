<div class="col-md-12">
  <div class="col-md-12">
    {!! Form::open(array("route"=>"transfer_requests_from_school_to_schools.store", "method"=>"POST", "files"=>"true", "class"=>"post")) !!}
    <label class="nextUrl" nextUrl="{!! route('transfer_requests_from_school_to_schools.index') !!}"></label>
    <div class="panel panel-success">
      <div class="panel-heading">
        <span style="font-size: 25px; color: orange">{!! App\Global_var::getLangString('Create_new_transfer_requests_from_school_to_school', $language_strings) !!}</span>
        @if($currentUser->isGranted('transfer_requests_from_school_to_schools.index'))
        <a href="{!! route('transfer_requests_from_school_to_schools.index') !!}" class="get btn btn-success btn-sm pull-right" nextUrl="{!! route('transfer_requests_from_school_to_schools.index') !!}"><i class="fa fa-eye"></i>  
          {!! App\Global_var::getLangString('List', $language_strings) !!}
        </a> 
      @endif
      </div>
      <div class="panel-body">

<div class="col-md-12">
  <ul class="nav nav-tabs st-nav-tabs">
    <li><a class="tap_element" href="#first_tab" data-toggle="tab">{{App\Global_var::getLangString('Basic_Info', $language_strings)}} </a></li>
    <li><a class="tap_element" href="#Transfer_Request_Info" data-toggle="tab">{{App\Global_var::getLangString('Transfer_Request_Info', $language_strings)}}</a></li>
    <li><a class="tap_element" href="#Special_Considerations" data-toggle="tab">{{App\Global_var::getLangString('Special_Considerations', $language_strings)}}</a></li>
  </ul>
</div>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade in" id="first_tab">
  <div class="col-md-12" style="padding-top:30px;">
    
          <div class="col-md-6">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Request_Type', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('requestTypeId', [null=>'-- --']+$request_types,null, array('class'=>'select2 form-control requestTypeId', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('First_Name', $language_strings) !!}
            </label>
            <div class="col-md-12">
              {!!  Form::text('firstName', null, array('class'=>'form-control firstName', 'required'=>'true', 'placeholder'=>App\Global_var::getLangString('First_Name', $language_strings))) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Last_Name', $language_strings) !!}
            </label>
            <div class="col-md-12">
              {!!  Form::text('lastName', null, array('class'=>'form-control lastName', 'required'=>'true', 'placeholder'=>App\Global_var::getLangString('Last_Name', $language_strings))) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Middle_Name', $language_strings) !!}
            </label>
            <div class="col-md-12">
              {!!  Form::text('middleName', null, array('class'=>'form-control middleName', 'required'=>'true', 'placeholder'=>App\Global_var::getLangString('Middle_Name', $language_strings))) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Gender', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('gender', [null=>'-- --']+$genders,null, array('class'=>'select2 form-control gender', 'required'=>'true'));!!}
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Year_of_recruitment', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('recruitmentYear', [null=>'-- --']+$years,null, array('class'=>'select2 form-control recruitmentYear', 'required'=>'true'));!!}
            </div>
          </div>

          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Educational_Level', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('educationalLevelId', [null=>'-- --']+$educational_levels,null, array('class'=>'select2 form-control educationalLevelId', 'required'=>'true'));!!}
            </div>
          </div>

          <div class="regularJobIdDiv col-md-12 form-group" style="display: none;">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Regular_Job', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('regularJobId', [null=>'-- --']+$jobs,null, array('class'=>'select2 form-control regularJobId'));!!}
            </div>
          </div>

          <div class="graduatedSubjectIdDiv col-md-12 form-group" style="display: none;">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Graduated_Subject', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('graduatedSubjectId', [null=>'-- --']+$subjects,null, array('class'=>'select2 form-control graduatedSubjectId'));!!}
            </div>
          </div>

          <div class="teachingSubjectIdDiv col-md-12 form-group" style="display: none;">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Teaching_Subject', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('teachingSubjectId', [null=>'-- --']+$subjects,null, array('class'=>'select2 form-control teachingSubjectId'));!!}
            </div>
          </div>
          </div>
  </div>    
  </div>

  <div class="tab-pane fade in" id="Transfer_Request_Info">
    <div class="col-md-12" style="padding-top:30px;">
        <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Round', $language_strings) !!}
            </label>
            <div class="col-md-6">
            {!! Form::select('roundId', [null=>'-- --']+$rounds,null, array('class'=>'select2 form-control roundId', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="">
          <div class="col-md-6">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Actual_Service_Years', $language_strings) !!}
            </label>
            <div class="col-md-12">
              {!!  Form::number('actualServiceYears', null, array('class'=>'form-control actualServiceYears', 'min'=>'0', 'max'=>99, 'required'=>'true')) !!}
            </div>
            </div>
          <div class="col-md-6">
            <label class="label-control col-md-12">
              <span class="pull-left">{!! App\Global_var::getLangString('Bonus_Service_Years', $language_strings) !!}</span>
            </label>
            <div class="col-md-12">
              {!!  Form::number('bonusServiceYears', null, array('class'=>'form-control bonusServiceYears', 'min'=>'0', 'max'=>99)) !!}
            </div>
          </div>
          </div>
          <div class="">
          <div class="col-md-6 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('From_School', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('fromSchoolId', [null=>'-- --']+$schools,null, array('class'=>'select2 form-control fromSchoolId', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="col-md-6 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('To_School', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('toSchoolId', [null=>'-- --']+$schools,null, array('class'=>'select2 form-control toSchoolId', 'required'=>'true'));!!}
            </div>
          </div>
          </div>

          <div class="col-md-12 form-group">
            <hr>
            <label class="col-md-12 control-label"> 
              {!! App\Global_var::getLangString('Transfer_Reason', $language_strings) !!}
            </label>
            <div class="form-group col-md-12">
              {!! Form::textarea('transferReason', null, array('class'=>' form-control transferReason', 'rows'=>'3'));!!}
            </div>
          </div>

    </div>
  </div>
  <div class="tab-pane fade in" id="Special_Considerations">
    <div class="col-md-12" style="padding-top:30px;">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
            </label>
            <div class="col-md-2">
            <input name="maritalStatus" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="maritalStatus checkbox" type="checkbox"> <label>{{App\Global_var::getLangString('Merried', $language_strings)}}</label>
            </div>
            <div class="col-md-10">
            <div class="maritalStatusDiv col-md-12 form-group" style="display: none;">
          <div class="col-md-4 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Merriage_Partner', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('merriagePartnerId', [null=>'-- --']+$teachers,null, array('class'=>'select2 form-control merriagePartnerId'));!!}
            </div>
            <div class="col-md-12 form-group">
            <br>
            <input name="isWillingToTransferAlone" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox" type="checkbox"> <label>{{App\Global_var::getLangString('Willing_to_transfer_alone', $language_strings)}}</label>
          </div>
          </div>

          <div class="col-md-4 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Partner_School', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('merriagePartnerSchoolId', [null=>'-- --']+$schools,null, array('class'=>'select2 form-control merriagePartnerSchoolId'));!!}
            </div>
          </div>

          <div class="col-md-4 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Attachement', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::file('marriageInfoAttachement', null, array('class'=>'form-control marriageInfoAttachement'));!!}
            </div>
          </div>
          </div> 
          
            </div>
          </div>
         
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
            </label>
            <div class="col-md-4">
            <input name="hasHealthIssue" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="hasHealthIssue checkbox" type="checkbox"> <label>{{App\Global_var::getLangString('Health_Issue', $language_strings)}}</label>
            </div>
            <div class="col-md-8">
              <div class="hasHealthIssueDiv col-md-12 form-group" style="display: none;">
                <label class="label-control col-md-6">
                  {!! App\Global_var::getLangString('Health_Issue_Attachement', $language_strings) !!}
                </label>
                <div class="col-md-6">
                {!! Form::file('healthIssueInfoAttachement', null, array('class'=>'form-control healthIssueInfoAttachement'));!!}
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
            </label>
            <div class="col-md-4">
            <input name="isDisabled" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="isDisabled checkbox" type="checkbox"> <label>{{App\Global_var::getLangString('Physical_Disablity', $language_strings)}}</label>
            </div>
            <div class="col-md-8">
              <div class="isDisabledDiv col-md-12 form-group" style="display: none;">
                <label class="label-control col-md-6">
                  {!! App\Global_var::getLangString('Disablity_Attachement', $language_strings) !!}
                </label>
                <div class="col-md-6">
                {!! Form::file('isDisabledAttachement', null, array('class'=>'form-control isDisabledAttachement'));!!}
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
            </label>
            <div class="col-md-4">
            <input name="isAppointed" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="isAppointed checkbox" type="checkbox"> <label>{{App\Global_var::getLangString('Is_Appointed', $language_strings)}}</label>
            </div>
            <div class="col-md-8">
              <div class="isAppointedDiv col-md-12 form-group" style="display: none;">
                <label class="label-control col-md-6">
                  {!! App\Global_var::getLangString('Appointment_Attachement', $language_strings) !!}
                </label>
                <div class="col-md-6">
                {!! Form::file('appointmentInfoAttachement', null, array('class'=>'form-control appointmentInfoAttachement'));!!}
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
            </label>
            <div class="col-md-12">
            <input name="isEthinic" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox" type="checkbox"> <label>{{App\Global_var::getLangString('Ethinic', $language_strings)}}</label>
            </div>
          </div>
          
    </div>
  </div>

</div>
      
      <div class="col-md-12 form-group text-center">
        <div class="col-md-6 col-md-offset-4">
          <button type="submit" class="tappedFormSubmitBtn btn btn-success btn-block">
          <i class="fa fa-save"></i> 
          {!! App\Global_var::getLangString('Save', $language_strings) !!}
        </button>
        </div>
      </div>


      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>


