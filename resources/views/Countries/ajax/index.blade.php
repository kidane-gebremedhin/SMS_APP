<div id="ajaxContent">

  <div class="col-md-12">
    <div class="panel panel-success col-md-8">
      <h4><label class="badge bg-green">{{$countries!=null? $countries->count(): 0}}</label> / <label class="badge">{{$countries->total()}}</label> 
        {{App\Global_var::getLangString('Countries', $language_strings)}}
        <a class="get btn btn-success btn-md navbar-right" href="{{route('countries.create')}}" nextUrl="{{route('countries.create')}}"><i class="fa fa-plus"></i> 
          {{App\Global_var::getLangString('Add', $language_strings)}}
        </a></h4> 
        @if(count($countries)>0)
        <table class="table table-striped">
         <thead>
          <th>{{App\Global_var::getLangString('Name', $language_strings)}}</th>
          <th>{{App\Global_var::getLangString('Remark', $language_strings)}}</th>
          <th></th>

        </thead>
        <tbody>
          @foreach($countries as $country)
          <tr>
            <td>{{$country->name}}</td>
            <td>{{strlen($country->remark)>50? substr($country->remark, 0, 50).'...': $country->remark}}
            </td>
            <td>			
              <ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">
                    {{App\Global_var::getLangString('Actions', $language_strings)}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-countrymenu pull-right">
                    <li>
                      <a class="get btn btn-lg" href="{{route('countries.show', $country->id)}}" value="{{$country->id}}" nextUrl="{{route('countries.show', $country->id)}}">
                       <i class="fa fa-eye"></i> 
                       {{App\Global_var::getLangString('View', $language_strings)}}

                     </a>
                   </li>
                   <li>
                    <a class="get btn btn-lg" href="{{route('countries.edit', $country->id)}}" value="{{$country->id}}" nextUrl="{{route('countries.edit', $country->id)}}">
                     <i class="fa fa-edit"></i> 
                     {{App\Global_var::getLangString('Edit', $language_strings)}}

                   </a>
                 </li>
                 <li><a class="get btn btn-lg" href="{{route('countries.delete', $country->id)}}" value="{{$country->id}}" nextUrl="{{route('countries.delete', $country->id)}}"><i class="fa fa-trash"></i> 
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
    {{$countries->links()}}
  </center>
</div>
</div>
