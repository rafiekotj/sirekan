<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Kelas';

    $search = $this->input->get('search');
    $kategori = $this->input->get('kategori');

    $config['base_url'] = site_url('kelas/index');
    $config['total_rows'] = $this->ModelKelas->get_total_kelas_filtered($search, $kategori);
    $config['per_page'] = 12;
    $config['uri_segment'] = 3;

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

    setlocale(LC_TIME, 'id_ID.UTF-8');
    $data['kelas'] = $this->ModelKelas->get_filtered_classes($search, $kategori, $config['per_page'], $this->uri->segment(3));
    $data['pagination_links'] = $this->pagination->create_links();

    $data['categories'] = $this->ModelKelas->get_categories();

    $this->load->view('templates/header', $data);
    $this->load->view('kelas/kelas', $data);
    $this->load->view('templates/footer');
  }

  public function add_to_cart($kelas_id)
  {

    $user_id = $this->session->userdata('user_id');

    if (!$user_id) {

      $this->session->set_flashdata('error', 'Silakan login terlebih dahulu untuk menambahkan kelas ke keranjang.');
      redirect('kelas/detail/' . $kelas_id);
      return;
    }

    $data = [
      'user_id' => $user_id,
      'kelas_id' => $kelas_id,
      'jumlah' => 1,
      'created_at' => date('Y-m-d H:i:s')
    ];

    if ($this->db->insert('keranjang', $data)) {
      $this->session->set_flashdata('success', 'Kelas berhasil ditambahkan ke keranjang.');
    } else {
      $this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan ke keranjang.');
    }

    redirect('kelas');
  }

  public function cart()
  {
    $data['cart'] = $this->session->userdata('cart');
    $this->load->view('templates/header');
    $this->load->view('kelas/keranjang', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('kelas');
    $data['kelas'] = $query->row();
    $data['title'] = $data['kelas']->nama_kelas;

    $data['kelas_item'] = $this->ModelKelas->get_kelas_by_id($id);

    if (empty($data['kelas_item'])) {
      show_404();
    }

    $this->load->view('templates/header', $data);
    $this->load->view('kelas/detail', $data);
    $this->load->view('templates/footer');
  }
}