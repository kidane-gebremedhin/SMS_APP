<div id="ajaxContent">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h4><label class="badge bg-green">{{$transfer_requests_from_school_to_schools!=null? $transfer_requests_from_school_to_schools->count(): 0}}</label>
        {{App\Global_var::getLangString('Transfer_results_from_school_to_schools', $language_strings)}}
        <button class="resultsBtn btn btn-default pull-right" style="color: green;" onclick="displayTransferResults()"><i class="fa fa-eye"></i> {{App\Global_var::getLangString('Play', $language_strings)}}</button>
        <input type="hidden" id="isPlaying" value="false">
      </h4>
      </div>
      <div class="panel-body">
      @if(count($transfer_requests_from_school_to_schools)>0)
      <div class="singleResultAtTimeDiv">
      <div class="col-md-12">
        <div class="col-md-4"><strong><center>{{App\Global_var::getLangString('Full_Name', $language_strings)}}</center></strong></div>
        <div class="col-md-1"></div>
        <div class="col-md-3"><strong><center>{{App\Global_var::getLangString('From', $language_strings)}}</center></strong></div>
        <div class="col-md-1"></div>
        <div class="col-md-3"><strong><center>{{App\Global_var::getLangString('To', $language_strings)}}</center></strong></div>
      </div>
      <div class="col-md-12">
        <div class="col-md-4" style="border: 1px solid lightgray; background: #fff; height:150px">
        <center><br><br>
          <h2 class="fullNameDiv"></h2></center>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3" style="border: 1px solid lightgray; background: #fff; height:150px">
        <center><br><br>
          <h2 class="fromDiv"></h2></center>
        </div>
        <div class="col-md-1"><br><br><br><strong><center>=></center></strong></div>
        <div class="col-md-3" style="border: 1px solid lightgray; background: #fff; height:150px">
          <center><br><br>
          <h2 class="toDiv"></h2></center>
        </div>
      </div>
      <div class="col-md-12">
      <hr>
        <h3>{{App\Global_var::getLangString('Counter', $language_strings)}} &nbsp; &nbsp; &nbsp; <span class="counterArea"></span></h3>
      </div>
      </div>
      <table class="allResultAtTimeDiv table table-striped table-hover" style="display: none;">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Teacher', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Gender', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Request_Type', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Service_Years', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('From_School', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('To_School', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($transfer_requests_from_school_to_schools as $result)
          <?php 
          if($result->request==null || $result->request->teacher==null)
            continue;
           ?>
          <tr>
            <td>{{$count++}}</td>
            <td>{{$result->request->teacher!=null? $result->request->teacher->firstName.' '.$result->request->teacher->lastName.' '.$result->request->teacher->middleName: ''}}</td>
            <td>{{$result->request->teacher!=null? $result->request->teacher->gender:''}}</td>
            <td>{{$result->request->requestType!=null? $result->request->requestType->name: ''}}</td>
            <td>{{$result->request->calculatedServiceYears}}</td>
            <td>{{$result->request->fromSchool!=null? $result->request->fromSchool->name:''}}</td>
            <td>{{$result->request->toSchool!=null? $result->request->toSchool->name:''}}</td>
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
</div>



<script type="text/javascript">
var interval;
var currentIndex=0;
var index=0;
function displayTransferResults(){
  var isPlaying=$("#isPlaying").val();

  $('.singleResultAtTimeDiv').css('display', 'block');
  $('.allResultAtTimeDiv').css('display', 'none');

  let results = new Array();
    @foreach($transfer_requests_from_school_to_schools as $result)
      results.push({!! $result->request !!});
    @endforeach
var lengthOfSingleResultInMilliSeconds={!!$setting->lengthOfSingleResultInMilliSeconds!!};
    if(isPlaying=='true'){
      $("#isPlaying").val('false');
      $(".resultsBtn").text('Play');
      $(".resultsBtn").css('color', 'green');
      currentIndex=index;
      clearTimeout(interval);
    }else{
      $("#isPlaying").val('true');
      $(".resultsBtn").text('Pause');
      $(".resultsBtn").css('color', 'orange');
      index=currentIndex;
    interval=setInterval(function(){
      if(index>=results.length){
      $("#isPlaying").val('false');
      $(".resultsBtn").text('Play');
      $(".resultsBtn").css('color', 'green');
        currentIndex=index=0;
        clearTimeout(interval);
        $('.singleResultAtTimeDiv').css('display', 'none');
        $('.allResultAtTimeDiv').css('display', 'block');
        $('.fullNameDiv, .fromDiv, .toDiv').empty();
      }
      
        $('.counterArea').empty().append((index+1)+'/'+results.length)
        $('.fullNameDiv').empty().append(results[index].teacher.firstName+" "+results[index].teacher.lastName+" "+results[index].teacher.middleName);
       $('.fromDiv').empty().append(results[index].from_school.name);
       $('.toDiv').empty().append(results[index].to_school.name);

      index++;
    }, lengthOfSingleResultInMilliSeconds);
  }
}
</script>