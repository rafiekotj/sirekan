<div class="container my-5">
  <h1 class="mb-5" style="font-weight: 600;"><?= $kelas_item->nama_kelas ?></h1>

  <div class="row">
    <!-- Gambar Kelas (Sebelah Kiri) -->
    <div class="col-md-8">
      <img src="<?= base_url('assets/img/upload/' . $kelas_item->gambar) ?>" class="img-fluid"
        style="width: 100%; height: 320px; object-fit: cover;" alt="<?= $kelas_item->nama_kelas ?>">

      <!-- Deskripsi di bawah gambar -->
      <div class="mt-4">
        <h3 class="section-title">Deskripsi</h3>
        <p><?php echo $kelas_item->deskripsi; ?></p>
      </div>

      <!-- Instruktur -->
      <div class="mt-4">
        <h3 class="section-title">Instruktur</h3>
        <p><?php echo $kelas_item->instruktur; ?></p>
      </div>

      <!-- Alat-Alat dan Bahan-Bahan Samping-Sampingan -->
      <div class="row mt-4">
        <!-- Alat-Alat -->
        <div class="col-md-6">
          <h3 class="section-title">Alat-Alat</h3>
          <ul>
            <?php
            $alat_alat = explode(',', $kelas_item->alat_alat); // Asumsikan alat-alat dipisahkan dengan koma
            foreach ($alat_alat as $alat) {
              echo "<li>$alat</li>";
            }
            ?>
          </ul>
        </div>

        <!-- Bahan-Bahan -->
        <div class="col-md-6">
          <h3 class="section-title">Bahan-Bahan</h3>
          <ul>
            <?php
            $bahan_bahan = explode(',', $kelas_item->bahan_bahan); // Asumsikan bahan-bahan dipisahkan dengan koma
            foreach ($bahan_bahan as $bahan) {
              echo "<li>$bahan</li>";
            }
            ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Card dengan Harga dan Tombol Checkout (Sebelah Kanan) -->
    <div class="col-md-4">
      <div class="card shadow-sm border-light">
        <div class="card-body">
          <!-- Harga dengan Ukuran Lebih Besar -->
          <p class="h3 mb-4" style="font-weight: 600;">Rp
            <?= number_format($kelas_item->harga, 2, ',', '.') ?></p>

          <!-- Waktu Mulai dengan Ikon Jam -->
          <p class="mb-2"><strong> Mulai:</strong></p>
          <p class="mb-4">
            <i class="fa fa-clock" style="margin-right: 8px"></i>
            <?= date('l, d M Y, H:i', strtotime($kelas_item->tanggal_mulai)) ?>
            WIB
          </p>

          <!-- Masukkan ke Keranjang Button dengan Ikon Keranjang -->
          <form action="<?= site_url('keranjang/add_to_cart/' . $kelas_item->id) ?>" method="POST" class="w-100">
            <button type="submit" class="detail_button w-100">
              <i class="fa fa-shopping-cart" style="margin-right: 8px;"></i> Masukkan ke Keranjang
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>