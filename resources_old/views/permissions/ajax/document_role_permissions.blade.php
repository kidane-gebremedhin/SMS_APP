<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-success ">
		<div class="panel-heading">
			<div class="panel-title">
				{{App\Global_var::getLangString('Set_Document_Permissions', $language_strings)}} 
			</div>
		</div>
		<div class="panel-body">
			<div class="crud_resourceDiv">
				<div class="col-md-12 ">
					<div class="col-md-12">
						<h4> {{App\Global_var::getLangString('Document', $language_strings)}} <u> <strong>{{$document->title}}</strong></u> {{App\Global_var::getLangString('Access_Permissions', $language_strings)}}  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-checkAll" type="checkbox" documentId="{{$document->id}}" actionType="all_actions" {{$document->hasFull_Permission('download')? 'checked':''}}> <label style="color: green">
						<u>{{App\Global_var::getLangString('Allow_All', $language_strings)}}</u>
						</label>
						</h4>
					</div>
					<div class="col-md-12">
						<div id="myTabContent" class="tab-content">
							<div class="col-md-12">
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<th clas="col-lg-1">#</th>
										<th clas="col-lg-4">{{App\Global_var::getLangString('Role', $language_strings)}}</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('View/Play', $language_strings)}}</u></strong>
											<br>
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-checkAll" type="checkbox" documentId="{{$document->id}}" actionType="show" {{$document->hasFull_Permission('show')? 'checked':''}}> <label>{{App\Global_var::getLangString('Allow_All', $language_strings)}}
											</label>
										</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('Allow_Download', $language_strings)}}</u></strong>
											<br>
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-checkAll" type="checkbox" documentId="{{$document->id}}" actionType="download" {{$document->hasFull_Permission('download')? 'checked':''}}> <label>{{App\Global_var::getLangString('Allow_All', $language_strings)}}
											</label>
										</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('Share', $language_strings)}}</u></strong>
											<br>
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-checkAll" type="checkbox" documentId="{{$document->id}}" actionType="share" {{$document->hasFull_Permission('share')? 'checked':''}}> <label>{{App\Global_var::getLangString('Allow_All', $language_strings)}}
											</label>
										</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('Edit', $language_strings)}}
											</u></strong>
											<br>
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-checkAll" type="checkbox" documentId="{{$document->id}}" actionType="update" {{$document->hasFull_Permission('update')? 'checked':''}}> <label>{{App\Global_var::getLangString('Allow_All', $language_strings)}}
											</label>
										</th>
										<th clas="col-lg-1 pull-right">	
											<strong><u>{{App\Global_var::getLangString('Delete', $language_strings)}}
											</u></strong>
											<br>
											<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-checkAll" type="checkbox" documentId="{{$document->id}}" actionType="destroy" {{$document->hasFull_Permission('destroy')? 'checked':''}}> <label>{{App\Global_var::getLangString('Allow_All', $language_strings)}}
											</label>
										</th>
									</thead>
									<tbody>
										<?php $i=1 ?>
										@foreach($roles as $role)
										<?php 
											if($role->isAdmin()){
												continue;
											} ?>
										<tr>
											<td>{{$i}}</td>
											<td>{{App\Global_var::getLangString($role->roleName, $language_strings)}}</td>
											<td>
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$document->id}}" actionType="show" {{$role->hasDocumentPermission($document->id, 'show')? 'checked':''}}>
											</td>
											<td>
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$document->id}}" actionType="download" {{$role->hasDocumentPermission($document->id, 'download')? 'checked':''}}>
											</td>
											<td>
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$document->id}}" actionType="share" {{$role->hasDocumentPermission($document->id, 'share')? 'checked':''}}>
											</td>
											<td>
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$document->id}}" actionType="update" {{$role->hasDocumentPermission($document->id, 'update')? 'checked':''}}>
											</td>
											<td>
												<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox document-permissions-save" type="checkbox" roleId="{{$role->id}}" resourceId="{{$document->id}}" actionType="destroy" {{$role->hasDocumentPermission($document->id, 'destroy')? 'checked':''}}>
											</td>
										</tr>
										<?php $i++ ?>
										@endforeach
									</tbody>
								</table>
								<!-- </div>
								</div> -->

							</div>
							<div class="col-md-12">
							<div class="col-md-8 col-md-offset-2">
								<a class="get btn btn-success btn-block" href="{{route('permissions.approveDocumentPermissions', $document->id)}}">{{App\Global_var::getLangString('Finish', $language_strings)}}
								</a>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>	
</div>
