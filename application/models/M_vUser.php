<?php

use PhpParser\Node\Stmt\Else_;

class M_vUser extends CI_Model{	
   
    private $table = "v_user"; 
    function detail($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table); 
        return $hsl;
    }
  
    function update($where,$data){

      //get old data 
      $this->db->where($where);
      $old_value = $this->db->get($this->table)->result_array(); 

       $this->db->where($where);
       $update = $this->db->update($this->table, $data);

       //get new value 
        $this->db->where('USERNAME', $data['USERNAME']);
        $new_value = $this->db->get($this->table)->result_array();

        //get_sesion 
        $username = $this->session->userdata('username');
        $activity="";
        if($update==true)
        {
            $activity = "Mengubah user '".$where['USERNAME']."'";
        }
        else{
            $activity = "Gagal mengubah user '".$where['USERNAME']."'"; 
        }    
        return $this->insert_log($username, $activity, $old_value, $new_value); 
    }
 
    function hapus($where){

      //get old data 
      $this->db->where($where);
      $old_value = $this->db->get($this->table)->result_array(); 

      $this->db->where($where);
      $hapus= $this->db->delete($this->table);

      $new_value[] = array( );

       //get_sesion 
       $username = $this->session->userdata('username');
       $activity="";
       if($hapus==true)
       {
            $activity = "Menghapus user '".$where['USERNAME']."'";
       }
       else{
        $activity = "Gagal menghapus user '".$where['USERNAME']."'"; 
       }
       return $this->insert_log($username, $activity, $old_value, $new_value); 
    } 

    function save($data)
    { 
      $new_value[] = $data;
      $old_value[]  = array();

        $hasil=$this->db->insert($this->table, $data);

         //get_sesion 
         $username = $this->session->userdata('username');
         $activity="";
         if($hasil==true)
         {
              $activity = "Menambah user '".$data['USERNAME']."'";
         }
         else{
          $activity = "Gagal menambah user '".$data['USERNAME']."'"; 
         }
         return $this->insert_log($username, $activity, $old_value, $new_value);  
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