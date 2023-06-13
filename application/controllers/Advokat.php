<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Advokat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Advokat_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('id_advokat')) redirect('auth/login_advokat');
    }

    function index()
    {
        $data = [
            'title' => 'Halaman Dashboard Advokat'
        ];
        $this->load->view('advokat/header', $data);
        $this->load->view('advokat/sidebar', $data);
        $this->load->view('advokat/home', $data);
        $this->load->view('advokat/footer', $data);
    }

    function list_konsultasi()
    {
        $data = [
            'title' => 'Halaman List Konsultasi Saya',
            'konsultasi' => $this->Advokat_model->getKonsultasi()->result()
        ];
        $this->load->view('advokat/header', $data);
        $this->load->view('advokat/sidebar', $data);
        $this->load->view('advokat/list_konsultasi', $data);
        $this->load->view('advokat/footer', $data);
    }

    function detail_konsultasi($id_konsultasi)
    {
        $id_advokat = $this->session->userdata('id_advokat');
        $data = [
            'title' => 'Halaman List Konsultasi Saya',
            'konsultasi' => $this->Advokat_model->detailKonsultasi($id_konsultasi)->row_array(),
            'jawab_konsultasi' => $this->Advokat_model->jawabKonsultasi($id_konsultasi, $id_advokat)->row_array()
        ];

        $this->load->view('advokat/header', $data);
        $this->load->view('advokat/sidebar', $data);
        $this->load->view('advokat/detail_konsultasi', $data);
        $this->load->view('advokat/footer', $data);
    }

    function do_jawab_konsultasi()
    {

        $data = [
            'id_advokat' => $this->input->post('id_advokat'),
            'id_konsultasi' => $this->input->post('id_konsultasi'),
            'isi_jawab' => $this->input->post('isi_jawab'),
            'show_jawab' => $this->input->post('show_jawab'),
            'isi_jawab' => $this->input->post('isi_jawab'),
            'tgl_jawab' => date('Y-m-d'),
            'jam_jawab' => date('H:i:s')
        ];

        $konsultasi = [
            'status_konsultasi' => 1
        ];

        $this->Advokat_model->do_jawab_konsultasi($data);
        $this->Advokat_model->do_update_status_konsultasi($data['id_konsultasi'], $konsultasi);
        redirect('advokat/list_konsultasi');
    }
}
