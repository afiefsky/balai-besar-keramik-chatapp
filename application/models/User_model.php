<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->get('users');
    }

    public function createUser($data)
    {
        $data = [
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'password'      => $data['password'],
            'avatar'        => $data['avatar']
        ];

        $user = $this->db->insert('users', $data);

        if ($user) {
            return true;
        }
        else {
            return $user;
        }
    }

    public function getUserByEmail($email)
    {
        $this->db->select();
        $this->db->from('users as users');
        $this->db->like('email', $email);

        $user = $this->db->get();
        $user_rows = $user->num_rows();

        if ($user_rows > 0) {
            $data = $user->row_array();

            $this->session->set_userdata([
                'user_id'    => $data['id'],
                'first_name' => $data['first_name'],
                'avatar'     => $data['avatar'],
                'role'       => $data['role'],
                'email'      => $data['email'],
            ]);

            return true;
        }
        else {
            return false;
        }
    }

    public function getUserFromApi($email)
    {
        $this->db->select();
        $this->db->from('users as users');
        $this->db->like('email', $email);

        $user = $this->db->get();
        $user_rows = $user->num_rows();

        if ($user_rows > 0) {
            $data = $user->row_array();

            $data = [
                'user_id'    => $data['id'],
                'first_name' => $data['first_name'],
                'avatar'     => $data['avatar'],
                'role'       => $data['role'],
                'email'      => $data['email'],
            ];

            return $data;
        }
        else {
            return false;
        }
    }

    public function get($user_id)
    {
        $this->db->select();
        $this->db->from('users as users');
        $this->db->where('users.id != ', $user_id);
        $this->db->where('users.id != 0');

        return $this->db->get();
    }

    public function getOne($id)
    {
        $this->db->where('id', $id);

        return $this->db->get('users');
    }

    public function logged($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->update('users', ['is_logged_in' => 1, 'last_login' => date('Y-m-d')]);

        return 1;
    }
}
