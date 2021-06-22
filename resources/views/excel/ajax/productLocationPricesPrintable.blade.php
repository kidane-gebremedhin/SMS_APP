  <div class="col-md-12">
   <h3 align="center">{{App\Global_var::getLangString('Export_To_Excel/PDF', $language_strings)}} &nbsp; &nbsp; &nbsp; 
    <a href="{{route('home')}}" class="get pull-right" style="margin-left: 10px"><i class="fa fa-back"></i> Back to Home </a>
    <button class="printBtn btn btn-warning pull-right" printArea=".printArea" title="{{App\Global_var::getLangString($logo->logoText, $language_strings)}}" footer="{{App\Global_var::getLangString($logo->logoText, $language_strings)}}" style="margin-left: 10px"><i class="fa fa-print"></i> PDF </button>
    <a href="{{ route('productLocationPricesExcel', ['csv', $locationId, $productTypeId]) }}" class="btn btn-success pull-right" style="margin-left: 10px"><i class="fa fa-download"></i> <!--CSV-->Excel
    {{App\Global_var::getLangString('Download', $language_strings)}}</a></h3><br />
   <div align="center">
    <!--<a href="{{ route('productLocationPricesExcel', ['xlsx', $locationId, $productTypeId]) }}" class="btn btn-success"><i class="fa fa-download"></i> 
    Excel {{App\Global_var::getLangString('Download', $language_strings)}}
    </a>-->
   </div>
   <br />

  <div class="printArea panel">
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <tr style="background: lightgray">
      <td>Product Type</td>
      <td>Location</td>
      <td>Average Price</td>
     </tr>
     @foreach($product_location_price_data as $row)
     <tr>
      <td>{{ $row[0]}}</td>
      <td>{{ $row[1]}}</td>
      <td>{{ $row[2]}}</td>
     </tr>
     @endforeach
    </table>
   </div>
  </div> 
  </div>