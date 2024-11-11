@extends('admin.layouts.app')
@section('title', 'Rekapitulasi Data Alat')
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

        #rentTable,
        #maintenanceTable {
            font-size: 0.75rem;
        }

        #rentTable th,
        #maintenanceTable th {
            text-align: center;
            vertical-align: middle;
        }

        #rentTable td,
        #maintenanceTable td {
            text-align: center;
            vertical-align: middle !important;
        }

        #rentTable tbody tr:hover,
        #maintenanceTable tbody tr:hover {
            background-color: #f1f5f9;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="rekapitulasiTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="penyewaan-tab" data-bs-toggle="tab" href="#penyewaan" role="tab"
                            aria-controls="penyewaan" aria-selected="true">Data Penyewaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="maintenance-tab" data-bs-toggle="tab" href="#maintenance" role="tab"
                            aria-controls="maintenance" aria-selected="false">Data Maintenance</a>
                    </li>
                </ul>
                <div class="tab-content" id="rekapitulasiTabContent">
                    <!-- Data Penyewaan -->
                    <div class="tab-pane fade show active" id="penyewaan" role="tabpanel" aria-labelledby="penyewaan-tab">
                        <div class="card w-100 p-5">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                                <h5 class="card-title fw-semibold m-0">Data Penyewaan</h5>
                                <div>
                                    <a href="" class="btn btn-outline-success btn-sm">
                                        <i class="ti ti-download"></i> Excel
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-bordered table-hover" id="rentTable">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>No</th>
                                            <th>Nama Alat</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Total Harga</th>
                                            <th>Status Penyewaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penyewaans as $penyewaan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penyewaan->alat->nama_alat }}</td>
                                                <td>{{ $penyewaan->pelanggan->nama }}</td>
                                                <td>{{ $penyewaan->tgl_sewa }}</td>
                                                <td>{{ $penyewaan->tgl_kembali }}</td>
                                                <td>Rp {{ number_format($penyewaan->total_harga, 0, ',', '.') }}</td>
                                                <td>
                                                    @php
                                                        $statusClasses = [
                                                            'Sedang Diproses' => 'bg-info',
                                                            'Sedang Berjalan' => 'bg-warning',
                                                            'Ditolak' => 'bg-danger',
                                                            'Selesai' => 'bg-success',
                                                        ];
                                                    @endphp

                                                    <span
                                                        class="badge {{ $statusClasses[$penyewaan->status_penyewaan] ?? 'bg-secondary' }}">
                                                        {{ $penyewaan->status_penyewaan }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Data Maintenance -->
                    <div class="tab-pane fade" id="maintenance" role="tabpanel" aria-labelledby="maintenance-tab">
                        <div class="card w-100 p-5">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                                <h5 class="card-title fw-semibold m-0">Data Maintenance</h5>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-bordered table-hover" id="maintenanceTable">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>No</th>
                                            <th>Nama Alat</th>
                                            <th>Tanggal Servis</th>
                                            <th>Deskripsi</th>
                                            <th>Status Maintenance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($maintenances as $maintenance)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $maintenance->alat->nama_alat }}</td>
                                                <td>{{ $maintenance->tgl_servis }}</td>
                                                <td>{{ $maintenance->deskripsi }}</td>
                                                <td>{{ $maintenance->status_pemeliharaan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/vfs_fonts.js"></script>
    <script>
        $(document).ready(function() {
            $('#rentTable, #maintenanceTable').DataTable({
                "dom": '<"d-flex justify-content-between align-items-center"f>t<"d-flex justify-content-between align-items-center"ip>',
                "buttons": [
                    {
                        extend: 'excelHtml5',
                        text: 'Export Excel',
                        className: 'btn btn-success btn-sm'
                    },
                ],
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                },
            });
        });
    </script>
@endsection
