<div class="container my-5">
  <h2 class="text-center text-uppercase mb-5" style="font-weight: 600; letter-spacing: 8px;">Detail Pembayaran</h2>
  <div class="alert alert-success">
    Pembayaran Anda telah berhasil diproses. Terima kasih telah melakukan pembelian!
  </div>

  <div class="card my-4">
    <div class="card-body">
      <p><strong>Tanggal Pembayaran:</strong> <?= date('d M Y, H:i', strtotime($pembayaran['tanggal_pembayaran'])) ?>
      </p>
      <p><strong>Metode Pembayaran:</strong> <?= ucfirst(str_replace('_', ' ', $pembayaran['metode_pembayaran'])) ?></p>
      <p><strong>Status Pembayaran:</strong> <?= ucfirst($pembayaran['status_pembayaran']) ?></p>
    </div>
  </div>

  <div class="text-right">
    <a href="<?= site_url('home') ?>" class="btn btn-primary sukses_button">Kembali ke Beranda</a>
  </div>
</div>