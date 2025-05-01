<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Sign In | User</title>
    <!-- Favicons -->
    {{-- <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png"> --}}
    <link rel="shortcut icon" href="{{ asset('front/assets/images/fav.png') }}">
    <meta name="theme-color" content="#3063A0"><!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End Google font -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css') }}">
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
    {{-- @dd('sdf') --}}
    <main class="auth">
        @php
            $logo = getSiteContent('footer_logo');
            // dd($logo->logo);
        @endphp
        <header id="auth-header" class="auth-header" style="background-color: #C6B19F;">
            <h1>
                <a href="{{ route('home') }}">
                    @if ($logo)
                        <img src="{{ asset('front/assets/images/' . $logo->footer_logo) }}" alt="">
                    @else
                        <img src="{{ asset('front/assets/images/footer-logo.webp') }}" alt="">
                    @endif
                </a>
                <p class="sr-only">Sign In</p>
            </h1>
        </header><!-- form -->
        <form action="{{ route('user.login.submit') }}" method="POST" class="auth-form mt-3">
            <p class="text-center">Sign in to your account</p>
            @csrf
            <!-- .form-group -->
            <div class="form-group">
                <div class="form-label-group">
                    <input type="email" id="inputUser" name="email" class="form-control" placeholder="Username"
                        autofocus=""> <label for="inputUser">Email</label>
                </div>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group">
                <div class="form-label-group">
                    <input type="password" name="password" id="inputPassword" class="form-control"
                        placeholder="Password"> <label for="inputPassword">Password</label>
                </div>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            {{-- <div class="form-group text-center">
                <div class="custom-control custom-control-inline custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember-me"> <label
                        class="custom-control-label" for="remember-me">Keep me sign in</label>
                </div>
            </div><!-- /.form-group --> --}}
            <!-- recovery links -->
            <div class="text-center pt-3">
                <p>
                    Don't have a account? <a href="{{ route('user.register') }}" class="text-primary">Create One</a>
                </p>
                {{-- <a href="auth-recovery-username.html" class="link">Forgot Username?</a> <span class="mx-2">·</span> --}}
                <a href="#" class="link">Forgot Password?</a>
            </div><!-- /recovery links -->
        </form><!-- /.auth-form -->
        <!-- copyright -->
        <footer class="auth-footer"> &copy; {{ date('Y') }} All Rights Reserved.
        </footer>
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
            particlesJS.load('auth-header', 'assets/javascript/pages/particles.json');
        })
    </script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="{{ asset('admin/assets/javascript/theme.js') }}"></script> <!-- END THEME JS -->
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
