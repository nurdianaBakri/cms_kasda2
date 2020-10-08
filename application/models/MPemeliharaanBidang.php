
<?php
class MPemeliharaanBidang extends CI_Model{ 

   private $table = "ref_bidang";

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

      function getByObject($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result(); 
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

    public function get_last()
    { 
        $this->db->select_max('KD_DATA_BIDANG');
        $result = $this->db->get($this->table)->row();
        return $result->KD_DATA_BIDANG+1;
    }

    public function get_kode_bidang_by_kode_urusan($where)
    {  
        $this->db->where($where);
        $this->db->select_max('KD_BIDANG');
        $result = $this->db->get($this->table)->row(); 
        return $result->KD_BIDANG+1;
    }

     function getByResult($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result_array(); 
        return $hsl;
    }

    
}