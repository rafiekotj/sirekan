<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Akun';

    $user_id = $this->session->userdata('user_id');
    $data['user'] = $this->ModelUser->getUserById($user_id);

    $data['riwayat_pembelian'] = $this->ModelPembelian->get_riwayat_pembelian($user_id);

    if ($data['user'] === null) {
      show_404();
    }

    $data['profil_image'] = isset($data['user']->profil_image) ? $data['user']->profil_image : 'default-profile.jpg';

    $this->load->view('templates/header', $data);
    $this->load->view('akun/akun', $data);
    $this->load->view('templates/footer');
  }

  public function update_profile()
  {
    $user_id = $this->session->userdata('user_id');

    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
      return;
    }

    $nama_lengkap = $this->input->post('nama_lengkap');
    $email = $this->input->post('email');

    $profile_image = $_FILES['profile_image']['name'];
    if ($profile_image) {

      $config['upload_path'] = './assets/img/upload/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size'] = 2048;
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('profile_image')) {
        $uploaded_data = $this->upload->data();
        $profile_image = $uploaded_data['file_name'];
      } else {
        $error = $this->upload->display_errors();
        $data['error_message'] = $error;
        $this->index();
        return;
      }
    } else {

      $profile_image = $this->input->post('current_image');
    }

    $update_data = [
      'nama_lengkap' => $nama_lengkap,
      'profil_image' => $profile_image
    ];

    if ($this->ModelUser->update_user($user_id, $update_data)) {
      $this->session->set_userdata('profil_image', $profile_image);
      $data['success_message'] = 'Profile updated successfully!';
    } else {
      $data['error_message'] = 'An error occurred while updating the profile.';
    }

    $data['user'] = $this->ModelUser->getUserById($user_id);
    $data['profil_image'] = $data['user']->profil_image;

    $this->load->view('templates/header');
    $this->load->view('akun/akun', $data);
    $this->load->view('templates/footer');
  }
}