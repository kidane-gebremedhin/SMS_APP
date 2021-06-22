<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-8 panel panel-success"> 
      <h4><label class="badge bg-green">{{$schools!=null? $schools->count(): 0}}</label> / <label class="badge">{{$schools->total()}}</label> 
        {{App\Global_var::getLangString('Schools', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('schools.create')}}" nextUrl="{{route('schools.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a></h4> 
        @if(count($schools)>0)
        <table class="table table-striped">
          <thead>
            <th>#</th>
            <th>{{App\Global_var::getLangString('Name', $language_strings)}}</th>
            <th>{{App\Global_var::getLangString('Wereda', $language_strings)}}</th>
            <th>{{App\Global_var::getLangString('Zone', $language_strings)}}</th>
            <th></th>

          </thead>
          <tbody>
            <?php $count=1; ?>
            @foreach($schools as $school)
            <tr>
              <td>{{$count++}}</td>
              <td>{{$school->name}}</td>
              <td>{{$school->wereda!=null? $school->wereda->name:''}}</td>
              <td>{{$school->zone!=null? $school->zone->name:''}}</td>
              </td>
              <td>			
                <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-school pull-right">
                    <li>
                      <a class="get btn btn-lg" href="{{route('schools.show', $school->id)}}" value="{{$school->id}}" nextUrl="{{route('schools.show', $school->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}

                      </a>
                    </li>
                    <li>
                      <a class="get btn btn-lg" href="{{route('schools.edit', $school->id)}}" value="{{$school->id}}" nextUrl="{{route('schools.edit', $school->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}

                      </a>
                    </li>
                    <li><a class="get btn btn-lg" href="{{route('schools.delete', $school->id)}}" value="{{$school->id}}" nextUrl="{{route('schools.delete', $school->id)}}"><i class="fa fa-trash"></i> 
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
      {{$schools->links()}}
    </center>
  </div>
</div>
