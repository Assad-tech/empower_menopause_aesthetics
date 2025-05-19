@extends('frontend.layouts.master')
@section('title', 'Book a Consultation')
@push('custom_css')
@endpush
@section('content')

    <section class="hero-sec">
        <div class="container">
            <h3 class="text-center">{{$service->title}}</h3>
        </div>
    </section>



    <section class="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">


                    <iframe src="{{$service->link}}" allow="payment"
                        style="border:0;width:100%;height:700px;"></iframe>

                </div>

            </div>
        </div>
    </section>
@endsection



@push('custom_js')
@endpush
