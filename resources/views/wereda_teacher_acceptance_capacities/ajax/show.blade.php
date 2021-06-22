<div class="col-md-10">
	<div class="panel panel-success">
		<div class="panel-heading">
			{{App\Global_var::getLangString('Detail', $language_strings)}}

			@if($currentUser->isGranted('wereda_teacher_acceptance_capacities.index'))
			<a href="{{route('wereda_teacher_acceptance_capacities.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('wereda_teacher_acceptance_capacities.index')}}"><i class="fa fa-eye"></i>  
				{{App\Global_var::getLangString('List', $language_strings)}}
			</a> 		
		@endif
		</div>
		<div class="panel-body">
			<table class="table">
				<tbody>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Round', $language_strings)}}</strong></td><td><h4>{{$wereda_teacher_acceptance_capacity->round!=null? $wereda_teacher_acceptance_capacity->round->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Request_Type', $language_strings)}}</strong></td><td><h4>{{$wereda_teacher_acceptance_capacity->requestType!=null? $wereda_teacher_acceptance_capacity->requestType->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Wereda', $language_strings)}}</strong></td><td><h4>{{$wereda_teacher_acceptance_capacity->wereda!=null? $wereda_teacher_acceptance_capacity->wereda->name:''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Educational_Level', $language_strings)}}</strong></td><td><h4>{{$wereda_teacher_acceptance_capacity->educationalLevel!=null? $wereda_teacher_acceptance_capacity->educationalLevel->name:''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Subject', $language_strings)}}</strong></td><td><h4>{{$wereda_teacher_acceptance_capacity->subject!=null? $wereda_teacher_acceptance_capacity->subject->name: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Quantity', $language_strings)}}</strong></td><td><h4>{{$wereda_teacher_acceptance_capacity->quantity}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Date', $language_strings)}}</strong></td><td><h4>{{$wereda_teacher_acceptance_capacity->date}}</h4></td>
					</tr>

					<tr>
						<td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{!! $wereda_teacher_acceptance_capacity->remark !!}</h4></td>
					</tr>

				</tbody>
			</table>

<div class="col-md-12">
<hr>
	<div class="col-md-12">
	{{App\Global_var::getLangString('Created_By', $language_strings)}}:
	<label class="label label-default">{{$wereda_teacher_acceptance_capacity->createdByUser!=null? $wereda_teacher_acceptance_capacity->createdByUser->username():''}}</label>

	{{App\Global_var::getLangString('Updated_By', $language_strings)}}:
	<label class="label label-default">{{$wereda_teacher_acceptance_capacity->updatedByUser!=null? $wereda_teacher_acceptance_capacity->updatedByUser->username():''}}	</label>
	<br>

	{{App\Global_var::getLangString('Created_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($wereda_teacher_acceptance_capacity->created_at))}}</label>
	{{App\Global_var::getLangString('Updated_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($wereda_teacher_acceptance_capacity->updated_at))}}</label> 		 

</div>
</div>
<div class="col-md-12">
<hr>
	<div class="col-md-4 pull-right">

	@if($currentUser->isGranted('wereda_teacher_acceptance_capacities.edit'))
	<a href="{{route('wereda_teacher_acceptance_capacities.edit', $wereda_teacher_acceptance_capacity->id)}}" value="{{$wereda_teacher_acceptance_capacity->id}}" class="get btn btn-sm btn-primary" nextUrl="{{route('wereda_teacher_acceptance_capacities.edit', $wereda_teacher_acceptance_capacity->id)}}"><i class="fa fa-edit"></i> 
		{{App\Global_var::getLangString('Edit', $language_strings)}}
	</a>
	@endif
	@if($currentUser->isGranted('wereda_teacher_acceptance_capacities.delete'))
	<a href="{{route('wereda_teacher_acceptance_capacities.delete', $wereda_teacher_acceptance_capacity->id)}}" value="{{$wereda_teacher_acceptance_capacity->id}}" class="get btn btn-sm btn-danger" nextUrl="{{route('wereda_teacher_acceptance_capacities.delete', $wereda_teacher_acceptance_capacity->id)}}"><i class="fa fa-trash"></i> 
		{{App\Global_var::getLangString('Delete', $language_strings)}}
	</a>
@endif
</div>
</div>
		</div>
	</div>

</div>

