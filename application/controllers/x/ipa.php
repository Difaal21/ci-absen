<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ipa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('x/Action_ipa');
        $this->load->model('Action_model');
    }

    public function biologi()
    {
        $data['title']      = '';
        $data['user']    = $this->Action_model->queryAkun();
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
        $data['title']      = '';
        $data['user']    = $this->Action_model->queryAkun();
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
        $data['title']      = '';
        $data['user']    = $this->Action_model->queryAkun();
        $data['siswa'] = $this->Action_ipa->kimia();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('kelas/x/ipa/kimia.php', $data);
        $this->load->view('template/footer.php');
    }
}
