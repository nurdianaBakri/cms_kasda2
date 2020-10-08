<?php
class M_TrxSP2D_Potongan extends CI_Model{ 

    private $table = "TrxSP2D_Potongan";

    function getAll(){
        $hasil=$this->db->get($this->table);
        return $hasil->result();
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
 
    function row_array($where){  
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

    public function get_potongan($data)
    {      
        $data_new = json_encode($data);  
        
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, 'http://localhost/cms_kasda_api/gateway_server/get_potongan/');
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl_bearer, CURLOPT_POST, true);
        curl_setopt($curl_bearer, CURLOPT_POSTFIELDS, $data_new);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($curl_bearer);
        curl_close($curl_bearer); 
        $hasil = json_decode($result, true);  
        return $hasil;
    } 

}