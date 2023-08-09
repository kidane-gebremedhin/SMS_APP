<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-12 panel panel-success">
      <h4><label class="badge bg-green">{{$messages!=null? count($messages): 0}}</label> 
        {{App\Global_var::getLangString('Sent_SMS_Messages', $language_strings)}}
      </h4>
       <h3 align="center">{{App\Global_var::getLangString('Export_To_Excel/PDF', $language_strings)}} &nbsp; &nbsp; &nbsp; 
        <a href="{{route('home')}}" class="get pull-right" style="margin-left: 10px"><i class="fa fa-back"></i> Back to Home </a>
        <button class="printBtn btn btn-warning pull-right" printArea=".printArea" title="{{App\Global_var::getLangString($logo->logoText, $language_strings)}}" footer="{{App\Global_var::getLangString($logo->logoText, $language_strings)}}" style="margin-left: 10px"><i class="fa fa-print"></i> PDF </button>
        <a href="{{ route('sentSmsReportExel', ['csv']) }}" class="btn btn-success pull-right" style="margin-left: 10px"><i class="fa fa-download"></i> <!--CSV-->Excel
        {{App\Global_var::getLangString('Download', $language_strings)}}</a>
      </h3>

      <div class="printArea">
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
      @else
      <div class="col-md-12"><hr><h4 class="col-md-offset-2">
        {{App\Global_var::getLangString('List_Not_Found', $language_strings)}}
      </h4></div>
      @endif
      </div>
    </div>
  </div>
  <div class="col-md-8">
  </div>
</div>
