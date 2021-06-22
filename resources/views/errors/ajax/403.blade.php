
    <div class="col-md-12">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">{{App\Global_var::getLangString('Unauthorized_Access', $language_strings)}}</h3>
            </div>
            <div class="panel-body">

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="transferFunds">
                     <p style="color: red">
                         {{App\Global_var::getLangString('Unauthorized_Access_Is_Prohabited', $language_strings)}}
                     </p>
                
                </div>
            </div>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="transferFunds">
                    <div class="col-md-12"><h1>403 <small>{{App\Global_var::getLangString('Unauthorized_Access', $language_strings)}}</small></h1></div>
                </div>
            </div>

            </div> 
        </div>
    </div>
    </div>
