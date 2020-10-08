
<?php
class M_hapusSKPD extends CI_Model{ 
   
    function hapus($where,$table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    } 
}