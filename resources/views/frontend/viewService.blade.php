@extends('frontend.layouts.master')
@section('title', 'View Service')
@push('custom_css')
    <style>
        a.dark-btn {
            padding: 9px 13px;
            background-color: #959394;
            border: solid 2px #959394;
            color: #fff;
            /* display: block; */
        }
        .align-end{
            align-items: end;
        }
    </style>
@endpush
@section('content')

    <section class="hero-sec">
        <div class="container">
            <h3 class="text-center">View: {{ $service->title ?? ' ' }}</h3>
        </div>
    </section>
    <section class="contact-sec">
        <div class="container">
            <div class="row ">
                <div class="col-md-5 text-center">
                    <img class="img-fluid" style=" height: 400px;"
                        src="{{ asset('front/assets/images/featured/' . ($service->image ?? 'default-image.png')) }}"
                        alt="{{ $service->title ?? ' ' }}">
                </div>

                <div class="col-7">
                    {{-- <h3 class="my-2" style="font-family: 'Poppins', sans-serif !important;">{{ $service->title ?? ' ' }}
                    </h3> --}}

                    <p class="lead mb-0">{{ $service->appt_location_type ?? '' }}</p>

                    <h2>{{ $service->title ?? ' ' }}</h2>


                    <h5 class=" text-danger">
                        <i style="font-size:17px" class="fa">&#xf017;</i>
                        {{ $service->duration }}
                    </h5>

                    <div style="margin-top: 20px;">
                        <p style="font-size: 16px; margin: 5px 0;"><strong>Amount:</strong> ${{$service->amount}}</p>
                        <p style="font-size: 16px; margin: 5px 0;"><strong>Tax (Amount):</strong> ${{$service->tax}}</p>
                        <p style="font-size: 20px; margin: 10px 0; "><strong>Total:</strong> ${{ number_format($service->amount + $service->tax, 2) }}</p>
                      </div>

                    <div class="row">
                        <div class="col-5">
                            <a class="dark-btn w-100 text-center  " href="{{ $service->booking_location }}">Book Clinic</a>

                        </div>
                        <div class="col-5">

                            <a class="dark-btn w-100 text-center" href="{{ $service->booking_practitioner }}">Book Practitioner</a>
                        </div>


                    </div>
                    {{-- <div class="col-6 "> --}}
                    {{-- </div>
                    <div class="col-6"> --}}
                    {{-- </div> --}}



                </div>
                <div class="col-md-12 text-center mt-5">
                    {!! $service->description ?? ' ' !!}
                </div>

            </div>
        </div>
    </section>

@endsection

@push('custom_js')
@endpush
