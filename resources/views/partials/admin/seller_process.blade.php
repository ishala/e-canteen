<div class="input-teks">
    <label for="input-nama" class="fw-semibold">Nama Toko</label><br>
    <input type="text" id="input-nama" name="text-input" class="p-2" placeholder="Masukkan nama mitra...">
</div>
<div class="input-teks">
    <label for="input-nama" class="fw-semibold mt-2">Nama Pemilik</label><br>
    <input type="text" id="input-nama" name="text-input" class="p-2"
        value="{{ $title == 'Edit Mitra' ? '$seller->name' : '' }}" placeholder="Masukkan nama pemilik...">
</div>
<div class="input-teks">
    <label for="input-nama" class="fw-semibold mt-2">Email</label><br>
    <input type="email" id="input-nama" name="text-input" class="p-2"
        value="{{ $title == 'Edit Mitra' ? '$seller->email' : '' }}" placeholder="Masukkan email...">
</div>
<div class="input-teks">
    <label for="input-nama" class="fw-semibold mt-2">Password</label><br>
    <input type="password" id="input-nama" name="text-input" class="p-2"
        value="{{ $title == 'Edit Mitra' ? '$seller->password' : '' }}" placeholder="Masukkan password...">
</div>
<div class="input-teks">
    <label for="input-nama" class="fw-semibold mt-2">Nomor Telepon</label><br>
    <input type="text" id="input-nama" name="text-input" class="p-2"
        value="{{ $title == 'Edit Mitra' ? '' : '' }}" placeholder="Masukkan nomor telepon...">
</div>
<div class="input-teks">
    <label for="input-nama" class="fw-semibold mt-2">Waktu Sewa</label><br>
    <input type="text" id="input-nama" name="text-input" class="p-2"
        value="{{ $title == 'Edit Mitra' ? '$seller->rent' : '' }}" placeholder="Masukkan lama waktu...">
</div>

<div class="d-flex rounded-5 justify-content-center">
    <button type="submit" class="text-white mt-5 mb-3 fs-4" name="submit"
        id="{{ $title == 'Tambah Mitra' ? 'submit' : 'save' }}">Simpan</button>
</div>

<div class="d-flex rounded-5 justify-content-center">
    <button type="submit" class="text-white mt-5 mb-3 fs-4" name="submit" id="save">Simpan</button>
</div>