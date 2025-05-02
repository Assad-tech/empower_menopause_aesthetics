@extends('frontend.layouts.master')
@section('title', 'View Product')
@push('custom_css')
    <style>
        /*****************globals*************/
        .cartBtn {
            background-color: #D0BEAD !important;
            border: solid 2px #D0BEAD !important;
            color: #fff;
        }

        .buyNowBtn {
            border: solid 2px #D0BEAD !important;
            color: #D0BEAD !important;
        }

        .buyNowBtn:hover {
            background-color: #D0BEAD !important;
            color: #fff !important;
        }

        img.rounded {
            width: 70px !important;
            height: 70px !important;
            border-radius: 50% !important;
        }

        img {
            max-width: 100%;
        }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px;
            }
        }

        .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px;
        }

        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%;
        }

        .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block;
        }

        .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0;
        }

        .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0;
        }

        .tab-content {
            overflow: hidden;
        }

        .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
        }

        .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em;
        }

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .product-title,
        .price,
        .sizes,
        .colors {
            text-transform: UPPERCASE;
            font-weight: bold;
        }

        .checked,
        .price span {
            color: #ff9f1a;
        }

        .product-title,
        .rating,
        .product-description,
        .price,
        .vote,
        .sizes {
            margin-bottom: 15px;
        }

        .product-title {
            margin-top: 0;
        }

        .size {
            margin-right: 10px;
        }

        .size:first-of-type {
            margin-left: 40px;
        }

        .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px;
        }

        .color:first-of-type {
            margin-left: 20px;
        }

        .add-to-cart,
        .like {
            background: #ff9f1a;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease;
        }

        .add-to-cart:hover,
        .like:hover {
            background: #b36800;
            color: #fff;
        }

        .not-available {
            text-align: center;
            line-height: 2em;
        }

        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff;
        }

        .orange {
            background: #ff9f1a;
        }

        .green {
            background: #85ad00;
        }

        .blue {
            background: #0076ad;
        }

        .tooltip-inner {
            padding: 1.3em;
        }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        /*# sourceMappingURL=style.css.map */
    </style>
@endpush

@section('content')
    <section class="hero-sec">
        <div class="container">
            <h3 class="text-center">Product Details</h3>
        </div>
    </section>

    <section>
        <div class="container">
            {{-- Product --}}
            <div class="container-fliud">
                <div class="wrapper row" data-aos="zoom-in-up">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                <img src="{{ asset('front/assets/images/products/' . $product->image) }}"
                                    alt="{{ $product->name }}" />
                            </div>
                        </div>
                    </div>

                    <div class="details col-md-6">
                        @if (!empty($product->offer_text))
                            <h4 class="px-1 emp-menu text-white">{{ $product->offer_text }}</h4>
                        @endif

                        <h4 class="product-title">{{ $product->name }}</h4>

                        <h6 class="text-muted">Category: {{ $product->category->name ?? 'Uncategorized' }}</h6>


                        <div class="rating">
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="fa fa-star {{ $i <= $product->rating ? 'checked' : '' }}"></span>
                                @endfor
                            </div>
                        </div>

                        <p class="product-description">{!! $product->description !!}</p>

                        @php
                            $hasDiscount = $product->discount_percentage > 0;
                            $discount = $hasDiscount ? ($product->discount_percentage / 100) * $product->price : 0;
                            $finalPrice = $product->price - $discount;
                        @endphp

                        @if ($hasDiscount)
                            <h5>
                                original price:
                                <span class="text-danger small">
                                    $<s>{{ number_format($product->price, 2) }}</s>
                                </span>
                            </h5>
                            <h4 class="price">
                                current price:
                                <span class="text-success">
                                    ${{ number_format($finalPrice, 2) }}
                                </span>
                            </h4>
                        @else
                            <h4 class="price">
                                price:
                                <span class="text-success">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </h4>
                        @endif

                        <div class="row text-uppercase">
                            <!-- Left Column -->
                            <div class="col-md-12">
                                @auth
                                    <!-- Quantity and Stock Row -->
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="rounded-0 pr-3">
                                            <strong>Stock:</strong> <span class="text-dark">{{ $product->stock }}</span>
                                        </div>
                                        <div class="input-group" style="max-width: 200px;">
                                            <button class="btn btn-outline-secondary" type="button" id="decreaseQty">-</button>
                                            <input type="number" name="quantity" id="quantity"
                                                class="form-control text-center" value="1" min="1"
                                                max="{{ $product->stock }}">
                                            <button class="btn btn-outline-secondary" type="button" id="increaseQty">+</button>
                                        </div>
                                    </div>

                                    <!-- Buttons Row -->
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('add.to.cart') }}" method="POST" class="w-100">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" id="cartQuantity" value="1">
                                            <button type="submit"
                                                class="text-uppercase btn cartBtn btn-warning rounded-0 text-white w-100">Add to
                                                Cart</button>
                                        </form>

                                        <form action="#" method="POST" class="w-100">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" id="buyNowQuantity" value="1">
                                            <button type="submit"
                                                class="text-uppercase btn buyNowBtn rounded-0 text-white w-100">Buy
                                                Now</button>
                                        </form>
                                    </div>
                                @else
                                    <!-- Quantity and Stock Row -->
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class=" rounded-0 pr-3">
                                            <strong>Stock:</strong> <span class="text-dark">{{ $product->stock }}</span>
                                        </div>
                                        <div class="input-group" style="max-width: 200px;">
                                            <button class="btn btn-outline-secondary" type="button" id="decreaseQty">-</button>
                                            <input type="number" id="quantity" class="form-control text-center" value="1"
                                                min="1" max="{{ $product->stock }}">
                                            <button class="btn btn-outline-secondary" type="button" id="increaseQty">+</button>
                                        </div>
                                    </div>

                                    <!-- Guest Buttons -->
                                    <div class="d-flex gap-2">
                                        <button type="button" class="text-uppercase btn cartBtn rounded-0 text-white w-50"
                                            data-bs-toggle="modal" data-bs-target="#loginModal">
                                            Add to Cart
                                        </button>

                                        <button type="button" class="text-uppercase btn buyNowBtn rounded-0 text-white w-50"
                                            data-bs-toggle="modal" data-bs-target="#loginModal">
                                            Buy Now
                                        </button>
                                    </div>
                                @endauth
                            </div>

                            <!-- Right column: Stock Info -->
                            {{-- <div class="col-md-4 d-flex align-items-end">
                                <div class="btn btn-info rounded-0 w-100 text-white text-center">
                                    <span>Stock:</span> <strong class="text-dark">{{ $product->stock }}</strong>
                                </div>
                            </div> --}}
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
        </div>
    </section>

@endsection

@push('custom_js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qtyInput = document.getElementById('quantity');
            const buyNowQtyInput = document.getElementById('buyNowQuantity');

            const incBtn = document.getElementById('increaseQty');
            const decBtn = document.getElementById('decreaseQty');

            if (incBtn && decBtn && qtyInput) {
                incBtn.addEventListener('click', () => {
                    qtyInput.stepUp();
                    if (buyNowQtyInput) buyNowQtyInput.value = qtyInput.value;
                });

                decBtn.addEventListener('click', () => {
                    qtyInput.stepDown();
                    if (buyNowQtyInput) buyNowQtyInput.value = qtyInput.value;
                });

                qtyInput.addEventListener('input', () => {
                    if (buyNowQtyInput) buyNowQtyInput.value = qtyInput.value;
                });
            }
        });
    </script>
@endpush
