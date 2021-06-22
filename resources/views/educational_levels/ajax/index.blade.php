<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-8 panel panel-success">
      <h4><label class="badge bg-green">{{$educational_levels!=null? $educational_levels->count(): 0}}</label> / <label class="badge">{{$educational_levels->total()}}</label> 
        {{App\Global_var::getLangString('Educational_Levels', $language_strings)}}
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('educational_levels.create')}}" nextUrl="{{route('educational_levels.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      </h4>
      @if(count($educational_levels)>0)
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
          @foreach($educational_levels as $educational_level)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$educational_level->name}}</td>
            <td>{!! strlen($educational_level->remark)>50? substr($educational_level->remark, 0, 50).'...': $educational_level->remark !!}
            </td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-educational_levelmenu pull-right">
                    <li>
                      <a class="get btn btn-lg" href="{{route('educational_levels.show', $educational_level->id)}}" value="{{$educational_level->id}}" nextUrl="{{route('educational_levels.show', $educational_level->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    <li>
                      <a class="get btn btn-lg" href="{{route('educational_levels.edit', $educational_level->id)}}" value="{{$educational_level->id}}" nextUrl="{{route('educational_levels.edit', $educational_level->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    <li><a class="get btn btn-lg" href="{{route('educational_levels.delete', $educational_level->id)}}" value="{{$educational_level->id}}" nextUrl="{{route('educational_levels.delete', $educational_level->id)}}"><i class="fa fa-trash"></i> 
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
      {{$educational_levels->links()}}
    </center>
  </div>
</div>
