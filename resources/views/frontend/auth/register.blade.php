<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Sign Up | New User </title>

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
    <!-- .auth -->
    <main class="auth">
        @php
            $logo = getSiteContent('footer_logo');
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
                <p class="sr-only">Sign Up</p>
            </h1>
        </header><!-- form -->
        <form action="{{ route('user.register.submit') }}" method="POST" class="auth-form">
            @csrf
            <p class="text-center">Sign up new account</p>
            <!-- .form-group -->
            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name"
                        autofocus="">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group">
                <div class="form-label-group">
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email"
                        autofocus=""> <label for="inputEmail">Email</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group">
                <div class="form-label-group">
                    <input type="password" name="password" id="inputPassword" class="form-control"
                        placeholder="Password">
                    <label for="inputPassword">Password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group">
                <div class="form-label-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        placeholder="Confirm Password">
                    <label for="password_confirmation">Confirm Password</label>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            {{-- <div class="form-group text-center">
                <div class="custom-control custom-control-inline custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="newsletter"> <label
                        class="custom-control-label" for="newsletter">Sign me up for the newsletter</label>
                </div>
            </div><!-- /.form-group --> --}}
            <!-- recovery links -->
            <p class="text-center text-muted"> Already have an account? please <a href="{{ route('user.login') }}">Sign
                    In</a>
            </p>
            {{-- <p class="text-center text-muted mb-0"> By creating an account you agree to the <a href="#">Terms of
                    Use</a>
                and <a href="#">Privacy Policy</a>. </p><!-- /recovery links --> --}}
        </form><!-- /.auth-form -->
        <!-- copyright -->
        <footer class="auth-footer"> &copy; {{ date('Y') }} All Rights Reserved. </footer>
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
