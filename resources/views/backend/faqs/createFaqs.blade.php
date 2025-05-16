@extends('backend.layout.master')
@section('title', 'Add new FAQs')
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
                    <h1 class="page-title"> Add new FAQs </h1>
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
                        <form action="{{ route('admin.store.faqs') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-sm-7">
                                    {{-- Type --}}
                                    <div class="form-group">
                                        <h4>Type</h4>
                                        <select name="type" class="form-control" id="" required>
                                            <option value="" disabled selected>select type</option>
                                            <option value="General Questions">General Questions</option>
                                            <option value="Menopause & Hormonal Health">Menopause & Hormonal Health</option>
                                            <option value="Aesthetic Services">Aesthetic Services</option>
                                            <option value="Membership & Support">Membership & Support</option>
                                            <option value="Payments & Policies">Payments & Policies</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-sm-7">
                                    {{-- Question --}}
                                    <div class="form-group">
                                        <h4>Question</h4>
                                        <input type="text" name="question" class="form-control" placeholder="Enter Question"
                                            value="{{ old('question', $content->question ?? '') }}">
                                        @error('question')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    {{-- Answer --}}
                                    <div class="form-group">
                                        <h4>Answer</h4>
                                        <div id="summernote-answer" data-toggle="summernote"
                                            data-placeholder="Enter Answer" data-height="150">
                                        </div>
                                        <input type="hidden" name="answer" id="answer">
                                        @error('answer')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Image
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Image</h4>
                                        <input type="file" name="image" class="form-control dropify">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
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
            $('#summernote-answer').summernote({
                placeholder: 'Enter Description',
                height: 150
            });

            // Fix here: sync summernote-answer to answer input
            $('form').on('submit', function () {
                $('#answer').val($('#summernote-answer').summernote('code'));
            });
        });
    </script>

@endpush
