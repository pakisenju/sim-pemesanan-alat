@extends('admin.layouts.app')
@section('title', 'Dashboard')
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

        #rentTable {
            font-size: 0.75rem;
        }

        #rentTable th {
            text-align: center;
            vertical-align: middle;
        }

        #rentTable td {
            text-align: center;
            vertical-align: middle !important;
        }

        #rentTable .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        #rentTable tbody tr:hover {
            background-color: #f1f5f9;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        @role(['Pimpinan', 'Karyawan'])
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Yearly Breakup -->
                            <div class="card overflow-hidden">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row alig n-items-start">
                                            <div class="col-8">
                                                <h5 class="card-title mb-9 fw-semibold">Pendapatan Keseluruhan</h5>
                                                <h4 class="fw-semibold mb-3">Rp. {{ number_format($total_pendapatan, 0) }}</h4>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-end">
                                                    <div
                                                        class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-arrow-up fs-6"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="earning"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Yearly Breakup -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row alig n-items-start">
                                        <div class="col-8">
                                            <h5 class="card-title mb-9 fw-semibold">Pengeluaran Keseluruhan</h5>
                                            <h4 class="fw-semibold mb-3">Rp. {{ number_format($total_pengeluaran, 0) }}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="text-white bg-danger rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-arrow-down fs-6"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="earning"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-5 fw-semibold">Pemasukan dan Pengeluaran Bulanan</h5>
                        </div>
                        <div id="chart" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
        @endrole

        <div class="row">
            <h5 class="card-title mb-5 fw-semibold">Alat Berat</h5>
            @foreach ($alatBerats as $alat)
                <div class="col-md-4 mb-4">
                    <div class="card border h-100" data-alat-id="{{ $alat->id }}"
                        data-hourly-rate="{{ $alat->harga_sewa }}">
                        <img src="{{ asset('storage/' . $alat->thumbnail) }}" class="card-img-top"
                            alt="Thumbnail {{ $alat->nama_alat }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $alat->nama_alat }}</h5>
                            <p class="card-text"><strong>Kapasitas:</strong> {{ $alat->kapasitas }}</p>
                            <p class="card-text"><strong>Harga Sewa:</strong> Rp
                                {{ number_format($alat->harga_sewa, 0, ',', '.') }} / jam</p>
                            <p class="card-text">
                                <strong>Status:</strong>
                                <small
                                    class="fw-bold fs-3 {{ $alat->status_ketersediaan === 'Tersedia' ? 'text-success' : 'text-danger' }}">
                                    {{ $alat->status_ketersediaan }}
                                </small>
                            </p>
                            <p class="card-text"><strong>Lokasi:</strong> {{ $alat->lokasi }}</p>
                            <p class="card-text"><strong>Tahun Pembuatan:</strong> {{ $alat->tahun_pembuatan }}</p>
                            <p class="card-text">{{ Str::limit($alat->deskripsi, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100 p-5">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                    <h5 class="card-title fw-semibold m-0">List Penyewaan</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover" id="rentTable">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>No</th>
                                <th>Alat Berat</th>
                                <th>Nama Pelanggan</th>
                                <th>Lokasi</th>
                                <th>Total Harga</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penyewaans as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->alat->nama_alat }}</td>
                                    <td>{{ $item->pelanggan->nama }}</td>
                                    <td>{{ $item->lokasi_penyewaan }}</td>
                                    <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex flex-column align-items-center">
                                            <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" width="100"
                                                alt="Bukti Pembayaran">
                                            <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}"
                                                target="_blank">Lihat File</a>
                                        </div>
                                    </td>
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
                                            class="badge {{ $statusClasses[$item->status_penyewaan] ?? 'bg-secondary' }}">
                                            {{ $item->status_penyewaan }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($item->status_penyewaan === 'Ditolak')
                                            <div class="d-flex flex-column gap-2">
                                                <p class="fw-bold m-0">{{ $item->alasan_penolakan }}</p>
                                                @if ($item->bukti_refund)
                                                    <a class="text-info"
                                                        href="{{ asset('storage/' . $item->bukti_refund) }}"
                                                        target="_blank">
                                                        <i class="ti ti-search"></i> Bukti refund
                                                    </a>
                                                @endif
                                            </div>
                                        @else
                                            <p class="fw-bold m-0">-</p>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Accept Modal -->
                                <div class="modal fade" id="acceptModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="acceptModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="acceptModalLabel">Setujui Penyewaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('penyewaan.accept', $item->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menyetujui penyewaan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Accept</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Reject Modal -->
                                <div class="modal fade" id="rejectModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="rejectModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="rejectModalLabel">Tolak Penyewaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('penyewaan.reject', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menolak penyewaan ini?</p>
                                                    <div class="mb-3">
                                                        <label for="alasan_penolakan" class="form-label">
                                                            Alasan Penolakan <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="alasan_penolakan"
                                                            name="alasan_penolakan" required>
                                                        <div class="mt-1 text-danger d-none" id="alasanError"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="bukti_refund" class="form-label">Bukti Refund
                                                            <span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control" id="bukti_refund"
                                                            name="bukti_refund" required>
                                                        <div class="mt-1 text-danger d-none" id="buktiError"></div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Finish Modal -->
                                <div class="modal fade" id="finishModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="finishModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="finishModalLabel">Selesaikan Penyewaan
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('penyewaan.finish', $item->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menyelesaikan penyewaan ini?</p>
                                                    <p><strong>Alat:</strong> {{ $item->alat->nama_alat }}</p>
                                                    <p><strong>Nama Pelanggan:</strong> {{ $item->pelanggan->nama }}
                                                    </p>
                                                    <p><strong>Total Harga:</strong> Rp
                                                        {{ number_format($item->total_harga, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Finish</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            chart: {
                type: 'bar',
                height: 290,
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 5,
                    borderRadiusApplication: 'end',
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Pemasukan',
                data: @json($pendapatan)
            }, {
                name: 'Pengeluaran',
                data: @json($pengeluaran)
            }],
            xaxis: {
                categories: @json($bulan),
                title: {
                    text: 'Bulan'
                }
            },
            yaxis: {
                title: {
                    text: 'Jumlah (IDR)'
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'center',
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        $(document).ready(function() {
            $('#rentTable').DataTable({
                "dom": '<"d-flex justify-content-between align-items-center"f>t<"d-flex justify-content-between align-items-center"ip>',
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan MENU entri",
                },
            });
        });
    </script>
@endsection
