<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(['Dashboard_model', 'Chat_model', 'User_model', 'Layanan_model']);
        $this->load->helper('session_helper');

        $this->dashboard = $this->Dashboard_model;
        $this->chat = $this->Chat_model;
        $this->user = $this->User_model;
        $this->layanan = $this->Layanan_model;
        // checkSession();
    }

    public function index()
    {
        // NON ADMIN
        if ($this->session->userdata('role') == 1) {
            $data['record'] = $this->user->get($this->session->userdata('user_id'));
            $data['layanan'] = $this->layanan->getAll();

            $data['self_user_id'] = $this->session->userdata('user_id');
            $data['target_user_id'] = 0; // admin user_id always 0, meanwhile layanan means user chatting to admin

            $this->template->load('template/new_template', 'dashboard/index', $data);
        }
        // ADMIN
        else {
            redirect('admin/index');
        }
    }
}
