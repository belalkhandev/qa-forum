@extends('frontend.layouts.master')

@section('content')
    <!-- POST -->
    <div class="post">
        {!! Form::open(['route' => 'fr.register', 'class' => 'form newtopic']) !!}        
            <div class="postinfotop">
                <h2>Create New Account</h2>
            </div>

            <!-- acc section -->
            <div class="accsection">
                <div class="topwrap">
                    <div class="posttext">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="First Name" name="firstname" class="form-control" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Last Name" name="lastname" class="form-control" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <input type="email" placeholder="Email" name="email" class="form-control" />
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <input type="text" placeholder="User Name" name="username" class="form-control" />
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" placeholder="Password" class="form-control" id="pass" name="password" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" placeholder="Retype Password" class="form-control" id="pass2" name="password_confirmation" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>  
            </div><!-- acc section END -->

            <div class="postinfobot">

                <div class="notechbox pull-left">
                    <input type="checkbox" name="note" id="note" class="form-control" />
                </div>

                <div class="pull-left lblfch">
                    <label for="note"> I agree with the Terms and Conditions of this site</label>
                </div>

                <div class="pull-right postreply">
                    <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                    <div class="pull-left">
                        <button type="submit" class="btn btn-primary" id="submitBtn" onclick="submit_form(this, event)" disabled>Sign Up</button>
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
                if(this.checked) {
                    $('#submitBtn').prop('disabled', false);
                } else {
                    $('#submitBtn').prop('disabled', true);
                }
            })

        });	//ready
    </script>
@endpush
