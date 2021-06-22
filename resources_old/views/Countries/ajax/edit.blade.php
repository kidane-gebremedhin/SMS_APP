<div class="col-md-12">
  <div class="col-md-8 ">
   {!!Form::model($country, array("route"=>["countries.update", $country->id], "method"=>"POST", "class"=>"post"))!!}
   <label class="nextUrl" nextUrl="{{route('countries.index')}}" />
   <div class="col-md-12 panel panel-success">
    <div class="panel-heading">
     <h4> {{App\Global_var::getLangString('Country', $language_strings)}} {{App\Global_var::getLangString('Edit', $language_strings)}} 
       <a href="{{route('countries.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('countries.index')}}"><i class="fa fa-eye"></i> <strong>{{App\Global_var::getLangString('List', $language_strings)}}</strong></a> </h4>
     </div>           
     <div class="panel-body">
      <div class="row" style="padding-top:15px;">
        <div class="col-md-10 form-group">
         <label class="col-md-4 control-label">{{App\Global_var::getLangString('Name', $language_strings)}}</label>
         <div class="col-md-8">
           {{ Form::text('name', null, array('class'=>'form-control', 'required'=>'true'))}}
         </div>
       </div>
     
      <div class="col-md-10 form-group">
       <label class="col-md-4 control-label"> {{App\Global_var::getLangString('Remark', $language_strings)}}</label>
       <div class="form-group col-md-8">
        {{ Form::textarea('remark', null, array('class'=>'form-control', 'rows'=>'3'))}}
      </div>
    </div>

  </div>
</div>
<div class="row" style="padding-top:30px;">
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
{!!Form::close()!!}
</div>
</div>


