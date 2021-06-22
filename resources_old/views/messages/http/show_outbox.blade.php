@extends("layouts.master")
@section("title", "show")

@section("bodyContent") 
@include('messages.ajax.show_outbox')
@stop

