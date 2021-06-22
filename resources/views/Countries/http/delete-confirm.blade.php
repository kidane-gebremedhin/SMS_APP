@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('Countries.ajax.delete-confirm')
@stop