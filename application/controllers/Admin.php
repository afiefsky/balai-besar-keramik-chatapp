<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Auth_model', 'auth');
        $this->load->model('User_model', 'user');
        $this->load->helper('session_helper');
    }

    public function index()
    {
        $data['record'] = $this->user->getAll();
        $this->template->load('template/dashboard_template', 'dashboard/admin/index', $data);
    }
}
