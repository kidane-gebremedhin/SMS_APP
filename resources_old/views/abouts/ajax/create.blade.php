<div class="row">
<div class="col-md-8 col-md-offset-2">
		<h3>Create new about</h3><a href="{{route('abouts.index')}}" class="abouts-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i> <strong>View all abouts</strong></a>
</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
	{!!Form::open(array("route"=>"abouts.store", "method"=>"POST", "id"=>"abouts-create-submit"))!!}
 					<div class="col-md-12 panel panel-info">
                          <div class=" panel-body">
                             
                   <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-3 control-label" style="padding-top: 5px;"> About Title</label>
                                <div class="col-lg-6">
                                {{ Form::text('title', null, array('class'=>'form-control', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div> 
                   <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-3 control-label" style="padding-top: 5px;"> Body Content</label>
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
