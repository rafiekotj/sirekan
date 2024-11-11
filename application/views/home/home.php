<!-- HOME -->
<!-- <div class="hero-section">
  <p class="display-4">Selamat Datang di Website Resep</p>
  <p class="lead">Makan Enak Makan Sedap.</p>
  <br />
  <input type="text" class="form-control" placeholder="Cari Resep Hari Ini..." aria-label="Search">
  <button type="button" class="btn btn-primary">Cari</button>
</div> -->
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

  <div class="row">
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
                <?= substr($item->deskripsi, 0, 100); ?>...
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

<!-- Explore Tab -->
<div class="container-fluid explore_tab py-4">
  <h2 class="mb-4">Explore More</h2>
  <div class="row text-center">
    <div class="col">
      <a href="comfort_food_classics.html">
        <!-- Link to Comfort Food Classics page -->
        <img src="assets/img/nasgor1.jpg" alt="Comfort Food Classics" class="circle-image">
        <p class="fw-bold">COMFORT FOOD CLASSICS</p>
      </a>
    </div>
    <div class="col">
      <a href="international_eats.html">
        <!-- Link to International Eats page -->
        <img src="assets/img/nasgor1.jpg" alt="International Eats" class="circle-image">
        <p class="fw-bold">INTERNATIONAL EATS</p>
      </a>
    </div>
    <div class="col">
      <a href="breakfast_brunch.html">
        <!-- Link to Breakfast & Brunch page -->
        <img src="assets/img/nasgor1.jpg" alt="Breakfast & Brunch" class="circle-image">
        <p class="fw-bold">BREAKFAST & BRUNCH</p>
      </a>
    </div>
    <div class="col">
      <a href="community_picks.html">
        <!-- Link to Community Picks page -->
        <img src="assets/img/nasgor1.jpg" alt="Community Picks" class="circle-image">
        <p class="fw-bold">COMMUNITY PICKS</p>
      </a>
    </div>
    <div class="col">
      <a href="quick_easy.html">
        <!-- Link to Quick & Easy page -->
        <img src="assets/img/nasgor1.jpg" alt="Quick & Easy" class="circle-image">
        <p class="fw-bold">QUICK & EASY</p>
      </a>
    </div>
    <div class="col">
      <a href="copycat_recipes.html">
        <!-- Link to Copycat Recipes page -->
        <img src="assets/img/nasgor1.jpg" alt="Copycat Recipes" class="circle-image">
        <p class="fw-bold">COPYCAT RECIPES</p>
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
        <iframe width="100%" height="215" src="https://www.youtube.com/embed/video_id_1" frameborder="0"
          allowfullscreen></iframe>
        <div class="card-body">
          <h5 class="card-title">How to Make Baked Mummy Jalapeno Poppers</h5>
          <p class="card-text">Learn how to make this spooky appetizer!</p>
        </div>
      </div>
    </div>

    <!-- Video 2 -->
    <div class="col-md-4 mb-4">
      <div class="card">
        <iframe width="100%" height="215" src="https://www.youtube.com/embed/video_id_2" frameborder="0"
          allowfullscreen></iframe>
        <div class="card-body">
          <h5 class="card-title">Spooky Bats and Cobwebs Noodles</h5>
          <p class="card-text">A fun and creative noodle dish for Halloween!</p>
        </div>
      </div>
    </div>

    <!-- Video 3 -->
    <div class="col-md-4 mb-4">
      <div class="card">
        <iframe width="100%" height="215" src="https://www.youtube.com/embed/video_id_3" frameborder="0"
          allowfullscreen></iframe>
        <div class="card-body">
          <h5 class="card-title">Mini Meatloaf Ghosts Recipe</h5>
          <p class="card-text">Make these adorable meatloaf ghosts for your Halloween party!</p>
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
            <h5 class="card-title">Free Access</h5>
            <h4>FREE</h4>
            <p class="text-muted">No Credit Card Required</p>
            <p>Get complete access to the first level, which includes 4 interactive stories and all the supplemental
              material you need to start!</p>
            <a href="#" class="btn btn-danger btn-block">Join Now</a>
          </div>
        </div>
      </div>

      <!-- Monthly Access Card -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Monthly Access</h5>
            <h4>$12.99</h4>
            <p class="text-muted">Per Month</p>
            <p>Get access to the complete Reading program with hundreds of teaching materials for up to 20 students
              every month.</p>
            <a href="#" class="btn btn-danger btn-block">Subscribe Now</a>
          </div>
        </div>
      </div>

      <!-- Lifetime Access Card -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lifetime Access</h5>
            <h4>$499.99</h4>
            <p class="text-muted">One-Time Payment</p>
            <p>Get access to the complete Reading program with hundreds of teaching materials for up to 20 students
              FOREVER AND EVER.</p>
            <a href="#" class="btn btn-danger btn-block">Subscribe Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>