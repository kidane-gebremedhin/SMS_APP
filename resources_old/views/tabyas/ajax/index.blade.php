<div id="ajaxContent">
  <div class="col-md-12">
   <div class="col-md-8 panel panel-info"> 
     <h4><label class="badge bg-green">{{$tabyas!=null? $tabyas->count(): 0}}</label> / <label class="badge">{{$tabyas->total()}}</label> 
      {{App\Global_var::getLangString('Tabyas', $language_strings)}}
      <a class="get btn btn-success btn-sm navbar-right" href="{{route('tabyas.create')}}" nextUrl="{{route('tabyas.create')}}"><i class="fa fa-plus"></i> 
        {{App\Global_var::getLangString('Add', $language_strings)}}
      </a></h4> 
    @if(count($tabyas)>0)
    <table class="table table-striped">
     <thead>
      <th>#</th>
      <th>{{App\Global_var::getLangString('Name', $language_strings)}}</th>
      <th>{{App\Global_var::getLangString('Zone', $language_strings)}}</th>
      <th>{{App\Global_var::getLangString('Wereda', $language_strings)}}</th>
      <th>{{App\Global_var::getLangString('Region', $language_strings)}}</th>
      <th>{{App\Global_var::getLangString('Remark', $language_strings)}}</th>
      <th></th>

    </thead>
    <tbody>
      <?php $count=1; ?>
      @foreach($tabyas as $tabya)
      <tr>
        <td>{{$count++}}</td>
        <td>{{$tabya->name}}</td>
        <td>{{$tabya->wereda!=null? $tabya->wereda->name:''}}</td>
        <td>{{$tabya->zone!=null? $tabya->zone->name:''}}</td>
        <td>{{$tabya->region!=null? $tabya->region->name:''}}</td>
        <td>{{strlen($tabya->remark)>50? substr($tabya->remark, 0, 50).'...': $tabya->remark}}
        </td>
        <td>     <ul class="nav navbar-right">
          <li class="">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
              {{App\Global_var::getLangString('Actions', $language_strings)}}
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-tabya pull-right">
              <li>
                <a class="get btn btn-lg" href="{{route('tabyas.show', $tabya->id)}}" value="{{$tabya->id}}" nextUrl="{{route('tabyas.show', $tabya->id)}}">
                 <i class="fa fa-eye"></i> 
                 {{App\Global_var::getLangString('View', $language_strings)}}

               </a>
             </li>
             <li>
              <a class="get btn btn-lg" href="{{route('tabyas.edit', $tabya->id)}}" value="{{$tabya->id}}" nextUrl="{{route('tabyas.edit', $tabya->id)}}">
               <i class="fa fa-edit"></i> 
               {{App\Global_var::getLangString('Edit', $language_strings)}}

             </a>
           </li>
           <li><a class="get btn btn-lg" href="{{route('tabyas.delete', $tabya->id)}}" value="{{$tabya->id}}" nextUrl="{{route('tabyas.delete', $tabya->id)}}"><i class="fa fa-trash"></i> 
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
    {{$tabyas->links()}}
  </center>
</div>
</div>
