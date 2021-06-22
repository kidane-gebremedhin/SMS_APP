<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-12 panel panel-success">
      <h4><label class="badge bg-green">{{$messages!=null? count($messages): 0}}</label> / <label class="badge bg-green">{{$messages!=null? $messages->total(): 0}}</label> 
        {{App\Global_var::getLangString('Sent_Bulk_SMS_Messages', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('send_bulk_sms')}}" nextUrl="{{route('send_bulk_sms')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
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
            {{App\Global_var::getLangString('Recipient', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Category', $language_strings)}}
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
            <td>{{$message->date}}</td>
            <td><span style="color: blue">{{($recipient=$message->recipient)!=null? $recipient->fullName.' '.$recipient->phoneNumber:''}}</span></td>
            <td>{{($category=$message->category)!=null? $category->name:''}}</td>
            <td>{{$message->message}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="col-md-12">{{$messages->links()}}</div>
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
