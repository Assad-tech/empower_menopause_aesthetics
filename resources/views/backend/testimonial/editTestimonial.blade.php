@extends('backend.layout.master')
@section('title', 'UpdateTestinomial')
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
                    <h1 class="page-title"> Update Testinomial </h1>
                    <div class="btn-toolbar">
                        {{-- <button type="button" class="btn btn-primary">Add team</button> --}}
                    </div>
                </div>
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-body -->
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Please fix the following errors:
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.update.testimonials', $testimonial->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- Name --}}
                                    <div class="form-group">
                                        <h4>Name</h4>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $testimonial->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Rating --}}
                                    <div class="form-group">
                                        <h4>Rating</h4>
                                        <select name="rating" class="form-control @error('rating') is-invalid @enderror">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}"
                                                    {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('rating')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    {{-- Feedback --}}
                                    <div class="form-group">
                                        <h4>Feedback</h4>
                                        {{-- <div id="summernote-feedback" data-toggle="summernote" data-height="150">
                                            {!! old('feedback', $testimonial->feedback) !!}
                                        </div>
                                        <input type="hidden" name="feedback" id="feedback"> --}}
                                        <textarea name="feedback" class="form-control" placeholder="Enter Feedback" id="">{{$testimonial->feedback}}</textarea>
                                        @error('feedback')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Type --}}
                                    <div class="form-group">
                                        <h4>Type</h4>
                                        <select name="type" class="form-control @error('type') is-invalid @enderror">
                                            <option value="">Select Type</option>
                                            <option value="patient"
                                                {{ old('type', $testimonial->type) == 'patient' ? 'selected' : '' }}>Patient
                                            </option>
                                            <option value="doctor"
                                                {{ old('type', $testimonial->type) == 'doctor' ? 'selected' : '' }}>Doctor
                                            </option>
                                            <option value="consultant"
                                                {{ old('type', $testimonial->type) == 'consultant' ? 'selected' : '' }}>
                                                Consultant</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Post Date --}}
                                    <div class="form-group">
                                        <h4>Post Date</h4>
                                        <input type="date" name="post_date"
                                            class="form-control @error('post_date') is-invalid @enderror"
                                            value="{{ old('post_date', $testimonial->post_date) }}">
                                        @error('post_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Image --}}
                                    <div class="form-group">
                                        <h4>Image</h4>
                                        <input type="file" name="image"
                                            class="form-control dropify @error('image') is-invalid @enderror"
                                            data-default-file="{{ asset('front/assets/images/testimonials/' . $testimonial->image) }}">
                                        @error('image')
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
    <script>
        $(document).ready(function() {
            $(document).on('theme:init', function() {
                new SummernoteDemo();
            });

            // Initialize the correct summernote ID
            $('#summernote-feedback').summernote({
                placeholder: 'Enter Banner Description',
                height: 150
            });
            // $('#summernote-feedback').on('summernote.change', function(we, contents, $editable) {
            //     $('#feedback').val(contents);
            // });
            // Sync summernote content to hidden input before form submit
            $('form').on('submit', function() {
                $('#feedback').val($('#summernote-feedback').summernote('code'));
            });
        });
    </script>
@endpush
