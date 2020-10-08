
<?php
class MPemeliharaanUrusan extends CI_Model{ 

   private $table = "ref_urusan";

    function getAll(){
        $hasil=$this->db->get($this->table);
        return $hasil->result();
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

    public function get_last_kdurusan()
    {
        $this->db->select_max('KD_URUSAN');
        $result = $this->db->get($this->table)->row();  
        return $result->KD_URUSAN+1;
    }

}