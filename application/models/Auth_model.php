<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    public function get($username)
    {
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('user')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }

    function insertUser($data)
    {
        $result = $this->db->insert('user', $data);
        return $result;
    }

    function get_admin($username)
    {
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('admin')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }
}
