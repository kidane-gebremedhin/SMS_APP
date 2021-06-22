@extends("layouts.auth_master-old")
@section("bodyContent") 
  <div id="container" class="col-md-12" style="margin-top: -30px;//40px">
    <div class="text-center">
      <img class="text-center" src="{{asset('images/'.$logo->backgroundImage)}}" alt="Logo" style="height: 150px; width: 150px; border-radius: 50%;padding-bottom: 2px;">
    </div>
      <div class="col-md-12">
    <h3 style="font-family: algerian; color: orange"> <center>{{App\Global_var::getLangString($logo!=null? $logo->logoText :'SMS-APP', $language_strings)}}</center> </h3>
  </div>
<div class="login-box" style="margin-top:50px; ">
<div class="panel panel-success">
<div class="panel-heading">
  {{App\Global_var::getLangString('Sign_In', $language_strings)}}
 {{-- <a href="{{route('welcome')}}" class="pull-right" style="color: black"> {{App\Global_var::getLangString('Visit_Site', $language_strings)}} <b class="fa fa-globe"></b></a> --}}
</div>
<div class="panel-body">
  <div class="login-box-body">
    <p class="login-box-msg" style="margin-top: -30px;">
               {!!Form::model(array( url('/login') , "method"=>"POST", "class"=>"post_"))!!}
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{App\Global_var::getLangString('Username', $language_strings)}}/{{App\Global_var::getLangString('Email', $language_strings)}}</label>
                            <input name="email" type="text" class="form-control" id="exampleInputEmail1"  autofocus="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{App\Global_var::getLangString('Password', $language_strings)}}</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><button type="submit" class="btn btn-success btn-block"> {{App\Global_var::getLangString('Log_In', $language_strings)}}</button></div>
                            <!-- <div class="col-lg-1 ortext">or</div>
                            <div class="col-lg-4 signuptext">
                            <a href="{{route('sign_up')}}">  {{App\Global_var::getLangString('Sign_Up', $language_strings)}}</a></div> -->
                        </div>
                {{Form::close()}}
  </div>
<!--   <div class="social-auth-links text-center">
      {{App\Global_var::getLangString('Have_not_you_an_account', $language_strings)}}? <a href="{{url('register')}}">  {{App\Global_var::getLangString('Sign_Up', $language_strings)}}</a>
    </div>
    <div class="social-auth-links text-center">
      <a href="{{ url('/password/reset') }}"></i> {{App\Global_var::getLangString('Forgot_Password', $language_strings)}}</a>
    </div> -->
  </div>
  </div>

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>
@stop
