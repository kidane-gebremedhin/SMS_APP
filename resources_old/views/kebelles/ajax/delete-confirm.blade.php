<div class="col-md-12">
	<div class="col-md-8">
		<h4 class="text-danger">
			{{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}
			<a href="{{route('kebelles.index')}}" class="get btn btn-default btn-md" nextUrl="{{route('kebelles.destroy', $kebelle->id)}}"> 
				{{App\Global_var::getLangString('No', $language_strings)}}
			</a>
			<a href="{{route('kebelles.destroy', $kebelle->id)}}" value="{{$kebelle->id}}" class="get btn btn-danger btn-md" nextUrl="{{route('kebelles.index')}}"><i class="fa fa-trash"></i> 
				{{App\Global_var::getLangString('Yes', $language_strings)}}
			</a>
		</h4>	
	</div>
	<div class="col-md-8">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>{{App\Global_var::getLangString('Detail', $language_strings)}}</h4> 		
			</div>
			<div class="panel-body">
				<table class="table">
					<tbody>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$kebelle->name}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Tabya', $language_strings)}}</strong></td><td><h4>{{$kebelle->tabya!=null? $kebelle->tabya->name:''}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Zone', $language_strings)}}</strong></td><td><h4>{{$kebelle->zone!=null? $kebelle->zone->name:''}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Region', $language_strings)}}</strong></td><td><h4>{{$kebelle->region!=null? $kebelle->region->name:''}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Remark', $language_strings)}}</strong></td><td><h4>{{$kebelle->remark}}</h4></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-10">
		{{App\Global_var::getLangString('Created_At', $language_strings)}}: <label class="label label-default">{{date('M j Y H:i', strtotime($kebelle->created_at))}}</label> {{App\Global_var::getLangString('Updated_At', $language_strings)}}: <label class="label label-default">{{date('M j Y H:i', strtotime($kebelle->updated_at))}}</label> 
	</div>
</div>
