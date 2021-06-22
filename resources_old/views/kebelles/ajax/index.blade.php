<div id="ajaxContent">

  <div class="col-md-12">
   <div class="col-md-8 panel panel-info "> 
     <h4><label class="badge bg-green">{{$kebelles!=null? $kebelles->count(): 0}}</label> / <label class="badge">{{$kebelles->total()}}</label> 
      {{App\Global_var::getLangString('Kebelles', $language_strings)}}
      <a class="get btn btn-success btn-sm navbar-right" href="{{route('kebelles.create')}}" nextUrl="{{route('kebelles.create')}}"><i class="fa fa-plus"></i> 
        {{App\Global_var::getLangString('Add', $language_strings)}}
      </a></h4> 
    @if(count($kebelles)>0)
    <table class="table table-striped">
     <thead>
      <th>#</th>
      <th>{{App\Global_var::getLangString('Name', $language_strings)}}</th>
      <th>{{App\Global_var::getLangString('Tabya', $language_strings)}}</th>
      <th>{{App\Global_var::getLangString('Wereda', $language_strings)}}</th>
      <th>{{App\Global_var::getLangString('Zone', $language_strings)}}</th>
      <th>{{App\Global_var::getLangString('Region', $language_strings)}}</th>
      <th>{{App\Global_var::getLangString('Remark', $language_strings)}}</th>
      <th></th>

    </thead>
    <tbody>
      <?php $count=1; ?>
      @foreach($kebelles as $kebelle)
      <tr>
        <td>{{$count++}}</td>
        <td>{{$kebelle->name}}</td>
        <td>{{$kebelle->tabya!=null? $kebelle->tabya->name:''}}</td>
        <td>{{$kebelle->wereda!=null? $kebelle->wereda->name:''}}</td>
        <td>{{$kebelle->zone!=null? $kebelle->zone->name:''}}</td>
        <td>{{$kebelle->region!=null? $kebelle->region->name:''}}</td>
        <td>{{strlen($kebelle->remark)>50? substr($kebelle->remark, 0, 50).'...': $kebelle->remark}}
        </td>
        <td>     <ul class="nav navbar-right">
          <li class="">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
              {{App\Global_var::getLangString('Actions', $language_strings)}}
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-kebelle pull-right">
              <li>
                <a class="get btn btn-lg" href="{{route('kebelles.show', $kebelle->id)}}" value="{{$kebelle->id}}" nextUrl="{{route('kebelles.show', $kebelle->id)}}">
                 <i class="fa fa-eye"></i> 
                 {{App\Global_var::getLangString('View', $language_strings)}}

               </a>
             </li>
             <li>
              <a class="get btn btn-lg" href="{{route('kebelles.edit', $kebelle->id)}}" value="{{$kebelle->id}}" nextUrl="{{route('kebelles.edit', $kebelle->id)}}">
               <i class="fa fa-edit"></i> 
               {{App\Global_var::getLangString('Edit', $language_strings)}}

             </a>
           </li>
           <li><a class="get btn btn-lg" href="{{route('kebelles.delete', $kebelle->id)}}" value="{{$kebelle->id}}" nextUrl="{{route('kebelles.delete', $kebelle->id)}}"><i class="fa fa-trash"></i> 
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
<div class="col-md-12">
  <center>
    {{$kebelles->links()}}
  </center>
</div>
</div>
