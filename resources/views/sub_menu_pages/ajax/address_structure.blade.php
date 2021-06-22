<div id="ajaxContent">

  <div class="col-md-12">
   <div class="col-md-6"> 
   <div class="panel panel-success"> 
      <div class="panel-heading"> 
        <h4> 
          {{App\Global_var::getLangString('Address_Structure', $language_strings)}}</h4>
          </div>
          <div class="panel-body"> 
      <table class="table table-striped">
      <tbody>
        <tr>
          <td>
          @if($currentUser->isGranted('countries.index'))
            <a class="get" href="{{route('countries.index')}}">{{App\Global_var::getLangString('Countries', $language_strings)}}</a>
          @endif
          </td>
        </tr>
        <tr>
          <td>
          @if($currentUser->isGranted('regions.index'))
            <a class="get" href="{{route('regions.index')}}">{{App\Global_var::getLangString('Regions', $language_strings)}}</a>
          @endif
          </td>
        </tr>
        <tr>
          <td>
          @if($currentUser->isGranted('zones.index'))
            <a class="get" href="{{route('zones.index')}}">{{App\Global_var::getLangString('Cities', $language_strings)}}</a>
          @endif
          </td>
        </tr>
      </tbody>
    </table>
    </div>
    </div>
    </div>
<div class="col-md-6"> 
   <div class="panel panel-success"> 
      <div class="panel-heading"> 
        <h4> 
          {{App\Global_var::getLangString('Address_Structure', $language_strings)}}</h4>
          </div>
          <div class="panel-body"> 
      <table class="table table-striped">
      <tbody>
        <tr>
          <td>
          @if($currentUser->isGranted('weredas.index'))
            <a class="get" href="{{route('weredas.index')}}">{{App\Global_var::getLangString('Sub_Cities', $language_strings)}}</a>
          @endif
          </td>
        </tr>
        <tr>
          <td>
          @if($currentUser->isGranted('tabyas.index'))
            <a class="get" href="{{route('tabyas.index')}}">{{App\Global_var::getLangString('Tabyas', $language_strings)}}</a>
          @endif
          </td>
        </tr>
      </tbody>
    </table>
    </div>
    </div>
    </div>
</div>
</div>
