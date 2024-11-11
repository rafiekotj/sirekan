<div class="container my-5">
  <h2 class="mb-5 text-center"><?= $kelas_item->nama_kelas ?></h2>

  <div class="row">
    <div class="col-md-6">
      <!-- Gambar Kelas -->
      <img src="<?= base_url('assets/img/upload/' . $kelas_item->gambar) ?>" class="img-fluid"
        alt="<?= $kelas_item->nama_kelas ?>">
    </div>
    <div class="col-md-6">
      <p><strong>Deskripsi:</strong></p>
      <p><?= $kelas_item->deskripsi ?></p>
      <p><strong>Harga:</strong> Rp <?= number_format($kelas_item->harga, 2, ',', '.') ?></p>

      <!-- Masukkan ke Keranjang Button -->
      <a href="<?= site_url('keranjang/add_to_cart/' . $kelas_item->id) ?>" class="btn btn-primary">Masukkan ke
        Keranjang</a>
    </div>
  </div>
</div>