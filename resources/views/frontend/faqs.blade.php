@extends('frontend.layouts.master')
@section('title', 'FAQs')
@push('custom_css')
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
                    <h1>"{{ $banner->site_name ?? 'FAQS' }}"</h1>

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

    <section class="faq-sec" data-aos="fade-up" data-aos-duration="3000">
        <div class="container">
            <div class="sec-title">
                <h3 class="sub-h">FAQS</h3>
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="row">
                <div class="accordion" id="accordionExample">


                    @foreach ($faqs as $type => $faqGroup)
                        <h4 class="mb-3 mt-5">{{ ucfirst($type) }}</h4>
                        <div class="accordion" id="accordion-{{ Str::slug($type) }}">
                            @foreach ($faqGroup as $index => $data)
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
                                        aria-labelledby="heading-{{ $data->id }}"
                                        data-bs-parent="#accordion-{{ Str::slug($type) }}">
                                        <div class="accordion-body">
                                            {{ $data->answer }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>

@endsection
