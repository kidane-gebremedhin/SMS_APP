<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-12 panel panel-success">
      <h4><label class="badge bg-green">{{$messages!=null? count($messages): 0}}</label> 
        {{App\Global_var::getLangString('Received_SMS_Messages', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('send_sms')}}" nextUrl="{{route('send_sms')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Send_SMS', $language_strings)}}
        </a>
        <a style="margin-left:20px; margin-right:20px;" class="get btn btn-success btn-sm navbar-right" href="{{route('send_bulk_sms')}}" nextUrl="{{route('send_bulk_sms')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Send_Bulk_SMS', $language_strings)}}
        </a>
      </h4>
      @if($messages!=null && count($messages)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Date', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Phone_Number', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Message', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($messages as $message)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$message["Date"]}}</td>
            <td><span style="color: blue">{{$message["Phone"]}}</span></td>
            <td>{{$message['Content']}}</td>
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
  <div class="col-md-8">
  </div>
</div>
