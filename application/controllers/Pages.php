<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {


public function pengguna(){
    if($this->session->userdata('role') != 'admin') // Jika user yg login bukan admin
      show_404(); // Redirect ke halaman 404 Not found
    // function render_backend tersebut dari file core/MY_Controller.php
    $this->render_backend('user/dashboard'); // load view pengguna.php
  }
}
