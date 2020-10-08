<?php

use PhpParser\Node\Stmt\Else_;

class M_pemeliharaanWwnangMenu extends CI_Model{	
   
    private $table = "ref_wewenang_menu";

    function detail($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table); 
        return $hsl;
    }

     // public function insert_log($username, $activity, $old_value, $new_value)
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


  
    function update($where,$data){

      $this->db->where($where); 
      $old_value = $hapus = $this->db->get($this->table)->result_array();

      $this->db->where($where);
      $update= $this->db->update($this->table, $data);
 
      $this->db->where('kd_wewenang', $data['kd_wewenang']); 
      $new_value =  $this->db->get($this->table)->result_array();

       $username = $this->session->userdata('username');
       $catatan_log="";
       if($update==true)
       {
          $catatan_log = "Mengubah wewenang menu '".$where['kd_wewenang']."'";
       }
       else{
          $catatan_log = "Gagal mengubah wewenang menu '".$where['kd_wewenang']."'"; 
       }

        //masukkkan data ke log  
        $hasil=$this->insert_log($username, $catatan_log,  $old_value, $new_value); 
       return $hasil; 
    }
 
    function hapus($where){

      $this->db->where($where); 
      $old_value = $hapus = $this->db->get($this->table)->result_array(); 

      //updae. set deleted menjadi 1
      $this->db->where($where);
      $update= $this->db->update($this->table, array('deleted' => 1 ));
      
      //get data setelah update
      $this->db->where($where);  
      $new_value =  $this->db->get($this->table)->result_array();  

       $username = $this->session->userdata('username');
       $activity="";
       if($update==true)
       {
          $activity = "Menghapus wewenang menu '".$where['kd_wewenang']."'";
       }
       else{
        $activity = "Gagal Menghapus wewenang menu '".$where['kd_wewenang']."'"; 
       }
       return $this->insert_log($username, $activity, $old_value, $new_value); 
    } 

    function save($data){
        $save=$this->db->insert($this->table, $data); 
        $username = $this->session->userdata('username');

       $catatan_log="";
       if($save==true)
       {
          $catatan_log = "Menambah wewenang menu '".$data['kd_wewenang']."'";
       }
       else{
        $catatan_log = "Gagal Menambah wewenang menu '".$data['kd_wewenang']."'"; 
       } 
        
        //masukkkan data ke log 
        $new_value  = array($data); 
        $old_value  = array(); 
        $hasil=$this->insert_log($username, $catatan_log,  $old_value, $new_value);

        return $hasil;  
    } 

    function getAll(){   
        $hsl= $this->db->get($this->table)->result_array(); 
        return $hsl;
    } 

    

}