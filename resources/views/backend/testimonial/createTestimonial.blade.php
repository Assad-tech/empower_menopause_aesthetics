@extends('backend.layout.master')
@section('title', 'Add new Testinomial')
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
                    <h1 class="page-title"> Add new Testinomial </h1>
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
                        <form action="{{ route('admin.store.testimonials') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- Name --}}
                                    <div class="form-group">
                                        <h4>Name</h4>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                            value="{{ old('name', $content->name ?? '') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Rating --}}
                                    <div class="form-group">
                                        <h4>Rating</h4>
                                        <select name="rating" id="" class="form-control">
                                            <option value="">Select Rating</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
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
                                        <div id="summernote-feedback" data-toggle="summernote"
                                            data-placeholder="Enter Feedback" data-height="150">
                                        </div>
                                        <input type="hidden" name="feedback" id="feedback">
                                        @error('feedback')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Type --}}
                                    <div class="form-group">
                                        <h4>Type</h4>
                                        <select name="type" id="" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="patient">Patient</option>
                                            <option value="doctor">Doctor</option>
                                            <option value="consultant">Consultant</option>
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
                                        <input type="date" name="post_date" class="form-control">
                                        @error('post_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Image --}}
                                    <div class="form-group">
                                        <h4>Image</h4>
                                        <input type="file" name="image" class="form-control dropify">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
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
