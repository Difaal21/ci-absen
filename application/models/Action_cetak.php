<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_cetak extends CI_model
{

	public function queryKetAbsen()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

		$query =
			"
            SELECT * FROM absen_siswa asis 
            JOIN class_subjects cs ON cs.subjects_id = asis.subjects_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = asis.pelajaran_id
            JOIN tabel_kelas tk ON tk.kelas_id = asis.kelas_id 
            JOIN tabel_absen ta ON ta.absen_id = asis.absen_id
            JOIN subjects_group sg ON sg.pelajaran_id = tp.pelajaran_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            JOIN user u ON u.username = asis.username
            JOIN sub_student ss ON ss.student_id = u.id
            JOIN tabel_siswa ts ON ts.siswa_id = ss.student_id
            JOIN tabel_konfirmasi tkon ON tkon.konfirmasi_id = asis.konfirmasi_id
            JOIN tabel_guru tg ON tg.guru_id = cs.guru_id
            JOIN sub_teacher st ON st.teacher_id = tg.guru_id
            WHERE u.username = $user[username]
            ORDER BY asis.tanggal ASC
            ";
		$absen = $this->db->query($query)->result_array();
		return $absen;
	}

	public function queryUser()
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

	public function queryAbsen()
	{
		$absen = $this->db->get('tabel_absen')->result_array();
		return $absen;
	}

	public function queryJumlahAbsen()
	{
		$absen = $this->db->get('absen_siswa')->result_array();
		return $absen;
	}

	public function hadir()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

		$queryHadir =
			"
			SELECT * FROM absen_siswa asis
			JOIN user u ON u.username = asis.username
			JOIN tabel_absen ta ON ta.absen_id =  asis.absen_id
			WHERE konfirmasi_id = 1 AND  asis.absen_id = 1 AND $user[username] = u.username
            AND (SELECT COUNT(absen_id) FROM absen_siswa)
			";
		$hadir = $this->db->query($queryHadir)->num_rows();
		return $hadir;
	}

	public function sakit()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

		$querySakit =
			"
			SELECT * FROM absen_siswa asis
			JOIN user u ON u.username = asis.username
			JOIN tabel_absen ta ON ta.absen_id =  asis.absen_id
			WHERE konfirmasi_id = 1 AND  asis.absen_id = 2 AND $user[username] = u.username
            AND (SELECT COUNT(absen_id) FROM absen_siswa)
			";
		$sakit = $this->db->query($querySakit)->num_rows();
		return $sakit;
	}

	public function izin()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

		$queryIzin =
			"
			SELECT * FROM absen_siswa asis
			JOIN user u ON u.username = asis.username
			JOIN tabel_absen ta ON ta.absen_id =  asis.absen_id
			WHERE konfirmasi_id = 1 AND  asis.absen_id = 3 AND $user[username] = u.username
            AND (SELECT COUNT(absen_id) FROM absen_siswa)
			";
		$izin = $this->db->query($queryIzin)->num_rows();
		return $izin;
	}

	public function alpa()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

		$queryAlpa =
			"
			SELECT * FROM absen_siswa asis
			JOIN user u ON u.username = asis.username
			JOIN tabel_absen ta ON ta.absen_id =  asis.absen_id
			WHERE konfirmasi_id = 1 AND  asis.absen_id = 4 AND $user[username] = u.username
            AND (SELECT COUNT(absen_id) FROM absen_siswa)
			";
		$alpa = $this->db->query($queryAlpa)->num_rows();
		return $alpa;
	}

	public function total()
	{
		$user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

		$queryAlpa =
			"
			SELECT * FROM absen_siswa asis
			JOIN user u ON u.username = asis.username
			JOIN tabel_absen ta ON ta.absen_id =  asis.absen_id
			WHERE konfirmasi_id = 1 AND $user[username] = u.username
            AND (SELECT COUNT(absen_id) FROM absen_siswa)
			";
		$alpa = $this->db->query($queryAlpa)->num_rows();
		return $alpa;
	}
}
