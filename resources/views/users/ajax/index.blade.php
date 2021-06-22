<div id="ajaxContent">
  <div class="col-md-12 ">    
    <div class="col-md-12 panel panel-info"> 
        <h4><label class="badge bg-green">{{$users!=null? $users->count(): 0}}</label> / <label class="badge">{{$users->total()}}</label> 
          {{App\Global_var::getLangString('users', $language_strings)}}
          @if($currentUser->isGranted('users.create'))
          <a class="get btn btn-success btn-sm navbar-right" href="{{route('users.create')}}" nextUrl="{{route('users.create')}}"><i class="fa fa-plus"></i> 
            @endif
            {{App\Global_var::getLangString('Add', $language_strings)}}
          </a></h4> 
        <div class="panel-body">
          @if($users!=null)
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <!--<th>{{App\Global_var::getLangString('Adminstrative_Level', $language_strings)}}</th>-->
                <th>{{App\Global_var::getLangString('Username', $language_strings)}}</th>
                <th>{{App\Global_var::getLangString('Email', $language_strings)}}</th>
                <th>{{App\Global_var::getLangString('Role', $language_strings)}}</th>
                <th>{{App\Global_var::getLangString('Phone_Number', $language_strings)}}</th>
                <th>{{App\Global_var::getLangString('Status', $language_strings)}}</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $counter=0; ?>

              @foreach($users as $user)
              <?php $counter+=1; ?>

              <tr>
                <td>{{$counter}}</td>
               <!-- <td>{{$user->adminLevel}}</td>-->
                <td>{{$user->userName}}</td>
                <td>{{$user->email}}</td>
                <td>{{App\Global_var::getLangString($user->role!=null? $user->role->roleName: '', $language_strings)}}</td>
                <td>{{$user->phoneNumber}}</td>
                <td><label style="color: {{$user->status=='active'? 'green':'red'}}">{{$user->status}}</label></td>
                <td>

                  <ul class="nav navbar-right">
                    <li class="">
                      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: orange">
                        {{App\Global_var::getLangString('Actions', $language_strings)}}
                        <span class=" fa fa-angle-down"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                          <a class="get btn btn-lg" href="{{route('users.show', $user->id)}}" value="{{$user->id}}">
                            <i class="fa fa-eye"></i> {{App\Global_var::getLangString('View', $language_strings)}} 
                          </a>
                        </li>
                        @if($currentUser->isGranted('users.edit'))
                        <li>
                          <a class="get btn btn-lg" href="{{route('users.edit', $user->id)}}" value="{{$user->id}}">
                            <i class="fa fa-edit"></i> {{App\Global_var::getLangString('Edit', $language_strings)}} 
                          </a>
                        </li>
                        @endif
                        @if($currentUser->isGranted('users.delete'))
                        <li><a class="get btn btn-lg" href="{{route('users.delete', $user->id)}}" value="{{$user->id}}"><i class="fa fa-trash"></i> {{App\Global_var::getLangString('Delete', $language_strings)}} 
                        </a></li>
                        @endif
                        @if($currentUser->isGranted('users.changeStatus'))
                        <li><a class="get btn btn-lg" href="{{route('users.changeStatus', $user->id)}}" value="{{$user->id}}"><i class="fa fa-user"></i> {{$user->status=='active'? App\Global_var::getLangString('Deactivate', $language_strings): App\Global_var::getLangString('Activate', $language_strings)}} 
                        </a></li>
                        @endif

                      </ul>
                    </li>
                  </ul>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <div class="panel">
            <h4>{{App\Global_var::getLangString('List_Not_Found', $language_strings)}}</h4>
          </div>
          @endif
        </div> 
      </div>
      <div class="col-md-12">
        <center>
          {{$users->links()}}
        </center>
      </div>
    </div>
  </div>