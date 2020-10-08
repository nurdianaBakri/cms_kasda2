
<?php
class M_history_print extends CI_Model{ 
   
   private $table ="history_print";

    function detail($where)
    {
        $this->db->where($where);
        return $this->db->get($this->table);
    } 

      function update($where,$data){
       $this->db->where($where);
       return $this->db->update($this->table, $data);
    }
 
    function hapus($where){
        $this->db->where($where);
       return $this->db->delete($this->table);
    }

    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    }


}