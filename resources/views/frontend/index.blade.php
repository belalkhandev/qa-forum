@extends('frontend.layouts.master')

@section('content')

<!-- slider area -->
    <section class="welcome-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="welcome-slides owl-carousel" id="welcomeSlider">
                        <div class="single-slide">
                            <img src="{{ asset('frontend/assets/images/slider-1.jpg') }}" alt="">
                            <!-- <div class="slide-caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas facere aspernatur adipisci dolore, dolor nam consectetur! Inventore aliquam natus similique!</p>
                            </div> -->
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/assets/images/slider-1.jpg') }}" alt="">
                            <!-- <div class="slide-caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas facere aspernatur adipisci dolore, dolor nam consectetur! Inventore aliquam natus similique!</p>
                            </div> -->
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/assets/images/slider-1.jpg') }}" alt="">
                            <!-- <div class="slide-caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas facere aspernatur adipisci dolore, dolor nam consectetur! Inventore aliquam natus similique!</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- maincontent area -->
    <section class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-content">
                        <div class="welcome-content">
                            <div class="section-title">
                                <h2>WELCOME TO LEWIS COURT HIGH SCHOOL</h2>
                                <p>A message from the principal</p>
                            </div>
                            <div class="section-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{ asset('frontend/assets/images/sks.jpg') }}" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quo, et reiciendis a explicabo corrupti mollitia quam molestiae maiores nobis.</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quo, et reiciendis a explicabo corrupti mollitia quam molestiae maiores nobis.</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quo, et reiciendis a explicabo corrupti mollitia quam molestiae maiores nobis.</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quo, et reiciendis a explicabo corrupti mollitia quam molestiae maiores nobis. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores accusamus voluptate totam nemo deserunt, quas ratione cumque laboriosam necessitatibus. Dolores et ea, expedita repellat ipsum minus enim necessitatibus debitis ipsa nemo cumque eum quas suscipit corrupti error quidem officiis cum sint nam officia dolorum illum ullam rerum. Obcaecati, vitae dicta?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @include('frontend.partials._sidebar')
                </div>
            </div>
        </div>
    </section>

@endsection