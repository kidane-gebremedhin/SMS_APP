<div id="ajaxContent">
  <div class="col-md-12">
    <div class="col-md-12 panel panel-success">
      <h4><label class="badge bg-green">{{$wereda_teacher_acceptance_capacities!=null? $wereda_teacher_acceptance_capacities->count(): 0}}</label> / <label class="badge">{{$wereda_teacher_acceptance_capacities->total()}}</label> 
        {{App\Global_var::getLangString('Wereda_teacher_acceptance_capacities', $language_strings)}}
        @if($currentUser->isGranted('wereda_teacher_acceptance_capacities.create'))
        <a class="get btn btn-success btn-sm navbar-right" href="{{route('wereda_teacher_acceptance_capacities.create')}}" nextUrl="{{route('wereda_teacher_acceptance_capacities.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a>
      @endif
      </h4>
      @if(count($wereda_teacher_acceptance_capacities)>0)
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>
            {{App\Global_var::getLangString('Round', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Request_Type', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Wereda', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Quantity', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Educational_Level', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('subjectId', $language_strings)}}
          </th>
          <th></th>
        </thead>
        <tbody>
          <?php $count=1; ?>
          @foreach($wereda_teacher_acceptance_capacities as $wereda_teacher_acceptance_capacity)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$wereda_teacher_acceptance_capacity->round!=null? $wereda_teacher_acceptance_capacity->round->name: ''}}</td>
            <td>{{$wereda_teacher_acceptance_capacity->requestType!=null? $wereda_teacher_acceptance_capacity->requestType->name: ''}}</td>
            <td>{{$wereda_teacher_acceptance_capacity->wereda!=null? $wereda_teacher_acceptance_capacity->wereda->name:''}}</td>
            <td>{{$wereda_teacher_acceptance_capacity->quantity}}</td>
            <td>{{$wereda_teacher_acceptance_capacity->educationalLevel!=null? $wereda_teacher_acceptance_capacity->educationalLevel->name:''}}</td>
            <td>{{$wereda_teacher_acceptance_capacity->subject!=null? $wereda_teacher_acceptance_capacity->subject->name: ''}}</td>
            </td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-wereda_teacher_acceptance_capacitymenu pull-right">
                    @if($currentUser->isGranted('wereda_teacher_acceptance_capacities.show'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('wereda_teacher_acceptance_capacities.show', $wereda_teacher_acceptance_capacity->id)}}" value="{{$wereda_teacher_acceptance_capacity->id}}" nextUrl="{{route('wereda_teacher_acceptance_capacities.show', $wereda_teacher_acceptance_capacity->id)}}">
                        <i class="fa fa-eye"></i> 
                        {{App\Global_var::getLangString('View', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('wereda_teacher_acceptance_capacities.edit'))
                    <li>
                      <a class="get btn btn-lg" href="{{route('wereda_teacher_acceptance_capacities.edit', $wereda_teacher_acceptance_capacity->id)}}" value="{{$wereda_teacher_acceptance_capacity->id}}" nextUrl="{{route('wereda_teacher_acceptance_capacities.edit', $wereda_teacher_acceptance_capacity->id)}}">
                        <i class="fa fa-edit"></i> 
                        {{App\Global_var::getLangString('Edit', $language_strings)}}
                      </a>
                    </li>
                    @endif
                    @if($currentUser->isGranted('wereda_teacher_acceptance_capacities.delete'))
                    <li><a class="get btn btn-lg" href="{{route('wereda_teacher_acceptance_capacities.delete', $wereda_teacher_acceptance_capacity->id)}}" value="{{$wereda_teacher_acceptance_capacity->id}}" nextUrl="{{route('wereda_teacher_acceptance_capacities.delete', $wereda_teacher_acceptance_capacity->id)}}"><i class="fa fa-trash"></i> 
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
      {{$wereda_teacher_acceptance_capacities->links()}}
    </center>
  </div>
</div>
