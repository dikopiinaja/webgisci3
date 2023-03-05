<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_trip extends CI_Model {

    private $perjalanan = 'tb_perjalanan';

    function get_list_trip() {
        $query = $this->db->get($this->perjalanan);
        if ($query) {
            return $query->result();
        }
        return NULL;
    }

    function get_trip($id) {
        $query = $this->db->get_where($this->perjalanan, array("id_perjalanan" => $id));
        if ($query) {
            return $query->row();
        }
        return NULL;
    }

    function add_website($website_title, $website_url) {
        $data = array('title' => $website_title, 'url' => $website_url);
        $this->db->insert($this->perjalanan, $data);
    }

    function update_website($website_id, $website_title, $website_url) {
        $data = array('title' => $website_title, 'url' => $website_url);
        $this->db->where('id', $website_id);
        $this->db->update($this->website, $data);
    }

    function delete_trip($id) {
        $this->db->where('id_perjalanan', $id);
        $this->db->delete($this->perjalanan);
    }
}