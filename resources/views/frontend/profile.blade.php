@extends('frontend.layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="profile_img">
                    @if($profile->photo)
                        <img src="{{ asset($profile->photo) }}" alt="">
                    @else                    
                    <img src="{{ asset('frontend/assets/img/avatar-blank.jpg') }}" alt="">
                    @endif
                </div>
                <div class="avatar-name">
                    <h3>{{ $profile->first_name.' '.$profile->last_name }}</h3>
                </div>
            </div>
            <div class="col-md-9">
                <h3 class="post-section-title">Profile information</h3>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table user-profile-table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $profile->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $profile->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Educational Qualification</th>
                                <td>{{ $profile->qualification }}</td>
                            </tr>
                            <tr>
                                <th>Home District</th>
                                <td>{{ $profile->district }}</td>
                            </tr>
                            <tr>
                                <th>Current Address</th>
                                <td>{{ $profile->address }}</td>
                            </tr>
                            <tr>
                                <th>Social Link</th>
                                <td>
                                    <ul>
                                        @if($profile->website)
                                            <li>
                                                <i class="fa fa-globe"></i>
                                            <span>{{ $profile->website }}</span>
                                            </li>
                                        @endif
                                        @if($profile->facebook)
                                            <li>
                                                <i class="fa fa-facebook"></i>
                                            <span>{{ $profile->facebook }}</span>
                                            </li>
                                        @endif
                                        @if($profile->youtube)
                                            <li>
                                                <i class="fa fa-youtube"></i>
                                            <span>{{ $profile->youtube }}</span>
                                            </li>
                                        @endif
                                        @if($profile->linkedin)
                                            <li>
                                                <i class="fa fa-linkedin"></i>
                                            <span>{{ $profile->linkedin }}</span>
                                            </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                @if(Auth::user() && Auth::user()->id == $profile->user_id)
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('fr.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>  
                @endif            
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
