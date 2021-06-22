@extends("layouts.master")

@section('title', 'index')

@section("bodyContent") 

@include('recipients.ajax.index')

@stop
