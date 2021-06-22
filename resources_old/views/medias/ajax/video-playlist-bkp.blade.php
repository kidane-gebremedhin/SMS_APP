<input type="hidden" class="businessCategoryId" value='{!! $businessCategoryId !!}' />
<input type="hidden" id="searchUrl" value="{!! route('documents.playlist') !!}" />

<hr>
 <div class="list similar-videos" style="margin-top: 30px;overflow-x: hidden;">
                <div class="row">
                <div class="col-md-10 col-md-offset-1">
                @if(count($tenders)>0)
                @foreach($tenders as $tender)
                            <div class="col-lg-3 col-xs-12 col-sm-6 videoitem" style="margin-bottom: 30px">
                                <div class="b-video">
                                    <div class="v-img">
                                         <a href="{!! route('documents.play', $tender->id) !!}">
                                            <img src="{!!  route('stream_text_image', $tender->id)  !!}" style="width:100%; height: 200px;" class="imageView">
<!--                                          <img src="{!! asset('circle_video_sharing/images/small-tender-placeholder.png') !!}" alt="" style="width: 100%"></a> -->
                                    </div>
                                    <div class="v-desc" style="height: 30px">
                                       <a href="{!! route('documents.play', $tender->id) !!}">{{ strlen($tender->title)>50? substr($tender->title, 50, 50).'...': $tender->title }}</a>
                                    </div>
                                    <div class="v-views">
                                    <!-- <div class="col-md-12" style="height: 30px">
                                        {{App\Global_var::getLangString('Views', $language_strings)}}
                                    </div> -->
                                    
                                    <hr>
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
                                </div>
                            </div>
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
    <center>{!! $tenders->links() !!}</center>
</div>
