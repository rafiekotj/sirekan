<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Tentang';

    $this->load->view('templates/header', $data);
    $this->load->view('tentang/tentang');
    $this->load->view('templates/footer');
  }
}