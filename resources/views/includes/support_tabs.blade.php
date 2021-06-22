<!-- <div class="col-md-12">
  <div id="custtab"> {{-- These tabs are used in Services --}}
    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      
      @if($currentUser->isGranted('kttln_dgafn_abyate_eyo.index'))
      <li class="{{ Request::is('kttln_dgafn_abyate_eyo-index' ) || Request::is('kttln_dgafn_abyate_eyo-create' ) || Request::is('kttln_dgafn_abyate_eyo-edit/*' ) || Request::is('kttln_dgafn_abyate_eyo-show/*' ) || Request::is('kttln_dgafn_abyate_eyo-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('kttln_dgafn_abyate_eyo.index')}}" >
          {{App\Global_var::getLangString('Organization_Follow_Up_And_Support', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('glgalot_ntsadgaf_hgi.index'))
      <li class="{{ Request::is('glgalot_ntsadgaf_hgi-index' ) || Request::is('glgalot_ntsadgaf_hgi-create' ) || Request::is('glgalot_ntsadgaf_hgi-edit/*' ) || Request::is('glgalot_ntsadgaf_hgi-show/*' ) || Request::is('glgalot_ntsadgaf_hgi-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('glgalot_ntsadgaf_hgi.index')}}" >
          {{App\Global_var::getLangString('Free_Law_Service', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('witness_follow_up.index'))
      <li class="{{ Request::is('witness_follow_up-index' ) || Request::is('witness_follow_up-create' ) || Request::is('witness_follow_up-edit/*' ) || Request::is('witness_follow_up-show/*' ) || Request::is('witness_follow_up-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('witness_follow_up.index')}}" >
          {{App\Global_var::getLangString('Witness_Follow_Up', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('human_rights.index'))
      <li class="{{ Request::is('human_rights-index' ) || Request::is('human_rights-create' ) || Request::is('human_rights-edit/*' ) || Request::is('human_rights-show/*' ) || Request::is('human_rights-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('human_rights.index')}}" >
          {{App\Global_var::getLangString('Human_Rights_of_Suspected/Accused', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('human_rights_in_prison.index'))
      <li class="{{ Request::is('human_rights_in_prison-index' ) || Request::is('human_rights_in_prison-create' ) || Request::is('human_rights_in_prison-edit/*' ) || Request::is('human_rights_in_prison-show/*' ) || Request::is('human_rights_in_prison-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('human_rights_in_prison.index')}}" >
          {{App\Global_var::getLangString('Human_Rights_in_Prison', $language_strings)}}
        </a>
      </li>
      @endif

      @if($currentUser->isGranted('leading_investigation_of_heavy_crimes.index'))
      <li class="{{ Request::is('leading_investigation_of_heavy_crimes-index' ) || Request::is('leading_investigation_of_heavy_crimes-create' ) || Request::is('leading_investigation_of_heavy_crimes-edit/*' ) || Request::is('leading_investigation_of_heavy_crimes-show/*' ) || Request::is('leading_investigation_of_heavy_crimes-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('leading_investigation_of_heavy_crimes.index')}}" >
          {{App\Global_var::getLangString('Leading_Investigation_Of_Heavy_Crimes', $language_strings)}}
        </a>
      </li>
      @endif 

      @if($currentUser->isGranted('complains_by_customer.index'))
      <li class="{{ Request::is('complains_by_customer-index' ) || Request::is('complains_by_customer-create' ) || Request::is('complains_by_customer-edit/*' ) || Request::is('complains_by_customer-show/*' ) || Request::is('complains_by_customer-confirm_delete/*' ) ? 'active' : ''}}">
        <a class="get" href="{{route('complains_by_customer.index')}}" >
          {{App\Global_var::getLangString('Customer_Complains', $language_strings)}}
        </a>
      </li>
      @endif     


    </ul>
  </div>
</div>
 -->