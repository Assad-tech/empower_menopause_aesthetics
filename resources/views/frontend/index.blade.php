@extends('frontend.layouts.master')
@section('title', 'Home')
@push('custom_css')
    <style>
        img.rounded {
            width: 70px !important;
            height: 70px !important;
            border-radius: 50% !important;
        }

         img.rounded {
            width: 70px !important;
            height: 70px !important;
            border-radius: 50% !important;
        }

        .lead {
            color: black !important;
            font-size: 1.25rem;
            font-weight: 300;
        }

        .service-name{
            color: #201f1e;
        }

        a:hover {
            color: #d1935e;
        }
    </style>
@endpush
@section('content')
    {{-- Home Banner and Intro --}}
    <section class="hero-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 banner-col-right" data-aos="fade-right" data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                    <h3>
                        {{ $content->greeting ?? 'Welcome to EMA' }}
                    </h3>
                    <h1>
                        "{{ $content->site_name ?? 'Empowering Women Through Menopause Aesthetics & Beyond' }}"
                    </h1>
                    <p>
                        {!! $content->banner_description ??
                            'Personalized hormone therapy, aesthetic treatments, and wellness solutions for a confident you.' !!}
                    </p>
                    <div class="banner-bnt">
                        <div> <a class="dark-btn" href="{{ route('book.consultation') }}">Book a Consultation</a> </div>
                        <div> <a class="light-btn" href="">Learn More</a> </div>
                    </div>
                </div>
                <div class="col-md-6 banner-col-left" data-aos="fade-up" data-aos-duration="3000">
                    <img src="{{ asset($content->banner ? 'front/assets/images/banners/' . $content->banner : 'front/assets/images/home-banner-img.png') }}"
                        alt="">

                </div>
            </div>
        </div>
    </section>
    <!-- about start -->
    <section class="about-sec">
        <div class="container about">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="3000">
                    <div class="about-imgs">
                        <img src="{{ asset($about->image ? 'front/assets/images/' . $about->image : 'front/assets/images/about-sec.webp') }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-left">
                    <div class="about-content">
                        <h3 class="sub-h">{{ $about->sub_heading ?? 'About Us' }}</h3>
                        {!! $about->description ??
                            'Personalized hormone therapy, aesthetic treatments, and wellness solutions for a confident you.' !!}
                        <button>for more details</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about end -->\

    <!-- services start -->
    <section class="services-sec">
        <div class="container">
            <div class="sec-title">
                <h3 class="sub-h">What We Do</h3>
                <h2>Services Overview</h2>
            </div>
            <div class="row">
                @foreach ($services as $service)

                <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 ">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="d-flex justify-content-between p-3">
                            <p class="lead mb-0">{{ $service->appt_location_type ?? '' }}</p>

                        </div>
                        <a href="{{ route('view.service', $service->slug) }}">

                            <img height="250"
                                src="{{ asset('front/assets/images/featured/' . ($service->image ?? 'default-image.png')) }}"
                                class="card-img-top" alt="{{ $service->name }}" />
                        </a>

                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="small"><a href="#!"
                                        class="text-muted">{{ $service->type ?? 'Uncategorized' }}</a></p>
                                <p class=" text-danger">
                                    @if($service->duration)
                                    <i style="font-size:17px" class="fa">&#xf017;</i>
                                    {{ $service->duration }}
                                    @endif
                                </p>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <a href="{{ route('view.service', $service->slug) }}">

                                    <h5 class="mb-0 service-name">{{ $service->title }}</h5>
                                </a>
                                <h5 class="text-dark mb-0">
                                    ${{ number_format($service->amount + $service->tax, 2) }}
                                </h5>
                            </div>


                        </div>
                    </div>
                </div>
                    {{-- <div class="col-md-4 services-img-1-col" data-aos="zoom-in-up">
                        <div class="services-img-1"
                            style="background-image: url('{{ asset('front/assets/images/featured/' . ($service->image ?? 'default-image.png')) }}'); background-size: cover; background-repeat: no-repeat;">

                            <div class="ser-text-box">
                                <h4>{{ $service->title ?? ' ' }}</h4>
                                <a href="{{ route('view.service', $service->slug) }}">Read More</a>
                            </div>
                        </div>
                    </div> --}}
                @endforeach
            </div>
            <div class="ser-btn"> <a class="dark-btn" href="{{ route('services') }}">Discover Our Approach</a> </div>
        </div>
    </section>

    <!-- FAQ start -->
    <section class="faq-sec" data-aos="fade-up" data-aos-duration="3000">
        <div class="container">
            <div class="sec-title">
                <h3 class="sub-h">FAQS</h3>
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="row">

                <div class="accordion" id="accordionExample">
                    @foreach ($faqs as $index => $data)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $data->id }}">
                                <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse-{{ $data->id }}"
                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse-{{ $data->id }}">
                                    {{ $data->question }}
                                </button>
                            </h2>
                            <div id="collapse-{{ $data->id }}"
                                class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                aria-labelledby="heading-{{ $data->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!!$data->answer!!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
    @php
        $consultation = getSiteContent('consultation');
    @endphp
    <!-- Book an Appointment start -->
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

    <!-- Testimonials start -->
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
