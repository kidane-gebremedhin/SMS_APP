<div id="ajaxContent">

  <div class="col-md-12">

    <div class="col-md-8 panel panel-success">

      <h4><label class="badge bg-green">{{$recipients!=null? $recipients->count(): 0}}</label> / <label class="badge">{{$recipients->total()}}</label> 

        {{App\Global_var::getLangString('Recipients', $language_strings)}}

        <a class="get btn btn-success btn-sm navbar-right" href="{{route('recipients.create')}}" nextUrl="{{route('recipients.create')}}"><i class="fa fa-plus"></i> 

          {{App\Global_var::getLangString('Add', $language_strings)}}

        </a>

      </h4>

      @if(count($recipients)>0)

      <table class="table table-striped table-hover">

        <thead>

          <th>#</th>

          <th>
            {{App\Global_var::getLangString('Category', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Full_Name', $language_strings)}}
          </th>
          <th>
            {{App\Global_var::getLangString('Phone_Number', $language_strings)}}
          </th>
          <th></th>

        </thead>

        <tbody>

          <?php $count=1; ?>

          @foreach($recipients as $recipient)

          <tr>

            <td>{{$count++}}</td>

            <td>{{$recipient->category!=null? $recipient->category->name: ''}}</td>
            <td>{{$recipient->fullName}}</td>
            <td>{{$recipient->phoneNumber}}</td>

            </td>

            <td>			

              <ul class="nav navbar-right">

                <li class="">

                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">

                    {{App\Global_var::getLangString('Actions', $language_strings)}}

                    <span class=" fa fa-angle-down"></span>

                  </a>

                  <ul class="dropdown-menu dropdown-recipientmenu pull-right">

                    <li>

                      <a class="get btn btn-lg" href="{{route('recipients.show', $recipient->id)}}" value="{{$recipient->id}}" nextUrl="{{route('recipients.show', $recipient->id)}}">

                        <i class="fa fa-eye"></i> 

                        {{App\Global_var::getLangString('View', $language_strings)}}

                      </a>

                    </li>

                    <li>

                      <a class="get btn btn-lg" href="{{route('recipients.edit', $recipient->id)}}" value="{{$recipient->id}}" nextUrl="{{route('recipients.edit', $recipient->id)}}">

                        <i class="fa fa-edit"></i> 

                        {{App\Global_var::getLangString('Edit', $language_strings)}}

                      </a>

                    </li>

                    <li><a class="get btn btn-lg" href="{{route('recipients.delete', $recipient->id)}}" value="{{$recipient->id}}" nextUrl="{{route('recipients.delete', $recipient->id)}}"><i class="fa fa-trash"></i> 

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

      {{$recipients->links()}}

    </center>

  </div>

</div>
