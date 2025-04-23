@extends('backend.layout.master')
@section('title', 'CMS Dashboard')
@push('custom_css')
@endpush

@section('content')
    <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <div class="d-flex flex-column flex-md-row">
                    <p class="lead">
                        <span class="font-weight-bold">Hi, {{ Auth::guard('admin')->user()->name }}.</span>
                        {{-- <span class="d-block text-muted">
                            Here’s what’s happening with your business today.
                        </span> --}}
                    </p>
                </div>
            </header><!-- /.page-title-bar -->

            <!-- .page-section -->
            <div class="page-section">
                <!-- .section-block -->
                <div class="section-block">
                    <!-- metric row -->
                    <div class="metric-row">
                        <div class="col-sm-3">
                            <div class="metric metric-bordered align-items-center bg-white">
                                <h2 class="metric-label"> Messages </h2>
                                <p class="metric-value h3">
                                    <sub><i class="oi oi-people"></i></sub> <span
                                        class="value">{{ $allContactUs ?? '0' }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="metric metric-bordered align-items-center bg-white">
                                <h2 class="metric-label"> Services</h2>
                                <p class="metric-value h3">
                                    <sub><i class="oi oi-fork"></i></sub> <span
                                        class="value">{{ $allServices ?? '0' }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="metric metric-bordered align-items-center bg-white">
                                <h2 class="metric-label"> Products</h2>
                                <p class="metric-value h3">
                                    <sub>
                                        <i class="oi oi-timer"></i>
                                    </sub> <span
                                        class="value">{{ $allProducts ?? '0' }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="metric metric-bordered align-items-center bg-white">
                                <h2 class="metric-label"> FAQs</h2>
                                <p class="metric-value h3">
                                    <sub><i class="fa fa-tasks"></i></sub> <span class="value">{{ $allFAQs ?? '0' }}</span>
                                </p>
                            </div>
                        </div>
                    </div><!-- /metric row -->
                </div><!-- /.section-block -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
@endsection

@push('custom_js')
@endpush
