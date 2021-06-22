@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('roles.ajax.delete-confirm')
@stop