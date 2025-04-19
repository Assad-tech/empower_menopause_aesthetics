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
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://www.halaxy.com/book/widget/nurse/ms-melissa-howcroft/1709895/1311467" allow="payment"
                        style="border:0;width:100%;height:700px;"></iframe>

                </div>

            </div>
        </div>
    </section>
@endsection



@push('custom_js')
@endpush