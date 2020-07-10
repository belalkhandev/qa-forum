@extends('frontend.layouts.master')

@section('content')

    <!-- POST -->
    <div class="post beforepagination">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" />
                    <div class="status green">&nbsp;</div>
                </div>

                <div class="avatar-info">
                    <h4>{{ $topic->user->name }}</h4>
                </div>

            </div>
            <div class="posttext pull-left">
                <h2>{{ $topic->title }}</h2>
                <p>{{ $topic->description }}</p>
            </div>
            <div class="clearfix"></div>
        </div>                              
        <div class="postinfobot">

            <div class="likeblock pull-left">
                <span class="up topic_vote" id="topic_like" data-topicid="{{ $topic->id }}" data-vote="1">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span class="topic_like_count">{{ $like }}</span>
                </span>

                <span class="down topic_vote" id="topic_dislike" data-topicid="{{ $topic->id }}" data-vote="0">
                    <i class="fa fa-thumbs-o-down" ></i>
                    <span class="topic_dislike_count">{{ $dislike }}</span>
                </span>
            </div>

            <div class="prev pull-left">
                <label for="answer" class="ans-label"><i class="fa fa-reply"></i></label>
            </div>

            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{ user_formatted_datetime($topic->created_at) }}</div>

            <div class="clearfix"></div>
        </div>
    </div><!-- POST -->

    {{-- all answers --}}
    <h3 class="post-section-title">Answers ({{ count($topic->answers) }})</h3>

    @if($topic->answers)
        @foreach ($topic->answers as $answer)
            <div class="post answerpost">
                <div class="topwrap">
                    <div class="userinfo pull-left">
                        <div class="avatar">
                            <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" />
                            <div class="status red">&nbsp;</div>
                        </div>

                        <div class="avatar-info">
                            <h4>{{ $answer->user->name }}</h4>
                        </div>
                    </div>
                    <div class="posttext pull-left">
                        <p>{{ $answer->description }}</p>
                    </div>
                    <div class="clearfix"></div>
                </div>                              
                <div class="postinfobot">

                    <div class="likeblock pull-left">
                        <span class="up answer_vote" data-answerid="{{ $answer->id }}" data-answer_vote="1">
                            <i class="fa fa-thumbs-o-up"></i>
                            <span class="answer_like_count">{{ count($answer->likes) }}</span>
                        </span>

                        <span class="down answer_vote" data-answerid="{{ $answer->id }}" data-answer_vote="0">
                            <i class="fa fa-thumbs-o-down"></i>
                            <span class="answer_dislike_count">{{ count($answer->dislikes) }}</span>
                        </span>
                    </div>

                    <div class="prev pull-left">                                        
                        <a href="#"><i class="fa fa-reply"></i></a>
                    </div>

                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{ user_formatted_datetime($answer->created_at) }}</div>

                    <div class="clearfix"></div>
                </div>
            </div>
        @endforeach

    @endif
    

    @if(Auth::user())
        <h3 class="post-section-title">Your Answer</h3>
        <!-- POST -->
        <div class="post">
            {!! Form::open(['route' => ['fr.topic-answer', $topic->id], 'class' => 'form', 'method' => 'POST']) !!}
                <div class="topwrap">
                    <div class="userinfo pull-left">
                        <div class="avatar">
                            <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" />
                            <div class="status red">&nbsp;</div>
                        </div>

                        <div class="avatar-info">
                            <h4>{{ Auth::user()->name }}</h4>
                        </div>

                    </div>
                    <div class="posttext pull-left">
                        <div class="textwraper answer-textwrapper">
                            <div class="form-group">
                                <textarea name="answer" id="answer" placeholder="Type your answer here"></textarea>
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
                            <button type="submit" class="btn btn-primary" onclick="submit_form(this, event)">Post Reply</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            {!! Form::close() !!}
        </div><!-- POST -->
        @else 
        <h3 class="post-section-title">To replay your answer please <a class="btn btn-sm btn-danger" href="{{ route('fr.login-account') }}">Sign In</a></h3>
    @endif

@endsection

@push('footer-scripts')
<script>
    (function ($) {
        "use-strict"

        jQuery(document).ready(function () {

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            //onclick vote question
            $(document).on('click', '.topic_vote', function () {
                let topic_id = $(this).data('topicid');
                let vote = $(this).data('vote');
                $.ajax("{{ route('fr.topic-vote') }}", {
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        topic_id: topic_id,
                        vote: vote,
                    },
                    beforeSend: function(xhr) {
                        
                    },
                    success: function(res, status, xhr) {
                        if (status == 'success') {
                            if (res.statusCode == 401) {
                                Toast.fire({
                                    type: 'warning',
                                    title: 'Unauthorized:',
                                    text: res.message,
                                });
                            } else if (res.statusCode == 200) {
                                $('.topic_like_count').html(res.data.likes);
                                $('.topic_dislike_count').html(res.data.dislikes);

                                Toast.fire({
                                    type: 'success',
                                    title: 'We Appreciate',
                                    text: res.message,
                                })
                            } else if (res.statusCode == 409) {
                                $('.topic_like_count').html(res.data.likes);
                                $('.topic_dislike_count').html(res.data.dislikes);
                            }
                        }

                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        // on error response
                    }
                });
            });
            

            //onclick vote answer
            $(document).on('click', '.answer_vote', function () {
                let answer_id = $(this).data('answerid');
                let vote = $(this).data('answer_vote');
                let _self = $(this);
                $.ajax("{{ route('fr.answer-vote') }}", {
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        answer_id: answer_id,
                        vote: vote,
                    },
                    beforeSend: function(xhr) {
                        
                    },
                    success: function(res, status, xhr) {
                        console.log(res.data);
                        
                        if (status == 'success') {
                            if (res.statusCode == 401) {
                                Toast.fire({
                                    type: 'warning',
                                    title: 'Unauthorized:',
                                    text: res.message,
                                });
                            } else if (res.statusCode == 200) {
                                _self.children('.answer_like_count').html(res.data.likes);
                                _self.children('.answer_dislike_count').html(res.data.dislikes);

                                Toast.fire({
                                    type: 'success',
                                    title: 'We Appreciate',
                                    text: res.message,
                                })
                            } else if (res.statusCode == 409) {
                                _self.children('.answer_like_count').html(res.data.likes);
                                _self.children('.answer_dislike_count').html(res.data.dislikes);
                            }
                        }

                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        // on error response
                    }
                });
            });


            $(document).on('change', '#category', function() {
                let category_id = $(this).val();
                let sub_category = '<option value="">Select Sub Category</option>';  
                if (category_id) {
                    $.ajax("{{ route('find.subcategory') }}", {
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            category_id: category_id,
                        },
                        beforeSend: function (xhr) {
                            $('#subcategory').html('<option value="">Loading....</option>');
                        },
                        success: function (res, status, xhr) {
                            if(status = 'success' && res.sub_categories) {
                                $.each(res.sub_categories, function(key, category) {
                                    sub_category += '<option value="'+category.id+'">'+category.name+'</option>'
                                });
                            } else {
                                sub_category = '<option value="">Not found</option>'
                            }

                            $('#subcategory').html(sub_category);
                        },
                        error: function (jqXhr, textStatus, errorMessage) {

                        }
                    });
                } else {
                    $('#subcategory').html(sub_category);
                }
            });

        });
    }(jQuery));
</script>
@endpush

