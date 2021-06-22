<div class="col-md-12">	
<hr>
	<label class="col-md-3">
	<strong class="pull-left">{{ App\Global_var::getLangString('Measurment_Type', $language_strings) }}</strong> 
	</label>
	<div class="col-md-4">	
	{!!  Form::select('measurmentTypeId', [null=>'-- --']+$measurment_types->pluck('name', 'id')->toArray(), App\location_product_price::roundProductMeasurmentType($product_type->id, $round->id), array('class'=>'select2 form-control', 'required'=>'true')) !!} 
	</div>
	</div>

        <div class="col-md-12" style="padding-top:15px;">
@if(count($locations)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Location', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Price', $language_strings)}} {{App\Global_var::getLangString('In_Birr', $language_strings)}}
          </th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($locations as $location)
          <tr>
            <td>{{$count++}}</td>
            <td>
                {{$location->name}}
            </td>
            <td>
<div class="col-md-4">{!!  Form::text('price_'.$location->id, App\location_product_price::productLocationPrice($product_type->id, $location->id, $round->id), array('class'=>'number form-control', 'required'=>'true')) !!} </div>
            </td>
            <!--<td>
		<?php $measurmentType = App\location_product_price::productLocationMeasurmentType($product_type->id, $location->id, $round->id); ?>
                {!!  Form::select('measurmentTypeId_'.$location->id, [null=>'-- --']+$measurment_types->pluck('name', 'id')->toArray(), App\location_product_price::roundProductMeasurmentType($product_type->id, $round->id), array('class'=>'select2 form-control', 'required'=>'true')) !!}
            </td>-->
          </tr>
          @endforeach
	<tr>
            <td colspan="2"></td>
            <td>
             <button type="submit" class="btn btn-success btn-block">
	      <i class="fa fa-save"></i> 
	      {!! App\Global_var::getLangString('Save', $language_strings) !!}
	    </button>
            </td>
          </tr>
        </tbody>
      </table>

      @else
      <div class="col-md-12"><hr><h4 class="col-md-offset-2">
        {{App\Global_var::getLangString('List_Not_Found', $language_strings)}}
      </h4></div>
      @endif

        </div>
