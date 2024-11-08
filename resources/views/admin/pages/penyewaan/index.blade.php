@extends('admin.layouts.app')
@section('title', 'Daftar Alat Berat')
@section('style')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h3 class="fw-semibold m-0">Penyewaan Alat Berat</h3>
            @role(['Pimpinan', 'Karyawan'])
                <a class="btn btn-primary" href="">Daftar Penyewaan</a>
            @endrole
        </div>

        <div class="row">
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
                                <small class="fw-bold fs-3 {{ $alat->status_ketersediaan === 'Tersedia' ? 'text-success' : 'text-danger' }}">
                                    {{ $alat->status_ketersediaan }}
                                </small>
                            </p>
                            <p class="card-text"><strong>Lokasi:</strong> {{ $alat->lokasi }}</p>
                            <p class="card-text"><strong>Tahun Pembuatan:</strong> {{ $alat->tahun_pembuatan }}</p>
                            <p class="card-text">{{ Str::limit($alat->deskripsi, 100) }}</p>

                            @if ($alat->status_ketersediaan === 'Tersedia')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#rentalModal" onclick="setAlatId({{ $alat->id }})">
                                    Sewa Alat Ini
                                </button>
                            @else
                                <button type="button" class="btn btn-outline-dark" disabled>
                                    Tidak Tersedia
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Rental Modal -->
    <div class="modal fade" id="rentalModal" tabindex="-1" aria-labelledby="rentalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rentalModalLabel">Form Penyewaan Alat Berat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="rentalForm" action="{{ route('penyewaan.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="alat_id" id="alat_id">

                        <div class="mb-3">
                            <label for="tgl_sewa" class="form-label">Tanggal dan Waktu Mulai:</label>
                            <input type="datetime-local" name="tgl_sewa" id="tgl_sewa" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_kembali" class="form-label">Tanggal dan Waktu Selesai:</label>
                            <input type="datetime-local" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_harga" class="form-label">Total Harga (Per Jam):</label>
                            <input type="text" id="total_harga_display" class="form-control" readonly>
                            <small class="text-muted">Total harga akan otomatis dihitung berdasarkan durasi sewa.</small>
                        </div>

                        <div class="mb-1">
                            <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran:</label>
                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control"
                                accept=".jpg,.jpeg,.png,.pdf" required>
                            <small class="text-muted">Format yang didukung: JPG, JPEG, PNG, PDF</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Rekening BRI 123456789012345 a.n. John Doe</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        let hourlyRate = 0;

        function setAlatId(alatId) {
            document.getElementById('alat_id').value = alatId;
            const selectedCard = document.querySelector(`[data-alat-id="${alatId}"]`);
            hourlyRate = parseFloat(selectedCard.dataset.hourlyRate);

            document.getElementById('total_harga_display').value = 'Rp 0';
        }

        function calculateTotalHarga() {
            const tglSewa = document.getElementById('tgl_sewa').value;
            const tglKembali = document.getElementById('tgl_kembali').value;

            if (tglSewa && tglKembali) {
                const start = new Date(tglSewa);
                const end = new Date(tglKembali);

                if (start < end) {
                    const hours = Math.abs(end - start) / 36e5;
                    const totalHarga = Math.ceil(hours) * hourlyRate;

                    document.getElementById('total_harga_display').value =
                        `Rp ${new Intl.NumberFormat('id-ID').format(totalHarga)}`;
                } else {
                    document.getElementById('total_harga_display').value = 'Tanggal akhir harus setelah tanggal mulai!';
                }
            }
        }

        document.getElementById('tgl_sewa').addEventListener('change', calculateTotalHarga);
        document.getElementById('tgl_kembali').addEventListener('change', calculateTotalHarga);
    </script>
@endsection
