@extends("layouts.master")
@section("title", "show user")

@section("bodyContent") 
@include('users.ajax.show')
@stop

