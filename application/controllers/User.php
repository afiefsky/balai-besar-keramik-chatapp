<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->user = $this->User_model;
    }
    
    public function __setFlashData($data)
    {
        $this->session->set_flashdata([
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'email_confirm' => $data['email_confirm']
        ]);

        return true;
    }

    public function index()
    {
        redirect('user/setting');
    }

    public function activate()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);
        $this->db->update('users', ['is_activated' => '1']);
        redirect('dashboard');
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            /**
             * POSTED RECORDS
             * For $data['avatar'], that means inserting default.jpeg record into database,
             * [+++] which later on the app will read from root assets to load default avatar.
             * [+++] in case user want to change avatar, it's from edit profile settings on the dashboard.
             */
            $data['first_name']         = $this->input->post('first_name');
            $data['last_name']          = $this->input->post('last_name');
            $data['email']              = $this->input->post('email');
            $data['email_confirm']      = $this->input->post('email_confirm');
            $data['password']           = $this->input->post('password');
            $data['password_confirm']   = $this->input->post('password_confirm');
            $data['avatar']             = 'default.jpeg';

            // Email validation step 1
            if ($data['email'] !== $data['email_confirm']) {
            $this->__setFlashData($data);
                $this->session->set_flashdata('message', 'Email dan Konfirmasi Email harus sama!');
                redirect('user/create');
            }

            // Email validation step 2
            $user = $this->user->getUserByEmail($data['email']);
            if ($user === true) {
                $this->__setFlashData($data);
                $this->session->set_flashdata('message', 'Email sudah terdaftar dan tidak dapat digunakan!');
                redirect('user/create');
            }

            // Password validation
            if ($data['password'] !== $data['password_confirm']) {
                $this->__setFlashData($data);
                $this->session->set_flashdata('message', 'Pastikan password dan konfirmasi_password sama!');
                redirect('user/create');
            }

            // Insert to db
            $user = $this->user->createUser($data);

            // Conditioning
            if ($user === true) {
                $this->session->set_flashdata('message', 'Akun dengan email ' . $data['email'] . ' telah berhasil dibuat!');
                redirect('admin');
            }
        } else {
            $this->template->load('template/admin_template', 'user/create');
        } // End if isset $_POST submit.
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            echo 1;
        } else {
            $this->template->load('template/main_template', 'user/add');
        }
    }

    /* USER PROFILE SETTING PAGE */
    public function setting()
    {
        $id = $this->uri->segment(3);

        if (isset($_POST['submit'])) {
            $config['upload_path'] = './uploads/avatars/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000000;

            /* Identify the config as load the library */
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $error = ['error' => $this->upload->display_errors()];

                echo $error['error'];
                die();
            } else {
                $image = ['upload_data' => $this->upload->data()];

                $data['avatar'] = $image['upload_data']['file_name'];
            }

            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');

            $this->db->where('id', $this->uri->segment(3));
            $this->db->update('users', $data);

            $this->session->set_userdata('avatar', $data['avatar']);

            redirect('dashboard');
        } elseif (isset($_POST['submit_request_photo'])) {
            /* Button foto on view */
            $id = $this->uri->segment(3);

            $data['record'] = $this->user->getOne($id)->row_array();
            $data['photo'] = 1;

            $this->template->load('template/new_template', 'user/setting/index', $data);
        } else {
            /* Button foto on view */
            $id = $this->uri->segment(3);

            $data['record'] = $this->user->getOne($id)->row_array();
            $data['photo'] = 0;

            $this->template->load('template/new_template', 'user/setting/index', $data);
        }
    }
}
