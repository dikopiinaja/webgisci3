<?php

class AuthModel extends CI_Model {
    public function validate($user_email, $user_password)
	{
        // return $this->db->get_where('tb_user', ['user_email' => $user_email, 'user_password' => $user_password]);
        $this->db->where('user_email',$user_email);
        $this->db->where('user_password',$user_password);
        $result = $this->db->get('tb_user',1);
        return $result;
    }

    function login($user_email, $user_password)
    {
        $this->db->select("*");
        $this->db->from("tb_user");
        $this->db->where("user_email", $user_email);
        $this->db->where("user_password", $user_password);
        $query = $this->db->get();
        // echo $query;
        $user = $query->row();
        /**
         * Check password
         */
        if (!($user)) {
            return FALSE;
        }

        if (!password_verify($user_password, $user->user_password)) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}