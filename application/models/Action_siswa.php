<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_siswa extends CI_model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function inputSiswa()
	{
		$user    =
			[
				'username'  => $this->input->post('username', true),
				'password'  => $this->input->post('password', true),
				'role_id'	=> 3
			];

		$dataSiswa =
			[
				'siswa_name'    => $this->input->post('name', true),
				'alamat'        => $this->input->post('alamat', true),
				'image'         => 'default.jpg',
				'date_created'  => time()
			];


		$subStudent =
			[
				'kelas_id'		=> $this->input->post('kelas_id', true),
				'jurusan_id' 	=> $this->input->post('jurusan_id', true),
				'gc_id'			=>
				$this->input->post('kelas_id', true) + ($this->input->post('jurusan_id', true) * 3)
			];

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data Siswa has been added.</div>');

		$this->proses($user, $dataSiswa, $subStudent);
		redirect('siswa');
	}

	public function proses($user, $dataSiswa, $subStudent)
	{
		$this->db->trans_start();
		$id = $this->tambahAkun($user);
		$dataSiswa['siswa_id']  = $id;
		$this->tambahSiswa($dataSiswa);
		$subStudent['student_id']  = $id;
		$this->tambahSubStudent($subStudent);
		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function tambahAkun($data)
	{
		$this->db->insert('user', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	public function tambahSiswa($data)
	{
		$db = $this->db->insert('tabel_siswa', $data);
		return $db;
	}

	public function tambahSubStudent($data)
	{
		$db = $this->db->insert('sub_student', $data);
		return $db;
	}


	public function dataSiswa()
	{
		$querySiswa =
			"
			SELECT u.username, u.password, ts.siswa_name, tk.kelas, tj.jurusan, ts.alamat, ts.date_created, ts.siswa_id
			FROM sub_student ss
			JOIN user u ON u.id = ss.student_id
			JOIN tabel_siswa ts ON ts.siswa_id = ss.student_id
			JOIN tabel_kelas tk on tk.kelas_id = ss.kelas_id
			JOIN tabel_jurusan tj ON tj.jurusan_id = ss.jurusan_id
			ORDER BY tk.kelas_id ASC
			";
		$siswa = $this->db->query($querySiswa)->result_array();
		return $siswa;
	}

	public function queryAkun()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$query =
			"
			SELECT * FROM user u
			JOIN tabel_siswa ts ON ts.siswa_id = u.id
			WHERE ts.siswa_id  = $user[id]
			";
		$dashboard = $this->db->query($query)->row_array();
		return $dashboard;
	}

	public function dashboard_siswa()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$querySiswa =
			"
			SELECT ts.siswa_name, tk.kelas, tj.jurusan, ts.alamat, ts.image, u.username, tk.kelas_id
			FROM sub_student ss 
            JOIN tabel_siswa ts ON ts.siswa_id = ss.student_id
            JOIN user u ON u.id = ts.siswa_id
			JOIN tabel_kelas tk on tk.kelas_id = ss.kelas_id
			JOIN tabel_jurusan tj ON tj.jurusan_id = ss.jurusan_id
			WHERE ts.siswa_id  = $user[id]
			";
		$siswa = $this->db->query($querySiswa)->row_array();
		// var_dump($siswa);
		// die;
		return $siswa;
	}
}
