<div class="col-md-12">
  <div id="custtab"> {{-- These tabs are used in Organizational Structure --}}
    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      
      @if($currentUser->isGranted('countries.index'))
      <li class="{{ Request::is('countries-index' ) || Request::is('countries-create' ) || Request::is('countries-edit/*' ) || Request::is('countries-show/*' ) || Request::is('countries-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('countries.index')}}" >
          {{App\Global_var::getLangString('Country', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('regions.index'))
      <li class="{{ Request::is('regions-index' ) || Request::is('regions-create' ) || Request::is('regions-edit/*' ) || Request::is('regions-show/*' ) || Request::is('regions-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('regions.index')}}" >
          {{App\Global_var::getLangString('Region', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('zones.index'))
      <li class="{{ Request::is('zones-index' ) || Request::is('zones-create' ) || Request::is('zones-edit/*' ) || Request::is('zones-show/*' ) || Request::is('zones-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('zones.index')}}" >
          {{App\Global_var::getLangString('Zone', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('weredas.index'))
      <li class="{{ Request::is('weredas-index' ) || Request::is('weredas-create' ) || Request::is('weredas-edit/*' ) || Request::is('weredas-show/*' ) || Request::is('weredas-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('weredas.index')}}" >
          {{App\Global_var::getLangString('Woreda', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('tabyas.index'))
      <li class="{{ Request::is('tabyas-index' ) || Request::is('tabyas-create' ) || Request::is('tabyas-edit/*' ) || Request::is('tabyas-show/*' ) || Request::is('tabyas-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('tabyas.index')}}" >
          {{App\Global_var::getLangString('Tabya', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('kebelles.index'))
      <li class="{{ Request::is('kebelles-index' ) || Request::is('kebelles-create' ) || Request::is('kebelles-edit/*' ) || Request::is('kebelles-show/*' ) || Request::is('kebelles-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('kebelles.index')}}" >
          {{App\Global_var::getLangString('Kebelle', $language_strings)}}
        </a>
      </li>
      @endif


    </ul>
  </div>
</div>
