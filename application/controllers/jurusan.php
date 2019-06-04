<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Action_jurusan');
        $this->load->model('Action_model');
    }

    public function index()
    { }

    public function ipa()
    {
        $data['title']  = 'IPA';
        $data['user']    = $this->Action_model->queryAkun();
        $data['jurusanIpa'] = $this->Action_jurusan->jurusanIpa();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('jurusan/ipa.php', $data);
        $this->load->view('template/footer.php');
    }

    public function ips()
    {
        $data['title'] = 'IPS';
        $data['user']    = $this->Action_model->queryAkun();
        $data['jurusanIps'] = $this->Action_jurusan->jurusanIps();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('jurusan/ips.php', $data);
        $this->load->view('template/footer.php');
    }
}
