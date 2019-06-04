<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ipa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('xii/Action_ipa');
    }
    public function biologi()
    { }
}
