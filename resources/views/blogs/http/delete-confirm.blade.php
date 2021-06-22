@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('blogs.ajax.delete-confirm')
@stop