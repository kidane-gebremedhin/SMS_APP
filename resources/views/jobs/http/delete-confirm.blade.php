@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('jobs.ajax.delete-confirm')
@stop