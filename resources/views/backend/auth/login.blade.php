<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Sign In | EMA Admin </title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png">
    {{-- <link rel="shortcut icon" href="front/assets/images/fav.png"> --}}
    <link rel="shortcut icon" href="{{ asset('front/assets/images/fav.png') }}">

    <meta name="theme-color" content="#3063A0"><!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End Google font -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/theme.min.css') }}" data-skin="default">
    <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/theme-dark.min.css') }}" data-skin="dark">
    <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/custom.css') }}">
    <script>
        var skin = localStorage.getItem('skin') || 'default';
        var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
        // Disable unused skin immediately
        disabledSkinStylesheet.setAttribute('rel', '');
        disabledSkinStylesheet.setAttribute('disabled', true);
        // add loading class to html immediately
        document.querySelector('html').classList.add('loading');
    </script><!-- END THEME STYLES -->
</head>

<body>
    <!-- .auth -->
    <main class="auth auth-floated">

        @php
            $logo = getSiteContent('logo');
            // echo $logo;
        @endphp
        <!-- form -->
        <form action="{{ route('admin.login.submit') }}" method="POST" class="auth-form">
            @csrf
            <div class="mb-4">
                <div class="mb-3">
                    <img class="rounded"
                        src="{{ asset('front/assets/img/' . $logo->logo ?? 'admin/assets/apple-touch-icon.png') }}"
                        alt="" height="72">
                </div>
                <h1 class="h3">Admin Login </h1>
                @if (session('error'))
                    <span class="text-danger">{{ session('error') }}</span>
                @endif
            </div>
            </p><!-- .form-group -->
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputUser">Email</label>
                <input type="email" id="inputUser" name="email" class="form-control form-control-lg" required=""
                    autofocus="">
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputPassword">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control form-control-lg"
                    required="">
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group mb-4">
                <button style="background-color: #C6B19F; color: #fff;" class="btn btn-lg btn-block" type="submit">Sign
                    In</button>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <!-- copyright -->
            <p class="mb-0 px-3 text-muted text-center"> &copy; {{ date('Y') }} All Rights Reserved. <a
                    href="#">Privacy</a> and <a href="#">Terms</a>
            </p>
        </form><!-- /.auth-form -->
        @php
            $logo = getSiteContent('footer_logo');
        @endphp
        {{-- @dd($logo->footer_logo); --}}
        <!-- .auth-announcement -->
        <div id="announcement" class="auth-announcement d-flex align-items-center" style="background-color: #C6B19F;">
            <div class="announcement-body m-auto">
                {{-- <h2 class="announcement-title"> How to Prepare for an Automated Future </h2>
                <a href="#" class="btn btn-warning">
                    <i class="fa fa-fw fa-angle-right"></i>
                    Check Out Now
                </a> --}}
                <img width="300" src="{{ asset('front/assets/images/' . $logo->footer_logo) }}" alt="">
            </div>
        </div><!-- /.auth-announcement -->
    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
    <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="{{ asset('admin/assets/vendor/particles.js/particles.js') }}"></script>
    <script>
        /**
         * Keep in mind that your scripts may not always be executed after the theme is completely ready,
         * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
         */
        $(document).on('theme:init', () => {
            /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
            particlesJS.load('announcement', 'assets/javascript/pages/particles.json');
        })
    </script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="{{ asset('admin') }}/assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-116692175-1');
    </script>
</body>

</html>
