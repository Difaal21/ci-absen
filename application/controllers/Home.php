<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Action_model');
		$this->load->model('Action_guru');
		$this->load->model('Action_siswa');
	}

	public function index()
	{
		$this->form_validation->set_rules(
			'username',
			'Username',
			'trim|required',
			[
				'required' => 'Please, type your username'
			]
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required',
			[
				'required' => 'Need password to login'
			]
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('template/header.php', $data);
			$this->load->view('home/login.php');
			$this->load->view('template/footer.php');
		} else {
			$this->_login('');
		}
	}

	private function _login()
	{
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$user		= $this->db->get_where('user', ['username' => $username])->row_array();

		// Jika user ada
		if ($user) {
			// cek password
			if ($password == $user['password']) {
				$data =
					[
						'id' 		=> $user['id'],
						'username' 	=> $user['username'],
						'role_id' 	=> $user['role_id']
					];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('home/dashboard');
				} elseif ($user['role_id'] == 2) {
					redirect('home/dashboard_guru');
				} else {
					redirect('home/dashboard_siswa');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your password is uncorrect!</div>');
				redirect('home');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username is not registered!</div>');
			redirect('home');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

	public function dashboard()
	{
		$data['title'] 	= 'Beranda';
		$data['user']	= $this->Action_model->queryAkun();
		$data['menu'] 	= $this->db->get('user_menu')->result_array();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/topbar.php', $data);
		$this->load->view('home/dashboard.php', $data);
		$this->load->view('template/footer.php');
	}
	public function dashboard_guru()
	{
		$data['title'] 	= 'Beranda';
		$data['user']	= $this->Action_model->queryAkun();
		$data['menu'] 	= $this->db->get('user_menu')->result_array();
		$data['info']   = $this->Action_guru->dashboard_guru();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/topbar.php', $data);
		$this->load->view('home/dashboard_guru.php', $data);
		$this->load->view('template/footer.php');
	}

	public function dashboard_siswa()
	{
		$data['title'] 	= 'Beranda';
		$data['user']	= $this->Action_model->queryAkun();
		$data['menu'] 	= $this->db->get('user_menu')->result_array();
		$data['info']	= $this->Action_siswa->dashboard_siswa();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/topbar.php', $data);
		$this->load->view('home/dashboard_siswa.php', $data);
		$this->load->view('template/footer.php');
	}
}
