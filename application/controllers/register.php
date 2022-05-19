<?php
defined('BASEPATH') or exit('No direct script access allowed');

class register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'register');
        $this->load->library('form_validation');
    }

    public function prosesregister()
    {
        $username    = $this->input->post('username');
        $email        = $this->input->post('email');
        $password    = $this->input->post('password');
        $alamat        = $this->input->post('alamat');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]');
        $this->form_validation->set_message('required', 'Mohon Maaf! Kolom <b>%s</b> Tidak Boleh Kosong.');
        $this->form_validation->set_message('is_unique', 'Mohon Maaf! <b>%s ' . $username . '</b> Sudah Digunakan.');
        $this->form_validation->set_message('min_length', 'Mohon Maaf! Kolom <b>%s</b> Minimal 5 Karakter');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $user_data = array(
                'username' => $username,
                'email' => $email,
                'password' => md5($password),
                'level' => 'Pembeli',
            );

            $user = $this->register->register_user($user_data);

            $customer_data = array(
                'user_id' => $user,
                'nama' => $username,
                'email' => $email,
                'alamat' => $alamat
            );

            $this->register->register_customer($customer_data);

            $this->session->set_flashdata('sukses', 'Selamat! Akun <b>' . $username . '</b> Berhasil Mendaftar. Silahkan Login');
            redirect(base_url('login'));
        }
    }
}
