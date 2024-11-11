<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelHome extends CI_Model
{

  public function get_all_resep()
  {
    return $this->db->get('resep')->result();
  }

  public function get_resep_by_id($id)
  {
    return $this->db->get_where('resep', ['id' => $id])->row();
  }
}