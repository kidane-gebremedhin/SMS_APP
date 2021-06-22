@extends("layouts.master")

@section('title', 'send sms messages')

@section("bodyContent") 

@include('sms_messages.ajax.sent_bulk_sms_messages')

@stop
