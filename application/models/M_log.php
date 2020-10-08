<?php

use PhpParser\Node\Stmt\Else_;

class M_log extends CI_Model{	
   
    private $table = "log_activity";


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
        return $hasil; 
    }   

    function save($data){ 
        $hasil= $this->db->insert($this->table, $data); 
        return $hasil; 
     }   
     
    function hapus($where)
    {
        $this->db->where($where);
        $hasil =  $this->db->delete($this->table);  
        return $hasil;
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

    public function insert_log_hapus($username, $activity, $old_value)
    {
       //get kasda dari username ();
       $this->db->where('USERNAME', $username);
       $kd_kasda = $this->db->get('user_system')->row_array()['KD_KASDA']; 
  
       $data = array(
           'username' => $username, 
           'kd_kasda' => $kd_kasda, 
           'activity' => $activity, 
           'old_value' => json_encode($old_value),  
           'new_value' => json_encode(array(  )), 
           'tanggal' => date('Y-m-d h:i:s'), 
       );

       $hasil=$this->db->insert('log_activity', $data);
       return $hasil;
    } 

    public function insert_log_update($username, $activity, $where, $table, $new_value)
    {
       //get kasda dari username ();
       $this->db->where('USERNAME', $username);
       $kd_kasda = $this->db->get('user_system')->row_array()['KD_KASDA'];

       $this->db->where($where); 
       $old_value=$this->db->get($table)->result_array();    
  
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