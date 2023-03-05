<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('tgl_indo')) {
    // function tgl_indo($date)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $date = date("Y-m-d H:i:s"); //waktu sekarang
    //     $Hari = array("Minggu","Senin","Selasa", "Rabu", "Kamis", "Jumat","Sabtu");
    //     $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    //     $tahun = substr($date,0,4);
    //     $bulan = substr($date,5,2);
    //     $tgl = substr($date,8,2);
    //     $waktu = substr($date,11,5);
    //     $tampil = date("w", mktime(0,0,0,$bulan,$tgl,$tahun));
    //     // $hari = date("w", strtotime($date));
        
     
    //     $result = $Hari[$tampil].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun."  "."Wib";
    //     return $result;
    // }
    function tgl_indo($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;
    }

    function tanggal_indo($tanggal){
        $bulan = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $split = explode('-', $tanggal);
            return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        }

    function hari_indo($day){
        $hari = array ( 1 =>    'Senin',
          'Selasa',
          'Rabu',
          'Kamis',
          'Jumat',
          'Sabtu',
          'Minggu'
        );
        return $hari[$day];
      }
    
    function getBulan($bln){
        switch ($bln){
          case 1:
            return "Januari";
            break;
          case 2:
            return "Februari";
            break;
          case 3:
            return "Maret";
            break;
          case 4:
            return "April";
            break;
          case 5:
            return "Mei";
            break;
          case 6:
            return "Juni";
            break;
          case 7:
            return "Juli";
            break;
          case 8:
            return "Agustus";
            break;
          case 9:
            return "September";
            break;
          case 10:
            return "Oktober";
            break;
          case 11:
            return "November";
            break;
          case 12:
            return "Desember";
            break;
        }
    }
    function nama_hari(){
        $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $hari = date("w");
        $hari_ini = $seminggu[$hari];
        return $hari_ini;
      }
}

?>