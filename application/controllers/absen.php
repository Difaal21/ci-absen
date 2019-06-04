<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Action_absen');
		$this->load->model('Action_model');
	}

	public function index()
	{
		$data['title']	= 'Absen Siswa';
		$data['user']   = $this->Action_model->queryAkun();
		$data['info']	= $this->Action_absen->absenSiswa();
		// var_dump($data);
		// die;
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/topbar.php', $data);
		$this->load->view('absen/absen_siswa.php', $data);
		$this->load->view('template/footer.php');
	}

	public function absenBiologi()
	{ }

	public function absenFisika()
	{ }

	public function absenKimia()
	{ }
}


// $nik                    = 	$this->session->userdata('nik');
// 		$date =  date('d-m-y');
// 		$v = $this->db->query("SELECT * from tbl_absen where nik='$nik' and tgl='$date'");


// 			if($v->num_rows() <> 0){				
// 				echo"Anda Telah Melakukan Absen Masuk Hari ini";
// 			}else{
// 				$data					=	array('nik'		=> $nik ,
// 												  'tgl'		=> date('d-m-y')
// 												  );
// 				$this->db->insert('tbl_absen',$data);
// 				redirect('karyawan/home');
// 			}
