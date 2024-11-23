<?php

class Member extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ModelUser');
  }

  public function index()
  {
    $data['title'] = 'Member';

    $user_id = $this->session->userdata('user_id');
    $data['is_logged_in'] = false;

    // Jika pengguna sudah login
    if ($user_id) {
      $user = $this->ModelUser->getUserById($user_id);

      // Jika pengguna ditemukan, tentukan status login
      if ($user) {
        $data['is_logged_in'] = true;
      }
    }

    // Load halaman member dengan data yang sesuai
    $this->load->view('templates/header', $data);
    $this->load->view('member/member', $data);
    $this->load->view('templates/footer');
  }
}