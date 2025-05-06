@extends('frontend.layouts.master')
@section('title', 'Cart Checkout')
@push('custom_css')
    <link rel="stylesheet" href="{{ asset('front/assets/style/jquery.fancybox.min.css') }}">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        .buyNowBtn {
            border: solid 2px #D0BEAD !important;
            color: #D0BEAD !important;
        }

        .buyNowBtn:hover {
            background-color: #D0BEAD !important;
            color: #fff !important;
        }

        .shop {
            font-size: 10px;
        }

        .space {
            letter-spacing: 0.8px !important;
        }

        .second a:hover {
            color: rgb(92, 92, 92);
        }

        .active-2 {
            color: rgb(92, 92, 92)
        }


        .breadcrumb>li+li:before {
            content: "" !important
        }

        .breadcrumb {
            padding: 0px;
            font-size: 10px;
            color: #aaa !important;
        }

        .first {
            background-color: white;
        }

        a {
            text-decoration: none !important;
            color: #aaa;
        }

        .btn-lg,
        .form-control-sm:focus,
        .form-control-sm:active,
        a:focus,
        a:active {
            outline: none !important;
            box-shadow: none !important
        }

        .form-control-sm:focus {
            border: 1.5px solid #4bb8a9;
        }

        .btn-group-lg>.btn,
        .btn-lg {
            padding: .5rem 0.1rem;
            font-size: 1rem;
            border-radius: 0;
            color: white !important;
            background-color: #4bb8a9;
            height: 2.8rem !important;
            border-radius: 0.2rem !important;
        }

        .btn-group-lg>.btn:hover,
        .btn-lg:hover {
            background-color: #26A69A;
        }

        .btn-outline-primary {
            background-color: #fff !important;
            color: #4bb8a9 !important;
            border-radius: 0.2rem !important;
            border: 1px solid #4bb8a9;
        }

        .btn-outline-primary:hover {
            background-color: #4bb8a9 !important;
            color: #fff !important;
            border: 1px solid #4bb8a9;
        }

        .card-2 {
            margin-top: 40px !important;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 0px solid #aaaa !important;
        }

        p {
            font-size: 13px;
        }

        .small {
            font-size: 9px !important;
        }

        .form-control-sm {
            height: calc(2.2em + .5rem + 2px);
            font-size: .875rem;
            line-height: 1.5;
            border-radius: 0;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .boxed {
            padding: 0px 8px 0 8px;
            background-color: #4bb8a9;
            color: white;
        }

        .boxed-1 {
            padding: 0px 8px 0 8px;
            color: black !important;
            border: 1px solid #aaaa;
        }

        .bell {
            opacity: 0.5;
            cursor: pointer;
        }

        @media (max-width: 767px) {
            .breadcrumb-item+.breadcrumb-item {
                padding-left: 0
            }
        }

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
            <h3 class="text-center">Checkout</h3>
        </div>
    </section>

    <section>
        <div class=" container-fluid my-5 ">
            <div class="row justify-content-center ">
                <div class="col-xl-10">
                    <div class="card rounded-0">

                        <div class="row justify-content-around">
                            {{-- Customer Details form --}}
                            <div class="col-md-5">
                                <div class="card border-0">
                                    <div class="card-header pb-0">
                                        {{-- <h2 class="card-title space ">Checkout</h2> --}}
                                        <p class="h4 card-text text-muted mt-4  space">SHIPPING DETAILS</p>
                                        <hr class="my-0">
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('user.update.shipping-details') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="full_name" class="text-muted mb-1">Full Name</label>
                                                <input type="text" class="form-control form-control-sm" name="full_name"
                                                    id="full_name" value="{{ old('full_name', $user->name ?? '') }}"
                                                    placeholder="Enter full name">
                                                @error('full_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email" class="text-muted mb-1">Email</label>
                                                <input type="text" class="form-control form-control-sm" name="email"
                                                    id="email" value="{{ old('email', $user->email ?? '') }}"
                                                    placeholder="Enter email">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="phone" class="text-muted mb-1">Phone</label>
                                                <input type="text" class="form-control form-control-sm" name="phone"
                                                    id="phone" value="{{ old('phone', $user->phone ?? '') }}"
                                                    placeholder="Enter phone number">
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="address" class="text-muted mb-1">Address</label>
                                                <input type="text" class="form-control form-control-sm" name="address"
                                                    id="address" value="{{ old('address', $user->address ?? '') }}"
                                                    placeholder="123 Main St">
                                                @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="city" class="text-muted mb-1">City</label>
                                                <input type="text" class="form-control form-control-sm" name="city"
                                                    id="city" value="{{ old('city', $user->city ?? '') }}"
                                                    placeholder="City">
                                                @error('city')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="state" class="text-muted mb-1">State</label>
                                                <input type="text" class="form-control form-control-sm" name="state"
                                                    id="state" value="{{ old('state', $user->state ?? '') }}"
                                                    placeholder="State">
                                                @error('state')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="zip" class="text-muted mb-1">ZIP Code</label>
                                                <input type="text" class="form-control form-control-sm" name="zip"
                                                    id="zip" value="{{ old('zip', $user->zip ?? '') }}"
                                                    placeholder="ZIP Code">
                                                @error('zip')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="country" class="text-muted mb-1">Country</label>
                                                <input type="text" class="form-control form-control-sm" name="country"
                                                    id="country" value="{{ old('country', $user->country ?? '') }}"
                                                    placeholder="Country">
                                                @error('country')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-4">
                                                <button type="submit"
                                                    class="btn-sm dark-btn chatNow rounded-0">Save</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            {{-- List of Cart Items --}}
                            <div class="col-md-5">
                                <div class="card border-0 ">
                                    <div class="card-header ">
                                        <p class="h4 card-text text-muted mt-4 space"> YOUR ORDER </p>
                                        <hr class="my-0">
                                    </div>
                                    <div class="card-body pt-0">
                                        @php $total = 0; @endphp
                                        @if ($cart->items->count() > 0)
                                            @foreach ($cart->items as $item)
                                                @php
                                                    $product = $item->product;
                                                    $subtotal = $product->price * $item->quantity;
                                                    $total += $subtotal;
                                                @endphp
                                                <div class="row  justify-content-between">
                                                    <div class="col-auto col-md-7">
                                                        <div class=" d-flex">
                                                            <img src="{{ asset('front/assets/images/products/' . $product->image) }}"
                                                                width="62" height="62" alt="{{ $product->name }}"
                                                                class="me-3">
                                                            <div>
                                                                <p class="mb-0"><strong>{{ $product->name }}</strong>
                                                                </p>
                                                                <small
                                                                    class="text-muted">{{ $product->category->name }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" pl-0 flex-sm-col col-auto  my-auto">
                                                        <p class="boxed-1">{{ $item->quantity ?? 0 }}</p>
                                                    </div>
                                                    <div class=" pl-0 flex-sm-col col-auto  my-auto ">
                                                        <p><b> ${{ number_format($subtotal, 2) }}</b></p>
                                                    </div>
                                                </div>
                                                <hr class="my-2">
                                            @endforeach
                                        @endif

                                        <div class="row ">
                                            <div class="col">
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <p class="mb-1"><b>Total</b></p>
                                                    </div>
                                                    <div class="flex-sm-col col-auto">
                                                        <p class="mb-1"><b>${{ $total }}</b></p>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col">
                                                        <p class="mb-1"><b>Shipping</b></p>
                                                    </div>
                                                    <div class="flex-sm-col col-auto">
                                                        <p class="mb-1"><b>${{ 23 }}</b></p>
                                                    </div>
                                                </div>
                                                @php
                                                    $total = $total + 23;
                                                @endphp
                                                <div class="row justify-content-between">
                                                    <div class="col-4">
                                                        <p class="h5"><b>Grand Total</b></p>
                                                    </div>
                                                    <div class="flex-sm-col col-auto">
                                                        <p class= "h5 mb-1"><b>${{ $total }}</b></p>
                                                    </div>
                                                </div>
                                                <hr class="my-0">
                                            </div>
                                        </div>
                                        <div class="row mb-5 mt-4  text-center">
                                            <div class="col-md-7 col-lg-6 mx-auto">
                                                <a href="{{route('user.proceed.to.pay',$cart->id)}}" class="btn buyNowBtn rounded-0">
                                                    Proceed Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="col-md-6 cta-r-col" data-aos="fade-left" data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
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
    </section>

@endsection

@push('custom_js')
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endpush
