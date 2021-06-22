@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('currency_types.ajax.delete-confirm')
@stop