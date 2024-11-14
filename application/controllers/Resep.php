<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // Load model rating
    $this->load->model('ModelRating');
  }

  public function index()
  {
    $negara = $this->input->get('negara');
    $search = $this->input->get('search');

    $data['title'] = 'Resep';
    $data['countries'] = $this->ModelResep->get_countries();

    $config['base_url'] = site_url('resep/index');
    $config['total_rows'] = $this->ModelResep->get_total_recipes($negara, $search);
    $config['per_page'] = 12;
    $config['uri_segment'] = 3;
    $config['num_links'] = 3;

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

    // Ambil data resep sesuai dengan pagination
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['recipes'] = $this->ModelResep->get_recipes_paginated($negara, $search, $config['per_page'], $page);
    $data['pagination_links'] = $this->pagination->create_links();

    // Load view
    $this->load->view('templates/header', $data);
    $this->load->view('resep/resep', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('resep');
    $data['resep'] = $query->row();

    if (empty($data['resep'])) {
      show_404();
    }

    // Ambil rating untuk resep ini
    $data['rating'] = $this->ModelRating->get_average_rating($id);

    $data['title'] = $data['resep']->nama_resep;

    // Load view detail dan kirim data
    $this->load->view('templates/header', $data);
    $this->load->view('resep/detail', $data);
    $this->load->view('templates/footer');
  }

  // Fungsi untuk menangani form rating
  public function submit_rating($id_resep)
  {
    $rating = $this->input->post('rating');
    $user_id = $this->session->userdata('user_id'); // Asumsi ada session user yang sedang login

    // Validasi rating
    if ($rating < 1 || $rating > 5) {
      // Jika rating tidak valid, kirimkan respons error
      echo json_encode(['status' => 'error', 'message' => 'Rating harus antara 1 dan 5.']);
      return;
    }

    // Cek jika pengguna sudah pernah memberikan rating sebelumnya
    $existing_rating = $this->ModelRating->get_user_rating($id_resep, $user_id);

    if ($existing_rating) {
      // Jika sudah ada, update rating yang lama
      $this->ModelRating->update_rating($id_resep, $user_id, $rating);
    } else {
      // Jika belum ada, simpan rating baru
      $this->ModelRating->insert_rating($id_resep, $user_id, $rating);
    }

    // Kirimkan respons sukses
    echo json_encode(['status' => 'success', 'message' => 'Rating berhasil diberikan!']);
  }
}