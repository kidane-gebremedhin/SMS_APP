<div id="ajaxContent"> 
  <div class="col-md-12 ">
    <div class="col-md-8 panel panel-success"> 
        <h4><label class="badge bg-green">{{$zones!=null? $zones->count(): 0}}</label> / <label class="badge">{{$zones->total()}}</label> 
          {{App\Global_var::getLangString('Zones', $language_strings)}}
          <a class="get btn btn-success btn-sm navbar-right" href="{{route('zones.create')}}" nextUrl="{{route('zones.create')}}"><i class="fa fa-plus"></i> 
            {{App\Global_var::getLangString('Add', $language_strings)}}
          </a></h4>
        
        @if(count($zones)>0)
        <table class="table table-striped">
          <thead>
            <th>#</th>
            <th>{{App\Global_var::getLangString('Name', $language_strings)}}</th>
            <th>{{App\Global_var::getLangString('Region', $language_strings)}}</th>
            <th>{{App\Global_var::getLangString('Remark', $language_strings)}}</th>
            <th></th>

          </thead>
          <tbody>
            <?php $count=1; ?>
            @foreach($zones as $zone)
            <tr>
              <td>{{$count++}}</td>
              <td>{{$zone->name}}</td>
              <td>{{$zone->region!=null? $zone->region->name:''}}</td>
              <td>{{strlen($zone->remark)>50? substr($zone->remark, 0, 50).'...': $zone->remark}}
              </td>
              <td>			
                <ul class="nav navbar-right">
                  <li class="">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                      {{App\Global_var::getLangString('Actions', $language_strings)}}
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-zonemenu pull-right">
                      <li>
                        <a class="get btn btn-lg" href="{{route('zones.show', $zone->id)}}" value="{{$zone->id}}" nextUrl="{{route('zones.show', $zone->id)}}">
                          <i class="fa fa-eye"></i> 
                          {{App\Global_var::getLangString('View', $language_strings)}}

                        </a>
                      </li>
                      <li>
                        <a class="get btn btn-lg" href="{{route('zones.edit', $zone->id)}}" value="{{$zone->id}}" nextUrl="{{route('zones.edit', $zone->id)}}">
                          <i class="fa fa-edit"></i> 
                          {{App\Global_var::getLangString('Edit', $language_strings)}}

                        </a>
                      </li>
                      <li><a class="get btn btn-lg" href="{{route('zones.delete', $zone->id)}}" value="{{$zone->id}}" nextUrl="{{route('zones.delete', $zone->id)}}"><i class="fa fa-trash"></i> 
                        {{App\Global_var::getLangString('Delete', $language_strings)}}

                      </a></li>
                    </ul>
                  </li>
                </ul>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <div class="col-md-12"><hr><h2 class="col-md-offset-2">
          {{App\Global_var::getLangString('List_Not_Found', $language_strings)}}
        </h2></div>
        @endif
      </div>
    </div>
    <div class="col-md-12">
      <center>
        {{$zones->links()}}
      </center>
    </div>
  </div>
