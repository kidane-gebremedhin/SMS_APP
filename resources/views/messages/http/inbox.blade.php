@extends("layouts.master")

@section('title', 'inbox')

@section("bodyContent") 

@include('messages.ajax.inbox')

@stop
