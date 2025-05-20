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
            <div class="col-md-5 logo-col">
                <a href="{{ route('home') }}">
                    @if ($logo)
                        <img src="{{ asset('front/assets/images/' . $logo->logo) }}" alt="">
                    @else
                        <img src="{{ asset('front/assets/images/logo.png') }}" alt="">
                    @endif
                </a>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-4 h-icon-col">
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
                    <div class="col-md-5 h-icon-col">
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
                    <div class="col-md-3 contact-btn">
                        <a class="dark-btn" href="#">Chat Now</a>
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
                                        <a class="nav-link {{ Route::is(['services','view.service']) ? 'active' : '' }}"
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
