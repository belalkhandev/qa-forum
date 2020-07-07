<div class="sidebar-item">
    <div class="sidebar-section-title">
        <h3>Latest Notice</h3>
    </div>
    <div class="sidebar-section-content">
        @if($notices)
            <div class="notice-items">
                @foreach ($notices as $key => $notice)
                    <div class="notice-item">
                        <p><a href="{{ route('frontend.notice.show', $notice->id) }}">{{ $notice->title }}</a></p>
                        <div class="publish_date"><i class="fas fa-calendar-alt"></i> {{ user_formatted_date($notice->publish_date) }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
 
<div class="sidebar-item">
    <div class="sidebar-section-title">
        <h3>Pricipal</h3>
    </div>
    <div class="sidebar-section-content">
        <div class="message-item text-center">
            <div class="avatar">
                <img src="{{ asset('frontend/assets/images/unnamed.png') }}" alt="">
            </div>
            <div class="avatar-title">
                <h3>Md. Muhib Hossain</h3>
            </div>
            <div class="avatar-link">
                <a href="#" class="btn btn-sm btn-danger">Read More</a>
            </div>
        </div>
    </div>
</div>   
 