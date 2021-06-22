@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('recipient_categories.ajax.delete-confirm')
@stop
