<div class="row">
<div class="col-md-8 col-md-offset-2">
		<h3>Create new currency type</h3><a href="{{route('currency_types.index')}}" class="currency_types-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i> <strong>View all currency types</strong></a>
</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
	{!!Form::open(array("route"=>"currency_types.store", "method"=>"POST", "id"=>"currency_types-create-submit"))!!}
 					<div class="col-md-12 panel panel-info">
                          <div class=" panel-body">
                             
                    <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="roleId" class="col-lg-3 control-label" style="padding-top: 5px;"> Currency Icon</label>
                                <div class="col-lg-6">
                                {{ Form::text('icon',null, array('class'=>'form-control', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div> 
                   <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="password" class="col-lg-3 control-label" style="padding-top: 5px;"> Name</label>
                                <div class="col-lg-6">
                                {{ Form::text('name', null, array('class'=>'form-control', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div> 
                   <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="password" class="col-lg-3 control-label" style="padding-top: 5px;"> Description</label>
                                <div class="col-lg-6">
                                {{ Form::textarea('description', null, array('class'=>'form-control', 'rows'=>'3'))}}
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
