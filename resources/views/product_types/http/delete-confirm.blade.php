@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('product_types.ajax.delete-confirm')
@stop
