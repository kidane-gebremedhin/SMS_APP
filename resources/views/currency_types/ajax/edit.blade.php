<div class="row">
<div class="col-md-8 col-md-offset-2">

    <div class="row">
    <br><br><br>
      <a href="{{route('currency_types.index')}}" class="currency_types-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i><strong> View all currency types</strong></a> 
      <h4 class="modal-title" id="myModalLabel2">    <h3>currency_typeId: {{$currency_type!=null? $currency_type->id: "invalid currency_type"}} edit page</h3>
</h4>
    </div>

  {!!Form::model($currency_type, array("route"=>["currency_types.update", $currency_type->id], "method"=>"POST", "class"=>"currency_types-edit-submit"))!!}
          <div class="col-md-12 panel panel-info">
              <div class="panel-body">
                    <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-4 control-label" style="padding-top: 5px;"> Icon</label>
                                <div class="col-lg-8">
                                {{ Form::text('icon', null, array('class'=>'form-control', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div> 
                    <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-4 control-label" style="padding-top: 5px;"> Name</label>
                                <div class="col-lg-8">
                                {{ Form::text('name', null, array('class'=>'form-control', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div> 
                   <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="email" class="col-lg-4 control-label" style="padding-top: 5px;"> Description</label>
                                <div class="col-lg-8">
                                {{ Form::textarea('description', null, array('class'=>'form-control', 'rows'=>'3'))}}
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                             <div class="form-group">
                                <br><label class="col-lg-4 control-label" style="padding-top: 5px;"> </label>
                                <div class="col-lg-8">
                                <br>
                                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                </div>
                            </div>
                        </div> 
  </div>
</div>
{{Form::close()}}

                          <div class="modal-footer row">
                          
                              edit page
                          
                         </div>                              

  </div>
  </div>
















