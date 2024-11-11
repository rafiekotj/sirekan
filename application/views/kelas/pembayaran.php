<div class="container my-4">
  <h2 class="text-center mb-4">Pembayaran</h2>

  <?php if ($this->session->flashdata('message')): ?>
  <div class="alert alert-warning">
    <?= $this->session->flashdata('message'); ?>
  </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h5>Total Harga: Rp <?= number_format($total_harga, 0, ',', '.') ?></h5>

      <!-- Link untuk lanjut pembayaran -->
      <a href="<?= site_url('pembayaran/lanjut_pembayaran') ?>" class="btn btn-primary">Lanjutkan Pembayaran</a>
    </div>
  </div>
</div>