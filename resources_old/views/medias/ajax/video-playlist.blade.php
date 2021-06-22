<div class="col-md-12">
<div class="col-md-10 col-md-offset-1" style="height:100px; border: 1px solid gold; display: {{count($ads)>0? 'block': 'none'}}">
@if(count($ads)>0)
<!-- <h3>{{$ads->first()->name}}</h3> -->
    <img src="{{ route('stream_ads_image', $ads->first()->id) }}" style="width:100%; height:100%; " class="imageView">
@endif
</div>
<div class="col-xs-12">
    <hr>
</div>
<div class="col-md-8 col-md-offset-2">
<input type="hidden" class="businessCategoryId" value='{!! $businessCategoryId !!}' />
<input type="hidden" id="searchUrl" value="{!! route('documents.playlist') !!}" />

 <div class="list similar-videos" style="margin-top: 0px;overflow-x: hidden;">
                <div class="row">
                <div class="col-md-11 col-md-offset-0">
                @if(count($tenders)>0)
                @foreach($tenders as $tender)
                            <div class="col-lg-12" style="margin-bottom: 30px; border: 1px solid #ddd; box-shadow: 10px 4px 5px grey;">
                                <div class="col-md-8" style="border: 1px solid #ddd; box-shadow: 10px 10px 5px #eee;">
                                         <a href="{!! route('documents.play', $tender->id) !!}">
                                            <img src="{!!  route('stream_text_image', $tender->id)  !!}" style="width:100%; height: 350px;" class="imageView">
                                          <!-- <img src="{!! asset('circle_video_sharing/images/small-tender-placeholder.png') !!}" alt="" style="width: 100%"> -->
                                          </a> 
                                    </div>
                                    <div class="col-md-4">
                                    <div class="col-md-offset-2">
                                    <hr>
                                    <strong>{{ App\Global_var::getLangString('Category', $language_strings) }}</strong>
                                    <p>{!! $tender->businessCategory!=null? $tender->businessCategory->name:'' !!}</p>
                                    <hr>
                                    <strong>{{ App\Global_var::getLangString('Company', $language_strings) }}</strong>
                                    <p>{!! $tender->company!=null? $tender->company->name:'' !!}</p>
                                    <hr>
                                    <strong>{{ App\Global_var::getLangString('Opening_Date', $language_strings) }}</strong>
                                    <p>{{ $tender->openingDate }}</p>
                                    <hr>
                                    <strong>{{ App\Global_var::getLangString('Closing_Date', $language_strings) }}</strong>
                                    <p>{{ $tender->closingDate }}</p>
                                    <hr>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                    <hr>
                                       <a href="{!! route('documents.play', $tender->id) !!}"><strong>
                                           {{ strlen($tender->title)>500? substr($tender->title, 500, 500).'...': $tender->title }}
                                       </strong></a>
                                       <hr>
                                       <p>{!! $tender->summery !!}</p>

                                    <div class="col-md-12">
                                       <a href="{!! route('documents.play', $tender->id) !!}" class="btn btn-success btn-xs">
                                       <strong>
                                           {!! App\Global_var::getLangString('Read_Details', $language_strings) !!}
                                       </strong>
                                       </a>
                                      <div class="pull-right">
                                           @if($tender->isLiked($currentUser->id))
                                            <label class="btn btn-success btn-xs"><i class="fa fa-check"></i> {!! App\Global_var::getLangString('Liked', $language_strings) !!}</label>
                                            @else
                                            <a href="{!! route('tenders.like', $tender->id) !!}" class="btn btn-warning btn-xs"><i class="fa fa-gear"></i> {!! App\Global_var::getLangString('Like', $language_strings) !!}</a>
                                            @endif

                                            @if($tender->isPined($currentUser->id))
                                            <label class="btn btn-success btn-xs"><i class="fa fa-check"></i> {!! App\Global_var::getLangString('Pinned', $language_strings) !!}</label>
                                            @else
                                            <a href="{!! route('tenders.pin', $tender->id) !!}" class="btn btn-warning btn-xs"><i class="fa fa-gear"></i> {!! App\Global_var::getLangString('Pin', $language_strings) !!}</a>
                                        @endif
                                      </div>
                                    </div>
                                       <hr>
                                    </div>
                            </div>
                            <hr>
                @endforeach 
                @else
                <h3><center>
                    {!! App\Global_var::getLangString('No_Result_Found', $language_strings) !!}
                </center></h3>
                @endif 
            </div>
        </div>
    </div>

<div class="col-xs-12">
    <center>{{--{!! $tenders->links() !!}--}}</center>
</div>

</div>
<div class="col-md-2" style="border: 1px solid gold;">
    @foreach($ads as $ad)
    <h3>{{$ad->name}}</h3>
    <img src="{{  route('stream_ads_image', $ad->id)  }}" style="width:100%; height:400px;" class="imageView">
    @endforeach
</div>
</div>

<script type="text/javascript">

// alert((ads))
</script>