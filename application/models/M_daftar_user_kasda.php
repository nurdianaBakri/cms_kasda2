<?php 

class M_daftar_user_kasda extends CI_Model{	

    private $table = "config_api";

	function detail($where){	
        $this->db->where($where);	
		return $this->db->get($this->table);
	}	

    public function getAll($KD_KASDA)
    {
       return $this->db->query("EXEC daftar_user_kasda @KD_KASDA='".$KD_KASDA."'")->result_array(); 
    }
 
	public function update($where, $data)
	{ 
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
            $catatan_log = "Berhasil mengubah data API Core Banking";
       }
       else
       {
            //pesan gagal ke log 
            $catatan_log = "Gagal mengubah data API Core Banking";
       }

       //get data baru, untuk di masukkan ke log 
       $this->db->where($where); 
       $new_value=$this->db->get($this->table)->result_array(); 

        //masukkkan data ke log 
        $username   = $this->session->userdata('username');
        $insert_log = $this->M_log->insert_log($username, $catatan_log, $old_value, $new_value);

        return $insert_log;  
	}


     function save($data){
        $hasil=$this->db->insert($this->table, $data);

         //insert data log 
        $catatan_log ="";
        if ($hasil==true) {  
          $catatan_log ="Berhasil meng-entry data API Core Banking";

        }
        else
        {
          $catatan_log ="Gagal meng-entry data API Core Banking"; 
        }

        //masukkkan data ke log 
        $new_value  = array($data);
        $username = $this->session->userdata('username');
        $hasil=$this->M_log->insert_log($username, $catatan_log,  array(), $new_value);

        return $hasil; 
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
            $catatan_log = "Berhasil meghapus data API Core Banking";
        }
        else
        {                           
            //pesan gagal ke log 
            $catatan_log = "Gagal meghapus data API Core Banking";
        }

        $username = $this->session->userdata('username');
        return $this->M_log->insert_log_hapus($username, $catatan_log, $old_value);
    } 

 
}