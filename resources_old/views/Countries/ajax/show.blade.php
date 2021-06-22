<div class="col-md-12">
	<div class="col-md-8 ">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4> 
					{{App\Global_var::getLangString('Detail', $language_strings)}}
					<a href="{{route('countries.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('countries.index')}}"><i class="fa fa-eye"></i> <strong>
						{{App\Global_var::getLangString('List', $language_strings)}}
					</strong></a></h4>		
				</div>
				<div class="panel-body">
					<table class="table">
						<tbody>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$country->name}}</h4></td>
							</tr>
							<tr>
								<td><strong>{{App\Global_var::getLangString('Remark', $language_strings)}}</strong></td><td><h4>{{$country->remark}}</h4></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-8">

			<div class="col-md-6">
				{{App\Global_var::getLangString('Created_At', $language_strings)}}: <label class="label label-default">{{date('M j Y H:i', strtotime($country->created_at))}}</label> {{App\Global_var::getLangString('Updated_At', $language_strings)}}: <label class="label label-default">{{date('M j Y H:i', strtotime($country->updated_at))}}</label> 
			</div>
			<div class="col-md-4">

				<a href="{{route('countries.edit', $country->id)}}" value="{{$country->id}}" class="get btn btn-primary" nextUrl="{{route('countries.edit', $country->id)}}"><i class="fa fa-edit"></i> 
					{{App\Global_var::getLangString('Edit', $language_strings)}}
				</a>
				<a href="{{route('countries.delete', $country->id)}}" value="{{$country->id}}" class="get btn btn-danger" nextUrl="{{route('countries.delete', $country->id)}}"><i class="fa fa-trash"></i> 
					{{App\Global_var::getLangString('Delete', $language_strings)}}
				</a>
			</div>
		</div>
	</div>
