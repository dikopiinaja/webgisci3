<?php
Class Model_perjalanan extends CI_Model{
    private $_table = "tb_perjalanan";

    // public $id_perjalanan;
    public $nama_perjalanan;

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_perjalanan" => $id])->row();
    }
    public function jumlahPerjalanan()
    {
        return $this->db->count_all('tb_perjalanan');
    }
    
    public function rules()
    {
        return [
            ['field' => 'nama_perjalanan',
            'label' => 'Perjalanan',
            'rules' => 'required'],

            ['field' => 'latitude',
            'label' => 'Latitude',
            'rules' => 'required'],

            ['field' => 'longitude',
            'label' => 'Longitude',
            'rules' => 'required'],

            ['field' => 'latlong',
            'label' => 'Latlong',
            'rules' => 'required'],
        ];
    }

    
    public function getPerjalanan()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getlist_trips($data) { 

        $query = "SELECT dari, sampai, tgl_berangkat FROM tb_perjalanan WHERE dari LIKE '$data%' OR sampai LIKE '$data%' OR tgl_berangkat LIKE '.$data' "; 
        $query = $this->db->query($query); 
        
        return $query->result_array(); 
    }

    public function insert_perjalanan()
    {
        $post = $this->input->post();
        $this->nama_perjalanan = $post["nama_perjalanan"];
        $this->latitude = $post["latitude"];
        $this->longitude = $post["longitude"];
        $this->latlong = $post["latlong"];
        return $this->db->insert($this->_table, $this);
    }


    public function update_perjalanan()
    {
        $post = $this->input->post();
		
		$this->id_perjalanan =$post['id'];
		$this->nama_perjalanan =$post['nama_perjalanan'];
		$this->db->update($this->_table, $this, array('id_perjalanan' => $post['id']));
    }

    public function hapus_perjalanan($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function get_perjalanan()
    {
        // $this->db->order_by('id_perjalanan', 'DESC');
        $query = $this->db->get('tb_perjalanan');
    
        if ($query->num_rows() > 0) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Success get perjalanan';
    
            foreach ($query->result() as $row) {
                $tempArray = array();
                $tempArray['id_perjalanan'] = (int)$row->id_perjalanan;
                $tempArray['nama_perjalanan'] = $row->nama_perjalanan;
                $tempArray['latitude'] = $row->latitude;
                $tempArray['longitude'] = $row->longitude;
                $tempArray['Latlong'] = $row->Latlong;
                $response['data'][] = $tempArray;
            }
            return $response;
        }
        return false;
    }

}