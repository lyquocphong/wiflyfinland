<?php

class User_model extends CI_Model {

    public function getUserByPassword($username, $password)
    {
        $condition = "username =" . $this->db->escape($username) . " AND " . "password =" . $this->db->escape($password);
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() != 1)
        {
            return null;
        }

        return $query->row();
    }

}