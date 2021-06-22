@extends("layouts.master")

@section('title', 'index')

@section("bodyContent") 

@include('Countries.ajax.index')

@stop
