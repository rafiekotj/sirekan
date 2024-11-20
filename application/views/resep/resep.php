<div class="container my-5 halaman_resep">
  <h1 class="text-center mb-5" style="font-weight: 600; letter-spacing: 8px;">RESEP</h1>

  <!-- Search Bar and Filter -->
  <form class="form-inline justify-content-end" method="get" action="<?php echo site_url('resep'); ?>">
    <div class="form-group mr-2">
      <input type="text" name="search" class="form-control" placeholder="Cari resep..."
        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    </div>
    <div class="form-group mr-2">
      <select name="negara" class="form-control">
        <option value="">Semua Negara</option>
        <?php foreach ($countries as $country): ?>
        <option value="<?php echo $country->negara; ?>"
          <?php echo (isset($_GET['negara']) && $_GET['negara'] == $country->negara) ? 'selected' : ''; ?>>
          <?php echo $country->negara; ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
  </form>

  <hr>

  <!-- Recipe List -->
  <div class="row">
    <?php foreach ($recipes as $recipe): ?>
    <div class="col-md-4 mb-4">
      <a href="<?php echo site_url('resep/detail/' . $recipe->id); ?>" class="card">
        <img src="<?php echo base_url('assets/img/upload/' . $recipe->gambar); ?>"
          class="card-img-top img-fluid recipe-img" alt="<?php echo $recipe->nama_resep; ?>">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between align-items-center" style="font-weight: 600;">
            <!-- Recipe Name -->
            <span><?php echo $recipe->nama_resep; ?></span>
            <!-- Rating Stars and Rating Value -->
            <div class="starsfront">
              <?php
                $rating = $this->ModelRating->get_average_rating($recipe->id);
                $full_stars = floor($rating);
                $half_star = ($rating - $full_stars) >= 0.5 ? true : false;
                $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0);

                // Display full stars first (reverse order)
                for ($i = 1; $i <= $full_stars; $i++) {
                  echo '<span class="starfront filled">&#9733;</span>';
                }

                // Display half star if applicable
                if ($half_star) {
                  echo '<span class="starfront half-filled">&#9733;</span>';
                }

                // Display empty stars last
                for ($i = 1; $i <= $empty_stars; $i++) {
                  echo '<span class="starfront">&#9733;</span>';
                }
                ?>
              <span class="rating-value"><?php echo number_format($rating, 1); ?>/5</span>
            </div>
          </h5>
          <p class="card-text"><strong>Negara:</strong> <?php echo $recipe->negara; ?></p>
          <p class="card-text"><?php echo substr($recipe->deskripsi, 0, 80); ?>...</p>
        </div>
      </a>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Pagination Links -->
  <div class="pagination-wrapper">
    <?= $pagination_links ?>
  </div>
</div>