<div class="container my-5 list_kelas">
  <h1 class="text-center mb-5" style="font-weight: 600; letter-spacing: 8px;">KELAS ONLINE</h1>

  <!-- Search Bar and Filter -->
  <form class="form-inline justify-content-end" method="get" action="<?php echo site_url('kelas'); ?>">
    <div class="form-group mr-2">
      <input type="text" name="search" class="form-control" placeholder="Cari kelas..."
        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    </div>
    <div class="form-group mr-2">
      <select name="kategori" class="form-control">
        <option value="">Semua Kategori</option>
        <?php foreach ($categories as $category): ?>
        <option value="<?= $category->kategori; ?>"
          <?= isset($_GET['kategori']) && $_GET['kategori'] == $category->kategori ? 'selected' : ''; ?>>
          <?= $category->kategori; ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
  </form>

  <hr>

  <div class="row">
    <?php foreach ($kelas as $kelas_item): ?>
    <div class="col-md-4 mb-4">
      <div class="card">
        <a href="<?= site_url('kelas/detail/' . $kelas_item->id) ?>">
          <!-- Gambar Kelas dengan Position Relative -->
          <div class="position-relative">
            <img src="<?= base_url('assets/img/upload/' . $kelas_item->gambar) ?>" class="card-img-top"
              alt="<?= $kelas_item->nama_kelas ?>">

            <!-- Badge Status di Kanan Atas Gambar -->
            <div class="position-absolute">
              <?php
                // Menentukan status kelas berdasarkan waktu
                $current_time = date('Y-m-d H:i');
                $start_time = date('Y-m-d H:i', strtotime($kelas_item->tanggal_mulai));
                $status_class = '';
                $status_text = '';

                // Menentukan status berdasarkan status_kelas dan waktu
                if ($kelas_item->status_kelas == 'belum mulai' && $current_time < $start_time) {
                  $status_class = 'badge badge-secondary'; // Badge untuk "Belum Mulai"
                  $status_text = 'Belum Mulai';
                } elseif ($kelas_item->status_kelas == 'mulai' && $current_time >= $start_time) {
                  $status_class = 'badge badge-success'; // Badge untuk "Mulai"
                  $status_text = 'Mulai';
                } elseif ($kelas_item->status_kelas == 'selesai' || $current_time > $start_time) {
                  $status_class = 'badge badge-danger'; // Badge untuk "Selesai"
                  $status_text = 'Selesai';
                }
                ?>
              <span class="<?= $status_class ?>"><?= $status_text ?></span>
            </div>
          </div>

          <div class="card-body">
            <h5 class="card-title" style="font-weight: 600;"><?= $kelas_item->nama_kelas ?></h5>
            <p class="card-text"><?= substr($kelas_item->deskripsi, 0, 80) ?>...</p>

            <!-- Informasi Instruktur dan Tanggal Mulai -->
            <p class="card-text"><strong>Instruktur:</strong> <?= $kelas_item->instruktur ?></p>
            <p class="card-text"><strong>Mulai:</strong>
              <?= date('l, d M Y, H:i', strtotime($kelas_item->tanggal_mulai)) ?>
              WIB
            </p>
          </div>

          <div class="card-footer text-right">
            <p class="card-text" style="font-weight: 600;">Rp <?= number_format($kelas_item->harga, 2, ',', '.') ?></p>
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