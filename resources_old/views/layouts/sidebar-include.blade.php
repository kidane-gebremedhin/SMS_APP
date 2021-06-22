@foreach($resources as $resource)
                 <li><a><i class="fa fa-list"></i> {{$resource->resourceTableName}}<span class="fa fa-chevron-down"></span></a> 
                 <ul class="nav child_menu">
                      <li><a class="departments-create" href="{{route('departments.create')}}">{{$resource->resourceTableName}} ወስኽ</a></li>
                      <li><a class="departments-index" href="{{route($resource->route)}}">ዝርዝር {{$resource->resourceTableName}} </a></li>
                    </ul>
                  </li>
        @endforeach 
