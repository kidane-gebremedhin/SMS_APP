<div class="panel panel-body">
<div class="generateReportByDateIntervalDiv col-md-12" searchUrl="{{route('generateReportByDateInterval')}}" nextUrl="{{route($excel_title)}}">
  <div class="col-md-12 col-md-offset-0">
  <div class="col-md-3">
    <label class="col-md-4">{{App\Global_var::getLangString('From_Date', $language_strings)}}</label>
    <div class="col-md-8">
    {{ Form::text('startDate', \App\Global_var::getReport_DateInterval()[0], array('class'=>'startDate generateReportByDateInterval eth_date form-control', 'placeholder'=>'dd/mm/yyyy'))}}
    </div>
  </div>
  <div class="col-md-3">
    <label class="col-md-4">{{App\Global_var::getLangString('To_Date', $language_strings)}}</label>
    <div class="col-md-8">
    {{ Form::text('endDate', \App\Global_var::getReport_DateInterval()[1], array('class'=>'endDate generateReportByDateInterval eth_date form-control', 'placeholder'=>'dd/mm/yyyy'))}}
    </div>
  </div>
  <div class="col-md-3">
    <label class="col-md-4">{{App\Global_var::getLangString('Category', $language_strings)}}</label>
    <div class="col-md-8">
    {{ Form::select('category', [null=>'-- --']+$document_categories, \Session::get('category'), array('class'=>'category select2 form-control', 'required'=>'true'))}}
    </div>
  </div>
  <div class="col-md-2"><a href="{{route($excel_title)}}" class="generateReportByDateIntervalBtn btn btn-success">{{App\Global_var::getLangString('Generate_Report', $language_strings)}}</a></div>
  </div>
</div>


<div class="ajaxContent">
{{-- @include('Reports.civil_cases.ajax.searchResult_dateInterval') --}}
<div class="col-md-12">
<h2>
  {{App\Global_var::getLangString($excel_title, $language_strings)}} <u><i>{{\App\Global_var::getReport_DateInterval()[0]}}</i> - <i>{{\App\Global_var::getReport_DateInterval()[1]}}</i></u>
   <a class="get_ btn btn-success btn-md navbar-right" href="{{route($excel_title, 'xlsx')}}" nextUrl="{{route($excel_title, 'xlsx')}}" style="margin-right: 20px"><i class="fa fa-file-excel-o"></i> {{--
        Excel {{App\Global_var::getLangString('Download', $language_strings)}}--}}
   </a>
   <button class="printBtn btn btn-warning navbar-right" printArea=".printArea" title="{{App\Global_var::getLangString('E-DMS', $language_strings)}}" footer="{{App\Global_var::getLangString('E-DMS', $language_strings)}}" style="margin-right: 10px"><i class="fa fa-print"></i> <!-- PDF --></button>

   </h2>
<div class="printArea">
<h3>{{count($strings_array)}} {{App\Global_var::getLangString('Documents', $language_strings)}}</h3>
@if(count($strings_array)>0)
    <table class="table table-bordered">
      <tbody>
        <?php $count=1; ?>
        @foreach($strings_array as $strings_array_array)
          <tr>
          <td>{{$count++}}</td>
        <?php 
        $x=0;
        $x_offset=1;
        $current_x=1;
        $prev_rowspan_data=[];
        $current_rowspan_data=[];
        ?>

        @foreach($strings_array_array as $string)
        <?php 
        if($string!=''){
          $current_rowspan_data[$current_x]=$x_offset;
          $x_offset=1;
          $current_x=$x;
        }else{
          
          $x_offset++;
        }

        $x++;
        ?>
        @endforeach
        <?php 
        //print_r($current_rowspan_data)."<br><br>";
        $i=0; ?>
        @foreach($strings_array_array as $string)
          <td colspan="1" rowspan="1">{{$string}}</td>
        @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
@else
 <div class="col-md-12"><hr><h2 class="col-md-offset-2">
  {{App\Global_var::getLangString('List_Not_Found', $language_strings)}}
 </h2></div>
@endif
    </div>
</div>
</div>
</div>