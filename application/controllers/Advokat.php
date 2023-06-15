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
        $id_kategori = $this->session->userdata('id_kategori');
        $data = [
            'title' => 'Halaman List Konsultasi Saya',
            'konsultasi' => $this->Advokat_model->getKonsultasi($id_kategori)->result()
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
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'edwarpikpik@gmail.com',  // Email gmail
            'smtp_pass'   => 'eyaptxyxdinmbqlv',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $html = $this->input->post('isi_jawab');

        // Remove unwanted tags and attributes
        $html = strip_tags($html);
        $html = preg_replace('/\s+/', ' ', $html);

        // Convert HTML entities to plain text
        $html = html_entity_decode($html);

        $this->load->library('email', $config);
        $this->email->from('edwarpikpik@gmail.com', 'Konsultasi Hukum');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Jawaban Konsultasi');
        $this->email->message($html);
        $result = $this->email->send();

        $data = [
            'id_advokat' => $this->input->post('id_advokat'),
            'id_konsultasi' => $this->input->post('id_konsultasi'),
            'isi_jawab' => $this->input->post('isi_jawab'),
            'tgl_jawab' => date('Y-m-d'),
            'jam_jawab' => date('H:i:s')
        ];

        $konsultasi = [
            'status_konsultasi' => 1
        ];

        $this->Advokat_model->do_jawab_konsultasi($data);
        $this->Advokat_model->do_update_status_konsultasi($data['id_konsultasi'], $konsultasi);
        if ($this->email->send()) {
            echo 'Email sent successfully.';
        } else {
            echo 'Email sending failed.';
        }
        redirect('advokat/list_konsultasi');
    }
}
