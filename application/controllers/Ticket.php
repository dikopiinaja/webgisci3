<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {
    public function index()
    {
        $data['title'] = 'New Mutiara Travel';
        // $data['jumlahPenumpang'] = $this->model_penumpang->jumlahPenumpang();
        $data['travel'] = $this->model_guest->travelProfile();
        // var_dump($data['query']);
        // $no_pembayaran = $this->session->flashdata('nomor');
        $no_tiket = $_GET['no_tiket'];
        $data['tiket']= $this->model_penumpang->getTiket('no_tiket')->result();

        $this->template->secondpage('ticket', $data);
    }

    public function cetakTiket($id)
    {
        $data['penumpang'] = $this->model_penumpang->CetakID()->result();
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,10,'NEW MUTIARA TRAVEL',0,1,'C');
        $pdf->SetFont('Courier','I',9);
        $pdf->Cell(190,7,'Jl. Patimura 39 Buntu Kec. Kroya Kab. Cilacap',0,1,'C');
        $pdf->SetFont('Helvetica','B',11);
        $pdf->Cell(190,7,'E-Ticket ',1,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,10,'',0,1);
		$hasil = $this->model_penumpang->CetakID('id', $id);
        foreach ($hasil as $q){
        $pdf->SetFont('Courier','B',11);
		$pdf->Cell(38,7,'ID Tiket',0,0);
		$pdf->Cell(38,7,$q['id_tiket'],0,1);
		$pdf->Cell(38,7,'Nama',0,0);
		$pdf->Cell(38,7,$q['nama'],0,1);
		$pdf->Cell(38,7,'No KTP',0,0);
		$pdf->Cell(38,7,$q['id_ktp'],0,1);
		$pdf->Cell(38,7,'Tujuan',0,0);
		$pdf->Cell(38,7,$q['tujuan'],0,1);
		$pdf->Cell(38,7,'Alamat',0,0);
		$pdf->Cell(38,7,$q['alamat'],0,1);
		$pdf->Cell(38,7,'NO HP',0,0);
		$pdf->Cell(38,7,$q['no_tlp'],0,1);
		$pdf->Cell(38,7,'Tgl Berangkat',0,0);
		$pdf->Cell(38,7,$q['tgl_brngkt'],0,1);
		$pdf->Cell(38,7,'Tgl Pesan',0,0);
		$pdf->Cell(38,7,$q['created_at'],0,1);
		$pdf->SetFont('Courier','B',12);
		$pdf->Cell(10,10,'',0,1);
		$pdf->Cell(190,7,'Owner',0,1,'C');
		$pdf->Cell(3,3,'',0,1);
		$pdf->Cell(190,7,'Imam Sutaryo',0,1,'C');
        }
		$pdf->Output();
    }
}