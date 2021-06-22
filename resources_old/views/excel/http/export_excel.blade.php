@extends("layouts.master")
@section("title", "export_excel")

@section("bodyContent") 
@include('excel.ajax.export_excel')
@stop
