<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelResep extends CI_Model
{
  // Mendapatkan semua resep, dapat difilter berdasarkan negara dan pencarian
  public function get_all_recipes($negara = null, $search = null)
  {
    if ($negara) {
      $this->db->where('negara', $negara);
    }
    if ($search) {
      $this->db->like('nama_resep', $search);
    }
    return $this->db->get('resep')->result();
  }

  // Mendapatkan daftar negara dari resep
  public function get_countries()
  {
    $this->db->select('negara');
    $this->db->distinct();
    return $this->db->get('resep')->result();
  }

  // Mendapatkan jumlah total resep sesuai filter
  public function get_total_recipes($negara = null, $search = null)
  {
    if ($negara) {
      $this->db->where('negara', $negara);
    }
    if ($search) {
      $this->db->like('nama_resep', $search);
    }
    return $this->db->count_all_results('resep');
  }

  // Mendapatkan resep dengan batasan pagination
  public function get_recipes_paginated($negara = null, $search = null, $limit, $start)
  {
    if ($negara) {
      $this->db->where('negara', $negara);
    }
    if ($search) {
      $this->db->like('nama_resep', $search);
    }
    $this->db->limit($limit, $start);

    return $this->db->get('resep')->result();
  }

  // Fungsi untuk menambahkan resep baru
  public function tambah_resep($data)
  {
    $data_insert = [
      'nama_resep' => $data['nama_resep'],
      'negara' => $data['negara'],
      'deskripsi' => $data['deskripsi'],
      'bahan' => $data['bahan'],
      'langkah' => $data['langkah'],
      'gambar' => $data['gambar'],
      'video_url' => $data['video_url']
    ];
    return $this->db->insert('resep', $data_insert);
  }
}