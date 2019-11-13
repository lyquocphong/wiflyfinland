<?php

class Blog_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function get_last_ten_entries()
    {
            $query = $this->db->get('test', 10);
            return $query->result();
    }

}