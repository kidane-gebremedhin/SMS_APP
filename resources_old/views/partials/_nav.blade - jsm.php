       <!-- Navigation -->
    <nav class="navbar navbar-fixed-top" role="navigation">
        <!-- <div class="col-md-12" > -->
<div class="col-md-12" style="background-color: #F0E68C"><!-- #008080 -->
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="col-md-12" style="color: #2E8B57">
    <div class="col-md-1">
    <?php $logoImage=App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logoImage:''; ?>
    <img src="{{asset('images/'.$logoImage)}}" alt="Logo" style="height: 80px;float: left;">
    </div>
    <div class="col-md-11">
    <div class="row">                    
       <h3 style="float: left; margin-left: 20px;">   
       {{App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logo: 'Logo'}}
       <span style="color:#000; font-family: algerian">
            {{App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logoText : App\Global_var::getLangString('App_Name', $language_strings)}} 
       </span>
       </h3>
       </div>
       <div class="row">
           <span style="float: left; margin-left: 20px; font-size: 15px; font-family: georgia; font-weight: bold;">

           {{-- @if($currentUser->isAdmin())
                                  {{App\Global_var::getLangString('Admin', $language_strings)}}
                                  @elseif($currentUser->isWereda())
                                      {{App\Global_var::getLangString('Wereda', $language_strings).':  '.$currentUser->wereda->name}}
                                  @elseif($currentUser->isZone())
                                      {{App\Global_var::getLangString('Zone', $language_strings).':  '.$currentUser->zone->name}}
                                  @else
                                      {{App\Global_var::getLangString('Region', $language_strings).':  '.$currentUser->region->name}}
                                  @endif--}}
            Role
            </span>  
            <span class="pull-right">
               <?php 
               echo  App\Global_var::getLangString('Logged_User', $language_strings).':  '.$currentUser->name
                 ?>
            </span>
       </div>
       </div>
    </div>  

</div>
</div>
        <!-- </div> -->
        <div class="nav-menu col-md-12" style="border-top: 4px solid orange; border-bottom: 1px solid #8FBC8F">
        <div class="col-md-12">
            <!-- <div class="col-md-12" > -->
                
            <!-- </div> -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" ></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li class="{{Request::is('home' ) ? 'active' : ''}}">
                        <a class="get nav_member" href="{{ route('home') }}">
                        <i class="fa fa-dashboard"></i> {{App\Global_var::getLangString('Dashboard', $language_strings)}}</a>
                    </li>

        @if($currentUser->isCrime_Department())
                    <li class="{{Request::is('users-index' ) || Request::is('users-create' ) || Request::is('users-edit' ) || Request::is('users-show/*' )  ? 'active' : ''}}">
                        <a class="get nav_member" href="{{ route('users.index') }}"><i class="fa fa-book"></i>
                        {{App\Global_var::getLangString('Accusal_Documents', $language_strings)}}
                        <span style="margin-top: -20px;background-color: ; color: white">
                            <small style="background-color: orange;padding-top: -70px;" class="badge unViewed_ksi_mezgeb_brki_count label label-info"></small>  </span> 
                          
                    </a>
                    </li>
        @endif
        @if($currentUser->isCivil_Case_Department())
                    <li class="{{Request::is('users-index' ) || Request::is('users-create' ) || Request::is('users-edit' ) || Request::is('users-show/*' )  ? 'active' : ''}}">
                        <a class="get nav_member" href="{{ route('users.index') }}"><i class="fa fa-book"></i> {{App\Global_var::getLangString('Civil_Court_Documents', $language_strings)}}<span style="margin-top: -20px;background-color: ; color: white">
                            <small style="background-color: orange;padding-top: -70px;" class="badge unViewed_ftbher_mezgeb_brki_count label label-info"></small>  </span></a>
                    </li>
        @endif
                    <li class="{{Request::is('users-index' ) || Request::is('users-create' ) || Request::is('users-edit' ) || Request::is('users-show/*' )  ? 'active' : ''}}">
                        <a class="get nav_member" href="{{ route('users.index') }}"><i class="fa fa-book"></i> {{App\Global_var::getLangString('Services', $language_strings)}}</a>
                    </li>

                
                    <li class="{{Request::is('Reports-index' ) ? 'active' : ''}}">
                        <a class="get nav_member" href="{{ route('Reports_Index') }}"><i class="fa fa-list"></i> {{App\Global_var::getLangString('Reports', $language_strings)}}</a>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 25px;">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{App\Global_var::getLangString('Language', $language_strings)}} <b class="caret"></b></a>
                        <ul class="dropdown-menu nav-menu-dropdown">
                            <li>
                                <a class="get_"  href="{{route('language_strings.changeLanguage', 'tig')}}"><i class="fa fa-check"></i> {{App\Global_var::getLangString('Tigrigna', $language_strings)}}</a>
                            </li>
                            <li>
                                <a class="get_"  href="{{route('language_strings.changeLanguage', 'amh')}}"><i class="fa fa-check"></i> {{App\Global_var::getLangString('Amharic', $language_strings)}}</a>
                            </li>
                            <li>
                                <a class="get_"  href="{{route('language_strings.changeLanguage', 'eng')}}"><i class="fa fa-check"></i> {{App\Global_var::getLangString('English', $language_strings)}}</a>
                            </li>
                           
                        </ul>
                    </li> 

                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{App\Global_var::getLangString('Settings', $language_strings)}}<b class="caret"></b></a>
                        <ul class="dropdown-menu nav-menu-dropdown">
                            
                             <li class="">
                                <a class="get" href="{{route('countries.index')}}">
                            {{App\Global_var::getLangString('Organizational_Structure', $language_strings)}}
                                </a>
                            </li>
                            <li class="">
                                <a class="get" href="{{route('language_strings.edit')}}">
                            {{App\Global_var::getLangString('System_Configuration', $language_strings)}}
                                </a>
                            </li>
                            <li class="">
                                <a class="get" href="{{route('settings.index')}}">
                            {{App\Global_var::getLangString('System_Settings', $language_strings)}}
                                </a>
                            </li>
                            <li class="">
                                <a class="get" href="{{route('permissions.step1')}}">
                        {{App\Global_var::getLangString('Permissions', $language_strings)}}
                                </a>
                            </li>
                            <li class="">
                                <a class="get" href="{{route('logo.edit')}}">
                            {{App\Global_var::getLangString('User_Interface', $language_strings)}}
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                        {{--{{$currentUser->role!=null? $currentUser->role->roleName:''}} - {{!$currentUser->isAdmin() && $currentUser->brki!=null? $currentUser->brki->name:''}}--}}
                        Brki
                         <b class="caret"></b></a>
                        <ul class="dropdown-menu nav-menu-dropdown">
                            <li>
                                <a class="get" href="{{route('users.manageAccounts')}}"><i class="fa fa-user"></i> 
                            {{App\Global_var::getLangString('Profile_Settings', $language_strings)}}
                                </a>
                            </li>
                           {{--  <li>
                            {!!Form::open(array('route'=>'logout', "method"=>"POST"))!!}
                            <button type="submit" class="label btn-block" style="background: #008080;border-color: #008080; padding-top: 5px; padding-bottom: 5px;"> <i class="fa fa-sign-out pull-left"></i>
                            {{App\Global_var::getLangString('Log_Out', $language_strings)}}
                            </button>
                            {!!Form::close()!!}
                            </li> --}}
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                                <span>
                                 {{App\Global_var::getLangString('Log_Out', $language_strings)}}
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }} 
                           </form>
                       
                            </li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

           <!-- Navigation -->

<div class="second_level_menu col-md-12" style="display: none; position: fixed; top: 135px; z-index: 100;">
    <div class="panel panel-info">
    <div class="panel-heading" style="height: 40px">
            <div class="Documents all_second_level_menu col-md-12">
                 <a class="get" href="{{ route('users.index') }}" style="padding-right: 20px">{{App\Global_var::getLangString('Pre_Accusal_Documents', $language_strings)}}</a> 
                 <a class="get" href="{{ route('users.index') }}" style="padding-right: 20px">{{App\Global_var::getLangString('Civil_Court_Documents', $language_strings)}}</a>
            </div>        
            <div class="menu_name2 all_second_level_menu col-md-12">
                <a class="get" href="{{ route('home') }}" style="padding-right: 20px">ጥርዓን መቐበሊ</a> 
                 <a class="get" href="{{ route('home') }}" style="padding-right: 20px">ጥርዓን መከታተሊ</a> 
                 <a class="get" href="{{ route('home') }}" style="padding-right: 20px">ውሳነ ዝረኸቡ</a> 
                 <a class="get" href="{{ route('home') }}" style="padding-right: 20px">ውሳነ ዘይረኸቡ</a>
            </div>    
    </div>
    </div>         
</div>
