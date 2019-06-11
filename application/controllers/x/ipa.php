<?php
defined('BASEPATH') or exit('No direct script access allowed');
# Kelas X IPA
class Ipa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('x/Action_ipa');
        $this->load->model('Action_model');
        $this->load->model('Action_absen');
    }

    /* ============================  Tampilan (View) Pelajaran =======================================*/

    public function biologi()
    {
        $data['title'] = 'Biologi';
        $data['user']  = $this->Action_model->queryAkun();
        # SISWA BIOLOGI KELAS 10
        $data['siswa'] = $this->Action_ipa->biologi();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('kelas/x/ipa/biologi.php', $data);
        $this->load->view('template/footer.php');
    }

    public function fisika()
    {
        $data['title']  = 'Fisika';
        $data['user']   = $this->Action_model->queryAkun();
        # SISWA FISIKA KELAS 10
        $data['siswa'] = $this->Action_ipa->fisika();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('kelas/x/ipa/fisika.php', $data);
        $this->load->view('template/footer.php');
    }

    public function kimia()
    {
        $data['title']  = 'Kimia';
        $data['user']   = $this->Action_model->queryAkun();
        # SISWA KIMIA KELAS 10
        $data['siswa'] = $this->Action_ipa->kimia();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('kelas/x/ipa/kimia.php', $data);
        $this->load->view('template/footer.php');
    }


    /* ============================ Konfirmasi Absen Pelajaran : Kelas X 10 ===================================*/
    public function message()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Maaf, Anda telah absen Hari ini !!! </b></div>');
        redirect('absen');
    }

    public function absenBiologi()
    {
        $query = $this->Action_absen->subjectsBiologi();
        if ($query->num_rows() == 1) {
            $this->message();
        } else {
            $this->Action_ipa->absenBiologi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil absen</div>');
            $this->biologi();
        }
    }

    public function absenFisika()
    {
        $query = $this->Action_absen->subjectsFisika();
        if ($query->num_rows() == 1) {
            $this->message();
        } else {
            $this->Action_ipa->absenFisika();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil absen</div>');
            $this->fisika();
        }
    }

    public function absenKimia()
    {
        $query = $this->Action_absen->subjectsKimia();
        if ($query->num_rows() == 1) {
            $this->message();
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil absen</div>');
            $this->Action_ipa->absenKimia();
            $this->kimia();
        }
    }
}
