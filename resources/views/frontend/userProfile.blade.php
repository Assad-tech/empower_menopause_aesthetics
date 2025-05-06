@extends('frontend.layouts.master')
@section('title', 'Profile')
@push('custom_css')
    <style>
        .rounded-circle {
            border-radius: 50%;
        }
    </style>
@endpush
@section('content')

    <section class="hero-sec">
        <div class="container">
            <h3 class="text-center">Profile</h3>
        </div>
    </section>

    <section class="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- User Image -->
                    <img src="{{ asset('front/assets/images/profile/user1.jpg') }}" alt="User Profile"
                        class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">

                </div>
                <div class="col-md-12 d-flex align-items-center justify-content-center">
                    <!-- User Name -->
                    <h4 class="mx-2">Name: <span class="text-muted">{{ $user->name }}</span></h4>
                    <!-- User Email -->
                    <h4 class="mx-2">Email: <span class="text-muted">{{ $user->email }} </span></h4>
                </div>
            </div>
        </div>
    </section>

@endsection



@push('custom_js')
    <script></script>
@endpush
