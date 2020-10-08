
<?php
class M_SKPD extends CI_Model{ 

    public function cek_rekening($No_Rekening)
    {
        $data = array(  
            'accnbr'=>$No_Rekening, 
        );

        $data_new = json_encode($data);
        
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, 'http://10.2.2.3/ntb-rest-server/index.php/inquiry');
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl_bearer, CURLOPT_POST, true);
        curl_setopt($curl_bearer, CURLOPT_POSTFIELDS, $data_new);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($curl_bearer);
        curl_close($curl_bearer); 
        $hasil = json_decode($result, true); 
        return $hasil['rCode']+0;  
    }  

    public function get_bidang($kd_urusan)
    {
        $data_bidang = array();
        $where = array(
            'KD_URUSAN' => $kd_urusan, 
        ); 

        $bidang = $this->getBy($where, "ref_bidang");
        if ($bidang->num_rows()>0)
        {
           $bidang2 = $bidang->result_array();
           foreach ($bidang2 as $bidang3)
           { 
                $where2 = array(
                    'KD_URUSAN' => $kd_urusan, 
                    'KD_BIDANG' => $bidang3['KD_BIDANG'], 
                );  

               //GET unnit
                $data_unit = $this->get_unit($where2);

                $data_bidang[] = array(
                    'kd_gabungan' => $bidang3['KD_URUSAN'].".".$bidang3['KD_BIDANG'], 
                    'kd_bidang' => $bidang3['KD_BIDANG'], 
                    'nm_bidang' => $bidang3['NM_BIDANG'], 
                    'data_unit' => $data_unit, 
                );
           }   
        }

        return $data_bidang;
    }

    public function get_unit($where)
    {
       $data_unit = array( );
       $unit = $this->getBy($where, "ref_unit");
        if ($unit->num_rows()>0)
        { 
           foreach ($unit->result_array() as $unit2)
           { 
                $where2 = array(
                    'KD_URUSAN' => $where['KD_URUSAN'], 
                    'KD_BIDANG' => $where['KD_BIDANG'], 
                    'KD_UNIT' => $unit2['KD_UNIT'], 
                );  

                //GET unnit
                $data_sub_unit = $this->get_sub_unit($where2); 

                $data_unit[] = array(
                    'kd_gabungan' => $where['KD_URUSAN'].".".$where['KD_BIDANG'].".".$unit2['KD_UNIT'], 
                    'kd_unit' => $unit2['KD_UNIT'], 
                    'nm_unit' => $unit2['NM_UNIT'],
                    'data_sub_unit' => $data_sub_unit
                ); 
           }
       } 
       return $data_unit;
    }

     public function get_sub_unit($where)
    {
       $data_sub_unit = array();
       $sub_unit = $this->getBy($where, "ref_sub_unit");
        if ($sub_unit->num_rows()>0)
        { 
           foreach ($sub_unit->result_array() as $sub_unit2)
           {
                $data_sub_unit[] = array(
                    'kd_gabungan' => $where['KD_URUSAN'].".".$where['KD_BIDANG'].".".$where['KD_UNIT'].".".$sub_unit2['KD_SUB_UNIT'], 
                    'kd_sub_unit' => $sub_unit2['KD_SUB_UNIT'], 
                    'nm_sub_unit' => $sub_unit2['NM_SUB_UNIT']
                ); 
           }
       } 
       return $data_sub_unit;
    }
 
    function getAll(){ 

        $data = array( );
        $data_bidang = array( );
        $data_unit = array( );
        $urusan=$this->db->get("ref_urusan");
        foreach ($urusan->result_array() as $urusan ) { 

            //GET BIDANG
            $data_bidang = $this->get_bidang($urusan['KD_URUSAN']);

            $data[] = array(
                'kd_gabungan' => $urusan['KD_URUSAN'],
                'nm_urusan' => $urusan['NM_URUSAN'],
                'data_bidang' => $data_bidang, 
            );  
        } 
        return $data;
    }

 
    function getBy($where, $table){  
        $this->db->where($where);
        $hsl= $this->db->get($table); 
        return $hsl;
    }

      function getByObject($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result_array(); 
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

     function getByResult($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result_array(); 
        return $hsl;
    }

    
}