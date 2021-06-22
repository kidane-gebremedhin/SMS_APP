<div class="col-md-12">
    <div class="col-md-10">
        <div class="panel panel-success">
            <div class="panel-heading">                
                <strong>{{App\Global_var::getLangString('Choose_your_username_and_subscription_plan', $language_strings)}}</strong> 
                <a href="{{route('users.index')}}" class="get btn btn-success btn-sm pull-right"><i class="fa fa-eye"></i> 
                {{App\Global_var::getLangString('List', $language_strings)}}</a>
                <div style="height: 12px;"></div>
            </div>
            <div class="panel-body">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="orgDetails">
                        {!!Form::open(array("route"=>["choose_subscription_plan", $user->id], "method"=>"POST", "class"=>"post_"))!!}
                        <label class="nextUrl col-md-12" nextUrl="{{route('home')}}" />
                            <div class="col-md-12">
                                <th colspan="2"><u>Dear {{$user->fullName.' '.$user->companyName}} Please {{App\Global_var::getLangString('Choose_your_username_and_subscription_plan', $language_strings)}}</u></th>
                            </div>
                            <div class="col-md-12">
                            <!-- <tr><td>{{App\Global_var::getLangString('Username', $language_strings)}}</td>
                            <td>{{ Form::text('username', null, array('class'=>'form-control', 'required'=>'true'))}}
                            </td></tr> -->
                            <?php $alreadyShowed=false; ?>
                                @foreach($subscription_plans as $subscription_plan)
                                <div class="col-md-12">
                                    <div class="col-md-4">{{!$alreadyShowed? App\Global_var::getLangString('Subscription_Plan', $language_strings):''}}</div>
                                    <div class="col-md-8"><label><input name="subscriptionPlanId" value="{{$subscription_plan->id}}" type="radio" {{$subscription_plan->name=='Basic'? 'checked':''}}> <strong style="color: orange">{{$subscription_plan->name}}</strong> 
                                    <span class="col-md-offset-1 col-md-10">{!! $subscription_plan->description !!}</span></label> 
                                    </div>
                                </div>
                                <?php $alreadyShowed=true; ?>
                                @endforeach
                            </div>
                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success col-md-6 col-md-offset-3">
                                {{App\Global_var::getLangString('Finish', $language_strings)}}
                            </button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>