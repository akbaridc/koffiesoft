<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()

    {

        parent::__construct();

        $this->load->library('template');
        date_default_timezone_set("Asia/Jakarta");


        if (!$this->session->userdata('login')) {
            redirect('Auth/login');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
        ];

        $this->template->loadViews('pages/home', $data);
    }
}
