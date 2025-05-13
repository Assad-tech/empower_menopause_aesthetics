@extends('frontend.layouts.master')
@section('title', 'View Service')
@push('custom_css')
@endpush
@section('content')

    <section class="hero-sec">
        <div class="container">
            <h3 class="text-center">View: {{ $service->title ?? ' ' }}</h3>
        </div>
    </section>
    <section class="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img class="img-fluid" style="width:80%; height: 400px;" src="{{ asset('front/assets/images/featured/' . ($service->image ?? 'default-image.png')) }}" alt="{{ $service->title ?? ' ' }}">
                    <h3 class="my-2" style="font-family: 'Poppins', sans-serif !important;">{{$service->title ?? ' '}}</h3>
                </div>
                <div class="col-md-12 text-center">
                    {!! $service->description ?? ' ' !!}
                </div>
                <div class="col-6 ">
                    <a class="dark-btn w-50 text-center float-end" href="{{$service->booking_location}}">Book now (Clinic) </a>
                </div>
                <div class="col-6">
                    <a class="dark-btn w-50 text-center" href="{{$service->booking_practitioner}}">Book now (Practitioner) </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('custom_js')
@endpush
