@extends('backend.layout.master')
@section('title', 'Add new service')
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
                    <h1 class="page-title"> Add new Service </h1>
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
                        <form action="{{ route('admin.store.service') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- Service Number --}}
                                    <div class="form-group">
                                        <h4>Service Number</h4>
                                        <input type="text" name="service_number" class="form-control" placeholder="Enter Service Number"
                                            value="{{ old('service_number', $content->service_number ?? '') }}">
                                        @error('service_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    {{-- Title --}}
                                    <div class="form-group">
                                        <h4>Title</h4>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                                            value="{{ old('title', $content->title ?? '') }}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    {{-- Category --}}
                                    <div class="form-group">
                                        <h4>Category</h4>
                                            <select name="category" id="" class="form-control" required>
                                                <option value="" disabled selected>Select category</option>
                                                <option value="Assess ment">Assess ment</option>
                                                <option value="Training/Education">Training/Education</option>
                                                <option value="Treatment">Treatment</option>
                                            </select>
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    {{-- Type --}}
                                    <div class="form-group">
                                        <h4>Type</h4>
                                        <select name="type" id="" class="form-control" required>
                                            <option value="" disabled selected>Select Type</option>
                                            <option value="Appointment">Appointment</option>
                                            <option value="Item">Item</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    {{-- Duration --}}
                                    <div class="form-group">
                                        <h4>Duration</h4>
                                        <input type="text" name="duration" class="form-control" placeholder="Enter duration"
                                            value="{{ old('duration', $content->duration ?? '') }}">
                                        @error('duration')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    {{-- Appt Location Type --}}
                                    <div class="form-group">
                                        <h4>Appt Location Type</h4>
                                        <select name="appt_location_type" id="" class="form-control" required>
                                            <option value="" disabled selected>Select Appt Location Type</option>
                                            <option value="Halaxy Telehealth">Halaxy Telehealth</option>
                                            <option value="Online consultation">Online consultation</option>
                                            <option value="In-clinic consultation">In-clinic consultation</option>
                                        </select>
                                        @error('appt_location_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Amount --}}
                                    <div class="form-group">
                                        <h4>Amount</h4>
                                        <input type="number" name="amount" class="form-control" placeholder="Enter Amount"
                                            value="{{ old('amount', $content->amount ?? '') }}">
                                        @error('amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Tax --}}
                                    <div class="form-group">
                                        <h4>Tax</h4>
                                        <input type="number" name="tax" class="form-control" placeholder="Enter Tax"
                                            value="{{ old('tax', $content->tax ?? '') }}">
                                        @error('tax')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Direct Booking Link (Location)
                                        </h4>
                                        <input type="text" name="booking_location" class="form-control " placeholder="Direct Booking Link (Location)">
                                        @error('booking_location')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Direct Booking Link (Practitioner & Location)
                                        </h4>
                                        <input type="text" name="booking_practitioner" class="form-control " placeholder="Direct Booking Link (Practitioner & Location)">
                                        @error('booking_practitioner')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>




                                {{-- <div class="col-sm-6">
                                    <!-- Icon -->
                                    <div class="form-group">
                                        <h4>Icon Tag</h4>
                                        <input type="text" name="icon" class="form-control"
                                            placeholder="Paste icon code here">
                                        @error('icon')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-sm-12">
                                    <!-- Description -->
                                    <div class="form-group">
                                        <h4>Description</h4>
                                        <div id="summernote-description" data-toggle="summernote"
                                            data-placeholder="Enter Description" data-height="150">
                                        </div>
                                        <input type="hidden" name="description" id="description">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>






                                {{-- Image --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Image</h4>
                                        <input type="file" name="image" class="form-control dropify">
                                        @error('image')
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
        $(document).ready(function() {
            $(document).on('theme:init', function() {
                new SummernoteDemo();
            });
            $('#summernote-description').summernote({
                placeholder: 'Enter Description',
                height: 150
            });

            // Fix here: sync summernote-description to description input
            $('form').on('submit', function() {
                $('#description').val($('#summernote-description').summernote('code'));
            });
        });
    </script>
@endpush
