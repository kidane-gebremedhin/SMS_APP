@extends("layouts.master")
@section("title", "show")

@section("bodyContent") 
@include('recipient_categories.ajax.show')
@stop

