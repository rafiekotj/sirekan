<div class="container my-5">
  <h1 class="text-center text-uppercase mb-5" style="font-weight: 600; letter-spacing: 8px;">Tambah Resep</h1>

  <form action="<?= site_url('admin/tambah_resep') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nama_resep">Nama Resep</label>
      <input type="text" class="form-control" id="nama_resep" name="nama_resep" required>
    </div>

    <div class="form-group">
      <label for="negara">Negara</label>
      <input type="text" class="form-control" id="negara" name="negara" required>
    </div>

    <div class="form-group">
      <label for="gambar">Gambar Resep</label>
      <input type="file" class="form-control-file" id="gambar" name="gambar">
    </div>

    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
    </div>

    <div class="form-group">
      <label for="bahan">Bahan-Bahan</label>
      <textarea class="form-control" id="bahan" name="bahan" rows="3" required></textarea>
      <small class="form-text text-muted">Masukkan bahan-bahan yang diperlukan, pisahkan dengan koma (,).</small>
    </div>

    <div class="form-group">
      <label for="langkah">Langkah-Langkah</label>
      <textarea class="form-control" id="langkah" name="langkah" rows="3" required></textarea>
      <small class="form-text text-muted">Masukkan langkah-langkah, pisahkan dengan tanda titik (.)</small>
    </div>

    <div class="form-group">
      <label for="video_url">Video Rekomendasi</label>
      <input type="url" class="form-control" id="video_url" name="video_url">
      <small class="form-text text-muted">Masukkan URL video YouTube (opsional).</small>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('admin') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>