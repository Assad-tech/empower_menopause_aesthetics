@extends('backend.layout.master')
@section('title', 'Faqs')
@push('custom_css')
@endpush
@section('content')

    <!-- .page -->
    <div class="page bg-white">
        {{-- Faqs Banner --}}
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <h1 class="page-title"> Manage FAQs Banner</h1>
                {{-- <p class="text-muted"> Resize your browser window to see it in action. </p><!-- /title --> --}}
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-header -->
                    <div class="card-header">
                        <a href="{{ route('admin.faqs.create.banner') }}" class="btn btn-primary ">Add New Banner</a>
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
                                        {{-- @dd($data->banner) --}}
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
                                                <a href="{{ route('admin.faqs.edit.banner', $data->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('admin.faqs.delete.banner', $data->id) }}"
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
        </div><!-- /.page-inner -->
        
        {{-- FAQs --}}
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <h1 class="page-title"> Manage FAQs</h1>
                {{-- <p class="text-muted"> Resize your browser window to see it in action. </p><!-- /title --> --}}
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-header -->
                    <div class="card-header">
                        <a href="{{ route('admin.add.faqs') }}" class="btn btn-primary ">Add New FAQ</a>
                    </div>
                    @php
                        $i = 1;
                    @endphp
                    <!-- .card-body -->
                    <div class="card-body">
                        <!-- .table -->
                        <table id="faqs-responsive" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Question </th>
                                    <th> Answer </th>
                                    {{-- <th> Slug</th> --}}
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $data)
                                    <tr>
                                        <td> {{ $i++ }} </td>
                                        <td> {{ $data->question ?? 'N/A' }}</td>
                                        <td>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="{!! strip_tags($data->answer) !!}">
                                                {!! Str::limit(strip_tags($data->answer ?? 'N/A'), 40, '...') !!}
                                            </span>
                                        </td>
                                        {{-- <td>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="{{ $data->slug }}">
                                                {{ Str::limit($data->slug ?? 'N/A', 20, '...') }}
                                            </span>
                                        </td> --}}

                                        <td class="m-3">
                                            <div>
                                                <a href="{{ route('admin.edit.faqs', $data->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('admin.delete.faqs', $data->id) }}"
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
                                    <th> Question </th>
                                    <th> Answer </th>
                                    {{-- <th> Slug</th> --}}
                                    <th> Action</th>
                                </tr>
                            </tfoot>
                        </table><!-- /.table -->
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
        $(document).ready(function() {
            $('#faqs-responsive').DataTable({
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
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush
