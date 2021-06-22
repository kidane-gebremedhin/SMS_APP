<div id="ajaxContent">

  <div class="col-md-12">

    <div class="col-md-8 panel panel-success">

      <h4><label class="badge bg-green">{{$recipient_categories!=null? $recipient_categories->count(): 0}}</label> / <label class="badge">{{$recipient_categories->total()}}</label> 

        {{App\Global_var::getLangString('Recipient_Categories', $language_strings)}}

        <a class="get btn btn-success btn-sm navbar-right" href="{{route('recipient_categories.create')}}" nextUrl="{{route('recipient_categories.create')}}"><i class="fa fa-plus"></i> 

          {{App\Global_var::getLangString('Add', $language_strings)}}

        </a>

      </h4>

      @if(count($recipient_categories)>0)

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

          @foreach($recipient_categories as $recipient_category)

          <tr>

            <td>{{$count++}}</td>

            <td>{{$recipient_category->name}}</td>

            <td>{!! strlen($recipient_category->remark)>50? substr($recipient_category->remark, 0, 50).'...': $recipient_category->remark !!}

            </td>

            <td>			

              <ul class="nav navbar-right">

                <li class="">

                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height: 20px; background: #fff">

                    {{App\Global_var::getLangString('Actions', $language_strings)}}

                    <span class=" fa fa-angle-down"></span>

                  </a>

                  <ul class="dropdown-menu dropdown-recipient_categorymenu pull-right">

                    <li>

                      <a class="get btn btn-lg" href="{{route('recipient_categories.show', $recipient_category->id)}}" value="{{$recipient_category->id}}" nextUrl="{{route('recipient_categories.show', $recipient_category->id)}}">

                        <i class="fa fa-eye"></i> 

                        {{App\Global_var::getLangString('View', $language_strings)}}

                      </a>

                    </li>

                    <li>

                      <a class="get btn btn-lg" href="{{route('recipient_categories.edit', $recipient_category->id)}}" value="{{$recipient_category->id}}" nextUrl="{{route('recipient_categories.edit', $recipient_category->id)}}">

                        <i class="fa fa-edit"></i> 

                        {{App\Global_var::getLangString('Edit', $language_strings)}}

                      </a>

                    </li>

                    <li><a class="get btn btn-lg" href="{{route('recipient_categories.delete', $recipient_category->id)}}" value="{{$recipient_category->id}}" nextUrl="{{route('recipient_categories.delete', $recipient_category->id)}}"><i class="fa fa-trash"></i> 

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

      {{$recipient_categories->links()}}

    </center>

  </div>

</div>
