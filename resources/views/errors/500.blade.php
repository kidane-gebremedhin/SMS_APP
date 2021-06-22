@extends("layouts.error-layout")
@section("bodyContent") 
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">{{App\Global_var::getLangString('Developer_Exception', $language_strings)}}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">                
                <h3 class="pull-left">500 
                    <small>{{App\Global_var::getLangString('Developer_Exception', $language_strings)}} 
                    </small>  &nbsp; &nbsp; 
                    <small><a href="{{route('home')}}" data-toggle="tab">
                    {{App\Global_var::getLangString('Back', $language_strings)}} {{App\Global_var::getLangString('Home', $language_strings)}}</a> </small>                   
                </h3> 
                <h3 class="pull-right">                    
                    <small><a> 
                    {{App\Global_var::getLangString('Call', $language_strings)}}: +251(0)3 4241 8687</a> </small>
                </h3>
            </div> 
        </div>
    </div>
</div>
@stop
