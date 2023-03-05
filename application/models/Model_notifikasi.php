<?php

class Model_notifikasi extends CI_Model{
    public function load_notif()
    {
        $query = $this->db->get('tb_notifikasi');
        if($query->num_rows()>0){
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function notification()
    {
        $query = $this->db->get('tb_notifikasi')->result();
        return $query;
    }
}