<?php

use PhpParser\Node\Stmt\Else_;

class M_pemeliharaanJamTransaksi extends CI_Model{	
   
    private $table = "ref_jam_transaksi";


    function getAll(){   
        $hsl= $this->db->get($this->table)->result_array(); 
        return $hsl;
    } 

    function detail($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table); 
        return $hsl;
    }
  
    function update($where,$data){
       $this->db->where($where);
       $hasil= $this->db->update($this->table, $data);
       $username = $this->session->userdata('username');

       $activity="";
       if($hasil==true)
       {
            $activity = "Mengubah jam operasional kasda '".$where['KD_KASDA']."'";
       }
       else{
        $activity = "Gagal Mengubah jam operasional kasda '".$where['KD_KASDA']."'"; 
       }

       //get data sebelumnya,  
       return $this->insert_log($username, $activity, $where, $data); 
    }   

    function save($data){ 
        $hasil= $this->db->insert($this->table, $data);
        $username = $this->session->userdata('username');
 
        $activity="";
        if($hasil==true)
        {
            $activity = "Menambah jam operasional kasda '".$data['KD_KASDA']."'";
        }
        else{
         $activity = "Gagal Menambah jam operasional kasda '".$data['KD_KASDA']."'"; 
        }
 
        //get data sebelumnya,  
        return $this->insert_log($username, $activity, "", $data); 
     }   

    public function insert_log($username, $activity, $old_value, $new_value)
    {
        //get kasda dari username ();
        $this->db->where('USERNAME', $username);
        $kd_kasda = $this->db->get('user_system')->row_array()['KD_KASDA'];
        $data = array(
            'username' => $username, 
            'kd_kasda' => $kd_kasda, 
            'activity' => $activity, 
            'old_value' => json_encode($old_value), 
            'new_value' => json_encode($new_value), 
            'tanggal' => date('Y-m-d h:i:s'), 
        );

        $hasil=$this->db->insert('log_activity', $data);
        return $hasil;
    }  
     
    function hapus($where)
    {
        $this->db->where($where);
        $hasil =  $this->db->delete($this->table);  
        $username = $this->session->userdata('username');

        $activity="";
        if($hasil==true)
        {
             $activity = "Meghapus jam operasional kasda '".$where['ID']."'";
        }
        else{
         $activity = "Gagal Meghapus jam operasional kasda '".$where['ID']."'"; 
        }
 
        //get data sebelumnya,  
        return $this->insert_log($username, $activity, $where, ""); 
    } 

}