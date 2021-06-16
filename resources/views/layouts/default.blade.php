<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home One || Tripo || Travel & Tourism Agencies HTML Template</title>
    <link rel="apple-touch-icon" sizes="180x180" href="'assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="'assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="'assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="'assets/images/favicons/site.webmanifest">

    <!-- plugin scripts -->


    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:200,300,400,400i,500,600,700,800,900%7CSatisfy&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tripo-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vegas.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.pips.css') }}">

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>
    <div class="preloader">
        <img src="'assets/images/loader.png" class="preloader__image" alt="">
    </div><!-- /.preloader -->
    <div class="page-wrapper">
        <div class="site-header__header-one-wrap">
            <div class="topbar-one">
                <div class="container-fluid">
                    <div class="topbar-one__left">
                        <a href="mailto:needhelp@tripo.com">needhelp@tripo.com</a>
                        <a href="tel:666-999-0000">666 999 0000</a>
                        <a href="#">77 broklyn street new york</a>
                    </div><!-- /.topbar-one__left -->
                    <div class="topbar-one__right">
                        <div class="topbar-one__social">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a>
                        </div><!-- /.topbar-one__social -->
                        <a href="contact.html" class="topbar-one__guide-btn">Become a local guide</a>
                    </div><!-- /.topbar-one__right -->
                </div><!-- /.container-fluid -->
            </div><!-- /.topbar-one -->
           
            @include('layouts.header')
        </div><!-- /.site-header__header-one-wrap -->

        @yield('main_content')
       

      @include('layouts.footer')


    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/typed-2.0.11.js') }}"></script>
    <script src="{{ asset('assets/js/vegas.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>

    <!-- template scripts -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
</body>

</html>