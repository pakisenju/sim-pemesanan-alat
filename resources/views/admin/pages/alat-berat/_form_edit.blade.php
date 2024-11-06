<div class="mb-3">
    <label for="editNamaAlat" class="form-label">Nama Alat</label>
    <input type="text" class="form-control" id="editNamaAlat" name="nama_alat" value="{{ $alat->nama_alat }}">
    <div class="mt-1 text-danger d-none" id="editNamaAlatError"></div>
</div>

<div class="mb-3">
    <label for="editThumbnail" class="form-label">Thumbnail</label>
    <input type="file" class="form-control" id="editThumbnail" name="thumbnail">
</div>

<div class="mb-3">
    <label for="editKapasitas" class="form-label">Kapasitas</label>
    <input type="text" class="form-control" id="editKapasitas" name="kapasitas" value="{{ $alat->kapasitas }}">
    <div class="mt-1 text-danger d-none" id="editKapasitasError"></div>
</div>

<div class="mb-3">
    <label for="editHargaSewa" class="form-label">Harga Sewa</label>
    <input type="number" class="form-control" id="editHargaSewa" name="harga_sewa" value="{{ $alat->harga_sewa }}">
    <div class="mt-1 text-danger d-none" id="editHargaSewaError"></div>
</div>

<div class="mb-3">
    <label for="editStatusKetersediaan" class="form-label">Status Ketersediaan</label>
    <select class="form-select" id="editStatusKetersediaan" name="status_ketersediaan">
        <option value="Tersedia" {{ $alat->status_ketersediaan == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
        <option value="Disewakan" {{ $alat->status_ketersediaan == 'Disewakan' ? 'selected' : '' }}>Disewakan</option>
        <option value="Maintenance" {{ $alat->status_ketersediaan == 'Maintenance' ? 'selected' : '' }}>Maintenance
        </option>
    </select>
    <div class="mt-1 text-danger d-none" id="editStatusKetersediaanError"></div>
</div>

<div class="mb-3">
    <label for="editTahunPembuatan" class="form-label">Tahun Pembuatan</label>
    <input type="text" class="form-control" id="editTahunPembuatan" name="tahun_pembuatan"
        value="{{ $alat->tahun_pembuatan }}">
    <div class="mt-1 text-danger d-none" id="editTahunPembuatanError"></div>
</div>

<div class="mb-3">
    <label for="editLokasi" class="form-label">Lokasi</label>
    <input type="text" class="form-control" id="editLokasi" name="lokasi" value="{{ $alat->lokasi }}">
    <div class="mt-1 text-danger d-none" id="editLokasiError"></div>
</div>

<div class="mb-3">
    <label for="editDeskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="editDeskripsi" name="deskripsi" rows="3">{{ $alat->deskripsi }}</textarea>
    <div class="mt-1 text-danger d-none" id="editDeskripsiError"></div>
</div>
