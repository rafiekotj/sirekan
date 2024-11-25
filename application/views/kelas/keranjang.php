<div class="container my-5 keranjang">
  <?php if ($this->session->flashdata('message')): ?>
  <div class="alert alert-warning">
    <?= $this->session->flashdata('message'); ?>
  </div>
  <?php endif; ?>

  <h1 class="text-center mb-5" style="font-weight: 600; letter-spacing: 8px;">Keranjang Kelas</h1>

  <div class="mt-4 d-flex justify-content-between">
    <a href="<?= site_url('kelas') ?>" class="btn btn-secondary ms-2">Kembali</a>
    <a href="<?= site_url('keranjang/clear_cart') ?>" class="btn btn-danger">Hapus Semua</a>
  </div>
  <hr>

  <?php if (isset($items) && !empty($items)): ?>
  <?php
    $total_harga = 0;
    foreach ($items as $item) {
      $total_harga += $item->harga * $item->jumlah;
    }
    ?>

  <ul class="list-unstyled">
    <?php foreach ($items as $item): ?>
    <li class="card mb-1 border">
      <div class="card-body d-flex align-items-center p-1">
        <!-- Image Column -->
        <div class="mr-3">
          <img src="<?= base_url('assets/img/upload/' . $item->gambar) ?>" alt="Class Image" class="img-fluid"
            style="width: 100px; height: 100px; object-fit: cover;">
        </div>
        <!-- Details Column -->
        <div class="flex-grow-1">
          <h5 class="card-title mb-1"><?= $item->nama_kelas ?></h5>
          <p class="card-text mb-1">Harga: Rp <?= number_format($item->harga, 0, ',', '.') ?></p>
          <p class="card-text mb-1">Jumlah: <?= $item->jumlah ?></p>
        </div>
        <!-- Action Button -->
        <div>
          <a href="<?= site_url('keranjang/delete/' . $item->id) ?>" class="btn btn-danger btn-sm mr-3"
            onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
        </div>
      </div>
    </li>
    <?php endforeach; ?>
  </ul>

  <!-- Total Harga -->
  <div class="text-right my-4">
    <h5>Total Harga: Rp <?= number_format($total_harga, 0, ',', '.') ?></h5>
  </div>

  <!-- Tombol Lanjut Pembayaran -->
  <div class="text-right mt-2">
    <a href="<?= site_url('pembayaran') ?>" class="btn btn-primary">Lanjut Pembayaran</a>
  </div>

  <?php else: ?>
  <p>Keranjang Anda kosong.</p>
  <?php endif; ?>

</div>