@extends("layouts.master")

@section('title', 'Reports-index')

@section("bodyContent") 

@include('Reports.ajax.index')

@stop
