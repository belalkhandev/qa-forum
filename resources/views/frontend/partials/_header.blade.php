<!-- Slider -->
<div class="tp-banner-container">
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
</div>
<!-- //Slider -->

<div class="headernav">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="{{ route('fr.home') }}"><img src="{{ asset('frontend/assets/img/logo.jpg') }}" alt=""  /></a></div>
            <div class="col-lg-1 col-md-1">                
                <ul class="navbar nav">
                    <li>
                        <a href="{{ route('fr.home') }}">Home</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 search hidden-xs hidden-sm col-md-4">
                <div class="wrap">
                    {!! Form::open(['route' => 'fr.search.topic', 'class' => 'form search_form', 'method' => 'GET']) !!}
                        <div class="pull-left txt">
                            <input type="text" id="searchInput" name="keyword" class="form-control" placeholder="Search Topics" autocomplete="off">
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="search_match_items">
                            <ul id="matched_items">
                                
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    {!! Form::close() !!}
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
                    <div class="env pull-right" id="notification_dropdown">
                        <i class="fa fa-bell"></i>
                        <div class="notification-box">
                            <div class="notification-box-header">
                                <h3 class="notification-box-title">Notificatoin</h3>
                            </div>
                            <div class="notification-box-body">
                                

                                {{-- <a href="#" class="notification-item">
                                    <div class="user-img">
                                        <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="">
                                    </div>
                                    <div class="user-action">
                                        <h3>Belal Khan <span> Answer your post</span></h3>
                                        <p><i class="fa fa-clock-o"></i>1 min ago</p>
                                    </div>
                                </a> --}}
                            </div>
                            <div class="notification-box-footer">
                                <a href="{{ route('fr.notifications') }}">See All</a>
                            </div>
                        </div>
                    </div>
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

@push('footer-scripts')
<script>
    (function ($) {
        "use-strict"

        jQuery(document).ready(function () {

            //onclick vote answer
            $(document).on('keyup', '#searchInput', function () {
                let search_keyword = $.trim($(this).val());
                
                if (search_keyword.length > 0) {
                    $.ajax("{{ route('fr.search.match') }}", {
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            search_keyword: search_keyword,
                        },
                        beforeSend: function(xhr) {
                            $('.search_match_items').removeClass('show');
                            $('#matched_items').html('');
                        },
                        success: function(res, status, xhr) {
                            if (status == 'success') {
                                $('.search_match_items').addClass('show');
                                $('#matched_items').html(res);
                            }

                        },
                        error: function (jqXhr, textStatus, errorMessage) {
                            // on error response
                        }
                    });
                } else {
                    $('.search_match_items').removeClass('show');
                    $('#matched_items').html('');
                }
                
            });

            $(document).on('click', '.matched_item', function () {
                let item = $(this).html();
                $('#searchInput').val(item);
                $('.search_match_items').removeClass('show');
                $('#matched_items').html('');
            });

            $(document).on('click', '#notification_dropdown', function () {
                $(this).toggleClass('show-notification');
                
                if ($('.show-notification').length > 0) {
                    $.ajax("{{ route('fr.get.notification') }}", {
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}", 
                        },
                        beforeSend: function (xhr) {
                            $('.notification-box-body').html('<p>Please wait, loading...........</p>');
                        },
                        success: function (res, status, xhr) {
                            if (status = 'success') {
                                $('.notification-box-body').html(res)
                            }
                        },
                        error: function (jqXhr, textStatus, errorMessage) {

                        }
                    });
                } else {
                    console.log('no action');
                }
            });

        });
    }(jQuery));
</script>
@endpush