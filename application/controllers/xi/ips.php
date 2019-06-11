<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ips extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('xi/Action_ips');
        $this->load->model('Action_model');
        $this->load->model('Action_absen');
    }

    /* ============================  Tampilan (View) Pelajaran =======================================*/

    public function ekonomi()
    {
        $data['title'] = 'Ekonomi';
        $data['user']  = $this->Action_model->queryAkun();
        # SISWA ekonomi KELAS 11
        $data['siswa'] = $this->Action_ips->ekonomi();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('kelas/xi/ips/ekonomi.php', $data);
        $this->load->view('template/footer.php');
    }

    public function geografi()
    {
        $data['title']  = 'Geografi';
        $data['user']   = $this->Action_model->queryAkun();
        # SISWA geografi KELAS 11
        $data['siswa'] = $this->Action_ips->geografi();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('kelas/xi/ips/geografi.php', $data);
        $this->load->view('template/footer.php');
    }

    public function sosiologi()
    {
        $data['title']  = 'Sosiologi';
        $data['user']   = $this->Action_model->queryAkun();
        # SISWA sosiologi KELAS 11
        $data['siswa'] = $this->Action_ips->sosiologi();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('kelas/xi/ips/sosiologi.php', $data);
        $this->load->view('template/footer.php');
    }


    /* ============================ Konfirmasi Absen Pelajaran : Kelas XII 11 ===================================*/
    public function message()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Maaf, Anda telah absen Hari ini !!! </b></div>');
        redirect('absen');
    }

    public function absenEkonomi()
    {
        $query = $this->Action_absen->subjectsEkonomi();
        if ($query->num_rows() == 1) {
            $this->message();
        } else {
            $this->Action_ips->absenEkonomi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil absen</div>');
            $this->ekonomi();
        }
    }

    public function absenGeografi()
    {
        $query = $this->Action_absen->subjectsGeografi();
        if ($query->num_rows() == 1) {
            $this->message();
        } else {
            $this->Action_ips->absenGeografi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil absen</div>');
            $this->geografi();
        }
    }

    public function absenSosiologi()
    {
        $query = $this->Action_absen->subjectsSosiologi();
        if ($query->num_rows() == 1) {
            $this->message();
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil absen</div>');
            $this->Action_ips->absenSosiologi();
            $this->sosiologi();
        }
    }
}
