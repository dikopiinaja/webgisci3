<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Api_perjalanan extends Rest_Controller {

    function __construct() {
        parent::__construct();
       
        $this->load->model('Model_perjalanan', 'perjalanan');
    }

    function index_get()
    {
        $perjalanans = $this->perjalanan->get_perjalanan();
        $this->response($perjalanans);
    }

    function index_post(){
        $nama_perjalanan = $_POST['nama_perjalanan'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $Latlong = $_POST['Latlong'];
        
        $tambahPerjalanan = $this->mod_product->create_product($nama_perjalanan, $latitude, $longitude, $Latlong);
        $this->response($tambahPerjalanan);
    }

    function index_put() {
        $id = $this->put('id_perjalanan');
        $data = array(
                    'id_perjalanan'       => $this->put('id_perjalanan'),
                    'nama_perjalanan'          => $this->put('nama_perjalanan'),
                    'latitude'    => $this->put('latitude'),
                    'longitude'    => $this->put('longitude'),
                    'Latlong'    => $this->put('Latlong')
                );
        $this->db->where('id_perjalanan', $id);
        $update = $this->db->update('tb_perjalanan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id = $this->delete('id_perjalanan');
        $this->db->where('id_perjalanan', $id);
        $delete = $this->db->delete('tb_perjalanan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
        
}