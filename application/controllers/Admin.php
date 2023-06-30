<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   	public function __construct()
	{
		parent::__construct();
		// _checklogin();
		date_default_timezone_set("Asia/Jakarta");
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('auth');
		}
   	}
   
   	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();
		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';
		$data['jumlahJadwal'] = $this->model_jadwal->jumlahJadwal();
		$data['jumlahPerjalanan'] = $this->model_perjalanan->jumlahPerjalanan();
		$data['jumlahPenumpang'] = $this->model_penumpang->jumlahPenumpang();
		$data['jumlahSupir'] = $this->model_supir->Jumlahsupir();

		if($this->session->userdata('role')==='1'){
			$this->template->utama('admin/dashboard', $data);
		}else{
			$this->load->view('errors/error');
		}
	}

	function getPerjalanan()
	{
		$data = $this->model_perjalanan->getPerjalanan();
		echo json_encode($data);
	}
   
   	public function perjalanan()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Perjalanan';
		$data['subtitle'] = 'Perjalanan';
		$this->load->model('Model_nomer');
		$autonumb = $this->Model_nomer->autonumb('tb_perjalanan','id_perjalanan','IRT');
		$data['id_perjalanan'] = $autonumb;
		$data['query'] = $this->model_perjalanan->getPerjalanan();
		if($this->session->userdata('role')==='1'){
		$this->template->utama('admin/perjalanan/perjalanan', $data);
		} else {
			$this->load->view('errors/error');
		}
	}

	public function tambah_perjalanan()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();
		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Perjalanan';
		$data['subtitle'] = 'Tambah Perjalanan';
		$perjalanan = $this->model_perjalanan;
		$validation = $this->form_validation;
        $validation->set_rules($perjalanan->rules());
        if ($validation->run()) {
            $perjalanan->insert_perjalanan();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil ditambahkan !!!</div>');
			redirect('admin/perjalanan', 'refresh');
		}
		$this->template->utama('admin/perjalanan/t_perjalanan', $data);
	}

	public function update_perjalanan($id = null)
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();
		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Perjalanan';
		$data['subtitle'] = 'Update Perjalanan';
		$perjalanan = $this->model_perjalanan;
		$validation = $this->form_validation;
		$validation->set_rules($perjalanan->rules());
			if ($validation->run()) {
				$perjalanan->update_perjalanan();
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil diupdate !!!</div>');
				redirect('admin/perjalanan');
			}
		$data["perjalanan"] = $perjalanan->getById($id);
		if (!$data["perjalanan"]) show_404();
		
		$this->template->utama("admin/perjalanan/e_perjalanan", $data);
	}

	public function hapus_perjalanan($id)
	{
		$id = array('id_perjalanan' => $id);
		$this->model_perjalanan->hapus_perjalanan('tb_perjalanan', $id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dihapus !!!</div>');
		redirect('admin/perjalanan');
	}

	public function jadwal()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Jadwal keberangkatan';
		$data['subtitle'] = 'Jadwal Keberangkatan';
		$data['query'] = $this->model_jadwal->tampil()->result();
		$this->template->utama('admin/jadwal/jadwal', $data);
	}

	public function tambahJadwal()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();

		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Tambah Jadwal ';
		$data['subtitle'] = 'Tambah Jadwal ';
		$data['mobil'] = $this->model_mobil->all_car()->result();
		$data['perjalanan'] = $this->model_guest->getDataPerjalanan()->result();
		$data['kategori'] = $this->model_kategori->all_categories();
		$data['tgl_dibuat'] = date('Y-m-d');
		// $data['tgl_pesan'] = date('Y-m-d H:i:s');

		$jadwal = $this->model_jadwal;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            $jadwal->insert_jadwal();
			$data['tgl_dibuat'] = date('d-m-Y');
			$notifikasi = [
				'judul' => 'Jadwal telah ditambahkan',
				'pesan' => 'Jadwal' . $this->input->post('nama_kategori') . ' ditambahkan ' 
			];
			
			$this->db->insert('tb_notifikasi', $notifikasi);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/jadwal', 'refresh');
        }

		$this->template->utama('admin/jadwal/t_jadwal', $data);
	}

	public function editJadwal($id = null)
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();

		$data['jadwal'] = $this->model_jadwal->getById($id);

		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Jadwal ';
		$data['subtitle'] = 'Edit Jadwal ';
		$data['mobil'] = $this->model_mobil->all_car()->result();
		$data['perjalanan'] = $this->model_guest->getDataPerjalanan()->result();
		$data['kategori'] = $this->model_kategori->all_categories();
		$data['tgl_dibuat'] = date('Y-m-d');
		// $data['tgl_pesan'] = date('Y-m-d H:i:s');

		$jadwal = $this->model_jadwal;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            $jadwal->update_jadwal();
			$data['tgl_dibuat'] = date('d-m-Y');
			$notifikasi = [
				'judul' => 'Jadwal telah diedit',
				'pesan' => 'Jadwal' . $this->input->post('nama_kategori') . ' diedit ' 
			];
			
			$this->db->insert('tb_notifikasi', $notifikasi);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/jadwal', 'refresh');
        }

		$this->template->utama('admin/jadwal/e_jadwal', $data);
	}

	public function notifikasi()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Notifikasi';
		$data['subtitle'] = 'Notifikasi';
		$data['notifikasi'] = $this->model_notifikasi->notification()->result();
		$this->template->utama('admin/notifikasi/index', $data);
	}

	public function hapus_jadwal($id)
	{
		$id = array('id_jadwal' => $id);
		$this->model_jadwal->hapus_jadwal('tb_jadwal', $id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dihapus !!!</div>');
		redirect('admin/jadwal');
	}

	public function mobil()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Mobil Angkutan';
		$data['subtitle'] = 'Mobil Angkutan';
		$data['query'] = $this->model_mobil->all_car()->result();
		$this->template->utama('admin/mobil/a_mobil', $data);
	}

	public function penumpang()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Daftar Penumpang';
		$data['subtitle'] = 'Daftar Penumpang';
		$data['query'] = $this->model_penumpang->tampil()->result();
		$this->template->utama('admin/penumpang/index', $data);
	}

	public function tambah_mobil()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Tambah Mobil Angkutan';
		$data['subtitle'] = 'Tambah Mobil Angkutan';

		$mobil = $this->model_mobil;
        $validation = $this->form_validation;
        $validation->set_rules($mobil->rules());

        if ($validation->run()) {
            $mobil->insert_mobil();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/mobil', 'refresh');
        }
		$this->template->utama('admin/mobil/t_mobil', $data);
	}

	public function update_mobil($id = null)
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();
		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Mobil';
		$data['subtitle'] = 'Update Mobil';
		$mobil = $this->model_mobil;
		$validation = $this->form_validation;
		$validation->set_rules($mobil->rules());
			if ($validation->run()) {
				$mobil->update_mobil();
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil diupdate !!!</div>');
				redirect('admin/mobil');
			}
		$data["mobil"] = $mobil->getById($id);
		if (!$data["mobil"]) show_404();
		
		$this->template->utama("admin/mobil/e_mobil", $data);
	}

	public function hapus_mobil($id)
	{
		if (!isset($id)) show_404();
        
		if ($this->model_mobil->hapus_mobil($id)) {
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dihapus !!!</div>');
			redirect(site_url('admin/mobil'));
		}
	}

	public function kategori()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
		$data['breadcrumb'] = 'Mutiara';
		$data['title'] = 'Kategori';
		$data['subtitle'] = 'Kategori';
		// getCategory();
		$this->template->utama('admin/kategori/kategori', $data);	
	}

	function getCategory()
	{
		$data = $this->model_kategori->all_categories();
		echo json_encode($data);
	}

	public function tambah_kategori()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
		$kategori = $this->model_kategori;
		$validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->insert_kategori();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil ditambahkan !!!</div>');
		}
		redirect('admin/kategori');
	}

	public function update_kategori($id = null)
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();
		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Kategori';
		$data['subtitle'] = 'Update Kategori';
		$kategori = $this->model_kategori;
		$validation = $this->form_validation;
		$validation->set_rules($kategori->rules());
			if ($validation->run()) {
				$kategori->update_kategori();
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil diupdate !!!</div>');
				redirect('admin/kategori');
			}
		$data["kategori"] = $kategori->getById($id);
		if (!$data["kategori"]) show_404();
		
		$this->template->utama("admin/kategori/e_kategori", $data);
	}

	public function hapus_kategori($id)
	{
		$id = array('id_kategori' => $id);
		$this->model_kategori->hapus_kategori('tb_kategori', $id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dihapus !!!</div>');
		redirect('admin/kategori');
	}

	public function supir()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Master Data';
		$data['subtitle'] = 'Data Supir';
		$data['query'] = $this->model_supir->all_driver()->result();
		$this->template->utama('admin/supir/index', $data);	
	}

	public function tambah_supir()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();

		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Supir';
		$data['subtitle'] = 'Tambah Supir';

		$data['mobil'] = $this->model_mobil->all_car()->result();
		$supir = $this->model_supir;
		$validation = $this->form_validation;
        $validation->set_rules($supir->rules());
        if ($validation->run()) {
            $supir->insert_supir();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil ditambahkan !!!</div>');
			redirect('admin/supir', 'refresh');
		}
		$this->template->utama('admin/supir/t_supir', $data);
	}

	public function get_supir($id)
	{
		// $data['supir'] = $this->model_supir->get_detail($id);;
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Master Data';
		$data['subtitle'] = 'Data Supir';

		$id     = $this->uri->segment(3);
        $data['supir']   = $this->model_supir->getById($id);
        $this->template->utama('admin/supir/detail', $data);
	}

	public function daftarPenumpang()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Data Pesan Tiket';
		$data['subtitle'] = 'Data Pesan Tiket';
		$data['penumpang'] = $this->model_penumpang->allPenumpang()->result();

		if($this->session->userdata('role')==='1'){
		$this->template->utama('admin/daftar_penumpang/index', $data);	
		} else {
			$this->load->view('errors/error');
		}

	}

	public function profile()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
      	$data['title'] = 'Mutiara';
		$data['breadcrumb'] = 'Profile';
		$data['subtitle'] = 'Profile';
		// $data['query'] = $this->model_buk_pem->tampil()->result();
		$this->template->utama('admin/profile/index', $data);	
	}

	public function laporan_pdf(){

		$data['penumpang'] = $this->model_penumpang->allPenumpang()->result();
	
		$this->pdf->setPaper('A5', 'landscape');
		$this->pdf->filename = "laporan Pemenesanan Tiket.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
	}

	public function cetakLaporan_Jadwal(){

		$data['jadwal'] = $this->model_jadwal->tampil()->result();
	
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "Laporan Jadwal Keberangkatan.pdf";
		$this->pdf->load_view('admin/jadwal/laporan_pdf', $data);
	}

	public function layouts()
	{
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('user_email')])->row_array();
		$data['cars'] = $this->model_mobil->all_car()->result();

		$data['title'] = 'Mutiara';
		$data['breadcrumb'] = "Master";
		$data['subtitle'] = "Layout Mobil";
		$this->template->utama('admin/layout/index', $data);
	}

	function getPenumpangList()
	{
		$data = $this->model_penumpang->allPenumpang()->result();
		echo json_encode($data);
	}
}
