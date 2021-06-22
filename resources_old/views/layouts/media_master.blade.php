<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('circle_video_sharing/favicon.png')}}">

    <title>Circle Video | Single video</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('circle_video_sharing/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- player -->
    <link rel="stylesheet" href="{{asset('circle_video_sharing/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelementplayer.min.css')}}" />

    <!-- Theme CSS -->
    <link href="{{asset('circle_video_sharing/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('circle_video_sharing/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('circle_video_sharing/css/font-circle-video.css')}}" rel="stylesheet">

    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
    <!-- Docs styles -->
<!--     <link rel="stylesheet" href="{{asset('dist/demo.css')}}" /> -->

</head>

<body class="single-video light">

<?php 
$document=$document_edition->document;
?>
<!-- logo, menu, search, avatar -->
<div class="container-fluid">
    <div class="row">
        <div class="navbar-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-sm-2 col-xs-2">
                        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('images/'.$logo->logoImage)}}" alt="Project name" class="logo" /></a>
                    </div>
                    <div class="col-lg-3 col-sm-10 col-xs-10">
                        <ul class="list-inline menu">
                            <li class="pages">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">Home Page</a></li>
                                    <li><a href="single-video.html">Single Video Page</a></li>
                                    <li><a href="single-video-youtube.html">Single Video Youtube Embedded Page</a></li>
                                    <li><a href="single-video-vimeo.html">Single Video Vimeo Embedded Page</a></li>
                                    <li><a href="upload.html">Upload Video Page</a></li>
                                    <li><a href="upload-edit.html">Upload Video Edit Page</a></li>
                                    <li><a href="search.html">Searched Videos Page</a></li>
                                    <li><a href="channel.html">Single Channel Page</a></li>
                                    <li><a href="channels.html">Channels Page</a></li>
                                    <li><a href="single-video-tabs.html">Single Videos Page With Tabs</a></li>
                                    <li><a href="single-video-playlist.html">Single Videos Page With Playlist</a></li>
                                    <li><a href="history.html">History Page</a></li>
                                    <li><a href="categories.html">Browse Categories Page</a></li>
                                    <li><a href="categories_side_menu.html">Browse Categories Side Menu Page</a></li>
                                    <li><a href="subscription.html">Subscription Page</a></li>
                                    <li><a href="login.html">Login Page</a></li>
                                    <li><a href="signup.html">Signup Page</a></li>
                                </ul>
                            </li>
                            <li class="pages">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{App\Global_var::getLangString('Categories', $language_strings)}}</a>
                                <ul class="dropdown-menu">
                                @foreach($categories as $key=>$value)
                                    <li><a href="{{route('documents.index', $key)}}">{{$value}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            <li class="pages">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Channels</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">Chanel 1</a></li>
                                    <li><a href="index.html">Chanel 1</a></li>
                                    <li><a href="index.html">Chanel 1</a></li>
                                    <li><a href="index.html">Chanel 1</a></li>
                                    <li><a href="index.html">Chanel 1</a></li>
                                    <li><a href="index.html">Chanel 1</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="categories.html">Categories</a></li>
                            <li><a href="channel.html">Channels</a></li> -->
                        </ul>
                    </div>
                    <div class="visible-xs visible-sm clearfix"></div>
                    <div class="col-lg-6 col-sm-8 col-xs-12">
                        <form action="search.html" method="post">
                            <div class="topsearch">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search" aria-describedby="sizing-addon2">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="cv cvicon-cv-video-file"></i>&nbsp;&nbsp;&nbsp;<span class="caret"></span></button><!-- /
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                            <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                        </ul> -->
                                    </div><!-- /btn-group -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="visible-xs clearfix"></div>
                    <div class="col-lg-2 col-sm-4  col-xs-8">
                        <!-- <div class="avatar pull-left">
                            <img src="{{asset('circle_video_sharing/images/avatar.png')}}" alt="avatar" />
                            <span class="status"></span>
                        </div> -->
                        <div class="selectuser pull-left">
                            <div class="btn-group pull-right dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    {{$currentUser!=null? $currentUser->firstName: 'Guest'}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                @if($currentUser==null)
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="signup.html">Sign up</a></li>
                                @else
                                    <li><a class="btn btn-warning btn-flat btn-block" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                                <span>
                                 {{App\Global_var::getLangString('Sign_Out', $language_strings)}}
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }} 
                           </form></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /logo -->



<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-sm-12">
                <div class="sv-video">
<div oncontextmenu="return false">
@if($document_edition->isVideo())
<video poster="{{asset('circle_video_sharing/images/video-placeholder2.png')}}" style="width:100%;height:100%;" controls="controls" width="100%" height="100%" autoplay>
    <source src="{{ route('stream_media', $document_edition->id) }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>
</video>
@elseif($document_edition->isAudio())
  <iframe src="{{ route('stream_media', $document_edition->id) }}" controls controlsList="nodownload" style="width:100%; height:400px;" type="audio/mp3" ></iframe>
@elseif($document_edition->isText())
<embed src="{{ route('stream_text_image', $document_edition->id) }}#toolbar=0&navpanes=0&scrollbar=0" style="width:100%; height:400px;" />
@elseif($document_edition->isImage())
<img src="{{ route('stream_text_image', $document_edition->id) }}" style="width:100%; height:400px;" ></iframe>
@endif
</div>


                </div>
                <h1><a href="#">{{$document_edition->document!=null? $document_edition->document->title:''}} </a></h1>
                <div class="author">
                    <div class="sv-views">
                        <div class="sv-views-count">
                            {{$document_edition->view_count}} {{App\Global_var::getLangString('Views', $language_strings)}}
                        </div>
                        <div class="sv-views-progress">
                            <div class="sv-views-progress-bar"></div>
                        </div>
                    </div>
                    <div class="info">
                    <div class="custom-tabs">
                        <div class="tabs-panel_">
                            <a href="#" class="active" data-tab="tab-1" style="padding: 10px">
                                <i class="cv cvicon-cv-about" data-toggle="tooltip" data-placement="top" title="About"></i>
                                <span>{{App\Global_var::getLangString('Basic_Info', $language_strings)}}</span>
                            </a>
                             @if($currentUser->isGranted_ID('documents.share', $document->id))
                            <a href="{{ route('documents.share', $document_edition->id) }}" style="padding: 10px">
                                <i class="cv cvicon-cv-share" data-toggle="tooltip" data-placement="top" title="Share"></i>
                                <span>{{App\Global_var::getLangString('Share', $language_strings)}}</span>
                            </a>
                            @endif
                             @if($currentUser->isGranted_ID('documents.download', $document->id))
                            <a href="{{ route('documents.download', $document_edition->id) }}" style="padding: 10px">
                                <i class="cv cvicon-cv-download" data-toggle="tooltip" data-placement="top" title="Download"></i>
                                <span>{{App\Global_var::getLangString('Download', $language_strings)}}</span>
                            </a>
                            @endif
                           <!--  <a href="#">
                                <i class="cv cv cvicon-cv-goto" data-toggle="tooltip" data-placement="top" title="Jump to"></i>
                                <span>Jump to</span>
                            </a>
                            <a href="#">
                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to"></i>
                                <span>Add to</span>
                            </a> -->
                            <!-- <div class="acide-panel">
                                 <a href="#"><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a>
                                 <a href="#"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked"></i></a>
                                 <a href="#"><i class="cv cvicon-cv-flag" data-toggle="tooltip" data-placement="top" title="Flag"></i></a>
                            </div> -->
                        </div>
                        <div class="clearfix"></div>

                        <!-- BEGIN tabs-content -->
                        <div class="tabs-content">
                            <!-- BEGIN tab-1 -->
                            <div class="tab-1">
                                <div>
                                    <h4>{{App\Global_var::getLangString('Title', $language_strings)}}:
                                    <small>{{$document_edition->document!=null? $document_edition->document->title:''}}</small></h4>

                                    <h4>{{App\Global_var::getLangString('Category', $language_strings)}} :
                                    <small>{{$document_edition->document!=null? App\Global_var::getLangString($document_edition->document->category, $language_strings):''}}</small>
                                    </h4>

                                    <h4>{{App\Global_var::getLangString('Description', $language_strings)}} :
                                    <small>{{$document_edition->document!=null? App\Global_var::getLangString($document_edition->document->description, $language_strings):''}}.</small>
                                    </h4>
                                    <div class="row date-lic">
                                        <div class="col-lg-12">
                                            <strong>{{App\Global_var::getLangString('Year_of_Publishment', $language_strings)}}:</strong>
                                            <span>{{$document_edition->yearOfPublishment}}</span>
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    
                                            <strong>{{App\Global_var::getLangString('Uploaded_Date', $language_strings)}}:</strong>
                                            <span>{{$document_edition->uploadedDateTime}}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END tab-1 -->
                        </div>
                        <!-- END tabs-content -->
                    </div>
                </div>
                    <div class="clearfix"></div>
                </div>
                
                 <!-- similar videos -->
                    <!-- <div class="caption" style="margin-top: 30px">
                        <div class="left">
                            <h4>Other Videos</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div> -->
                    <div class="list similar-videos" style="margin-top: 30px">

                        <div class="row">
                @foreach($related_by_author_document_editions as $document_edition)
                            <div class="col-lg-3 col-xs-12 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                         <a href="{{route('documents.play', $document_edition->id)}}"><img src="{{asset('circle_video_sharing/images/small-'.$document_edition->document->category.'-placeholder.png')}}" alt=""></a>
                                    </div>
                                    <div class="v-desc">
                                       <a href="{{route('documents.play', $document_edition->id)}}">{{$document_edition->document->title}}</a>
                                    </div>
                                    <div class="v-views">
                                        {{$document_edition->view_count}} {{App\Global_var::getLangString('Views', $language_strings)}}
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
                        <a href="#">Recomended Videos ...</a>
                    </div>
                   
                    <div class="clearfix"></div>
                </div>

                <div class="list" style="overflow-y: auto; overflow-x: hidden; height: 600px; background: //green">
                <?php $i=1; ?>
                @foreach($related_by_author_document_editions as $document_edition)
                    <div class="h-video playlist row">
                        <div class="col-lg-5 col-sm-5 col-xs-6">
                            <div class="v-number">
                                <span>{{$i++}}</span>
                            </div>
                            <div class="v-img">
                                <a href="{{route('documents.play', $document_edition->id)}}"><img src="{{asset('circle_video_sharing/images/small-'.$document_edition->document->category.'-placeholder.png')}}" alt=""></a>
                                <!-- <div class="time">15:19</div> -->
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-6">
                            <div class="v-desc">
                                <a href="{{route('documents.play', $document_edition->id)}}">{{$document_edition->document->title}}</a>
                            </div>
                            <div class="v-views">
                                {{$document_edition->view_count}} {{App\Global_var::getLangString('Views', $language_strings)}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                    @foreach($related_by_publisher_document_editions as $document_edition)
                    <div class="h-video playlist row">
                        <div class="col-lg-5 col-sm-5 col-xs-6">
                            <div class="v-number">
                                <span>{{$i++}}</span>
                            </div>
                            <div class="v-img">
                                <a href="{{route('documents.play', $document_edition->id)}}"><img src="{{asset('circle_video_sharing/images/small-'.$document_edition->document->category.'-placeholder.png')}}" alt=""></a>
                                <!-- <div class="time">15:19</div> -->
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-6">
                            <div class="v-desc">
                                <a href="{{route('documents.play', $document_edition->id)}}">{{$document_edition->document->title}}</a>
                            </div>
                            <div class="v-views">
                                {{$document_edition->view_count}} {{App\Global_var::getLangString('Views', $language_strings)}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                </div>
                <!-- END up next -->

                <!-- load more -->
               <!--  <div class="loadmore">
                    <a href="#">Show more videos</a>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="container padding-def">
                <div class="col-lg-1  col-sm-2 col-xs-12 footer-logo">
                    <a class="navbar-brand" href="index.html"><img src="{{asset('images/'.$logo->logoImage)}}" alt="Project name" class="logo" /></a>
                </div>
                <div class="col-lg-7  col-sm-7 col-xs-12">
                    <div class="delimiter"></div>
                    <div class="f-copy">
                        <ul class="list-inline">
                           <!--  <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li> -->
                            <li>Copyrights &copy; {{date('Y')}} <a href="http:://www.haweltisemaetat.com">{{$logo!=null? $logo->logoText :' EDMS'}}</a> {{App\Global_var::getLangString('All_Rights_Reserved', $language_strings)}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('circle_video_sharing/js/jquery.min.js')}}"></script>
<script src="{{asset('circle_video_sharing/bootstrap/js/bootstrap.min.js')}}"></script>
<script  src="{{asset('circle_video_sharing/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelement-and-player.min.js')}}"></script>
<script src="{{asset('circle_video_sharing/js/custom.js')}}"></script>

<!-- <script src="{{asset('dist/demo.js')}}" crossorigin="anonymous"></script> -->
</body>
</html>
