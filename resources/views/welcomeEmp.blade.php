 @extends('layouts._app')
@section('headerL')
    Dashbord 
        <small></small>
  @endsection
@section('content')
<div class="col-md-7">
<div class="month">      
  <ul>
    <li class="prev"><a style="text-decoration: none;color: white" href="">&#10094;</a></li>
    <li class="next"><a style="text-decoration: none;color: white" href="">&#10095;</a></li>
    <li>
        Janu<br>
      <span style="font-size:18px">2000</span>
    </li>
  </ul>
</div>
<ul class="days">  
   @for ($i=1; $i <= 31 ; $i++)
      
        <li><span>{{$i}}</span></li>
      
        
      
   @endfor 
</ul>
<div class="col-md-12">
					    <div class="col-md-6 col-md-offset-6">
					        <b class="col-md-12"><i class="fa  fa-angle-double-right"></i> leaves :</b>
					            <div class="col-md-4 col-md-offset-1">
					                 adsfgdshgfsafgksghgh
					            </div>
					    </div>
</div>
</div>
<div class="col-md-5">
	<div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Absent Employees</p>
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
              <h3>150</h3>

              <p> To-Active Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Upcoming Holidays</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <span style="font-size: 23px">solomon hagos</span>

              <p>High absent emp'e</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Given Awards</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Leave Appications</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
</div>
@endsection
