<!-- Slider -->
{{-- <div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>	
            <!-- SLIDE  -->
            <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                <!-- MAIN IMAGE -->
                <img src="{{ asset('frontend/assets/img/slide.jpg') }}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                <!-- LAYERS -->
            </li>
        </ul>
    </div>
</div> --}}
<!-- //Slider -->

<div class="headernav">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="{{ route('fr.home') }}"><img src="{{ asset('frontend/assets/img/logo.jpg') }}" alt=""  /></a></div>
            <div class="col-lg-5 search hidden-xs hidden-sm col-md-4">
                <div class="wrap">
                    <form action="#" method="post" class="form">
                        <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                        <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12 col-sm-5 col-md-6 avt">
                <div class="stnt pull-left">
                    <a href="{{ route('fr.newTopic') }}" class="btn btn-primary">Start New Topic</a>
                </div>                

                @if (Auth::user())
                    <div class="avatar pull-right dropdown">
                        <a data-toggle="dropdown" href="#">
                            <span>{{ Auth::user()->name }}</span>
                            <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" /></a> 
                            <b class="caret"></b>
                        <div class="status green">&nbsp;</div>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Inbox</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-3" href="{{ route('fr.logout') }}">Log Out</a></li>
                        </ul>
                    </div>                    
                    <div class="env pull-right"><i class="fa fa-bell"></i></div>
                    @else 
                    <div class="header-nav">
                        <ul>
                            <li><a href="{{ route('fr.login-account') }}">Sign In</a></li>
                            <li><a href="{{ route('fr.create-account') }}">Create Account</a></li>
                        </ul>
                    </div>
                @endif
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>