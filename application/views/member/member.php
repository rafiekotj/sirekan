<!-- Jika pengguna belum login, tampilkan semua card -->
<?php if (!$is_logged_in): ?>
<div class="container join_member my-5">
  <h1 class="text-center text-uppercase mb-5" style="font-weight: 600; letter-spacing: 8px;">Member</h1>
  <div class=" container">
    <div class="row">
      <!-- Free Card -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Akses Gratis</h5>
            <h4>GRATIS</h4>
            <p class="text-muted">Tanpa Kartu Kredit</p>
            <ul>
              <li>Akses ke 4 resep dan video dasar</li>
              <li>Belajar teknik memasak dasar</li>
              <li>Resep mudah dan cepat untuk pemula</li>
            </ul>
            <!-- Ubah link ini ke halaman signup -->
            <a href="<?= site_url('auth/signup'); ?>" class="btn btn-danger btn-block">Registrasi Sekarang</a>
          </div>
        </div>
      </div>

      <!-- Monthly Access Card -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Akses Bulanan</h5>
            <h4>Rp 99.000</h4>
            <p class="text-muted">Per Bulan</p>
            <ul>
              <li>Akses ke seluruh kelas memasak bulanan</li>
              <li>Resep lengkap untuk hidangan lokal & internasional</li>
              <li>Video tutorial langkah demi langkah</li>
              <li>Update resep baru setiap minggu</li>
            </ul>
            <a href="#" class="btn btn-danger btn-block">Langganan Sekarang</a>
          </div>
        </div>
      </div>

      <!-- Lifetime Access Card -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Akses Seumur Hidup</h5>
            <h4>Rp 1.200.000</h4>
            <p class="text-muted">Sekali Bayar</p>
            <ul>
              <li>Akses tak terbatas ke seluruh kelas dan resep</li>
              <li>Termasuk kelas khusus dan eksklusif</li>
              <li>Akses ke semua pembaruan kelas di masa mendatang</li>
              <li>Menghemat biaya langganan bulanan</li>
            </ul>
            <a href="#" class="btn btn-danger btn-block">Langganan Sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
<!-- Jika pengguna sudah login, hanya tampilkan akses bulanan dan seumur hidup -->
<div class="container join_member my-5">
  <h1 class="text-center text-uppercase mb-5" style="font-weight: 600; letter-spacing: 8px;">Member</h1>
  <div class=" container">
    <div class="row">
      <!-- Monthly Access Card -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Akses Bulanan</h5>
            <h4>Rp 99.000</h4>
            <p class="text-muted">Per Bulan</p>
            <ul>
              <li>Akses ke seluruh kelas memasak bulanan</li>
              <li>Resep lengkap untuk hidangan lokal & internasional</li>
              <li>Video tutorial langkah demi langkah</li>
              <li>Update resep baru setiap minggu</li>
            </ul>
            <a href="#" class="btn btn-danger btn-block">Langganan Sekarang</a>
          </div>
        </div>
      </div>

      <!-- Lifetime Access Card -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Akses Seumur Hidup</h5>
            <h4>Rp 1.200.000</h4>
            <p class="text-muted">Sekali Bayar</p>
            <ul>
              <li>Akses tak terbatas ke seluruh kelas dan resep</li>
              <li>Termasuk kelas khusus dan eksklusif</li>
              <li>Akses ke semua pembaruan kelas di masa mendatang</li>
              <li>Menghemat biaya langganan bulanan</li>
            </ul>
            <a href="#" class="btn btn-danger btn-block">Langganan Sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>