<?php
class M_Koreksi_verifikasi_sp2d extends CI_Model{ 

    private $table = "TrxSP2D_koreksi";

    function getAll($KD_KASDA){ 
        $hasil=$this->db->query("SELECT * FROM TrxSP2D_koreksi WHERE No_SP2D in (SELECT No_SP2D FROM TrxSP2D WHERE  KD_KASDA='$KD_KASDA')");
        return $hasil;
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    } 

    function detail($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table); 
        return $hsl;
    }  

    function update($where,$data){  
        $this->db->where($where);
        $hsl= $this->db->update($this->table,$data); 
        return $hsl;
    }  
     
    function hapus($where){
        $this->db->where($where);
       return $this->db->delete($this->table);
    }
}