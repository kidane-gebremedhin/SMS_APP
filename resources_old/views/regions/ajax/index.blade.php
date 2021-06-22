<div id="ajaxContent">

  <div class="col-md-12">
   <div class="panel panel-success col-md-8"> 
        <h4><label class="badge bg-green">{{$regions!=null? $regions->count(): 0}}</label> / <label class="badge">{{$regions->total()}}</label> 
          {{App\Global_var::getLangString('Regions', $language_strings)}}
          <a class="get btn btn-success btn-sm navbar-right" href="{{route('regions.create')}}" nextUrl="{{route('regions.create')}}"><i class="fa fa-plus"></i> 
            {{App\Global_var::getLangString('Add', $language_strings)}}
          </a></h4>
          
      @if(count($regions)>0)
      <table class="table table-striped">
       <thead>
        <th>#</th>
        <th>{{App\Global_var::getLangString('Name', $language_strings)}}</th>
        <th>{{App\Global_var::getLangString('Country', $language_strings)}}</th>
        <th>{{App\Global_var::getLangString('Remark', $language_strings)}}</th>
        <th></th>

      </thead>
      <tbody>
        <?php $count=1; ?>
        @foreach($regions as $region)
        <tr>
          <td>{{$count++}}</td>
          <td>{{$region->name}}</td>
          <td>{{$region->country!=null? $region->country->name:''}}</td>
          <td>{{strlen($region->remark)>50? substr($region->remark, 0, 50).'...': $region->remark}}
          </td>
          <td>			
            <ul class="nav navbar-right">
              <li class="">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                  {{App\Global_var::getLangString('Actions', $language_strings)}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-regionmenu pull-right">
                  <li>
                    <a class="get btn btn-lg" href="{{route('regions.show', $region->id)}}" value="{{$region->id}}" nextUrl="{{route('regions.show', $region->id)}}">
                     <i class="fa fa-eye"></i> 
                     {{App\Global_var::getLangString('View', $language_strings)}}

                   </a>
                 </li>
                 <li>
                  <a class="get btn btn-lg" href="{{route('regions.edit', $region->id)}}" value="{{$region->id}}" nextUrl="{{route('regions.edit', $region->id)}}">
                   <i class="fa fa-edit"></i> 
                   {{App\Global_var::getLangString('Edit', $language_strings)}}

                 </a>
               </li>
               <li><a class="get btn btn-lg" href="{{route('regions.delete', $region->id)}}" value="{{$region->id}}" nextUrl="{{route('regions.delete', $region->id)}}"><i class="fa fa-trash"></i> 
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
    {{$regions->links()}}
  </center>
</div>
</div>
