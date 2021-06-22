{{--   @extends('layouts.masterAdmin')

@section('bodycontent') --}}
<div class="row col-md-12">
<h2 class="text-center">Permissions Management Page </h2>
<hr>
	<div class="col-md-10 col-md-offset-1">
	<br><br>
	<form action="{{route('admins.assignPermissions.post')}}" method="POST">
	{{csrf_field()}}
	<table class="col-md-12 table table-striped table-hover">
		<thead>
		 <th>#</th>
			<th>Resource Type</th>
			<th>Staff</th>
			<th>Admin</th>
		</thead>
		<tbody>
		<?php 
			$i=0;
		?>
	@foreach($resources as $resource)
		@if($admin_roles!=null)
		<?php
		$i++;
		?>
		<tr>
			<td><h4>{{$i}}</h4></td><td>
			<h4>Manage {{$resource->resourceTableName}}</h4></td>
			<td>
			<?php
			$checked=false;
				Session::put('roleId', $admin_roles[0]->id);
			//gets resouces from Admin_Resource table based on role id
			$modelResources=App\Admin_Resource::where('roleId', '=', $admin_roles[0]->id)->get();
			foreach ($modelResources as $res) {
		if($res->resourceId==$resource->id){
			$checked=true;
			break;
			}
			}
			?>
		@if($checked)
			<input type="checkbox" name="{{$admin_roles[0]->roleName}}{{$resource->id}}" checked>
		@else
			 <input type="checkbox" name="{{$admin_roles[0]->roleName}}{{$resource->id}}"> 
		@endif
			</td>
			<td>
			<?php
			$checked=false;
				Session::put('roleId', $admin_roles[1]->id);
			//gets resouces from Admin_Resource table based on role id
			$modelResources=App\Admin_Resource::where('roleId', '=', $admin_roles[1]->id)->get();
			foreach ($modelResources as $res) {
		if($res->resourceId==$resource->id){
			$checked=true;
			break;
			}
			}
			?>
		@if($checked)
			<input type="checkbox" name="{{$admin_roles[1]->roleName}}{{$resource->id}}" checked>
		@else
			 <input type="checkbox" name="{{$admin_roles[1]->roleName}}{{$resource->id}}"> 
		@endif
			</td>
		</tr>
		@endif
		@endforeach
		</tbody>
	</table>
	</div>
</div>
<div class="row col-md-12 text-center">
<br><br>
	{{--$resources->links()--}}
</div>
<div class="row">
<div class=" col-md-4 col-md-offset-4">
<br><br>
	<input type="submit" value="Save Changes" class="btn btn-primary btn-block" />
</div>
</div>
</form>
<div style="height:300px;">
	
</div>
{{-- @endsection --}}