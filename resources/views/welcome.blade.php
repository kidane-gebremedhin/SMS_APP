 @extends('layouts._app')
@section('headerL')
    Dashbord   
        <small></small>
  @endsection
@section('content')
<div class="col-md-8">
<div class="month">      
  <ul>
    <li class="prev"><a style="text-decoration: none;color: white" href="">&#10094;</a></li>
    <li class="next"><a style="text-decoration: none;color: white" href="">&#10095;</a></li>
    <li>
        {{date("F",mktime(0, 0, 0, date('m') , 1, date('Y')))}}<br>
      <span style="font-size:18px">{{date('Y')}}</span>
    </li>
  </ul>
</div>
<ul class="days">  
   @for ($i=1; $i <= date("t",mktime(0, 0, 0, date('m') , 1, date('Y'))) ; $i++)      
        <li><span>{{$i}}</span></li>
 @endfor 
</ul>
<div class="col-md-12">
					    <div class="col-md-4 col-md-offset-8">
					        <b class="col-md-12">
                    <i class="fa  fa-angle-double-right"></i> leaves :</b>
					            <div class="col-md-12 col-md-offset-2">
                        <?php $total=0; ?>
					                 @foreach($reasons as $reason)
                            <li style="list-style-type: none;">{{$reason->reasonType}}:
                              @if(array_key_exists($reason->id,$attendance))
                             <?php
                                $count=0; 
                                foreach ($attendance[$reason->id] as $k) {
                                  if($k['typeOfLeave']==0)
                                    $count++;
                                  else $count+=0.5;
                                }
                                  $total+=$count;
                              ?>
                              <span class="pull-right">{{$count}}</span>
                             @else
                               <span class="pull-right">0</span>
                             @endif
                           </li>
                           @endforeach
                           <br>
                           Total: <span class="pull-right">{{$total}}</span>
					            </div>
					    </div>
</div>
</div>


<div class="col-md-4">
	<div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              @if($absent==-1)
              <h5>Todays Attendance is not taken</h5>
              @else
              <h3>{{$absent}}</h3>
              @endif
              <p>Today's Absent Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	<div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$totalcount}}</h3>

              <p> Total-Active Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('/employees')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$apps}}</h3>

              <p>New Leave Applications</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('/leaveApp')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              High absent emp's {{$count}}s days in this month<hr>
              <span>
                @foreach($employees as $employee)
                <li style="list-style: none;font-size: 11px"><i class="fa fa-arrow-circle-right"></i> {{$employee->firstName}} {{$employee->middleName}} </li>
                @endforeach
              </span>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('/Attendance-Summery')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$awards}}</h3>

              <p>Given Awards</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('/allAwards')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              @if($holiday!=null)
              {{$holiday->holidayDate}}<br>
              <h4>{{$holiday->occasion}}</h4>
              @else
              No Upcoming Holiday
              @endif
              <p>Upcoming Holiday</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('/holidays')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
</div>
@endsection


