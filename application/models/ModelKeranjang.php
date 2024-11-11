<?php
class ModelKeranjang extends CI_Model
{
  public function get_items_by_user($user_id)
  {
    $this->db->select('keranjang.*, kelas.nama_kelas, kelas.harga, kelas.gambar'); // Include `harga` and other fields
    $this->db->from('keranjang');
    $this->db->join('kelas', 'kelas.id = keranjang.kelas_id'); // Join with the `kelas` table
    $this->db->where('keranjang.user_id', $user_id);
    $query = $this->db->get();
    return $query->result(); // Returns the items with kelas details
  }


  // Fungsi untuk menambahkan item ke keranjang
  public function insert($data)
  {
    return $this->db->insert('keranjang', $data);
  }

  // Fungsi untuk memeriksa apakah kelas sudah ada di keranjang pengguna
  public function get_item_by_user_and_kelas($user_id, $kelas_id)
  {
    $this->db->select('*');
    $this->db->from('keranjang');
    $this->db->where('user_id', $user_id);
    $this->db->where('kelas_id', $kelas_id);
    $query = $this->db->get();
    return $query->row(); // Returns the row if the item is found, otherwise null
  }
  public function get_by_id($id)
  {
    return $this->db->get_where('kelas', ['id' => $id])->row();
  }

  public function delete_item_by_id($item_id, $user_id)
  {
    $this->db->where('id', $item_id);
    $this->db->where('user_id', $user_id);
    $this->db->delete('keranjang');
  }


  public function delete_all_by_user($user_id)
  {
    $this->db->where('user_id', $user_id);
    $this->db->delete('keranjang');
  }
}