<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_model extends CI_model
{
	public function registration()
	{
		$username = $this->input->post('username', true);
		$data =
			[
				'name' => $this->input->post('name', true),
				'username' => $username,
				'password' => $this->input->post('password', true),
				'role_id' => $this->input->post('role_id', true),
				'date_created' => time()
			];

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');

		$this->db->insert('user', $data);
		redirect('home/dashboard');
	}


	public function queryAkun()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$query =
			"
			SELECT * FROM user u
			LEFT JOIN tabel_siswa ts ON ts.siswa_id = u.id
			LEFT JOIN tabel_guru tg ON tg.guru_id = u.id
			WHERE ts.siswa_id  = $user[id] OR tg.guru_id = $user[id]
			";
		$dashboard = $this->db->query($query)->row_array();
		return $dashboard;
	}
}
