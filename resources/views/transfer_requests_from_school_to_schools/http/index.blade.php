@extends("layouts.master")

@section('title', 'index')

@section("bodyContent") 

@include('transfer_requests_from_school_to_schools.ajax.index')

@stop
