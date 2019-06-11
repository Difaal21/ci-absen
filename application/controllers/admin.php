<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Action_admin');
        $this->load->model('Action_model');
    }

    public function dashboard()
    {
        $data['title']     = 'Beranda';
        $data['user']    = $this->Action_model->queryAkun();
        $data['menu']     = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('home/dashboard.php', $data);
        $this->load->view('template/footer.php');
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

    public function editDataGuru($id)
    {
        $this->form_validation->set_rules(
            'username',
            'NIK',
            'trim|required|numeric|min_length[7]',
            [
                'required'  => 'Please, type Teacher NIK',
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

        $this->form_validation->set_rules(
            'kelas_id',
            'Kelas',
            'required',
            [
                'required' => 'Please,Choose the subject!'
            ]
        );

        $this->form_validation->set_rules(
            'pelajaran_id',
            'Pelajaran',
            'required',
            [
                'required' => 'Tell us your reason!!!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->viewEditGuru($id);
        } else {
            $this->Action_admin->updateDataGuru();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Guru has been updated</div>');
            redirect('guru');
        }
    }

    private function viewEditGuru($id)
    {
        $data['title']   = 'Edit data guru';
        $data['user']    = $this->Action_model->queryAkun();
        $data['guru']    = $this->Action_admin->getDataGuru($id);
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('guru/edit_guru.php', $data);
        $this->load->view('template/footer.php');
    }

    public function updateSiswa($id)
    {
        $this->form_validation->set_rules(
            'username',
            'NIS',
            'trim|required|numeric|min_length[7]',
            [
                'required'  => 'Please, type Teacher NIS',
                'numeric'   => 'Only Number',
                'min_length' => 'Password too short!'
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required',
            [
                'required' => 'Need password'
            ]
        );

        $this->form_validation->set_rules(
            'kelas_id',
            'Kelas',
            'required',
            [
                'required' => 'Choose a Class!'
            ]
        );

        $this->form_validation->set_rules(
            'jurusan_id',
            'Jurusan',
            'required',
            [
                'required' => 'Choose a Jurusan'
            ]
        );

        if ($this->form_validation->run() == false) {
            $view = $this->viewEditSiswa($id);
        } else {
            $this->Action_admin->updateDataSiswa();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Siswa has been updated</div>');
            redirect('siswa');
        }
    }

    public function viewEditSiswa($id)
    {
        $data['title']   = 'Edit Data Siswa';
        $data['user']    = $this->Action_model->queryAkun();
        $data['siswa']    = $this->Action_admin->getDataSiswa($id);
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        $this->load->view('siswa/edit_siswa.php', $data);
        $this->load->view('template/footer.php');
    }
}
