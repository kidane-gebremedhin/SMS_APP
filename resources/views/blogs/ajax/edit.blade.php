<div class="col-md-12">
  <div class="col-md-8 col-md-offset-2">
    <div class="row">
      <br><br><br>
        <a href="{{route('blogs.index')}}" class="blogs-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i><strong> View all blogs</strong></a> 
        <h4 class="modal-title" id="myModalLabel2">    <h3>blog Id: {{$blog!=null? $blog->id: "invalid blog"}} edit page</h3>
      </h4>
  </div>
  </div>
  </div>
<div class="col-md-12">
  <div class="col-md-10 col-md-offset-1">
  {!!Form::model($blog, array("route"=>["blogs.update", $blog->id], "method"=>"POST", 'files'=>'true', "class"=>"blogs-edit-submit"))!!}
          <div class="col-md-12 panel panel-info">
                          <div class=" panel-body">
                             
                   <div class="col-lg-12">
                             <div class="form-group">
                                <br><label for="name" class="col-lg-3 control-label" style="padding-top: 5px;"> Blog Title</label>
                                <div class="col-lg-8">
                                {{ Form::text('title', null, array('class'=>'form-control', 'required'=>'true'))}}<br>
                                </div>
                            </div>
                        </div> 
              <div class="col-lg-12">
                       <div class="form-group">
                          <br><label for="name" class="col-lg-3 control-label" style="padding-top: 5px;"> Featured Image</label>
                          <div class="col-lg-4">
                           {{ Form::file('image')}}<br>
                          </div>
                          <div class="col-lg-4">
                    <img src="{{asset('images/blogs/'.$blog->image)}}" style="width: 60%; border: 2px solid gray;">
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
















