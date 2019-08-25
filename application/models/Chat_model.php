<?php

class Chat_model extends CI_Model
{
    /**
     * Chat_model Constructor.
     *
     * chats = ['id', 'topic', 'user_id', 'created_at']
     * chats_messages = ['id', 'chat_id', 'user_id', 'content', 'created_at']
     * created_at auto timestamp (currentdate)
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function deleteChat($chat_id)
    {
        $this->db->where('chat_id', $chat_id);
        $this->db->delete('chats_messages');

        return true;
    }

    public function getMessagesByUserId($user_id)
    {
        $this->db->select('');
        $this->db->from('uri_segments as segment');


        die();
        $this->db->select('chat.*, user.first_name, user.last_name, user.id as user_id');
        $this->db->from('chats as chat');
        $this->db->join('chats_messages as message', 'message.chat_id = chat.id');
        $this->db->join('users as user', 'user.id = message.user_id');
        $this->db->join('uri_segments as segment', 'segment.chat_id = chat.id');
        // $this->db->where('segment.first = ', $user_id);
        $this->db->group_by('chat.id, user.id');

        return $this->db->get();
    }

    public function create($first_id, $second_id)
    {
        $data['topic'] = $first_id . '-' . $second_id;

        $chat = $this->db->insert('chats', $data);

        if ($chat) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Description.
     *
     * @param int  $chat_id
     * @param int  $user_id
     * @param text $content
     *
     * @return array
     */
    public function add_chat_message($chat_id, $user_id, $content)
    {
        $query = 'INSERT INTO chats_messages (chat_id, user_id, content) VALUES (?, ?, ?)';

        return $this->db->query($query, [$chat_id, $user_id, $content]);
    }

    public function get_chats_messages($chat_id, $last_chat_message_id = 0)
    {
        $query = "SELECT
                    cm.id,
                    cm.user_id,
                    cm.content,
                    DATE_FORMAT(cm.created_at, '%D of %M %Y at %H:%i:%s') AS timestamp,
                    cm.is_image,
                    cm.is_doc,
                    u.username,
                    u.first_name,
                    u.last_name
                FROM
                    chats_messages AS cm
                JOIN
                    users AS u
                ON
                    cm.user_id = u.id
                WHERE 
                    cm.chat_id = ?
                AND 
                    cm.id > ?
                ORDER BY
                    cm.id
                ASC";

        $result = $this->db->query($query, [$chat_id, $last_chat_message_id]);

        return $result;
    }

    public function getOne($id)
    {
        return $this->db->get_where('chats', ['id' => $id]);
    }

    public function get()
    {
        $this->db->select('chats.*, users.username');
        $this->db->from('chats as chats, users as users');
        $this->db->where('chats.user_id = users.id');

        return $this->db->get();
    }

    public function obtain($topic)
    {
        return $this->db->get_where('chats', ['topic' => $topic]);
    }
}
