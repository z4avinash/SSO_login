<?php

class Main_model extends CI_model
{
    //fetching password and for the user verification
    public function checkUser($login_username)
    {
        return $this->db->select('password,user_id')->from('users')->where('username', $login_username)->get()->row_array();
    }

    //insert id into the second table
    public function insertid($formData)
    {
        $this->db->insert('sessions', $formData);
    }
}
