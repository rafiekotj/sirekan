<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ModelPembelian');
  }

  public function index()
  {
    $data['title'] = 'Riwayat Pembelian';

    // Cek apakah user sudah login
    if (!$this->session->userdata('user_id')) {
      redirect('auth/login');
    }

    // Mendapatkan data riwayat pembelian berdasarkan user_id
    $user_id = $this->session->userdata('user_id');
    $data['riwayat_pembelian'] = $this->ModelPembelian->get_riwayat_pembelian($user_id);
    $data['title'] = 'Riwayat Pembelian';

    $this->load->view('templates/header', $data);
    $this->load->view('akun/pembelian', $data); // Sesuaikan dengan folder view akun
    $this->load->view('templates/footer');
  }
}