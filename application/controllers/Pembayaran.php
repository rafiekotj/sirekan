<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

  public function index()
  {
    $user_id = $this->session->userdata('user_id');

    // Pastikan pengguna sudah login
    if (!$user_id) {
      $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu!');
      redirect('login');
    }

    // Mendapatkan semua item keranjang
    $this->load->model('ModelKelas');
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

    // Load halaman pembayaran
    $this->load->view('templates/header');
    $this->load->view('kelas/pembayaran', ['total_harga' => $total_harga]);
    $this->load->view('templates/footer');
  }

  public function lanjut_pembayaran()
  {
    $user_id = $this->session->userdata('user_id');

    // Pastikan pengguna sudah login
    if (!$user_id) {
      $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu!');
      redirect('login');
    }

    // Mendapatkan semua item keranjang
    $this->load->model('ModelKelas');
    $this->load->model('ModelKeranjang'); // Pastikan model keranjang dimuat
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

    // Ambil data metode pembayaran
    $metode_pembayaran = 'transfer_bank';

    // Buat transaksi pembelian baru
    foreach ($items as $item) {
      $data_pembelian = [
        'user_id' => $user_id,
        'kelas_id' => $item->kelas_id,
        'total_harga' => $total_harga,
        'status_pembayaran' => 'pending'
      ];
      $this->db->insert('pembelian', $data_pembelian);
      $pembelian_id = $this->db->insert_id();

      // Simpan data pembayaran
      $data_pembayaran = [
        'pembelian_id' => $pembelian_id,
        'jumlah_pembayaran' => $total_harga,
        'metode_pembayaran' => $metode_pembayaran,
        'status_pembayaran' => 'pending'
      ];
      $this->db->insert('pembayaran', $data_pembayaran);
    }

    // Hapus semua item di keranjang setelah pembayaran berhasil
    $this->ModelKeranjang->delete_all_by_user($user_id);

    // Redirect ke halaman sukses setelah pembayaran dimasukkan
    redirect('pembayaran/sukses');
  }

  public function sukses()
  {
    // Halaman sukses setelah pembayaran berhasil
    $this->load->view('templates/header');
    $this->load->view('kelas/sukses');
    $this->load->view('templates/footer');
  }
}