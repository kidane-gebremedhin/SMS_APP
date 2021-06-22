  <div class="col-md-12">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-success">
  <div class="panel-heading">     
      </div>
  <div class="panel-body">
      @if(count($inboxMessages)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Subject', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Message_Body', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Sender', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($inboxMessages as $message)
          <tr class="messageRow" messageId='{{$message->id}}' style="background: #ccffcc; color: orange; font-weight: bold; border-left: 5px solid orange; border-right: 1px solid green">
            <td>{{$count++}}</td>
            <td>{{$message->subject}}</td>
            <td>{{strlen($message->body)>50? substr($message->body, 0, 50).'...': $message->body}}
            </td>
            <td>{{$message->senders->first()!=null? $message->senders->first()->email: ''}}</td>
            <td>      
              <a class="get btn btn-default btn xs" href="{{route('messages.show_inbox', $message->id)}}"><i class="fa fa-eye"> </i></a>
            </td>
          </tr>
          <tr>
          <td colspan="5">
            <div class="{{$message->id}}_detailArea detailArea" isVisible="false" style="display: none;">
              <div class="col-md-10 col-md-offset-2">
                <strong>{{$message->subject}}</strong>
                <hr>
                <p>{{$message->body}}</p>
                <p>{{$message->senders->first()!=null? $message->senders->first()->email: ''}}</p>
                <hr>
                <p>{{App\Global_var::getLangString('Date', $language_strings)}}: {{date('M j Y h:i', strtotime($message->created_at))}}</p>
              </div>
            </div>
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
  <div class="col-md-8">
    <center>
      {{$inboxMessages->links()}}
    </center>
  </div>
</div>
</div>
</div>
