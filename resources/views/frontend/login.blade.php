@extends('frontend.layouts.auth')

@section('content')
    <!-- POST -->
    <div class="post">
        {!! Form::open(['route' => 'fr.login', 'class' => 'form newtopic']) !!}
            <div class="postinfotop">
                <h2>Sign In</h2>
            </div>
            
            <div class="posttext account-form">
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email or Username" class="form-control">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="posttext-info">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="">Forgot Password</a>
                        </div>
                        <div class="col-md-6">
                            <p>Have no account? <a href="{{ route('fr.create-account') }}">Create Account</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="postinfobot">

                <div class="pull-right postreply">
                    <div class="pull-left">
                        <button type="submit" class="btn btn-primary">Sign In</button>
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

        jQuery(document).ready(function() {
            "use strict";
                
            $(document).on('click', '#note', function() {
                
            })

        });	//ready
    </script>
@endpush
