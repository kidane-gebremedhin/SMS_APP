<div id="ajaxContent">

  <div class="col-md-12">

    <div class="col-md-8 panel-success">
    <div class="panel-heading">
      <h4><label class="badge bg-green">{{$location_product_prices!=null? $location_product_prices->count(): 0}}</label> / <label class="badge">{{$location_product_prices->total()}}</label> 

        {{App\Global_var::getLangString('Location_Product_Prices', $language_strings)}}

        <a class="get btn btn-warning btn-sm navbar-right" href="{{route('products_list')}}" nextUrl="{{route('products_list')}}"><i class="fa fa-gears"></i> &nbsp; 

          <strong>{{App\Global_var::getLangString('Set_Product_Prices', $language_strings)}}</strong>

        </a>

      </h4>
</div>

    <div class="panel">
      @if(count($location_product_prices)>0)

      <table class="table table-striped table-hover">

        <thead>

          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Round', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Product', $language_strings)}}
          </th>
          <th>

            {{App\Global_var::getLangString('Location', $language_strings)}}

          </th>
          <th>

            {{App\Global_var::getLangString('Price', $language_strings)}}

          </th>

          <th>

            {{App\Global_var::getLangString('Measurment_Type', $language_strings)}}

          </th>

          <th></th>

        </thead>

        <tbody>

          <?php $count=1; ?>

          @foreach($location_product_prices as $location_product_price)

          <tr>

            <td>{{$count++}}</td>
	    <td>{{$location_product_price->round!=null? $location_product_price->round->name:''}}</td>
            <td>{{$location_product_price->productType!=null? $location_product_price->productType->name:''}}</td>
            <td>{{$location_product_price->location!=null? $location_product_price->location->name:''}}</td>
            <td>{{$location_product_price->price}}</td>
	    <td>{{$location_product_price->measurmentType!=null? $location_product_price->measurmentType->name:''}}</td>
            <td>      

              <ul class="nav navbar-right">

                <li class="">

                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">

                    {{App\Global_var::getLangString('Actions', $language_strings)}}

                    <span class=" fa fa-angle-down"></span>

                  </a>

                  <ul class="dropdown-menu dropdown-location_product_pricemenu pull-right">

                    <li>

                      <a class="get btn btn-lg" href="{{route('location_product_prices.show', $location_product_price->id)}}" value="{{$location_product_price->id}}" nextUrl="{{route('location_product_prices.show', $location_product_price->id)}}">

                        <i class="fa fa-eye"></i> 

                        {{App\Global_var::getLangString('View', $language_strings)}}

                      </a>

                    </li>

                    <li>

                      <a class="get btn btn-lg" href="{{route('location_product_prices.edit', $location_product_price->id)}}" value="{{$location_product_price->id}}" nextUrl="{{route('location_product_prices.edit', $location_product_price->id)}}">

                        <i class="fa fa-edit"></i> 

                        {{App\Global_var::getLangString('Edit', $language_strings)}}

                      </a>

                    </li>

                    <li><a class="get btn btn-lg" href="{{route('location_product_prices.delete', $location_product_price->id)}}" value="{{$location_product_price->id}}" nextUrl="{{route('location_product_prices.delete', $location_product_price->id)}}"><i class="fa fa-trash"></i> 

                      {{App\Global_var::getLangString('Delete', $language_strings)}}

                    </a></li>

                  </ul>

                </li>

              </ul>

            </td>

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

  <div class="col-md-8">

    <center>

      {{$location_product_prices->links()}}

    </center>

  </div>

</div>
