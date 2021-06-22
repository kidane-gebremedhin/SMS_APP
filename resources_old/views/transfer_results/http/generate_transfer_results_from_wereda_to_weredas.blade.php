@extends("layouts.master")
@section("title", "create")

@section("bodyContent") 
@include('transfer_results.ajax.generate_transfer_results_from_wereda_to_weredas')
@stop
