<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIREKAN | <?= isset($title) ? htmlentities($title) : '' ?></title>
  <!-- <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo/'); ?>logo-pb.png"> -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/css/sb-admin-2.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/css/stylesheets.css' ?>">
  <!-- <link rel="stylesheet" href="<?= base_url() . 'assets/vendor/fontawesome-free/css/all.min.css' ?>"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() . 'assets/datatable/datatables.css' ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tinos:wght@400;700&display=swap">
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="<?= site_url('home') ?>">SIREKAN</a> <!-- Tautan Home pada logo -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!-- Menu Resep -->
        <li class="nav-item <?= ($this->uri->segment(1) == 'resep') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('resep') ?>">Resep
            <?php if ($this->uri->segment(1) == 'resep'): ?><span class="sr-only">(current)</span><?php endif; ?>
          </a>
        </li>
        <!-- Menu Kelas -->
        <li class="nav-item <?= ($this->uri->segment(1) == 'kelas') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('kelas') ?>">Kelas
            <?php if ($this->uri->segment(1) == 'kelas'): ?><span class="sr-only">(current)</span><?php endif; ?>
          </a>
        </li>
        <!-- Menu Member -->
        <li class="nav-item <?= ($this->uri->segment(1) == 'member') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('member') ?>">Member
            <?php if ($this->uri->segment(1) == 'member'): ?><span class="sr-only">(current)</span><?php endif; ?>
          </a>
        </li>
        <!-- Menu Tentang -->
        <li class="nav-item <?= ($this->uri->segment(1) == 'tentang') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('tentang') ?>">Tentang</a>
        </li>
      </ul>

      <!-- Menu Keranjang dan Akun -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('keranjang') ?>">
            <i class="fas fa-shopping-cart"></i>
            <?php if ($this->session->userdata('user_id')): ?>
            <span class="badge badge-danger">
              <?= count($this->session->userdata('cart') ? $this->session->userdata('cart') : []) ?>
            </span>
            <?php endif; ?>
          </a>
        </li>

        <div class="navbar-divider"></div>

        <?php if ($this->session->userdata('user_id')): ?>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <?php
              $profil_image = $this->session->userdata('profil_image') ?: 'default-profile.jpg';
              ?>
            <img src="<?= base_url('assets/img/upload/' . $profil_image) ?>" alt="Profile" width="30" height="30"
              class="rounded-circle mx-1">
            <?= $this->session->userdata('nama_lengkap') ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= site_url('akun') ?>">Akun</a>
            <?php if ($this->session->userdata('role') === 'peserta'): ?>
            <a class="dropdown-item" href="<?= site_url('pembelian') ?>">Riwayat Pembelian</a>
            <?php endif; ?>
            <?php if ($this->session->userdata('role') === 'admin'): ?>
            <a class="dropdown-item" href="<?= site_url('admin') ?>">Admin</a>
            <?php endif; ?>
            <a class="dropdown-item" href="<?= site_url('auth/logout') ?>">Logout</a>
          </div>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('auth/login') ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('auth/signup') ?>">Signup</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>