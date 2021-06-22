<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class location_product_price extends Model
{
    protected $table="location_product_prices";

    public function productType(){
    	return $this->belongsTo('App\product_type', 'productId', 'id');
    }

    public function location(){
    	return $this->belongsTo('App\location', 'locationId', 'id');
    }

    public function measurmentType(){
    	return $this->belongsTo('App\measurment_type', 'measurmentTypeId', 'id');
    }

    public function round(){
    	return $this->belongsTo('App\round', 'roundId', 'id');
    }

    public static function productLocationPrice($productId, $locationId, $roundId){
	$old_record=location_product_price::where('productId', $productId)->where('locationId', $locationId)->where('roundId', $roundId)->first();
    	return $old_record!=null? $old_record->price: null;
    }
    public static function productLocationMeasurmentType($productId, $locationId, $roundId){
	$old_record=location_product_price::where('productId', $productId)->where('locationId', $locationId)->where('roundId', $roundId)->first();
    	return $old_record!=null? $old_record->measurmentType: null;
    }

    public static function roundProductMeasurmentType($productId, $roundId){
	$location_product_prices=location_product_price::where('productId', $productId)->where('roundId', $roundId)->get();
	foreach($location_product_prices as $location_product_price){
	    if($location_product_price->measurmentType!=null)
		return $location_product_price->measurmentType->id;
	}
    	return null;
    }


    public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
    
}
