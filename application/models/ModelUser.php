<?php
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
}
