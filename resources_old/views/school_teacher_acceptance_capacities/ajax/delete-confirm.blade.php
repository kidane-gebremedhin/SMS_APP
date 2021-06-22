<div class="col-md-12">
	<div class="col-md-10">
		<h4 class="text-danger">
			{{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}
			@if($currentUser->isGranted('school_teacher_acceptance_capacities.index'))
			<a href="{{route('school_teacher_acceptance_capacities.index')}}" class="get btn btn-default btn-sm" nextUrl="{{route('school_teacher_acceptance_capacities.destroy', $school_teacher_acceptance_capacity->id)}}"> 
				{{App\Global_var::getLangString('No', $language_strings)}}
			</a>
			@endif
			@if($currentUser->isGranted('school_teacher_acceptance_capacities.delete'))
			<a href="{{route('school_teacher_acceptance_capacities.destroy', $school_teacher_acceptance_capacity->id)}}" value="{{$school_teacher_acceptance_capacity->id}}" class="get btn btn-danger btn-sm" nextUrl="{{route('school_teacher_acceptance_capacities.index')}}"><i class="fa fa-trash"></i> 
				{{App\Global_var::getLangString('Yes', $language_strings)}}
			</a>
			@endif

		</h4>	
	</div>
		<div class="col-md-8">
			<div class="panel panel-success">
				<div class="panel-heading">
					{{App\Global_var::getLangString('Detail', $language_strings)}}
					<a href="{{route('school_teacher_acceptance_capacities.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('school_teacher_acceptance_capacities.index')}}"><i class="fa fa-eye"></i> 
						{{App\Global_var::getLangString('List', $language_strings)}}
					</a> 	
				</div>
				<div class="panel-body">
			<table class="table">
				<tbody>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Round', $language_strings)}}</strong></td><td><h4>{{$school_teacher_acceptance_capacity->round!=null? $school_teacher_acceptance_capacity->round->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Request_Type', $language_strings)}}</strong></td><td><h4>{{$school_teacher_acceptance_capacity->requestType!=null? $school_teacher_acceptance_capacity->requestType->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('School', $language_strings)}}</strong></td><td><h4>{{$school_teacher_acceptance_capacity->school!=null? $school_teacher_acceptance_capacity->school->name:''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Educational_Level', $language_strings)}}</strong></td><td><h4>{{$school_teacher_acceptance_capacity->educationalLevel!=null? $school_teacher_acceptance_capacity->educationalLevel->name:''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Subject', $language_strings)}}</strong></td><td><h4>{{$school_teacher_acceptance_capacity->subject!=null? $school_teacher_acceptance_capacity->subject->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Quantity', $language_strings)}}</strong></td><td><h4>{{$school_teacher_acceptance_capacity->quantity}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Date', $language_strings)}}</strong></td><td><h4>{{$school_teacher_acceptance_capacity->date}}</h4></td>
					</tr>

					<tr>
						<td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{!! $school_teacher_acceptance_capacity->remark !!}</h4></td>
					</tr>

				</tbody>
			</table>

<div class="col-md-12">
<hr>
	<div class="col-md-12">
	{{App\Global_var::getLangString('Created_By', $language_strings)}}:
	<label class="label label-default">{{$school_teacher_acceptance_capacity->createdByUser!=null? $school_teacher_acceptance_capacity->createdByUser->username():''}}</label>

	{{App\Global_var::getLangString('Updated_By', $language_strings)}}:
	<label class="label label-default">{{$school_teacher_acceptance_capacity->updatedByUser!=null? $school_teacher_acceptance_capacity->updatedByUser->username():''}}	</label>
	<br>

	{{App\Global_var::getLangString('Created_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($school_teacher_acceptance_capacity->created_at))}}</label>
	{{App\Global_var::getLangString('Updated_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($school_teacher_acceptance_capacity->updated_at))}}</label> 		 

</div>
</div>

		</div>
			</div>
		</div>
	</div>
