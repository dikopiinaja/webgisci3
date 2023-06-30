<?php

class Model_penumpang extends CI_Model{

    public function jumlahPenumpang()
    {
        return $this->db->count_all('tb_penumpang');
    }

    public function insertPenumpang($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }

    public function insertPemesan($data)
    {
        return $this->db->insert('tb_tiket', $data);
    }

    public function insertPembayaran($data)
    {
        return $this->db->insert('tb_pembayaran', $data);
    }

    public function allPenumpang()
    {
        $tgl_pesan = date("Y-m-d");
        $this->db->like('tgl_pesan', $tgl_pesan);
        $this->db->select('*');
        $this->db->select('tb_jadwal.*, Asal.nama_perjalanan AS ASAL, Tujuan.nama_perjalanan AS TUJUAN, Kategori.nama_kategori AS KATEGORI, Mobil.nama_mobil AS MOBIL');

        $this->db->from('tb_penumpang');
        $this->db->join('tb_jadwal','tb_jadwal.id_jadwal = tb_penumpang.id_jadwal');
        $this->db->join('tb_perjalanan as Asal','tb_jadwal.asal = Asal.id_perjalanan', 'left');
        $this->db->join('tb_perjalanan as Tujuan','tb_jadwal.tujuan = Tujuan.id_perjalanan', 'left');
        $this->db->join('tb_kategori as Kategori','tb_jadwal.kategori = Kategori.id_kategori', 'left');
        $this->db->join('tb_mobil as Mobil','tb_jadwal.mobil = Mobil.id_mobil', 'left');   
        $query = $this->db->get();
        return $query;
    }

    public function tampil()
    {
        $this->db->select('*');
        $this->db->select('tb_jadwal.*, Asal.nama_perjalanan AS ASAL, Tujuan.nama_perjalanan AS TUJUAN, Kategori.nama_kategori AS KATEGORI, Mobil.nama_mobil AS MOBIL');

        $this->db->from('tb_penumpang');
        $this->db->join('tb_jadwal','tb_jadwal.id_jadwal = tb_penumpang.id_jadwal');
        $this->db->join('tb_perjalanan as Asal','tb_jadwal.asal = Asal.id_perjalanan', 'left');
        $this->db->join('tb_perjalanan as Tujuan','tb_jadwal.tujuan = Tujuan.id_perjalanan', 'left');
        $this->db->join('tb_kategori as Kategori','tb_jadwal.kategori = Kategori.id_kategori', 'left');
        $this->db->join('tb_mobil as Mobil','tb_jadwal.mobil = Mobil.id_mobil', 'left');   
        $query = $this->db->get();
        return $query;
    }

    public function CetakID($id)
    {
        // $id = 'id';
        $this->db->select('*');
        // $this->db->from('tb_penumpang');
        $this->db->join('tb_jadwal','tb_jadwal.id_jadwal = tb_penumpang.id_jadwal'); 
        $this->db->join('tb_tiket','tb_tiket.no_tiket = tb_penumpang.no_tiket'); 
        $this->db->like('tb_penumpang.no_tiket', $id);
        return $this->db->get('tb_penumpang');
    }

    // public function CetakID($id)
    // {
    //     // $id = 'id';
    //     $this->db->like('no_tiket', $id);
    //     return $this->db->get('tb_penumpang')->result_array();
    // }

    public function Tampiltanggal()
    {
        $tgl_pesan = date("Y-m-d H:i:s");
        $this->db->like('tgl_pesan', $tgl_pesan);
       
        return $this->db->get('tb_penumpang')->result_array();
    }
}