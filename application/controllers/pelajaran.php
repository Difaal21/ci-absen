<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Action_pelajaran');
        $this->load->model('Action_model');
    }

    public function index()
    {
        $data['title'] = 'Pelajaran';
        $data['user']    = $this->Action_model->queryAkun();
        $data['pelajaran'] = $this->Action_pelajaran->getSubjects();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('pelajaran/data_pelajaran', $data);
        $this->load->view('template/footer.php');
    }
}
