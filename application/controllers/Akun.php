<?php

class Akun extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ModelUser');
    $this->load->model('ModelPembelian'); // Load model pembelian
    $this->load->library('form_validation');
    $this->load->helper('file');
  }

  // Display the account/profile page
  public function index()
  {
    $data['title'] = 'Akun';

    $user_id = $this->session->userdata('user_id'); // Get the user ID from the session
    $data['user'] = $this->ModelUser->getUserById($user_id); // Fetch user data by ID

    // Get the user's purchase history
    $data['riwayat_pembelian'] = $this->ModelPembelian->get_riwayat_pembelian($user_id);

    // Check if the user data exists
    if ($data['user'] === null) {
      show_404(); // Show 404 page if user not found
    }

    // If user data is found, pass it to the view
    $data['profil_image'] = isset($data['user']->profil_image) ? $data['user']->profil_image : 'default-profile.jpg';

    $this->load->view('templates/header', $data);
    $this->load->view('akun/akun', $data);
    $this->load->view('templates/footer');
  }

  // Handle the profile update
  public function update_profile()
  {
    $user_id = $this->session->userdata('user_id');

    // Form validation
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->index(); // Show the form again with validation errors
      return;
    }

    $nama_lengkap = $this->input->post('nama_lengkap');
    $email = $this->input->post('email');

    // Handle image upload if a new image is selected
    $profile_image = $_FILES['profile_image']['name'];
    if ($profile_image) {
      // Config for image upload
      $config['upload_path'] = './assets/img/upload/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size'] = 2048; // Max size in KB
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
      // No image selected, keep the current profile image
      $profile_image = $this->input->post('current_image');
    }

    // Update user data
    $update_data = [
      'nama_lengkap' => $nama_lengkap,
      'profil_image' => $profile_image
    ];

    if ($this->ModelUser->update_user($user_id, $update_data)) {
      $this->session->set_userdata('profil_image', $profile_image); // Update session
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