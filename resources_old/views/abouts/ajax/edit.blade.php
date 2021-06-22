<div class="row">
<div class="col-md-8 col-md-offset-2">

    <div class="row">
    <br><br><br>
      <a href="{{route('abouts.index')}}" class="abouts-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i><strong> View all abouts</strong></a> 
      <h4 class="modal-title" id="myModalLabel2">    <h3>about Id: {{$about!=null? $about->id: "invalid about"}} edit page</h3>
</h4>
    </div>

  {!!Form::model($about, array("route"=>["abouts.update", $about->id], "method"=>"POST", "class"=>"abouts-edit-submit"))!!}
          <div class="col-md-12 panel panel-info">
                          <div class=" panel-body">
                             
                   <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-3 control-label" style="padding-top: 5px;"> About Title</label>
                                <div class="col-lg-8">
                                {{ Form::text('title', null, array('class'=>'form-control', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div> 
                   <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-3 control-label" style="padding-top: 5px;"> Body</label>
                                <div class="col-lg-8">
                                {{ Form::textarea('body', null, array('class'=>'form-control', 'rows'=>'5', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                             <div class="form-group">
                                <br><label class="col-lg-3 control-label" style="padding-top: 5px;"> </label>
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
















