<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Action_siswa');
        $this->load->model('Action_model');
    }

    public function index()
    {
        $data['title']  = 'Data Siswa';
        $data['user']    = $this->Action_model->queryAkun();
        $data['siswa'] = $this->Action_siswa->dataSiswa();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('siswa/data_siswa.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tambah()
    {
        $this->form_validation->set_rules(
            'username',
            'NIS',
            'trim|required|numeric|min_length[7]|is_unique[user.username]',
            [
                'required'      => 'Please, type student NIS',
                'is_unique'     => 'This NIS has already registered!',
                'numeric'       => 'Only Number',
                'min_length'    => 'NIS too short!'
            ]
        );
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required', ['required' => 'name must filled']);

        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required',
            [
                'required' => 'Need password to add a student account'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data Siswa';
            $data['user']    = $this->Action_model->queryAkun();
            $data['siswa']   = $this->Action_siswa->dataSiswa();
            $this->load->view('template/header.php', $data);
            $this->load->view('template/sidebar.php', $data);
            $this->load->view('template/topbar.php', $data);
            $this->load->view('siswa/tambah_siswa.php', $data);
            $this->load->view('template/footer.php');
        } else {
            // Memanggil function inputSiswa di model Action_siswa
            $this->Action_siswa->inputSiswa();
        }
    }
}
