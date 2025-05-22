@extends('frontend.layouts.master')
@section('title', 'Products')
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
                    <h1>"{{ $banner->site_name ?? 'Products' }}"</h1>

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

    <section>
        <div class="container py-5">
            <h1 class="text-center">Our Products</h1>
            <div class="row">
                {{-- Product --}}
                @foreach ($products as $data)
                    @php
                        // Calculate discounted price
                        $discountedPrice = $data->price - ($data->price * $data->discount_percentage) / 100;
                        $rating = (int) $data->rating;
                    @endphp

                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="card">
                            <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0">{{ $data->offer_text ?? 'Special Offer' }}</p>
                                <div class="offer-number rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                    style="width: 35px; height: 35px;">
                                    <p class="text-white mb-0 small">{{ $data->discount_percentage }}%</p>
                                </div>
                            </div>

                            <img src="{{ asset('front/assets/images/products/' . $data->image) }}" class="card-img-top"
                                alt="{{ $data->name }}" />

                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="small"><a href="#!"
                                            class="text-muted">{{ $data->category->name ?? 'Uncategorized' }}</a></p>
                                    <p class="small text-danger">
                                        <s>${{ number_format($data->price, 2) }}</s>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{ $data->name }}</h5>
                                    <h5 class="text-dark mb-0">${{ number_format($discountedPrice, 2) }}</h5>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <p class="text-muted mb-0">Available: <span class="fw-bold">{{ $data->stock }}</span>
                                    </p>
                                    <div class="ms-auto text-warning">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star text-secondary"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @php
        $consultation = getSiteContent('consultation');
    @endphp
    <section class="cta-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <h2>{{ $consultation->consultation ?? ' Appointment Consultation' }}</h2>
<p>It is not too late to make the changes you desire.The past does not determine your future.</p>
                </div>
                <div class="col-md-6 cta-r-col" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
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
