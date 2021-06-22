@extends("layouts.master")
@section("title", "show")

@section("bodyContent") 
@include('transfer_requests_from_school_to_schools.ajax.show')
@stop

