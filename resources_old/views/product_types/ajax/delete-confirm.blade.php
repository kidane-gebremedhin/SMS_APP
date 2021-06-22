<div class="col-md-12">

    <div class="col-md-8">

        <h4 class="text-danger">

            {{App\Global_var::getLangString('Confirm_Delete', $language_strings)}}

            <a href="{{route('product_types.index')}}" class="get btn btn-default btn-sm" nextUrl="{{route('product_types.destroy', $product_type->id)}}"> 

                {{App\Global_var::getLangString('No', $language_strings)}}

            </a>

            <a href="{{route('product_types.destroy', $product_type->id)}}" value="{{$product_type->id}}" class="get btn btn-danger btn-sm" nextUrl="{{route('product_types.index')}}"><i class="fa fa-trash"></i> 

                {{App\Global_var::getLangString('Yes', $language_strings)}}

            </a>

        </h4>   

    </div>

        <div class="col-md-8">

            <div class="panel panel-success">

                <div class="panel-heading">

                    {{App\Global_var::getLangString('Detail', $language_strings)}}

                    <a href="{{route('product_types.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('product_types.index')}}"><i class="fa fa-eye"></i> 

                        {{App\Global_var::getLangString('List', $language_strings)}}

                    </a>    

                </div>

                <div class="panel-body">

            <table class="table">

                <tbody>

                    <tr>

                        <td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$product_type->name}}</h4></td>

                    </tr>



                    <tr>

                        <td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{!! $product_type->remark !!}</h4></td>

                    </tr>



                </tbody>

            </table>



<div class="col-md-12">

<hr>

    <div class="col-md-12">

    {{App\Global_var::getLangString('Created_By', $language_strings)}}:

    <label class="label label-default">{{$product_type->createdByUser!=null? $product_type->createdByUser->username():''}}</label>



    {{App\Global_var::getLangString('Updated_By', $language_strings)}}:

    <label class="label label-default">{{$product_type->updatedByUser!=null? $product_type->updatedByUser->username():''}}    </label>

    <br>



    {{App\Global_var::getLangString('Created_At', $language_strings)}}:

    <label class="label label-default">{{date('M j Y h:i', strtotime($product_type->created_at))}}</label>

    {{App\Global_var::getLangString('Updated_At', $language_strings)}}:

    <label class="label label-default">{{date('M j Y h:i', strtotime($product_type->updated_at))}}</label>        



</div>

</div>



        </div>

            </div>

        </div>

    </div>
