<div class="container my-5 signup">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <h3 class="text-center mb-4">Sign Up</h3>
      <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
      <?php endif; ?>
      <form action="<?= site_url('auth/signup') ?>" method="POST">
        <div class="form-group">
          <label for="nama_lengkap">Full Name</label>
          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        <p class="text-center mt-3">Sudah memiliki akun? <a href="<?= site_url('auth/login') ?>">Login</a></p>
      </form>
    </div>
  </div>
</div>