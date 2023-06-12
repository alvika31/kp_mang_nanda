<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Page_model');
        $this->load->library('form_validation');
        date_default_timezone_set("Asia/jakarta");
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Home',
            'kategori' => $this->db->get('kategori_konsultasi')->result(),
            'konsul' =>  $this->Page_model->getKonsul()->result()
        ];
        $this->load->view('page/template/header', $data);
        $this->load->view('page/home', $data);
        $this->load->view('page/template/footer');
    }
    public function pospelayananhukum()
    {
        $data = [
            'title' => 'Halaman Home',
            'kategori' => $this->db->get('kategori_konsultasi')->result()
        ];
        $this->load->view('page/template/header', $data);
        $this->load->view('page/pospelayananhukum', $data);
        $this->load->view('page/template/footer');
    }

    public function do_addPos()
    {

        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Anda Harus Register dan Login terlebih dahulu');
            redirect('Page/pospelayananhukum');
        } else {

            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'status_konsultasi' => 0,
                'id_kategori' => $this->input->post('id_kategori'),
                'judul' => $this->input->post('judul'),
                'deskripsi_masalah' => $this->input->post('deskripsi_masalah'),
                'privasi' => $this->input->post('privasi'),
                'tgl_isi' => date('Y-m-d'),
                'time_isi' => date('H:i:s')
            );
            $this->Page_model->addPos($data);
            $this->session->set_flashdata('success', 'Kategori Pelayanan Berhasil ditambahkan');
            redirect('Page/pospelayananhukum');
        }
    }
    public function detailkonsul($id_konsultasi)
    {
        $data = [
            'a' => $this->Page_model->getIdkonsul($id_konsultasi)->row_array(),
            'title' => 'Halaman Detail Konsultasi'
        ];

        $this->load->view('page/template/header', $data);
        $this->load->view('page/detailkonsultasi', $data);
        $this->load->view('page/template/footer');
    }

    public function detailkategori($id_kategori)
    {
        $data = [
            'a' => $this->Page_model->getIdkategori($id_kategori)->result(),
            'kateg' => $this->Page_model->getIdkategoriT($id_kategori)->row_array(),
            'title' => 'Halaman Detail Kategori'
        ];

        $this->load->view('page/template/header', $data);
        $this->load->view('page/detailkategori', $data);
        $this->load->view('page/template/footer');
    }
}
