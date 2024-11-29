<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Home';

    $data['resep'] = $this->ModelHome->get_all_resep();

    $this->load->view('templates/header', $data);
    $this->load->view('home/home', $data);
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

    $this->load->view('templates/header', $data);
    $this->load->view('resep/detail', $data);
    $this->load->view('templates/footer');
  }
}