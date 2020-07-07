@extends('layouts.base')

@section('base.content')

    <!-- admin-page-area -->
    <div class="dashboard-wrapper">
        <!-- sidebar-for-menu-area -->
        <aside class="sidebar-area">
            <div class="logo">
                <a href="{{ route('dashboard') }}">
                    <h1>Academic Management</h1>
                </a>
            </div>

            {{-- include naviagtion --}}
            @include('layouts.partials._navigation')

        </aside>
        <!-- page-content-area -->
        <section class="main-content-area">

            {{-- include header --}}
            @include('layouts.partials._header')

            <!-- main-content-area -->
            <div class="main-content">
                {{-- <div class="content-page-title">
                    <h3>@yield('page_header', $page_header)</h3>
                </div> --}}
                <div class="content">
                    {{-- all content goes to here --}}
                    @yield('content')

                </div>
            </div>
        </section>
    </div>

    {{-- include footer --}}
    {{-- @include('layouts.partials._footer') --}}

@endsection