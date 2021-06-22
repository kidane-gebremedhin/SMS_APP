<div id="ajaxContent">

  <div class="col-md-12">

    <div class="col-md-8 panel panel-success">

      <h4><label class="badge bg-green">{{$locations!=null? $locations->count(): 0}}</label> / <label class="badge">{{$locations->total()}}</label> 

        {{App\Global_var::getLangString('Locations', $language_strings)}}

        <a class="get btn btn-success btn-sm navbar-right" href="{{route('locations.create')}}" nextUrl="{{route('locations.create')}}"><i class="fa fa-plus"></i> 

          {{App\Global_var::getLangString('Add', $language_strings)}}

        </a>

      </h4>

      @if(count($locations)>0)

      <table class="table table-striped table-hover">

        <thead>

          <th>#</th>

          <th>

            {{App\Global_var::getLangString('Name', $language_strings)}}

          </th>

          <th>

            {{App\Global_var::getLangString('Description', $language_strings)}}

          </th>

          <th></th>

        </thead>

        <tbody>

          <?php $count=1; ?>

          @foreach($locations as $location)

          <tr>

            <td>{{$count++}}</td>

            <td>{{$location->name}}</td>

            <td>{!! strlen($location->remark)>50? substr($location->remark, 0, 50).'...': $location->remark !!}

            </td>

            <td>      

              <ul class="nav navbar-right">

                <li class="">

                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">

                    {{App\Global_var::getLangString('Actions', $language_strings)}}

                    <span class=" fa fa-angle-down"></span>

                  </a>

                  <ul class="dropdown-menu dropdown-locationmenu pull-right">

                    <li>

                      <a class="get btn btn-lg" href="{{route('locations.show', $location->id)}}" value="{{$location->id}}" nextUrl="{{route('locations.show', $location->id)}}">

                        <i class="fa fa-eye"></i> 

                        {{App\Global_var::getLangString('View', $language_strings)}}

                      </a>

                    </li>

                    <li>

                      <a class="get btn btn-lg" href="{{route('locations.edit', $location->id)}}" value="{{$location->id}}" nextUrl="{{route('locations.edit', $location->id)}}">

                        <i class="fa fa-edit"></i> 

                        {{App\Global_var::getLangString('Edit', $language_strings)}}

                      </a>

                    </li>

                    <li><a class="get btn btn-lg" href="{{route('locations.delete', $location->id)}}" value="{{$location->id}}" nextUrl="{{route('locations.delete', $location->id)}}"><i class="fa fa-trash"></i> 

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

      <div class="col-md-12"><hr><h4 class="col-md-offset-2">

        {{App\Global_var::getLangString('List_Not_Found', $language_strings)}}

      </h4></div>

      @endif

    </div>

  </div>

  <div class="col-md-8">

    <center>

      {{$locations->links()}}

    </center>

  </div>

</div>
