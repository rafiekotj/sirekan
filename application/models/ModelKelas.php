<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKelas extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_total_kelas_filtered($search = '', $kategori = '')
  {
    if ($search) {
      $this->db->like('nama_kelas', $search);
    }
    if ($kategori) {
      $this->db->where('kategori', $kategori);
    }

    $query = $this->db->get('kelas');
    return $query->num_rows();
  }

  public function get_filtered_classes($search = '', $kategori = '', $limit = NULL, $offset = NULL)
  {
    if ($search) {
      $this->db->like('nama_kelas', $search);
    }
    if ($kategori) {
      $this->db->where('kategori', $kategori);
    }

    if ($limit) {
      $this->db->limit($limit, $offset);
    }

    $query = $this->db->get('kelas');
    return $query->result();
  }

  public function get_categories()
  {
    $this->db->distinct();
    $this->db->select('kategori');
    $query = $this->db->get('kelas');
    return $query->result();
  }

  public function get_total_kelas()
  {
    return $this->db->count_all('kelas');
  }

  public function get_kelas_paged($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->select('*');
    $this->db->from('kelas');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_kelas_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('kelas');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }

  public function tambah_kelas($data)
  {
    $data_insert = [
      'nama_kelas' => $data['nama_kelas'],
      'deskripsi' => $data['deskripsi'],
      'harga' => $data['harga'],
      'gambar' => $data['gambar'],
      'status_kelas' => $data['status_kelas'],
      'status' => $data['status'],
      'kategori' => $data['kategori'],
      'instruktur' => $data['instruktur'],
      'tanggal_mulai' => $data['tanggal_mulai'],
      'bahan_bahan' => $data['bahan_bahan'],
      'alat_alat' => $data['alat_alat']
    ];
    return $this->db->insert('kelas', $data_insert);
  }

  public function get_items_in_cart($user_id)
  {
    $this->db->select('keranjang.*, kelas.id as kelas_id, kelas.nama_kelas, kelas.harga, kelas.gambar');
    $this->db->from('keranjang');
    $this->db->join('kelas', 'keranjang.kelas_id = kelas.id');
    $this->db->where('keranjang.user_id', $user_id);
    $query = $this->db->get();

    return $query->result();
  }

  public function update_kelas($id, $data)
  {
    $data_update = [
      'nama_kelas' => $data['nama_kelas'],
      'deskripsi' => $data['deskripsi'],
      'harga' => $data['harga'],
      'gambar' => $data['gambar'],
      'status_kelas' => $data['status_kelas'],
      'status' => $data['status'],
      'kategori' => $data['kategori'],
      'instruktur' => $data['instruktur'],
      'tanggal_mulai' => $data['tanggal_mulai'],
      'bahan_bahan' => $data['bahan_bahan'],
      'alat_alat' => $data['alat_alat']
    ];

    $this->db->where('id', $id);
    return $this->db->update('kelas', $data_update);
  }

  public function delete($id)
  {
    return $this->db->where('id', $id)->delete('kelas');
  }
}