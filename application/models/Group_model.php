<?php

class Group_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $this->db->select('group.*, chats.*, group.id as group_id, users.first_name, users.last_name');
        $this->db->from('groups_chats as group, chats as chats, users as users');
        $this->db->where('group.chat_id = chats.id');
        $this->db->where('group.created_by = users.id');

        return $this->db->get();
    }

    public function check($user_id, $group_id)
    {
        $check = $this->db->get_where('groups_members', ['group_id' => $group_id, 'user_id' => $user_id]);

        if ($check->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
