<?php
class MKonfigurasi_kasda extends CI_Model{ 

    private $table = "ref_konfigurasi_kasda";

    function getAll(){
        $hasil=$this->db->get($this->table);
        return $hasil->result_array();
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    }
 
    function getBy($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->row_array(); 
        return $hsl;
    }
 
    function update($where,$data){
       $this->db->where($where);
       return $this->db->update($this->table, $data);
    }
 
    function hapus($where){
        $this->db->where($where);
       return $this->db->delete($this->table);
    }

     function getResult($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result_array(); 
        return $hsl;
    }

    public function getNamaKonfigurasi($KD_KASDA)
    {
        $data =$this->db->query("SELECT * FROM ref_konfigurasi_kasda where KD_KASDA='$KD_KASDA'")->result();
        return $data;
    }
}