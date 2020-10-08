<?php
class MPemeliharaanMap extends CI_Model{ 

    private $table = "ref_map";

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

    public function get_MAP1($kd_kasda)
    {
        $data2 = array( );
        $data = $this->db->query("SELECT URAIAN, KD_MAP FROM ref_map WHERE KD_MAP IN( select KD_MAP FROM ref_maping_map WHERE KD_KASDA='$kd_kasda')")->result_array();
        foreach ($data as $key) {
            $data2[]  = array(
                'URAIAN' => $key['URAIAN'], 
                'KD_MAP' => $key['KD_MAP'], 
                'Nilai' => 0, 
            ); 
        }
        return $data2;
    }
}