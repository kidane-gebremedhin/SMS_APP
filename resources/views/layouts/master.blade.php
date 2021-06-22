<!doctype html>
<html class="no-js" lang="">

  <?php $logoImage=App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logoImage:''; ?>
  <?php $logo=App\Logo::orderBy('id', 'desc')->first(); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$logo!=null? $logo->logoText :' System'}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/'.$logoImage)}}">
    <!-- Google Fonts
        ============================================ -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">-->
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('notika-template/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{ asset('notika-template/css/owl.transitions.css')}}">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/meanmenu/meanmenu.min.css')}}">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/animate.css')}}">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/normalize.css')}}">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- jvectormap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
    <!-- notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/notika-custom-icon.css')}}">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/wave/waves.min.css')}}">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/main.css')}}">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/style.css')}}">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('notika-template/css/responsive.css')}}">
    
<!-- css -->
    <link href="{{ asset('css/tinymce/css/select2.min.css')}}" rel="stylesheet" >

    <!-- modernizr JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/vendor/modernizr-2.8.3.min.js')}}"></script>

<!-- JS -->
    <script src="{{ asset('notika-template/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!--     <script src="{{asset('js/jquery.js')}}"></script> -->
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
    

    <script src="{{asset('js/tinymce/js/select2.full.min.js')}}"></script>
     <script src="{{asset('js/tinymce/tinymce/tinymce.min.js')}}"></script>

     <link href="{{asset('checkbox/bootstrap-toggle.min.css')}}" rel="stylesheet">
     <script src="{{asset('checkbox/bootstrap-toggle.min.js')}}"></script>

     <script src="{{asset('js/canvasJS.min.js')}}"></script>
     <script src="{{asset('js/chart.min.js')}}"></script>

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
                //alert(e);
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

<style type="text/css"> 
embed {
pointer-events: none;
}
</style>

<style type="text/css">
  .panel-body{
     /*overflow: auto;*/
     overflow-x: auto;
  }
</style>

  <link href="{{ asset('css/_myStyle.css')}}" rel="stylesheet" />
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a class="get" href="{{route('home')}}"><img src="{{asset('images/'.$logoImage)}}" alt="" style="height: 35px; border-radius: 80%" /><span style="font-size: 20px; font-weight: bold; color: #fff">&nbsp; &nbsp;{{$logo!=null? $logo->logoText :' System'}}</span></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                               <!--  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a> -->
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" />
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><!-- <span><i class="notika-icon notika-menus"></i></span> -->
                                <img src="{{asset('images/menus-icon.png')}}" alt="" style="width: 25px; height: 20px;" /></a>
                                <div role="menu" class="dropdown-menu message-dd animated zoomIn" style="width: 400px">
                                    <div class="hd-mg-tt">
                                        <h2><hr> </h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <div>
                                        <!--<div class="col-md-12">
                                            <input type="text" placeholder="Search..." class="menuSearchField form-control">
                                        <div class="col-md-12" style="height: 20px;"></div>
                                        </div>-->
                                        </div>
                                        <div class="menuArea">
<a href="#">
    <div class="hd-message-sn">
@if(($currentUser->isAdmin() && $currentUser->isGranted('sent_bulk_sms_messages')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('sent_bulk_sms_messages')}}">
                <center>
                    <img src="{{ asset('images/icons/sent_bulk_sms_messages.png')}}" alt="sent_bulk_sms_messages" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isGranted('send_bulk_sms')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('send_bulk_sms')}}">
                <center>
                    <img src="{{ asset('images/icons/send_bulk_sms.png')}}" alt="send_bulk_sms" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isGranted('send_sms')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('send_sms')}}">
                <center>
                    <img src="{{ asset('images/icons/send_sms.png')}}" alt="send_sms" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isGranted('read_sms')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('read_sms')}}">
                <center>
                    <img src="{{ asset('images/icons/read_sms.png')}}" alt="read_sms" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
    </div>
</a>
<a href="#">
    <div class="hd-message-sn">
@if(($currentUser->isAdmin() && $currentUser->isGranted('recipients.index')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('recipients.index')}}">
                <center>
                    <img src="{{ asset('images/icons/recipients.png')}}" alt="recipients" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isGranted('users.index')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('users.index')}}">
                <center>
                    <img src="{{ asset('images/icons/users.png')}}" alt="users" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isGranted('roles.index')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('roles.index')}}">
                <center>
                    <img src="{{ asset('images/icons/roles.png')}}" alt="roles" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isGranted('product_types.index')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('product_types.index')}}">
                <center>
                    <img src="{{ asset('images/icons/product_types.png')}}" alt="product_types" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
    </div>
</a>
<a href="#">
    <div class="hd-message-sn">
@if(($currentUser->isAdmin() && $currentUser->isGranted('locations.index')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('locations.index')}}">
                <center>
                    <img src="{{ asset('images/icons/locations.png')}}" alt="locations" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if($currentUser->isPriceEntry() || ($currentUser->isAdmin() && $currentUser->isGranted('location_product_prices.index')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('location_product_prices.index')}}">
                <center>
                    <img src="{{ asset('images/icons/location_product_prices.png')}}" alt="location_product_prices" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isGranted('recipient_categories.index')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('recipient_categories.index')}}">
                <center>
                    <img src="{{ asset('images/icons/recipient_categories.png')}}" alt="recipient_categories" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isGranted('measurment_types.index')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('measurment_types.index')}}">
                <center>
                    <img src="{{ asset('images/icons/measurment_types.png')}}" alt="measurment_types" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
    </div>
</a>

<a href="#">
    <div class="hd-message-sn">
@if(($currentUser->isAdmin() && $currentUser->isGranted('rounds.index')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('rounds.index')}}">
                <center>
                    <img src="{{ asset('images/icons/rounds.png')}}" alt="rounds" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isGranted('logo.logo_update')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('logo.edit')}}">
                <center>
                    <img src="{{ asset('images/icons/logo.png')}}" alt="logo" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if(($currentUser->isAdmin() && $currentUser->isAdmin() && $currentUser->isGranted('reports')))
        <div class="hd-message-img_">
            <a class="get" href="{{route('reports')}}">
                <center>
                    <img src="{{ asset('images/icons/reports.png')}}" alt="logo" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
    </div>
</a>























                                        </div>


{{--
                                        <a href="#">
                                            <div class="hd-message-sn">
                                        @if($currentUser->isGranted('generate_transfer_results_from_wereda_to_wereda'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('generate_transfer_results_from_wereda_to_wereda')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        @if($currentUser->isGranted('transfer_requests_from_school_to_schools.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('transfer_requests_from_school_to_schools.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('transfer_requests_from_wereda_to_weredas.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        @if($currentUser->isGranted('school_teacher_acceptance_capacities.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('school_teacher_acceptance_capacities.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif

                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                        @if($currentUser->isGranted('wereda_teacher_acceptance_capacities.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('wereda_teacher_acceptance_capacities.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        @if($currentUser->isGranted('educational_levels.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('educational_levels.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        @if($currentUser->isGranted('schools.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('schools.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        @if($currentUser->isGranted('request_types.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('request_types.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                        @if($currentUser->isGranted('rounds.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('rounds.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        @if($currentUser->isGranted('transfer_categories.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('transfer_categories.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        @if($currentUser->isGranted('jobs.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('jobs.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif
                                        @if($currentUser->isGranted('subjects.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('subjects.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/customers.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                        @endif

                                            </div>
                                        </a>
                                       
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                @if($currentUser->isGranted('users.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('users.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/users.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                                @endif
                                                @if($currentUser->isGranted('roles.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('roles.index')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/roles.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                                @endif    
                                                @if($currentUser->isGranted('home'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('home')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/dashboard.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                                @endif     
                                                @if($currentUser->isGranted('reports'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="#reports">
                                                        <center>
                                                            <img src="{{ asset('images/icons/reports.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </a>
                                        --}}
					{{--
                                        <div class="col-lg-12" style="height: 1px; background: lightgrey;"></div>
                                        <a href="#">
                                            <div class="hd-message-sn"> 
                                            @if($currentUser->isGranted('logo.logo_update'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('logo.edit')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/settings.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                                @endif
                                            @if($currentUser->isGranted('permissions.save'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('permissions.step1')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/permissions.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                                @endif
                                                @if($currentUser->isGranted('roles.index') || $currentUser->isGranted('jobs.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('system_metadata')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/system_metadata.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                                @endif

                                                @if($currentUser->isGranted('countries.index') || $currentUser->isGranted('regions.index') || $currentUser->isGranted('zones.index') || $currentUser->isGranted('weredas.index'))
                                                <div class="hd-message-img_">
                                                    <a class="get" href="{{route('address_structure')}}">
                                                        <center>
                                                            <img src="{{ asset('images/icons/address_structure.png')}}" alt="" class="menu-icons" />
                                                        </center>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
				--}}
                                </div>
                            </li>
                            <li class="nav-item nc-al"><a style="display: none" href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span><!-- <div class="spinner4 spinner-4"></div> --><!-- <div class="ntd-ctn"><span>3</span></div> --></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn" style="display: none;">
                                    <!-- <div class="hd-mg-tt">
                                        <h2>Notification</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_">
                                                    <img src="{{ asset('notika-template/img/post/1.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_">
                                                    <img src="{{ asset('notika-template/img/post/2.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_">
                                                    <img src="{{ asset('notika-template/img/post/4.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_">
                                                    <img src="{{ asset('notika-template/img/post/1.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_">
                                                    <img src="{{ asset('notika-template/img/post/2.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div> -->
                                </div>
                            </li>
                            <li class="nav-item"><a style="display: none" href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><!-- <span><i class="notika-icon notika-menus"></i></span> --><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span class="totalNotificationsCount">0</span></div></a>
                            {{--
                                <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>{{App\Global_var::getLangString('Notifications', $language_strings)}}</h2>
                                    </div>
                                    <div class="hd-message-info hd-task-info">
                                        <div class="skill">
                                            <div class="progress">
                                                <div class="lead-content">
                                                       <a class="get" href="{{route('vehicles.oilNeededVehicles')}}">{{App\Global_var::getLangString('Oil_Needed_Vehicles', $language_strings)}}</a>

                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="100%" style="width: 100%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span class="oilNeededVehiclesCount">0</span> </div>
                                            </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <a class="get" href="{{route('vehicles.serviceNeededVehicles')}}">{{App\Global_var::getLangString('Service_Needed_Vehicles', $language_strings)}}</a>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="100%" style="width: 100%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span class="serviceNeededVehiclesCount">0</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                                <a class="get" href="{{route('toffegnas.idCardExpiredToffegas')}}">{{App\Global_var::getLangString('ID_Card_Expired_Toffegas', $language_strings)}}</a>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="100%" style="width: 100%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span class="idCardExpiredToffegasCount">0</span> </div>
                                            </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <a class="get" href="{{route('toffegnas.driverLicenseExpiredToffegas')}}">{{App\Global_var::getLangString('License_Expired_Toffegas', $language_strings)}}</a>

                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="100%" style="width: 100%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span class="driverLicenseExpiredToffegasCount">0</span> </div>
                                            </div>
                                            <!-- <div class="progress progress-bt">
                                                <div class="lead-content">
                                                    <p>Youtube App</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="55%" style="width: 55%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>55%</span> </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div> -->
                                </div>
                                --}}
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<!-- <i class="notika-icon notika-chat"></i> --></span></a>
                                <div style="display: none" role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Chat</h2>
                                    </div>
                                    <div class="search-people">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" placeholder="Search People" />
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_ chat-img">
                                                    <img src="{{ asset('notika-template/img/post/1.jpg')}}" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_ chat-img">
                                                    <img src="{{ asset('notika-template/img/post/2.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Last seen 3 hours ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_ chat-img">
                                                    <img src="{{ asset('notika-template/img/post/4.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Last seen 2 minutes ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_ chat-img">
                                                    <img src="{{ asset('notika-template/img/post/1.jpg')}}" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img_ chat-img">
                                                    <img src="{{ asset('notika-template/img/post/2.jpg')}}" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs">{{$currentUser->username()}}</span>
            </a>
            <ul class="dropdown-menu col-md-10">
           
              <!-- Menu Footer-->
              <li class="col-md-12">
                <div class="col-md-12" style="height: 30px"></div>
                <div class="col-md-12" style="margin-bottom: 20px;">
                <center>
                  <a class="get" href="{{route('users.manageAccounts')}}"><i class="fa fa-user"></i> 
                            {{App\Global_var::getLangString('Profile', $language_strings)}}
                                </a>
                </center>
                </div>
                <div class="col-md-12">
                        <center><a class="btn btn-default btn-flat btn-xs" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                                <span>
                                 {{App\Global_var::getLangString('Sign_Out', $language_strings)}}
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }} 
                           </form>
                           </center>
                </div>
              </li>
            </ul>
          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                          <li><a class="get_" href="{{route('home')}}">{{App\Global_var::getLangString('Dashboard', $language_strings)}}</a>
                                          </li>
                                           @if($currentUser->isGranted('generate_transfer_results_from_wereda_to_wereda'))
                                              <li>
                                                <a class="get_" href="{{route('generate_transfer_results_from_wereda_to_wereda')}}">
                                                  {{App\Global_var::getLangString('Generate_transfer_results_from_wereda_to_wereda', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                          @if($currentUser->isGranted('transfer_requests_from_school_to_schools.index'))
                                              <li>
                                                <a class="get_" href="{{route('transfer_requests_from_school_to_schools.index')}}">
                                                  {{App\Global_var::getLangString('Transfer_requests_from_school_to_schools', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                         @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.index'))
                                              <li>
                                                <a class="get_" href="{{route('transfer_requests_from_wereda_to_weredas.index')}}">
                                                  {{App\Global_var::getLangString('Transfer_requests_from_wereda_to_weredas', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                         @if($currentUser->isGranted('school_teacher_acceptance_capacities.index'))
                                              <li>
                                                <a class="get_" href="{{route('school_teacher_acceptance_capacities.index')}}">
                                                  {{App\Global_var::getLangString('School_teacher_acceptance_capacities', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                         @if($currentUser->isGranted('wereda_teacher_acceptance_capacities.index'))
                                              <li>
                                                <a class="get_" href="{{route('wereda_teacher_acceptance_capacities.index')}}">
                                                  {{App\Global_var::getLangString('Wereda_teacher_acceptance_capacities', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                         @if($currentUser->isGranted('educational_levels.index'))
                                              <li>
                                                <a class="get_" href="{{route('educational_levels.index')}}">
                                                  {{App\Global_var::getLangString('Educational_Levels', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                    @if($currentUser->isGranted('schools.index'))
                                              <li>
                                                <a class="get_" href="{{route('schools.index')}}">
                                                  {{App\Global_var::getLangString('Schools', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                    @if($currentUser->isGranted('request_types.index'))
                                              <li>
                                                <a class="get_" href="{{route('request_types.index')}}">
                                                  {{App\Global_var::getLangString('Request_Types', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                    @if($currentUser->isGranted('rounds.index'))
                                              <li>
                                                <a class="get_" href="{{route('rounds.index')}}">
                                                  {{App\Global_var::getLangString('Rounds', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                    @if($currentUser->isGranted('transfer_categories.index'))
                                              <li>
                                                <a class="get_" href="{{route('transfer_categories.index')}}">
                                                  {{App\Global_var::getLangString('Transfer_Categories', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                    @if($currentUser->isGranted('jobs.index'))
                                              <li>
                                                <a class="get_" href="{{route('jobs.index')}}">
                                                  {{App\Global_var::getLangString('Jobs', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                    @if($currentUser->isGranted('subjects.index'))
                                              <li>
                                                <a class="get_" href="{{route('subjects.index')}}">
                                                  {{App\Global_var::getLangString('Subjects', $language_strings)}}
                                                </a>
                                              </li>
                                          @endif
                                          
                                    </ul>
                                </li>
                                @if($currentUser->isGranted('users.index'))
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">{{App\Global_var::getLangString('Users', $language_strings)}}</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        @if($currentUser->isGranted('users.index'))
                                        <li><a href="{{route('users.index')}}">{{App\Global_var::getLangString('Users', $language_strings)}}</a></li>
                                        @endif
                                    </ul>
                                </li>
                                @endif
                                @if($currentUser->isGranted('permissions.save'))
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">{{App\Global_var::getLangString('Users', $language_strings)}}</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        @if($currentUser->isGranted('users.index'))
                                        <li><a href="{{route('permissions.step1')}}">{{App\Global_var::getLangString('Permissions', $language_strings)}}</a></li>
                                        @endif
                                    </ul>
                                </li>
                                @endif
                                @if($currentUser->isGranted('logo.logo_update'))
                                <li><a data-toggle="collapse" data-target="#logo" href="#">{{App\Global_var::getLangString('Settings', $language_strings)}}</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        @if($currentUser->isGranted('logo.logo_update'))
                                        <li><a href="{{route('logo.edit')}}">{{App\Global_var::getLangString('User_Interface', $language_strings)}}</a></li>
                                        @endif
                                        <!-- @if($currentUser->isGranted('settings.index'))
                                        <li><a href="{{route('settings.index')}}">{{App\Global_var::getLangString('Settings', $language_strings)}}</a></li>
                                        @endif -->
                                    </ul>
                                </li>
                                @endif
                                <!-- <li><a data-toggle="collapse" data-target="#demolibra" href="#">Charts</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="flot-charts.html">Flot Charts</a></li>
                                        <li><a href="bar-charts.html">Bar Charts</a></li>
                                        <li><a href="line-charts.html">Line Charts</a></li>
                                        <li><a href="area-charts.html">Area Charts</a></li>
                                    </ul>
                                </li> -->
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                                    <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                        <li><a href="notification.html">Notifications</a>
                                        </li>
                                        <li><a href="alert.html">Alerts</a>
                                        </li>
                                        <li><a href="modals.html">Modals</a>
                                        </li>
                                        <li><a href="buttons.html">Buttons</a>
                                        </li>
                                        <li><a href="tabs.html">Tabs</a>
                                        </li>
                                        <li><a href="accordion.html">Accordion</a>
                                        </li>
                                        <li><a href="dialog.html">Dialogs</a>
                                        </li>
                                        <li><a href="popovers.html">Popovers</a>
                                        </li>
                                        <li><a href="tooltips.html">Tooltips</a>
                                        </li>
                                        <li><a href="dropdown.html">Dropdowns</a>
                                        </li>
                                    </ul>
                                </li>
                                
                                @if($currentUser->isGranted('roles.index')  || $currentUser->isGranted('jobs.index'))
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">{{App\Global_var::getLangString('System_Metadata', $language_strings)}}</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        @if($currentUser->isGranted('roles.index'))
                                        <li><a class="get_" href="{{route('roles.index')}}">{{App\Global_var::getLangString('Roles', $language_strings)}}</a>
                                        </li>
                                        @endif
                                        @if($currentUser->isGranted('jobs.index'))
                                        <li><a class="get_" href="{{route('jobs.index')}}">{{App\Global_var::getLangString('Professions', $language_strings)}}</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                                @endif
                               
                                @if($currentUser->isGranted('countries.index') || $currentUser->isGranted('regions.index') || $currentUser->isGranted('zones.index') || $currentUser->isGranted('weredas.index'))
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">{{App\Global_var::getLangString('Address_Structure', $language_strings)}}</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        @if($currentUser->isGranted('countries.index'))
                                        <li><a class="get_" href="{{route('countries.index')}}">{{App\Global_var::getLangString('Countries', $language_strings)}}</a>
                                        </li>
                                        @endif
                                        @if($currentUser->isGranted('regions.index'))
                                        <li><a class="get_" href="{{route('regions.index')}}">{{App\Global_var::getLangString('Regions', $language_strings)}}</a>
                                        </li>
                                        @endif
                                        @if($currentUser->isGranted('zones.index'))
                                        <li><a class="get_" href="{{route('zones.index')}}">{{App\Global_var::getLangString('Zones', $language_strings)}}</a>
                                        </li>
                                        @endif
                                        @if($currentUser->isGranted('weredas.index'))
                                        <li><a class="get_" href="{{route('weredas.index')}}">{{App\Global_var::getLangString('Weredas', $language_strings)}}</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                                @endif
                                 
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40_">
        <div class="col-md-12" style="height: 30px"></div>
        <div class="container">
        
        </div>
    </div>
    
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


          <!-- Main content -->
    <section class="content" style="min-height: 600px">

      <div class="col-md-12" style="height: 0px;">
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
       <div class="messageArea" style="position: fixed; top: 0px; width: 90%; z-index: 99; display: none;" >
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
          <div class="container">
          <div class="row">
          <div id="container">
           @yield('bodyContent') 
          </div>
          </div>
          </div>
          </section>
          <!-- /.content -->

    <!-- End Realtime sts area-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
    <?php $logo=App\Logo::orderBy('id', 'desc')->first(); ?>
                        <p>Copyright © {{date('Y')}} 
. {{$logo!=null? $logo->logoText :' System'}}. Powered by <a href="https://www.pixelplc.com" target="_blank">PIXELPLC</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
        ============================================ -->
<!--     <script src="{{ asset('notika-template/js/vendor/jquery-1.12.4.min.js')}}"></script>
 -->    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/wow.min.js')}}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/jquery-price-slider.js')}}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/owl.carousel.min.js')}}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/jquery.scrollUp.min.js')}}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/meanmenu/jquery.meanmenu.js')}}"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('notika-template/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{ asset('notika-template/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- jvectormap JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('notika-template/js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('notika-template/js/jvectormap/jvectormap-active.js')}}"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('notika-template/js/sparkline/sparkline-active.js')}}"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('notika-template/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('notika-template/js/flot/curvedLines.js')}}"></script>
    <script src="{{ asset('notika-template/js/flot/flot-active.js')}}"></script>
    <!-- knob JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/knob/jquery.knob.js')}}"></script>
    <script src="{{ asset('notika-template/js/knob/jquery.appear.js')}}"></script>
    <script src="{{ asset('notika-template/js/knob/knob-active.js')}}"></script>
    <!--  wave JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/wave/waves.min.js')}}"></script>
    <script src="{{ asset('notika-template/js/wave/wave-active.js')}}"></script>
    <!--  todo JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/todo/jquery.todo.js')}}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/plugins.js')}}"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/chat/moment.min.js')}}"></script>
    <script src="{{ asset('notika-template/js/chat/jquery.chat.js')}}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('notika-template/js/main.js')}}"></script>
    <!-- tawk chat JS
        ============================================ -->
    <!--<script src="{{ asset('notika-template/js/tawk-chat.js')}}"></script>-->

    <!-- JS -->
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

<!--<script src="{{asset('dist/demo.js')}}" crossorigin="anonymous"></script>-->

 @include("_Script._myScript")


 <script type="text/javascript" src="js/webcam.min.js"></script>

 <script language="JavaScript">
 
 function chooseFile(){
$(".openCameraBtn").removeAttr("disabled");
$(".fileDiv").css("display", "block");
$(".cameraDiv").css("display", "none");
$(".capturePhotoBtn").css("display", "none");
$(".isCuptured").val("false");
   /*Webcam.snap( function(data_uri) {
        Webcam.reset();
    });*/
}

var width=0;
var height=0;
 function configure(){
$(".openCameraBtn").attr("disabled", "true");
    if(width==0)
        width=$(".photoImg").prop("width");
    if(height==0)
        height=$(".photoImg").prop("height");
$(".fileDiv").css("display", "none");
$(".cameraDiv").css("display", "block");
$(".capturePhotoBtn").css("display", "block");
$(".cameraDiv").prop("width", width);
$(".cameraDiv").prop("height", height);
    //alert(height+" "+width)
  Webcam.set({
   width: width,
   height: height,
   image_format: 'jpeg',
   jpeg_quality: 90
  });
  Webcam.attach( '#my_camera' );
 }


 var shutter = new Audio();
 shutter.autoplay = false;
 shutter.src = navigator.userAgent.match(/Firefox/) ? 'camera_sounds/shutter.ogg' : 'camera_sounds/shutter.mp3';

 function take_snapshot() {
$(".openCameraBtn").removeAttr("disabled");
  shutter.play();

  Webcam.snap( function(data_uri) {
  Webcam.reset();

    var width=$(".photoImg").prop("width");
    var height=$(".photoImg").prop("height");
  document.getElementById('my_camera').innerHTML = 
   '<img id="imageprev" src="'+data_uri+'" class="photoImg"/>';
  } );

 var base64image = document.getElementById("imageprev").src;
$(".photoInput").val(base64image);
$(".isCuptured").val("true");

//  Webcam.reset();
 }

function saveSnap(){
      var url="/toff_delivery/testCamera";

 var base64image = document.getElementById("imageprev").src;
$.ajax({
                    type: "POST",
                      headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                     url: url,
                    data: {
                         _token : $('meta[name="csrf-token"]').attr('content'), 
                        image:base64image,
                    },

                      dataType: "text",
                    success: function(response) {
                        console.log(response);
                        if (response === 'success') {
                            alert('successfully uploaded recorded blob');
                            console.log('Successfully Uploaded Recorded Blob');
                        } else
                        {
                            alert("not success")
                            console.log(response); // error/failure
                        }
                    },
                    error: function(err){
                        alert("err__")
                    }
                });


}
</script>


</body>

</html>














