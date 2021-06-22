  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="background: //red">
      <!-- Sidebar user panel -->
<!--       <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <!-- <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span> -->
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="background: //red">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a class="get" href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>                            {{App\Global_var::getLangString('Dashboard', $language_strings)}}
            </span>
          </a>
        </li>

        @if($currentUser->isGranted('users.index'))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>{{App\Global_var::getLangString('Users', $language_strings)}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           @if($currentUser->isGranted('users.approveNewUser'))
            <li>
            <a class="get" href="{{route('users.newUsers')}}" ><i class="fa fa-circle-o"></i> {{App\Global_var::getLangString('New_Users', $language_strings)}}</a>
            </li>
            <li><a class="get" href="{{route('users.rejectedUsers')}}" style="color: orange"><i class="fa fa-circle-o"></i> {{App\Global_var::getLangString('Rejected_Users', $language_strings)}}</a></li>
            @endif
            <li>
            <a class="get" href="{{route('users.index')}}" ><i class="fa fa-circle-o"></i> {{App\Global_var::getLangString('Users', $language_strings)}}</a>
            </li>
            </ul>
        </li>
        @endif
       @if($currentUser->isGranted('permissions.save'))
        <li>
          <a class="get" href="{{route('permissions.step1')}}">
            <i class="fa fa-th"></i> <span>                            {{App\Global_var::getLangString('Permissions', $language_strings)}}
            </span>
          </a>
        </li>
        @endif

       @if($currentUser->isGranted('roles.index'))
        <li>
          <a class="get" href="{{route('roles.index')}}">
            <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Roles', $language_strings)}}
            </span>
          </a>
        </li>
        @endif

         @if($currentUser->isGranted('generate_transfer_results_from_wereda_to_wereda'))
              <li>
                <a class="get" href="{{route('generate_transfer_results_from_wereda_to_wereda')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Generate_transfer_results_from_wereda_to_wereda', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
         @if($currentUser->isGranted('transfer_requests_from_school_to_schools.index'))
              <li>
                <a class="get" href="{{route('transfer_requests_from_school_to_schools.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Transfer_requests_from_school_to_schools', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
         @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.index'))
              <li>
                <a class="get" href="{{route('transfer_requests_from_wereda_to_weredas.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Transfer_requests_from_wereda_to_weredas', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
         @if($currentUser->isGranted('school_teacher_acceptance_capacities.index'))
              <li>
                <a class="get" href="{{route('school_teacher_acceptance_capacities.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('School_teacher_acceptance_capacities', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
         @if($currentUser->isGranted('wereda_teacher_acceptance_capacities.index'))
              <li>
                <a class="get" href="{{route('wereda_teacher_acceptance_capacities.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Wereda_teacher_acceptance_capacities', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
         @if($currentUser->isGranted('educational_levels.index'))
              <li>
                <a class="get" href="{{route('educational_levels.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Educational_Levels', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
    @if($currentUser->isGranted('schools.index'))
              <li>
                <a class="get" href="{{route('schools.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Schools', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
    @if($currentUser->isGranted('request_types.index'))
              <li>
                <a class="get" href="{{route('request_types.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Request_Types', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
    @if($currentUser->isGranted('rounds.index'))
              <li>
                <a class="get" href="{{route('rounds.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Rounds', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
    @if($currentUser->isGranted('transfer_categories.index'))
              <li>
                <a class="get" href="{{route('transfer_categories.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Transfer_Categories', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
    @if($currentUser->isGranted('jobs.index'))
              <li>
                <a class="get" href="{{route('jobs.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Jobs', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
    @if($currentUser->isGranted('subjects.index'))
              <li>
                <a class="get" href="{{route('subjects.index')}}">
                  <i class="fa fa-user"></i> <span>{{App\Global_var::getLangString('Subjects', $language_strings)}}
                  </span>
                </a>
              </li>
          @endif
    
           @if($currentUser->isGranted('countries.index') || $currentUser->isGranted('regions.index') || $currentUser->isGranted('zones.index') || $currentUser->isGranted('weredas.index'))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>{{App\Global_var::getLangString('Address_Structure', $language_strings)}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           @if($currentUser->isGranted('countries.index'))
            <li><a class="get" href="{{route('countries.index')}}" ><i class="fa fa-circle-o"></i> {{App\Global_var::getLangString('Countries', $language_strings)}}</a>
            </li>
            @endif
           @if($currentUser->isGranted('regions.index'))
            <li><a class="get" href="{{route('regions.index')}}" ><i class="fa fa-circle-o"></i> {{App\Global_var::getLangString('Regions', $language_strings)}}</a>
            </li>
            @endif
           @if($currentUser->isGranted('zones.index'))
            <li><a class="get" href="{{route('zones.index')}}" ><i class="fa fa-circle-o"></i> {{App\Global_var::getLangString('Zones', $language_strings)}}</a>
            </li>
            @endif
           @if($currentUser->isGranted('weredas.index'))
            <li><a class="get" href="{{route('weredas.index')}}" ><i class="fa fa-circle-o"></i> {{App\Global_var::getLangString('Weredas', $language_strings)}}</a>
            </li>
            @endif
          </ul>
        </li>
        @endif
        @if($currentUser->isGranted('logo.logo_update'))
        <li>
          <a class="get" href="{{route('logo.edit')}}">
            <i class="fa fa-laptop"></i> <span>                            {{App\Global_var::getLangString('User_Interface', $language_strings)}}
            </span>
          </a>
        </li>
        @endif
        @if($currentUser->isGranted('settings.index'))
        <li>
          <a class="get" href="{{route('settings.index')}}">
            <i class="fa fa-gear"></i> <span>                            {{App\Global_var::getLangString('Settings', $language_strings)}}
            </span>
          </a>
        </li>
        @endif
       @if($currentUser->isGranted('logs.logsAll'))
        <li>
          <a class="get" href="{{route('logs.logsAll')}}">
            <i class="fa fa-files-o"></i> <span>                            {{App\Global_var::getLangString('Logs', $language_strings)}}
            </span>
          </a>
        </li>
        @endif
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa fa-wpforms"></i>
            <span>{{App\Global_var::getLangString('User_Mannual', $language_strings)}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a class="get_" target="_blank" href="{{asset('mannuals/User-Mannual-Tigrigna.pdf')}}">
            <i class="fa fa-circle-o"></i> <span>                            {{App\Global_var::getLangString('Tigrigna', $language_strings)}} {{App\Global_var::getLangString('User_Mannual', $language_strings)}} 
            </span>
          </a>
          </li>
            <li><a class="get_" target="_blank" href="{{asset('mannuals/User-Mannual-English.pdf')}}"><i class="fa fa-circle-o"></i>{{App\Global_var::getLangString('English', $language_strings)}} {{App\Global_var::getLangString('User_Mannual', $language_strings)}}</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
