<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Action_admin');
    }

    public function deleteGuru($id)
    {
        $this->Action_admin->deleteDataGuru($id);
        redirect('guru');
    }

    public function deleteSiswa($id)
    {
        $this->Action_admin->deleteDataSiswa($id);
        redirect('siswa');
    }
}
