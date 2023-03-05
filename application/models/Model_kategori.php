<?php
Class Model_kategori extends CI_Model
{ 
    private $_table = "tb_kategori";
    public function rules()
    {
        return [
            ['field' => 'nama_kategori',
            'label' => 'Kategori',
            'rules' => 'required']
        
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kategori" => $id])->row();
    }

    public function all_categories()
    {
        $query = $this->db->get('tb_kategori')->result();
        return $query;
    }

    // public function search($keyword)
    // {
    //     $this->db->like('id_jadwal', $keyword);
    //     $this->db->like('tgl_berangkat', $keyword);
    //     $this->db->or_like('dari', $keyword);
    //     $result = $this->db->get('tb_perjalanan')->result();
    //     return $result;
    // }

    public function update_kategori()
    {
        $post = $this->input->post();
		
		$this->id_kategori =$post['id'];
		$this->nama_mobil =$post['nama_kategori'];
		$this->db->update($this->_table, $this, array('id_kategori' => $post['id']));
    }

    public function hapus_kategori($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function insert_kategori()
    {
        $post = $this->input->post();
        $this->nama_kategori = $post["nama_kategori"];
        return $this->db->insert($this->_table, $this);
    }
}