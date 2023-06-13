<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    function get_advokat()
    {
        $this->db->select('*');
        $this->db->from('advokat');
        $query = $this->db->get();

        return $query;
    }

    function addAdvokat($data)
    {
        $result = $this->db->insert('advokat', $data);
        return $result;
    }

    function delete_advokat($id)
    {
        $this->db->where('id_advokat', $id);
        $this->db->delete('advokat');
    }

    function getIdAdvokat($id_advokat)
    {
        return $this->db->get_where('advokat', ['id_advokat' => $id_advokat])
            ->row_array();
    }

    function updateAdvokat($data, $id_advokat)
    {
        $this->db->where('id_advokat', $id_advokat);
        $this->db->update('advokat', $data);
    }

    function get_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();

        return $query;
    }

    function delete_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    function addPelayanan($data)
    {
        $result = $this->db->insert('kategori_konsultasi', $data);
        return $result;
    }

    function getIdKategori($id_kategori)
    {
        return $this->db->get_where('kategori_konsultasi', ['id_kategori' => $id_kategori])
            ->row_array();
    }

    public function delKategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori_konsultasi');
    }

    function getKonsultasi()
    {
        $this->db->select('*');
        $this->db->from('konsultasi');
        $this->db->join('kategori_konsultasi', 'kategori_konsultasi.id_kategori = konsultasi.id_kategori');
        $this->db->join('user', 'user.id_user = konsultasi.id_user');
        $this->db->join('jawab_konsultasi', 'jawab_konsultasi.id_konsultasi = konsultasi.id_konsultasi');
        $this->db->order_by("konsultasi.id_konsultasi", "desc");
        $query = $this->db->get();
        return $query;
    }
}
