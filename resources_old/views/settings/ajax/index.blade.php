<div id="ajaxContent">

  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-success ">
      <div class="panel-heading">
        <div class="panel-title">
          {{App\Global_var::getLangString('System_Settings', $language_strings)}}
        </div>
      </div>
      <div class="panel-body">

        <div class="col-md-12">
                  <!-- <a class="btn-block bu btn btn-warning" href="{{ route('backupmanager') }}"><i class="fa fa-download" aria-hidden="true"></i> {{__("Backup Database")}}</a> -->
                  <hr>
          <h4>{{App\Global_var::getLangString('System_Settings', $language_strings)}}</h4>
          {{Form::model($setting, array('route'=>['settings.update', $setting!=null? $setting->id: 1], 'method'=>'POST', 'class'=>'post'))}}
          <label class="nextUrl" nextUrl="{{route('settings.index')}}" ></label>

          <table class="table table-bordered">
            <tr style="display: none">
              <td>
                <b>{{App\Global_var::getLangString('View_Count_Interval_in_Hours', $language_strings)}}</b>
                {{Form::number("countViewsAllowedIntervalInHours", 1, ['class'=>'form-control', 'min'=>'1', 'required'=>'true'])}}
              </td>
            </tr>
            <tr>
              <td>
                <b>{{App\Global_var::getLangString('Pagination_Size', $language_strings)}}</b>
                {{Form::number("paginationSize", null, ['class'=>'form-control', 'min'=>'1', 'required'=>'true'])}}
              </td>
            </tr>
            <tr style="display: none;">        
              <td>
                <b>{{App\Global_var::getLangString('Report_Generation_Date', $language_strings)}}</b>
                {{Form::text("reportGenerationDate", null, ['class'=>'eth_date form-control'])}}
              </td>
            </tr>
            <tr style="display: none;">
              <td>
                <b>{{App\Global_var::getLangString('Report_Interval_In_Months', $language_strings)}}</b>
                {{Form::text("reportIntervalInMonths", null, ['class'=>'number form-control'])}}</])}}
              </td>
            </tr>
            <tr><td><center>{{Form::submit(App\Global_var::getLangString('Save', $language_strings), ['class'=>'btn btn-success btn-block'])}}</center></td>
            </tr>
          </table>
          {{Form::close()}}
        </div>
      </div>
    </div>



  </div>
</div>

