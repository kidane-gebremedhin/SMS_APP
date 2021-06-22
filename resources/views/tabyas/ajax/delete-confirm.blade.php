<div class="col-md-12">
	<div class="col-md-8">
		<h4 class="text-danger">
			{{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}
			<a href="{{route('tabyas.index')}}" class="get btn btn-default btn-md" nextUrl="{{route('tabyas.destroy', $tabya->id)}}"> 
				{{App\Global_var::getLangString('No', $language_strings)}}
			</a>
			<a href="{{route('tabyas.destroy', $tabya->id)}}" value="{{$tabya->id}}" class="get btn btn-danger btn-md" nextUrl="{{route('tabyas.index')}}"><i class="fa fa-trash"></i> 
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
							<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$tabya->name}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Wereda', $language_strings)}}</strong></td><td><h4>{{$tabya->wereda!=null? $tabya->wereda->name:''}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Zone', $language_strings)}}</strong></td><td><h4>{{$tabya->zone!=null? $tabya->zone->name:''}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Region', $language_strings)}}</strong></td><td><h4>{{$tabya->region!=null? $tabya->region->name:''}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Remark', $language_strings)}}</strong></td><td><h4>{{$tabya->remark}}</h4></td>
						</tr>
						<tr>
							<td><strong>{{App\Global_var::getLangString('Created_By', $language_strings)}}</strong></td><td><h4>{{$tabya->createdByUser!=null? $tabya->createdByUser->name:''}}</h4></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-10">
		{{App\Global_var::getLangString('Created_At', $language_strings)}}: <label class="label label-default">{{date('M j Y H:i', strtotime($tabya->created_at))}}</label> {{App\Global_var::getLangString('Updated_At', $language_strings)}}: <label class="label label-default">{{date('M j Y H:i', strtotime($tabya->updated_at))}}</label> 
	</div>
</div>
