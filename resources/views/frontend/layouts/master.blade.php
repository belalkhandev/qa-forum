<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from forum.azyrusthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jul 2020 04:23:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forum :: Home Page</title>

        <!-- Bootstrap -->
        <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom -->
        <link href="{{ asset('frontend/assets/css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <![endif]-->

        <!-- fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">

        <!-- CSS STYLE-->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}" media="screen" />

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/rs-plugin/css/settings.css') }}" media="screen" />

    </head>
    <body>

        <div class="container-fluid">

            {{-- header include --}}
            @include('frontend.partials._header')

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            
                            {{-- content goes to here --}}
                            @yield('content')

                        </div>

                        {{-- sidebar --}}
                        @include('frontend.partials._sidebar')
                    </div>
                </div>

            </section>
            
            @include('frontend.partials._footer')
        </div>

        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
 

        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="{{ asset('frontend/assets/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/submitter.js') }}"></script>


        <!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
        <script type="text/javascript">
            
            var revapi;

            jQuery(document).ready(function() {
                "use strict";
                revapi = jQuery('.tp-banner').revolution(
                        {
                            delay: 15000,
                            startwidth: 1200,
                            startheight: 278,
                            hideThumbs: 10,
                            fullWidth: "on"
                        });

            });	//ready

        </script>

        @stack('footer-scripts')

        <!-- END REVOLUTION SLIDER -->
    </body>

<!-- Mirrored from forum.azyrusthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jul 2020 04:23:20 GMT -->
</html>