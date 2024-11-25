<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPembayaran extends CI_Model
{
  public function create_pembayaran($data)
  {
    $this->db->insert('pembayaran', $data);
    return $this->db->insert_id();
  }

  public function get_pembayaran_by_pembelian_id($pembelian_id)
  {
    return $this->db->get_where('pembayaran', ['pembelian_id' => $pembelian_id])->row_array();
  }
}