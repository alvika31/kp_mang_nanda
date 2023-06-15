<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
    function myKonsultasi($id_user)
    {
        $this->db->select('*');
        $this->db->from('konsultasi');
        $this->db->join('user', 'user.id_user = konsultasi.id_user');
        $this->db->where('konsultasi.id_user', $id_user);
        $query = $this->db->get();
        return $query;
    }

    function detailKonsultasi($id_konsultasi)
    {
        $this->db->select('*');
        $this->db->from('konsultasi');
        $this->db->join('kategori_konsultasi', 'kategori_konsultasi.id_kategori = konsultasi.id_kategori');
        $this->db->where('konsultasi.id_konsultasi', $id_konsultasi);
        $query = $this->db->get();
        return $query;
    }

    function jawabKonsultasi($id_konsultasi)
    {
        $this->db->select('*');
        $this->db->from('konsultasi');
        $this->db->join('kategori_konsultasi', 'kategori_konsultasi.id_kategori = konsultasi.id_kategori');
        $this->db->join('user', 'user.id_user = konsultasi.id_user');
        $this->db->join('jawab_konsultasi', 'jawab_konsultasi.id_konsultasi = konsultasi.id_konsultasi');
        $this->db->join('advokat', 'advokat.id_advokat = jawab_konsultasi.id_advokat');
        $this->db->where('konsultasi.id_konsultasi', $id_konsultasi);

        $query = $this->db->get();
        return $query;
    }
}
