<div class="col-md-12">
	<div class="col-md-10">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4> 
					{{App\Global_var::getLangString('Detail', $language_strings)}}
<!-- 					<a printArea=".table" title="{{App\Global_var::getLangString('User', $language_strings)}}" class="printBtn btn btn-default btn-md pull-right"><i class="fa fa-print"></i>
						{{App\Global_var::getLangString('Print', $language_strings)}}
					</a> -->
					@if($currentUser->isGranted('users.index'))
					<a href="{{route('users.index')}}" class="get btn btn-success btn-sm pull-right"><i class="fa fa-eye"></i> <strong>
						{{App\Global_var::getLangString('List', $language_strings)}}
					</strong></a>
					@endif		 
				</h4>		
			</div>
			<div class="panel-body">
				<table class="table">
					<tbody>
						<tr>
							<td class="col-md-4"><strong>{{App\Global_var::getLangString('Status', $language_strings)}}</strong></td><td><label class="badge {{$user->status=='active'? 'bg-green': 'bg-red'}}"> {{$user->status}}</label></td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Adminstrative_Level', $language_strings)}}</td><td><h4>{{$user->adminLevel}}</h4></td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Full_Name', $language_strings)}}</td><td><h4>{{$user->fullName}}</h4></td>
						</tr>
						<tr>
							<td>{{App\Global_var::getLangString('Phone_Number', $language_strings)}}</td>
							<td>
								{{$user->phoneNumber}} 
							</td>
						</tr>

						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Email', $language_strings)}}</td><td>{{$user->email}}</td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Username', $language_strings)}}</td><td>{{$user->userName}}</td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Role', $language_strings)}}</td><td><strong>{{App\Global_var::getLangString($user->role!=null? $user->role->roleName: '', $language_strings)}}</strong></td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Region', $language_strings)}}</td><td><strong>{{$user->region!=null? $user->region->name: ''}}</strong></td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Zone', $language_strings)}}</td><td><strong>{{$user->zone!=null? $user->zone->name: ''}}</strong></td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Wereda', $language_strings)}}</td><td><strong>{{$user->wereda!=null? $user->wereda->name: ''}}</strong></td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('School', $language_strings)}}</td><td><strong>{{$user->school!=null? $user->school->name: ''}}</strong></td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Created_By', $language_strings)}}</td><td>{{$user->createdByUser!=null? $user->createdByUser->username():''}}</td>
						</tr>
						<tr>
							<td class="col-md-4">{{App\Global_var::getLangString('Updated_By', $language_strings)}}</td><td>{{$user->updatedByUser!=null? $user->updatedByUser->username():''}}</td>
						</tr>
					</tbody>
				</table>

<div class="col-md-12">
<hr>
	<div class="col-md-12">
	{{App\Global_var::getLangString('Created_By', $language_strings)}}:
	<label class="label label-default">{{$user->createdByUser!=null? $user->createdByUser->username():''}}</label>

	{{App\Global_var::getLangString('Updated_By', $language_strings)}}:
	<label class="label label-default">{{$user->updatedByUser!=null? $user->updatedByUser->username():''}}	</label>
	<br>

	{{App\Global_var::getLangString('Created_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($user->created_at))}}</label>
	{{App\Global_var::getLangString('Updated_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($user->updated_at))}}</label> 		 

</div>
</div>
<div class="col-md-12">
<hr>
	<div class="col-md-4 pull-right">

	<a href="{{route('users.edit', $user->id)}}" value="{{$user->id}}" class="get btn btn-sm btn-primary" nextUrl="{{route('users.edit', $user->id)}}"><i class="fa fa-edit"></i> 
		{{App\Global_var::getLangString('Edit', $language_strings)}}
	</a>
	<a href="{{route('users.delete', $user->id)}}" value="{{$user->id}}" class="get btn btn-sm btn-danger" nextUrl="{{route('users.delete', $user->id)}}"><i class="fa fa-trash"></i> 
		{{App\Global_var::getLangString('Delete', $language_strings)}}
	</a>
</div>
</div>
			</div>
		</div>
	</div>

</div>