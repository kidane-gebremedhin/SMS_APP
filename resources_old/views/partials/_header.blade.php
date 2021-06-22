<header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="get logo" style="background: //red">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>TREB</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background: //red">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu col-md-11" style="background: //red">
        <ul class="nav navbar-nav col-md-6">
          <li class="dropdown">
            <a href="{{route('welcome')}}" >{{App\Global_var::getLangString($logo!=null? $logo->logoText :'App_Name', $language_strings)}} </a>
          </li> 
          </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="{{route('welcome')}}" > {{App\Global_var::getLangString('Visit_Site', $language_strings)}} <b class="fa fa-globe"></b></a>
          </li> 
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{App\Global_var::getLangString('Language', $language_strings)}} <b class="caret"></b></a>
            <ul class="dropdown-menu nav-menu-dropdown">
                <li>
                    <a class="get_"  href="{{route('language_strings.changeLanguage', 'tig')}}"> {{App\Global_var::getLangString('Tigrigna', $language_strings)}} <i class="fa {{\Session::get('selectedLang')=='tig'? 'fa-check':''}}"></i></a>
                </li>
                <li>
                    <a class="get_"  href="{{route('language_strings.changeLanguage', 'amh')}}"> {{App\Global_var::getLangString('Amharic', $language_strings)}} <i class="fa {{\Session::get('selectedLang')=='amh'? 'fa-check':''}}"></i> </a>
                </li>
                <li>
                    <a class="get_"  href="{{route('language_strings.changeLanguage', 'eng')}}"> {{App\Global_var::getLangString('English', $language_strings)}} <i class="fa {{\Session::get('selectedLang')=='eng'? 'fa-check':''}}"></i></a>
                </li>
                   
                </ul>
            </li>  -->


          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="unviwedInboxMessages label label-success"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span class="unviwedInboxMessages_inner"></span> new messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu unviwedInboxMessages-menu">
                </ul>
              </li>
              <li class="footer"><a class="get" href="{{route('messages.inbox', $currentUser->id)}}">See All Messages</a></li>
            </ul>
          </li>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="unviwedSharedDocuments label label-success"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span class="unviwedSharedDocuments_inner"></span> Unviewed Shares </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu unviwedSharedDocuments-menu">
                </ul>
              </li>
            </ul>
          </li>
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs">
              {{App\Global_var::getLangString('Welcome', $language_strings)}}: {{$currentUser->username()}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <br><br><br><br>
                <p>
                  {{$currentUser->username()}} - {{App\Global_var::getLangString($currentUser->role!=null? $currentUser->role->roleName: '', $language_strings)}}
                </p>
                
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="col-md-12">
                <center>
                  <a class="get btn btn-success btn-flat btn-block" href="{{route('users.manageAccounts')}}"><i class="fa fa-user"></i> 
                            {{App\Global_var::getLangString('Profile_Settings', $language_strings)}}
                                </a>
                </center>
                </div>
                <hr>
                <div class="col-md-12">
                        <center><a class="btn btn-warning btn-flat btn-block" href="{{ route('logout') }}"
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
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

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
