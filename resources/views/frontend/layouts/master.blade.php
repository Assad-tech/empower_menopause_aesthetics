<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMA - @yield('title')</title>

    <!-- fav-icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/assets/images/fav.png') }}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('front/assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/bootstrap/bootstrap.css') }}">

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('front/assets/style/style.css') }}">

    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('front/assets/style/responsive.css') }}">

    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('front/assets/fontawesome/css/all.min.css') }}">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Syne:wght@400..800&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Syne:wght@400..800&display=swap"
        rel="stylesheet">

    <!-- owl.carousel -->
    <link rel="stylesheet" href="{{ asset('front/assets/OwlCarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/OwlCarousel/owl.theme.default.css') }}">

    <!-- animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/assets/style/jquery.fancybox.min.css') }}">

    <!-- custom css start -->
    @stack('custom_css')

    <!-- footer css  -->
    <style>
        .footer_active {
            color: #000 !important;
        }

        .chatNow {
            padding: 3px 10px !important;
        }
    </style>
</head>

<body>

    {{-- Header here --}}
    @include('frontend.layouts.header')

    {{-- All Content --}}
    @yield('content')
    <!-- footer start -->
    @include('frontend.layouts.footer')

    <script src="{{ asset('front/assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('front/assets/bootstrap/js/dropdown.js') }}"></script>

    <!-- owlcarousel -->
    <script src="{{ asset('front/assets/OwlCarousel/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/OwlCarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/custom.js') }}"></script>

    <script src="{{ asset('front/assets/js/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/script.js') }}"></script>

    <!-- animation aos js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        })
    </script>

    <!-- custom js start -->
    @stack('custom_js')

</body>

</html>
