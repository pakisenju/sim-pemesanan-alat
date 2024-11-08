<div class="mb-3">
    <label for="addNamaAlat" class="form-label">Nama Alat</label>
    <input type="text" class="form-control" id="addNamaAlat" name="nama_alat">
    <div class="mt-1 text-danger d-none" id="addNamaAlatError"></div>
</div>

<div class="mb-3">
    <label for="addThumbnail" class="form-label">Thumbnail</label>
    <input type="file" class="form-control" id="addThumbnail" name="thumbnail">
</div>

<div class="mb-3">
    <label for="addKapasitas" class="form-label">Kapasitas</label>
    <input type="text" class="form-control" id="addKapasitas" name="kapasitas">
    <div class="mt-1 text-danger d-none" id="addKapasitasError"></div>
</div>

<div class="mb-3">
    <label for="addHargaSewa" class="form-label">Harga Sewa (Per jam)</label>
    <input type="number" class="form-control" id="addHargaSewa" name="harga_sewa">
    <div class="mt-1 text-danger d-none" id="addHargaSewaError"></div>
</div>

<div class="mb-3">
    <label for="addStatusKetersediaan" class="form-label">Status Ketersediaan</label>
    <select class="form-select" id="addStatusKetersediaan" name="status_ketersediaan">
        <option value="Tersedia">Tersedia</option>
        <option value="Disewakan">Disewakan</option>
        <option value="Maintenance">Maintenance</option>
    </select>
    <div class="mt-1 text-danger d-none" id="addStatusKetersediaanError"></div>
</div>

<div class="mb-3">
    <label for="addTahunPembuatan" class="form-label">Tahun Pembuatan</label>
    <input type="text" class="form-control" id="addTahunPembuatan" name="tahun_pembuatan">
    <div class="mt-1 text-danger d-none" id="addTahunPembuatanError"></div>
</div>

<div class="mb-3">
    <label for="addLokasi" class="form-label">Lokasi</label>
    <input type="text" class="form-control" id="addLokasi" name="lokasi">
    <div class="mt-1 text-danger d-none" id="addLokasiError"></div>
</div>

<div class="mb-3">
    <label for="addDeskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="addDeskripsi" name="deskripsi" rows="3"></textarea>
    <div class="mt-1 text-danger d-none" id="addDeskripsiError"></div>
</div>
