<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Notifikasi extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
        $this->load->model('Model_notifikasi', 'notif');
   	}
    
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();
        $data['title'] = 'Mutiara';
        $data['subtitle'] = 'Notifikasi';
        $data['breadcrumb'] = 'Notifikasi';
        $this->template->utama('admin/notifikasi/index', $data);
    }

    // public function notifikasi()
    // {
    //     $notif = $this->load->model_notifikasi->load_notification();
    //     $output = '';
    //     echo "<pre>";
    //     echo print_r($notif);
    //     echo "</pre>";
    //     if(mysqli_num_rows($notif) > 0)
    //     {
    //         while($row = mysql_fetch_array($notif))
    //         {
    //             $output .= '
    //             <li class="card">
    //                 <a href="#">
    //                     <strong>'.$row["judul"].'</strong>
    //                     <small><em>'.$row["pesan"].'</em></small>
    //                 </a>
    //             </li>
    //             ';

    //             return $output;
    //         }
    //     } else {
    //         $output .=' 
    //         <li><a href="#" class="text-bold text-italic">No Notifikasi</a></li>
    //         ';
    //     }
    // }

    public function notif(){
        $data = $this->notif->load_notif();
        echo json_encode($data);
    }

    public function load_notif(){
        $data = $this->notif->notification();
        echo json_encode($data);
    }
}

