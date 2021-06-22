<div class="col-md-12">
	<div class="col-md-8 ">
		<h4 class="text-danger">
			{{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}
			<a href="{{route('regions.index')}}" class="get btn  btn-default btn-sm" nextUrl="{{route('regions.destroy', $region->id)}}"> 
				{{App\Global_var::getLangString('No', $language_strings)}}
			</a>
			<a href="{{route('regions.destroy', $region->id)}}" value="{{$region->id}}" class="get btn btn-danger btn-sm" nextUrl="{{route('regions.index')}}"><i class="fa fa-trash"></i> 
				{{App\Global_var::getLangString('Yes', $language_strings)}}
			</a>
		</h4>
	</div>
	<div class="col-md-8 ">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>{{App\Global_var::getLangString('Detail', $language_strings)}}</h4> 		
			</div>
			<div class="panel-body">
				<table class="table">
					<tbody>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$region->name}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Country', $language_strings)}}</strong></td><td><h4>{{$region->country!=null? $region->country->name:''}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{{$region->remark}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Created_By', $language_strings)}}</strong></td><td><h4>{{$region->createdByUser!=null? $region->createdByUser->username():''}}</h4></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-10 ">
		<hr>
		{{App\Global_var::getLangString('Created_At', $language_strings)}}: <label class="label label-default">{{date('M j Y h:i', strtotime($region->created_at))}}</label> {{App\Global_var::getLangString('Updated_At', $language_strings)}}: <label class="label label-default">{{date('M j Y h:i', strtotime($region->updated_at))}}</label> 
		
	</div>
</div>
