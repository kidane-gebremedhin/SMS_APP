<div id="ajaxContent">
  <div class="col-md-12">
  <ul class="nav nav-tabs st-nav-tabs">
    <li><a class="tap_element" href="#first_tab" data-toggle="tab">{{App\Global_var::getLangString('Incoming_Requests', $language_strings)}} </a></li>
    <li><a class="tap_element" href="#Outgoing_Requests" data-toggle="tab">{{App\Global_var::getLangString('Outgoing_Requests', $language_strings)}}</a></li>
  </ul>
</div>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade in" id="first_tab">
  <div class="col-md-12" style="padding-top:30px;">
    
  <div class="col-md-12">
    <div class="col-md-12 panel panel-success">
      <h4><label class="badge bg-green">{{$transfer_requests_from_wereda_to_weredas!=null? $transfer_requests_from_wereda_to_weredas->count(): 0}}</label> / <label class="badge">{{$transfer_requests_from_wereda_to_weredas->total()}}</label> 
        {{App\Global_var::getLangString('Transfer_requests_from_wereda_to_weredas', $language_strings)}}
        @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.create'))
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('transfer_requests_from_wereda_to_weredas.create')}}" nextUrl="{{route('transfer_requests_from_wereda_to_weredas.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      @endif
      </h4>
      @if(count($transfer_requests_from_wereda_to_weredas)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Teacher', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Gender', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Service_Years', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Round', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Request_Type', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('From_Wereda', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('To_Wereda', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($transfer_requests_from_wereda_to_weredas as $transfer_requests_from_wereda_to_wereda)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->teacher!=null? $transfer_requests_from_wereda_to_wereda->teacher->firstName.' '.$transfer_requests_from_wereda_to_wereda->teacher->lastName.' '.$transfer_requests_from_wereda_to_wereda->teacher->middleName: ''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->teacher!=null? $transfer_requests_from_wereda_to_wereda->teacher->gender:''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->calculatedServiceYears}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->round!=null? $transfer_requests_from_wereda_to_wereda->round->name: ''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->requestType!=null? $transfer_requests_from_wereda_to_wereda->requestType->name: ''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->fromWereda!=null? $transfer_requests_from_wereda_to_wereda->fromWereda->name:''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->toWereda!=null? $transfer_requests_from_wereda_to_wereda->toWereda->name:''}}</td>
            <td>      
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-transfer_requests_from_wereda_to_weredamenu pull-right">
                    @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.show'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('transfer_requests_from_wereda_to_weredas.show', $transfer_requests_from_wereda_to_wereda->id)}}" value="{{$transfer_requests_from_wereda_to_wereda->id}}" nextUrl="{{route('transfer_requests_from_wereda_to_weredas.show', $transfer_requests_from_wereda_to_wereda->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.edit'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('transfer_requests_from_wereda_to_weredas.edit', $transfer_requests_from_wereda_to_wereda->id)}}" value="{{$transfer_requests_from_wereda_to_wereda->id}}" nextUrl="{{route('transfer_requests_from_wereda_to_weredas.edit', $transfer_requests_from_wereda_to_wereda->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.delete'))
                    <li><a class="get btn btn-lg" href="{{route('transfer_requests_from_wereda_to_weredas.delete', $transfer_requests_from_wereda_to_wereda->id)}}" value="{{$transfer_requests_from_wereda_to_wereda->id}}" nextUrl="{{route('transfer_requests_from_wereda_to_weredas.delete', $transfer_requests_from_wereda_to_wereda->id)}}"><i class="fa fa-trash"></i> 
                      {{App\Global_var::getLangString('Delete', $language_strings)}}
                    </a></li>
                  @endif
                  </ul>
                </li>
              </ul>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="col-md-12"><hr><h4 class="col-md-offset-2">
        {{App\Global_var::getLangString('List_Not_Found', $language_strings)}}
      </h4></div>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <center>
      {{$transfer_requests_from_wereda_to_weredas->links()}}
    </center>
  </div>

  </div>    
  </div>

  <div class="tab-pane fade in" id="Outgoing_Requests">
    <div class="col-md-12" style="padding-top:30px;">
    
  <div class="col-md-12">
    <div class="col-md-12 panel panel-success">
      <h4><label class="badge bg-green">{{$transfer_requests_from_wereda_to_weredas_out!=null? $transfer_requests_from_wereda_to_weredas_out->count(): 0}}</label> / <label class="badge">{{$transfer_requests_from_wereda_to_weredas_out->total()}}</label> 
        {{App\Global_var::getLangString('Transfer_requests_from_wereda_to_weredas_out', $language_strings)}}
        @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas_out.create'))
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('transfer_requests_from_wereda_to_weredas.create')}}" nextUrl="{{route('transfer_requests_from_wereda_to_weredas.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      @endif
      </h4>
      @if(count($transfer_requests_from_wereda_to_weredas_out)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Teacher', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Gender', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Service_Years', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Round', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Request_Type', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('From_Wereda', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('To_Wereda', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($transfer_requests_from_wereda_to_weredas_out as $transfer_requests_from_wereda_to_wereda)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->teacher!=null? $transfer_requests_from_wereda_to_wereda->teacher->firstName.' '.$transfer_requests_from_wereda_to_wereda->teacher->lastName.' '.$transfer_requests_from_wereda_to_wereda->teacher->middleName: ''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->teacher!=null? $transfer_requests_from_wereda_to_wereda->teacher->gender:''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->calculatedServiceYears}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->round!=null? $transfer_requests_from_wereda_to_wereda->round->name: ''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->requestType!=null? $transfer_requests_from_wereda_to_wereda->requestType->name: ''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->fromWereda!=null? $transfer_requests_from_wereda_to_wereda->fromWereda->name:''}}</td>
            <td>{{$transfer_requests_from_wereda_to_wereda->toWereda!=null? $transfer_requests_from_wereda_to_wereda->toWereda->name:''}}</td>
            <td>      
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-transfer_requests_from_wereda_to_weredamenu pull-right">
                    @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.show'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('transfer_requests_from_wereda_to_weredas.show', $transfer_requests_from_wereda_to_wereda->id)}}" value="{{$transfer_requests_from_wereda_to_wereda->id}}" nextUrl="{{route('transfer_requests_from_wereda_to_weredas.show', $transfer_requests_from_wereda_to_wereda->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.edit'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('transfer_requests_from_wereda_to_weredas.edit', $transfer_requests_from_wereda_to_wereda->id)}}" value="{{$transfer_requests_from_wereda_to_wereda->id}}" nextUrl="{{route('transfer_requests_from_wereda_to_weredas.edit', $transfer_requests_from_wereda_to_wereda->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('transfer_requests_from_wereda_to_weredas.delete'))
                    <li><a class="get btn btn-lg" href="{{route('transfer_requests_from_wereda_to_weredas.delete', $transfer_requests_from_wereda_to_wereda->id)}}" value="{{$transfer_requests_from_wereda_to_wereda->id}}" nextUrl="{{route('transfer_requests_from_wereda_to_weredas.delete', $transfer_requests_from_wereda_to_wereda->id)}}"><i class="fa fa-trash"></i> 
                      {{App\Global_var::getLangString('Delete', $language_strings)}}
                    </a></li>
                  @endif
                  </ul>
                </li>
              </ul>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="col-md-12"><hr><h4 class="col-md-offset-2">
        {{App\Global_var::getLangString('List_Not_Found', $language_strings)}}
      </h4></div>
      @endif
    </div>
  </div>
  
  <div class="col-md-12">
    <center>
      {{$transfer_requests_from_wereda_to_weredas_out->links()}}
    </center>
  </div>

  </div>
  </div>

</div>
 </div>
