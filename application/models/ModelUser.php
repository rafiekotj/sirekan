<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
  public function register($data)
  {
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    return $this->db->insert('users', $data);
  }

  public function login($username, $password)
  {
    $this->db->where('username', $username);
    $user = $this->db->get('users')->row();

    if ($user && password_verify($password, $user->password)) {
      return $user;
    }
    return false;
  }

  public function getUserById($id)
  {
    return $this->db->get_where('users', ['id' => $id])->row();
  }

  public function update_user($user_id, $data)
  {
    $this->db->where('id', $user_id);
    return $this->db->update('users', $data);
  }

  public function update_membership($user_id, $membership_type)
  {

    $valid_memberships = ['gratis', 'bulanan', 'seumur_hidup'];
    if (!in_array($membership_type, $valid_memberships)) {
      return false;
    }

    $data = [
      'membership_type' => $membership_type,
      'updated_at' => date('Y-m-d H:i:s')
    ];

    $this->db->where('id', $user_id);
    return $this->db->update('users', $data);
  }
}