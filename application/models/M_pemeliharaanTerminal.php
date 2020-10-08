<?php

use PhpParser\Node\Stmt\Else_;

class M_pemeliharaanTerminal extends CI_Model{	
   
    private $table = "ref_terminal";

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
            $activity = "Mengubah data terminal '".$where['KD_TERMINAL']."'";
       }
       else{
        $activity = "Gagal Mengubah data terminal '".$where['KD_TERMINAL']."'"; 
       }

       //get data sebelumnya,  
       return $this->insert_log($username, $activity, $where, $data); 
    }
 
    function hapus($where){
        $this->db->where($where);
       $hasil= $this->db->delete($this->table);
       $username = $this->session->userdata('username');

       $activity="";
       if($hasil==true)
       {
            $activity = "Menghapus data terminal '".$where['KD_TERMINAL']."'";
       }
       else{
        $activity = "Gagal Menghapus data terminal '".$where['KD_TERMINAL']."'"; 
       }
       return $this->insert_log($username, $activity, $where, array()); 
    } 

    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        $username = $this->session->userdata('username');

        $activity="";
        if($hasil==true)
        {
             $activity = "Menambah data terminal '".$data['KD_TERMINAL']."'";
        }
        else{
         $activity = "Gagal Menambah data terminal '".$data['KD_TERMINAL']."'"; 
        }
        return $this->insert_log($username, $activity, array(), $data); 
    } 

    function getAll(){   
        $hsl= $this->db->get($this->table)->result_array(); 
        return $hsl;
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

}