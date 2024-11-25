<div class="container my-5">
  <h1 class="text-center mb-5" style="font-weight: 600; letter-spacing: 8px;">Pembayaran</h1>

  <?php if ($this->session->flashdata('message')): ?>
  <div class="alert alert-warning">
    <?= $this->session->flashdata('message'); ?>
  </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form action="<?= site_url('pembayaran/lanjut_pembayaran') ?>" method="post">
        <!-- Email Pengguna -->
        <div class="form-group mb-3">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" class="form-control" value="<?= $user_email ?>" readonly>
        </div>

        <!-- Pilihan Metode Pembayaran -->
        <div class="form-group mb-3">
          <label for="metode_pembayaran">Metode Pembayaran:</label>
          <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" required>
            <option value="" disabled selected>Pilih metode pembayaran</option>
            <option value="transfer_bank">Transfer Bank</option>
            <option value="e_wallet">E-Wallet</option>
            <option value="kartu_kredit">Kartu Kredit</option>
          </select>
        </div>

        <!-- Bank Options (Transfer Bank) -->
        <div id="bank-options" class="form-group mb-3" style="display: none;">
          <label>Pilih Bank:</label>
          <div>
            <label>
              <input type="radio" name="bank" value="bca"> BCA
            </label>
          </div>
          <div>
            <label>
              <input type="radio" name="bank" value="mandiri"> Mandiri
            </label>
          </div>
          <div>
            <label>
              <input type="radio" name="bank" value="bni"> BNI
            </label>
          </div>
          <div>
            <label>
              <input type="radio" name="bank" value="bri"> BRI
            </label>
          </div>
        </div>

        <!-- E-Wallet Options -->
        <div id="e_wallet-options" class="form-group mb-3" style="display: none;">
          <label>Pilih E-Wallet:</label>
          <div>
            <label>
              <input type="radio" name="e_wallet" value="ovo"> OVO
            </label>
          </div>
          <div>
            <label>
              <input type="radio" name="e_wallet" value="gopay"> GoPay
            </label>
          </div>
          <div>
            <label>
              <input type="radio" name="e_wallet" value="dana"> DANA
            </label>
          </div>
        </div>

        <!-- Kartu Kredit Options -->
        <div id="kartu-kredit-options" class="form-group mb-3" style="display: none;">
          <label>Pilih Kartu Kredit:</label>
          <div>
            <label>
              <input type="radio" name="kartu_kredit" value="visa"> Visa
            </label>
          </div>
          <div>
            <label>
              <input type="radio" name="kartu_kredit" value="mastercard"> MasterCard
            </label>
          </div>
        </div>

        <!-- Total Harga -->
        <p class="text-right my-4">Total Pembayaran
          <strong style="font-size: 24px;">Rp <?= number_format($total_harga, 0, ',', '.') ?></strong>
        </p>

        <!-- Button di Kanan -->
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Lanjutkan Pembayaran</button>
        </div>
      </form>
    </div>
  </div>
</div>