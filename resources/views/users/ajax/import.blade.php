<div class="row">
<div class="col-md-8 col-md-offset-2">
		<h3>Create new user</h3><a href="{{route('users.index')}}" class="users-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i> <strong>View all users</strong></a>
</div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
	<!-- {!!Form::open(array("route"=>"users.import.post", "method"=>"POST", "id"=>"users-create-submit", "files"=>true))!!} -->
    <form action="{{route('users.import.post')}}" enctype="multipart/form-data" method="post">
    {{csrf_field()}}
 		<div class="col-md-12 panel panel-info">
            <div class="panel-heading col-md-12">Import Users</div>
           <div class="panel-body col-md-12">                   
               <div class="col-lg-6">
                    <div class="form-group">
                    <br><label for="roleId" class="col-lg-4 control-label" style="padding-top: 5px;"> Excel File</label>
                    <div class="col-lg-8">
                    <input type="file" name="file"><br>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                    <br>
                    <div class="col-lg-8">
                    <input type="submit" value="Import" class="btn btn-primary"><br>
                    </div>
                    </div>
                </div>                             
            </div>
            </div>
        {{Form::close()}}
    </div>

	</div>
