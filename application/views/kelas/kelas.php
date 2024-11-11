<div class="container my-4 list_kelas">
  <h2 class="text-center mb-4">Kelas Online</h2>

  <hr>

  <div class="row">
    <?php foreach ($kelas as $kelas_item): ?>
      <div class="col-md-4 mb-4">
        <div class="card">
          <a href="<?= site_url('kelas/detail/' . $kelas_item->id) ?>">
            <!-- Gambar dan konten card -->
            <img src="<?= base_url('assets/img/upload/' . $kelas_item->gambar) ?>" class="card-img-top"
              alt="<?= $kelas_item->nama_kelas ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $kelas_item->nama_kelas ?></h5>
              <p class="card-text"><?= substr($kelas_item->deskripsi, 0, 80) ?>...</p>
            </div>
            <!-- Card footer tetap di bawah body -->
            <div class="card-footer text-right">
              <p class="card-text">Rp <?= number_format($kelas_item->harga, 2, ',', '.') ?></p>
            </div>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Pagination Links -->
  <div class="pagination-wrapper">
    <?= $pagination_links ?>
  </div>
</div>