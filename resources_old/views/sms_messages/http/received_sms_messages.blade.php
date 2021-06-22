@extends("layouts.master")

@section('title', 'received sms messages')

@section("bodyContent") 

@include('sms_messages.ajax.received_sms_messages')

@stop
