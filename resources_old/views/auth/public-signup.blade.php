@extends("layouts.auth_master")
@section("bodyContent") 

<div class="container-fluid bg-image">
    <div class="row">
        <div class="login-wraper">
            <img src="{{asset('images/login.jpg')}}" alt="">
            <div class="banner-text">
                <div class="line"></div>
                <div class="b-text">
                <span class="color-active">{{App\Global_var::getLangString('Get_millions_of_Tenders', $language_strings)}}</span>
                </div>
                <div class="overtext">
                    {{App\Global_var::getLangString('Over_1000_Tenders_uploaded_Daily', $language_strings)}}
                </div>
            </div>
            <div class="login-window" style="background: red">
                <div class="l-head">
                    {{App\Global_var::getLangString('Sign_Up', $language_strings)}}
                    <a class="pull-right" href="{{route('documents.playlist')}}" style="color: purple">{{App\Global_var::getLangString('Back_to_Home', $language_strings)}}</a>
                </div>
                <div class="l-form">

<form class="sign_up_post form-horizontal" method="POST" action="{{ route('register') }}">
                      <label class="nextUrl" nextUrl="{{route('public_login')}}" ></label>
                        {{ csrf_field() }}

                        <div class="form-group_" style="margin-bottom: 30px">
                            <label for="name" class="col-md-3 control-label">{{App\Global_var::getLangString('Business_Category', $language_strings)}}</label>

                            <div class="col-md-8">
                                {{ Form::select('businessCategoryId', [null=>'-- --']+$business_categories, null, array('class'=>'businessCategoryId select2_ form-control', 'required'=>'true'))}}
                                <span class="emailErr errorSpan" style="color: red"></span>
                            </div>
                        </div>
                        <!-- <br>
                        <div class="form-group_" style="margin-bottom: 30px">
                            <label class="col-md-3 control-label">{{App\Global_var::getLangString('Subscription_Plan', $language_strings)}}</label>
                            <div class="col-md-8">
                                {{ Form::select('subscriptionPlanId', [null=>'-- --']+$subscription_plans, null, array('class'=>'subscriptionPlanId select2 form-control', 'required'=>'true'))}}
                                <span class="firstNameErr errorSpan" style="color: red"></span>
                            </div>
                        </div> 
                        <br>
                        <div class="form-group_" style="margin-bottom: 30px">
                            <label class="col-md-3 control-label">{{App\Global_var::getLangString('Full_Name', $language_strings)}}</label>
                            <div class="col-md-8">
                                {{ Form::text('fullName', null, array('class'=>'form-control', 'required'=>'true'))}}
                                <span class="lastNameErr errorSpan" style="color: red"></span>
                            </div>
                        </div>-->
                        <br>
                        <div class="form-group_" style="margin-bottom: 30px">
                            <label class="col-md-3 control-label">{{App\Global_var::getLangString('Company_Name', $language_strings)}}</label>
                            <div class="col-md-8">
                                {{ Form::text('companyName', null, array('class'=>'form-control', 'required'=>'true'))}}
                                <span class="middleNameErr errorSpan" style="color: red"></span>
                            </div>
                        </div>
                        <!-- <br>
                        <div class="form-group_" style="margin-bottom: 30px">
                            <label class="col-md-3 control-label">{{App\Global_var::getLangString('Email', $language_strings)}}</label>
                            <div class="col-md-8">
                                {{ Form::email('email', null, array('class'=>'form-control', 'required'=>'true'))}}
                                <span class="phoneNumberErr errorSpan" style="color: red"></span>
                            </div>
                        </div> -->
                        <br>
                        <div class="form-group_" style="margin-bottom: 30px">
                            <label class="col-md-3 control-label">{{App\Global_var::getLangString('Phone_Number', $language_strings)}}</label>
                            <div class="col-md-8">
                                {{ Form::text('phoneNumber', null, array('class'=>'phoneNumber number form-control', 'required'=>'true'))}}
                                <span class="phoneNumberErr errorSpan" style="color: red"></span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group_" style="margin-bottom: 30px">
                            <label for="password" class="col-md-3 control-label">{{App\Global_var::getLangString('Password', $language_strings)}}</label>
                            <div class="col-md-8">
                                {{Form::password("password", ["class"=>"password signup_elem form-control", "autocomplete"=>"off"])}}
                                <span class="passwordErr errorSpan" style="color: red"></span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group_" style="margin-bottom: 30px">
                            <label for="confirmPassword" class="col-md-3 control-label">{{App\Global_var::getLangString('Confirm_Password', $language_strings)}}</label>
                            <div class="col-md-8">
                                {{Form::password("confirmPassword", ["class"=>"confirmPassword signup_elem form-control", "autocomplete"=>"off"])}}
                                <span class="confirmPasswordErr errorSpan" style="color: red"></span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-7"><button type="submit" class="btn btn-cv1">{{App\Global_var::getLangString('Register', $language_strings)}}</button></div>
                            <div class="col-lg-1 ortext">or</div>
                            <div class="col-lg-4 signuptext"><a href="{{route('public_login')}}">{{App\Global_var::getLangString('Log_In', $language_strings)}}</a></div>
                        </div>
                    </form>
<!-- 
                    <form action="signup.html">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="sample@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="**********">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Re-type Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="**********">
                        </div>
                        <div class="row">
                            <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Sign Up</button></div>
                            <div class="col-lg-1 ortext">or</div>
                            <div class="col-lg-4 signuptext"><a href="login.html">Log In</a></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 forgottext">
                                <a href="#">By clicking "Sign Up" I agree to circle's Terms of Service.</a>
                            </div>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>

@stop