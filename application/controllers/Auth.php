<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AuthModel', 'auth');
	}
	function index()
	{
		// $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
        // $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
        // if ($this->form_validation->run() == false) {
        //     $data['title'] = 'Login Access';
		// 	$this->load->view('admin/auth', $data);
        // } else {
        //     // validasi succes
        //     $this->procces_login();
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Login</div>');
        // }
            $this->load->view('auth');
	}

	function process_login()
	{
		$user_email = $this->input->post('user_email', TRUE);
        $user_password = sha1($this->input->post('user_password', TRUE));

        // $user = $this->db->get_where('tb_user', ['user_email' => $user_email])->row_array();

        // $login = $this->auth->proccess_loggin($user_email, $user_password);
        
        $validate = $this->authmodel->validate($user_email,$user_password);
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $email  = $data['user_email'];
            $email = $data['user_email'];
            $level = $data['role'];
            $sesdata = array(
                'name'  => $name,
                'user_email'     => $email,
                'role'     => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($level === '1'){
                redirect('admin');
            }else{
                redirect('supir');
            }
        }else{
            // echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            $this->session->set_flashdata('message', 'swal("Gagal!", "Email / Password yang anda masukan Salah!!", "warning");');
            redirect('auth');
        }

        // if($login->num_rows() > 0){

        //     $data = $login->row_array();

        //     $user = [
        //         'user_email' => $data['user_email'],
        //         'user_name' => $data['user_name'],
        //         'user_password' => $data['user_password']
        //     ];

        //     $save = $this->session->set_userdata($user);
            
        //     return redirect(base_url('admin'));
        // }else{
        //     $this->session->set_flashdata('message', 'swal("Gagal!", "Email / Password yang anda masukan Salah!!", "warning");');
        //     redirect(base_url('auth'));
        // }
	}

	function logout(){
        // $this->session->unset_userdata('user_email');
        // $this->session->unset_userdata('role_id');
        
        // redirect('auth');
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'swal("Success!", "Anda berhasil keluar!!", "success");');
        
        redirect('auth');
    }
    
}
