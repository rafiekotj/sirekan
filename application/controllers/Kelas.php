<?php
class Kelas extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  // Contoh controller dengan pagination menggunakan Bootstrap
  public function index()
  {
    $data['title'] = 'Kelas';

    $config['base_url'] = site_url('kelas/index');  // URL basis untuk pagination
    $config['total_rows'] = $this->ModelKelas->get_total_kelas();  // Total jumlah kelas
    $config['per_page'] = 12;  // Jumlah item per halaman
    $config['uri_segment'] = 3;  // Bagian URL yang menunjukkan nomor halaman (misalnya kelas/index/2)

    // Setel template pagination untuk menggunakan Bootstrap
    $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';
    $config['prev_link'] = '&laquo;';

    $this->pagination->initialize($config);

    // Ambil data kelas dari model
    $data['kelas'] = $this->ModelKelas->get_kelas_paged($config['per_page'], $this->uri->segment(3));
    $data['pagination_links'] = $this->pagination->create_links();  // Dapatkan link pagination

    // Load view
    $this->load->view('templates/header', $data);
    $this->load->view('kelas/kelas', $data);
    $this->load->view('templates/footer');
  }


  // Menambahkan kelas ke keranjang
  public function add_to_cart($kelas_id)
  {
    // Memeriksa apakah keranjang sudah ada dalam session
    $cart = $this->session->userdata('cart');
    if (!$cart) {
      $cart = [];
    }

    // Mendapatkan detail kelas berdasarkan ID
    $kelas = $this->ModelKelas->get_kelas_by_id($kelas_id);
    if ($kelas) {
      $cart[] = $kelas;
      $this->session->set_userdata('cart', $cart); // Menyimpan keranjang di session
    }

    redirect('kelas'); // Mengarahkan kembali ke halaman kelas
  }

  // Menampilkan halaman keranjang
  public function cart()
  {
    $data['cart'] = $this->session->userdata('cart');
    $this->load->view('templates/header');
    $this->load->view('kelas/keranjang', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    // Ambil data kelas berdasarkan ID
    $data['kelas_item'] = $this->ModelKelas->get_kelas_by_id($id);

    // Pastikan data ditemukan, jika tidak arahkan ke halaman lain atau tampilkan pesan error
    if (empty($data['kelas_item'])) {
      show_404(); // Tampilkan halaman error 404 jika kelas tidak ditemukan
    }

    // Load view untuk menampilkan detail kelas
    $this->load->view('templates/header');
    $this->load->view('kelas/detail', $data);
    $this->load->view('templates/footer');
  }
}
