<div class="container my-5">
  <div class="row mt-5">
    <!-- Nama Resep dan Negara Asal -->
    <div class="col-md-6 d-flex flex-column justify-content-center text-center">
      <h1><?php echo $resep->nama_resep; ?></h1>
      <p><strong>Negara Asal:</strong> <?php echo $resep->negara; ?></p>

      <!-- Tampilan Rating -->
      <div class="ratingupside mt-3">
        <h5>Rating: <?php echo number_format($rating, 1); ?> / 5</h5>
        <div class="stars">
          <?php
          $rating = $this->ModelRating->get_average_rating($resep->id);
          $full_stars = floor($rating);
          $half_star = ($rating - $full_stars) >= 0.5 ? true : false;
          $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0);

          // Display empty stars first (reverse order)
          for ($i = 1; $i <= $empty_stars; $i++) {
            echo '<span class="starfront">&#9733;</span>';
          }

          // Display half star if applicable
          if ($half_star) {
            echo '<span class="starfront half-filled">&#9733;</span>';
          }

          // Display full stars last
          for ($i = 1; $i <= $full_stars; $i++) {
            echo '<span class="starfront filled">&#9733;</span>';
          }
          ?>
        </div>
      </div>
    </div>

    <!-- Gambar Resep -->
    <div class="col-md-6">
      <img src="<?php echo base_url('assets/img/upload/' . $resep->gambar); ?>" class="img-fluid"
        alt="<?php echo $resep->nama_resep; ?>">
    </div>
  </div>

  <!-- Deskripsi -->
  <div class="mt-4">
    <h3 class="section-title">Deskripsi</h3>
    <p><?php echo $resep->deskripsi; ?></p>
  </div>

  <!-- Bahan-Bahan dan Langkah-Langkah berdampingan -->
  <div class="row mt-4">
    <!-- Bahan-Bahan -->
    <div class="col-md-4">
      <h3 class="section-title">Bahan-Bahan</h3>
      <ul>
        <?php
        $bahan_items = explode(',', $resep->bahan);
        foreach ($bahan_items as $bahan) {
          echo '<li>' . trim($bahan) . '</li>';
        }
        ?>
      </ul>
    </div>

    <!-- Langkah-Langkah dan Video Rekomendasi -->
    <div class="col-md-8">
      <h3 class="section-title">Langkah-langkah</h3>
      <ol>
        <?php
        $langkah_items = explode(". ", $resep->langkah);
        foreach ($langkah_items as $langkah) {
          echo '<li>' . trim($langkah) . '</li>';
        }
        ?>
      </ol>

      <!-- Video Rekomendasi -->
      <?php if (!empty($resep->video_url)): ?>
      <h3 class="section-title mt-4">Video Rekomendasi</h3>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?php echo str_replace("watch?v=", "embed/", $resep->video_url); ?>"
          allowfullscreen></iframe>
      </div>
      <?php else: ?>
      <p class="mt-4">Tidak ada video rekomendasi untuk resep ini.</p>
      <?php endif; ?>

      <!-- Rating Form -->
      <div class="rating-container mt-4">
        <h3 class="section-title">Berikan Rating (1 - 5 Bintang)</h3>
        <form class="text-center" id="ratingForm" action="<?php echo site_url('resep/submit_rating/' . $resep->id); ?>"
          method="post">
          <div class="stars">
            <input type="radio" name="rating" id="star1" value="5"><label for="star1">&#9733;</label>
            <input type="radio" name="rating" id="star2" value="4"><label for="star2">&#9733;</label>
            <input type="radio" name="rating" id="star3" value="3"><label for="star3">&#9733;</label>
            <input type="radio" name="rating" id="star4" value="2"><label for="star4">&#9733;</label>
            <input type="radio" name="rating" id="star5" value="1"><label for="star5">&#9733;</label>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>