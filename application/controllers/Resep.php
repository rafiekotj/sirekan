<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
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

    $data['title'] = $data['resep']->nama_resep;

    // Load view detail dan kirim data
    $this->load->view('templates/header', $data);
    $this->load->view('resep/detail', $data);
    $this->load->view('templates/footer');
  }
}
