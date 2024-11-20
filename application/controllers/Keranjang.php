<?php
class Keranjang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ModelKeranjang'); // Pastikan model keranjang sudah ada
    $this->load->model('ModelKelas'); // Untuk mengambil data kelas

    if (!$this->session->userdata('user_id')) {
      $this->session->set_flashdata('error', 'Silakan login untuk mengakses keranjang.');
      redirect('auth/login');
    }
  }

  public function index()
  {
    $data['title'] = 'Keranjang';

    $user_id = $this->session->userdata('user_id'); // Get user_id from session

    // Get cart items for this user
    $data['items'] = $this->ModelKeranjang->get_items_by_user($user_id);

    // Get the pembelian_id (purchase ID) for this user
    $this->db->select('pembelian.id AS pembelian_id');
    $this->db->from('pembelian');
    $this->db->where('pembelian.user_id', $user_id);
    $query = $this->db->get();
    $pembelian = $query->row();
    $data['pembelian_id'] = $pembelian ? $pembelian->pembelian_id : null;  // Ensure this is being set

    // Load views with data
    $this->load->view('templates/header', $data);
    $this->load->view('kelas/keranjang', $data); // Pass $data containing pembelian_id to the view
    $this->load->view('templates/footer');
  }


  // Fungsi untuk menambahkan kelas ke keranjang
  public function add_to_cart($kelas_id)
  {
    $user_id = $this->session->userdata('user_id'); // Ambil user_id dari session

    if (!$user_id) {
      $this->session->set_flashdata('error', 'Anda harus login untuk menambahkan kelas ke keranjang.');
      redirect('auth/login');
      return;
    }

    // Cek apakah kelas sudah ada di keranjang untuk user_id ini
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
    $user_id = $this->session->userdata('user_id'); // Pastikan pengguna sudah login

    // Hapus item dari keranjang berdasarkan ID item dan ID pengguna
    $this->ModelKeranjang->delete_item_by_id($id, $user_id);

    // Arahkan kembali ke halaman keranjang setelah item dihapus
    redirect('keranjang');
  }

  public function clear_cart()
  {
    $user_id = $this->session->userdata('user_id'); // Pastikan ini sesuai dengan sistem Anda
    $this->ModelKeranjang->delete_all_by_user($user_id);
    redirect('keranjang');
  }
}