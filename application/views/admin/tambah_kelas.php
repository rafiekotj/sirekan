<div class="container my-5">
  <h1 class="text-center text-uppercase mb-5" style="font-weight: 600; letter-spacing: 8px;">Tambah Kelas</h1>

  <form action="<?= site_url('admin/tambah_kelas') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nama_kelas">Nama Kelas</label>
      <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
    </div>

    <div class="form-group">
      <label for="gambar">Gambar Kelas</label>
      <input type="file" class="form-control-file" id="gambar" name="gambar">
    </div>

    <div class="form-group">
      <label for="instruktur">Instruktur</label>
      <input type="text" class="form-control" id="instruktur" name="instruktur" required>
    </div>

    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
    </div>

    <div class="form-group">
      <label for="tanggal_mulai">Tanggal Mulai</label>
      <input type="datetime-local" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
    </div>

    <div class="form-group">
      <label for="harga">Harga</label>
      <input type="number" class="form-control" id="harga" name="harga" step="0.01" required>
    </div>

    <div class="form-group">
      <label for="bahan_bahan">Bahan-Bahan</label>
      <textarea class="form-control" id="bahan_bahan" name="bahan_bahan" rows="3" required></textarea>
      <small class="form-text text-muted">Masukkan bahan-bahan yang diperlukan, pisahkan dengan koma (,).</small>
    </div>

    <div class="form-group">
      <label for="alat_alat">Alat-Alat</label>
      <textarea class="form-control" id="alat_alat" name="alat_alat" rows="3" required></textarea>
      <small class="form-text text-muted">Masukkan alat-alat yang diperlukan, pisahkan dengan koma (,).</small>
    </div>

    <div class="form-group">
      <label for="kategori">Kategori</label>
      <input type="text" class="form-control" id="kategori" name="kategori" required>
    </div>

    <div class="form-group">
      <label for="status_kelas">Status Kelas</label>
      <select class="form-control" id="status_kelas" name="status_kelas" required>
        <option value="belum mulai">Belum Mulai</option>
        <option value="mulai">Mulai</option>
        <option value="sudah selesai">Sudah Selesai</option>
      </select>
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" id="status" name="status" required>
        <option value="aktif">Aktif</option>
        <option value="tidak_aktif">Tidak Aktif</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('admin/kelas') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>