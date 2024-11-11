<div class="container my-5">
  <h1 class="mt-5"><?php echo $resep->nama_resep; ?></h1>
  <p><strong>Negara Asal:</strong> <?php echo $resep->negara; ?></p>

  <div class="row mt-4">
    <div class="col-md-6">
      <img src="<?php echo base_url('assets/img/upload/' . $resep->gambar); ?>" class="img-fluid"
        alt="<?php echo $resep->nama_resep; ?>">
    </div>
    <div class="col-md-6">
      <h3>Deskripsi</h3>
      <p><?php echo $resep->deskripsi; ?></p>

      <h3>Bahan-Bahan</h3>
      <ul>
        <?php
        $bahan_items = explode(',', $resep->bahan);
        foreach ($bahan_items as $bahan) {
          echo '<li>' . trim($bahan) . '</li>';
        }
        ?>
      </ul>

      <h3>Langkah-langkah</h3>
      <ol>
        <?php

        $langkah_items = explode(". ", $resep->langkah);
        foreach ($langkah_items as $langkah) {
          echo '<li>' . trim($langkah) . '</li>';
        }
        ?>
      </ol>
    </div>
  </div>

  <!-- Video Rekomendasi -->
  <?php if (!empty($resep->video_url)): ?>
  <h3 class="mt-5">Video Rekomendasi</h3>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="<?php echo str_replace("watch?v=", "embed/", $resep->video_url); ?>"
      allowfullscreen></iframe>
  </div>
  <?php else: ?>
  <p class="mt-5">Tidak ada video rekomendasi untuk resep ini.</p>
  <?php endif; ?>
</div>