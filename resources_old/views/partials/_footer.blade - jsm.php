 <footer>
       <div class="col-md-10 col-md-offset-1"><hr></div>
       <div class="col-md-10 col-md-offset-1">
           <span class="pull-left"> &copy; {{date('Y')}} {{App\Global_var::getLangString('Tigray_Region_Justice_Bureau', $language_strings)}}. {{App\Global_var::getLangString('All_Rights_Reserved', $language_strings)}}.</span>
           <span class="pull-right"> Developed by <a href="https://www.pilasatech.com">Pilasa Technologies</a></span>
       </div>
       <div class="col-md-10 col-md-offset-1"><hr></div>
   </footer>
   <!-- Toggle Navigation -->
    <!-- <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script> -->


    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
   <script src="{{asset('build/js/select2.full.min.js')}}"></script>
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

    
/*---end Date picker*/
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
    


<!-- Take Photo -->

    <!-- First, include the Webcam.js JavaScript Library -->
    <script type="text/javascript" src="{{asset('Take_photo/webcam.min.js')}}"></script>
    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        //Webcam.attach( '.my_camera' )[0];
    </script>
    
    <!-- A button for taking snaps -->
    
    
    <!-- Code to handle taking the snapshot and displaying it locally -->

<!-- -------------------------------- -->

<script type="text/javascript" src="{{asset('js/printThis.js')}}"></script>
@include("_Script._myScript")

    <!-- --------------------- -->
</body>

</html>
