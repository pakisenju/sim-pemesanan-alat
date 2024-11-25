@extends('admin.layouts.app')
@section('title', 'Alat Berat')
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

        #alatTable {
            font-size: 0.75rem;
        }

        #alatTable th {
            text-align: center;
            vertical-align: middle;
        }

        #alatTable td {
            text-align: center;
            vertical-align: middle !important;
        }

        #alatTable .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            height: 100%;
        }

        #alatTable img {
            border-radius: 8px;
            border: 2px solid #ddd;
        }

        #alatTable tbody tr:hover {
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
                        <h5 class="card-title fw-semibold m-0">List Alat Berat</h5>
                        @role('Karyawan')
                            <div class="card-toolbar d-flex gap-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                    <i class="ti ti-plus me-1"></i> Tambah Data
                                </button>
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#maintenanceModal">
                                    <i class="ti ti-settings me-1"></i> Maintenance
                                </button>
                            </div>
                        @endrole
                    </div>
                    <div class="card-body p-0 ">
                        <table class="table table-bordered table-hover" id="alatTable">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>No</th>
                                    <th>Thumbnail</th>
                                    <th>Nama Alat</th>
                                    <th>Kapasitas</th>
                                    <th>Harga Sewa (Jam)</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alatBerats as $alat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $alat->thumbnail) }}" height="70"
                                                alt="Thumbnail">
                                        </td>
                                        <td>{{ $alat->nama_alat }}</td>
                                        <td>{{ $alat->kapasitas }}</td>
                                        <td>Rp {{ number_format($alat->harga_sewa, 0, ',', '.') }}</td>
                                        <td>
                                            <span
                                                class="badge
                                                @if ($alat->status_ketersediaan == 'Tersedia') bg-success
                                                @elseif($alat->status_ketersediaan == 'Disewakan') bg-warning
                                                @else bg-danger @endif fs-2 fw-bold">
                                                {{ $alat->status_ketersediaan }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                @role('Karyawan')
                                                    @if ($alat->latestPemeliharaan && $alat->latestPemeliharaan->status_pemeliharaan === 'Dalam Proses')
                                                        <button class="btn btn-outline-warning" data-bs-toggle="modal"
                                                            data-bs-target="#finishMaintenanceModal{{ $alat->id }}"
                                                            title="Finish Maintenance">
                                                            Dalam Pemeliharaan
                                                        </button>
                                                    @else
                                                        <button class="btn btn-outline-info" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $alat->id }}" title="Edit">
                                                            <i class="ti ti-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $alat->id }}" title="Delete">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    @endif
                                                @else
                                                -
                                                @endrole
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{ $alat->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Alat Berat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('alat-berat.update', $alat->id) }}" method="POST"
                                                    enctype="multipart/form-data" onsubmit="return validateEditForm(event)">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        @include('admin.pages.alat-berat._form_edit', [
                                                            'alat' => $alat,
                                                        ])
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $alat->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Alat Berat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('alat-berat.destroy', $alat->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus alat berat ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Finish Maintenance Modal -->
                                    <div class="modal fade" id="finishMaintenanceModal{{ $alat->id }}" tabindex="-1"
                                        aria-labelledby="finishMaintenanceModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="finishMaintenanceModalLabel">Update
                                                        Pemeliharaan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form
                                                    action="{{ route('pemeliharaan.update', $alat->latestPemeliharaan->id ?? '') }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="hidden" name="alat_id"
                                                            value="{{ $alat->id }}">
                                                        <div class="mb-3">
                                                            <label for="tgl_servis" class="form-label">
                                                                Tanggal Servis
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="date" class="form-control" name="tgl_servis"
                                                                value="{{ $alat->latestPemeliharaan->tgl_servis ?? '' }}"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deskripsi" class="form-label">
                                                                Deskripsi
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <textarea class="form-control" name="deskripsi" rows="3">{{ $alat->latestPemeliharaan->deskripsi ?? '' }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="biaya_servis" class="form-label">
                                                                Biaya Servis
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" class="form-control"
                                                                name="biaya_servis"
                                                                value="{{ $alat->latestPemeliharaan->biaya_servis ?? '' }}"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status_pemeliharaan" class="form-label">
                                                                Status Pemeliharaan
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select class="form-control" name="status_pemeliharaan"
                                                                required>
                                                                <option value="Dalam Proses"
                                                                    {{ ($alat->latestPemeliharaan->status_pemeliharaan ?? '') === 'Dalam Proses' ? 'selected' : '' }}>
                                                                    Dalam Proses
                                                                </option>
                                                                <option value="Selesai"
                                                                    {{ ($alat->latestPemeliharaan->status_pemeliharaan ?? '') === 'Selesai' ? 'selected' : '' }}>
                                                                    Selesai
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
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

        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Alat Berat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('alat-berat.store') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return validateAddForm(event)">
                        @csrf
                        <div class="modal-body">
                            @include('admin.pages.alat-berat._form_add')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="maintenanceModal" tabindex="-1" aria-labelledby="maintenanceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="maintenanceModalLabel">Maintenance Alat Berat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('pemeliharaan.store') }}" method="POST"
                        onsubmit="return validateMaintenanceForm(event)">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="alat_id" class="form-label">
                                    Nama Alat
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" name="alat_id" id="alat_id">
                                    <option value="">-- Pilih Alat Berat --</option>
                                    @foreach ($alatBerats as $alat)
                                        <option value="{{ $alat->id }}">{{ $alat->nama_alat }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1 text-danger d-none" id="alatIdError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_servis" class="form-label">
                                    Tanggal Servis
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="tgl_servis" name="tgl_servis">
                                <div class="mt-1 text-danger d-none" id="tglServisError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">
                                    Deskripsi
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                                <div class="mt-1 text-danger d-none" id="deskripsiError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="biaya_servis" class="form-label">
                                    Biaya Servis
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control" id="biaya_servis" name="biaya_servis">
                                <div class="mt-1 text-danger d-none" id="biayaError"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#alatTable').DataTable({
                "dom": '<"d-flex justify-content-between align-items-center"f>t<"d-flex justify-content-between align-items-center"ip>',
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                },
            });
        });

        function validateAddForm(event) {
            let isValid = true;

            const errorElements = document.querySelectorAll('.text-danger');
            errorElements.forEach(el => el.classList.add('d-none'));

            const namaAlat = document.getElementById('addNamaAlat').value.trim();
            const kapasitas = document.getElementById('addKapasitas').value.trim();
            const hargaSewa = document.getElementById('addHargaSewa').value.trim();
            const statusKetersediaan = document.getElementById('addStatusKetersediaan').value.trim();
            const tahunPembuatan = document.getElementById('addTahunPembuatan').value.trim();
            const lokasi = document.getElementById('addLokasi').value.trim();
            const deskripsi = document.getElementById('addDeskripsi').value.trim();

            if (!namaAlat) {
                isValid = false;
                document.getElementById('addNamaAlatError').classList.remove('d-none');
                document.getElementById('addNamaAlatError').textContent = "Nama alat tidak boleh kosong.";
            }
            if (!kapasitas) {
                isValid = false;
                document.getElementById('addKapasitasError').classList.remove('d-none');
                document.getElementById('addKapasitasError').textContent = "Kapasitas tidak boleh kosong.";
            }
            if (!hargaSewa) {
                isValid = false;
                document.getElementById('addHargaSewaError').classList.remove('d-none');
                document.getElementById('addHargaSewaError').textContent = "Harga sewa tidak boleh kosong.";
            }
            if (!statusKetersediaan) {
                isValid = false;
                document.getElementById('addStatusKetersediaanError').classList.remove('d-none');
                document.getElementById('addStatusKetersediaanError').textContent = "Status ketersediaan harus dipilih.";
            }
            if (!tahunPembuatan) {
                isValid = false;
                document.getElementById('addTahunPembuatanError').classList.remove('d-none');
                document.getElementById('addTahunPembuatanError').textContent = "Tahun pembuatan tidak boleh kosong.";
            }
            if (!lokasi) {
                isValid = false;
                document.getElementById('addLokasiError').classList.remove('d-none');
                document.getElementById('addLokasiError').textContent = "Lokasi tidak boleh kosong.";
            }
            if (!deskripsi) {
                isValid = false;
                document.getElementById('addDeskripsiError').classList.remove('d-none');
                document.getElementById('addDeskripsiError').textContent = "Deskripsi tidak boleh kosong.";
            }

            if (!isValid) {
                event.preventDefault();
            }
            return isValid;
        }

        function validateEditForm(event) {
            let isValid = true;

            const errorElements = document.querySelectorAll('.text-danger');
            errorElements.forEach(el => el.classList.add('d-none'));

            const namaAlat = document.getElementById('editNamaAlat').value.trim();
            const kapasitas = document.getElementById('editKapasitas').value.trim();
            const hargaSewa = document.getElementById('editHargaSewa').value.trim();
            const statusKetersediaan = document.getElementById('editStatusKetersediaan').value.trim();
            const tahunPembuatan = document.getElementById('editTahunPembuatan').value.trim();
            const lokasi = document.getElementById('editLokasi').value.trim();
            const deskripsi = document.getElementById('editDeskripsi').value.trim();

            if (!namaAlat) {
                isValid = false;
                document.getElementById('editNamaAlatError').classList.remove('d-none');
                document.getElementById('editNamaAlatError').textContent = "Nama alat tidak boleh kosong.";
            }
            if (!kapasitas) {
                isValid = false;
                document.getElementById('editKapasitasError').classList.remove('d-none');
                document.getElementById('editKapasitasError').textContent = "Kapasitas tidak boleh kosong.";
            }
            if (!hargaSewa) {
                isValid = false;
                document.getElementById('editHargaSewaError').classList.remove('d-none');
                document.getElementById('editHargaSewaError').textContent = "Harga sewa tidak boleh kosong.";
            }
            if (!statusKetersediaan) {
                isValid = false;
                document.getElementById('editStatusKetersediaanError').classList.remove('d-none');
                document.getElementById('editStatusKetersediaanError').textContent = "Status ketersediaan harus dipilih.";
            }
            if (!tahunPembuatan) {
                isValid = false;
                document.getElementById('editTahunPembuatanError').classList.remove('d-none');
                document.getElementById('editTahunPembuatanError').textContent = "Tahun pembuatan tidak boleh kosong.";
            }
            if (!lokasi) {
                isValid = false;
                document.getElementById('editLokasiError').classList.remove('d-none');
                document.getElementById('editLokasiError').textContent = "Lokasi tidak boleh kosong.";
            }
            if (!deskripsi) {
                isValid = false;
                document.getElementById('editDeskripsiError').classList.remove('d-none');
                document.getElementById('editDeskripsiError').textContent = "Deskripsi tidak boleh kosong.";
            }

            if (!isValid) {
                event.preventDefault();
            }
            return isValid;
        }

        function validateMaintenanceForm(event) {
            let isValid = true;

            const errorElements = document.querySelectorAll('.text-danger');
            errorElements.forEach(el => el.classList.add('d-none'));

            const namaAlat = document.getElementById('alat_id').value.trim();
            const tglServis = document.getElementById('tgl_servis').value.trim();
            const deskripsi = document.getElementById('deskripsi').value.trim();
            const biaya = document.getElementById('biaya_servis').value.trim();

            if (!namaAlat) {
                isValid = false;
                document.getElementById('alatIdError').classList.remove('d-none');
                document.getElementById('alatIdError').textContent = "Alat harus dipilih.";
            }
            if (!tglServis) {
                isValid = false;
                document.getElementById('tglServisError').classList.remove('d-none');
                document.getElementById('tglServisError').textContent = "Tanggal servis tidak boleh kosong.";
            }
            if (!deskripsi) {
                isValid = false;
                document.getElementById('deskripsiError').classList.remove('d-none');
                document.getElementById('deskripsiError').textContent = "Deskripsi tidak boleh kosong.";
            }
            if (!biaya) {
                isValid = false;
                document.getElementById('biayaError').classList.remove('d-none');
                document.getElementById('biayaError').textContent = "Biaya servis tidak boleh kosong.";
            }

            if (!isValid) {
                event.preventDefault();
            }
            return isValid;
        }
    </script>
@endsection
