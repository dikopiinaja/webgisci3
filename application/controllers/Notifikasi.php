<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Notifikasi extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('user_email')])->row_array();
        $data['title'] = 'Mutiara';
        $data['subtitle'] = 'Notifikasi';
        $data['breadcrumb'] = 'Notifikasi';
        $this->template->utama('admin/notifikasi/index', $data);
    }

    public function notifikasi()
    {
        $notif = $this->load->model_notifikasi->load_notification();
        $output = '';
        if(mysqli_num_rows($notif) > 0)
        {
            while($row = mysql_fetch_array($notif))
            {
                $output .= '
                <li class="card">
                    <a href="#">
                        <strong>'.$row["judul"]'</strong>
                        <small><em>'.$row["pesan"]'</em></small>
                    </a>
                </li>
                ';
            }
        } else {
            $output .=' 
            <li><a href="#" class="text-bold text-italic">No Notifikasi</a></li>
            ';
        }
    }
}

