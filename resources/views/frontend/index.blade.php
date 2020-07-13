@extends('frontend.layouts.master')

@section('content')
    @if($questions->isNotEmpty())
        @foreach ($questions as $key => $question)
        <div class="post">
            <div class="wrap-ut pull-left">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        @if($question->user->profile)
                            @if ($question->user->profile->photo)
                                <img src="{{ asset($question->user->profile->photo) }}" alt="" />  
                            @else 
                                <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" /> 
                            @endif
                        @else
                            <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" /> 
                        @endif
                        <div class="status green">&nbsp;</div>
                    </div>
                    <div class="avatar-info">
                        <h4>{{ $question->user->name }}</h4>
                    </div>
                    <div class="category-name">
                        <span>{{ $question->category->name }}</span>
                        {!! $question->subCategory ? '<span>'. $question->subCategory->name .'</span>' : '' !!}
                    </div>
                </div>
                <div class="posttext pull-left">
                    <h2><a href="{{ route('fr.topic.show', $question->id) }}">{{ $question->title }}</a></h2>
                    {{ Str::limit($question->description, 150, '....') }}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfo pull-left">
                <div class="comments">
                    <div class="commentbg">
                        {{ count($question->answers) }}
                        <div class="mark"></div>
                    </div>
    
                </div>
                <div class="views"><i class="fa fa-eye"></i> {{ $question->seen }}</div>
                <div class="time"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($question->created_at)->diffForHumans() }}</div>                                    
            </div>
            <div class="clearfix"></div>
        </div><!-- POST -->
        @endforeach
        @else 
        <h3>No Topic Found</h3>
    @endif
    
@endsection
