<div class="col-md-8">

  <div class="panel panel-success">

    <div class="panel-heading">

      {{App\Global_var::getLangString('Detail', $language_strings)}}



      <a href="{{route('locations.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('locations.index')}}"><i class="fa fa-eye"></i>  

        {{App\Global_var::getLangString('List', $language_strings)}}

      </a>    

    </div>

    <div class="panel-body">

      <table class="table">

        <tbody>

          <tr>

            <td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$location->name}}</h4></td>

          </tr>



          <tr>

            <td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{!! $location->remark !!}</h4></td>

          </tr>



        </tbody>

      </table>



<div class="col-md-12">

<hr>

  <div class="col-md-12">

  {{App\Global_var::getLangString('Created_By', $language_strings)}}:

  <label class="label label-default">{{$location->createdByUser!=null? $location->createdByUser->username():''}}</label>



  {{App\Global_var::getLangString('Updated_By', $language_strings)}}:

  <label class="label label-default">{{$location->updatedByUser!=null? $location->updatedByUser->username():''}}  </label>

  <br>



  {{App\Global_var::getLangString('Created_At', $language_strings)}}:

  <label class="label label-default">{{date('M j Y h:i', strtotime($location->created_at))}}</label>

  {{App\Global_var::getLangString('Updated_At', $language_strings)}}:

  <label class="label label-default">{{date('M j Y h:i', strtotime($location->updated_at))}}</label>      



</div>

</div>

<div class="col-md-12">

<hr>

  <div class="col-md-4 pull-right">



  <a href="{{route('locations.edit', $location->id)}}" value="{{$location->id}}" class="get btn btn-sm btn-primary" nextUrl="{{route('locations.edit', $location->id)}}"><i class="fa fa-edit"></i> 

    {{App\Global_var::getLangString('Edit', $language_strings)}}

  </a>

  <a href="{{route('locations.delete', $location->id)}}" value="{{$location->id}}" class="get btn btn-sm btn-danger" nextUrl="{{route('locations.delete', $location->id)}}"><i class="fa fa-trash"></i> 

    {{App\Global_var::getLangString('Delete', $language_strings)}}

  </a>

</div>

</div>

    </div>

  </div>



</div>


