<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPembelian extends CI_Model
{

  public function get_riwayat_pembelian($user_id)
  {
    $this->db->select('pembelian.*, kelas.nama_kelas');
    $this->db->from('pembelian');
    $this->db->join('kelas', 'pembelian.kelas_id = kelas.id', 'left');
    $this->db->where('pembelian.user_id', $user_id);
    $this->db->order_by('pembelian.tanggal_pembelian', 'DESC');
    return $this->db->get()->result();
  }
}