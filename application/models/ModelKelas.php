<?php

class ModelKelas extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  // Fungsi untuk mendapatkan jumlah total kelas (termasuk filter pencarian dan kategori)
  public function get_total_kelas_filtered($search = '', $kategori = '')
  {
    if ($search) {
      $this->db->like('nama_kelas', $search); // Filter berdasarkan nama kelas
    }
    if ($kategori) {
      $this->db->where('kategori', $kategori); // Filter berdasarkan kategori
    }

    $query = $this->db->get('kelas');
    return $query->num_rows(); // Mengembalikan jumlah total kelas yang ditemukan
  }

  // Fungsi untuk mendapatkan kelas dengan filter pencarian dan kategori, dan menggunakan pagination
  public function get_filtered_classes($search = '', $kategori = '', $limit = NULL, $offset = NULL)
  {
    if ($search) {
      $this->db->like('nama_kelas', $search); // Filter berdasarkan nama kelas
    }
    if ($kategori) {
      $this->db->where('kategori', $kategori); // Filter berdasarkan kategori
    }

    if ($limit) {
      $this->db->limit($limit, $offset); // Menambahkan limit dan offset untuk pagination
    }

    $query = $this->db->get('kelas');
    return $query->result();
  }

  // Fungsi untuk mendapatkan kategori unik dari kelas
  public function get_categories()
  {
    $this->db->distinct();
    $this->db->select('kategori');
    $query = $this->db->get('kelas');
    return $query->result();
  }

  // Fungsi untuk mendapatkan jumlah total kelas
  public function get_total_kelas()
  {
    return $this->db->count_all('kelas');
  }

  public function get_kelas_paged($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->select('*');
    $query = $this->db->get('kelas');
    return $query->result();
  }

  // Mendapatkan kelas berdasarkan ID
  public function get_kelas_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('kelas');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }

  // Fungsi untuk menambahkan kelas baru
  public function tambah_kelas($data)
  {
    $data_insert = [
      'nama_kelas' => $data['nama_kelas'],
      'deskripsi' => $data['deskripsi'],
      'harga' => $data['harga'],
      'gambar' => $data['gambar'],
      'status_kelas' => $data['status_kelas'],
      'status' => $data['status'],
      'kategori' => $data['kategori'] // Pastikan kategori juga disertakan
    ];
    return $this->db->insert('kelas', $data_insert);
  }

  // Fungsi untuk mendapatkan item keranjang berdasarkan user_id
  public function get_items_in_cart($user_id)
  {
    $this->db->select('keranjang.*, kelas.id as kelas_id, kelas.nama_kelas, kelas.harga, kelas.gambar');
    $this->db->from('keranjang');
    $this->db->join('kelas', 'keranjang.kelas_id = kelas.id');
    $this->db->where('keranjang.user_id', $user_id);
    $query = $this->db->get();

    return $query->result(); // Mengembalikan hasil sebagai array objek
  }
}