<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role') != 'admin') {
      redirect('home');
    }
  }

  public function index()
  {
    $data['title'] = 'Admin';
    $data['kelas'] = $this->ModelKelas->get_filtered_classes();
    $data['resep'] = $this->ModelResep->get_all_recipes();

    $this->load->view('templates/header', $data);
    $this->load->view('admin/admin', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_resep()
  {
    $data['title'] = 'Tambah Resep';

    $this->form_validation->set_rules('nama_resep', 'Nama Resep', 'required');
    $this->form_validation->set_rules('negara', 'Negara', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    $this->form_validation->set_rules('bahan', 'Bahan', 'required');
    $this->form_validation->set_rules('langkah', 'Langkah', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('admin/tambah_resep');
      $this->load->view('templates/footer');
    } else {
      $config['upload_path'] = './assets/img/upload';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        $gambar = $this->upload->data('file_name');
      } else {
        $gambar = NULL;
      }

      $data = array(
        'nama_resep' => $this->input->post('nama_resep'),
        'negara' => $this->input->post('negara'),
        'deskripsi' => $this->input->post('deskripsi'),
        'bahan' => $this->input->post('bahan'),
        'langkah' => $this->input->post('langkah'),
        'gambar' => $gambar,
        'video_url' => $this->input->post('video_url')
      );

      $this->ModelResep->tambah_resep($data);
      redirect('admin');
    }
  }

  public function update_resep()
  {
    $id = $this->input->post('id');
    $nama_resep = $this->input->post('nama_resep');
    $negara = $this->input->post('negara');
    $deskripsi = $this->input->post('deskripsi');
    $bahan = $this->input->post('bahan');
    $langkah = $this->input->post('langkah');
    $video_url = $this->input->post('video_url');

    $gambar_lama = $this->input->post('gambar_lama');
    $gambar_baru = $_FILES['gambar']['name'];

    if ($gambar_baru) {
      $config['upload_path'] = './assets/img/upload/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['file_name'] = time() . '_' . $gambar_baru;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        $gambar = $this->upload->data('file_name');
      } else {
        $gambar = $gambar_lama;
      }
    } else {
      $gambar = $gambar_lama;
    }

    $data = [
      'nama_resep' => $nama_resep,
      'negara' => $negara,
      'deskripsi' => $deskripsi,
      'bahan' => $bahan,
      'langkah' => $langkah,
      'video_url' => $video_url,
      'gambar' => $gambar,
      'updated_at' => date('Y-m-d H:i:s')
    ];

    $this->ModelResep->update_resep($id, $data);

    $this->session->set_flashdata('success', 'Resep berhasil diperbarui!');
    redirect('admin');
  }

  public function tambah_kelas()
  {
    $data['title'] = 'Tambah Kelas';

    $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
    $this->form_validation->set_rules('instruktur', 'Instruktur', 'required');
    $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
    $this->form_validation->set_rules('bahan_bahan', 'Bahan-bahan', 'required');
    $this->form_validation->set_rules('alat_alat', 'Alat-alat', 'required');
    $this->form_validation->set_rules('status_kelas', 'Status Kelas', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('admin/tambah_kelas');
      $this->load->view('templates/footer');
    } else {
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

      $data = [
        'nama_kelas' => $this->input->post('nama_kelas'),
        'instruktur' => $this->input->post('instruktur'),
        'tanggal_mulai' => $this->input->post('tanggal_mulai'),
        'deskripsi' => $this->input->post('deskripsi'),
        'harga' => $this->input->post('harga'),
        'bahan_bahan' => $this->input->post('bahan_bahan'),
        'alat_alat' => $this->input->post('alat_alat'),
        'gambar' => $gambar,
        'status_kelas' => $this->input->post('status_kelas'),
        'status' => $this->input->post('status')
      ];

      $this->ModelKelas->tambah_kelas($data);
      redirect('admin');
    }
  }

  public function update_kelas()
  {
    $id = $this->input->post('id');

    $data = [
      'nama_kelas' => $this->input->post('nama_kelas'),
      'deskripsi' => $this->input->post('deskripsi'),
      'harga' => $this->input->post('harga'),
      'status_kelas' => $this->input->post('status_kelas'),
      'status' => $this->input->post('status'),
      'kategori' => $this->input->post('kategori'),
      'instruktur' => $this->input->post('instruktur'),
      'tanggal_mulai' => $this->input->post('tanggal_mulai'),
      'bahan_bahan' => $this->input->post('bahan_bahan'),
      'alat_alat' => $this->input->post('alat_alat')
    ];

    if ($_FILES['gambar']['name']) {
      $config['upload_path'] = './assets/img/upload/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        $file_data = $this->upload->data();
        $data['gambar'] = $file_data['file_name'];
      }
    } else {
      $data['gambar'] = $this->input->post('gambar_lama');
    }

    $this->load->model('ModelKelas');
    $this->ModelKelas->update_kelas($id, $data);

    redirect('admin');
  }

  public function edit_resep($id)
  {
    $data['title'] = 'Edit Resep';
    $data['resep'] = $this->ModelResep->get_resep_by_id($id);

    if (!$data['resep']) {
      show_404();
    }

    $this->load->view('templates/header', $data);
    $this->load->view('admin/edit_resep', $data);
    $this->load->view('templates/footer');
  }

  public function edit_kelas($id)
  {
    $data['title'] = 'Edit Kelas';
    $data['kelas'] = $this->ModelKelas->get_kelas_by_id($id);

    if (!$data['kelas']) {
      show_404();
    }

    $this->load->view('templates/header', $data);
    $this->load->view('admin/edit_kelas', $data);
    $this->load->view('templates/footer');
  }

  public function hapus_resep($id)
  {
    if ($this->ModelResep->delete($id)) {
      redirect('admin');
    } else {
      $this->session->set_flashdata('error', 'Gagal menghapus resep.');
      redirect('admin');
    }
  }

  public function hapus_kelas($id)
  {
    if ($this->ModelKelas->delete($id)) {
      redirect('admin');
    } else {
      $this->session->set_flashdata('error', 'Gagal menghapus kelas.');
      redirect('admin');
    }
  }
}