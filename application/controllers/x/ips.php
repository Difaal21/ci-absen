<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ips extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('x/Action_ips');
    }
}
