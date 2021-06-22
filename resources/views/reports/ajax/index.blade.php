<a class="get" href="{{route('sentSmsReport')}}">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="dashboard-menus panel-body alert-warning_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/sent_bulk_sms_messages.png')}}" style="width: 100%;height: 125px;">
                </div>
                
            <div class="col-xs-12" >
            <hr>
            <center><h4>{{App\Global_var::getLangString('Sent_SMS_Messages', $language_strings)}} <label class=" badge bg-orange"></label></h4></center>
            </div>
            </div>
        </div>
    </div>
    </a>
<a class="get" href="{{route('receivedSmsReport')}}">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="dashboard-menus panel-body alert-warning_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/read_sms.png')}}" style="width: 100%;height: 105px;">
                </div>
                
            <div class="col-xs-12" >
                <hr>
                <center><h4>{{App\Global_var::getLangString('Received_SMS_Messages', $language_strings)}} <label class=" badge bg-orange"></label></h4></center>
            </div>
            </div>
        </div>
    </div>
    </a>
    
<a class="get" href="{{route('productLocationPricesPrint', [0,0])}}">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="dashboard-menus panel-body alert-warning_">
                <div class="col-xs-12">
                    <img src="{{asset('images/icons/location_product_prices.png')}}" style="width: 100%;height: 105px;">
                </div>
                
            <div class="col-xs-12" >
                <hr>
                <center><h4>{{App\Global_var::getLangString('Product Location Prices', $language_strings)}} <label class=" badge bg-orange"></label></h4></center>
            </div>
            </div>
        </div>
    </div>
    </a>
    
