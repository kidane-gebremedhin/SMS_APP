<div class="col-md-12">
  <div class="col-md-10">
    {{Form::model($school_teacher_acceptance_capacity, array("route"=>["school_teacher_acceptance_capacities.update", $school_teacher_acceptance_capacity->id], "method"=>"POST", "class"=>"post"))}}
    <label class="nextUrl" nextUrl="{{route('school_teacher_acceptance_capacities.index')}}" />
    <div class="panel panel-success">
      <div class="panel-heading"> 
        {{App\Global_var::getLangString('Edit_school_teacher_acceptance_capacity', $language_strings)}}
        @if($currentUser->isGranted('school_teacher_acceptance_capacities.index'))
        <a href="{{route('school_teacher_acceptance_capacities.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('school_teacher_acceptance_capacities.index')}}"><i class="fa fa-eye"></i> 
          {{App\Global_var::getLangString('List', $language_strings)}}
        </a>  
      @endif
      </div>
      <div class="panel-body">
        <div class="col-md-12" style="padding-top:15px;">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Round', $language_strings) !!}
            </label>
            <div class="col-md-8">
            {!! Form::select('roundId', [null=>'-- --']+$rounds,null, array('class'=>'select2 form-control roundId', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Request_Type', $language_strings) !!}
            </label>
            <div class="col-md-8">
            {!! Form::select('requestTypeId', [null=>'-- --']+$request_types,null, array('class'=>'select2 form-control requestTypeId', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('School', $language_strings) !!}
            </label>
            <div class="col-md-8">
            {!! Form::select('schoolId', [null=>'-- --']+$schools,$currentUser->schoolId, array('class'=>'select2 form-control schoolId', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Educational_Level', $language_strings) !!}
            </label>
            <div class="col-md-8">
            {!! Form::select('educationalLevelId', [null=>'-- --']+$educational_levels,null, array('class'=>'select2 form-control educationalLevelId', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Subject', $language_strings) !!}
            </label>
            <div class="col-md-8">
            {!! Form::select('subjectId', [null=>'-- --']+$subjects,null, array('class'=>'select2 form-control subjectId', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Quantity', $language_strings) !!}
            </label>
            <div class="col-md-8">
            {!! Form::number('quantity', null, array('class'=>'form-control quantity', 'min'=>1, 'required'=>'true'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="col-md-4 control-label"> 
              {!! App\Global_var::getLangString('Description', $language_strings) !!}
            </label>
            <div class="form-group col-md-8">
              {!! Form::textarea('remark', null, array('class'=>' form-control', 'rows'=>'3'));!!}
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
    {{Form::close()}}
  </div>
</div>


