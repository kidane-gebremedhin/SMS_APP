<div class="col-md-12">
	<div class="col-md-8 ">
		<h4 class="text-danger">
			{{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}
			<a href="{{route('countries.index')}}" class="get btn btn-default btn-md" nextUrl="{{route('countries.destroy', $country->id)}}"> 
				{{App\Global_var::getLangString('No', $language_strings)}}
			</a>
			<a href="{{route('countries.destroy', $country->id)}}" value="{{$country->id}}" class="get btn btn-danger btn-md" nextUrl="{{route('countries.index')}}"><i class="fa fa-trash"></i> 
				{{App\Global_var::getLangString('Yes', $language_strings)}}
			</a>
		</h4>	

	</div>
	<div class="col-md-12"></div>
	<div class="col-md-8">
		<div class="panel panel-success">
			<div class="panel-body">
				<table class="table">
					<tbody>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$country->name}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Remark', $language_strings)}}</strong></td><td><h4>{{$country->remark}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Created_By', $language_strings)}}</strong></td><td><h4>{{$country->createdByUser!=null? $country->createdByUser->name:''}}</h4></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-12"></div>
	<div class="col-md-6">

		<hr>
			{{App\Global_var::getLangString('Created_At', $language_strings)}}: <label class="label label-default">{{date('M j Y H:i', strtotime($country->created_at))}}</label> {{App\Global_var::getLangString('Updated_At', $language_strings)}}: <label class="label label-default">{{date('M j Y H:i', strtotime($country->updated_at))}}</label> 
		<br><br>
	</div>
</div>
