  <div class="col-md-12">
   <h3 align="center">{{App\Global_var::getLangString('Export_To_Excel', $language_strings)}}</h3><br />
   <div align="center">
    <a href="{{ route('export_excel.excel', 'xlsx') }}" class="btn btn-success"><i class="fa fa-download"></i> 
    Excel {{App\Global_var::getLangString('Download', $language_strings)}}
    </a>
    <a href="{{ route('export_excel.excel', 'csv') }}" class="btn btn-success"><i class="fa fa-download"></i> CSV 
    {{App\Global_var::getLangString('Download', $language_strings)}}</a>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <tr>
      <td>Key Word</td>
      <td>Tigrigna</td>
      <td>Amharic</td>
      <td>English</td>
     </tr>
     @foreach($language_strings as $string)
     <tr>
      <td>{{ $string->keyWord }}</td>
      <td>{{ $string->tig }}</td>
      <td>{{ $string->amh }}</td>
      <td>{{ $string->eng }}</td>
     </tr>
     @endforeach
    </table>
   </div>
   
  </div>