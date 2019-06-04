<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_guru extends CI_model
{
	public function inputGuru()
	{
		$user    =
			[
				'username'            => $this->input->post('username', true),
				'password'            => $this->input->post('password', true),
				'role_id'             => 2
			];

		$dataGuru =
			[
				'guru_name'         		   	=> $this->input->post('name', true),
				'image_guru'         	=> 'default.jpg',
				'date_created_guru'    	=> time(),
				'alamat_guru'        	=> $this->input->post('alamat', true)
			];

		$subTeacher =
			[
				'kelas_id'     	=> $this->input->post('kelas_id', true),
				'pelajaran_id'  => $this->input->post('pelajaran_id', true),
				'subjects_id'	=> $this->input->post('kelas_id', true) + ($this->input->post('pelajaran_id', true) * 3)
			];

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data Guru has been added.</div>');

		$this->proses($user, $dataGuru, $subTeacher);
		redirect('guru');
	}

	public function proses($user, $dataGuru, $subTeacher)
	{
		$this->db->trans_start();
		$id = $this->tambahAkun($user);
		$dataGuru['guru_id']  = $id;
		$this->tambahGuru($dataGuru);
		$subTeacher['teacher_id']  = $id;
		$this->tambahSubTeacher($subTeacher);
		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function tambahAkun($data)
	{
		$this->db->insert('user', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	public function tambahGuru($data)
	{
		$db = $this->db->insert('tabel_guru', $data);
		return $db;
	}

	public function tambahSubTeacher($data)
	{
		$db = $this->db->insert('sub_teacher', $data);
		return $db;
	}

	public function dataGuru()
	{
		$queryGuru =
			"
			SELECT * 
			FROM sub_teacher st
			JOIN user u ON u.id = st.teacher_id
			JOIN tabel_guru tg ON tg.guru_id = st.teacher_id
			JOIN tabel_pelajaran tp ON tp.pelajaran_id = st.pelajaran_id
			JOIN tabel_kelas tk ON tk.kelas_id = st.kelas_id
			ORDER BY tk.kelas_id ,tp.pelajaran_id ASC 
			";
		// 
		$guru = $this->db->query($queryGuru)->result_array();
		return $guru;
	}

	public function dashboard_guru()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$queryGuru =
			"
			SELECT * FROM user u
			JOIN tabel_guru tg ON tg.guru_id = u.id
            JOIN sub_teacher st ON st.teacher_id = tg.guru_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = st.pelajaran_id
            JOIN tabel_kelas tk ON tk.kelas_id = st.kelas_id
			WHERE tg.guru_id = $user[id]
			";
		$guru = $this->db->query($queryGuru)->row_array();
		return $guru;
	}
}
