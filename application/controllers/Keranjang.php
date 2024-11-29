<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('user_id')) {
      $this->session->set_flashdata('error', 'Silakan login untuk mengakses keranjang.');
      redirect('auth/login');
    }
  }

  public function index()
  {
    $data['title'] = 'Keranjang';

    $user_id = $this->session->userdata('user_id');

    $data['items'] = $this->ModelKeranjang->get_items_by_user($user_id);

    $this->db->select('pembelian.id AS pembelian_id');
    $this->db->from('pembelian');
    $this->db->where('pembelian.user_id', $user_id);
    $query = $this->db->get();
    $pembelian = $query->row();
    $data['pembelian_id'] = $pembelian ? $pembelian->pembelian_id : null;

    $this->load->view('templates/header', $data);
    $this->load->view('kelas/keranjang', $data);
    $this->load->view('templates/footer');
  }

  public function add_to_cart($kelas_id)
  {
    $user_id = $this->session->userdata('user_id');

    if (!$user_id) {
      $this->session->set_flashdata('error', 'Anda harus login untuk menambahkan kelas ke keranjang.');
      redirect('auth/login');
      return;
    }

    $existing_item = $this->ModelKeranjang->get_item_by_user_and_kelas($user_id, $kelas_id);

    if ($existing_item) {
      $this->session->set_flashdata('message', 'Kelas ini sudah ada di keranjang Anda.');
      redirect('keranjang');
    } else {
      $kelas = $this->ModelKelas->get_kelas_by_id($kelas_id);

      if ($kelas) {
        $data = [
          'user_id' => $user_id,
          'kelas_id' => $kelas->id,
          'jumlah' => 1,
          'created_at' => date('Y-m-d H:i:s')
        ];

        $this->ModelKeranjang->insert($data);
        $this->session->set_flashdata('success', 'Kelas berhasil ditambahkan ke keranjang.');
      } else {
        $this->session->set_flashdata('error', 'Kelas tidak ditemukan.');
      }

      redirect('keranjang');
    }
  }

  public function delete($id)
  {
    $user_id = $this->session->userdata('user_id');

    $this->ModelKeranjang->delete_item_by_id($id, $user_id);

    redirect('keranjang');
  }

  public function clear_cart()
  {
    $user_id = $this->session->userdata('user_id');
    $this->ModelKeranjang->delete_all_by_user($user_id);
    redirect('keranjang');
  }
}