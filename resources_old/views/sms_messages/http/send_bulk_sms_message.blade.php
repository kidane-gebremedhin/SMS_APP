@extends("layouts.master")

@section('title', 'send sms messages')

@section("bodyContent") 

@include('sms_messages.ajax.send_bulk_sms_message')

@stop
