@extends("layouts.master")
@section("title", "show")

@section("bodyContent") 
@include('transfer_requests_from_wereda_to_weredas.ajax.show')
@stop

