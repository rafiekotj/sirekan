<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPembayaran extends CI_Model
{

  public function create_pembayaran($data)
  {
    $this->db->insert('pembayaran', $data);
    return $this->db->insert_id();
  }
}