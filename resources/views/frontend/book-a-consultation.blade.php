@extends('frontend.layouts.master')
@section('title', 'Book a Consultation')
@push('custom_css')
@endpush
@section('content')

    <section class="hero-sec">
        <div class="container">
            <h3 class="text-center">Book Appointment</h3>
        </div>
    </section>



    <section class="contact-sec">
        <div class="container">

            <div class="row text-center">
                <div class="col-6 ">
                    <div class="shadow-lg p-3 mb-5 bg-white rounded">

                        <h4>Melissa Howcroft (Practitioner)</h4>

                        <a target="_blank" href="https://www.halaxy.com/profile/ms-melissa-howcroft/nurse/1709895"><img src="https://cdn.halaxy.com/h/images/logo.png" /></a>
                        <br>
                        <a class="dark-btn  text-center d-inline-block mt-2 w-50" href="{{route('book.consultation.view','practitioner')}}">Book Now </a>

                    </div>
                </div>
                <div class="col-6 ">
                    <div class="shadow-lg p-3 mb-5 bg-white rounded">

                        <h4>Empower Menopause & Aesthetics (Clinic)</h4>

                        <a target="_blank" href="https://www.halaxy.com/profile/empower-menopause-aesthetics/location/1311467"><img src="https://cdn.halaxy.com/h/images/logo.png" /></a>
                        <br>
                        <a class="dark-btn  text-center d-inline-block mt-2 w-50" href="{{route('book.consultation.view','clinic')}}">Book Now </a>

                    </div>
                </div>
            </div>


            {{-- <div class="row">
                <div class="col-md-12">
                    <iframe src="https://www.halaxy.com/book/widget/nurse/ms-melissa-howcroft/1709895/1311467" allow="payment"
                        style="border:0;width:100%;height:700px;"></iframe>

                </div>

            </div> --}}
        </div>
    </section>
@endsection



@push('custom_js')
@endpush
