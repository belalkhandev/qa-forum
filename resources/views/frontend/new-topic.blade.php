@extends('frontend.layouts.master')

@section('content')
    
    <!-- POST -->
    <div class="post">
            {!! Form::open(['route' => 'fr.newTopic.store', 'class' => 'form newtopic', 'method' => 'POST']) !!}
            <div class="topwrap">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="" />
                        <div class="status red">&nbsp;</div>
                    </div>
                </div>
                <div class="posttext pull-left">

                    <div class="form-group">
                        <input type="text" placeholder="Enter Topic Title" name="topic_title" class="form-control" />
                        <span class="text-danger"></span>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <select name="category" id="category"  class="form-control" >
                                    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <select name="subcategory" id="subcategory"  class="form-control" >
                                    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <textarea name="description" id="desc" placeholder="Description"  class="form-control" ></textarea>
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
                        <button type="submit" onclick="submit_form(this, event)" class="btn btn-primary">Post</button>
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="clearfix"></div>
            </div>
        {!! Form::close() !!}
    </div><!-- POST -->
    
@endsection
