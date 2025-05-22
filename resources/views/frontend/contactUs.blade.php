@extends('frontend.layouts.master')
@section('title', 'Contact Us')
@push('custom_css')
    <style>
        img.rounded {
            width: 70px !important;
            height: 70px !important;
            border-radius: 50% !important;
        }
    </style>
@endpush

@section('content')

    <section class="hero-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 banner-col-right" data-aos="fade-right" data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                    <h3>
                        {{ $banner->greeting ?? 'Welcome to EMA' }}
                    </h3>
                    <h1>"{{ $banner->site_name ?? 'Contact Us' }}"</h1>

                    <p>
                        {!! $banner->banner_description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' !!}
                    </p>
                    <div class="banner-bnt">
                        <div> <a class="dark-btn" href="{{ route('book.consultation') }}">Book a Consultation</a> </div>
                        <div> <a class="light-btn" href="">Learn More</a> </div>
                    </div>

                </div>
                <div class="col-md-6 banner-col-left" data-aos="fade-up" data-aos-duration="3000">
                    <img src="{{ asset($banner->banner ? 'front/assets/images/banners/' . $banner->banner : 'front/assets/images/home-banner-img.png') }}"
                        alt="">
                </div>
            </div>
        </div>
    </section>
    @php
        $phone = getSiteContent('phone');
        $email = getSiteContent('email');
        $address = getSiteContent('address');
    @endphp
    <section class="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-innner-form-heading">
                        <h3 class="sub-h">Contact Details</h3>
                        <h2>Let's Connect With US</h2>
                        <ul>
                            <li>
                                <i class="fas fa-phone-alt" aria-hidden="true"></i>
                                <a
                                    href="tel:{{ str_replace(' ', '', $phone->phone ?? '0466 824 777') }}">{{ $phone->phone ?? '0466 824 777' }}</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <a
                                    href="mailto:{{ $email->email ?? 'info@empowermenopause.com.au' }}">{{ $email->email ?? 'info@empowermenopause.com.au' }}</a>

                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                <a href="#!">
                                    {{ $address->address ?? 'Dummy address, Beach road, 33441, abc.' }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-sec">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf

                            <input type="text" name="customer_name" placeholder="Name Here"
                                value="{{ old('customer_name') }}" required>
                            @error('customer_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <input type="email" name="email" placeholder="Email Here" value="{{ old('email') }}"
                                required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <input type="number" name="phone_number" placeholder="Number Here"
                                value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <textarea name="message" placeholder="Message">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit">Submit Now</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
        $consultation = getSiteContent('consultation');
    @endphp

    <section class="cta-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-7" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <h2>{{ $consultation->consultation ?? ' Appointment Consultation' }}</h2>
<p>It is not too late to make the changes you desire.The past does not determine your future.</p>
                </div>
                <div class="col-md-5 cta-r-col" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <div class="banner-bnt">
                        <div> <a class="dark-btn" href="{{ route('services') }}">See Our Service</a> </div>
                        <div> <a class="light-btn" href="{{ route('book.consultation') }}">Book a Consultation</a> </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="client" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
        data-aos-duration="500">
        <div class="container">
            <div class="sec-title">
                <h3 class="sub-h">Testimonials</h3>
                <h2>What Our Clients Says</h2>
            </div>

            <div class="owl-carousel owl-theme">
                @foreach ($testimonials as $data)
                    <div class="item">
                        <div class="tes-box">
                            <p class="client-date">{{ \Carbon\Carbon::parse($data->post_date)->format('jS M Y') }}</p>
                            <p>
                                "{{ $data->feedback }}"
                            </p>
                            <div class="row client-ratio">
                                <div class="col-6">
                                    <div>
                                        @for ($i = 0; $i < $data->rating; $i++)
                                            <i class="fa-solid fa-star" style="color: #f1c40f"></i>
                                        @endfor
                                        @for ($i = $data->rating; $i < 5; $i++)
                                            <i class="fa-regular fa-star" style="color: #ccc"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="col-6 client-comma">
                                    <div>
                                        <img src="{{ asset('front/assets/images/ccomma.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="person-details">
                                <div class="client-pic">
                                    <img class="rounded"
                                        src="{{ asset('front/assets/images/testimonials/' . $data->image) }}"
                                        alt="{{ $data->name }}">
                                </div>
                                <div class="client-col">
                                    <p class="client-name">– {{ $data->name }}</p>
                                    <p>{{ ucfirst($data->type) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        </div>
    </section>

@endsection
