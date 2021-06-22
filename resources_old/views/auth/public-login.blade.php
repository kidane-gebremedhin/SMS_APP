@extends("layouts.auth_master")
@section("bodyContent") 

<div class="container-fluid bg-image">
    <div class="row">
        <div class="login-wraper">
            <img src="images/login.jpg" alt="">
            <div class="banner-text">
                <div class="line"></div>
                <div class="b-text">
                   <span class="color-active">{{App\Global_var::getLangString('Get_millions_of_Tenders', $language_strings)}}</span>
                </div>
                <!-- <div class="overtext">
                    Over 6000 videos uploaded Daily.
                </div> -->
            </div>
            <div class="login-window">
                <div class="l-head">
                    {{App\Global_var::getLangString('Log_In', $language_strings)}}
                    <a class="pull-right" href="{{route('documents.playlist')}}" style="color: purple">{{App\Global_var::getLangString('Back_to_Home', $language_strings)}}</a>

                </div>
                <div class="l-form">
               {!!Form::model(array( url('/login') , "method"=>"POST", "class"=>"post_"))!!}
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{App\Global_var::getLangString('Phone_Number', $language_strings)}}/{{App\Global_var::getLangString('Email', $language_strings)}}</label>
                            <input name="email" type="text" class="form-control" id="exampleInputEmail1"  autofocus="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{App\Global_var::getLangString('Password', $language_strings)}}</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="row">
                            <div class="col-lg-7"><button type="submit" class="btn btn-cv1"> {{App\Global_var::getLangString('Log_In', $language_strings)}}</button></div>
                            <div class="col-lg-1 ortext">or</div>
                            <div class="col-lg-4 signuptext">
                            <a href="{{route('sign_up')}}">  {{App\Global_var::getLangString('Sign_Up', $language_strings)}}</a></div>
                        </div>
                {{Form::close()}}

                        <div class="row">
                            <div class="col-lg-12 forgottext">
                            <a href="{{ url('/password/reset') }}"></i> {{App\Global_var::getLangString('Forgot_Password', $language_strings)}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
