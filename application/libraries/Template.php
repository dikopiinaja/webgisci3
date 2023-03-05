<?php
class Template{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
    function utama($content, $data = NULL){
        $data['head'] = $this->_ci->load->view('admin/_partials/head', $data, TRUE);
        $data['topbar'] = $this->_ci->load->view('admin/_partials/topbar', $data, TRUE);
        $data['sidebar'] = $this->_ci->load->view('admin/_partials/sidebar', $data, TRUE);
        $data['breadcrumb'] = $this->_ci->load->view('admin/_partials/breadcrumb', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        
        $this->_ci->load->view('admin/index', $data);
    }

    function home($content, $data = NULL){
        $data['head'] = $this->_ci->load->view('_partials/head', $data, TRUE);
        $data['navigasi'] = $this->_ci->load->view('_partials/navigasi', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('_partials/footer', $data, TRUE);
        
        $this->_ci->load->view('index', $data);
    }

    function secondpage($content, $data = NULL){
        $data['head'] = $this->_ci->load->view('_partials/head', $data, TRUE);
        $data['navigasi'] = $this->_ci->load->view('_partials/navigasi', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        
        $this->_ci->load->view('_partials/index', $data);
    }

    function t_user($content, $data = NULL){
        $data['head'] = $this->_ci->load->view('_partials/head', $data, TRUE);
        $data['navigasi'] = $this->_ci->load->view('_partials/navigasi', $data, TRUE);
        // $data['header'] = $this->_ci->load->view('_partials/header', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        
        $this->_ci->load->view('index', $data);
    }
}
