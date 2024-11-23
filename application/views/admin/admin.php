<div class="container my-5 admin_dash">
  <h1 class="text-center text-uppercase mb-5" style="font-weight: 600; letter-spacing: 8px;">Admin Dashboard</h1>

  <!-- Resep Section -->
  <div class="mt-5">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h4 class="text-uppercase" style="font-weight: 600;">Resep</h4>
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addResepModal">
        <i class="fas fa-plus"></i> Tambah Resep
      </a>
    </div>
    <!-- Scrollable list-group -->
    <div class="list-group" style="max-height: 300px;">
      <?php foreach ($resep as $item): ?>
      <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-1" style="font-weight: 600;"><?= $item->nama_resep ?></h5>
          <p class="mb-1"><?= substr($item->deskripsi, 0, 100) ?>...</p>
          <small>ID: <?= $item->id ?> | Negara: <?= $item->negara ?></small>
        </div>
        <div>
          <img src="<?= base_url('assets/img/upload/' . $item->gambar) ?>" alt="gambar resep" width="50">
          <!-- Tombol Edit untuk Resep -->
          <a href="#" class="btn btn-warning btn-sm ml-2" data-toggle="modal" data-target="#editResepModal"
            data-id="<?= $item->id ?>" data-nama_resep="<?= $item->nama_resep ?>" data-negara="<?= $item->negara ?>"
            data-deskripsi="<?= $item->deskripsi ?>" data-bahan="<?= $item->bahan ?>"
            data-langkah="<?= $item->langkah ?>" data-video_url="<?= $item->video_url ?>"
            data-gambar="<?= $item->gambar ?>">
            <i class="fas fa-edit"></i>
          </a>
          <a href="<?= site_url('Admin/hapus_resep/' . $item->id) ?>" class="btn btn-danger btn-sm ml-2">
            <i class="fas fa-trash"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>

  <!-- Kelas Section -->
  <div class="mt-5">
    <div class="d-flex justify-content-between align-items-center my-2">
      <h4 class="text-uppercase" style="font-weight: 600;">Kelas</h4>
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addKelasModal">
        <i class="fas fa-plus"></i> Tambah Kelas
      </a>
    </div>
    <!-- Scrollable list-group -->
    <div class="list-group" style="max-height: 300px;">
      <?php foreach ($kelas as $item): ?>
      <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-1" style="font-weight: 600;"><?= $item->nama_kelas ?></h5>
          <p class=" mb-1"><?= substr($item->deskripsi, 0, 100) ?>...</p>
          <small>ID: <?= $item->id ?> | Harga: <?= $item->harga ?> | Status: <?= ucfirst($item->status_kelas) ?></small>
        </div>
        <div>
          <img src="<?= base_url('assets/img/upload/' . $item->gambar) ?>" alt="gambar kelas" width="50">
          <!-- Tombol Edit untuk Kelas -->
          <a href="#" class="btn btn-warning btn-sm ml-2" data-toggle="modal" data-target="#editKelasModal"
            data-id="<?= $item->id ?>" data-nama_kelas="<?= $item->nama_kelas ?>"
            data-deskripsi="<?= $item->deskripsi ?>" data-harga="<?= $item->harga ?>"
            data-status_kelas="<?= $item->status_kelas ?>" data-status="<?= $item->status ?>"
            data-gambar="<?= $item->gambar ?>">
            <i class="fas fa-edit"></i>
          </a>
          <a href="<?= site_url('Admin/hapus_kelas/' . $item->id) ?>" class="btn btn-danger btn-sm ml-2">
            <i class="fas fa-trash"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
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

  <!-- Modal Edit Resep -->
  <div class="modal fade" id="editResepModal" tabindex="-1" role="dialog" aria-labelledby="editResepModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editResepModalLabel">Edit Resep</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= site_url('Admin/update_resep/') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="id" id="resep_id">

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
              <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>

            <div class="form-group">
              <label for="bahan">Bahan</label>
              <textarea class="form-control" id="bahan" name="bahan" required></textarea>
            </div>

            <div class="form-group">
              <label for="langkah">Langkah</label>
              <textarea class="form-control" id="langkah" name="langkah" required></textarea>
            </div>

            <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" class="form-control-file" id="gambar" name="gambar">
              <input type="hidden" id="gambar_lama" name="gambar_lama">
            </div>

            <div class="form-group">
              <label for="video_url">Video URL</label>
              <input type="text" class="form-control" id="video_url" name="video_url">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
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
</div>

<!-- Modal Edit Kelas -->
<div class="modal fade" id="editKelasModal" tabindex="-1" role="dialog" aria-labelledby="editKelasModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKelasModalLabel">Edit Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('Admin/update_kelas/') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id" id="kelas_id">

          <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
          </div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
          </div>

          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
          </div>

          <div class="form-group">
            <label for="status_kelas">Status Kelas</label>
            <input type="text" class="form-control" id="status_kelas" name="status_kelas" required>
          </div>

          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
          </div>

          <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            <input type="hidden" id="gambar_lama" name="gambar_lama">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>