<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // Memuat model yang diperlukan
    $this->load->model('ModelKelas');
    $this->load->model('ModelResep');
    // Pastikan hanya admin yang bisa mengakses controller ini
    if ($this->session->userdata('role') != 'admin') {
      redirect('home');
    }
  }

  // Fungsi untuk menampilkan halaman admin
  public function index()
  {
    $data['title'] = 'Admin';

    $data['kelas'] = $this->ModelKelas->get_kelas_paged(10, 0); // Mendapatkan kelas untuk ditampilkan
    $data['resep'] = $this->ModelResep->get_all_recipes(); // Mendapatkan resep untuk ditampilkan

    // Memuat view admin/admin.php
    $this->load->view('templates/header', $data);
    $this->load->view('admin/admin', $data);
    $this->load->view('templates/footer');
  }

  // Fungsi untuk menambah kelas
  public function tambah_kelas()
  {
    // Validasi form untuk penambahan kelas
    $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
    $this->form_validation->set_rules('status_kelas', 'Status Kelas', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->index(); // Jika validasi gagal, kembali ke halaman admin
    } else {
      // Upload gambar kelas jika ada
      $gambar = $_FILES['gambar']['name'];
      if ($gambar) {
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
          echo $this->upload->display_errors();
        } else {
          $gambar = $this->upload->data('file_name');
        }
      }

      // Menyimpan data kelas ke dalam database
      $data = [
        'nama_kelas' => $this->input->post('nama_kelas'),
        'deskripsi' => $this->input->post('deskripsi'),
        'harga' => $this->input->post('harga'),
        'gambar' => $gambar,
        'status_kelas' => $this->input->post('status_kelas'),
        'status' => $this->input->post('status')
      ];

      $this->ModelKelas->tambah_kelas($data);
      redirect('Admin'); // Kembali ke halaman admin setelah penambahan
    }
  }

  // Fungsi untuk menambah resep
  public function tambah_resep()
  {
    // Validasi form untuk penambahan resep
    $this->form_validation->set_rules('nama_resep', 'Nama Resep', 'required');
    $this->form_validation->set_rules('negara', 'Negara', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    $this->form_validation->set_rules('bahan', 'Bahan', 'required');
    $this->form_validation->set_rules('langkah', 'Langkah', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->index(); // Jika validasi gagal, kembali ke halaman admin
    } else {
      // Upload gambar resep jika ada
      $gambar = $_FILES['gambar']['name'];
      if ($gambar) {
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
          echo $this->upload->display_errors();
        } else {
          $gambar = $this->upload->data('file_name');
        }
      }

      // Menyimpan data resep ke dalam database
      $data = [
        'nama_resep' => $this->input->post('nama_resep'),
        'negara' => $this->input->post('negara'),
        'deskripsi' => $this->input->post('deskripsi'),
        'bahan' => $this->input->post('bahan'),
        'langkah' => $this->input->post('langkah'),
        'gambar' => $gambar,
        'video_url' => $this->input->post('video_url')
      ];

      $this->ModelResep->tambah_resep($data);
      redirect('Admin'); // Kembali ke halaman admin setelah penambahan
    }
  }
}