<div class="col-md-12">

  <div class="col-md-8">

    <h4 class="text-danger">

      {{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}

      <a href="{{route('location_product_prices.index')}}" class="get btn btn-default btn-sm" nextUrl="{{route('location_product_prices.destroy', $location_product_price->id)}}"> 

        {{App\Global_var::getLangString('No', $language_strings)}}

      </a>

      <a href="{{route('location_product_prices.destroy', $location_product_price->id)}}" value="{{$location_product_price->id}}" class="get btn btn-danger btn-sm" nextUrl="{{route('location_product_prices.index')}}"><i class="fa fa-trash"></i> 

        {{App\Global_var::getLangString('Yes', $language_strings)}}

      </a>

    </h4> 

  </div>

    <div class="col-md-8">

      <div class="panel panel-success">

        <div class="panel-heading">

          {{App\Global_var::getLangString('Detail', $language_strings)}}

          <a href="{{route('location_product_prices.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('location_product_prices.index')}}"><i class="fa fa-eye"></i> 

            {{App\Global_var::getLangString('List', $language_strings)}}

          </a>  

        </div>

        <div class="panel-body">

      <table class="table">

        <tbody>
	<tr>
	<td><strong>{{App\Global_var::getLangString('Round', $language_strings)}}</strong></td>
	 <td>{{$location_product_price->round!=null? $location_product_price->round->name:''}}</td>
	  </tr>
	<tr>
            <td><strong>{{App\Global_var::getLangString('Product', $language_strings)}}</strong></td><td><h4>{{$location_product_price->productType!=null? $location_product_price->productType->name:''}}</h4></td>
          </tr>
          <tr>
            <td><strong>{{App\Global_var::getLangString('Location', $language_strings)}}</strong></td><td><h4>{{$location_product_price->location!=null? $location_product_price->location->name:''}}</h4></td>
          </tr>
          <tr>
            <td><strong>{{App\Global_var::getLangString('Price', $language_strings)}}</strong></td><td><h4>{{ $location_product_price->price }}</h4></td>

          </tr>
          <tr>
            <td><strong>{{App\Global_var::getLangString('Measurment_Type', $language_strings)}}</strong></td><td><h4>{{$location_product_price->measurmentType!=null? $location_product_price->measurmentType->name:''}}</h4></td>
          </tr>
        </tbody>

      </table>



<div class="col-md-12">

<hr>

  <div class="col-md-12">

  {{App\Global_var::getLangString('Created_By', $language_strings)}}:

  <label class="label label-default">{{$location_product_price->createdByUser!=null? $location_product_price->createdByUser->username():''}}</label>



  {{App\Global_var::getLangString('Updated_By', $language_strings)}}:

  <label class="label label-default">{{$location_product_price->updatedByUser!=null? $location_product_price->updatedByUser->username():''}}  </label>

  <br>



  {{App\Global_var::getLangString('Created_At', $language_strings)}}:

  <label class="label label-default">{{date('M j Y h:i', strtotime($location_product_price->created_at))}}</label>

  {{App\Global_var::getLangString('Updated_At', $language_strings)}}:

  <label class="label label-default">{{date('M j Y h:i', strtotime($location_product_price->updated_at))}}</label>      



</div>

</div>



    </div>

      </div>

    </div>

  </div>
