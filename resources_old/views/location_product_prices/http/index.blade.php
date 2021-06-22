@extends("layouts.master")

@section('title', 'index')

@section("bodyContent") 

@include('location_product_prices.ajax.index')

@stop
