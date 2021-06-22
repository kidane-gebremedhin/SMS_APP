@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('recipients.ajax.delete-confirm')
@stop
