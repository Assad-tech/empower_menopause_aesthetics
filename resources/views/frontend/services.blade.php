@extends('frontend.layouts.master')
@section('title', 'Services')
@push('custom_css')
    <style>
        img.rounded {
            width: 70px !important;
            height: 70px !important;
            border-radius: 50% !important;
        }

        a {
            color: #c6b19f;
        }

        a:hover {
            color: #d1935e;
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
                    <h1>"{{ $banner->site_name ?? 'Services' }}"</h1>

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

    <section class="">
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
                                        <i style="font-size:17px" class="fa">&#xf017;</i>
                                        {{ $service->duration }}
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <a href="{{ route('view.service', $service->slug) }}">

                                        <h5 class="mb-0">{{ $service->title }}</h5>
                                    </a>
                                    <h5 class="text-dark mb-0">
                                        ${{ number_format($service->amount + $service->tax, 2) }}
                                    </h5>
                                </div>


                            </div>
                        </div>
                    </div>



                    {{-- <div class="col-md-4 services-img-1-col mt-3" data-aos="zoom-in-up">
                        <div class="services-img-1 w-100 "
                            style="background-image: url('{{ asset('front/assets/images/featured/' . ($service->image ?? 'default-image.png')) }}'); background-size: cover; background-repeat: no-repeat;">

                            <div class="ser-text-box">
                                <h4>{{ $service->title ?? ' ' }}</h4>
                                <a href="{{ route('view.service', $service->slug) }}">Read More</a>
                            </div>
                        </div>
                    </div> --}}
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

@push('custom_js')
@endpush
