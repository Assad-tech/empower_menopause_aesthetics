@extends('backend.layout.master')
@section('title', 'Add new category')
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
                    <h1 class="page-title"> Add new category </h1>
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
                        <form action="{{ route('admin.store.category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- Category --}}
                                    <div class="form-group">
                                        <h4>Category</h4>
                                        <input type="text" name="category" class="form-control" placeholder="Enter Category"
                                            value="{{ old('category', $content->category ?? '') }}">
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
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
        $(document).ready(function () {
            $(document).on('theme:init', function () {
                new SummernoteDemo();
            });
            $('#summernote-description').summernote({
                placeholder: 'Enter Description',
                height: 150
            });

            // Fix here: sync summernote-description to description input
            $('form').on('submit', function () {
                $('#description').val($('#summernote-description').summernote('code'));
            });
        });
    </script>

@endpush