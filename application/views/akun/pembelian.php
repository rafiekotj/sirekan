<div class="container my-5 riwayat_bayar">
  <h2 class="text-center mb-5" style="font-weight: 600; letter-spacing: 8px;">Riwayat Pembelian</h2>
  <a href="<?= site_url('home') ?>" class="btn btn-primary">Kembali</a>
  <hr>
  <table class="table table-bordered fixed-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Tanggal Pembelian</th>
        <th>Total Harga</th>
        <th>Status Pembayaran</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($riwayat_pembelian)): ?>
      <tr>
        <td colspan="5" class="text-center">Tidak ada riwayat pembelian.</td>
      </tr>
      <?php else: ?>
      <?php foreach ($riwayat_pembelian as $index => $pembelian): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= htmlentities($pembelian->nama_kelas) ?></td>
        <td><?= date('d-m-Y H:i', strtotime($pembelian->tanggal_pembelian)) ?></td>
        <td>Rp <?= number_format($pembelian->total_harga, 2, ',', '.') ?></td>
        <td>
          <?php if ($pembelian->status_pembayaran == 'sudah_bayar'): ?>
          <span class="badge badge-success">Sudah Bayar</span>
          <?php elseif ($pembelian->status_pembayaran == 'pending'): ?>
          <span class="badge badge-warning">Pending</span>
          <?php else: ?>
          <span class="badge badge-danger">Gagal</span>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>