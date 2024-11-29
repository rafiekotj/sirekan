<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelResep extends CI_Model
{

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

  public function get_countries()
  {
    $this->db->select('negara');
    $this->db->distinct();
    return $this->db->get('resep')->result();
  }

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

  public function get_resep_by_id($id)
  {
    return $this->db->get_where('resep', ['id' => $id])->row();
  }

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

  public function update_resep($id, $data)
  {

    $data_update = [
      'nama_resep' => $data['nama_resep'],
      'negara' => $data['negara'],
      'deskripsi' => $data['deskripsi'],
      'bahan' => $data['bahan'],
      'langkah' => $data['langkah'],
      'gambar' => $data['gambar'],
      'video_url' => $data['video_url']
    ];

    $this->db->where('id', $id);
    return $this->db->update('resep', $data_update);
  }

  public function delete($id)
  {

    return $this->db->where('id', $id)->delete('resep');
  }
}