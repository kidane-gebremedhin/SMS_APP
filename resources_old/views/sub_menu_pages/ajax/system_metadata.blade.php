<div id="ajaxContent">

  <div class="col-md-12">
       <div class="col-md-6"> 
   <div class="panel panel-success"> 
      <div class="panel-heading"> 
        <h4> 
          {{App\Global_var::getLangString('System_Metadata', $language_strings)}}</h4>
          </div>
          <div class="panel-body"> 
      <table class="table table-striped">
      <tbody>
        <tr>
          <td>
          @if($currentUser->isGranted('jobs.index'))
            <a class="get" href="{{route('jobs.index')}}">{{App\Global_var::getLangString('Professions', $language_strings)}}</a>
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
