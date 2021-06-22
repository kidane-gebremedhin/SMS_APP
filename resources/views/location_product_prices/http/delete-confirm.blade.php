@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('location_product_prices.ajax.delete-confirm')
@stop
