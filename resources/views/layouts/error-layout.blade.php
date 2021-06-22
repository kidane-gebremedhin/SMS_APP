
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
    {{App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logoText : ''}} | @yield('title')
    </title>

    <link href="{{ asset('build/css/kg_custom.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/modern-business.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


<!-- my Css -->
    <link href="{{ asset('css/_myStyle.css')}}" rel="stylesheet">



<div id="container" style="margin-top: 80px; height: 400px">
    @yield('bodyContent')
</div>

    <!-- /footer content -->
@include('partials._footer')
