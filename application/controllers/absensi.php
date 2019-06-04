<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = '';
        $data['user']    = $this->db->get_where(
            'user',
            [
                'username' => $this->session->userdata('username')
            ]
        )->row_array();
        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('template/topbar.php', $data);
        //ISI
        $this->load->view('template/footer.php');
    }
}
