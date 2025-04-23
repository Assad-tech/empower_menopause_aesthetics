@extends('backend.layout.master')
@section('title', 'News Latter Emails')
@push('custom_css')
@endpush
@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
    <!-- .page -->
    <div class="page bg-white">
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                {{-- <h1 class="page-title"> Manage Home</h1> --}}
                {{-- <p class="text-muted"> Resize your browser window to see it in action. </p><!-- /title --> --}}
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-header -->
                    <div class="card-header d-flex justify-content-between">
                        <h1 class="page-title"> Manage News Latter Emails</h1>
                        {{-- <a href="{{ route('admin.add.banner') }}" class="btn btn-primary ">Add New Banner</a> --}}
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
                                    <th> Emails </th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emails as $data)
                                    <tr>
                                        <td> {{ $i++ }} </td>
                                        <td> {{ $data->email ?? 'N/A' }}</td>
                                        <td class="m-3">
                                            <div>
                                                {{-- <a href="{{ route('admin.edit.banner', $data->id) }}"
                                                    class="btn btn-info">Edit</a> --}}
                                                <a href="{{ route('admin.delete.email', $data->id) }}" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th> Emails </th>
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
    <script src="{{ asset('admin/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/javascript/pages/dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dt-responsive').DataTable({
                responsive: false,
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
            $('#test-responsive').DataTable({
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
