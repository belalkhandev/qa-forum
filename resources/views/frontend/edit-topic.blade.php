@extends('frontend.layouts.master')

@section('content')
    
    <!-- POST -->
    <div class="post">
            {!! Form::open(['route' => ['fr.topic.update', $topic->id], 'class' => 'form newtopic', 'method' => 'POST']) !!}
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

                    <div class="form-group">
                        <input type="text" placeholder="Enter Topic Title" name="topic_title" class="form-control" value="{{ $topic->title }}"/>
                        <span class="text-danger"></span>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                {!! Form::select('category', makeDropdownList($categories), $topic->category_id, ['placeholder' => 'Select Category', 'class' => 'form-control', 'id' => 'category']) !!}
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                {!! Form::select('subcategory', makeDropdownList($sub_categories), $topic->sub_category_id, ['placeholder' => 'Select sub category', 'class' => 'form-control', 'id' => 'subcategory']) !!}
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <textarea name="description" id="desc" placeholder="brief about your question"  class="form-control" >{{ $topic->description }}</textarea>
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Add image</label><br>
                                    <input type="file" name="image">
                                    <span class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset($topic->photo) }}" alt="" class="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>                              
            <div class="postinfobot">

                <div class="pull-right postreply">
                    <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                    <div class="pull-left">
                        <button type="submit" onclick="submit_form(this, event)" class="btn btn-primary">Post</button>
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

