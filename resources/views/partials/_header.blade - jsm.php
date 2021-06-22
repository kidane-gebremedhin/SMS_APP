<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{App\Global_var::getLangString('Tigray_Region_Justice_Bureau', $language_strings)}} </title>

    <link href="{{ asset('build/css/kg_custom.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/modern-business.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/tinymce/css/select2.min.css')}}" rel="stylesheet" >
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/logoImage.png')}}">

<!-- my Css -->
    <link href="{{ asset('css/_myStyle.css')}}" rel="stylesheet">
<style type="text/css">
    
/*----Ethiopian Datepicker---*/
.hover
{
    border:solid 1px #A00;
}

.nav-menu, .nav-menu-dropdown{
    background: #fff;
}
.nav-menu a, .nav-menu-dropdown li a{
    color: #556B2F;
}


/*---end of Ethiopian Datepicker---*/
</style>




<!-- Ethiopian Datepicker -->


<!-- Bounded with explicit DatePicke Functionaliy -->
<script src="{{ asset('fana/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('fana/chart/utils.js') }}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script> 
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
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.hebrew.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.islamic.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.julian.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.mayan.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.nanakshahi.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.nepali.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.persian.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.taiwan.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.thai.js')}}"></script>
<script src="{{asset('js/EthiopianDatePicker/js/jquery.calendars.ummalqura.js')}}"></script>

<script src="{{asset('js/tinymce/js/select2.full.min.js')}}"></script>

 <script src="{{asset('js/tinymce/tinymce/tinymce.min.js')}}"></script>
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

</head>

<body>
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


@include("partials._nav")
