@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('transfer_requests_from_school_to_schools.ajax.delete-confirm')
@stop