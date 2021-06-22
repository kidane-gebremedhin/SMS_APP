<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-8 panel panel-success">
      <h4><label class="badge bg-green">{{$transfer_categories!=null? $transfer_categories->count(): 0}}</label> / <label class="badge">{{$transfer_categories->total()}}</label> 
        {{App\Global_var::getLangString('Transfer_Categories', $language_strings)}}
        @if($currentUser->isGranted('transfer_categories.create'))
        <!-- <a class="get btn btn-success btn-sm navbar-right" href="{{route('transfer_categories.create')}}" nextUrl="{{route('transfer_categories.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a> -->
      @endif
      </h4>
      @if(count($transfer_categories)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Name', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Priority', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Level', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($transfer_categories as $transfer_category)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$transfer_category->name}}</td>
            <td>{{$transfer_category->priority}}</td>
            <td>{{$transfer_category->level}}</td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-transfer_categorymenu pull-right">
                    @if($currentUser->isGranted('transfer_categories.show'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('transfer_categories.show', $transfer_category->id)}}" value="{{$transfer_category->id}}" nextUrl="{{route('transfer_categories.show', $transfer_category->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('transfer_categories.edit'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('transfer_categories.edit', $transfer_category->id)}}" value="{{$transfer_category->id}}" nextUrl="{{route('transfer_categories.edit', $transfer_category->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('transfer_categories.delete'))
                    <li><a class="get btn btn-lg" href="{{route('transfer_categories.delete', $transfer_category->id)}}" value="{{$transfer_category->id}}" nextUrl="{{route('transfer_categories.delete', $transfer_category->id)}}"><i class="fa fa-trash"></i> 
                      {{App\Global_var::getLangString('Delete', $language_strings)}}
                    </a></li>
                  @endif
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
      {{$transfer_categories->links()}}
    </center>
  </div>
</div>
