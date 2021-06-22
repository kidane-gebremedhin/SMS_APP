<div class="col-md-12">
	<div class="col-md-12">
		<h4 class="text-danger">
			{{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}
			@if($currentUser->isGranted('transfer_requests_from_school_to_schools.index'))
			<a href="{{route('transfer_requests_from_school_to_schools.index')}}" class="get btn btn-default btn-sm" nextUrl="{{route('transfer_requests_from_school_to_schools.destroy', $transfer_requests_from_school_to_school->id)}}"> 
				{{App\Global_var::getLangString('No', $language_strings)}}
			</a>
			@endif
			@if($currentUser->isGranted('transfer_requests_from_school_to_schools.delete'))
			<a href="{{route('transfer_requests_from_school_to_schools.destroy', $transfer_requests_from_school_to_school->id)}}" value="{{$transfer_requests_from_school_to_school->id}}" class="get btn btn-danger btn-sm" nextUrl="{{route('transfer_requests_from_school_to_schools.index')}}"><i class="fa fa-trash"></i> 
				{{App\Global_var::getLangString('Yes', $language_strings)}}
			</a>
		@endif
		</h4>	
	</div>
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					{{App\Global_var::getLangString('Detail', $language_strings)}}
					<a href="{{route('transfer_requests_from_school_to_schools.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('transfer_requests_from_school_to_schools.index')}}"><i class="fa fa-eye"></i> 
						{{App\Global_var::getLangString('List', $language_strings)}}
					</a> 	
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
    @if($transfer_requests_from_school_to_school->teacher!=null)
		<div class="col-md-12">
			<table class="table">
			<thead>
				<th class="col-md-2"></th>
				<th class="col-md-8"></th>
			</thead>
				<tbody>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Full_Name', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->teacher!=null? $transfer_requests_from_school_to_school->teacher->firstName.' '.$transfer_requests_from_school_to_school->teacher->lastName.' '.$transfer_requests_from_school_to_school->teacher->middleName: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Gender', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->teacher->gender}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Request_Date', $language_strings)}}</strong></td><td><h4>{!! $transfer_requests_from_school_to_school->date !!}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Educational_Level', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->teacher->educationalLevel!=null? $transfer_requests_from_school_to_school->teacher->educationalLevel->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Year_of_recruitment', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->teacher->recruitmentYear}}</h4></td>
					</tr>
					
					@if($transfer_requests_from_school_to_school->requestType=='Teacher')
					<tr>
						<td><strong>{{App\Global_var::getLangString('Graduated_Subject', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->teacher->graduatedSubject!=null? $transfer_requests_from_school_to_school->teacher->graduatedSubject->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Teaching_Subject', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->teacher->teachingSubject!=null? $transfer_requests_from_school_to_school->teacher->teachingSubject->name: ''}}</h4></td>
					</tr>
					@else
					<tr>
						<td><strong>{{App\Global_var::getLangString('Regular_Job', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->teacher->regularJob!=null? $transfer_requests_from_school_to_school->teacher->regularJob->name: ''}}</h4></td>
					</tr>
					@endif

			</tbody>
		</table>
		</div>
	@endif

  </div>    
  </div>

  <div class="tab-pane fade in" id="Transfer_Request_Info">
    <div class="col-md-12" style="padding-top:30px;">
    						
			<table class="table">
			<thead>
				<th class="col-md-2"></th>
				<th class="col-md-8"></th>
			</thead>
				<tbody>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Round', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->round!=null? $transfer_requests_from_school_to_school->round->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Actual_Service_Years', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->actualServiceYears}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Bonus_Service_Years', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->calculatedServiceYears - $transfer_requests_from_school_to_school->actualServiceYears}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Transfer_Reason', $language_strings)}}</strong></td><td><h4>{!! $transfer_requests_from_school_to_school->transferReason !!}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Willing_to_transfer_alone', $language_strings)}}</strong></td><td><h4 class="fa {{$transfer_requests_from_school_to_school->isWillingToTransferAlone=='true'? 'fa-check':'fa-close'}}"></h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('From_School', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->fromSchool!=null? $transfer_requests_from_school_to_school->fromSchool->name:''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('To_School', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->toSchool!=null? $transfer_requests_from_school_to_school->toSchool->name:''}}</h4></td>
					</tr>

				</tbody>
			</table>

    </div>
  </div>
  <div class="tab-pane fade in" id="Special_Considerations">
    <div class="col-md-12" style="padding-top:30px;">
			<table class="table">
			<thead>
				<th class="col-md-2"></th>
				<th class="col-md-8"></th>
			</thead>
				<tbody>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Merried', $language_strings)}}</strong></td><td><h4 class="fa {{$transfer_requests_from_school_to_school->teacher->maritalStatus=='true'? 'fa-check':'fa-close'}}"></h4><strong style="margin-left: 20px">{{App\Global_var::getLangString('Marriage_info_attachement', $language_strings)}}</strong> &nbsp; &nbsp; 
						<span><a href="{{ asset($transfer_requests_from_school_to_school->teacher->marriageInfoAttachement)}}" target="_blank">{{ count($arr=explode('/', $transfer_requests_from_school_to_school->teacher->marriageInfoAttachement))==3? $arr[2]: ''}}</a></span></td>
					</tr>
					@if($transfer_requests_from_school_to_school->teacher->maritalStatus=='true')
					<tr>
						<td><strong>{{App\Global_var::getLangString('Merriage_Partner', $language_strings)}}</strong></td><td><h4>
						{{$transfer_requests_from_school_to_school->teacher->merriagePartner!=null? $transfer_requests_from_school_to_school->teacher->merriagePartner->firstName.' '.$transfer_requests_from_school_to_school->teacher->merriagePartner->lastName.' '.$transfer_requests_from_school_to_school->teacher->merriagePartner->middleName: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Merriage_Partner_School', $language_strings)}}</strong></td><td><h4>{{$transfer_requests_from_school_to_school->teacher->merriagePartnerSchool!=null? $transfer_requests_from_school_to_school->teacher->merriagePartnerSchool->name: ''}}</h4></td>
					</tr>
					@endif
					<tr>
						<td><strong>{{App\Global_var::getLangString('Health_Issue', $language_strings)}}</strong></td><td><h4 class="fa {{$transfer_requests_from_school_to_school->teacher->hasHealthIssue=='true'? 'fa-check':'fa-close'}}"></h4>
						@if($transfer_requests_from_school_to_school->teacher->hasHealthIssue=='true')
						<strong style="margin-left: 20px">{{App\Global_var::getLangString('Health_Issue_Attachement', $language_strings)}}</strong>
						 &nbsp; &nbsp; 
						<span><a href="{{ asset($transfer_requests_from_school_to_school->teacher->healthIssueInfoAttachement)}}" target="_blank">{{ count($arr=explode('/', $transfer_requests_from_school_to_school->teacher->healthIssueInfoAttachement))==3? $arr[2]: ''}}</a></span>
						@endif
						</td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Disabled', $language_strings)}}</strong></td><td><h4 class="fa {{$transfer_requests_from_school_to_school->teacher->isDisabled=='true'? 'fa-check':'fa-close'}}"></h4>
						@if($transfer_requests_from_school_to_school->teacher->isDisabled=='true')
						<strong style="margin-left: 20px">{{App\Global_var::getLangString('Disability_info_attachement', $language_strings)}}</strong> &nbsp; &nbsp; 
						<span><a href="{{ asset($transfer_requests_from_school_to_school->teacher->isDisabledAttachement)}}" target="_blank">{{ count($arr=explode('/', $transfer_requests_from_school_to_school->teacher->isDisabledAttachement))==3? $arr[2]: ''}}</a></span>
						@endif
						</td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Is_Appointed', $language_strings)}}</strong></td><td><h4 class="fa {{$transfer_requests_from_school_to_school->teacher->isAppointed=='true'? 'fa-check':'fa-close'}}"></h4>
						@if($transfer_requests_from_school_to_school->teacher->isAppointed=='true')
						<strong style="margin-left: 20px">{{App\Global_var::getLangString('Appointment_Attachement', $language_strings)}}</strong> &nbsp; &nbsp; 
						<span><a href="{{ asset($transfer_requests_from_school_to_school->teacher->appointmentInfoAttachement)}}" target="_blank">{{ count($arr=explode('/', $transfer_requests_from_school_to_school->teacher->appointmentInfoAttachement))==3? $arr[2]: ''}}</a></span>
						@endif
						</td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Ethinic', $language_strings)}}</strong></td><td><h4 class="fa {{$transfer_requests_from_school_to_school->isEthinic=='true'? 'fa-check':'fa-close'}}"></h4></td>
					</tr>
			</tbody>
		</table>
    </div>
  </div>

</div>


<div class="col-md-12">
<hr>
	<div class="col-md-12">
	{{App\Global_var::getLangString('Created_By', $language_strings)}}:
	<label class="label label-default">{{$transfer_requests_from_school_to_school->createdByUser!=null? $transfer_requests_from_school_to_school->createdByUser->username():''}}</label>

	{{App\Global_var::getLangString('Updated_By', $language_strings)}}:
	<label class="label label-default">{{$transfer_requests_from_school_to_school->updatedByUser!=null? $transfer_requests_from_school_to_school->updatedByUser->username():''}}	</label>
	<br>

	{{App\Global_var::getLangString('Created_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($transfer_requests_from_school_to_school->created_at))}}</label>
	{{App\Global_var::getLangString('Updated_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($transfer_requests_from_school_to_school->updated_at))}}</label> 		 

</div>
</div>

		</div>
			</div>
		</div>
	</div>
