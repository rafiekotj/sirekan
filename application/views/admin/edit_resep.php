<div class="container my-5">
  <h2 class="text-center text-uppercase mb-5" style="font-weight: 600; letter-spacing: 8px;">Edit Resep</h2>

  <form action="<?= site_url('admin/update_resep') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $resep->id ?>">
    <input type="hidden" name="gambar_lama" value="<?= $resep->gambar ?>">

    <div class="form-group">
      <label for="nama_resep">Nama Resep</label>
      <input type="text" class="form-control" id="nama_resep" name="nama_resep" value="<?= $resep->nama_resep ?>"
        required>
    </div>

    <div class="form-group">
      <label for="negara">Negara</label>
      <input type="text" class="form-control" id="negara" name="negara" value="<?= $resep->negara ?>" required>
    </div>

    <div class="form-group">
      <label for="gambar">Gambar</label>
      <!-- Preview gambar saat ini -->
      <?php if (!empty($resep->gambar)): ?>
      <div class="mb-3">
        <img src="<?= base_url('assets/img/upload/' . $resep->gambar) ?>" alt="Resep" class="img-thumbnail"
          style="max-width: 200px;">
      </div>
      <?php endif; ?>

      <!-- Input untuk upload gambar baru -->
      <input type="file" class="form-control-file" id="gambar" name="gambar">
      <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
    </div>

    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $resep->deskripsi ?></textarea>
    </div>

    <div class="form-group">
      <label for="bahan">Bahan-Bahan</label>
      <textarea class="form-control" id="bahan" name="bahan" rows="5" required><?= $resep->bahan ?></textarea>
      <small class="form-text text-muted">Masukkan bahan-bahan yang diperlukan, pisahkan dengan koma (,).</small>
    </div>

    <div class="form-group">
      <label for="langkah">Langkah-Langkah</label>
      <textarea class="form-control" id="langkah" name="langkah" rows="5" required><?= $resep->langkah ?></textarea>
      <small class="form-text text-muted">Masukkan langkah-langkah, pisahkan dengan tanda titik (.)</small>
    </div>

    <div class="form-group">
      <label for="video_url">Video Rekomendasi</label>
      <input type="url" class="form-control" id="video_url" name="video_url" value="<?= $resep->video_url ?>">
      <small class="form-text text-muted">Masukkan URL video YouTube (opsional).</small>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>