@extends("layouts.master")

@section('title', 'index')

@section("bodyContent") 

@include('transfer_requests_from_wereda_to_weredas.ajax.index')

@stop
