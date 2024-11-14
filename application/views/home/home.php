<!-- HOME -->
<div class="hero-section">
  <p class="display-4">Selamat Datang di Website SIREKAN</p>
  <p class="lead">Makan Enak Makan Sedap.</p>
  <br />
  <form action="<?= site_url('resep') ?>" method="get">
    <input type="text" name="search" class="form-control" placeholder="Cari Resep Hari Ini..." aria-label="Search">
    <button type="submit" class="btn btn-primary">Cari</button>
  </form>
</div>

<!-- RESEP POPULER -->
<div class="container my-5">
  <h2 class="mb-4 text-center">Resep Populer</h2>

  <div class="row resepcard">
    <?php if (!empty($resep)) : ?>
    <?php $count = 0; ?>
    <?php foreach ($resep as $item) : ?>
    <?php if ($count >= 6) break; ?>
    <div class="col-md-4 mb-4">
      <a href="<?= base_url('resep/detail/' . $item->id); ?>" class="card h-100 text-decoration-none text-dark">
        <?php if (!empty($item->gambar)) : ?>
        <img src="<?= base_url('assets/img/upload/' . $item->gambar); ?>" class="card-img-top"
          alt="<?= $item->nama_resep; ?>">
        <?php endif; ?>
        <div class="card-body">
          <h5 class="card-title"><?= $item->nama_resep; ?></h5>
          <p class="card-text">
            <?= substr($item->deskripsi, 0, 80); ?>...
          </p>
        </div>
      </a>
    </div>
    <?php $count++; ?>
    <?php endforeach; ?>
    <?php else : ?>
    <div class="col-12">
      <div class="alert alert-warning text-center" role="alert">
        Tidak ada resep tersedia.
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>

<!-- Tab Jelajah -->
<div class="container-fluid explore_tab py-4">
  <h2 class="mb-4">Jelajahi Lebih Jauh</h2>
  <div class="row text-center">
    <div class="col">
      <a href="comfort_food_classics.html">
        <!-- Tautan ke halaman Comfort Food Klasik -->
        <img src="assets/img/upload/comfort_food.jpg" alt="Comfort Food Klasik" class="circle-image">
        <p class="fw-bold">COMFORT FOOD KLASIK</p>
      </a>
    </div>
    <div class="col">
      <a href="international_eats.html">
        <!-- Tautan ke halaman Hidangan Internasional -->
        <img src="assets/img/upload/hidangan_internasional.jpeg" alt="Hidangan Internasional" class="circle-image">
        <p class="fw-bold">HIDANGAN INTERNASIONAL</p>
      </a>
    </div>
    <div class="col">
      <a href="breakfast_brunch.html">
        <!-- Tautan ke halaman Sarapan & Brunch -->
        <img src="assets/img/nasgor1.jpg" alt="Sarapan & Brunch" class="circle-image">
        <p class="fw-bold">SARAPAN & BRUNCH</p>
      </a>
    </div>
    <div class="col">
      <a href="community_picks.html">
        <!-- Tautan ke halaman Pilihan Komunitas -->
        <img src="assets/img/nasgor1.jpg" alt="Pilihan Komunitas" class="circle-image">
        <p class="fw-bold">PILIHAN KOMUNITAS</p>
      </a>
    </div>
    <div class="col">
      <a href="quick_easy.html">
        <!-- Tautan ke halaman Cepat & Mudah -->
        <img src="assets/img/nasgor1.jpg" alt="Cepat & Mudah" class="circle-image">
        <p class="fw-bold">CEPAT & MUDAH</p>
      </a>
    </div>
    <div class="col">
      <a href="copycat_recipes.html">
        <!-- Tautan ke halaman Resep Tiruan -->
        <img src="assets/img/nasgor1.jpg" alt="Resep Tiruan" class="circle-image">
        <p class="fw-bold">RESEP TIRUAN</p>
      </a>
    </div>
  </div>
</div>

<!-- YouTube Video -->
<div class="container youtube_video my-5">
  <h2 class="mb-4">Video Masak Rekomendasi</h2>
  <div class="row">
    <!-- Video 1 -->
    <div class="col-md-4 mb-4">
      <div class="card">
        <iframe width="100%" height="215" src="https://www.youtube.com/embed/i6yHVLgrELQ" frameborder="0"
          allowfullscreen></iframe>
        <div class="card-body">
          <h5 class="card-title">Resep NASI GORENG TELUR!</h5>
          <p class="card-text">
            <?= substr("10 Menit Jadi! Resep NASI GORENG TELUR: Dijamin Nambah! By Chef Devina Hermawan", 0, 70); ?>...
          </p>
        </div>
      </div>
    </div>
    <!-- Video 2 -->
    <div class="col-md-4 mb-4">
      <div class="card">
        <iframe width="100%" height="215" src="https://www.youtube.com/embed/XPLoy6i4MkE" frameborder="0"
          allowfullscreen></iframe>
        <div class="card-body">
          <h5 class="card-title">Resep PIZZA NO MIXER!</h5>
          <p class="card-text">
            <?= substr("PIZZA NO MIXER! GA PERLU KALIS! GAMPANGNYA.. By Chef Luvita Ho", 0, 80); ?>...
          </p>
        </div>
      </div>
    </div>
    <!-- Video 3 -->
    <div class="col-md-4 mb-4">
      <div class="card">
        <iframe width="100%" height="215" src="https://www.youtube.com/embed/AmVD2wsqMvM" frameborder="0"
          allowfullscreen></iframe>
        <div class="card-body">
          <h5 class="card-title">Resep TOMYUM SOUP</h5>
          <p class="card-text">
            <?= substr("Asem Gurih Enak ! Resep Tomyum Soup [ Soup Asam Pedas Thailand ] By Chef Ade Koerniawan", 0, 80); ?>...
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Join Member -->
<div class="container join_member my-5">
  <h2 class="mb-4">Ayo Jadi Member !!!</h2>
  <div class="container">
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
            <a href="#" class="btn btn-danger btn-block">Registrasi Sekarang</a>
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