@extends('frontend.layouts.master')
@section('title', 'About Us')
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
                    <h1>
                        "{{ $banner->site_name ?? 'About' }}"
                    </h1>

                    <p>
                        {!! $banner->banner_description ??
                            'Personalized hormone therapy, aesthetic treatments, and wellness solutions for a confident you.' !!}
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

    <!-- about start -->
    <section class=" about-sec">
        <div class="container about">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-left">
                    <div class="about-content">
                        <h3 class="sub-h">{{$about->heading??"About Us"}}</h3>
                        {!! $about->description ??
                            'Personalized hormone therapy, aesthetic treatments, and wellness solutions for a confident you.' !!}
                        <button>for more details</button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="3000">
                    <div class="about-imgs">
                        <img src="{{ asset($about->image ? 'front/assets/images/' . $about->image : 'front/assets/images/about-sec.webp') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-sec company-director">
        <div class="container about">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="3000">
                    <div class="about-imgs">
                        <img class="melissa-img"
                            src="{{ asset($aboutMe->image ? 'front/assets/images/' . $aboutMe->image : 'front/assets/images/Melissa-image.webp') }}"
                            alt="melissa-img">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-right">
                    <div class="about-content">
                        <h3 class="sub-h">{{$aboutMe->heading??"About Me"}}</h3>
                        {!! $aboutMe->description ??
                            'Personalized hormone therapy, aesthetic treatments, and wellness solutions for a confident you.' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about end -->
    @php
        $consultation = getSiteContent('consultation');
    @endphp
    <section class="cta-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <h2>{{ $consultation->consultation ?? 'Appointment Consultation' }}</h2>
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

    <!-- testimonial | Client reviews start -->
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


@push('custom_js')
@endpush
