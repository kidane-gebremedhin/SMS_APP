<input type="hidden" class="businessCategoryId" value='{!! $businessCategoryId !!}' />
<input type="hidden" id="searchUrl" value="{!! route('documents.playlist') !!}">

<div oncontextmenu="return false">
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-sm-12">
                <div class="sv-video">
<div class="panel" style="border: 1px solid #ddd; box-shadow: 10px 10px 5px grey;">
                    <div class="col-md-12">
                        <h3><center>{!! $tender->title !!}</center></h3>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('Company', $language_strings) !!}</strong><h4>{!! $tender->company!=null? $tender->company->name:'' !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <h4><strong>{!! App\Global_var::getLangString('Business_Category', $language_strings) !!}</strong> {!! $tender->businessCategory!=null? $tender->businessCategory->name:'' !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('Summery', $language_strings) !!}</strong><h4>{!! $tender->summery !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('Description', $language_strings) !!}</strong><h4>{!! $tender->description !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('Address', $language_strings) !!}</strong><h4>{!! ($tender->country!=null? $tender->country->name:'').' > '.($tender->region!=null? $tender->region->name:'').' > '.($tender->zone!=null? $tender->zone->name:'').' > '.($tender->wereda!=null? $tender->wereda->name:'') !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('Opening_Date', $language_strings) !!}</strong><h4>{!! $tender->openingDate !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('Closing_Date', $language_strings) !!}</strong><h4>{!! $tender->closingDate !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('Requiremets', $language_strings) !!}</strong><h4>{!! $tender->requiremets !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('Outing_Count', $language_strings) !!}</strong><h4>{!! $tender->outingCount !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('Tender_Procedure', $language_strings) !!}</strong><h4>{!! $tender->tenderProcedure !!}</h4>
                    </div>
                    <div class="col-md-12">
                        <strong>{!! App\Global_var::getLangString('How_To_Apply', $language_strings) !!}</strong><h4>{!! $tender->howToApply !!}</h4>
                    </div>
                    
<img src="{!!  route('stream_text_image', $tender->id)  !!}" style="width:100%; height:400px;" class="imageView">
<div class="col-md-12">
<hr>
        @if($tender->isLiked($currentUser->id))
        <label class="btn btn-success btn-xs"><i class="fa fa-check"></i> {!! App\Global_var::getLangString('Liked', $language_strings) !!}</label>
        @else
        <a href="{!! route('tenders.like', $tender->id) !!}" class="btn btn-warning">{!! App\Global_var::getLangString('Like', $language_strings) !!}</a>
        @endif

        @if($tender->isPined($currentUser->id))
        <label class="btn btn-success btn-xs"><i class="fa fa-check"></i> {!! App\Global_var::getLangString('Pinned', $language_strings) !!}</label>
        @else
        <a href="{!! route('tenders.pin', $tender->id) !!}" class="btn btn-warning">{!! App\Global_var::getLangString('Pin', $language_strings) !!}</a>
        @endif
         
        {!! App\Global_var::getLangString('Likes', $language_strings) !!}: 
        <label class="badge bg-green">{!! count($tender->likes) !!}</label>
        {!! App\Global_var::getLangString('Pins', $language_strings) !!}: 
        <label class="badge bg-green">{!! count($tender->pins) !!}</label>
<hr>
</div>
</div>
</div>
                    <div class="list similar-videos" style="margin-top: 30px">

                        <div class="row">
                @foreach($tenders as $tender)
                <?php if($tender->id==$tender->id) continue; ?>
                            <div class="col-lg-3 col-xs-12 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                         <a href="{!! route('documents.play', $tender->id) !!}"><img src="{!! asset('circle_video_sharing/images/small-'.$tender->document->category.'-placeholder.png') !!}" alt=""></a>
                                    </div>
                                    <div class="v-desc">
                                       <a href="{!! route('documents.play', $tender->id) !!}">{!! $tender->document->title !!}</a>
                                    </div>
                                    <div class="v-views">
                                        {!! $tender->view_count !!} {!! App\Global_var::getLangString('Views', $language_strings) !!}
                                    </div>
                                </div>
                            </div>
                @endforeach 
                        </div>
                    </div>
                    <!-- END similar videos -->
            </div>

            <!-- right column -->
            <div class="col-lg-4 col-xs-12 col-sm-12">

                <!-- up next -->
                <div class="caption playlist">
                    <div class="left">
                        <a href="#">{!! App\Global_var::getLangString('Related_Documents', $language_strings) !!}</a>
                    </div>
                   
                    <div class="clearfix"></div>
                </div>

                <div class="list" style="overflow-y: auto; overflow-x: hidden; height: 600px; background: //green">
                <?php 
                    $i=1;
                    $currentCategory=null;
                 ?>
                @foreach($related_by_company_tenders as $tender)
                <?php 
                    if($tender->id==$tender->id) 
                        continue; 
                    if($currentCategory!=$tender->document->category){
                        $currentCategory=$tender->document->category;
                        echo "<h1>".App\Global_var::getLangString('Related_by_company', $language_strings)." ".App\Global_var::getLangString($currentCategory, $language_strings)."</h1>";

                    }
                ?>
                    <div class="h-video playlist row">
                        <div class="col-lg-5 col-sm-5 col-xs-6">
                            <div class="v-number">
                                <span>{!! $i++ !!}</span>
                            </div>
                            <div class="v-img">
                                <a href="{!! route('documents.play', $tender->id) !!}"><img src="{!! asset('circle_video_sharing/images/small-tender-placeholder.png') !!}" alt=""></a>
                                <!-- <div class="time">15:19</div> -->
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-6">
                            <div class="v-desc">
                                <a href="{!! route('documents.play', $tender->id) !!}">{!! $tender->title !!}</a>
                            </div>
                            <div class="v-views">
                            {!! $tender->summery !!}
                                {!! App\Global_var::getLangString('Read_More', $language_strings) !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>

</div>

<div class="col-xs-12">
    <center>{!! $tenders->links() !!}</center>
</div>


