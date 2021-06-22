<div class="col-md-12" style="padding-top:30px;">
	  <div class="col-md-8 col-md-offset-2">
	{{Form::open(array("route"=>"regions.store", "method"=>"POST", "class"=>"post"))}}
  <label class="nextUrl" nextUrl="{{route('regions.index')}}" />
 	     <div class="panel panel-success">
          <div class="panel-heading">
         <h4>
         {{App\Global_var::getLangString('Create_New_Region', $language_strings)}}
          <a href="{{route('regions.index')}}" class="get btn btn-success btn-md pull-right" nextUrl="{{route('regions.index')}}"><i class="fa fa-eye"></i> 
          <strong>{{App\Global_var::getLangString('List', $language_strings)}} </strong></a> </h4>
          </div>
                <div class="panel-body">
                    <div class="col-md-12" style="padding-top:15px;">
                      <div class="col-md-10 form-group">
                                     <label class="label-control col-md-4">{{App\Global_var::getLangString('Country', $language_strings)}}</label>
                                     <div class="col-md-8">
                                      {!! Form::select('countryId', [''=>'']+$countries,null, array('class'=>'select2 form-control countryId'));!!}
                                     </div>
                                 </div>
                      </div>
                    <div class="col-md-12" style="padding-top:15px;">
                      <div class="col-md-10 form-group">
                                     <label class="label-control col-md-4">{{App\Global_var::getLangString('Name', $language_strings)}}</label>
                                     <div class="col-md-8">
                                       {{ Form::text('name', null, array('class'=>'form-control', 'required'=>'true'))}}
                                     </div>
                                 </div>
                      </div>
                      <div class="col-md-12" style="padding-top:15px;">
                          <div class="col-md-10 form-group">
                                 <label class="col-md-4 control-label"> {{App\Global_var::getLangString('Description', $language_strings)}}</label>
                                  <div class="form-group col-md-8">
                                     {!! Form::textarea('remark', null, array('class'=>'form-control', 'rows'=>'3', 'id'=>'remark'));!!}
                                  </div>
                            </div>
                                 
                          </div>
                          <div class="col-md-12 form-group text-center">
                           <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-success btn-block">
                            <i class="fa fa-save"></i> 
                            {!! App\Global_var::getLangString('Save', $language_strings) !!}
                          </button>
                          </div>
                        </div>
            </div>
           
                      

                        </div>
                {{Form::close()}}
                        </div>
                        </div>


