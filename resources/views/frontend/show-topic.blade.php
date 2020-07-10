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
                <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>{{ $like }}</a>
                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>{{ $dislike }}</a>
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
            <!-- POST -->
            <div class="post">
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
                        <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>55</a>
                        <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>12</a>
                    </div>

                    <div class="prev pull-left">                                        
                        <a href="#"><i class="fa fa-reply"></i></a>
                    </div>

                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : 20 Nov @ 9:50am</div>

                    <div class="next pull-right">                                        
                        <a href="#"><i class="fa fa-share"></i></a>

                        <a href="#"><i class="fa fa-flag"></i></a>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div><!-- POST -->
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

