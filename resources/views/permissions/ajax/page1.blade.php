
<div class="col-md-10 col-md-offset-1 ">
	<div class="panel panel-success ">
		<div class="panel-heading">
			<div class="panel-title">
				{{App\Global_var::getLangString('Assign_Role_Permissions', $language_strings)}}
			</div>
		</div>
		<div class="panel-body">
			<div class="col-md-8">
				<table class="table">
					<thead>
						<th clas="col-lg-2">#</th>
						<th clas="col-lg-8">{{App\Global_var::getLangString('Role', $language_strings)}}</th>
						<th clas="col-lg-2 pull-right">{{App\Global_var::getLangString('Actions', $language_strings)}}</th>
					</thead>
					<tbody>
						@foreach($roles as $role)
						<?php
						if($role->roleName=='superadmin' || $role->roleName=='Public')
							continue;
						?>
						<tr>
							<td>{{$role->id}}</td>
							<td>{{App\Global_var::getLangString($role->roleName, $language_strings)}}</td>
							<td>
								<a class="get btn btn-default" value="{{$role->id}}" href="{{route('permissions.step2', $role->id)}}" style="color: green">{{App\Global_var::getLangString('Assign_Role_Permissions', $language_strings)}}</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	{{-- <h4 class="text-center"> </h4> --}}
	{{-- <hr> --}}
	
</div>
<div class="row col-md-12 text-center">
	<br><br>
	{{--$resources->links()--}}
</div>
<div class="row">
	<div class=" col-md-4 col-md-offset-4">
	</div>
</div>
</form>
<div style="height:300px;">

</div>
{{-- @endsection --}} 
