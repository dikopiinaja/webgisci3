<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supir extends CI_Controller {
  
	public function index()
	{
		// $data['title'] = "New Mutiara Travel";
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';
		if($this->session->userdata('role')==='2'){
			$this->template->utama('supir/dashboard', $data);	
		} else {
			$this->load->view('errors/error');
		}
	}

	public function jadwal()
	{
		// $data['title'] = "New Mutiara Travel";
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
		$data['title'] = 'Jadwal Keberangkatan';
		$data['breadcrumb'] = 'Jadwal';
		$data['subtitle'] = 'Jadwal';
		$data['query'] = $this->model_jadwal->tampil()->result();

		if($this->session->userdata('role')==='2'){
			$this->template->utama('supir/jadwal/jadwal', $data);
		} else {
			$this->load->view('errors/error');
		}
	}

	public function penumpang()
	{
		// $data['title'] = "New Mutiara Travel";
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
		$data['title'] = 'Daftar Penumpang';
		$data['breadcrumb'] = 'Daftar';
		$data['subtitle'] = 'Daftar Penumpang';
		$data['query'] = $this->model_penumpang->tampil()->result();

		if($this->session->userdata('role')==='2'){
			$this->template->utama('supir/daftar_penumpang/penumpang', $data);
		} else {
			$this->load->view('errors/error');
		}
	}

	public function auth()
	{
		$data['title'] = 'New Mutiara Travel';
		$this->template->home('user/auth', $data);
	}
}
