<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php $logo=App\Logo::orderBy('id', 'desc')->first(); ?>
    {{$logo!=null? $logo->logoText :' System'}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- New metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <?php $logoImage=App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logoImage:''; ?>
    <link rel="icon" type="image/png" href="{{asset('images/'.$logoImage)}}" sizes="32x32" />

    <meta name="theme-color" content="#000000" />

{{--  <meta name="csrf-token" content="{{csrf_token}}" />--}}
    <meta
      name="description"
      content="Web site created using create-react-app"
    />

<!--   <link href="{{ asset('build/css/kg_custom.min.css')}}" rel="stylesheet">
 -->    
<!--  <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet"> -->
<!--     <link href="{{ asset('css/modern-business.css')}}" rel="stylesheet">
 -->    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/tinymce/css/select2.min.css')}}" rel="stylesheet" >

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">

<!-- custumize checkbox -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}">

  <!-- 
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css')}}"> -->

  <!-- Morris chart -->
<!--   <link rel="stylesheet" href="bower_components/morris.js/morris.css">
 -->  <!-- jvectormap -->
  <!-- Date Picker -->
<!--   <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 -->  <!-- Daterange picker -->
<!--   <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
 -->  
 <!-- bootstrap wysihtml5 - text editor -->
<!--   <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 -->  <!-- Google Font -->
<!--   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 -->


<!-- Ethiopian Datepicker -->
<!-- Bounded with explicit DatePicke Functionaliy -->
<script src="{{asset('js/jquery.js')}}"></script>
<!-- <script src="{{ asset('fana/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('fana/chart/utils.js') }}"></script>
 -->   
  <!-- <script src="{{asset('js/bootstrap.min.js')}}"></script>  -->
    <!-- end Bounded -->

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
 <script src="{{asset('checkbox/bootstrap-toggle.min.js')}}"></script>

 <script>
  tinymce.init({ 
    selector:'textarea.formatted',
    plugins:'link code',
    menubar:false
    });
  </script>

<script>
$(function() {
    var calendar;
    $('#calendar').change(function() {
        calendar = $.calendars.instance($(this).val());
        $('#default').text(calendar.local.dateFormat);
    }).change();
    $('#check').click(function() {
        try {
            var date = calendar.parseDate('', $('#input').val());
            $('#output').val(calendar.formatDate($('#format').val(), date));
        }
        catch (e) {
            alert(e);
        }
    });
});
</script>


{{--  <link rel="stylesheet" href="{{ asset('js/video/video-js.css')}}">
  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
 <script src="{{asset('js/video/videojs-ie8.min.js')}}"></script>
--}}

<!-- <link rel="stylesheet" href="{{asset('dist/demo.css')}}" />
 -->
<style type="text/css">
@media print
{    
.no-print, .no-print *
{
display: none !important;
}
}
@media all {
  .page-break { display: none; }
}

@media print {
  .page-break { display: block; page-break-before: always; }
}
@media print{@page {size: portrait/*landscape*/}}

tr{
    background: //gray;
    height: 20px;
    padding-bottom: 0px
}

</style>

<style type="text/css"> 
embed {
pointer-events: none;
}
</style>

<style type="text/css">
  .panel-body{
     overflow: auto;
  }
</style>

  <link href="{{ asset('css/_myStyle.css')}}" rel="stylesheet" />
</head>
<body class="skin-yellow sidebar-collapse_ hold-transition skin-blue_ sidebar-mini">
<div class="wrapper">

@include('partials._header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="row">
    <!-- Content Header (Page header) -->
 <!--    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
 -->
    <!-- Main content -->
    <section class="content">
<!-- 
@if(!\App\Global_var::isChrome())
    <div id="message-error-displayer" style="margin-top: 30px">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
           <strong id="message-error">{{App\Global_var::getLangString('This_System_Is_Fully_Supported_in_Chrome', $language_strings)}}</strong>
          </div>
    </div>
@endif
 -->
<div class="col-md-12" style="height: 50px;">
<div class="sessionMessageArea col-md-12" style="position: relative; width: 100%; top:20px; height:50px; z-index: 99; display: block;">
 @if (Session::has('danger'))
<div class="alert alert-danger">{{ Session::get('danger') }}</div>
@elseif (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
<div class="col-md-8 col-md-offset-2">
@if ($errors->any())
        {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
@endif
 </div>
 </div>
      {{-- show message to user at top of page body content --}}
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

 </div>
    <div id="container">
     @yield('bodyContent') 
    </div>
    </section>
    <!-- /.content -->
  </div>
</div>
    <!-- /footer content -->
@include('partials._footer')

<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="bower_components/jquery/dist/jquery.min.js"></script>
-->
<!-- <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script> 
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
 <!-- Morris.js charts
<!-- <script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<!-- <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
 --> <!-- daterangepicker-->
<!-- <script type="text/javascript"></script>t src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 --><!-- datepicker -->
<!-- <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 --><!-- Bootstrap WYSIHTML5 -->
<!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
 -->

 <!-- Slimscroll -->
  <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script> 


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script>
 --><!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script>
 -->

<!-- Old  -->
    <!-- Bootstrap -->
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
   <script src="{{asset('build/js/select2.full.min.js')}}"></script>


 <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script> 
 <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script> 
 <script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script> 


<script type="text/javascript">
  
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })/*.on('ifChanged', function(e) {
// Get the field name
var isChecked = e.currentTarget.checked;

$(e.target).trigger('change');
alert('tg')
});*/
/*$(".flat-red").on('ifToggled', function(e) { 
      $(e.target).trigger('change');
});*/
$(".flat-red").on('change', function(e) { 
      alert("gg")
});
</script>

<style type="text/css">
.select2-container {
    width: 100% !important;
    padding: 0;
}
</style>


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

<script src="{{asset('dist/demo.js')}}" crossorigin="anonymous"></script>

 @include("_Script._myScript")


</body>
</html>
