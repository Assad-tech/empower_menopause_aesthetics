@extends('backend.layout.master')
@section('title', 'Site Content')
@push('custom_css')
@endpush
@section('content')

    <!-- .page -->
    <div class="page bg-white">
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <div class="d-flex justify-content-between">
                    <h1 class="page-title"> Manage Site Content </h1>
                    <div class="btn-toolbar">
                    </div>
                </div>
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-body -->
                    <div class="card-body">
                        <form action="{{ route('admin.site-content.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- logos --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4>Header logo</h4>
                                    <div class="form-group">
                                        <input type="file"
                                            class="form-control dropify @error('logo') is-invalid @enderror" name="logo"
                                            value="{{ $logo->logo }}" id=""
                                            data-default-file="{{ asset('front/assets/images/' . $logo->logo) }}">
                                    </div>
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <h4>Footer logo</h4>
                                    <div class="form-group">
                                        <input type="file"
                                            class="form-control dropify @error('footer_logo') is-invalid @enderror"
                                            name="footer_logo" value="{{ $footer_logo->footer_logo }}" id=""
                                            data-default-file="{{ asset('front/assets/images/' . $footer_logo->footer_logo) }}">
                                    </div>
                                    @error('footer_logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Phone and Email --}}
                            <div class="row pb-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Email</h4>
                                        <input type="email" placeholder="Enter Email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Phone</h4>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone" placeholder="Enter Phone"
                                            value="{{ $phone->phone }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Address</h4>
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address">{{ $address->address }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Consultation Text</h4>
                                        <input type="text" placeholder="Enter Text"
                                            class="form-control @error('consultation') is-invalid @enderror"
                                            name="consultation" value="{{ $consultation->consultation }}">
                                        @error('consultation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Footer Text</h4>
                                        <input type="text" placeholder="Enter Footer Text"
                                            class="form-control @error('footer_text') is-invalid @enderror"
                                            name="footer_text" value="{{ $footer_text->footer_text }}">
                                        @error('footer_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Copyright</h4>
                                        <input type="text" placeholder="Enter Copyright"
                                            class="form-control @error('copyright') is-invalid @enderror" name="copyright"
                                            value="{{ $copyright->copyright }}">
                                        @error('copyright')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div><!-- /.card-body -->

                </div><!-- /.card -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->


@endsection

@push('custom_js')
@endpush
