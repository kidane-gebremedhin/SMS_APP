@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('transfer_requests_from_wereda_to_weredas.ajax.delete-confirm')
@stop