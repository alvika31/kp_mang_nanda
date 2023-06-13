<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Advokat_model extends CI_Model
{
    function getKonsultasi()
    {
        $this->db->select('*');
        $this->db->from('konsultasi');
        $this->db->join('kategori_konsultasi', 'kategori_konsultasi.id_kategori = konsultasi.id_kategori');
        $this->db->join('user', 'user.id_user = konsultasi.id_user');
        $this->db->order_by("konsultasi.id_konsultasi", "desc");
        $query = $this->db->get();
        return $query;
    }

    function detailKonsultasi($id_konsultasi)
    {
        $this->db->select('*');
        $this->db->from('konsultasi');
        $this->db->join('kategori_konsultasi', 'kategori_konsultasi.id_kategori = konsultasi.id_kategori');
        $this->db->join('user', 'user.id_user = konsultasi.id_user');
        $this->db->where('konsultasi.id_konsultasi', $id_konsultasi);
        $query = $this->db->get();
        return $query;
    }

    function do_jawab_konsultasi($data)
    {
        $result = $this->db->insert('jawab_konsultasi', $data);
        return $result;
    }

    function do_update_status_konsultasi($data, $konsultasi)
    {
        $this->db->where('id_konsultasi', $data);
        $this->db->update('konsultasi', $konsultasi);
    }

    function jawabKonsultasi($id_konsultasi, $id_advokat)
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
