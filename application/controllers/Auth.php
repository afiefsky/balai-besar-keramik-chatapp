<?php

/*
|--------------------------------------------------------------------------
| Function Lists    | Desc
|--------------------------------------------------------------------------
|   __construct     |   Constructor
|   index           |   Redirect to login
|   login           |   Login form
|   register        |   Register form
|   logout          |   Destroy session
*/

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(['Auth_model', 'User_model']);
        $this->load->helper('session_helper');

        $this->auth = $this->Auth_model;
        $this->user = $this->User_model;
    }

    public function index()
    {
        redirect('auth/login');

        return true;
    }

    /**
     * Disabled for now.
     */
    // public function welcome()
    // {
    //     $this->template->load('template/welcome_template', 'welcome/index');
    // }

    public function login()
    {
        checkLoginSession();

        if (isset($_POST['submit'])) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            /**
             *  Verify process and storing user_id to session.
             */
            $verify = $this->auth->verify($email, $password);

            if ($verify == 1) {
                /* Set session of status login if success */
                $this->session->set_userdata('login_status', 'ok');

                /* Update column = ['is_logged_in', 'last_login'] */
                $this->user->logged($this->session->userdata('user_id'));

                redirect('dashboard');
            } elseif ($verify == 2) {
                $this->session->set_userdata('error', 'Silahkan minta admin untuk memberikan verifikasi terhadap akun anda!');
                redirect('auth/login');
            } else {
                /* Destory session if failed */
                // $this->session->sess_destroy();
                $this->session->set_userdata(['error' => 'Error!! Email dan password tidak valid!!']);
                redirect('auth/login');
            } // End if $verify == 1.
        } elseif (isset($_POST['submit_register'])) {
            redirect('auth/register');
        } else {
            $data['error'] = $this->session->userdata('error');

            $this->template->load('template/login_template', 'auth/index', $data);
        } // End if isset $_POST Submit.
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

    /* USER REGISTRATION FORM PAGE */
    public function register()
    {
        checkLoginSession();

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
                redirect('auth/register');
            }

            // Email validation step 2
            $user = $this->user->getUserByEmail($data['email']);
            if ($user === true) {
                $this->__setFlashData($data);
                $this->session->set_flashdata('message', 'Email sudah terdaftar dan tidak dapat digunakan!');
                redirect('auth/register');
            }

            // Password validation
            if ($data['password'] !== $data['password_confirm']) {
                $this->__setFlashData($data);
                $this->session->set_flashdata('message', 'Pastikan password dan konfirmasi_password sama!');
                redirect('auth/register');
            }

            // Insert to db
            $user = $this->user->createUser($data);

            // Conditioning
            if ($user === true) {
                $this->session->set_flashdata('message', 'Akun dengan email ' . $data['email'] . ' telah berhasil dibuat!');
                redirect('auth/login');
            }
            else {
                print_r($user);
            }
        } else {
            $this->template->load('template/login_template', 'register/index');
        } // End if isset $_POST submit.
    }

    public function logout()
    {
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('users', ['is_logged_in' => 0]);

        $this->session->sess_destroy();

        redirect('auth/index');
    }
}
