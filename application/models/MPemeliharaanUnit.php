
<?php
class MPemeliharaanUnit extends CI_Model{ 

   private $table = "ref_unit";

     function getAll($KD_KASDA){

        $data_balikan = array();  
        $hasil= $this->db->query("SELECT  NM_UNIT, NM_URUSAN, KD_DATA_UNIT, ref_unit.KD_URUSAN, ref_unit.KD_BIDANG, KD_UNIT, ref_unit.USER_UPDATE,ref_unit.USER_INPUT,ref_unit.KD_KASDA , NM_KASDA 
            from ref_unit, ref_kasda, ref_urusan
            WHERE ref_unit.KD_KASDA='".$KD_KASDA."' 
            and ref_unit.KD_KASDA=ref_kasda.KD_KASDA 
            and ref_unit.KD_URUSAN=ref_urusan.KD_URUSAN ")->result_array();

         foreach ($hasil as $key) {  

            $this->db->where(array(
                'KD_BIDANG' => $key['KD_BIDANG'],
                'KD_URUSAN' => $key['KD_URUSAN'],
            ));
            $data_bidang= $this->db->get("ref_bidang")->row_array();    

           $data_balikan[] = array(
                'KD_UNIT' => $key['KD_UNIT'], 
                'NM_UNIT' => $key['NM_UNIT'], 
                'KD_URUSAN' => $key['KD_URUSAN'], 
                'NM_URUSAN' => $key['NM_URUSAN'], 
                'KD_BIDANG' => $key['KD_BIDANG'],  
                'NM_BIDANG' => $data_bidang['NM_BIDANG'], 
                'KD_KASDA' => $key['KD_KASDA'],  
                'NM_KASDA' => $key['NM_KASDA'], 
                'KD_DATA_UNIT' => $key['KD_DATA_UNIT'], 
            ); 
        }   
        return $data_balikan;
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

    public function get_last($where=null)
    {
        $result="";
        if ($where!=null)
        {
            $this->db->where($where);
            $this->db->select_max('KD_BIDANG');
            $result = $this->db->get($this->table)->row();  
        } 
        else
        {
            $this->db->where($where);
            $this->db->select_max('KD_BIDANG');
            $result = $this->db->get($this->table)->row(); 

        } 
        return $result->KD_BIDANG+1;
    }

    function getByResult($KD_URUSAN, $KD_BIDANG, $KD_KASDA){  
        // $this->db->where($where);
        $hsl= $this->db->query("SELECT * FROM REF_UNIT WHERE KD_KASDA='$KD_KASDA' AND KD_BIDANG='$KD_BIDANG' AND KD_URUSAN ='$KD_URUSAN'")->result_array(); 
        return $hsl;
    }


}