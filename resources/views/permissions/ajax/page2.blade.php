<div class="col-md-12 col-md-offset-0">
	<div class="panel panel-success ">
		<div class="panel-heading">
			<div class="panel-title">
				{{App\Global_var::getLangString('Assign_Role_Permissions', $language_strings)}}
			</div>
		</div>
		<div class="panel-body">
			<div class="crud_resourceDiv">
				<div class="col-md-12 ">
					<div class="col-md-12">
						<h4><strong> {{App\Global_var::getLangString('Role', $language_strings)}} <span style="color: red"> {{App\Global_var::getLangString($role->roleName, $language_strings)}}</span></strong>:  {{App\Global_var::getLangString('Assign_Role_Permissions', $language_strings)}}  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
							<span style="color: red">{{App\Global_var::getLangString('Permissions_Will_Be_Saved_Automatically', $language_strings)}}</span><a href="#" value="{{$role->id}}" class="permissions-step0 pull-right"><i class="glyphicon glyphicon-arrow-left"></i> {{App\Global_var::getLangString('Back', $language_strings)}}</a>
						</h4>
					</div>
					<div class="col-md-12">
						<div class="col-md-12">
							<ul class="nav nav-tabs st-nav-tabs">
								<li><a class="tap_element" href="#first_tab" data-toggle="tab" style="color: red">{{App\Global_var::getLangString('Crud_Resources', $language_strings)}} </a></li>
								<li><a class="tap_element" href="#Action_Resources" data-toggle="tab" style="color: red">{{App\Global_var::getLangString('Action_Resources', $language_strings)}}</a></li>
							</ul>
						</div>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade in" id="first_tab">
								<table class="table  table-striped table-hover table-bordered">
									<thead>
										<th clas="col-lg-1">#</th>
										<th clas="col-lg-4">{{App\Global_var::getLangString('Resource_Name', $language_strings)}}</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('Create', $language_strings)}}
											</u></strong>
											<br>
											@if($role->hasFull_Permission('store'))
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll checked" type="checkbox" roleId="{{$role->id}}" actionType="store" checked> 
											@else
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll" type="checkbox" roleId="{{$role->id}}" actionType="store"> 
											@endif
											<label style="color: green">
												<u>{{App\Global_var::getLangString('Allow_All', $language_strings)}}</u>
											</label>
										</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('List', $language_strings)}}
											</u></strong>
											<br>
											@if($role->hasFull_Permission('index'))
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll checked" type="checkbox" roleId="{{$role->id}}" actionType="index" checked> 
											@else
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll" type="checkbox" roleId="{{$role->id}}" actionType="index"> 
											@endif
											<label style="color: green">
												<u>{{App\Global_var::getLangString('Allow_All', $language_strings)}}</u>
											</label>
										</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('Detail', $language_strings)}}</u></strong>
											<br>
											@if($role->hasFull_Permission('show'))
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll checked" type="checkbox" roleId="{{$role->id}}" actionType="show" checked> 
											@else
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll" type="checkbox" roleId="{{$role->id}}" actionType="show"> 
											@endif
											<label style="color: green">
												<u>{{App\Global_var::getLangString('Allow_All', $language_strings)}}</u>
											</label>
										</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('Edit', $language_strings)}}
											</u></strong>
											<br>
											@if($role->hasFull_Permission('update'))
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll checked" type="checkbox" roleId="{{$role->id}}" actionType="update" checked> 
											@else
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll" type="checkbox" roleId="{{$role->id}}" actionType="update"> 
											@endif
											<label style="color: green">
												<u>{{App\Global_var::getLangString('Allow_All', $language_strings)}}</u>
											</label>
										</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('Delete', $language_strings)}}
											</u></strong>
											<br>
											@if($role->hasFull_Permission('destroy'))
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll checked" type="checkbox" roleId="{{$role->id}}" actionType="destroy" checked> 
											@else
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll" type="checkbox" roleId="{{$role->id}}" actionType="destroy"> 
											@endif
											<label style="color: green">
												<u>{{App\Global_var::getLangString('Allow_All', $language_strings)}}</u>
											</label>
										</th>
									</thead>
									<tbody>
										<?php $i=1 ?>
										@foreach($resources->where('is_crud', '=', 'true') as $resource)
										<tr>
											<td>{{$i}}</td>
											<td>{{str_replace('_', ' ', $resource->entityName)}}</td>
											<td>
												@if($role->hasPermission($resource->id, 'store'))
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save checked" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="store" checked>
												@else
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="store">
												@endif
											</td>
											<td>
												@if($role->hasPermission($resource->id, 'index'))
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save checked" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="index" checked>
												@else
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="index">
												@endif
											</td>
											<td>
												@if($role->hasPermission($resource->id, 'show'))
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save checked" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="show" checked>
												@else
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="show">
												@endif
											</td>
											<td>
												@if($role->hasPermission($resource->id, 'update'))
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save checked" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="update" checked>
												@else
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="update">
												@endif
											</td>
											<td>
												@if($role->hasPermission($resource->id, 'destroy'))
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save checked" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="destroy" checked>
												@else
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="destroy">
												@endif
											</td>
										</tr>
										<?php $i++ ?>
										@endforeach
									</tbody>
								</table>
								<!-- </div>
								</div> -->

							</div>
							<div class="tab-pane fade in" id="Action_Resources">
								
								<table class="table  table-striped table-hover table-bordered">
									<thead>
										<th clas="col-lg-1">#</th>
										<th clas="col-lg-4">{{App\Global_var::getLangString('Resource_Name', $language_strings)}}</th>
										<!-- <th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('Allow_Action', $language_strings)}}</u></strong>
											<br>
											@if($role->hasFull_Permission('allow_action'))
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll checked" type="checkbox" roleId="{{$role->id}}" actionType="allow_action" checked> 
											@else
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-checkAll" type="checkbox" roleId="{{$role->id}}" actionType="allow_action"> 
											@endif
											<label style="color: green">
												<u>{{App\Global_var::getLangString('Allow_All', $language_strings)}}</u>
											</label>
										</th> -->
									</thead>
									<tbody>
										<?php $i=1 ?>
										@foreach($resources->where('is_crud', '=', 'false') as $resource)
										<tr>
											<td>{{$i}}</td>
											<td>{{str_replace('_', ' ', $resource->entityName)}}</td>
											<td>
												@if($role->hasPermission($resource->id, 'allow_action'))
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save checked" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="allow_action" checked>
												@else
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$resource->id}}" actionType="allow_action">
												@endif
											</td>
										</tr>
										<?php $i++ ?>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>	
</div>
