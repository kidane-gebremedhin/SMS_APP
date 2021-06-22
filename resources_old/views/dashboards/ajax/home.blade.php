{{--
<div class="col-md-6 col-md-offset-3">
<table class="table">
      <thead>
            <th colspan="2"><h4>{{App\Global_var::getLangString('Statistical_Data', $language_strings)}} </h4></th>
      </thead>
      <tbody>
            <tr>
                  <td><h4>{{App\Global_var::getLangString('Rounds', $language_strings)}} </h4></td>
                  <td>{{count($rounds)}}</td>
            </tr>
            <tr>
                  <td><h4>{{App\Global_var::getLangString('Product_Types', $language_strings)}} </h4></td>
                  <td>{{count($product_types)}}</td>
            </tr>
            <tr>
                  <td><h4>{{App\Global_var::getLangString('Locations', $language_strings)}} </h4></td>
                  <td>{{count($locations)}}</td>
            </tr>
            <tr>
                  <td><h4>{{App\Global_var::getLangString('Recipient_Categories', $language_strings)}} </h4></td>
                  <td>{{count($recipient_categories)}}</td>
            </tr>
            <tr>
                  <td><h4>{{App\Global_var::getLangString('Recipients', $language_strings)}} </h4></td>
                  <td>{{count($recipients)}}</td>
            </tr>
            <tr>
                  <td><h4>{{App\Global_var::getLangString('Sent_Messages', $language_strings)}} </h4></td>
                  <td>{{count($sent_messages)}}</td>
            </tr>
<!--
            <tr>
                  <td><h4>{{App\Global_var::getLangString('Received_Ressages', $language_strings)}} </h4></td>
                  <td>{{count($received_messages)}}</td>
            </tr>
-->
      </tbody>
</table>
</div>
--}}

<div class="col-md-12">
<div class="col-md-4" style="border: 1px solid gray; padding-top: 20px; padding-bottom: 20px; background: lightgreen;">
<center>
<h4>{{App\Global_var::getLangString('Rounds', $language_strings)}} </h4>
<h3>{{count($rounds)}}</h3>
</center>
</div>
<div class="col-md-4" style="border: 1px solid gray; padding-top: 20px; padding-bottom: 20px; background: gold;">
<center>
<h4>{{App\Global_var::getLangString('Product_Types', $language_strings)}} </h4>
<h3>{{count($product_types)}}</h3>
</center>
</div>
<div class="col-md-4" style="border: 1px solid gray; padding-top: 20px; padding-bottom: 20px; background: lightgreen;">
<center>
<h4>{{App\Global_var::getLangString('Locations', $language_strings)}} </h4>
<h3>{{count($locations)}}</h3>
</center>
</div>
<div class="col-md-4" style="border: 1px solid gray; padding-top: 20px; padding-bottom: 20px; background: gold;">
<center>
<h4>{{App\Global_var::getLangString('Recipient_Categories', $language_strings)}} </h4>
<h3>{{count($recipient_categories)}}</h3>
</center>
</div>
<div class="col-md-4" style="border: 1px solid gray; padding-top: 20px; padding-bottom: 20px; background: lightgreen;">
<center>
<h4>{{App\Global_var::getLangString('Recipients', $language_strings)}} </h4>
<h3>{{count($recipients)}}</h3>
</center>
</div>
<div class="col-md-4" style="border: 1px solid gray; padding-top: 20px; padding-bottom: 20px; background: gold;">
<center>
<h4>{{App\Global_var::getLangString('Sent_Messages', $language_strings)}} </h4>
<h3>{{count($sent_messages)}}</h3>
</center>
</div>
</div>


<div class="searchUrl col-md-12" searchUrl="{{route('home')}}">
  <hr>
  <div class="col-md-6">
    <label class="col-md-4">
    <strong class="pull-right">{{ App\Global_var::getLangString('Location', $language_strings) }}</strong> 
    </label>
    <div class="col-md-8">  {!!  Form::select('locationId', [null=>'-- --']+$locations->pluck('name', 'id')->toArray(), null, array('class'=>'locationId home_search_elem select2 form-control')) !!}
    </div>
  </div>
  <div class="col-md-6">
    <label class="col-md-4">
    <strong class="pull-right">{{ App\Global_var::getLangString('Product_Type', $language_strings) }}</strong> 
    </label>
    <div class="col-md-8">  {!!  Form::select('productTypeId', [null=>'-- --']+$product_types->pluck('name', 'id')->toArray(), null, array('class'=>'productTypeId home_search_elem select2 form-control')) !!}
    </div>
  </div>
</div>

<div class="searchResultDiv">
@include("dashboards.ajax.home-partial")
</div>
