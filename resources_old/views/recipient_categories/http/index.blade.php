@extends("layouts.master")

@section('title', 'index')

@section("bodyContent") 

@include('recipient_categories.ajax.index')

@stop
