<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Action_model');
        $this->load->model('Action_cetak');
    }

    public function dokumen()
    {
        $data['title'] = 'Print Dokumen';
        $data['user']  = $this->Action_model->queryAkun();
        $data['ket']   = $this->Action_cetak->queryKetAbsen();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('cetak/dokumen.php', $data);
        $this->load->view('template/footer.php');
    }

    public function absen()
    {
        $data['title'] = 'Print Absen';
        $data['user']  = $this->Action_cetak->queryUser();
        $data['ket']  = $this->Action_cetak->queryAbsen();
        $data['hadir']  = $this->Action_cetak->hadir();
        $data['sakit']  = $this->Action_cetak->sakit();
        $data['izin']  = $this->Action_cetak->izin();
        $data['alpa']  = $this->Action_cetak->alpa();
        $data['total']  = $this->Action_cetak->total();
        $this->load->view('template/header.php', $data);
        $this->load->view('cetak/print_absen.php', $data);
        $this->load->view('template/footer.php');
    }
}
