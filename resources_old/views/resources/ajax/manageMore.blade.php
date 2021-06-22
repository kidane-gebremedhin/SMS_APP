<div id="ajaxContent">
<div class="row">
	<div class="panel panel-info col-md-10 col-md-offset-1">
  {{-- List --}}
  <div class="menu_section" style="padding-top: 50px">
   <ul class="nav">
   <li class="col-md-6 col-md-offset-6"><a href="{{route('resources.manageMore_3rdLevel')}}" class="get" nextUrl="{{route('resources.manageMore_3rdLevel')}}" style="text-align: right"><i class="fa fa-gears"></i> ሲስተም ዝጥቀመሎም መረዳእታታት</a> 
  @foreach($resources as $resource)
                    <?php
                    if($resource->menuLevel!=2 && $resource->menuLevel!=3){
                      continue;/*skips sub-menus*/
                    }
                    ?>
                 <li class="col-md-6"><a href="{{route($resource->route)}}" class="get btn btn-default" nextUrl="{{route($resource->route)}}" style="text-align: left"><i class="fa fa-list" ></i> {{$resource->shortCut}}</a> 
                  </li>
        @endforeach 
        </ul>
        </div>
        {{-- end of List --}}
	</div>
</div>

</div>

