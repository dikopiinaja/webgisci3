<?php
Class Model_mobil extends CI_Model
{
    private $_table = "tb_mobil";

    public $id_mobil;
    public $nama_mobil;
    public $kapasitas;
    public $noplat;
    public $tipe;

    public function rules()
    {
        return [
            ['field' => 'nama_mobil',
            'label' => 'Nama Mobil',
            'rules' => 'required'],

            ['field' => 'kapasitas',
            'label' => 'Kapasitas',
            'rules' => 'required'],

            ['field' => 'noplat',
            'label' => 'No Plat',
            'rules' => 'required'],

            ['field' => 'tipe',
            'label' => 'Tipe',
            'rules' => 'required']
        
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_mobil" => $id])->row();
    }

    public function all_car()
    {  
        $query = $this->db->get('tb_mobil');
        return $query;
    }

    public function insert_mobil()
    {
        $post = $this->input->post();
		
		$this->nama_mobil =$post['nama_mobil'];
		$this->noplat = $post['noplat'];
		$this->kapasitas = $post['kapasitas'];
		$this->tipe = $post['tipe'];
        
		$this->db->insert($this->_table, $this);
    }

    public function hapus_mobil($id)
    {
        return $this->db->delete($this->_table, array("id_mobil" => $id));
    }

    public function update_mobil()
    {
        $post = $this->input->post();
		
		$this->id_mobil =$post['id'];
		$this->nama_mobil =$post['nama_mobil'];
		$this->noplat =$post['noplat'];
		$this->kapasitas =$post['kapasitas'];
		$this->tipe =$post['tipe'];
		$this->db->update($this->_table, $this, array('id_mobil' => $post['id']));
    }
}