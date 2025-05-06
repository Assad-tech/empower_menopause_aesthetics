@extends('frontend.layouts.master')
@section('title', 'Order History')
@push('custom_css')
    <style>
        .order-summary {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .product-row {
            background-color: #e2e8f0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .btn-outline-secondary {
            margin-right: 10px;
        }

        .info-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
@endpush
@section('content')

    <section class="hero-sec">
        <div class="container">
            <h3 class="text-center">Order History</h3>
        </div>
    </section>

    <section class="contact-sec">
        <div class="container">
            @foreach ($orders as $order)
                <div class="order-summary mt-5 p-4 border rounded shadow-sm">
                    {{-- Header --}}
                    <div class="d-flex justify-content-between flex-wrap mb-4">
                        <div>
                            <strong>Order Number</strong><br>
                            <span class="text-primary fw-bold fs-5">#{{ $order->id }}</span><br>
                            <small class="text-muted">{{ $order->created_at->format('F d, Y') }}</small>
                        </div>
                        {{-- Uncomment and wire up if needed --}}
                        {{-- <div class="text-end">
                        <button class="btn btn-outline-secondary">RETURN</button>
                        <button class="btn btn-outline-secondary">COMPLAINT</button>
                        <button class="btn btn-outline-secondary">VIEW INVOICE</button>
                    </div> --}}
                    </div>

                    {{-- Order Info --}}
                    <div class="row text-center mb-4">
                        <div class="col-md-3">
                            <div class="info-label">Value</div>
                            <div class="fw-bold">${{ number_format($order->total_amount, 2) }}</div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-label">Payment Method</div>
                            <div class="fw-bold">Credit card</div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-label">Status</div>
                            <div class="fw-bold text-success text-capitalize">{{ $order->status }}</div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-label">Delivery Time</div>
                            <div class="fw-bold">{{ $order->created_at->addDays(8)->format('F d, Y') }}</div>
                        </div>
                    </div>

                    {{-- Products Table --}}
                    <table class="table">
                        <thead>
                            <tr class="text-muted">
                                <th>Nr</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Delivery</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $index => $item)
                                <tr class="product-row">
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('front/assets/images/products/' . $item->product->image) }}"
                                                class="me-3" width="100" height="100" alt="Product Image">
                                            <div>
                                                <div><strong>{{ $item->product->name }}</strong></div>
                                                <small>{!! strip_tags($item->product->description) !!}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td class="text-success">Product in stock<br>fast shipping</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Address + Payment Info --}}
                    <div class="row text-center mt-5">
                        <div class="col-md-4">
                            @php
                                $shippingAddress = json_decode($order->user->shippingDetail ?? '{}');
                            @endphp
                            <h6 class="fw-bold">Delivery Address</h6>
                            <p>
                                {{ $shippingAddress->name ?? 'N/A' }}<br>
                                {{ $shippingAddress->address ?? '-' }}<br>
                                {{ $shippingAddress->city ?? '-' }}, {{ $shippingAddress->state ?? '-' }}<br>
                                {{ $shippingAddress->country ?? '-' }} - {{ $shippingAddress->zip ?? '-' }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="fw-bold">Shipping Informations</h6>
                            <p>
                                {{ $shippingAddress->email ?? '-' }}<br>
                                {{ $shippingAddress->phone ?? '-' }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="fw-bold">Payment Informations</h6>
                            <p>Mastercard<br>Ending with **** 4242<br>Expires 02 / 28</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection



@push('custom_js')
    <script></script>
@endpush
