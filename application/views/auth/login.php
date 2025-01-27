<div class="container my-5 login">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <h1 class="text-center mb-4" style="font-weight: 600; letter-spacing: 8px;">LOGIN</h1>
      <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
      <?php endif; ?>
      <form action="<?= site_url('auth/login') ?>" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
        <p class="text-center mt-3">Belum memiliki akun? <a href="<?= site_url('auth/signup') ?>">Sign up</a></p>
      </form>
    </div>
  </div>
</div>