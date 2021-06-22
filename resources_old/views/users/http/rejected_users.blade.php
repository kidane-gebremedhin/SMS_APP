@extends("layouts.master")

@section('title', 'rejected users')

@section("bodyContent") 

@include('users.ajax.rejected_users')

@stop
