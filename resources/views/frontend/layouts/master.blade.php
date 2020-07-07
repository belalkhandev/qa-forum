@extends('frontend.layouts.base')

@section('content.base')

    @include('frontend.partials._header')

    @include('frontend.partials._navigation')

    @yield('content')
        
    @include('frontend.partials._footer')

@endsection()