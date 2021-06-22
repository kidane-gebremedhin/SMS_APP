@extends("layouts.master")
@section("title", "create")

@section("bodyContent") 
@include('transfer_requests_from_school_to_schools.ajax.create')
@stop
