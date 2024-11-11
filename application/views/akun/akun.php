<div class="container my-5">
  <h2 class="text-center mb-4">Akun Saya</h2>

  <!-- Form to Update Profile -->
  <form method="POST" action="<?= site_url('akun/update_profile') ?>" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4">
        <!-- Profile Image -->
        <div class="text-center">
          <img src="<?= base_url('assets/img/upload/' . $profil_image) ?>" alt="Profile Image" class="rounded-circle"
            width="150">
          <div class="mt-3">
            <input type="file" name="profile_image" class="form-control-file">
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
            value="<?= set_value('nama_lengkap', $user->nama_lengkap); ?>">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email"
            value="<?= set_value('email', $user->email); ?>" readonly>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Profile</button>
      </div>
    </div>
  </form>

  <?php if (isset($error_message)): ?>
  <div class="alert alert-danger mt-4"><?= $error_message ?></div>
  <?php endif; ?>

  <?php if (isset($success_message)): ?>
  <div class="alert alert-success mt-4"><?= $success_message ?></div>
  <?php endif; ?>
</div>