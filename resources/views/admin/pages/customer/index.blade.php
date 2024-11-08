@extends('admin.layouts.app')
@section('title', 'Pengguna')
@section('style')
    <style>
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 10px;
            font-size: 0.75rem;
        }

        .dataTables_wrapper .dataTables_info {
            margin-bottom: 10px;
            font-size: 0.75rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.55rem 0.75rem;
            font-size: 0.75rem;
            margin: 0 2px;
            border-radius: 5px;
            color: var(--bs-btn-color, #fff);
            background-color: var(--bs-btn-bg, #5D87FF);
            border: 1px solid var(--bs-btn-border-color, #5D87FF);
            cursor: pointer;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: var(--bs-btn-hover-bg, #4f73d9);
            color: var(--bs-btn-hover-color, #fff) !important;
            border-color: var(--bs-btn-hover-border-color, #4a6ccc);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: var(--bs-btn-active-bg, #4a6ccc) !important;
            color: var(--bs-btn-active-color, #fff) !important;
            border-color: var(--bs-btn-active-border-color, #4665bf);
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 5px;
            padding: 5px;
            border: 1px solid #ddd;
            margin-left: 5px;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 5px;
            padding: 5px;
            border: 1px solid #ddd;
            margin-right: 5px;
        }

        #customerTable {
            font-size: 0.75rem;
        }

        #customerTable th {
            text-align: center;
            vertical-align: middle;
        }

        #customerTable td {
            text-align: center;
            vertical-align: middle !important;
        }

        #customerTable .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        #customerTable tbody tr:hover {
            background-color: #f1f5f9;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100 p-5">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                        <h5 class="card-title fw-semibold m-0">List Pelanggan</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover" id="customerTable">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Instansi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->pelanggan->nomor_telepon }}</td>
                                        <td>{{ $user->pelanggan->alamat }}</td>
                                        <td>{{ $user->pelanggan->instansi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable({
                "dom": '<"d-flex justify-content-between align-items-center"f>t<"d-flex justify-content-between align-items-center"ip>',
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                },
            });
        });
    </script>
@endsection
