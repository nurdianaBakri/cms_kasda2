<?php

use PhpParser\Node\Stmt\Else_;

class M_pemeliharaanMenu extends CI_Model{	
   
    private $table = "ref_menu";

    function detail($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table); 
        return $hsl;
    }
  
    function update($where,$data){ 

        //get data old_value
        $this->db->where($where); 
        $old_value=$this->db->get($this->table)->result_array(); 

        //update data
        $this->db->where($where);
        $update=  $this->db->update($this->table, $data);   
        
        $catatan_log= "";
       if ($update==true) 
       {
           # code...
            //pesan berhasil ke log
            $catatan_log = "Berhasil mengubah data menu";
       }
       else
       {
            //pesan gagal ke log 
            $catatan_log = "Gagal mengubah data menu";
       }

       //get data baru, untuk di masukkan ke log 
       $this->db->where($where); 
       $new_value=$this->db->get("ref_menu")->result_array(); 

        //masukkkan data ke log 
        $username   = $this->session->userdata('username');
        $insert_log = $this->M_log->insert_log($username, $catatan_log, $old_value, $new_value);

        return $insert_log; 
    }
 
    function hapus($where){
         //get data old_value
        $this->db->where($where); 
        $old_value=$this->db->get($this->table)->result_array();    
        
        //delete data  
        $this->db->where($where);
        $hapus =  $this->db->delete($this->table);
        $catatan_log= "";
        if ($hapus==true) 
        {
           # code...
            //pesan berhasil ke log
            $catatan_log = "Berhasil meghapus data menu";
        }
        else
        {                           
            //pesan gagal ke log 
            $catatan_log = "Gagal meghapus data menu";
        }

        $username = $this->session->userdata('username');
        return $this->M_log->insert_log_hapus($username, $catatan_log, $old_value);
    } 

    function save($data){
        $hasil=$this->db->insert($this->table, $data);

         //insert data log 
        $catatan_log ="";
        if ($hasil==true) {  
          $catatan_log ="Berhasil meng-entry data menu";

        }
        else
        {
          $catatan_log ="Gagal meng-entry data menu"; 
        }

        //masukkkan data ke log 
        $new_value  = array($data);
        $username = $this->session->userdata('username');
        $hasil=$this->M_log->insert_log($username, $catatan_log,  array(), $new_value);

        return $hasil; 
    } 

    function getAll(){   
        $hsl= $this->db->get($this->table)->result_array(); 
        return $hsl;
    }


}