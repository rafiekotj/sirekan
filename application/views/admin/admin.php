<div class="container my-5 admin_dash">
  <h1 class="text-center text-uppercase mb-5" style="font-weight: 600; letter-spacing: 8px;">admin Dashboard</h1>

  <!-- Resep Section -->
  <div class="mt-5">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h4 class="text-uppercase" style="font-weight: 600;">Resep</h4>
      <a href="<?= site_url('admin/tambah_resep') ?>" class="btn btn-primary">
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
          <a href="<?= site_url('admin/edit_resep/' . $item->id) ?>" class="btn btn-warning btn-sm ml-2">
            <i class="fas fa-edit"></i>
          </a>
          <a href="<?= site_url('admin/hapus_resep/' . $item->id) ?>" class="btn btn-danger btn-sm ml-2">
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
      <a href="<?= site_url('admin/tambah_kelas') ?>" class="btn btn-primary">
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
          <a href="<?= site_url('admin/edit_kelas/' . $item->id) ?>" class="btn btn-warning btn-sm ml-2">
            <i class="fas fa-edit"></i>
          </a>
          <a href="<?= site_url('admin/hapus_kelas/' . $item->id) ?>" class="btn btn-danger btn-sm ml-2">
            <i class="fas fa-trash"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>