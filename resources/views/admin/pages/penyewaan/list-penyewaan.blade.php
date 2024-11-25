@extends('admin.layouts.app')
@section('title', 'List Penyewaan')
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
    <div class="row">
        <a href="{{ route('penyewaan.index') }}" class="btn btn-sm btn-link mb-2" style="width: 8%">
            <i class="ti ti-arrow-left"></i>
            Kembali
        </a>
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
                                @role('Pimpinan')
                                <th>Actions</th>
                                @endrole
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
                                @role('Pimpinan')
                                <td>
                                    <div class="action-buttons">
                                        @if ($item->status_penyewaan === 'Sedang Berjalan')
                                        <button class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#finishModal{{ $item->id }}" title="Finish">
                                            Sedang Berjalan
                                        </button>
                                        @elseif ($item->status_penyewaan === 'Sedang Diproses')
                                        <button class="btn btn-outline-info" data-bs-toggle="modal"
                                            data-bs-target="#acceptModal{{ $item->id }}" title="Accept">
                                            <i class="ti ti-check fs-3"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#rejectModal{{ $item->id }}" title="Reject">
                                            <i class="ti ti-x fs-3"></i>
                                        </button>
                                        @else
                                        <p class="fw-bold m-0">-</p>
                                        @endif
                                    </div>
                                </td>
                                @endrole
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
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#rentTable').DataTable({
            "dom": '<"d-flex justify-content-between align-items-center"f>t<"d-flex justify-content-between align-items-center"ip>',
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan MENU entri",
            },
        });
    });

    function validateRejectForm(event) {
        let isValid = true;

        const errorElements = document.querySelectorAll('.text-danger');
        errorElements.forEach(el => el.classList.add('d-none'));

        const alasan = document.getElementById('alasan_penolakan').value.trim();

        if (!alasan) {
            isValid = false;
            document.getElementById('alasanError').classList.remove('d-none');
            document.getElementById('alasanError').textContent = "Alasan penolakan tidak boleh kosong.";
        }

        if (!isValid) {
            event.preventDefault();
        }
        return isValid;
    }
</script>
@endsection
