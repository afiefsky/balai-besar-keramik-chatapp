<?php

class Auth_model extends CI_Model
{
    public function verify($email, $password)
    {
        $user = $this->db->get_where('users', ['email' => $email, 'password' => $password]);

        $data = $user->row_array();
        $user_array = $user->row_array();

        if ($user->num_rows() > 0) {
            $this->session->set_userdata([
                'user_id'    => $data['id'],
                'first_name' => $data['first_name'],
                'avatar'     => $data['avatar'],
                'role'       => $data['role'],
                'email'      => $data['email'],
            ]);

            return 1;
            // if ($user_array['is_activated'] == '1') {

            // } else {
            //     $this->session->set_userdata('error', 'Silahkan minta admin untuk memberikan verifikasi terhadap akun anda!!');
            //     redirect('auth/login');
            // }
        } else {
            return 0;
        }
    }
}
