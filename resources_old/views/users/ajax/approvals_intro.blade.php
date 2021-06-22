  <div class="col-md-12 ">    
  <div class="col-md-10 col-md-offset-1 ">    
          
        </div>
        @if($currentUser->isGranted('users.approveNewUser'))
        <div class="col-md-6"> 
        <div class="panel panel-success"> 
        <div class="panel-heading">
        <h4>
            {{App\Global_var::getLangString('Approvals', $language_strings)}}
        </h4> 
        </div>
        <div class="panel-body">
                <a class="get" href="{{route('users.newUsers')}}" style="color: orange">
                <h2><i class="fa fa-list"></i> {{count(App\User::where('isDeleted', 'false')->where('isApproved', 'false')->get())}} {{App\Global_var::getLangString('New_Users', $language_strings)}}
                </h2>
                </a>
               </div>
          </div>
        </div>
          @endif
        </div>

