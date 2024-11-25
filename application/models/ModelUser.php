<?php

class ModelUser extends CI_Model
{
  // Fungsi untuk mendaftar pengguna baru
  public function register($data)
  {
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    return $this->db->insert('users', $data);
  }

  // Fungsi untuk login
  public function login($username, $password)
  {
    $this->db->where('username', $username);
    $user = $this->db->get('users')->row();

    if ($user && password_verify($password, $user->password)) {
      return $user;
    }
    return false;
  }

  // Fungsi untuk mendapatkan data pengguna berdasarkan ID
  public function getUserById($id)
  {
    return $this->db->get_where('users', ['id' => $id])->row();
  }

  // Perbarui data user
  public function update_user($user_id, $data)
  {
    $this->db->where('id', $user_id);
    return $this->db->update('users', $data); // Update data user di tabel 'users'
  }

  // Fungsi untuk memperbarui status membership pengguna
  public function update_membership($user_id, $membership_type)
  {
    // Pastikan jenis membership valid
    $valid_memberships = ['gratis', 'bulanan', 'seumur_hidup'];
    if (!in_array($membership_type, $valid_memberships)) {
      return false; // Jika tipe membership tidak valid
    }

    $data = [
      'membership_type' => $membership_type,
      'updated_at' => date('Y-m-d H:i:s') // Memperbarui timestamp saat membership diubah
    ];

    $this->db->where('id', $user_id);
    return $this->db->update('users', $data);
  }
}