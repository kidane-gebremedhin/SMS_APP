@extends("layouts.master")

@section('title', 'index')

@section("bodyContent") 

@include('transfer_categories.ajax.index')

@stop
