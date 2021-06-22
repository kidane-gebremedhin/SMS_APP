<div class="col-md-12">
  <div class="col-md-12">
    {{Form::model($transfer_requests_from_school_to_school, array("route"=>["transfer_requests_from_school_to_schools.update", $transfer_requests_from_school_to_school->id], "method"=>"POST", "class"=>"post"))}}
    <label class="nextUrl" nextUrl="{{route('transfer_requests_from_school_to_schools.index')}}" />
    <?php $teacher=$transfer_requests_from_school_to_school->teacher; ?>
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
              {!!  Form::text('firstName', $teacher!=null? $teacher->firstName: '', array('class'=>'form-control firstName', 'required'=>'true', 'placeholder'=>App\Global_var::getLangString('First_Name', $language_strings))) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Last_Name', $language_strings) !!}
            </label>
            <div class="col-md-12">
              {!!  Form::text('lastName', $teacher!=null? $teacher->lastName: '', array('class'=>'form-control lastName', 'required'=>'true', 'placeholder'=>App\Global_var::getLangString('Last_Name', $language_strings))) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Middle_Name', $language_strings) !!}
            </label>
            <div class="col-md-12">
              {!!  Form::text('middleName', $teacher!=null? $teacher->middleName: '', array('class'=>'form-control middleName', 'required'=>'true', 'placeholder'=>App\Global_var::getLangString('Middle_Name', $language_strings))) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Gender', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('gender', [null=>'-- --']+$genders,$teacher!=null? $teacher->gender: '', array('class'=>'select2 form-control gender', 'required'=>'true'));!!}
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Year_of_recruitment', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('recruitmentYear', [null=>'-- --']+$years,$teacher!=null? $teacher->recruitmentYear: '', array('class'=>'select2 form-control recruitmentYear', 'required'=>'true'));!!}
            </div>
          </div>

          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Educational_Level', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('educationalLevelId', [null=>'-- --']+$educational_levels,$teacher!=null? $teacher->educationalLevelId: '', array('class'=>'select2 form-control educationalLevelId', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="regularJobIdDiv col-md-12 form-group" style="display: {{$transfer_requests_from_school_to_school->requestType!=null && $transfer_requests_from_school_to_school->requestType->name=='Educational Leadership'? 'block':'none'}}">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Regular_Job', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('regularJobId', [null=>'-- --']+$jobs,$teacher!=null? $teacher->regularJobId: '', array('class'=>'select2 form-control regularJobId'));!!}
            </div>
          </div>

          <div class="graduatedSubjectIdDiv col-md-12 form-group" style="display: {{$transfer_requests_from_school_to_school->requestType!=null && $transfer_requests_from_school_to_school->requestType->name=='Teacher'? 'block':'none'}}">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Graduated_Subject', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('graduatedSubjectId', [null=>'-- --']+$subjects,$teacher!=null? $teacher->graduatedSubjectId: '', array('class'=>'select2 form-control graduatedSubjectId'));!!}
            </div>
          </div>

          <div class="teachingSubjectIdDiv col-md-12 form-group" style="display: {{$transfer_requests_from_school_to_school->requestType!=null && $transfer_requests_from_school_to_school->requestType->name=='Teacher'? 'block':'none'}}">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Teaching_Subject', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('teachingSubjectId', [null=>'-- --']+$subjects,$teacher!=null? $teacher->teachingSubjectId: '', array('class'=>'select2 form-control teachingSubjectId'));!!}
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
              {!!  Form::number('bonusServiceYears', ($transfer_requests_from_school_to_school->calculatedServiceYears - $transfer_requests_from_school_to_school->actualServiceYears), array('class'=>'form-control bonusServiceYears', 'min'=>'0', 'max'=>99)) !!}
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
            <input name="maritalStatus" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="maritalStatus checkbox" type="checkbox" {{$teacher!=null && $teacher->maritalStatus=='true'? 'checked':''}}> <label>{{App\Global_var::getLangString('Merried', $language_strings)}}</label>
            </div>
            <div class="col-md-10">
              <div class="maritalStatusDiv col-md-12 form-group" style="display: {{$teacher!=null && $teacher->maritalStatus=='true'? 'block':'none'}}">
          <div class="col-md-4 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Merriage_Partner', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('merriagePartnerId', [null=>'-- --']+$teachers,$teacher!=null? $teacher->merriagePartnerId: null, array('class'=>'select2 form-control merriagePartnerId'));!!}
            </div>
            <div class="col-md-12 form-group">
            <br>
            <input name="isWillingToTransferAlone" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox" type="checkbox" {{$transfer_requests_from_school_to_school->isWillingToTransferAlone=='true'? 'checked':''}}> <label>{{App\Global_var::getLangString('Willing_to_transfer_alone', $language_strings)}}</label>
          </div>
          </div>

          <div class="col-md-4 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Partner_School', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::select('merriagePartnerSchoolId', [null=>'-- --']+$schools,$teacher!=null? $teacher->merriagePartnerSchoolId: null, array('class'=>'select2 form-control merriagePartnerSchoolId'));!!}
            </div>
          </div>

          <div class="col-md-4 form-group">
            <label class="label-control col-md-12">
              {!! App\Global_var::getLangString('Attachement', $language_strings) !!}
            </label>
            <div class="col-md-12">
            {!! Form::file('marriageInfoAttachement', null, array('class'=>'form-control marriageInfoAttachement'));!!}
             <br> 
            <span><a href="{{ asset($transfer_requests_from_school_to_school->teacher->marriageInfoAttachement)}}" target="_blank">{{ count($arr=explode('/', $transfer_requests_from_school_to_school->teacher->marriageInfoAttachement))==3? $arr[2]: ''}}</a></span>
            </div>
          </div>
          
          </div>
            </div>
          </div>
          
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
            </label>
            <div class="col-md-4">
            <input name="hasHealthIssue" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="hasHealthIssue checkbox" type="checkbox" {{$teacher!=null && $teacher->hasHealthIssue=='true'? 'checked':''}}> <label>{{App\Global_var::getLangString('Health_Issue', $language_strings)}}</label>
            </div>
            <div class="col-md-8">
              <div class="hasHealthIssueDiv col-md-12 form-group" style="display: {{$teacher!=null && $teacher->hasHealthIssue=='true'? 'block':'none'}}">
                <label class="label-control col-md-6">
                  {!! App\Global_var::getLangString('Health_Issue_Attachement', $language_strings) !!}
                </label>
                <div class="col-md-6">
                {!! Form::file('healthIssueInfoAttachement', null, array('class'=>'form-control healthIssueInfoAttachement'));!!}
                 <br> 
                <span><a href="{{ asset($transfer_requests_from_school_to_school->teacher->healthIssueInfoAttachement)}}" target="_blank">{{ count($arr=explode('/', $transfer_requests_from_school_to_school->teacher->healthIssueInfoAttachement))==3? $arr[2]: ''}}</a></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
            </label>
            <div class="col-md-4">
            <input name="isDisabled" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="isDisabled checkbox" type="checkbox" {{$teacher!=null && $teacher->isDisabled=='true'? 'checked':''}}> <label>{{App\Global_var::getLangString('Physical_Disablity', $language_strings)}}</label>
            </div>
            <div class="col-md-8">
              <div class="isDisabledDiv col-md-12 form-group" style="display: {{$teacher!=null && $teacher->isDisabled=='true'? 'block':'none'}}">
                <label class="label-control col-md-6">
                  {!! App\Global_var::getLangString('Disablity_Attachement', $language_strings) !!}
                </label>
                <div class="col-md-6">
                {!! Form::file('isDisabledAttachement', null, array('class'=>'form-control isDisabledAttachement'));!!}
                 <br> 
                <span><a href="{{ asset($transfer_requests_from_school_to_school->teacher->isDisabledAttachement)}}" target="_blank">{{ count($arr=explode('/', $transfer_requests_from_school_to_school->teacher->isDisabledAttachement))==3? $arr[2]: ''}}</a></span>
                </div>
              </div>
            </div>
          </div>          
          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
            </label>
            <div class="col-md-4">
            <input name="isAppointed" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="isAppointed checkbox" type="checkbox" {{$teacher!=null && $teacher->isAppointed=='true'? 'checked':''}}> <label>{{App\Global_var::getLangString('Is_Appointed', $language_strings)}}</label>
            </div>
            <div class="col-md-8">
              <div class="isAppointedDiv col-md-12 form-group" style="display: {{$teacher!=null && $teacher->isAppointed=='true'? 'block':'none'}}">
                <label class="label-control col-md-6">
                  {!! App\Global_var::getLangString('Appointment_Attachement', $language_strings) !!}
                </label>
                <div class="col-md-6">
                {!! Form::file('appointmentInfoAttachement', null, array('class'=>'form-control appointmentInfoAttachement'));!!}
                 <br> 
            <span><a href="{{ asset($transfer_requests_from_school_to_school->teacher->appointmentInfoAttachement)}}" target="_blank">{{ count($arr=explode('/', $transfer_requests_from_school_to_school->teacher->appointmentInfoAttachement))==3? $arr[2]: ''}}</a></span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 form-group">
            <label class="label-control col-md-12">
            </label>
            <div class="col-md-12">
            <input name="isEthinic" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox" type="checkbox" {{$transfer_requests_from_school_to_school->isEthinic=='true'? 'checked':''}}> <label>{{App\Global_var::getLangString('Ethinic', $language_strings)}}</label>
            </div>
          </div>
          
    </div>
  </div>

</div>


          <div class="col-md-12 form-group text-center">
            <div class="col-md-8 col-md-offset-2">
              <button type="submit" class="tappedFormSubmitBtn btn btn-success btn-block">
              <i class="fa fa-save"></i> 
              {!! App\Global_var::getLangString('Update', $language_strings) !!}
            </button>
            </div>
          </div>
        </div>
    </div>
    {{Form::close()}}
  </div>
</div>


