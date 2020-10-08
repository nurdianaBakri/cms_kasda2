<?php

use PhpParser\Node\Stmt\Else_;

class M_pemeliharaanWwnangUser extends CI_Model{	
   
    private $table = "ref_wewenang_menu";

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
            $activity = "Mengubah wewenang user '".$where['kd_wewenang']."'";
       }
       else{
        $activity = "Gagal Mengubah wewenang user '".$where['kd_wewenang']."'"; 
       }
       return $this->insert_log($username, $activity); 
    }
 
    function hapus($where){
        $this->db->where($where);
       $hasil= $this->db->delete($this->table);
       $username = $this->session->userdata('username');

       $activity="";
       if($hasil==true)
       {
            $activity = "Menghapus wewenang user '".$where['kd_wewenang']."'";
       }
       else{
        $activity = "Gagal Menghapus wewenang user '".$where['kd_wewenang']."'"; 
       }
       return $this->insert_log($username, $activity); 
    } 

    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        $username = $this->session->userdata('username');

        $activity="";
        if($hasil==true)
        {
             $activity = "Menambah wewenang user '".$data['kd_wewenang']."'";
        }
        else{
         $activity = "Gagal Menambah wewenang user '".$data['kd_wewenang']."'"; 
        }
        return $this->insert_log($username, $activity); 
    } 

    function getAll(){   
        $hsl= $this->db->get($this->table)->result_array(); 
        return $hsl;
    } 

    public function insert_log($username, $activity)
    {
       //get kasda dari username ();
       $this->db->where('USERNAME', $username);
       $kd_kasda = $this->db->get('user_system')->row_array()['KD_KASDA'];
       $data = array(
           'username' => $username, 
           'kd_kasda' => $kd_kasda, 
           'activity' => $activity, 
        //    'old_value' => json_encode($old_value), 
        //    'new_value' => json_encode($new_value), 
           'tanggal' => date('Y-m-d h:i:s'), 
       );

       $hasil=$this->db->insert('log_activity', $data);
       return $hasil;
    } 

}