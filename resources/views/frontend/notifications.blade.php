@extends('frontend.layouts.master')

@section('content')
    @if($notifications->isNotEmpty())
        <h3 class="post-section-title">Your Notifications: {{ count($notifications) }} notification found</h3>
        <div class="notificaions">
            @foreach ($notifications as $key => $item)
                <a href="{{  route('fr.topic.show', $item->notification_for_id) }}" class="notification-item">
                    <div class="user-img">
                        <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="">
                            @if($item->userFrom->profile)
                                @if ($item->userFrom->profile->photo)
                                    <img src="{{ asset($item->userFrom->profile->photo) }}" alt="" />  
                                @else 
                                    <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" /> 
                                @endif
                            @else
                                <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" /> 
                            @endif
                    </div>
                    <div class="user-action">
                        <h3>{{ $item->userFrom->name }} <span> {{ $item->notification_title }}</span></h3>
                        <p><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        @else 
        <h3>No Notificaion found Found</h3>
    @endif
    
@endsection
