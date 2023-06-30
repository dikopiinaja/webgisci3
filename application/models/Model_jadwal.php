<?php
Class Model_jadwal extends CI_Model
{ 
    private $_table = 'tb_jadwal';

    public function rules()
    {
        return [
            ['field' => 'tgl_berangkat',
            'label' => 'Tanggal berangkat',
            'rules' => 'required'],

            ['field' => 'tgl_sampai',
            'label' => 'Tanggal sampai',
            'rules' => 'required'],

            ['field' => 'asal',
            'label' => 'Asal keberangkatan',
            'rules' => 'required'],

            ['field' => 'tujuan',
            'label' => 'Tujuan',
            'rules' => 'required'],

            ['field' => 'ongkos',
            'label' => 'Ongkos',
            'rules' => 'required'],

            ['field' => 'mobil',
            'label' => 'Mobil',
            'rules' => 'required'],

            ['field' => 'kategori',
            'label' => 'Kategori',
            'rules' => 'required'],
        
        ];
    }

    public function jumlahJadwal()
    {
        return $this->db->count_all('tb_jadwal');
    }

    public function tampil($id = null)
    {
        $this->db->select('tb_jadwal.*, Asal.nama_perjalanan AS ASAL, Tujuan.nama_perjalanan AS TUJUAN, Kategori.nama_kategori AS KATEGORI, Mobil.nama_mobil AS MOBIL');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_perjalanan as Asal','tb_jadwal.asal = Asal.id_perjalanan', 'left');
        $this->db->join('tb_perjalanan as Tujuan','tb_jadwal.tujuan = Tujuan.id_perjalanan', 'left');
        $this->db->join('tb_kategori as Kategori','tb_jadwal.kategori = Kategori.id_kategori', 'left');
        $this->db->join('tb_mobil as Mobil','tb_jadwal.mobil = Mobil.id_mobil', 'left');
        // $this->db->select('tb_mobil, id_mobil.mobil');
        return $this->db->get();
    }

    public function getById($id)
    {
        $this->db->select('tb_jadwal.*, Asal.nama_perjalanan AS ASAL, Tujuan.nama_perjalanan AS TUJUAN, Kategori.nama_kategori AS KATEGORI, Mobil.nama_mobil AS MOBIL');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_perjalanan as Asal','tb_jadwal.asal = Asal.id_perjalanan', 'left');
        $this->db->join('tb_perjalanan as Tujuan','tb_jadwal.tujuan = Tujuan.id_perjalanan', 'left');
        $this->db->join('tb_kategori as Kategori','tb_jadwal.kategori = Kategori.id_kategori', 'left');
        $this->db->join('tb_mobil as Mobil','tb_jadwal.mobil = Mobil.id_mobil', 'left');
        $this->db->where('tb_jadwal.id_jadwal', $id);
        return $this->db->get()->row();
    }

    public function insert_jadwal()
    {
        $post = $this->input->post();
        $this->mobil = $post["mobil"];
        $this->asal = $post["asal"];
        $this->tujuan = $post["tujuan"];
        $this->tgl_berangkat = $post["tgl_berangkat"];
        $this->tgl_sampai = $post["tgl_sampai"];
        $this->ongkos = $post["ongkos"];
        $this->kategori = $post["kategori"];
        $this->tgl_dibuat = date('Y-m-d');

        $this->db->insert($this->_table, $this);
    }

    public function update_jadwal()
    {
        $post = $this->input->post();
		
		$this->id_jadwal =$post['id'];
		$this->mobil =$post['mobil'];
		$this->asal =$post['asal'];
		$this->tujuan =$post['tujuan'];
		$this->tgl_berangkat =$post['tgl_berangkat'];
		$this->tgl_sampai =$post['tgl_sampai'];
		$this->ongkos =$post['ongkos'];
		$this->kategori =$post['kategori'];
		$this->db->update($this->_table, $this, array('id_jadwal' => $post['id']));
    }

    public function hapus_jadwal($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    function getjadwal()
    {
        $this->db->select('tb_jadwal.*, Asal.nama_perjalanan AS ASAL, Tujuan.nama_perjalanan AS TUJUAN, Kategori.nama_kategori AS KATEGORI, Mobil.nama_mobil AS MOBIL');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_perjalanan as Asal','tb_jadwal.asal = Asal.id_perjalanan', 'left');
        $this->db->join('tb_perjalanan as Tujuan','tb_jadwal.tujuan = Tujuan.id_perjalanan', 'left');
        $this->db->join('tb_kategori as Kategori','tb_jadwal.kategori = Kategori.id_kategori', 'left');
        $this->db->join('tb_mobil as Mobil','tb_jadwal.mobil = Mobil.id_mobil', 'left');

        $query = $this->db->get();
        // $query = $this->db->get('tb_jadwal');
    
        if ($query->num_rows() > 0) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Success get jadwal';
    
            foreach ($query->result() as $row) {
                $tempArray = array();
                $tempArray['id_jadwal'] = (int)$row->id_jadwal;
                $tempArray['tgl_berangkat'] = $row->tgl_berangkat;
                $tempArray['tgl_sampai'] = $row->tgl_sampai;
                $tempArray['asal'] = $row->ASAL;
                $tempArray['tujuan'] = $row->TUJUAN;
                $tempArray['ongkos'] = $row->ongkos;
                $tempArray['mobil'] = $row->MOBIL;
                $tempArray['kategori'] = $row->KATEGORI;
                $tempArray['tgl_dibuat'] = $row->tgl_dibuat;
                $response['data'][] = $tempArray;
            }
            return $response;
        }
        return false;
    }
}