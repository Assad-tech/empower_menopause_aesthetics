@php
    $logo = getSiteContent('logo');
    $phone = getSiteContent('phone');
    $email = getSiteContent('email');
    $fb = getSocialLinks('facebook');
    $insta = getSocialLinks('instagram');
    $linkedin = getSocialLinks('linkedin');
    // dd($consultation);
@endphp
<header>
    <div class="container emp-header-top">
        <div class="row emp-header-top-row">
            <div class="col-md-4 logo-col">
                <a href="{{ route('home') }}">
                    @if ($logo)
                        <img src="{{ asset('front/assets/images/' . $logo->logo) }}" alt="">
                    @else
                        <img src="{{ asset('front/assets/images/logo.png') }}" alt="">
                    @endif
                </a>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 h-icon-col">
                        <div class="h-icon">
                            <span><i class="fa-solid fa-phone-volume"></i></span>
                        </div>
                        <div class="h-icon-d">
                            <p class="h-icon-title">Call Us On</p>
                            @if ($phone)
                                <p class="text-light">
                                    <a href="tel:{{ str_replace(' ', '', $phone->phone) }}">{{ $phone->phone }}</a>

                                </p>
                            @else
                                <p class="text-light"> <a href="tel:0466824777">0466 824 777</a> </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 ml-1 h-icon-col">
                        <div class="h-icon">
                            <span><i class="fa-solid fa-envelope"></i></span>
                        </div>
                        <div class="h-icon-d">
                            <p class="h-icon-title">Email</p>
                            <p class="text-light">
                                @if ($email)
                                    <a href="mailto:{{ $email->email }}">{{ $email->email }}</a>
                                @else
                                    <a href="mailto:info@empowermenopause.com.au">info@empowermenopause.com.au</a>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 contact-btn text-end">
                        <a class="chatNow dark-btn btn-sm rounded-0" href="#">
                            <i class="fa fa-comment" aria-hidden="true"></i> Chat Now</a>
                        @auth
                            <a class="chatNow rounded-0 dark-btn btn-sm m-2" href="{{ route('view.cart') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Cart
                            </a>
                            {{-- <a class="chatNow rounded-0 dark-btn btn-sm" href="{{ route('user.logout') }}">Logout</a> --}}
                            <div class="dropdown">
                                <button class="chatNow rounded-0 dark-btn btn-sm m-2 dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item rounded-0"
                                        href="{{ route('user.profile') }}">
                                        <i class="fa fa-user" aria-hidden="true"></i> Profile
                                    </a>
                                    <a class="dropdown-item rounded-0" href="{{ route('user.orders') }}">
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i> My Orders
                                    </a>
                                    <a class="dropdown-item rounded-0" href="{{ route('user.logout') }}">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                </div>
                            </div>
                        @else
                            <!-- Button to Open Modal -->
                            <button class="dark-btn rounded-0 chatNow btn-sm mx-1 border-0" data-bs-toggle="modal"
                                data-bs-target="#loginModal">
                                Login
                            </button>
                            {{-- <a class="dark-btn rounded-0 chatNow btn-sm mx-1" href="{{ route('user.login') }}">Login</a> --}}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid emp-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <nav class="navbar navbar-expand-xl navbar-light">
                        <div class="">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }}"
                                            href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('about.us') ? 'active' : '' }}"
                                            href="{{ route('about.us') }}">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is(['services', 'view.service']) ? 'active' : '' }}"
                                            href="{{ route('services') }}">Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('products') ? 'active' : '' }}"
                                            href="{{ route('products') }}">Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('faqs') ? 'active' : '' }}"
                                            href="{{ route('faqs') }}">FAQs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('contact.us') ? 'active' : '' }}"
                                            href="{{ route('contact.us') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 search-col">
                    <div class="search-container">
                        <form class="banner-search" action="{{ route('products') }}" method="GET">
                            @csrf
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <input type="text" placeholder="Search something here!" name="search"
                                value="{{ request('search') }}">
                        </form>
                    </div>

                </div>
                <div class="col-md-1 emp-social">
                    @if ($insta)
                        <a href="{{ $insta->instagram }}">
                            <div>
                                <span><i class="fa-brands fa-square-instagram"></i></span>
                            </div>
                        </a>
                    @else
                        <a
                            href="https://www.instagram.com/accounts/login/?next=%2Fmelissahowcroft1%2F&source=omni_redirect">
                            <div><span><i class="fa-brands fa-square-instagram"></i></span></div>
                        </a>
                    @endif
                    @if ($fb)
                        <a href="{{ $fb->facebook }}">
                            <div><span><i class="fa-brands fa-facebook-f"></i></span> </div>
                        </a>
                    @else
                        <a href="https://www.facebook.com/profile.php?id=61575039335593">
                            <div><span><i class="fa-brands fa-facebook-f"></i></span> </div>
                        </a>
                    @endif
                    @if ($linkedin)
                        <a href="{{ $linkedin->linkedin }}">
                            <div><span><i class="fa-brands fa-linkedin"></i></span> </div>
                        </a>
                    @else
                        <a
                            href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQEwjzG5ponOQwAAAZY2FgFwbWjDk8D17dgjtfANjw9lawtWztVfeCmc3zwWzk-88OOUg0z9or8ahNOCDVjiT-5bnr2iyh6JuOInP-qSI7Uk1F4_ndBDB-wwtx5wgsI0QJkGCKg=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2F106848055%2Fadmin%2Fdashboard%2F">
                            <div><span><i class="fa-brands fa-linkedin"></i></span> </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
</header>
<!-- Login Modal -->
<div class="modal fade " id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0 " style="background-color: #C6B19F;">
                {{-- <h5 class="modal-title" id="loginModalLabel">Login</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 bg-light">
                <div class="row text-center">
                    <a href="{{ route('home') }}">
                        @if ($logo)
                            <img class="img-fluid w-75" src="{{ asset('front/assets/images/' . $logo->logo) }}"
                                alt="logo">
                        @else
                            <img src="{{ asset('front/assets/images/logo.png') }}" alt="logo">
                        @endif
                    </a>
                </div>
                <div id="loginErrors" class="text-danger small mb-2"></div>

                <!-- Include your login form here -->
                <form id="loginForm" action="{{ route('user.login.submit') }}" method="POST"
                    class="auth-form mt-2">
                    <p class="text-center mb-3">Sign in to your account</p>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 my-2">
                            <!-- .form-group -->
                            <div class="form-group">
                                <label for="inputUser">Email</label>
                                <input type="email" id="inputUser" name="email" class="form-control"
                                    placeholder="Email">
                                <span class="text-danger error-email"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                    placeholder="Password">
                                <span class="text-danger error-password"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <!-- .form-group -->
                            <button class="w-100 btn btn-primary" type="submit">Sign In</button>
                            {{-- <div class="form-group">
                            </div><!-- /.form-group --> --}}
                        </div>

                    </div>
                    <!-- recovery links -->
                    <div class="text-center pt-3">
                        {{-- <p>
                            Don't have a account? <a href="{{ route('user.register') }}" class="text-primary">Create
                                One</a>
                        </p> --}}
                        <p class="text-muted">
                            Don't have an account?
                            <a href="javascript:void(0);" class="text-primary" id="openRegisterModal">
                                Create One
                            </a>
                        </p>
                        <a href="#" class="link">Forgot Password?</a>
                    </div><!-- /recovery links -->
                </form><!-- /.auth-form -->
            </div>
            <!-- copyright -->
            {{-- <footer class="p-3 text-center text-white"> 
                &copy; {{ date('Y') }} All Rights Reserved.
            </footer> --}}
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header rounded-0" style="background-color: #C6B19F;">
                {{-- <h5 class="modal-title" id="registerModalLabel">Create an Account</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 bg-light">
                <div class="row text-center">
                    <a href="{{ route('home') }}">
                        @if ($logo)
                            <img class="img-fluid w-75" src="{{ asset('front/assets/images/' . $logo->logo) }}"
                                alt="logo">
                        @else
                            <img src="{{ asset('front/assets/images/logo.png') }}" alt="logo">
                        @endif
                    </a>
                </div>
                <div id="registerErrors" class="text-danger small mb-2"></div>

                <!-- Registration Form -->
                <form id="registerForm" method="POST" class="auth-form">
                    @csrf
                    <p class="text-center">Sign up new account</p>
                    <div class="row">
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Name">
                                <span class="text-danger error-name"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" id="inputEmail" class="form-control"
                                    placeholder="Email">
                                <span class="text-danger error-email"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                    placeholder="Password">
                                <span class="text-danger error-password"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Confirm Password">
                                <span class="text-danger error-password_confirmation"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <button class="w-100 btn btn-primary" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- recovery links -->
                <p class="text-center text-muted"> Already have an account? please
                    {{-- <a href="{{ route('user.login') }}">
                        Sign In
                    </a> --}}
                    <a href="javascript:void(0);" id="openLoginModal">
                        Sign In
                    </a>
                </p>

            </div>
        </div>
    </div>
</div>


<script>
    // Open Register Modal from Login Modal
    document.getElementById('openRegisterModal').addEventListener('click', function() {
        const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
        if (loginModal) loginModal.hide();

        const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
        registerModal.show();
    });

    // Open Login Modal from Register Modal
    document.getElementById('openLoginModal').addEventListener('click', function() {
        const registerModal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
        if (registerModal) registerModal.hide();

        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    });


    document.addEventListener("DOMContentLoaded", function() {
        // LOGIN AJAX
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Clear previous errors
            loginForm.querySelector('.error-email').textContent = '';
            loginForm.querySelector('.error-password').textContent = '';

            const formData = new FormData(loginForm);

            fetch("{{ route('user.login.submit') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => {
                    if (response.status === 422) {
                        return response.json().then(data => {
                            const errors = data.errors;
                            if (errors.email) {
                                loginForm.querySelector('.error-email').textContent = errors
                                    .email[0];
                            }
                            if (errors.password) {
                                loginForm.querySelector('.error-password').textContent =
                                    errors.password[0];
                            }
                        });
                    } else if (response.status === 401) {
                        return response.json().then(data => {
                            loginForm.querySelector('.error-email').textContent = data
                                .error;
                        });
                    } else if (response.ok) {
                        return response.json().then(data => {
                            if (data.success && data.redirect) {
                                window.location.href = data.redirect;
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Request failed', error);
                });
        });

        // REGISTER AJAX
        const registerForm = document.getElementById('registerForm');

        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Clear all previous errors
            ['name', 'email', 'password', 'password_confirmation'].forEach(function(field) {
                const errorSpan = registerForm.querySelector('.error-' + field);
                if (errorSpan) errorSpan.textContent = '';
            });

            const formData = new FormData(registerForm);

            fetch("{{ route('user.register.submit') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => {
                    if (response.status === 422) {
                        return response.json().then(data => {
                            const errors = data.errors;
                            for (let key in errors) {
                                const errorElement = registerForm.querySelector('.error-' +
                                    key);
                                if (errorElement) {
                                    errorElement.textContent = errors[key][0];
                                }
                            }
                        });
                    } else if (response.ok) {
                        return response.json().then(data => {
                            if (data.success && data.redirect) {
                                window.location.href = data.redirect;
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Register request failed:', error);
                });
        });
    });
</script>
