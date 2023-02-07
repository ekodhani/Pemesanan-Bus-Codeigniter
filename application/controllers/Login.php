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

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		if($user){ // jika usernya ada
			if(md5($password) == $user['password']){ // cek password
			$data = [
				'email' => $user['email'],
				'id_role' => $user['id_role']
			];
			
			$this->session->set_userdata($data);
				// cek id_rolenya
				if ($user['id_role'] == 1) {
					redirect('admin');
				} else {
					redirect('user');
				}
			} else {
				$this->session->set_flashdata('message', 'Wrong Password!');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', 'Account Not Found!');
			redirect('login');
		}
	}

	public function daftar()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		
		$this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Nomor telepon', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email Ini Telah Terdaftar!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
			'min_length' => 'Password Minimal 8 character!'
		]);
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi password', 'required|trim|min_length[8]|matches[password]', [
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
				'nama' => htmlspecialchars($this->input->post('name', true)),
				'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => md5($this->input->post('password', true)),
				'id_role' => 2,
				'image' => 'default.jpg'
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message-success', 'Account has been created!');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message-success', 'Have a nice day!');
		redirect('login');
	}

	public function sendEmail($token, $type) 
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'makmurbuana091@gmail.com',
			'smtp_pass' => '@HeyJangan123',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->initialize($config);

		$this->email->from('makmurbuana091@gmail.com', 'BMC');
		$this->email->to($this->input->post('email'));
		
		if($type == 'forgot') {
			$this->email->subject('Reset Password Request');
			$data['link'] = base_url().'login/resetpassword?email='.$this->input->post('email').'&token='.urlencode($token);
			$body = $this->load->view('tamplate/reset_password_email', $data, true);
			$this->email->message($body);
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function reset_password() 
	{
		// if ($this->session->userdata('email')) {
		// 	redirect('user');
		// }
		
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		
		if ($this->form_validation->run() == false) {
			$data ['judul'] = 'Reset Password';
			$this->load->view('tamplate/header', $data);
			$this->load->view('reset_password_form', $data);
			$this->load->view('tamplate/footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email])->row_array();
			// var_dump($user);
			// die;

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);

				$this->sendEmail($token, 'forgot');
				$this->session->set_flashdata('message-success', 'Please check your email to reset your password');
				redirect('login');
			} else {
				$this->session->set_flashdata('message', 'Email not found!');
				redirect('login/reset_password');
			}
		}
	}
}
