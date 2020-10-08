<?php
class MMapping_Map extends CI_Model{ 

    private $table = "ref_maping_map";

    function getAll(){
        $hasil=$this->db->get($this->table);
        return $hasil->result_array();
    }

    public function getBywhere($where)
    {
        $this->db->where($where); 
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

    public function get_data_map($KD_KASDA, $KD_MAP)
    {
        return $this->db->query("EXEC get_maping_map @KD_KASDA='".$KD_KASDA."',@KD_MAP='".$key."'")->row_array();

    }
}