@extends('frontend.layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="profile_img">
                    @if($profile->photo)
                        <img src="{{ asset($profile->photo) }}" alt="">
                    @else                    
                    <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="">
                    @endif
                </div>
                <div class="avatar-name">
                    <h3>{{ $profile->first_name.' '.$profile->last_name }}</h3>
                </div>
            </div>
            <div class="col-md-9">
                <h3 class="post-section-title">Profile information</h3>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table user-profile-table">
                            <tr>
                                <td style="width: 300px"><b>Name</b></td>
                                <td>{{ $profile->user->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>{{ $profile->user->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Educational Qualification</b></td>
                                <td>{{ $profile->qualification }}</td>
                            </tr>
                            <tr>
                                <td><b>Home District</b></td>
                                <td>{{ $profile->district }}</td>
                            </tr>
                            <tr>
                                <td><b>Current Address</b></td>
                                <td>{{ $profile->address }}</td>
                            </tr>
                            <tr>
                                <td><b>Social Link</b></td>
                                <td>
                                    <ul>
                                        @if($profile->website)
                                            <li>
                                                <i class="fa fa-globe"></i>
                                            <span>{{ $profile->website }}</span>
                                            </li>
                                        @endif
                                        @if($profile->facebook)
                                            <li>
                                                <i class="fa fa-facebook"></i>
                                            <span>{{ $profile->facebook }}</span>
                                            </li>
                                        @endif
                                        @if($profile->youtube)
                                            <li>
                                                <i class="fa fa-youtube"></i>
                                            <span>{{ $profile->youtube }}</span>
                                            </li>
                                        @endif
                                        @if($profile->linkedin)
                                            <li>
                                                <i class="fa fa-linkedin"></i>
                                            <span>{{ $profile->linkedin }}</span>
                                            </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                @if(Auth::user() && Auth::user()->id == $profile->user_id)
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('fr.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>  
                @endif            
            </div>
        </div>
    </div>
    {{-- my contributions --}}
    @if(Auth::user() && Auth::user()->id == $profile->user_id)
    <div class="user-question-area">
        <div class="container">
            <div class="row">
                <div class="com-md-12">
                    <div class="user-question">
                        <h3 class="post-section-title">Questions ({{ count($questions) }})</h3>
                        <table class="table user-question-table">
                            <thead>
                                <tr>
                                    <th style="width: 85px">#</th>
                                    <th>Question</th>
                                    <th style="width: 120px">Answers</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            @if($questions)
                                <tbody>
                                    @foreach ($questions as $key => $question)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td><a href="{{ route('fr.topic.show', $question->id) }}">{{ $question->title }}</a></td>
                                            <td>{{ count($question->answers) }}</td>
                                            <td style="display: flex;align-items: center;justify-content: space-evenly ">
                                                <a href="{{ route('fr.topic.edit', $question->id) }}" class="btn btn-custom-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                {!! Form::open(['route' => ['fr.topic.question.destroy', $question->id], 'method' => 'DELETE', 'class'=>'inline-el']) !!}
                                                    <button type="submit" class="btn btn-danger btn-custom-sm" onclick="deleteSwal(this, event)" data-toggle="tooltip" title="Delete" data-placement="top">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="user-answer-area">
        <div class="container">
            <div class="row">
                <div class="com-md-12">
                    <div class="user-answer">
                        <h3 class="post-section-title">Answers ({{ count($answers) }})</h3>
                        <table class="table user-answer-table">
                            <thead>
                                <tr>
                                    <th style="width: 85px">#</th>
                                    <th>Answer</th>
                                    <th>Question</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            @if($answers)
                            <tbody>
                                @foreach ($answers as $key => $answer)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ Str::limit($answer->description, 80, '....') }}</td>
                                        <td><a href="{{ route('fr.topic.show', $answer->question->id) }}">{{ $answer->question->title }}</a></td>
                                        <td style="display: flex;align-items: center;justify-content: space-evenly ">
                                            <a href="{{ route('fr.topic.edit', $answer->id) }}" class="btn btn-custom-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['route' => ['fr.topic.answer.destroy', $answer->id], 'method' => 'DELETE', 'class'=>'inline-el']) !!}
                                                <button type="submit" class="btn btn-danger btn-custom-sm" onclick="deleteSwal(this, event)" data-toggle="tooltip" title="Delete" data-placement="top">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection

@push('footer-scripts')
    <script>

        jQuery(document).ready(function() {
            "use strict";
                
            $(document).on('click', '#note', function() {
                
            })

        });	//ready
    </script>
@endpush
