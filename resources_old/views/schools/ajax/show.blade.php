<div class="col-md-12">
	<div class="col-md-8 "> 
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4> 
					{{App\Global_var::getLangString('Detail', $language_strings)}}
					<a href="{{route('schools.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('schools.index')}}"><i class="fa fa-eye"></i> <strong>
						{{App\Global_var::getLangString('List', $language_strings)}}
					</strong></a></h4>			
				</div>
				<div class="panel-body">
				<table class="table">
					<tbody>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$school->name}}</h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Principal', $language_strings)}}</strong></td><td><h4>{{$school->principal}}</h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Phone_Number', $language_strings)}}</strong></td><td><h4>{{$school->phoneNumber}}</h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Email', $language_strings)}}</strong></td><td><h4>{{$school->email}}</h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Wereda', $language_strings)}}</strong></td><td><h4>{{$school->wereda!=null? $school->wereda->name:''}}</h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Zone', $language_strings)}}</strong></td><td><h4>{{$school->zone!=null? $school->zone->name:''}}</h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Region', $language_strings)}}</strong></td><td><h4>{{$school->region!=null? $school->region->name:''}}</h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Ethinic', $language_strings)}}</strong></td><td><h4 class="fa {{$school->isEthinic=='true'? 'fa-check':'fa-close'}}"></h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{!!$school->remark !!}</h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Created_By', $language_strings)}}</strong></td><td><h4>{{$school->createdByUser!=null? $school->createdByUser->username():''}}</h4></td>
							</tr>
						</tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<div class="col-md-10"> 
	<div class="col-md-6">
		{{App\Global_var::getLangString('Created_At', $language_strings)}}: <label class="label label-default">{{date('M j Y h:i', strtotime($school->created_at))}}</label> {{App\Global_var::getLangString('Updated_At', $language_strings)}}: <label class="label label-default">{{date('M j Y h:i', strtotime($school->updated_at))}}</label> 
	</div>
	<div class="col-md-4">

		<a href="{{route('schools.edit', $school->id)}}" value="{{$school->id}}" class="get btn btn-primary" nextUrl="{{route('schools.edit', $school->id)}}"><i class="fa fa-edit"></i> 
			{{App\Global_var::getLangString('Edit', $language_strings)}}
		</a>
		<a href="{{route('schools.delete', $school->id)}}" value="{{$school->id}}" class="get btn btn-danger" nextUrl="{{route('schools.delete', $school->id)}}"><i class="fa fa-trash"></i> 
			{{App\Global_var::getLangString('Delete', $language_strings)}}
		</a>
	</div>
</div>
