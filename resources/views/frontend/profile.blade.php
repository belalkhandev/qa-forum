@extends('frontend.layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['class' => 'profile-form', 'method' => 'POST', 'route' => 'fr.profile.update']) !!}
            <div class="col-md-3">
                <div class="profile_img">
                    <img src="{{ asset($profile->photo) }}" alt="">
                </div>
                <div class="avatar-name">
                    <h3>{{ $profile->first_name.' '.$profile->last_name }}</h3>
                </div>
                <div class="new-photo">
                    <label for="">Update Photo</label><br>
                    <input type="file" name="profile_photo">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-9">
                <h3 class="post-section-title">Profile information</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->first_name }}" name="first_name" placeholder="First name" class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->last_name }}" name="last_name" placeholder="Last name" class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->user->username }}" placeholder="Username" readonly class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->user->email }}" placeholder="Email" readonly class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->qalification }}" name="qualification" placeholder="Educational qualification" class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->district }}" name="home_district" placeholder="Home District" class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->address }}" name="current_address" placeholder="Current address" class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->website }}" name="website_link" placeholder="Website link" class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->facebook }}" name="facebook_link" placeholder="Facebook link" class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->youtube }}" name="youtube_link" placeholder="Youtube link" class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" value="{{ $profile->linkedin }}" name="linkedin_link" placeholder="Linkedin link" class="form-control">
                            <span class="text-dangere"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary" onclick="submit_form(this, event)">Save changes</button>
                    </div>
                </div>              
            </div>
            
            {!! Form::close() !!}
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
