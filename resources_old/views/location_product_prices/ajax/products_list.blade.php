<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-8 panel panel-success">
      <h4> 
        {{App\Global_var::getLangString('Set_Price_of_Product_Types', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('location_product_prices.index')}}" nextUrl="{{route('location_product_prices.index')}}"><i class="fa fa-eye"></i> 
          {{App\Global_var::getLangString('List', $language_strings)}}
        </a>
      </h4>
      @if(count($product_types)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Product_Type', $language_strings)}}
          </th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($product_types as $product_type)
          <tr>
            <td>{{$count++}}</td>
            <td><a class="get" href="{{route('location_product_prices.create', $product_type->id)}}" nextUrl="{{route('location_product_prices.create', $product_type->id)}}">
          {{$product_type->name}}
        </a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="col-md-12"><hr><h4 class="col-md-offset-2">
        {{App\Global_var::getLangString('List_Not_Found', $language_strings)}}
      </h4></div>
      @endif
    </div>
  </div>
</div>
