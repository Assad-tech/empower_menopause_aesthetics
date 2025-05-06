@extends('frontend.layouts.master')
@section('title', 'View Cart')
@push('custom_css')
    <link rel="stylesheet" href="{{ asset('front/assets/style/jquery.fancybox.min.css') }}">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


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
    </style>
@endpush

@section('content')

    <section class="hero-sec">
        <div class="container">
            <h3 class="text-center">Manage Cart</h3>
        </div>
    </section>

    <section>
        <div class="container">
            {{-- Carts --}}
            <div class="container-fliud">
                <div class="row">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:45%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:10%">Quantity</th>
                                <th style="width:20%" class="text-center">Sub-total</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $total = 0; @endphp

                            @if ($cart->items->count() > 0)
                                @foreach ($cart->items as $item)
                                    @php
                                        $product = $item->product;
                                        $subtotal = $product->price * $item->quantity;
                                        $total += $subtotal;
                                    @endphp
                                    <tr data-id="{{ $item->id }}">
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs">
                                                    <img src="{{ asset('front/assets/images/products/' . $product->image) }}"
                                                        width="100" height="100" class="img-responsive" />
                                                </div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin">{{ $product->name }}</h4>
                                                    <p>{{ $product->category->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">${{ number_format($product->price, 2) }}</td>
                                        <td data-th="Quantity">
                                            <div class="input-group" style="max-width: 120px;">
                                                <button class="btn btn-outline-secondary btn-decrease"
                                                    data-id="{{ $item->id }}">−</button>
                                                <input type="number" value="{{ $item->quantity }}" min="1"
                                                    class="form-control text-center cart-quantity"
                                                    data-id="{{ $item->id }}">
                                                <button class="btn btn-outline-secondary btn-increase"
                                                    data-id="{{ $item->id }}">+</button>
                                            </div>
                                        </td>
                                        <td data-th="Subtotal" class="text-center">
                                            ${{ number_format($subtotal, 2) }}
                                        </td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-danger btn-sm remove-from-cart"
                                                data-id="{{ $item->id }}">
                                                Remove
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Your cart is empty.</td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <h2><strong>Total ${{ $total }}</strong></h2>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <a href="{{route('products')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                                        Continue Shopping</a>
                                    <a href="{{route('checkout')}}" class="btn btn-success">Checkout</class=>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
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
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Increase quantity
            document.querySelectorAll('.btn-increase').forEach(btn => {
                btn.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    input.value = parseInt(input.value) + 1;
                    updateCart(this.dataset.id, input.value);
                });
            });

            // Decrease quantity
            document.querySelectorAll('.btn-decrease').forEach(btn => {
                btn.addEventListener('click', function() {
                    const input = this.nextElementSibling;
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                        updateCart(this.dataset.id, input.value);
                    }
                });
            });

            // Remove from cart
            document.querySelectorAll('.remove-from-cart').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (confirm('Are you sure to remove this item?')) {
                        fetch(`/cart/remove/${this.dataset.id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                }
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    toastr.success(data.message || "Removed successfully!");
                                    setTimeout(() => location.reload(),
                                    1200); // ✅ Corrected this line
                                } else {
                                    toastr.error(data.message || "Something went wrong.");
                                }
                            })
                            .catch(() => toastr.error('Something went wrong.'));
                    }
                });
            });

            // Update cart quantity
            function updateCart(id, quantity) {
                fetch(`/cart/update/${id}`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            toastr.success(data.message || "Updated successfully!");
                            setTimeout(() => location.reload(), 1200);
                        } else {
                            toastr.error(data.message || "Something went wrong.");
                        }
                    })
                    .catch(() => toastr.error('Something went wrong.'));
            }
        });
    </script>
@endpush
