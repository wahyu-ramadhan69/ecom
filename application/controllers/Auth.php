<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->model('Admin_model');
		$this->load->library('form_validation');
	}

	public function login()
	{
		$this->load->view('auth/login');
	}

	public function proseslogin()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_message('required', 'Mohon Maaf! Kolom <b>%s</b> Tidak Boleh Kosong.');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login');
		} else {
			$cek = $this->Auth_model->CekLogin('user', array('username' => $username, 'password' => md5($password)));

			if ($cek->num_rows() > 0) {
				$data = $cek->row_array();

				if ($data['level'] == 'Admin') {
					$this->session->set_userdata('level', 'Admin');
					$this->session->set_userdata('username', $data['username']);
					redirect(base_url('admin'));
				}
				if ($data['level'] == 'Pembeli') {
					$this->session->set_userdata('level', 'Pembeli');
					$this->session->set_userdata('username', $data['username']);
					redirect(base_url('/'));
				}
			} else {
				$cek = $this->Auth_model->CekLogin('user', array('username' => $username, 'password' => md5($password)));
				$data = $cek->row_array();

				if ($data['username'] != $username && $data['password'] != $password) {
					$this->session->set_flashdata('error', 'Akun Tidak Terdaftar');
					redirect(base_url('login'));
				} else {
					if ($data['password'] != $password) {
						$this->session->set_flashdata('error', 'Kata Sandi Salah');
						redirect(base_url('login'));
					}
				}
			}
		}
	}


	public function register()
	{
		$this->load->view('auth/register');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'), 'refresh');
	}

	public function forgot()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'valid_email' => 'Mohon maaf format email kamu salah'
		]);
		if ($this->form_validation->run() == false) {

			$this->load->view('auth/forgot');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'tanggal_dibuat' => time()
				];

				$this->db->insert('user_token', $user_token);

				$this->_sendEmail($token);
				$this->session->set_flashdata('sukses', 'silahkan buka email kamu untuk ubah password');
				redirect(base_url('Auth/forgot'));
			} else {
				$this->session->set_flashdata('error', 'email tidak terdaftar');
				redirect(base_url('Auth/forgot'));
			}
		}
	}


	public function cari()
	{
		$keyword = $this->input->post('keyword');
		$data = $this->Auth_model->cari($keyword);
		$data = array('data' => $data);
		if ($data['data'] == NULL) {
			$this->session->set_flashdata('error', 'Email Tidak Terdaftar');
			redirect(base_url('login'));
		} else {
			$this->load->view('auth/gantipass', $data);
		}
	}
	public function prosesforgotpass()
	{
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|min_length[5]|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password', 'trim|required|min_length[5]|alpha_numeric|matches[password_baru]|xss_clean');
		$this->form_validation->set_message('required', 'Mohon Maaf! Kolom <b>%s</b> Tidak Boleh Kosong');
		$this->form_validation->set_message('min_length', 'Mohon Maaf! <b>%s</b> Minimal <b>%s</b> Karakter');
		$this->form_validation->set_message('matches', 'Mohon Maaf! Kolom <b>%s</b> Tidak Sama dengan Kolom Password Baru');

		if ($this->form_validation->run() == FALSE) {
			$where = array('id' => $this->input->post('id'));
			$data = $this->Admin_model->GetWhere('user', $where);
			$data = array('data' => $data);
			$this->load->view('auth/gantipass', $data);
		} else {
			$where = array('id' => $this->input->post('id'));
			$data = array(
				'password' => md5($this->input->post('password_baru')),
			);
			$this->Admin_model->Update('user', $data, $where);
			$this->session->set_flashdata('sukses', 'Berhasil Mengubah Password');
			redirect(base_url('Auth/login'));
		}
	}

	private function _sendEmail($token)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'fruitablesshop@gmail.com',
			'smtp_pass' => 'BD5284DT',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->email->initialize($config);

		$this->load->library('email', $config);

		$this->email->from('fruitablesshop@gmail.com', 'Frutables Shop');
		$this->email->to($this->input->post('email'));
		$this->email->subject('Forgot Password');
		$this->email->message('Silahkan klik link berikut untuk mengubah password kamu : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Ubah Password</a>');

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->ubahpass();
			} else {
				$this->session->set_flashdata('error', 'Token mu salah');
				redirect(base_url('Auth/login'));
			}
		} else {
			$this->session->set_flashdata('error', 'Email tidak terdaftar');
			redirect(base_url('Auth/login'));
		}
	}

	public function ubahpass()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth/login');
		}
		$this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password2', 'trim|required|min_length[5]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/gantipass');
		} else {
			$password = $this->input->post('password1');
			$pass = md5($password);

			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $pass);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->db->delete('user_token', ['email' => $email]);

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('sukses', 'password berhasil di ubah');
			redirect(base_url('Auth/login'));
		}
	}
}
