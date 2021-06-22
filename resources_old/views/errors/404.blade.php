@extends("layouts.error-layout")
@section("title", "Page_Not_Found")
@section("bodyContent") 
<div class="col-md-12">
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">{{App\Global_var::getLangString('Page_Not_Found', $language_strings)}}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">                
                <h3 class="pull-left">404 
                    <small>{{App\Global_var::getLangString('Page_Not_Found', $language_strings)}} 
                    </small>                    
                </h3> 
                <h3 class="pull-left"> &nbsp; &nbsp; 
                    <small><a href="{{route('home')}}" data-toggle="tab">
                    {{App\Global_var::getLangString('Back', $language_strings)}} {{App\Global_var::getLangString('Home', $language_strings)}}</a> </small>
                </h3>
                
            </div> 
        </div>
    </div>
</div>
</div>
@stop
