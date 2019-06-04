<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Action_guru');
        $this->load->model('Action_model');
    }
    public function index()
    {
        /*--- Dashboard*/
        $data['title']      = 'Data Guru';
        $data['user']    = $this->Action_model->queryAkun();
        $data['guru'] = $this->Action_guru->dataGuru();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('guru/data_guru.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tambah()
    {
        $this->form_validation->set_rules(
            'username',
            'NIK',
            'trim|required|numeric|min_length[7]|is_unique[user.username]',
            [
                'required'  => 'Please, type Teacher NIK',
                'is_unique' => 'This NIK has already registered!',
                'numeric'   => 'Only Number',
                'min_length' => 'Password too short!'
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required',
            [
                'required' => 'Need password to login'
            ]
        );

        $this->form_validation->set_rules('name', 'Full Name', 'trim|required', ['required' => 'name must filled']);

        if ($this->form_validation->run() == false) {
            //Data
            $data['title'] = 'Tambah Data Guru';
            $data['user']    = $this->Action_model->queryAkun();
            // Tambah Data Guru
            $this->load->view('template/header.php', $data);
            $this->load->view('template/sidebar.php', $data);
            $this->load->view('template/topbar.php', $data);
            $this->load->view('guru/tambah_guru.php', $data);
            $this->load->view('template/footer.php');
            $this->load->view('template/footer.php');
        } else {
            $this->Action_guru->inputGuru();
        }
    }
}
