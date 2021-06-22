{{-- SELF POPULATING PERMITED RESOURCES --}}       
<?php
$roleId=Auth::guard('web')->user()!=null? (Auth::guard('web')->user()->role!=null? Auth::guard('web')->user()->role->id: 0): 0;
  if($roleId==0)
    return 'Logged in with Unknown Role';
  $role=App\Role::find($roleId);
  $resources=$role->resources_menuLevel_1;
  ?>
  <div class="menu_section">
                <ul class="nav side-menu">
             <li>
                  <a class="get home btn btn-success btn-md" href="{{route('home')}}"><i class="fa fa-shopping-cart"></i>{{App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logo:''}}</a>                   
              </li>
              <li><a href="#" class="home">
                        <i class="fa fa-home"></i>Dashboard</a>
                      </li>  
        @if(Auth::guard('web')->user()!=null && Auth::guard('web')->user()->role!=null && Auth::guard('web')->user()->role->roleName=='superadmin')
                  <li><a><i class="fa fa-list"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a class="get" href="{{route('users.import')}}">Import Users</a></li>
                      <li><a class="get" href="{{route('users.create')}}">Add User</a></li>
                      <li><a class="get" href="{{route('users.index')}}">Users List</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-list"></i> Permissions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a class="get permissions-step0" href="{{route('permissions.step1')}}">Manage Permissions</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-list"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a class="get settings" href="{{route('settings.index')}}">Change Settings</a></li>
                    </ul>
                  </li>

  <li><a><i class="fa fa-list"></i> LOGO <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a class="get" href="{{route('logo.index')}}">Logo Text</a></li>
                      <li><a class="get" href="{{route('logoImage.index')}}">Logo Image </a></li>
                    </ul>
                  </li>
                  
        @endif
        @foreach($resources as $resource)
                    <?php
                    if($resource->menuLevel!=1){
                      continue;/*skips sub-menus*/
                    }
                    ?>
                 <li><a><i class="fa fa-list"></i> {{$resource->shortCut}}<span class="fa fa-chevron-down"></span></a> 
                 <ul class="nav child_menu">
                      <li><a class="get" href="{{route(substr($resource->route, 0, -5).'create')}}">{{$resource->shortCut}} ወስኽ</a></li>
                       <li><a class="get" href="{{route($resource->route)}}">ዝርዝር {{$resource->shortCut}} </a></li>
                    </ul>
                  </li>
        @endforeach 
        @if(Auth::guard('web')->user()!=null && Auth::guard('web')->user()->isAdmin() || Auth::guard('web')->user()->isStaff())
        <li><a class="get btn btn-success btn-block" href="{{route('resources.manageMore')}}"><i class="fa fa-list"></i> Manage More...</a></li>
        @endif
{{-- Manage Sub-Menu Resources  --}}
                </ul>
                 
              </div>