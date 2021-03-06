@extends('frontend.layouts.master')

@section('content')
    <!-- POST -->
    
    <div class="post">
        <div class="wrap-ut pull-left">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <img src="{{ asset('frontend/assets/img/avatar.jpg') }}" alt="" />
                    <div class="status green">&nbsp;</div>
                </div>

                <div class="icons">
                    <img src="{{ asset('frontend/assets/img/icon1.jpg') }}" alt="" /><img src="{{ asset('frontend/assets/img/icon4.jpg') }}" alt="" />
                </div>
            </div>
            <div class="posttext pull-left">
                <h2><a href="02_topic.html">10 Kids Unaware of Their Halloween Costume</a></h2>
                <p>It's one thing to subject yourself to a Halloween costume mishap because, hey, that's your prerogative.</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="postinfo pull-left">
            <div class="comments">
                <div class="commentbg">
                    560
                    <div class="mark"></div>
                </div>

            </div>
            <div class="views"><i class="fa fa-eye"></i> 1,568</div>
            <div class="time"><i class="fa fa-clock-o"></i> 24 min</div>                                    
        </div>
        <div class="clearfix"></div>
    </div><!-- POST -->
    
@endsection
