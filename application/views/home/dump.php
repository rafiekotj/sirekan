$this->load->view('templates/header');
$this->load->view('auth/login');
$this->load->view('templates/footer');

<div class="container mt-5">
  <h2>Keranjang Kelas</h2>
  <?php if (isset($keranjang) && !empty($keranjang)): ?>
    <ul class="list-group">
      <?php foreach ($keranjang as $item): ?>
        <li class="list-group-item">
          <h5><?= $item->nama_kelas ?></h5>
          <p>Harga: Rp <?= number_format($item->harga, 2, ',', '.') ?></p>
          <p>Jumlah: <?= $item->jumlah ?></p>
          <a href="<?= site_url('keranjang/remove_from_cart/' . $item->id) ?>" class="btn btn-danger">Hapus</a>
        </li>
      <?php endforeach; ?>
    </ul>
    <a href="<?= site_url('keranjang/clear_cart') ?>" class="btn btn-warning mt-4">Hapus Semua</a>
  <?php else: ?>
    <p>Keranjang Anda kosong.</p>
  <?php endif; ?>

  <!-- Tombol Kembali yang Mengarah ke Halaman Kelas -->
  <a href="<?= site_url('kelas') ?>" class="btn btn-secondary mt-4">Kembali ke Kelas</a>
</div>