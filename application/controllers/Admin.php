<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Auth_model', 'auth');
        $this->load->model('User_model', 'user');
        $this->load->model('Layanan_model', 'layanan');
        $this->load->helper('session_helper');
    }

    public function index()
    {
        $data['record'] = $this->user->getAll();
        $this->template->load('template/admin_template', 'admin/index', $data);
    }

    public function layanan()
    {
        /**
         * Comparison notes
         * 1. self_full_name = logged in full_name
         * 2. target_full_name = encounter
         */

        $self_user_id = $this->uri->segment(3);

        /* Target user_id start */
        $target_user_id = $this->uri->segment(4);
        $user_data = $this->user->getUserData($target_user_id)->row();
        $user_full_name = $user_data->first_name . ' ' . $user_data->last_name;
        /* Target user_id end */

        $data['target_full_name'] = $user_full_name;
        $data['record'] = $this->user->get($this->session->userdata('user_id'));
        $data['layanan'] = $this->layanan->getAll();

        /* IDs start */
        $data['self_user_id'] = $self_user_id;
        $data['target_user_id'] = $target_user_id;
        // The third id would be the layanan that you will select on the views, it must be redirected to layanan_redirect
        /* IDs end */

        $this->template->load('template/admin_template', 'admin/layanan', $data);
    }
}
