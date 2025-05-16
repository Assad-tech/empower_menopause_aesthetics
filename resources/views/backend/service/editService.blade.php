@extends('backend.layout.master')
@section('title', 'Update feature')
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
                    <h1 class="page-title"> Update Service</h1>
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
                        <form action="{{ route('admin.update.service', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                {{-- Service Number --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Service Number</h4>
                                        <input type="text" name="service_number" class="form-control" placeholder="Enter Service Number"
                                            value="{{ old('service_number', $service->service_number ?? '') }}">
                                        @error('service_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Title -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Title</h4>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                                            value="{{ old('title', $service->title) }}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Category --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Category</h4>
                                            <select name="category" id="" class="form-control" required>
                                                <option value="" disabled selected>Select category</option>
                                                <option @if($service->category == "Assessment")  selected @endif value="Assessment">Assess ment</option>
                                                <option @if($service->category == "Training/Education")  selected @endif value="Training/Education">Training/Education</option>
                                                <option @if($service->category == "Treatment")  selected @endif value="Treatment">Treatment</option>
                                            </select>
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Type --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Type</h4>
                                        <select name="type" id="" class="form-control" required>
                                            <option value="" disabled selected>Select Type</option>
                                            <option @if($service->type == "Appointment")  selected @endif value="Appointment">Appointment</option>
                                            <option @if($service->type == "Item")  selected @endif  value="Item">Item</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Duration --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Duration</h4>
                                        <input type="text" name="duration" class="form-control" placeholder="Enter duration"
                                            value="{{ old('duration', $service->duration ?? '') }}">
                                        @error('duration')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Appt Location Type --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Appt Location Type</h4>
                                        <select name="appt_location_type" id="" class="form-control" required>
                                            <option value="" disabled selected>Select Appt Location Type</option>
                                            <option @if($service->appt_location_type == "Halaxy Telehealth")  selected @endif value="Halaxy Telehealth">Halaxy Telehealth</option>
                                            <option @if($service->appt_location_type == "Online consultation")  selected @endif value="Online consultation">Online consultation</option>
                                            <option @if($service->appt_location_type == "In-clinic consultation")  selected @endif value="In-clinic consultation">In-clinic consultation</option>
                                        </select>
                                        @error('appt_location_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Amount --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Amount</h4>
                                        <input step="0.01" type="number" name="amount" class="form-control" placeholder="Enter Amount"
                                            value="{{ old('amount', $service->amount ?? '') }}">
                                        @error('amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Tax --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Tax</h4>
                                        <input step="0.01" type="number" name="tax" class="form-control" placeholder="Enter Tax"
                                            value="{{ old('tax', $service->tax ?? '') }}">
                                        @error('tax')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Status</h4>
                                        <select name="status" class="form-control">
                                            <option value="1"
                                                {{ old('status', $service->status) == 1 ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="0"
                                                {{ old('status', $service->status) == 0 ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Direct Booking Link (Location) --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Direct Booking Link (Location)
                                        </h4>
                                        <input type="text" value="{!! old('booking_location', $service->booking_location) !!}" name="booking_location" class="form-control " placeholder="Direct Booking Link (Location)">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Direct Booking Link (Practitioner & Location) --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Direct Booking Link (Practitioner & Location)
                                        </h4>
                                        <input type="text" value="{!! old('booking_practitioner', $service->booking_practitioner) !!}" name="booking_practitioner" class="form-control " placeholder="Direct Booking Link (Practitioner & Location)">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Icon -->
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Icon Tag</h4>
                                        <input type="text" name="icon" class="form-control"
                                            placeholder="Paste icon code here" value="{{ old('icon', $service->icon) }}">
                                        @error('icon')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}

                                <!-- Description -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h4>Description</h4>
                                        <div id="summernote-description" data-toggle="summernote"
                                            data-placeholder="Enter Description" data-height="150">
                                            {!! old('description', $service->description) !!}
                                        </div>
                                        <input type="hidden" name="description" id="description"
                                            value="{{ old('description', $service->description) }}">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>




                                <!-- Image -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Image</h4>
                                        <input type="file" name="image" class="form-control dropify"
                                            data-default-file ="{{ asset('front/assets/images/featured/' . $service->image) }}">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
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
