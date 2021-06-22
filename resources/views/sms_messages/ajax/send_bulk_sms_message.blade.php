<div class="searchResultDiv">
  <div class="col-md-12 searchUrl" searchUrl="{{route('send_bulk_sms')}}">
    <div class="col-md-10 panel panel-success">
      <h4>
        {{App\Global_var::getLangString('Send_SMS_Message', $language_strings)}} {{App\Global_var::getLangString('Round', $language_strings)}} <u>{{$round!=null? $round->name:''}}</u>
	<a class="get btn btn-success btn-sm navbar-right" href="{{route('sent_bulk_sms_messages')}}" nextUrl="{{route('sent_bulk_sms_messages')}}"><i class="fa fa-eye"></i> {{App\Global_var::getLangString('Sent_Messages', $language_strings)}}</a>
 <a href="{{route('read_sms')}}" class="get btn btn-sm btn-warning pull-right" style="margin-left:20px; margin-right: 20px;"><i class="fa fa-eye"></i> {{App\Global_var::getLangString('Read_SMS', $language_strings)}}</a>
     </h4>

<div class="col-md-12"><hr></div>     

<div class="col-md-12">
<div class="col-md-12">
<label class="col-md-4">
    <strong class="pull-right">{{ App\Global_var::getLangString('Round', $language_strings) }}</strong> 
    </label>
    <div class="col-md-8">  {!!  Form::select('roundId', [null=>'-- --']+$rounds->pluck('name', 'id')->toArray(), $round!=null? $round->id: null, array('class'=>'sms_roundId select2 form-control')) !!}
    </div>
</div>
<div class="col-md-12"><hr></div>  
{{Form::open(array('route'=>'send_bulk_sms', 'method'=>'POST', "class"=>"post_"))}}

<div class="col-md-12 form-group">
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
<div class="col-md-12 form-group">
<label class="label-control col-md-8 col-md-offset-4"><span style="color: green" class="characterCountLb">{{mb_strlen($message, "UTF-8")}}</span> {{ App\Global_var::getLangString('Characters_Count', $language_strings) }}</label>
<label class="label-control col-md-4">
{!! App\Global_var::getLangString('Message', $language_strings) !!}
</label>
<div class="col-md-8">
{{Form::textarea('message', $message, array('class'=>'messageTextArea form-control', 'required'=>'true', 'placeholder'=>App\Global_var::getLangString('Message', $language_strings)))}}
</div>
</div>
<div class="col-md-12 form-group">
<label class="col-md-offset-4 errorMessageLb label-control col-md-12" style="color: red">
</label>
</div>
<div class="col-md-12 form-group">
<label class="label-control col-md-4">
</label>
<div class="col-md-8">
<button type="submit" class="sendSmsBtn btn btn-success btn-block"><i class="fa fa-send"></i> {{App\Global_var::getLangString('Send', $language_strings)}}</button>
</div>
</div>

{{Form::close()}}
</div>
    </div>
  </div>
  <div class="col-md-8">
  </div>
</div>
