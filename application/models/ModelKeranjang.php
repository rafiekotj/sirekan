<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKeranjang extends CI_Model
{
  public function get_items_by_user($user_id)
  {
    $this->db->select('keranjang.*, kelas.nama_kelas, kelas.harga, kelas.gambar');
    $this->db->from('keranjang');
    $this->db->join('kelas', 'kelas.id = keranjang.kelas_id');
    $this->db->where('keranjang.user_id', $user_id);
    $query = $this->db->get();
    return $query->result();
  }

  public function insert($data)
  {
    if (isset($data['user_id']) && isset($data['kelas_id'])) {
      return $this->db->insert('keranjang', $data);
    }
    return false;
  }

  public function get_item_by_user_and_kelas($user_id, $kelas_id)
  {
    if (empty($user_id) || empty($kelas_id)) {
      return null;
    }

    $this->db->select('*');
    $this->db->from('keranjang');
    $this->db->where('user_id', $user_id);
    $this->db->where('kelas_id', $kelas_id);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_by_id($id)
  {
    return $this->db->get_where('kelas', ['id' => $id])->row();
  }

  public function delete_item_by_id($item_id, $user_id)
  {
    $this->db->where('id', $item_id);
    $this->db->where('user_id', $user_id);
    return $this->db->delete('keranjang');
  }

  public function delete_all_by_user($user_id)
  {
    $this->db->where('user_id', $user_id);
    return $this->db->delete('keranjang');
  }
}