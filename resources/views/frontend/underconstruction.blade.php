@extends('frontend.layouts.master')

@section('content')

<!-- page title -->
<div class="page-title-area">
    <div class="container   ">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title text-center">
                    <h3>Under Construction</h3>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- maincontent area -->
<section class="main-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="main-content">
                    
                </div>
            </div>
            <div class="col-md-4">
                @include('frontend.partials._sidebar')
            </div>
        </div>
    </div>
</section>

@endsection