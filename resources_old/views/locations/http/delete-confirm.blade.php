@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('locations.ajax.delete-confirm')
@stop
