@extends("layouts.master")
@section("title", "delete user")

@section("bodyContent") 
@include('users.ajax.delete-confirm')
@stop