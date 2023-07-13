<?php
class Model_Guest extends CI_Model
{
    public function getDataPerjalanan()
    {
        return $this->db->get('tb_perjalanan');
    }
    
    public function cari_tiket($data)
    {
        $this->db->select('tb_jadwal.*, Asal.nama_perjalanan AS ASAL, LatLong1.LatLong AS LATLONG1, LatLong2.Latlong AS LATLONG2, Tujuan.nama_perjalanan AS TUJUAN, Kategori.nama_kategori AS KATEGORI, Mobil.nama_mobil AS MOBIL');
        $this->db->where($data);
        $this->db->like('tgl_berangkat', $this->input->post('tgl'));
        $this->db->from('tb_jadwal');
        $this->db->join('tb_perjalanan as Asal', 'tb_jadwal.asal = Asal.id_perjalanan', 'left');
        $this->db->join('tb_perjalanan as Tujuan', 'tb_jadwal.tujuan = Tujuan.id_perjalanan', 'left');
        $this->db->join('tb_perjalanan as Latlong1', 'tb_jadwal.asal = Latlong1.id_perjalanan', 'left');
        $this->db->join('tb_perjalanan as Latlong2', 'tb_jadwal.tujuan = Latlong2.id_perjalanan', 'left');
        $this->db->join('tb_kategori as Kategori', 'tb_jadwal.kategori = Kategori.id_kategori', 'left');
        $this->db->join('tb_mobil as Mobil', 'tb_jadwal.mobil = Mobil.id_mobil', 'left');
        return $this->db->get();
    }

    // public function getTiket()
    // {
    //     $this->db->select('tb_jadwal.*, Asal.nama_perjalanan AS ASAL, LatLong1.LatLong AS LATLONG1, LatLong2.Latlong AS LATLONG2, Tujuan.nama_perjalanan AS TUJUAN, Kategori.nama_kategori AS KATEGORI, Mobil.nama_mobil AS MOBIL');

    //     $this->db->like('no_tiket', $_GET('no_tiket'));
    //     $this->db->from('tb_jadwal');
    //     $this->db->join('tb_perjalanan as Asal', 'tb_jadwal.asal = Asal.id_perjalanan', 'left');
    //     $this->db->join('tb_perjalanan as Tujuan', 'tb_jadwal.tujuan = Tujuan.id_perjalanan', 'left');
    //     $this->db->join('tb_perjalanan as Latlong1', 'tb_jadwal.asal = Latlong1.id_perjalanan', 'left');
    //     $this->db->join('tb_perjalanan as Latlong2', 'tb_jadwal.tujuan = Latlong2.id_perjalanan', 'left');
    //     $this->db->join('tb_kategori as Kategori', 'tb_jadwal.kategori = Kategori.id_kategori', 'left');
    //     $this->db->join('tb_mobil as Mobil', 'tb_jadwal.mobil = Mobil.id_mobil', 'left');
    //     $query = $this->db->get();
    //     echo $_GET('no_tiket');
    //     die();
    //     return $query;
    //     // echo "<pre>";
    //     // print_r($query);
    //     // die();
    //     // "</pre>";
        
    // }

    public function getDatainfopemesanan($id)
    {
        $this->db->select('tb_jadwal.*, Asal.nama_perjalanan AS ASAL, Tujuan.nama_perjalanan AS TUJUAN, Kategori.nama_kategori AS KATEGORI, Mobil.nama_mobil AS MOBIL, Mobil.kapasitas');
        $this->db->where('tb_jadwal.id_jadwal', $id);
        $this->db->join('tb_perjalanan as Asal', 'tb_jadwal.asal = Asal.id_perjalanan', 'left');
        $this->db->join('tb_perjalanan as Tujuan', 'tb_jadwal.tujuan = Tujuan.id_perjalanan', 'left');
        $this->db->join('tb_kategori as Kategori', 'tb_jadwal.kategori = Kategori.id_kategori', 'left');
        $this->db->join('tb_mobil as Mobil', 'tb_jadwal.mobil = Mobil.id_mobil', 'left');

        return $this->db->get('tb_jadwal');
    }

    public function getKursi()
    {
        $today = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM tb_penumpang WHERE tgl_pesan like '%$today%'");
        // var_dump($query);
        // die();
        return $query;
    }

    public function getTiket()
    {
        return $this->db->get('tb_tiket');
    }

    public function getTiketID($no_tiket)
    {
        // echo $no_tiket;
        $this->db->select('*');
        $this->db->where('no_tiket', $no_tiket);
        $ticket = $this->db->get('tb_penumpang');
        return $ticket;
    }

    public function getPembayaran()
    {
        return $this->db->get('tb_pembayaran');
    }

    public function Autotiket()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id,4)) AS kd_max FROM tb_penumpang WHERE DATE(tgl_pesan)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy') . $kd;
    }

    public function travelProfile()
    {
        $query = $this->db->get('tb_travel');
        return $query;
    }

    public function dataBooking()
    {
        $query = $this->db->get('tb_penumpang');
        return $query;
    }
}
