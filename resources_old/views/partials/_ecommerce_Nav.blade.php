<?php $user=Auth::guard('web')->user(); ?>
<!-- guest nav -->
<div class="header main_section_agile" id="home" style="background-color: #4078a5">
    <div class="agileits_w3layouts_banner_nav">
        <nav class="navbar navbar-default">
            <div class="col-md-12">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
             <h4>
             <img src="{{App\LogoImage::orderBy('id', 'desc')->first()!=null? '../images/'.App\LogoImage::orderBy('id', 'desc')->first()->image:''}}" alt="Logo Image" style="width:80px; height: 50px; border-radius: 45%;" />
            <a class="" href="/" style="font-family: algerian; color: white"> <strong>{{App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logo:''}}</strong></a></h4>
            </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <div class="col-md-12 col-md-offset-2">
                <nav class="link-effect-2" id="link-effect-2">
                    <ul class="nav navbar-nav"> 
                        <li><input type="text" name="searchItems" class="searchItems_Tf" placeholder="   Search..." style="background-color: #c6ecd6"></li>
                        <li class="{{Request::is('/')? 'active':''}}"><a href="/" class="effect-3">HOME </a></li>
                        <!-- <li class="{{Request::is('shop/list')? 'active':''}}"><a href="{{route('shop')}}" class="effect-3">SHOP </a></li> -->
                        <li class="{{Request::is('abouts/externalAboutPage')? 'active':''}}"><a href="{{route('abouts.externalAboutPage')}}" class="effect-3 scroll">ABOUT</a></li>
                        <li class="{{Request::is('externalBlogsIndex')? 'active':''}}"><a href="{{route('blogs.externalBlogsIndex')}}" class="effect-3 scroll">BLOG</a></li>
                        <!--  <li class="{{Request::is('itemsInCart')? 'active':''}}"><a href="{{route('items.itemsInCart')}}" class="itemsInCart effect-3 scroll">CART <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="cartItemsCount warnning" style="font-size: 20px;"></span></a></li> -->
                         @if($user==null)
                         <li class=""><a href="{{route('login')}}" class="loginBtn effect-3 scroll">LOGIN</a></li>
                         <li class=""><a href="{{route('users.showRegisterUserPage')}}" class="effect-3 scroll">Sign Up</a></li>
                         @else
                         <li class="{{Request::is('userPurchases/'.$user->id)? 'active':''}}"><a href="{{route('shop.userPurchases', $user->id)}}" class="userPurchases effect-3 scroll">My Purchases </a></li>
            
                        <li>
                         {{Form::open(array('route'=>'user.logout', "method"=>"POST"))}}
                        <button type="submit" class=""> <i class="fa fa-sign-out pull-left"></i>Log Out</button>
                        {{Form::close()}}
                        </li>
                         @endif
                         
                    </ul>
                </nav>
            </div>
            </div>
        </nav>  
        <div class="clearfix"> </div> 
    </div>
</div>