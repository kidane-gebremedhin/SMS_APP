<div class="col-md-12">
  <div class="col-md-10">
   {!!Form::model($school, array("route"=>["schools.update", $school->id], "method"=>"POST", "class"=>"post"))!!}
   <label class="nextUrl" nextUrl="{{route('schools.index')}}" />
   <div class="panel panel-success">
    <div class="panel-heading">
     <h4> {{App\Global_var::getLangString('Edit_School', $language_strings)}} 
       <a href="{{route('schools.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('schools.index')}}"><i class="fa fa-eye"></i> <strong>{{App\Global_var::getLangString('List', $language_strings)}}</strong></a> </h4>
     </div>           
     <div class="panel-body">
      <div class="col-md-12" style="padding-top:15px;">
        <div class="col-md-12 form-group" style="display: {{$currentUser->isRegion() || $currentUser->isZone() || $currentUser->isWereda() || $currentUser->isSchool()? 'none': 'block'}}">
           <label class="label-control col-md-4">{{App\Global_var::getLangString('Region', $language_strings)}}</label>
           <div class="col-md-8">
            {!! Form::select('regionId', $regions,$currentUser->regionId, array('class'=>'select2 form-control regionId'));!!}
          </div>
        </div>
        <div class="col-md-12 form-group" style="display: {{$currentUser->isZone() || $currentUser->isWereda() || $currentUser->isSchool()? 'none': 'block'}}">
           <label class="label-control col-md-4">{{App\Global_var::getLangString('Zone', $language_strings)}}</label>
           <div class="col-md-8">
            {!! Form::select('zoneId', [''=>'']+$zones,$currentUser->zoneId, array('class'=>'select2 form-control zoneId'));!!}
          </div>
        </div>
        <div class="col-md-12 form-group" style="display: {{$currentUser->isWereda() || $currentUser->isSchool()? 'none': 'block'}}">
           <label class="label-control col-md-4">{{App\Global_var::getLangString('Wereda', $language_strings)}}</label>
           <div class="col-md-8">
            {!! Form::select('weredaId', [''=>'']+$weredas,$currentUser->weredaId, array('class'=>'select2 form-control weredaId'));!!}
          </div>
        </div>
        <div class="col-md-12 form-group">
         <label class="label-control col-md-4">{{App\Global_var::getLangString('Name', $language_strings)}}</label>
         <div class="col-md-8">
           {{ Form::text('name', null, array('class'=>'form-control', 'required'=>'true'))}}
         </div>
       </div>
       <div class="col-md-12 form-group">
         <label class="label-control col-md-4">{{App\Global_var::getLangString('Principal', $language_strings)}}</label>
         <div class="col-md-8">
           {{ Form::text('principal', null, array('class'=>'form-control'))}}
         </div>
       </div>
       <div class="col-md-12 form-group">
         <label class="label-control col-md-4">{{App\Global_var::getLangString('Phone_Number', $language_strings)}}</label>
         <div class="col-md-8">
           {{ Form::text('phoneNumber', null, array('class'=>'number phoneNumber form-control'))}}
         </div>
       </div>
       <div class="col-md-12 form-group">
         <label class="label-control col-md-4">{{App\Global_var::getLangString('Email', $language_strings)}}</label>
         <div class="col-md-8">
           {{ Form::email('email', null, array('class'=>'form-control'))}}
         </div>
       </div>
       <div class="col-md-12 form-group">
         <label class="label-control col-md-4"></label>
         <div class="col-md-8">
            <input name="isEthinic" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox" type="checkbox" {{$school->isEthinic=='true'? 'checked':''}}> <label>{{App\Global_var::getLangString('Ethinic', $language_strings)}}</label>
         </div>
       </div>
       <div class="col-md-12 form-group">
         <label class="label-control col-md-4">{{App\Global_var::getLangString('Description', $language_strings)}}</label>
         <div class="col-md-8">
           {!! Form::textarea('remark', null, array('class'=>' form-control', 'rows'=>'3', 'id'=>'remark'));!!}
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


</div>
{!!Form::close()!!}
</div>
</div>


