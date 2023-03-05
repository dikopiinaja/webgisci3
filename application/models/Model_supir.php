<?php
Class Model_supir extends CI_Model
{
    private $_table = "tb_driver";

    // public $id_mobil;
    // public $nama_mobil;
    // public $kapasitas;
    // public $tipe;
    public function rules()
    {
        return [
            ['field' => 'nama_supir',
            'label' => 'Nama Supir',
            'rules' => 'required'],

            ['field' => 'tempat_lahir',
            'label' => 'Tempat Lahir',
            'rules' => 'required'],

            ['field' => 'tanggal_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'required'],

            ['field' => 'id_mobil',
            'label' => 'Mobil',
            'rules' => 'required'],

            ['field' => 'no_hp',
            'label' => 'No. HP',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required'],
        ];
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('tb_driver');
        $this->db->where('id_supir', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function all_driver()
    {  
        $query = $this->db->get('tb_driver');
        return $query;
    }

    public function Jumlahsupir()
    {
        return $this->db->count_all('tb_driver');
    }

    public function insert_supir()
    {
        $post = $this->input->post();
		
		$this->nama_supir =$post['nama_supir'];
		$this->tempat_lahir = $post['tempat_lahir'];
		$this->tanggal_lahir = $post['tanggal_lahir'];
		$this->no_hp = $post['no_hp'];
		$this->email = $post['email'];
		$this->id_mobil = $post['id_mobil'];
		$this->status = $post['status'];
		$this->db->insert($this->_table, $this);
    }

    public function delete_driver($id)
    {
        return $this->db->delete($this->_table, array("id_driver" => $id));
    }
}