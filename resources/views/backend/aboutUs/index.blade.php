@extends('backend.layout.master')
@section('title', 'About Us')
@push('custom_css')
@endpush
@section('content')
    <div class="page bg-white">
        {{-- About Us Banner --}}
        {{-- <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <h1 class="page-title"> Manage About Us Banner</h1>
                <!-- <p class="text-muted"> Resize your browser window to see it in action. </p> -->
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-header -->
                    <div class="card-header">
                        <a href="{{ route('admin.about-us.create.banner') }}" class="btn btn-primary ">Add New Banner</a>
                    </div>
                    @php
                        $i = 1;
                    @endphp
                    <!-- .card-body -->
                    <div class="card-body">
                        <!-- .table -->
                        <table id="dt-responsive" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Image </th>
                                    <th> Greeting </th>
                                    <th> Title </th>
                                    <th> Description </th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $data)
                                    <tr>
                                        <td> {{ $i++ }} </td>
                                        <td>
                                            <img class="img rounded" width="100"
                                                src="{{ asset('front/assets/images/banners/' . $data->banner) }}"
                                                alt="{{ Str::limit($data->site_name, 20) }}">

                                        </td>
                                        <td> {{ $data->greeting ?? 'N/A' }}</td>
                                        <td> {{ $data->site_name ?? 'N/A' }}</td>
                                        <td>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="{{ strip_tags($data->banner_description) }}">
                                                {{ Str::limit(strip_tags($data->banner_description ?? 'N/A'), 40, '...') }}
                                            </span>
                                        </td>
                                        <td class="m-3">
                                            <div>
                                                <a href="{{ route('admin.about-us.edit.banner', $data->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('admin.about-us.delete.banner', $data->id) }}"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th> Image </th>
                                    <th> Greeting </th>
                                    <th> Title </th>
                                    <th> Description </th>
                                    <th> Action</th>
                                </tr>
                            </tfoot>
                        </table><!-- /.table -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner --> --}}

        {{-- AboutUs and Me Section --}}
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <div class="d-flex justify-content-between">
                    <h1 class="page-title"> Manage About Us and Me </h1>
                    <div class="btn-toolbar"></div>
                </div>
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-header -->
                    <div class="card-header nav-scroller">
                        <!-- .nav-tabs -->
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#about-us">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#about-me">About Me</a>
                            </li>
                        </ul><!-- /.nav-tabs -->
                    </div><!-- /.card-header -->
                    <!-- .card-body -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="about-us" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="aboutus-form" action="{{ route('admin.update.about-us') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="row pb-3">
                                                <div class="col-sm-12">
                                                    {{-- Heading --}}
                                                    <div class="form-group">
                                                        <h4>Heading</h4>
                                                        {{-- @dd($about->heading) --}}
                                                        <input type="text" class="form-control"
                                                            value="{{ $about->heading ?? '' }}" name="about_us_heading"
                                                            id="aboutus-heading">
                                                        @error('about_us_heading')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pb-3">
                                                <div class="col-sm-12">
                                                    <!-- About Us Description -->
                                                    <div class="form-group">
                                                        <h4>Description</h4>
                                                        <div class="summernote-editor" id="summernote-description"
                                                            data-placeholder="Enter Description" data-height="150">
                                                            {!! old('description', $about->description ?? '') !!}
                                                        </div>
                                                        <input type="hidden" name="about_us_description"
                                                            id="aboutus-description">
                                                        @error('about_us_description')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pb-3">
                                                <div class="col-sm-6">
                                                    {{-- Image --}}
                                                    <div class="form-group">
                                                        <h4>Image</h4>
                                                        <input type="file"
                                                            class="form-control dropify @error('image') is-invalid @enderror"
                                                            name="image" {{--
                                                            data-default-file="{{ asset('front/assets/images/' . $about->image) }}"> --}}
                                                            data-default-file="{{ isset($about) && $about->image ? asset('front/assets/images/' . $about->image) : asset('front/assets/images/default.png') }}">

                                                        @error('image')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-6 text-center">
                                                    @if (!empty($about->image))
                                                    <div class="mt-2">
                                                        <img src="{{ asset('front/assets/images/' . $about->image) }}" class="img rounded"
                                                            width="220" alt="Current Image">
                                                    </div>
                                                    @endif
                                                </div> --}}
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="about-me" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="aboutme-form"
                                            action="{{ route('admin.update.about-me', $aboutMe->id ?? null) }}"
                                            method="POST" enctype="multipart/form-data">

                                            @csrf

                                            <div class="row pb-3">
                                                <div class="col-sm-12">
                                                    {{-- Heading --}}
                                                    <div class="form-group">
                                                        <h4>Heading</h4>
                                                        <input type="text" class="form-control" name="about_me_heading"
                                                            value="{{ $aboutMe->heading ?? '' }}" id="aboutme-heading">
                                                        @error('about_me_heading')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pb-3">
                                                <div class="col-sm-12">
                                                    <!-- About Me Description -->
                                                    <div class="form-group">
                                                        <h4>Description</h4>
                                                        <div class="summernote-editor" id="summernote-aboutme-description"
                                                            data-placeholder="Enter Description" data-height="150">
                                                            {!! old('description', $aboutMe->description ?? '') !!}
                                                        </div>
                                                        <input type="hidden" name="about_me_description"
                                                            id="aboutme-description">
                                                        @error('about_me_description')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pb-3">
                                                <div class="col-sm-6">
                                                    {{-- Image --}}
                                                    <div class="form-group">
                                                        <h4>Image</h4>
                                                        <input type="file"
                                                            class="form-control dropify @error('image') is-invalid @enderror"
                                                            name="image"
                                                            data-default-file="{{ isset($aboutMe) && $aboutMe->image ? asset('front/assets/images/' . $aboutMe->image) : asset('front/assets/images/default.png') }}">

                                                        @error('image')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-6 text-center">
                                                    @if (!empty($about->image))
                                                    <div class="mt-2">
                                                        <img src="{{ asset('front/assets/images/' . $about->image) }}" class="img rounded"
                                                            width="220" alt="Current Image">
                                                    </div>
                                                    @endif
                                                </div> --}}
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div><!-- /.card-body -->

                </div><!-- /.card -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->

    </div><!-- /.page -->
@endsection

@push('custom_js')
    <script src="{{ asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('admin/assets/javascript/pages/dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dt-responsive').DataTable({
                responsive: true,
                autoWidth: false,
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'table-responsive'tr>" +
                    "<'row align-items-center'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 d-flex justify-content-end'p>>",
                language: {
                    paginate: {
                        previous: '<i class="fa fa-lg fa-angle-left"></i>',
                        next: '<i class="fa fa-lg fa-angle-right"></i>'
                    }
                },
            });
        });
    </script>
    <script>
        window.onload = function() {
            // Initialize all summernote editors using the shared class
            $('.summernote-editor').each(function() {
                const height = $(this).data('height') || 150;
                const placeholder = $(this).data('placeholder') || 'Enter Description';

                $(this).summernote({
                    placeholder: placeholder,
                    height: height
                });
            });

            // Submit handlers
            $('#aboutus-form').off('submit').on('submit', function(e) {
                e.preventDefault();
                $('#aboutus-description').val($('#summernote-description').summernote('code'));
                this.submit();
            });

            $('#aboutme-form').off('submit').on('submit', function(e) {
                e.preventDefault();
                $('#aboutme-description').val($('#summernote-aboutme-description').summernote('code'));
                this.submit();
            });
        };
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush
