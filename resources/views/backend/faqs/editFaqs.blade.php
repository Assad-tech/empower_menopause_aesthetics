@extends('backend.layout.master')
@section('title', 'Update Faqs')
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
                    <h1 class="page-title"> Update FAQ </h1>
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
                        <form action="{{ route('admin.update.faqs', $faq->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">


                                <div class="col-sm-7">
                                    {{-- Type --}}
                                    <div class="form-group">
                                        <h4>Type</h4>
                                        <select name="type" class="form-control" id="" required>
                                            <option value="" disabled selected>select type</option>
                                            <option  @if($faq->type == "General Questions")  selected @endif value="General Questions">General Questions</option>
                                            <option  @if($faq->type == "Menopause & Hormonal Health")  selected @endif value="Menopause & Hormonal Health">Menopause & Hormonal Health</option>
                                            <option  @if($faq->type == "Aesthetic Services")  selected @endif value="Aesthetic Services">Aesthetic Services</option>
                                            <option  @if($faq->type == "Membership & Support")  selected @endif value="Membership & Support">Membership & Support</option>
                                            <option  @if($faq->type == "Payments & Policies")  selected @endif value="Payments & Policies">Payments & Policies</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Title -->
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <h4>Question</h4>
                                        <input type="text" name="question" class="form-control" placeholder="Enter Question"
                                            value="{{ old('question', $faq->question) }}">
                                        @error('question')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Answer -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h4>Answer</h4>
                                        <div id="summernote-answer" data-toggle="summernote"
                                            data-placeholder="Enter Answer" data-height="150">
                                            {!! old('answer', $faq->answer) !!}
                                        </div>
                                        <input type="hidden" name="answer" id="answer"
                                            value="{{ old('answer', $faq->answer) }}">
                                        @error('answer')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Image -->
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Image</h4>
                                        <input type="file" name="image" class="form-control">
                                        @if ($faq->image)
                                            <small>Current Image:</small><br>
                                            <img src="{{ asset('uploads/featured/images/' . $faq->image) }}"
                                                alt="Current Image" width="100">
                                        @endif
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
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
