@extends("layouts.master")
@section("title", "sent-sms-report")

@section("bodyContent") 
@include('excel.ajax.sent-sms-report')
@stop
