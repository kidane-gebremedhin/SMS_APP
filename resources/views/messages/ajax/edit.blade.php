<div class="col-md-12">
  <div class="col-md-8">
    {{Form::model($department, array("route"=>["departments.update", $department->id], "method"=>"POST", "class"=>"post"))}}
    <label class="nextUrl" nextUrl="{{route('departments.index')}}" />
    <div class="panel panel-success">
      <div class="panel-heading"> 
        {{App\Global_var::getLangString('Edit_Crime_Type', $language_strings)}}
        <a href="{{route('departments.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('departments.index')}}"><i class="fa fa-eye"></i> 
          {{App\Global_var::getLangString('List', $language_strings)}}
        </a>  
      </div>
      <div class="panel-body">
        <div class="col-md-10" style="padding-top:15px;">
          <div class="col-md-10 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Name', $language_strings)}}          
            </label>
            <div class="col-md-8">
              {{ Form::text('name', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-10 form-group">
            <label class="col-md-4 control-label"> 
              {{App\Global_var::getLangString('Remark', $language_strings)}}
            </label>
            <div class="form-group col-md-8">
              {!! Form::textarea('remark', null, array('class'=>'form-control', 'rows'=>'3'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group text-center">
            <button type="submit" class="btn btn-primary btn-sm">
              <i class="fa fa-save"></i> 
              {{App\Global_var::getLangString('Update', $language_strings)}}
            </button>
          </div>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>


