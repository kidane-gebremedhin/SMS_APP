<div class="col-md-12">
	<div class="col-md-8 "> 
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4> 
					{{App\Global_var::getLangString('Detail', $language_strings)}}
					<a href="{{route('weredas.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('weredas.index')}}"><i class="fa fa-eye"></i> <strong>
						{{App\Global_var::getLangString('List', $language_strings)}}
					</strong></a></h4>			
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
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<div class="col-md-10"> 
	<div class="col-md-6">
		{{App\Global_var::getLangString('Created_At', $language_strings)}}: <label class="label label-default">{{date('M j Y h:i', strtotime($wereda->created_at))}}</label> {{App\Global_var::getLangString('Updated_At', $language_strings)}}: <label class="label label-default">{{date('M j Y h:i', strtotime($wereda->updated_at))}}</label> 
	</div>
	<div class="col-md-4">

		<a href="{{route('weredas.edit', $wereda->id)}}" value="{{$wereda->id}}" class="get btn btn-primary" nextUrl="{{route('weredas.edit', $wereda->id)}}"><i class="fa fa-edit"></i> 
			{{App\Global_var::getLangString('Edit', $language_strings)}}
		</a>
		<a href="{{route('weredas.delete', $wereda->id)}}" value="{{$wereda->id}}" class="get btn btn-danger" nextUrl="{{route('weredas.delete', $wereda->id)}}"><i class="fa fa-trash"></i> 
			{{App\Global_var::getLangString('Delete', $language_strings)}}
		</a>
	</div>
</div>
