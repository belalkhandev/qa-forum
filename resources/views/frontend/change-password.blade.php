@extends('frontend.layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-md-offset-4 col-lg-offset-4">
            <div class="post">
                {!! Form::open(['route' => 'fr.update-password', 'class' => 'form newtopic']) !!}
                    <div class="postinfotop">
                        <h2>Change password</h2>
                    </div>
                    
                    <div class="posttext account-form">
                        
                        <div class="form-group">
                            <input type="password" name="current_password" placeholder="Current Password" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="New Password" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                    </div>

                    <div class="postinfobot">
                        <div class="pull-right postreply">
                            <div class="pull-left">
                                <button type="submit" class="btn btn-primary" onclick="submit_form(this, event)">Update Password</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    
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
