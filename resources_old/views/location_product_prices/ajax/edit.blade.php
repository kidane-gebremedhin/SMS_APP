x<div class="col-md-12">

  <div class="col-md-8">

    {{Form::model($location_product_price, array("route"=>["location_product_prices.update", $location_product_price->id], "method"=>"POST", "class"=>"post"))}}

    <label class="nextUrl" nextUrl="{{route('location_product_prices.index')}}" />

    <div class="panel panel-success">

      <div class="panel-heading"> 

        {{App\Global_var::getLangString('Edit_Location_Product_Price', $language_strings)}}

        <a href="{{route('location_product_prices.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('location_product_prices.index')}}"><i class="fa fa-eye"></i> 

          {{App\Global_var::getLangString('List', $language_strings)}}

        </a>  

      </div>

      <div class="panel-body">

        <div class="col-md-12" style="padding-top:15px;">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Round', $language_strings)}}          
            </label>
            <div class="col-md-8">
	      {{--{!!  Form::select('roundId', [null=>'-- --']+$rounds->pluck('name', 'id')->toArray(), $location_product_price->roundId, array('class'=>'select2 form-control', 'disabled'=>'disabled')) !!}--}}
	{{$location_product_price->round!=null? $location_product_price->round->name:''}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Product_Type', $language_strings)}}          
            </label>
            <div class="col-md-8">
              {{$location_product_price->productType!=null? $location_product_price->productType->name:''}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Location', $language_strings)}}          
            </label>
            <div class="col-md-8">
              {{$location_product_price->location!=null? $location_product_price->location->name:''}}
            </div>
          </div>
        <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Price', $language_strings)}}          
            </label>
            <div class="col-md-8">
              {{ Form::text('price', $location_product_price->price, array('class'=>'number form-control', 'required'=>'true'))}}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {{App\Global_var::getLangString('Measurment_Type', $language_strings)}}          
            </label>
            <div class="col-md-8">
	      {!!  Form::select('measurmentTypeId', [null=>'-- --']+$measurment_types->pluck('name', 'id')->toArray(), $location_product_price->measurmentTypeId, array('class'=>'select2 form-control', 'required'=>'true')) !!}
            </div>
          </div>
         
          <div class="col-md-12 form-group text-center">

            <div class="col-md-8 col-md-offset-4">

              <button type="submit" class="btn btn-success btn-block">

              <i class="fa fa-save"></i> 

              {!! App\Global_var::getLangString('Update', $language_strings) !!}

            </button>

            </div>

          </div>

        </div>

      </div>

    </div>

    {{Form::close()}}

  </div>

</div>




