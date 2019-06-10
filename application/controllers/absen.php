<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Action_absen');
		$this->load->model('Action_model');
		$this->load->model('Action_siswa');
		$this->load->library('form_validation');
	}
	/* ================ Tampilan Index Absen ==========================================*/
	public function index()
	{
		$data['title']	= 'Absen Siswa';
		$data['user']   = $this->Action_model->queryAkun();
		$data['info']	= $this->Action_absen->queryAbsen();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/topbar.php', $data);
		$this->load->view('absen/absen_siswa.php', $data);
		$this->load->view('template/footer.php');
	}

	/*========================= Konfirmasi Absen tidak masuk (View Konfirmasi) ==================================== */
	public function konfirmasi_absen()
	{
		$data['title']	= 'Konfirmasi Absen';
		$data['user']   = $this->Action_model->queryAkun();
		$data['info']	= $this->Action_absen->queryAbsen();
		$data['ket']	= $this->Action_absen->getDataAbsen();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/topbar.php', $data);
		$this->load->view('absen/konfirmasi_absen.php', $data);
		$this->load->view('template/footer.php');
	}
	/*================ Kondisi konfirmasi absen siswa ============================= */
	public function changeAction($id, $choose)
	{
		switch ($choose) {
			case 'konfirmasi':
				$action = 1 + 1;
				break;
			case 'tolak':
				$action = 2 + 1;
				break;
			case 'tunggu_konfirmasi':
				$action = 3 - 2;
				break;
		}
		$data = [
			'konfirmasi_id' => $action
		];
		$update = $this->Action_absen->changeAction($data, $id);
		redirect('absen/konfirmasi_absen');
	}
	/*========================= Absen tidak masuk (View Keterangan) ==================================== */
	public function message()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Maaf, Anda telah absen Hari ini !!! </b></div>');
		redirect('absen');
	}

	public function keterangan_absen($pelajaran)
	{
		/*================================= Form Validation Keterangan Absen ================================ */
		$this->form_validation->set_rules(
			'absen_id',
			'Absen',
			'required',
			[
				'required' => 'Please, Choose one the Absen!'
			]
		);
		$this->form_validation->set_rules(
			'pelajaran_id',
			'Pelajaran',
			'required',
			[
				'required' => 'Please,Choose the subject!'
			]
		);
		$this->form_validation->set_rules(
			'keterangan',
			'Keterangan',
			'required',
			[
				'required' => 'Tell us your reason!!!'
			]
		);

		if ($this->form_validation->run() == false) {
			// View Keterangan Absen
			$data['title']	= 'Keterangan Absen';
			$data['user']   = $this->Action_model->queryAkun();
			$data['info']	= $this->Action_absen->queryAbsen();
			$data['ket']	= $this->Action_siswa->dashboard_siswa();
			$this->load->view('template/header.php', $data);
			$this->load->view('template/sidebar.php', $data);
			$this->load->view('template/topbar.php', $data);
			$this->load->view('absen/keterangan.php', $data);
			$this->load->view('template/footer.php');
		} else {
			$xBiologi = $this->Action_absen->subjectsBiologi();
			$xFisika = $this->Action_absen->subjectsFisika();
			$xKimia = $this->Action_absen->subjectsKimia();

			switch ($pelajaran) {
				case 'Biologi':
					if ($xBiologi->num_rows() == 1) {
						$this->message();
						redirect('absen');
					} else {
						$this->Action_absen->keterangan_absen();
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil absen</div>');
						redirect('absen');
					}
					break;
				case 'Fisika':
					if ($xFisika->num_rows() == 1) {
						$this->message();
						redirect('absen');
					} else {
						$this->Action_absen->keterangan_absen();
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil absen</div>');
						redirect('absen');
					}
					break;
				case 'Kimia':
					if ($xKimia->num_rows() == 1) {
						$this->message();
						redirect('absen');
					} else {
						$this->Action_absen->keterangan_absen();
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil absen</div>');
						redirect('absen');
					}
					break;
			}
		}
	}
	/* ===================================================================================== */
}
