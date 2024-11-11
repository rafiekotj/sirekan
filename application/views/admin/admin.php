<div class="container my-4 admin_dash">
  <h2 class="text-center mb-4">Admin Dashboard</h2>

  <!-- Kelas Section -->
  <div class="mt-5">
    <div class="d-flex justify-content-between align-items-center my-2">
      <h4>Kelas</h4>
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addKelasModal">Tambah Kelas</a>
    </div>
    <!-- Scrollable list-group -->
    <div class="list-group" style="max-height: 300px; overflow-y: auto;">
      <?php foreach ($kelas as $item): ?>
      <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-1"><?= $item->nama_kelas ?></h5>
          <p class="mb-1"><?= substr($item->deskripsi, 0, 100) ?>...</p>
          <small>Harga: <?= $item->harga ?> | Status: <?= ucfirst($item->status_kelas) ?></small>
        </div>
        <div>
          <a href="<?= base_url('assets/img/upload/' . $item->gambar) ?>" target="_blank">
            <img src="<?= base_url('assets/img/upload/' . $item->gambar) ?>" alt="gambar kelas" class="img-thumbnail"
              width="50">
          </a>
          <a href="<?= site_url('Admin/hapus_kelas/' . $item->id) ?>" class="btn btn-danger btn-sm ml-2">Hapus</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Resep Section -->
  <div class="mt-5">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h4>Resep</h4>
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addResepModal">Tambah Resep</a>
    </div>
    <!-- Scrollable list-group -->
    <div class="list-group" style="max-height: 300px; overflow-y: auto;">
      <?php foreach ($resep as $item): ?>
      <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-1"><?= $item->nama_resep ?></h5>
          <p class="mb-1"><?= substr($item->deskripsi, 0, 100) ?>...</p>
          <small>Negara: <?= $item->negara ?></small>
        </div>
        <div>
          <a href="<?= base_url('assets/img/upload/' . $item->gambar) ?>" target="_blank">
            <img src="<?= base_url('assets/img/upload/' . $item->gambar) ?>" alt="gambar resep" class="img-thumbnail"
              width="50">
          </a>
          <a href="<?= site_url('Admin/hapus_resep/' . $item->id) ?>" class="btn btn-danger btn-sm ml-2">Hapus</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Modal Add Kelas -->
  <div class="modal fade" id="addKelasModal" tabindex="-1" role="dialog" aria-labelledby="addKelasModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKelasModalLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= site_url('Admin/tambah_kelas') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_kelas">Nama Kelas</label>
              <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
              <label for="gambar">Gambar Kelas</label>
              <input type="file" class="form-control-file" id="gambar" name="gambar">
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Add Resep -->
  <div class="modal fade" id="addResepModal" tabindex="-1" role="dialog" aria-labelledby="addResepModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addResepModalLabel">Tambah Resep</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= site_url('Admin/tambah_resep') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_resep">Nama Resep</label>
              <input type="text" class="form-control" id="nama_resep" name="nama_resep" required>
            </div>
            <div class="form-group">
              <label for="negara">Negara</label>
              <input type="text" class="form-control" id="negara" name="negara" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="bahan">Bahan</label>
              <textarea class="form-control" id="bahan" name="bahan" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="langkah">Langkah</label>
              <textarea class="form-control" id="langkah" name="langkah" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="gambar">Gambar Resep</label>
              <input type="file" class="form-control-file" id="gambar" name="gambar">
            </div>
            <div class="form-group">
              <label for="video_url">URL Video</label>
              <input type="url" class="form-control" id="video_url" name="video_url">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>