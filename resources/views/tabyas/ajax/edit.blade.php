<div class="col-md-12">
  <div class="col-md-8">
   {!!Form::model($tabya, array("route"=>["tabyas.update", $tabya->id], "method"=>"POST", "class"=>"post"))!!}
   <label class="nextUrl" nextUrl="{{route('tabyas.index')}}" />
   <div class="panel panel-info">
    <div class="panel-heading">
      <h4> {{App\Global_var::getLangString('Tabya', $language_strings)}} {{App\Global_var::getLangString('Edit', $language_strings)}} 
       <a href="{{route('tabyas.index')}}" class="get btn btn-success btn-md pull-right" nextUrl="{{route('tabyas.index')}}"><i class="fa fa-eye"></i> <strong>{{App\Global_var::getLangString('List', $language_strings)}}</strong></a> </h4>
     </div>           
     <div class="panel-body">
      <div class="col-md-8" style="padding-top:5px;">
        <div class="col-md-12 form-group">
          <label class="col-md-4 control-label">{{App\Global_var::getLangString('Name', $language_strings)}}</label>
          <div class="col-md-8">
          {{ Form::text('name', null, array('class'=>'form-control', 'required'=>'true'))}}
          </div>
        </div>

        <div class="col-md-12 form-group">
           <label class="col-md-4 control-label">{{App\Global_var::getLangString('Region', $language_strings)}}</label>
           <div class="col-md-8">
            {!! Form::select('regionId', [''=>'']+$regions,null, array('class'=>'select2 form-control regionId'));!!}
          </div>
        </div>

        <div class="col-md-12 form-group">
           <label class="col-md-4 control-label">{{App\Global_var::getLangString('Zone', $language_strings)}}</label>
           <div class="col-md-8">
            {!! Form::select('zoneId', [''=>'']+$zones,null, array('class'=>'select2 form-control zoneId'));!!}
          </div>
        </div>

        <div class="col-md-12 form-group">
           <label class="col-md-4 control-label">{{App\Global_var::getLangString('Wereda', $language_strings)}}</label>
           <div class="col-md-8">
            {!! Form::select('weredaId', [''=>'']+$weredas,null, array('class'=>'select2 form-control weredaId'));!!}
          </div>
        </div>

        <div class="col-md-12 form-group">
           <label class="col-md-4 control-label"> {{App\Global_var::getLangString('Remark', $language_strings)}}</label>
           <div class="form-group col-md-8">
            {{ Form::textarea('remark', null, array('class'=>'form-control', 'rows'=>'3'))}}
          </div>
        </div>

        <div class="col-md-12 form-group text-center">
            <div class="col-md-8 col-md-offset-4">
              <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-save"></i> 
              {!! App\Global_var::getLangString('Update', $language_strings) !!}
            </button>
            </div>
         </div>

     </div> 
</div> 


</div>
{!!Form::close()!!}
</div>
</div>


