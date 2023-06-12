<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Login'
        ];
        $this->load->view('auth/login', $data);
    }

    function login_admin()
    {
        $data = [
            'title' => 'Halaman Login'
        ];
        $this->load->view('auth/login_admin', $data);
    }

    function do_login_admin()
    {
        $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
        $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
        $user = $this->Auth_model->get_admin($username); // Panggil fungsi get yang ada di UserModel.php
        if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
       Username Tidak Ditemukan
       </div>'); // Buat session flashdata
            redirect('auth/login_admin'); // Redirect ke halaman login
        } else {
            if ($password == $user->password) { // Jika password yang diinput sama dengan password yang didatabase
                $session = array(
                    'authenticated' => true,
                    'id_admin' => $user->id_admin,
                    'username' => $user->username,
                    'email' => $user->email,
                    'status' => "login",
                    'is_login' => true // Buat session authenticated
                );
                $this->session->set_userdata($session); // Buat session sesuai $session
                redirect('Admin'); // Redirect ke halaman welcome
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
         Harap Masukan Password Yang Benar
         </div>'); // Buat session flashdata
                redirect('auth/login_admin'); // Redirect ke halaman login
            }
        }
    }


    function login()
    {

        $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
        $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
        $user = $this->Auth_model->get($username); // Panggil fungsi get yang ada di UserModel.php
        if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <span style="color:white">Username Tidak Ditemukan</span>
       </div>'); // Buat session flashdata
            redirect('auth'); // Redirect ke halaman login
        } else {
            if ($password == $user->password) { // Jika password yang diinput sama dengan password yang didatabase
                $session = array(
                    'authenticated' => true,
                    'id_user' => $user->id_user,
                    'nama_lengkap' => $user->nama_lengkap, // Buat session authenticated dengan value true
                    'username' => $user->username,
                    'email' => $user->email,
                    'no_whatsapp' => $user->no_whatsapp,
                    'jenis_kelamin' => $user->jenis_kelamin,
                    'status' => "login",
                    'is_login' => true // Buat session authenticated
                );
                $this->session->set_userdata($session); // Buat session sesuai $session
                redirect('User'); // Redirect ke halaman welcome
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          <span style="color:white">Harap Masukan Password Yang Benar</span>
         </div>'); // Buat session flashdata
                redirect('auth'); // Redirect ke halaman login
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

    function register_user()
    {

        $data = [
            'title' => 'Halaman Regiter User'
        ];
        $this->load->view('auth/register_user', $data);
    }

    function do_register_user()
    {
        if ($this->input->post('submit')) {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'no_whatsapp' => $this->input->post('no_whatsapp'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin')
            ];
            $this->Auth_model->insertUser($data);
            $this->session->set_flashdata('success', 'Registrasi Berhasil');
            redirect('auth');
        }
    }
}
