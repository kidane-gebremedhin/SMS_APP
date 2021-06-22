<div class="col-md-12">
  <div class="col-md-offset-2 col-md-8">
    {{Form::open(array("route"=>"messages.store", "method"=>"POST", "class"=>"post"))}}
    <label class="nextUrl" nextUrl="{{route('messages.outbox', $currentUser->id)}}" />
    <div class="panel panel-success">
      <div class="panel-heading">
        {{App\Global_var::getLangString('Create_New_Message', $language_strings)}}
        <a href="{{route('messages.outbox', $currentUser->id)}}" class="get pull-right" nextUrl="{{route('messages.outbox', $currentUser->id)}}"><i class="fa fa-eye"></i>  
          {{App\Global_var::getLangString('View_Messages', $language_strings)}}
        </a> 
      </div>
      <div class="panel-body">
        <div class="col-md-12" style="padding-top:15px;">
          <div class="col-md-10 form-group">
            <label class="col-md-4 control-label"> 
             {{App\Global_var::getLangString('Subject', $language_strings)}}
            </label>
            <div class="form-group col-md-8">
              {{ Form::text('subject', null, array('class'=>'form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-10 form-group">
            <label class="col-md-4 control-label"> 
              {{App\Global_var::getLangString('Message_Body', $language_strings)}}
            </label>
            <div class="form-group col-md-8">
              {!! Form::textarea('body', null, array('class'=>'form-control', 'rows'=>'3', 'required'=>'true'));!!}
            </div>
          </div>
          <div class="col-md-10 form-group">
            <label class="col-md-4 control-label"> 
              {{App\Global_var::getLangString('Receipents:', $language_strings)}}
            </label>
            <div class="form-group col-md-8">
              {{ Form::select('userIds[]', $users, null, array('class'=>'select2 form-control', 'multiple'=>'multiple', 'required'=>'true'))}}
            </div>
          </div>

          <div class="col-md-10 form-group">
            <label class="col-md-4 control-label"> 
            </label>
            <div class="form-group col-md-8">
              <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-send"></i> 
              {{App\Global_var::getLangString('Send', $language_strings)}}
            </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>


