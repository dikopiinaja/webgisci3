<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['pesanTiket'] = 'guest/pesan_tiket'; 
$route['dataBooking'] = 'guest/dataBooking'; 

$route['jadwal'] = 'supir/jadwal'; 
$route['daftarPenumpang'] = 'supir/penumpang'; 

$route['pesan/(:any)'] = 'guest/pesan/$1'; 
$route['cariTiket'] = 'guest/cari_tiket'; 
$route['perjalanan'] = 'guest/trips'; 
$route['peta_perjalanan'] = 'guest/peta_perjalanan'; 
$route['api/user/(:num)']['GET'] = 'Admin/get_by_id/$1';

$route['default_controller'] = 'guest/home';
$route['konfirmasi'] = 'guest/konfirmasi';

$route['admin/editJadwal/(:any)'] = 'admin/editJadwal/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// $route['api/(:num)']['GET'] = 'api/get_by_id/$1';
