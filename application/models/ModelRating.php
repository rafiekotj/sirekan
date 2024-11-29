<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelRating extends CI_Model
{
  public function get_average_rating($id_resep)
  {
    $this->db->select_avg('rating');
    $this->db->where('resep_id', $id_resep);
    $query = $this->db->get('rating');
    $result = $query->row();
    return $result->rating ? $result->rating : 0;
  }

  public function get_user_rating($id_resep, $user_id)
  {
    $this->db->where('resep_id', $id_resep);
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('rating');
    return $query->row();
  }

  public function insert_rating($id_resep, $user_id, $rating)
  {
    $data = [
      'resep_id' => $id_resep,
      'user_id' => $user_id,
      'rating' => $rating,
      'created_at' => date('Y-m-d H:i:s')
    ];
    return $this->db->insert('rating', $data);
  }

  public function update_rating($id_resep, $user_id, $rating)
  {
    $data = [
      'rating' => $rating,
      'updated_at' => date('Y-m-d H:i:s')
    ];
    $this->db->where('resep_id', $id_resep);
    $this->db->where('user_id', $user_id);
    return $this->db->update('rating', $data);
  }
}