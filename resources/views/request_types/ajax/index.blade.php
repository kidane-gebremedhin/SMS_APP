<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-8 panel panel-success">
      <h4><label class="badge bg-green">{{$request_types!=null? $request_types->count(): 0}}</label> / <label class="badge">{{$request_types->total()}}</label> 
        {{App\Global_var::getLangString('Request_Types', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('request_types.create')}}" nextUrl="{{route('request_types.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      </h4>
      @if(count($request_types)>0)
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
          @foreach($request_types as $request_type)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$request_type->name}}</td>
            <td>{!! strlen($request_type->remark)>50? substr($request_type->remark, 0, 50).'...': $request_type->remark !!}
            </td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-request_typemenu pull-right">
                    <li>
                      <a class="get btn btn-lg" href="{{route('request_types.show', $request_type->id)}}" value="{{$request_type->id}}" nextUrl="{{route('request_types.show', $request_type->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    <li>
                      <a class="get btn btn-lg" href="{{route('request_types.edit', $request_type->id)}}" value="{{$request_type->id}}" nextUrl="{{route('request_types.edit', $request_type->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    <li><a class="get btn btn-lg" href="{{route('request_types.delete', $request_type->id)}}" value="{{$request_type->id}}" nextUrl="{{route('request_types.delete', $request_type->id)}}"><i class="fa fa-trash"></i> 
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
      {{$request_types->links()}}
    </center>
  </div>
</div>
