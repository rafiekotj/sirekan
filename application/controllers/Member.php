<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Member';

    $user_id = $this->session->userdata('user_id');
    $data['is_logged_in'] = false;

    if ($user_id) {
      $user = $this->ModelUser->getUserById($user_id);

      if ($user) {
        $data['is_logged_in'] = true;
      }
    }

    $this->load->view('templates/header', $data);
    $this->load->view('member/member', $data);
    $this->load->view('templates/footer');
  }
}