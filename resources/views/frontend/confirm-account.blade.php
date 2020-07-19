@extends('frontend.layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-md-offset-3 col-lg-offset-3">
            <div class="post">
                <div class="postinfotop">
                    <h2>Welcome! {{ $user->name }}</h2>
                </div>
                
                <div class="posttext">
                    <p>Thanks for register, please wait for admin apporval, after aprove your account you can access others functonalities.</p>
                </div>

                <div class="postinfobot">

                    <div class="pull-right postreply">
                        <div class="pull-left">
                            <a href="{{ route('fr.login-account') }}" class="btn btn-primary">Sign In</a> 
                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <div class="clearfix"></div>
                </div>
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
