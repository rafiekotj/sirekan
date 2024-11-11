<div class="container my-5 halaman_resep">
  <h2 class="text-center mb-4">Resep</h2>

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
  <?php if (count($recipes) > 0): ?>
    <div class="row">
      <?php foreach ($recipes as $recipe): ?>
        <div class="col-md-4 mb-4">
          <a href="<?php echo site_url('resep/detail/' . $recipe->id); ?>" class="card">
            <img src="<?php echo base_url('assets/img/upload/' . $recipe->gambar); ?>"
              class="card-img-top img-fluid recipe-img" alt="<?php echo $recipe->nama_resep; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $recipe->nama_resep; ?></h5>
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

  <?php else: ?>
    <p class="text-center">Resep tidak ditemukan.</p>
  <?php endif; ?>
</div>

<style>
  .recipe-img {
    height: 200px;
    object-fit: cover;
    width: 100%;
  }
</style>