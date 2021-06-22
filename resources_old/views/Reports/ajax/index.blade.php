<div id="ajaxContent">
  <div class="col-md-8 col-md-offset-0">
  <div class="panel">
    <div class="panel-success">
      <div class="panel-heading">
          {{App\Global_var::getLangString('Report', $language_strings)}}
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-border">
        <tbody>
          <tr>
            <td><a class="get" href="{{route('Total_documents_report')}}" style="color: orange"> 
              <h1><i class="fa fa-bar-chart-o"></i> {{App\Global_var::getLangString('Documents', $language_strings)}}</h1> 
            </a></td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
  </div>

</div>
