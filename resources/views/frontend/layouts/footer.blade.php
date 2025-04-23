@php
    $footer_logo = getSiteContent('footer_logo');
    $phone = getSiteContent('phone');
    $email = getSiteContent('email');
    $copyright = getSiteContent('copyright');
    $desc = getSiteContent('footer_text');
    // dd($desc);
@endphp

<footer class="footer-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @if ($footer_logo)
                    <img src="{{ asset('front/assets/images/' . $footer_logo->footer_logo) }}" alt="">
                @else
                    <img src="{{ asset('front/assets/images/footer-logo.webp') }}" alt="">
                @endif
                <p class="text-white mt-3">
                    {!! $desc->footer_text ??
                        'Personalized hormone therapy, aesthetic treatments, and wellness solutions for a confident you.' !!}
                </p>
            </div>
            <div class="col-md-3">
                <div class="footer-list left-padding">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul>
                        <li>
                            <a class="nav-link {{ Route::is('home') ? 'footer_active' : '' }}"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::is('about.us') ? 'footer_active' : '' }}"
                                href="{{ route('about.us') }}">About</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::is('services') ? 'footer_active' : '' }}"
                                href="{{ route('services') }}">Services</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::is('products') ? 'footer_active' : '' }}"
                                href="{{ route('products') }}">Products</a>
                        </li>
                        <li>
                            <a class="nav-link {{ Route::is('contact.us') ? 'footer_active' : '' }}"
                                href="{{ route('contact.us') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="footer-list">
                    <h4 class="footer-heading">Contact Us</h4>
                    <ul class="icon-flex">
                        <li>
                            <i class="fa-solid fa-phone-volume"></i>
                        </li>
                        <li>
                            <p>Call Us On</p>
                            @if ($phone)
                                <a href="tel:{{ str_replace(' ', '', $phone->phone) }}">{{ $phone->phone }}</a>
                            @else
                                <a href="#">0466 824 777</a>
                            @endif
                        </li>
                    </ul>
                    <ul class="icon-flex">
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                        </li>
                        <li>
                            <p>Email</p>
                            @if ($email)
                                <a href="mailto:{{ $email->email }}">{{ $email->email }}</a>
                            @else
                                <a href="mailto:info@empowermenopause.com.au">info@empowermenopause.com.au</a>
                            @endif
                        </li>
                    </ul>
                    <form action="{{ route('emails.store') }}" class="newsletter" method="post">
                        @csrf
                        <input type="email" name="email" placeholder="Enter your email">
                        <button type="submit">Send</button>
                    </form>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 copyright">
                <p class="text-white text-center">Copyright &copy; {{ date('Y') }}.
                    {{ $copyright->copyright ?? ' ' }}</p>
            </div>
        </div>
    </div>
</footer>
