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
        $query =
            "SELECT
                user.first_name, user.last_name, message.chat_id AS id
            FROM
                chats_messages AS message
            INNER JOIN
                users AS user ON message.chat_to = user.id
            WHERE
                message.user_id = $user_id
            GROUP BY
                message.chat_to";

        return $this->db->query($query);
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

    public function create_layanan($first_id, $second_id, $third_id)
    {
        $data['topic'] = $first_id . '-' . $second_id . '-' . $third_id;

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
    public function add_chat_message($chat_id, $user_id, $content, $chat_from, $chat_to, $layanan_id)
    {
        $query = 'INSERT INTO chats_messages (chat_id, user_id, content, chat_from, chat_to, layanan_id) VALUES (?, ?, ?, ?, ?, ?)';

        return $this->db->query($query, [$chat_id, $user_id, $content, $chat_from, $chat_to, $layanan_id]);
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
        JOIN users AS u ON cm.user_id = u.id
        WHERE cm.chat_id = ?
        AND cm.id > ?
        ORDER BY cm.id
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

    public function obtain_layanan($topic)
    {
        return $this->db->get_where('chats', ['topic' => $topic]);
    }

    public function get_conversation($data)
    {
        $chat_from = $data['chat_from'];
        $chat_to = $data['chat_to'];
        $layanan_id = $data['layanan_id'];
    }
}
