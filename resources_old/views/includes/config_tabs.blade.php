<div class="col-md-12">
  <div id="custtab"> 
    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      
      @if($currentUser->isGranted('language_strings.edit'))
      <li class="{{ Request::is('language_strings-create' ) || Request::is('language_strings-edit' )  ? 'active' : ''}}">
        <a class="get" href="{{route('language_strings.edit')}}">
          {{App\Global_var::getLangString('Language_Strings', $language_strings)}} 
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('users.index'))
      <li class="{{ Request::is('users-index' ) || Request::is('users-create' ) || Request::is('users-edit/*' ) || Request::is('users-show/*' ) || Request::is('users-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('users.index')}}" >
          {{App\Global_var::getLangString('Users', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('departments.index'))
      <li class="{{ Request::is('departments-index' ) || Request::is('departments-create' ) || Request::is('departments-edit/*' ) || Request::is('departments-show/*' ) || Request::is('departments-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('departments.index')}}" >
          {{App\Global_var::getLangString('Department', $language_strings)}}
        </a>
      </li>
      @endif

    </ul>
  </div>
</div>
