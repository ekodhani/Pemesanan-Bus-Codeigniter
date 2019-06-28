<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_abtb');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['judul'] = "Login";
			$this->load->view('tamplate/header', $data);
			$this->load->view('login');
			$this->load->view('tamplate/footer');
		}else{
			// validasi sukses!
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email, 'password'=> md5($password)])->row_array();
		
		// jika usernya ada
		if($user){
			// cek password
			if(md5($password, $user['password'])){
			$data = [
				'email' => $user['email'],
				'id_role' => $user['id_role']
			];
			
			$this->session->set_userdata($data);
				// cek id_rolenya
				if ($user['id_role'] == 1) {
					redirect('admin');
				}else{
					redirect('user');
				}
			}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
			redirect('login');
			}
		}else{
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
		redirect('login');
		}
	}

	public function daftar()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required|trim');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email Ini Telah Terdaftar!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
			'min_length' => 'Password Minimal 8 character!'
		]);
		$this->form_validation->set_rules('password1', 'Retype Password', 'required|trim|min_length[8]|matches[password]', [
			'min_length' => 'Password Minimal 8 character!',
			'matches' => 'Password Tidak Cocok!'
		]);
		
		if ($this->form_validation->run() == false) {
			$data ['judul'] = 'Daftar';
			$this->load->view('tamplate/header', $data);
			$this->load->view('daftar');
			$this->load->view('tamplate/footer');
		}else{
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => md5($this->input->post('password', true)),
				'id_role' => 2,
				'image' => 'default.jpg'
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Akun Anda Berhasil Di Daftarkan,Mohon Segera Login Akun Anda</div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terima Kasih Sudah Login!</div>');
		redirect('login');
	}
}
