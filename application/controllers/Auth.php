<?php
class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    $data['title'] = 'Login';

    if ($_POST) {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $user = $this->ModelUser->login($username, $password);

      if ($user) {
        $this->session->set_userdata([
          'user_id' => $user->id,
          'username' => $user->username,
          'nama_lengkap' => $user->nama_lengkap,
          'role' => $user->role,
        ]);
        redirect('home');
      } else {
        $this->session->set_flashdata('error', 'Login failed. Please check your credentials.');
        redirect('auth/login');
      }
    } else {
      $this->load->view('templates/header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/footer');
    }
  }

  public function signup()
  {
    $data['title'] = 'Sign Up';

    if ($_POST) {
      $data = [
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'role' => 'peserta'
      ];

      if ($this->ModelUser->register($data)) {
        $this->session->set_flashdata('success', 'Registration successful! Please login.');
        redirect('auth/login');
      } else {
        $this->session->set_flashdata('error', 'Registration failed. Please try again.');
        redirect('auth/signup');
      }
    } else {
      $this->load->view('templates/header', $data);
      $this->load->view('auth/signup');
      $this->load->view('templates/footer');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('home');
  }
}