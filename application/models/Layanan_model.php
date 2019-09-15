<?php

class Layanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $sql =
            'SELECT
                id, name, icon, created_date, updated_date
            FROM
                layanan';

        return $this->db->query($sql);
    }
}