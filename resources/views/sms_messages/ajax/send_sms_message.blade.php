<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-10 panel panel-success">
      <h4>
        {{App\Global_var::getLangString('Send_SMS_Message', $language_strings)}}
	<a class="get btn btn-success btn-sm navbar-right" href="{{route('sent_sms_messages')}}" nextUrl="{{route('send_sms')}}"><i class="fa fa-eye"></i> {{App\Global_var::getLangString('Sent_Messages', $language_strings)}}</a>
 <a href="{{route('read_sms')}}" class="get btn btn-sm btn-warning pull-right" style="margin-left:20px; margin-right: 20px;"><i class="fa fa-eye"></i> {{App\Global_var::getLangString('Read_SMS', $language_strings)}}</a>
     </h4>
     
<div class="col-md-6 col-md-offset-3">
<br>
{{Form::open(array('route'=>'sendSMS', 'method'=>'POST', "class"=>"post smsForm"))}}
<div class="row form-group">
<label class="label-control col-md-4">
{!! App\Global_var::getLangString('Category', $language_strings) !!}
</label>
<div class="col-md-8">
{{ Form::select('categoryIds[]', $recipient_categories->pluck('name', 'id')->toArray(), null, array('class'=>'select2 form-control categoryId', 'multiple'=>'multiple')) }}
</div>
</div>
<div class="col-md-8 col-md-offset-4">
<input name="sendToAllCategories" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini" class="checkbox sendToAllCategories" type="checkbox"> <label>{!! App\Global_var::getLangString('Send_to_All_Categories', $language_strings) !!}</label>
</div>
<div class="phoneNumberDiv row form-group">{{Form::text('phoneNumber', null, array('class'=>'form-control phoneNumber', 'placeholder'=>App\Global_var::getLangString('Phone_Number', $language_strings)))}}
</div>
<br>
<label class="label-control col-md-12"><span style="color: green" class="characterCountLb">0</span> {{ App\Global_var::getLangString('Characters_Count', $language_strings) }}</label>
{{Form::textarea('message', null, array('class'=>'messageTextArea form-control', 'required'=>'true', 'placeholder'=>App\Global_var::getLangString('Message', $language_strings)))}}
<br>
<div class="col-md-12 form-group">
<label class="col-md-offset-0 errorMessageLb label-control col-md-12" style="color: red">
</label>
</div>
<button type="submit" class="sendSmsBtn btn btn-success pull-right"><i class="fa fa-send"></i> {{App\Global_var::getLangString('Send', $language_strings)}}</button>
{{Form::close()}}
</div>
    </div>
  </div>
  <div class="col-md-8">
  </div>
</div>
