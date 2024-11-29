<div class="container my-5">
  <h2 class="text-center text-uppercase mb-5" style="font-weight: 600; letter-spacing: 8px;">Edit Kelas</h2>
  <form action="<?= site_url('admin/update_kelas') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $kelas->id ?>">
    <input type="hidden" name="gambar_lama" value="<?= $kelas->gambar ?>">

    <!-- Nama Kelas -->
    <div class="form-group">
      <label for="nama_kelas">Nama Kelas</label>
      <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $kelas->nama_kelas ?>"
        required>
    </div>

    <!-- Gambar -->
    <div class="form-group">
      <label for="gambar">Gambar</label>
      <!-- Preview gambar saat ini -->
      <?php if (!empty($kelas->gambar)): ?>
      <div class="mb-3">
        <img src="<?= base_url('assets/img/upload/' . $kelas->gambar) ?>" alt="Kelas" class="img-thumbnail"
          style="max-width: 200px;">
      </div>
      <?php endif; ?>

      <!-- Input untuk upload gambar baru -->
      <input type="file" class="form-control-file" id="gambar" name="gambar">
      <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
    </div>

    <!-- Instruktur -->
    <div class="form-group">
      <label for="instruktur">Instruktur</label>
      <input type="text" class="form-control" id="instruktur" name="instruktur" value="<?= $kelas->instruktur ?>"
        required>
    </div>

    <!-- Deskripsi -->
    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $kelas->deskripsi ?></textarea>
    </div>

    <!-- Tanggal Mulai -->
    <div class="form-group">
      <label for="tanggal_mulai">Tanggal Mulai</label>
      <input type="datetime-local" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
        value="<?= date('Y-m-d\TH:i', strtotime($kelas->tanggal_mulai)) ?>" required>
    </div>

    <!-- Harga -->
    <div class="form-group">
      <label for="harga">Harga</label>
      <input type="number" class="form-control" id="harga" name="harga" value="<?= $kelas->harga ?>" required>
    </div>

    <!-- Bahan-Bahan -->
    <div class="form-group">
      <label for="bahan_bahan">Bahan-Bahan</label>
      <textarea class="form-control" id="bahan_bahan" name="bahan_bahan" required><?= $kelas->bahan_bahan ?></textarea>
      <small class="form-text text-muted">Masukkan bahan-bahan yang diperlukan, pisahkan dengan koma (,).</small>
    </div>

    <!-- Alat-Alat -->
    <div class="form-group">
      <label for="alat_alat">Alat-Alat</label>
      <textarea class="form-control" id="alat_alat" name="alat_alat" required><?= $kelas->alat_alat ?></textarea>
      <small class="form-text text-muted">Masukkan bahan-bahan yang diperlukan, pisahkan dengan koma (,).</small>
    </div>

    <!-- Kategori -->
    <div class="form-group">
      <label for="kategori">Kategori</label>
      <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $kelas->kategori ?>" required>
    </div>

    <!-- Status Kelas -->
    <div class="form-group">
      <label for="status_kelas">Status Kelas</label>
      <select class="form-control" id="status_kelas" name="status_kelas" required>
        <option value="belum mulai" <?= $kelas->status_kelas == 'belum mulai' ? 'selected' : '' ?>>Belum Mulai</option>
        <option value="mulai" <?= $kelas->status_kelas == 'mulai' ? 'selected' : '' ?>>Mulai</option>
        <option value="sudah selesai" <?= $kelas->status_kelas == 'sudah selesai' ? 'selected' : '' ?>>Sudah Selesai
        </option>
      </select>
    </div>

    <!-- Status -->
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" id="status" name="status" required>
        <option value="aktif" <?= $kelas->status == 'aktif' ? 'selected' : '' ?>>Aktif</option>
        <option value="tidak_aktif" <?= $kelas->status == 'tidak_aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>