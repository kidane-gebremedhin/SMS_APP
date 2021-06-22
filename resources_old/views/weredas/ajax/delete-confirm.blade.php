<div class="col-md-12">
	<div class="col-md-8">
		<h4 class="text-danger">
			{{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}
			<a href="{{route('weredas.index')}}" class="get btn btn-default btn-md" nextUrl="{{route('weredas.destroy', $wereda->id)}}"> 
				{{App\Global_var::getLangString('No', $language_strings)}}
			</a>
			<a href="{{route('weredas.destroy', $wereda->id)}}" value="{{$wereda->id}}" class="get btn btn-danger btn-md" nextUrl="{{route('weredas.index')}}"><i class="fa fa-trash"></i> 
				{{App\Global_var::getLangString('Yes', $language_strings)}}
			</a>
		</h4>		

	</div>
	<div class="col-md-8">
		<div class="panel panel-success">
			<div class="panel-heading">

				<h4>{{App\Global_var::getLangString('Detail', $language_strings)}}</h4> 		
			</div>
			<div class="panel-body">
				<table class="table">
					<tbody>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$wereda->name}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Office_Head', $language_strings)}}</strong></td><td><h4>{{$wereda->officeHead}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Phone_Number', $language_strings)}}</strong></td><td><h4>{{$wereda->phoneNumber}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Email', $language_strings)}}</strong></td><td><h4>{{$wereda->email}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Region', $language_strings)}}</strong></td><td><h4>{{$wereda->region!=null? $wereda->region->name:''}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Zone', $language_strings)}}</strong></td><td><h4>{{$wereda->zone!=null? $wereda->zone->name:''}}</h4></td>
						</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Ethinic', $language_strings)}}</strong></td><td><h4 class="fa {{$wereda->isEthinic=='true'? 'fa-check':'fa-close'}}"></h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{{$wereda->remark}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Created_By', $language_strings)}}</strong></td><td><h4>{{$wereda->createdByUser!=null? $wereda->createdByUser->username():''}}</h4></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-10">
		{{App\Global_var::getLangString('Created_At', $language_strings)}}: <label class="label label-default">{{date('M j Y h:i', strtotime($wereda->created_at))}}</label> {{App\Global_var::getLangString('Updated_At', $language_strings)}}: <label class="label label-default">{{date('M j Y h:i', strtotime($wereda->updated_at))}}</label> 
		
	</div>
</div>
