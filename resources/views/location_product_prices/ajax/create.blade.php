<div class="col-md-12">

  <div class="col-md-10">

    {!! Form::open(array("route"=>["location_product_prices.store", $product_type->id], "method"=>"POST", "class"=>"priceForm post")) !!}

    <label class="nextUrl" nextUrl="{!! route('location_product_prices.index') !!}" />

    <div class="panel panel-success">

      <div class="panel-heading">

        {{ App\Global_var::getLangString('Set_Product_Type_Price', $language_strings) }} 

        <a href="{!! route('location_product_prices.index') !!}" class="get btn btn-success btn-sm pull-right" nextUrl="{!! route('location_product_prices.index') !!}"><i class="fa fa-eye"></i>  

          {!! App\Global_var::getLangString('List', $language_strings) !!}

        </a> 

      </div>

      <div class="panel-body">
	<div class="col-md-12">	
<hr>
	<h3 class="col-md-4">{{ App\Global_var::getLangString('Product_Type', $language_strings) }} <u>{{$product_type->name}}</u></h3>
	<label class="col-md-2">
	<strong class="pull-right">{{ App\Global_var::getLangString('Round', $language_strings) }}</strong> 
	</label>
	<div class="col-md-4">	{!!  Form::select('roundId', [null=>'-- --']+$rounds->pluck('name', 'id')->toArray(), $round!=null? $round->id: null, array('class'=>'roundId select2 form-control', 'required'=>'true', 'url'=>route("location_product_prices.create", $product_type->id))) !!}
	</div>

	</div>
	<hr>
	<div class="ajaxContentDiv">
	<!--start empty page-->
	{{--@include('location_product_prices.ajax.create-ajax-body')--}}
        </div>

      </div>

    </div>

    {!! Form::close() !!}

  </div>

</div>




