<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ModelKeranjang');
    $this->load->model('ModelPembelian'); // Jika Anda punya model khusus untuk pembelian
    $this->load->model('ModelKelas');

    if (!$this->session->userdata('user_id')) {
      $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
      redirect('auth/login');
    }
  }

  public function index()
  {
    $user_id = $this->session->userdata('user_id');

    // Ambil semua item di keranjang pengguna
    $items = $this->ModelKeranjang->get_items_by_user($user_id);

    // Jika keranjang kosong, redirect kembali ke halaman keranjang dengan pesan
    if (empty($items)) {
      $this->session->set_flashdata('error', 'Keranjang Anda kosong. Tambahkan kelas terlebih dahulu.');
      redirect('keranjang');
      return;
    }

    // Ambil detail user, termasuk email
    $user = $this->db->get_where('users', ['id' => $user_id])->row();

    $data['title'] = 'Pembayaran';
    $data['items'] = $items;
    $data['user_email'] = $user ? $user->email : ''; // Pastikan email ada

    // Hitung total harga
    $data['total_harga'] = array_reduce($items, function ($total, $item) {
      return $total + ($item->harga * $item->jumlah);
    }, 0);

    // Load view untuk halaman pembayaran
    $this->load->view('templates/header', $data);
    $this->load->view('kelas/pembayaran', $data);
    $this->load->view('templates/footer');
  }

  public function lanjut_pembayaran()
  {
    $user_id = $this->session->userdata('user_id');
    $metode_pembayaran = $this->input->post('metode_pembayaran'); // Ambil metode pembayaran dari form

    // Pastikan pengguna sudah login
    if (!$user_id) {
      $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu!');
      redirect('login');
    }

    if (!$metode_pembayaran) {
      $this->session->set_flashdata('message', 'Silakan pilih metode pembayaran.');
      redirect('pembayaran');
    }

    // Mendapatkan semua item keranjang
    $this->load->model('ModelKelas');
    $this->load->model('ModelKeranjang');
    $items = $this->ModelKelas->get_items_in_cart($user_id);

    if (empty($items)) {
      $this->session->set_flashdata('message', 'Keranjang Anda kosong!');
      redirect('keranjang');
    }

    // Total harga
    $total_harga = 0;
    foreach ($items as $item) {
      $total_harga += $item->harga * $item->jumlah;
    }

    // Ambil email pengguna
    $user = $this->db->get_where('users', ['id' => $user_id])->row();
    $user_email = $user ? $user->email : ''; // Pastikan email ada

    // Buat transaksi pembelian baru
    foreach ($items as $item) {
      $data_pembelian = [
        'user_id' => $user_id,
        'kelas_id' => $item->kelas_id,
        'total_harga' => $total_harga,
        'status_pembayaran' => 'pending', // Status sementara
        'tanggal_pembelian' => date('Y-m-d H:i:s') // Set tanggal pembelian
      ];
      $this->db->insert('pembelian', $data_pembelian);
      $pembelian_id = $this->db->insert_id();

      // Simpan data pembayaran
      $data_pembayaran = [
        'pembelian_id' => $pembelian_id,
        'jumlah_pembayaran' => $total_harga,
        'metode_pembayaran' => $metode_pembayaran,
        'status_pembayaran' => 'pending', // Status sementara
        'id_user' => $user_id,   // Menambahkan id_user
        'email_user' => $user_email // Menambahkan email_user
      ];
      $this->db->insert('pembayaran', $data_pembayaran);

      // Update status pembayaran menjadi 'sudah_bayar' setelah berhasil
      $this->db->where('pembelian_id', $pembelian_id);
      $this->db->update('pembayaran', ['status_pembayaran' => 'sudah_bayar']);
    }

    // Hapus semua item di keranjang setelah pembayaran berhasil
    $this->ModelKeranjang->delete_all_by_user($user_id);

    // Redirect ke halaman sukses setelah pembayaran dimasukkan
    redirect('pembayaran/sukses/' . $pembelian_id);
  }

  public function sukses($pembelian_id = null)
  {
    $data['title'] = 'Detail Pembayaran';

    if (!$pembelian_id) {
      $this->session->set_flashdata('message', 'Pembelian tidak ditemukan.');
      redirect('home');
    }

    $this->load->model('ModelPembayaran');
    $data['pembayaran'] = $this->ModelPembayaran->get_pembayaran_by_pembelian_id($pembelian_id);

    if (!$data['pembayaran']) {
      $this->session->set_flashdata('message', 'Detail pembayaran tidak ditemukan.');
      redirect('home');
    }

    // Load halaman sukses dengan detail pembayaran
    $this->load->view('templates/header', $data);
    $this->load->view('kelas/sukses', $data);
    $this->load->view('templates/footer');
  }
}