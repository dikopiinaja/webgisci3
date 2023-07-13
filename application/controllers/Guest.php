<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('cetak_tiket');
	}
  
	public function home()
	{
		$this->load->model('model_notifikasi');
		$data['title'] = 'New Mutiara Travel';
		$data['perjalanan'] = $this->model_guest->getDataPerjalanan()->result();
		$data['getData'] =  'SELECT latitude, longitude FROM tb_perjalanan WHERE id_perjalanan=$id';
		$data['travel'] = $this->model_guest->travelProfile();
		// $data['jumlahPenumpang'] = $this->model_penumpang->jumlahPenumpang();


		$this->template->home('home', $data);
        $data["jumlah_pesan"] = "Select Count(id_pesan) as jumlah From pesan";

		json_encode($data);
	}

	public function dataBooking()
	{
		$data['title'] = 'New Mutiara Travel';
		// $data['dataBooking'] = $this->model_guest->getDataBooking()->result();
		$data['travel'] = $this->model_guest->travelProfile();
		// $data['jumlahPenumpang'] = $this->model_penumpang->jumlahPenumpang();
		$data['penumpang'] = $this->model_penumpang->allPenumpang()->result();

		$this->template->secondpage('data_booking', $data);

	}

	public function cari_tiket()
	{
		$this->load->model('model_notifikasi');
		$data = array(
			'asal' => $this->input->post('asal'),
			'tujuan' => $this->input->post('tujuan')
		);

		
		$data['tiket_travel'] = $this->model_guest->cari_tiket($data)->result();
		
		$data['penumpang'] = $this->input->post('jumlah');
		
		$data['title'] = 'New Mutiara Travel';
		$data['perjalanan'] = $this->model_guest->getDataPerjalanan()->result();
		$data['getData'] =  'SELECT * FROM tb_perjalanan WHERE id_perjalanan=$id';
		$data['checkpenumpang'] = $this->model_guest->getTiket();
		// $data['jumlahPenumpang'] = $this->model_penumpang->jumlahPenumpang();
		
		$this->template->secondpage('home', $data);
	}

	public function pesan($id)
	{
		// $data['title'] = 'New Mutiara Travel';
		$data['title'] = 'Formulir Data Penumpang';

		$data['info'] = $this->model_guest->getDatainfopemesanan($id)->row();
		$today = date('Y-m-d');
		// $data['kursi'] = $this->model_guest->getKursi()->row();
		$data['travel'] = $this->model_guest->travelProfile();
		// $data['jumlahPenumpang'] = $this->model_penumpang->jumlahPenumpang();

		
		$data['id_jadwal'] = $id;

		$this->template->secondpage('pesan', $data);
	}

	public function contact()
	{
		$this->template->home('contact');
	}
	
	public function konfirmasi()
	{
		$data['title'] = 'New Mutiara Travel';
		$this->template->home('k_pembayaran', $data);
	}

	public function trips()
	{
		$data['query'] = $this->model_jadwal->tampil()->result();
		$data['title'] = 'New Mutiara Travel';
		$this->template->home('trips', $data);
	}

	public function peta_perjalanan()
	{
		// $data['query'] = $this->model_jadwal->tampil()->result();
		$data['title'] = 'Peta Perjalanan';
		$data['perjalanan'] = $this->model_perjalanan->getPerjalanan();
		$data['travel'] = $this->model_guest->travelProfile();
		// $data['jumlahPenumpang'] = $this->model_penumpang->jumlahPenumpang();
		$data['jadwal'] = $this->model_jadwal->tampil()->result();

		$this->template->home('peta_perjalanan', $data);
	}

	public function pesan_tiket()
	{
		$penumpang = $this->input->post('penumpang');
		
		$cek = $this->model_guest->getPembayaran()->num_rows()+1;

		$no_pembayaran = 'TRV21'.$cek;

		$ongkos = $this->input->post('ongkos');

		$total_pembayaran = $penumpang*$ongkos;

		$no_tiket = 'T00'.$cek;
 
		$data = array(
			'no_pembayaran' => $no_pembayaran,
			'no_tiket' => $no_tiket,
			'total_pembayaran' => $total_pembayaran,
			'status' => 0
		);

		// cek data tiket
		// var_dump($data);
		
		$this->model_penumpang->insertPembayaran($data);
		
		$cek = $this->model_guest->getTiket()->num_rows()+1;
		// echo $cek;


		$tgl_pesan = date('Y-m-d H:i:s');
		$today = date('Y-m-d');
		$mobil = $_GET['mobil'];

		$queryKursi = $this->model_guest->getKursi()->num_rows()+1;

		$post = $this->input->post();
		foreach ($post['nama'] as $key => $value) {
			if ($post['no_tiket'] !='' || $post['nama'][$key] !='' || $post['no_identitas'][$key] !='' || $post['tgl_pesan'][$key] !='') {
				$simpan[] = array(
					'no_tiket' => $no_tiket,
					'nama' => $post['nama'][$key],
					'no_identitas' => $post['no_identitas'][$key],
					'id_jadwal' => $this->input->post('id_jadwal'),
					'kursi' => $queryKursi++,
					'tgl_pesan' => $tgl_pesan
				);
			}
		}

		$this->model_penumpang->insertPenumpang('tb_penumpang', $simpan);

		// var_dump($simpan);

		// die();
		$data = array(
			'no_tiket' => $no_tiket,
			'id_jadwal' => $this->input->post('id_jadwal'),
			'nama_pemesan' => $this->input->post('nama_pemesan'),
			'email' => $this->input->post('email'),
			'no_telpon' => $this->input->post('no_telpon'),
			'alamat' => $this->input->post('alamat')
		);
		$this->model_penumpang->insertPemesan($data);

		$this->session->set_flashdata('nomor', $no_pembayaran);
		$this->session->set_flashdata('no_tiket', $no_tiket);
		$this->session->set_flashdata('total', $total_pembayaran);
		redirect('ticket');
	}

	public function ticket()
	{
		$data['penumpang'] = $this->model_penumpang->tampil()->result();
        $this->pdf->setPaper('A5', 'landscape');
		$this->pdf->filename = "laporan Pemenesanan Tiket.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
	}
	public function sendMail()
	{
		// $config = [
		// 	'mailtype'  => 'html',
		// 	'charset'   => 'utf-8',
		// 	'protocol'  => 'smtp',
		// 	'smtp_host' => 'ssl://smtp.gmail.com',
		// 	'smtp_user' => 'kunsarifan18@gmail.com', 
		// 	'smtp_pass' => 'Nobita721',
		// 	'smtp_port' => 465,
		// 	'crlf'      => "\r\n",
		// 	'newline'   => "\r\n"
		// ];
		$config = [
			'useragent' => 'CodeIgniter',
			'protocol'  => 'smtp',
			'mailpath'  => '/usr/sbin/sendmail',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'kunsarifan18@gmail.com', // Ganti dengan email gmail Anda
			'smtp_pass' => 'Nobita721', // Password gmail Anda
			'smtp_port' => 465,
			'smtp_keepalive' => TRUE,
			'smtp_crypto' => 'SSL',
			'wordwrap'  => TRUE,
			'wrapchars' => 80,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'validate'  => TRUE,
			'crlf'      => "\r\n",
			'newline'   => "\r\n",
		];

 
		 $this->load->library('email', $config);
		 $this->email->from('kunsarifan18@gmail.com', 'Nobita721');
		 $this->email->to('sarifankun@gmail.com');
 
		 $this->email->subject('Pembayaran Anda belum dibayar');
		//  $this->email->message($this->input->post('editor1'));
		$this->email->send();
 
		//  if(!$save){
		// 	$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dikirim !!!</div>');
		//  }else{
		// 	show_error($this->email->print_debugger());
		// }
	}
}
