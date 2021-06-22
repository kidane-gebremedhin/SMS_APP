<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- New metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

  <?php $logoImage=App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logoImage:''; ?>
    <link rel="icon" type="image/png" href="{{asset('images/'.$logoImage)}}" sizes="32x32" />

  <title>{{App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logoText:''}}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css')}}"> -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/fonts/font-awesome/css/font-awesome.css')}}">

</head>
<!-- <body class="hold-transition login-page"> -->
<?php $backgroundImage=App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->backgroundImage:''; ?>
<body {{--style="background-image:url({{asset('images/'.$backgroundImage)}}); background-repeat:no-repeat; background-size: cover;"--}}>
<!-- @if(!\App\Global_var::isChrome())
    <div id="message-error-displayer" style="margin-top: 30px">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
           <strong id="message-error">{{App\Global_var::getLangString('This_System_Is_Fully_Supported_in_Chrome', $language_strings)}}</strong>
          </div>
    </div>
@endif
 -->
<!-- The Modal -->
<div id="waitingModal" class="modal" style="z-index: 101">
<span class="close pull-right" style="color: red; position: fixed;top:200px; right: 10px">X</span>
  <!-- Modal content -->
  <div class="">
    <div class="">
     <div class="col-md-12">
                <div class="loading-image col-md-4 col-md-offset-4" style=" display: none; position: relative; top: 250px;">
                      <center><img src="{{asset('images/GIF/ajax-loader2.gif')}}" alt="Gif not found" style="height: 40px; width: 40px" /><!-- <h4 style="color: ">Loading</h4> --></center>
                  </div>                
              </div>     

    </div>
  </div>
</div>
<!-- End of Modal 1 -->

<div class="col-md-12" style="height: 50px;">
 <div class="messageArea" style="position: fixed; top: 80px; width: 90%; z-index: 99; display: none;" >
    <div class="col-md-12" style="height:50px">
    <div id="validation-error-message-displayer" style="display: none; height: 50px;">
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h3 class='text-warnning'>Operation Failed </h3>
                   <strong id="validation-error-message"></strong>
          </div>
          </div>
       <div id="message-success-displayer" style="display: none">
        <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   <strong id="message-success"></strong>
          </div>
          </div>
          <div id="message-error-displayer" style="display: none">
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   <strong id="message-error"></strong>
                  </div>
            </div>
       </div>
  </div>

<div class="sessionMessageArea col-md-12" style="position: relative; width: 100%; top:20px; height:50px; z-index: 99; display: block;">
 @if (Session::has('danger'))
<div class="alert alert-danger">{{ Session::get('danger') }}</div>
@elseif (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
<div class="col-md-8 col-md-offset-2">
@if ($errors->any())
        <div class="alert alert-danger">
        {!! implode('', $errors->all('<div style="color: white;">:message</div>')) !!}
        </div>
@endif
 </div>
 </div>

</div>

    @yield('bodyContent')

<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
@include("_Script._myScript")

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

