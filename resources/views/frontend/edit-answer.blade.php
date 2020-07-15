@extends('frontend.layouts.master')

@section('content')
        <h3 class="post-section-title">Edit answer</h3>
        <!-- POST -->
        <div class="post">
            {!! Form::open(['route' => ['fr.answer.update', $answer->id], 'class' => 'form', 'method' => 'POST']) !!}
                <div class="topwrap">
                    <div class="userinfo pull-left">
                        <div class="avatar">
                            @if(Auth::user()->profile)
                                @if (Auth::user()->profile->photo)
                                    <img src="{{ asset(Auth::user()->profile->photo) }}" alt="" />  
                                @else 
                                    <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" /> 
                                @endif
                            @else
                            <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" /> 
                            @endif
                        </div>

                    </div>
                    <div class="posttext pull-left">
                        <div class="textwraper answer-textwrapper">
                            <div class="form-group">
                                <textarea name="answer" id="answer" placeholder="Type your answer here">{{ $answer->description }}</textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>  

                <div class="postinfobot">
                    <div class="pull-right postreply">
                        <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                        <div class="pull-left">
                            <button type="submit" class="btn btn-primary" onclick="submit_form(this, event)">Update Answer</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            {!! Form::close() !!}
        </div><!-- POST -->
@endsection

@push('footer-scripts')
<script>
    (function ($) {
        "use-strict"

        jQuery(document).ready(function () {
            

        });
    }(jQuery));
</script>
@endpush

