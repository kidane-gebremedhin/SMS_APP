@extends("layouts.master")
@section("title", "Import Users")

@section("bodyContent") 
@include('users.ajax.import')
@stop
