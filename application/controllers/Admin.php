<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('id_admin')) redirect('auth/login_admin');
    }

    function index()
    {
        $data = [
            'title' => 'Halaman Dashboard Admin'
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/home', $data);
        $this->load->view('admin/footer', $data);
    }

    function list_advokat()
    {
        $data = [
            'title' => 'Halaman List Advokat',
            'advokat' => $this->Admin_model->get_advokat()->result()
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/list_advokat', $data);
        $this->load->view('admin/footer', $data);
    }

    function add_advokat()
    {
        $data = [
            'title' => 'Halaman Tambah Advokat',
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/add_advokat', $data);
        $this->load->view('admin/footer', $data);
    }

    function generateRandomString($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function do_add_advokat()
    {
        $config['upload_path']          = './foto_advokat/';
        $config['allowed_types']        = 'gif|jpg|JPG|png|PNG|jpeg|JPEG';
        $config['max_size']             = 5000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('pesanGagal', '<div class="alert alert-danger" role="alert">
            <strong style="color:white">Data Gagal ditambahkan!</strong>
        </div>');
            redirect('admin/list_advokat');
        } else {

            $image = $this->upload->data();
            $image = $image['file_name'];

            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('username')),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'foto' => $image,
                'email' => $this->input->post('email'),
                'no_tlp' => $this->input->post('no_tlp'),
            );
            $this->Admin_model->addAdvokat($data);
            $this->session->set_flashdata('success', 'Advokat Berhasil ditambahkan');
            redirect('admin/list_advokat');
        }
    }

    public function delete_advokat()
    {
        $id = $this->input->post('id_advokat'); //get data from ajax(post)
        $del = $this->Admin_model->delete_advokat($id);
    }

    function edit_advokat($id_advokat)
    {
        $data = [
            'title' => 'Halaman Edit User',
            'advokat' => $this->Admin_model->getIdAdvokat($id_advokat),
        ];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_advokat', $data);
        $this->load->view('admin/footer');
    }

    function do_edit_advokat()
    {
        $id_advokat = $this->input->post('id_advokat');
        $config['upload_path']          = './foto_advokat/';
        $config['allowed_types']        = 'gif|jpg|JPG|png|PNG|jpeg|JPEG';
        $config['max_size']             = 5000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'email' => $this->input->post('email'),
                'no_tlp' => $this->input->post('no_tlp'),
            ];
            $this->Admin_model->updateAdvokat($data, $id_advokat);
            $this->session->set_flashdata('success', 'Advokat Berhasil diedit');
            redirect('admin/list_advokat');
        } else {
            $image = $this->upload->data();
            $image = $image['file_name'];
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'foto' => $image,
                'email' => $this->input->post('email'),
                'no_tlp' => $this->input->post('no_tlp'),
            ];
            $this->Admin_model->updateAdvokat($data, $id_advokat);
            $this->session->set_flashdata('success', 'Advokat Berhasil diedit');
            redirect('admin/list_advokat');
        }
    }

    function list_user()
    {
        $data = [
            'title' => 'Halaman List Advokat',
            'user' => $this->Admin_model->get_user()->result()
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/list_user', $data);
        $this->load->view('admin/footer', $data);
    }

    function delete_user()
    {
        $id = $this->input->post('id_user'); //get data from ajax(post)
        $del = $this->Admin_model->delete_user($id);
    }

    public function list_pelayanan()
    {
        $data = [
            'title' => 'Halaman List Pelayanan',
            'kategori' => $this->db->get('kategori_konsultasi')->result()
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/list_pelayanan', $data);
        $this->load->view('admin/footer');
    }

    public function addPelayanan()
    {
        $data = [

            'title' => 'Halaman Tambah Pelayanan'
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/add_pelayanan', $data);
        $this->load->view('admin/footer');
    }

    public function do_addPelayanan()
    {
        $config['upload_path']          = './upload_kategori/';
        $config['allowed_types']        = 'gif|jpg|JPG|png|PNG|jpeg|JPEG';
        $config['max_size']             = 5000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('icon_kategori')) {
            $this->session->set_flashdata('pesanGagal', '<div class="alert alert-danger" role="alert">
            <strong style="color:white">Data Gagal ditambahkan!</strong>
        </div>');
            redirect('admin/list_pelayanan');
        } else {

            $image = $this->upload->data();
            $image = $image['file_name'];

            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi_kategori' => $this->input->post('deskripsi_kategori'),
                'icon_kategori' => $image
            );
            $this->Admin_model->addPelayanan($data);
            $this->session->set_flashdata('success', 'Kategori Pelayanan Berhasil ditambahkan');
            redirect('admin/list_pelayanan');
        }
    }

    public function edit_pelayanan($id_kategori)
    {
        $data = [
            'title' => 'Halaman Edit User',
            'kategori' => $this->Admin_model->getIdKategori($id_kategori),
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_kategori', $data);
        $this->load->view('admin/footer');
    }

    public function do_editPelayanan()
    {
        $id_kategori = $this->input->post('id_kategori');
        $config['upload_path']          = './upload_kategori/';
        $config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
        $config['max_size']             = 5000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('icon_kategori')) {
            $id_kategori = $this->input->post('id_kategori');
            $nama_kategori = $this->input->post('nama_kategori');
            $deskripsi_kategori = $this->input->post('deskripsi_kategori');

            $data = [
                'nama_kategori' => $nama_kategori,
                'deskripsi_kategori' => $deskripsi_kategori
            ];

            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori_konsultasi', $data);
            $this->session->set_flashdata('success', 'Pelayanan Berhasil diedit');
            redirect('admin/list_pelayanan');
        } else {
            $image = $this->upload->data();
            $image = $image['file_name'];

            $id_kategori = $this->input->post('id_kategori');
            $nama_kategori = $this->input->post('nama_kategori');
            $deskripsi_kategori = $this->input->post('deskripsi_kategori');

            $data = [
                'nama_kategori' => $nama_kategori,
                'deskripsi_kategori' => $deskripsi_kategori,
                'icon_kategori' => $image
            ];

            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori_konsultasi', $data);
            $this->session->set_flashdata('error', 'Pelayanan Gagal diedit');
            redirect('admin/list_pelayanan');
        }
    }

    public function deleteKategori()
    {
        $id = $this->input->post('id_kategori'); //get data from ajax(post)
        $del = $this->Admin_model->delKategori($id);
    }

    function list_konsultasi()
    {
        $data = [
            'title' => 'Halaman List Konsultasi Saya',
            'konsultasi' => $this->Admin_model->getKonsultasi()->result()
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/list_konsultasi', $data);
        $this->load->view('admin/footer', $data);
    }
}
