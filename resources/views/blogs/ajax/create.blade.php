<div class="row">
<div class="col-md-8 col-md-offset-2">
		<h3>Create new blog</h3><a href="{{route('blogs.index')}}" class="blogs-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i> <strong>View all blogs</strong></a>
</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
	{!!Form::open(array("route"=>"blogs.store", "method"=>"POST", 'files'=>'true', "id"=>"blogs-create-submit"))!!}
 					<div class="col-md-12 panel panel-info">
                          <div class=" panel-body">
                           <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-3 control-label" style="padding-top: 5px;"> Blog Title</label>
                                <div class="col-lg-6">
                                {{ Form::text('title', null, array('class'=>'form-control', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-3 control-label" style="padding-top: 5px;"> Featured Image</label>
                                <div class="col-lg-6">
                                 {{ Form::file('image')}}<br>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-3 control-label" style="padding-top: 5px;"> Body</label>
                                <div class="col-lg-6">
                                {{Form::textarea('body', null, array('class'=>'form-control', 'rows'=>'5', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                             <div class="form-group">
                                <br><label class="col-lg-3 control-label" style="padding-top: 5px;"> </label>
                                <div class="col-lg-6">
                                <br>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </div> 
                            
			             	{{Form::close()}}

                        </div>
                        </div>
                        </div>

	</div>
