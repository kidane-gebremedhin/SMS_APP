<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{asset('images/'.$logo->logoImage)}}" sizes="32x32" />

    <title>{{App\Global_var::getLangString($logo!=null? $logo->logoText :'System', $language_strings)}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('circle_video_sharing/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- player -->
    <link rel="stylesheet" href="{{asset('circle_video_sharing/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelementplayer.min.css')}}" />

    <!-- Theme CSS -->
    <link href="{{asset('circle_video_sharing/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('circle_video_sharing/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('circle_video_sharing/css/font-circle-video.css')}}" rel="stylesheet">

    <link href="{{ asset('css/tinymce/css/select2.min.css')}}" rel="stylesheet" >

    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
    <!-- Docs styles -->
<!--     <link rel="stylesheet" href="{{asset('dist/demo.css')}}" /> -->

<script src="{{asset('circle_video_sharing/js/jquery.min.js')}}"></script>
<script src="{{asset('circle_video_sharing/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- JPlayer -->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="{{ asset('jPlayer/dist/skin/pink.flag/css/jplayer.pink.flag.min.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{ asset('jPlayer/dist/jplayer/jquery.jplayer.min.js')}}"></script>
<!-- end of Jplayer -->
</head>

<body class="single-video light">
<!-- logo, menu, search, avatar -->
<div class="container-fluid">
   @if(!Request::is('login') && !Request::is('public-login') && !Request::is('sign_up'))
    <div class="row">
        <div class="navbar-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        @if(!$currentUser->isPublic())
                        <a href="{{route('home')}}"> 
                        <h3 style="font-family: georgia; color: black"> 
                        <i class="fa fa-dashboard" style="color: orange"></i> {{App\Global_var::getLangString('Dashboard', $language_strings)}} 
                        </h3>
                        </a>
                    @endif
                    </div>
                    <div class="col-md-9">
                    <a href="{{route(!$currentUser->isPublic()? 'home':'welcome')}}"> 
                    <h3 style="font-family: algerian; color: orange;"> {{App\Global_var::getLangString($logo!=null? $logo->logoText :'System', $language_strings)}}
                    </h3>
                    </a>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-lg-1">
                    <a class="navbar-brand" href="{{route(!$currentUser->isPublic()? 'home':'welcome')}}"><img src="{{asset('images/'.$logo->logoImage)}}" alt="Project name" class="logo" style="background-color: green; border-radius: 50%; height: 60px; width: 60px; "/></a>
                    </div> -->
                    <div class="col-lg-11"  style="margin-top: 20px">
                    <div class="col-md-2">
                    <label class="col-md-12"><span class="pull-right_">{{App\Global_var::getLangString('Category', $language_strings)}}</span></label>
                     {!! Form::select('businessCategoryId', [null=>App\Global_var::getLangString('Category', $language_strings)]+$business_categories, null, array('class'=>'select2 form-control document_search_select_elem businessCategoryId'));!!}
                    </div>
                    <div class="col-md-6">
                    <div class="col-md-12">
                    <div class="col-md-3">
                    <label class="col-md-12"><span class="pull-right_">{{App\Global_var::getLangString('Country', $language_strings)}}</span></label>
                     {!! Form::select('countryId', [null=>App\Global_var::getLangString('Country', $language_strings)]+$countries, null, array('class'=>'select2 form-control document_search_select_elem countryId'));!!}
                    </div>
                    <div class="col-md-3">
                    <label class="col-md-12"><span class="pull-right_">{{App\Global_var::getLangString('Region', $language_strings)}}</span></label>
                     {!! Form::select('regionId', [null=>App\Global_var::getLangString('Region', $language_strings)]+$regions, null, array('class'=>'select2 form-control document_search_select_elem regionId'));!!}
                    </div>
                    <div class="col-md-3">
                    <label class="col-md-12"><span class="pull-right_">{{App\Global_var::getLangString('Zone', $language_strings)}}</span></label>
                     {!! Form::select('zoneId', [null=>App\Global_var::getLangString('Zone', $language_strings)]+$zones, null, array('class'=>'select2 form-control document_search_select_elem zoneId'));!!}
                    </div>
                    <div class="col-md-3">
                    <label class="col-md-12"><span class="pull-right_">{{App\Global_var::getLangString('Wereda', $language_strings)}}</span></label>
                     {!! Form::select('weredaId', [null=>App\Global_var::getLangString('Wereda', $language_strings)]+$weredas, null, array('class'=>'select2 form-control document_search_select_elem weredaId'));!!}
                    </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-6">
                            <label class="col-md-12"><small class="pull-right_">{{App\Global_var::getLangString('Opening_Date', $language_strings)}}</small></label>
                            <div class="row">
                            <div class="col-md-12">
                                {{ Form::text('startDate', null, array('class'=>'startDate document_search_select_elem eth_date form-control_', 'placeholder'=>'dd/mm/yyyy'))}}
                            </div>
                            </div>
                          </div>
                        <div class="col-md-6">
                            <label class="col-md-12"><small class="pull-right_">{{App\Global_var::getLangString('Closing_Date', $language_strings)}}</small></label>
                            <div class="row">
                            <div class="col-md-12">
                                {{ Form::text('endDate', null, array('class'=>'endDate document_search_select_elem eth_date form-control_', 'placeholder'=>'dd/mm/yyyy'))}}
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="visible-xs clearfix"></div>
                    <div class="col-lg-1">
                    <div class="col-md-12"><br></div>
                        <div class="selectuser col-md-12 pull-right_">
                            <div class="btn-group pull-right dropdown"><br>
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    {{$currentUser->isPublic()? App\Global_var::getLangString('Guest', $language_strings): $currentUser->username()}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                @if($currentUser->isPublic())
                                    <li><a href="{{route('public_login')}}">{{App\Global_var::getLangString('Login', $language_strings)}}</a></li>
                                    <li><a href="{{route('sign_up')}}">{{App\Global_var::getLangString('Sign_Up', $language_strings)}}</a></li>
                                @else
                                    <li><a class="btn btn-warning btn-flat btn-block" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                                <span>
                                 {{App\Global_var::getLangString('Sign_Out', $language_strings)}}
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }} 
                           </form></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                <!-- <div class="col-md-12">
                    <div class="col-md-11 col-md-offset-1">
                    <div class="col-md-2">
                     {!! Form::select('countryId', [null=>App\Global_var::getLangString('Country', $language_strings)]+$countries, null, array('class'=>'select2_ form-control_ document_search_select_elem countryId'));!!}
                    </div>
                    <div class="col-md-2">
                     {!! Form::select('regionId', [null=>App\Global_var::getLangString('Region', $language_strings)]+$regions, null, array('class'=>'select2_ form-control_ document_search_select_elem regionId'));!!}
                    </div>
                    <div class="col-md-2">
                     {!! Form::select('zoneId', [null=>App\Global_var::getLangString('Zone', $language_strings)]+$zones, null, array('class'=>'select2_ form-control_ document_search_select_elem zoneId'));!!}
                    </div>
                    <div class="col-md-2">
                     {!! Form::select('weredaId', [null=>App\Global_var::getLangString('Wereda', $language_strings)]+$weredas, null, array('class'=>'select2_ form-control_ document_search_select_elem weredaId'));!!}
                    </div>
                    </div>
                </div> -->
                </div>

            </div>
        </div>
    </div>
   @endif
</div>


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

<!-- /logo -->
<div class="searchResultDiv">
     @yield('bodyContent') 
</div>

<!-- footer -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="container padding-def">
                <div class="col-lg-1  col-sm-2 col-xs-12 footer-logo">
                    <a class="navbar-brand" href="{{route(!$currentUser->isPublic()? 'home':'welcome')}}"><img src="{{asset('images/'.$logo->logoImage)}}" alt="Project name" class="logo" style="background-color: green; border-radius: 50%; height: 60px; width: 60px; " /></a>
                </div>
                <div class="col-lg-7  col-sm-7 col-xs-12">
                    <div class="delimiter"></div>
                    <div class="f-copy">
                        <ul class="list-inline">
                           <!--  <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li> -->
                            <li>Copyrights &copy; {{date('Y')}} <a href="http:://www.haweltisemaetat.com">{{$logo!=null? $logo->logoText :' EDMS'}}</a> {{App\Global_var::getLangString('All_Rights_Reserved', $language_strings)}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script  src="{{asset('circle_video_sharing/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelement-and-player.min.js')}}"></script>
<script src="{{asset('circle_video_sharing/js/custom.js')}}"></script>



<script type="text/javascript" src="{{asset('js/EthiopianDatePicker/WorldCalendars/src/js/jquery.calendars.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/EthiopianDatePicker/WorldCalendars/src/js/jquery.calendars.plus.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('js/EthiopianDatePicker/WorldCalendars/src/css/jquery.calendars.picker.css')}}"> 
<script type="text/javascript" src="{{asset('js/EthiopianDatePicker/js/jquery.plugin.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/EthiopianDatePicker/WorldCalendars/src/js/jquery.calendars.picker.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.plugin.min.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.plus.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.coptic.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.discworld.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.ethiopian.js')}}"></script>
<!-- <script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.hebrew.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.islamic.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.julian.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.mayan.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.nanakshahi.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.nepali.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.persian.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.taiwan.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.thai.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.ummalqura.js')}}"></script>
 -->
<script src="{{asset('js/tinymce/js/select2.full.min.js')}}"></script>
 <script src="{{asset('js/tinymce/tinymce/tinymce.min.js')}}"></script>

 <link href="{{asset('checkbox/bootstrap-toggle.min.css')}}" rel="stylesheet">


<!-- <script src="{{asset('dist/demo.js')}}" crossorigin="anonymous"></script> -->
 @include("_Script._myScript")

 <script type="text/javascript">
      $(".select2").select2();/*------uses for combined dropdown with input*/
 </script>

<script type="text/javascript">
    function iframeLoaded(){
        var head = $("iframe").contents().find("head");
        var css = '<style type="text/css">' +
                  '.ndfHFb-c4YZDc-Wrql6b{display:none}; ' +
                  '</style>';
        $(head).append(css);

       // $('.ndfHFb-c4YZDc-Wrql6b').remove();
    }
</script>


<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    
 $(".select2").select2();/*------uses for combined dropdown with input*/
</script>
<script type="text/javascript">
   
$(".eth_date").calendarsPicker({calendar: $.calendars.instance('ethiopian')});

$(document).on('change', '#selectCalendar', function() { 
    calendar = $.calendars.instance($(this).val()); 
    var convert = function(value) { 
        return (!value || typeof value != 'object' ? value : 
            calendar.fromJD(value.toJD())); 
    }; 
    $('.is-calendarsPicker').each(function() { 
        var current = $(this).calendarsPicker('option'); 
        $(this).calendarsPicker('option', {calendar: calendar, 
                onSelect: null, onChangeMonthYear: null, 
                defaultDate: convert(current.defaultDate), 
                minDate: convert(current.minDate), 
                maxDate: convert(current.maxDate)}). 
            calendarsPicker('option', 
                {onSelect: current.onSelect, 
                onChangeMonthYear: current.onChangeMonthYear}); 
    }); 
});
</script>
    

<script type="text/javascript" src="{{asset('js/printThis.js')}}"></script>

</body>
</html>
