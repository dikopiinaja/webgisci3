<?php

class Model_nomer extends CI_Model {
    public function autonumb()
    {
        $this->db->select('RIGHT(tb_perjalanan.id_perjalanan,4) as kode', FALSE );
        $this->db->order_by('id_perjalanan','DESC');
        $this->db->limit(1);
        $query =  $this->db->get('tb_perjalanan');
        if ($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else {
            //jika kode belum ada
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "IRT-".$kodemax;
        return $kodejadi;
    }

    public function autosupir()
    {
        $this->db->select('RIGHT(supir.id_supir,4) as kode', FALSE );
        $this->db->order_by('id_supir','DESC');
        $this->db->limit(1);
        $query =  $this->db->get('supir');
        if ($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else {
            //jika kode belum ada
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "SPR-".$kodemax;
        return $kodejadi;
    }
    public function autodept()
    {
        $this->db->select('RIGHT(departement.id_departement,4) as kode', FALSE );
        $this->db->order_by('id_departement','DESC');
        $this->db->limit(1);
        $query =  $this->db->get('departement');
        if ($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else {
            //jika kode belum ada
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "DPR-".$kodemax;
        return $kodejadi;
    }
	public function autotiket($table, $field, $code){

		$year = date('Y');
		$month = date('m');
		$q = $this->db->query("SELECT max(right(".$field.",3)) AS idmax FROM ".$table." where YEAR(created_at)='".$year."' and MONTH(created_at)='".$month."'");
        $urut = ""; //no urut
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
				
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $urut = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $urut = "001";
        }
        //gabungkan string dengan kode yang telah dibuat tadi
        return $code.$year.$month.$urut;
	}

}




?>