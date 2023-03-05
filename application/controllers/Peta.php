<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller {
   
   	public function index()
	{
        $data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Peta Perjalanan';
        $data['breadcrumb'] = 'Dashboard';
        $data['perjalanan'] = $this->model_perjalanan->getPerjalanan();
        $this->template->utama('admin/peta', $data);
    }
}