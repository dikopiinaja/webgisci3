<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
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

        $validate = $this->authmodel->login($user_email, $user_password);
        if (!empty($validate)) {
            // $validate = [];
            foreach ($validate as $v) {
                $sesdata = array(
                    // 'name'  => $name,
                    'user_email'     => $v->user_email,
                    'role'     => $v->role,
                    'logged_in' => TRUE
                );
                echo json_encode($v);

                $this->session->set_userdata($sesdata);
            }
            
        } else {
            // echo json_encode($validate);

            echo json_encode("Error!");
        }
    }

    function logout()
    {
        // $this->session->unset_userdata('user_email');
        // $this->session->unset_userdata('role_id');

        // redirect('auth');
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'swal("Success!", "Anda berhasil keluar!!", "success");');

        redirect('auth');
    }
}
