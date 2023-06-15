<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('id_user')) redirect('auth');
    }

    function index()
    {
        $data = [
            'title' => 'Halaman Dashboard User'
        ];
        $this->load->view('user/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('user/home', $data);
        $this->load->view('user/footer', $data);
    }

    function list_konsultasi()
    {
        $id_user = $this->session->userdata('id_user');
        $data = [
            'title' => 'Halaman List Konsultasi Saya',
            'konsultasi' => $this->User_model->myKonsultasi($id_user)->result()
        ];
        $this->load->view('user/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('user/list_konsultasi', $data);
        $this->load->view('user/footer', $data);
    }

    function my_detail_konsultasi($id_konsultasi)
    {
        $data = [
            'title' => 'Halaman Detail Konsultasi Saya',
            'konsultasi' => $this->User_model->detailKonsultasi($id_konsultasi)->row_array(),
            'jawab_konsultasi' => $this->User_model->jawabKonsultasi($id_konsultasi)->row_array()
        ];
        $this->load->view('user/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('user/detail_konsultasi', $data);
        $this->load->view('user/footer', $data);
    }
}
