
<?php
class MPemeliharaanSubUnit extends CI_Model{ 

   private $table = "ref_sub_unit";

    function getAll($KD_KASDA=null){
        if ($KD_KASDA==NULL) {
             $hasil=$this->db->get($this->table);
            return $hasil->result();
        }
        else
        {
            $this->db->where('KD_KASDA', $KD_KASDA);
            $hasil=$this->db->get($this->table);
            return $hasil->result();
        } 
    }

    function getAll_view(){
        $hasil=$this->db->get('v_data_skpd');
        return $hasil->result_array();
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);

        //insert data log 
        $catatan_log ="";
        if ($hasil==true) {  
          $catatan_log ="Berhasil meng-entry data sub unit";

        }
        else
        {
          $catatan_log ="Gagal meng-entry data sub unit"; 
        }

        //masukkkan data ke log 
        $new_value  = array($data);
        $username = $this->session->userdata('username');
        $hasil=$this->M_log->insert_log($username, $catatan_log,  array(), $new_value);

        return $hasil;
    }
 
    function getBy($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->row_array(); 
        return $hsl;
    }

    // public function detail($kd_data_sub_unit)
    // {
    //     //GET DATA URUSAN 
    //         $this->db->where(array(
    //             'KD_URUSAN' => $data->KD_URUSAN, 
    //         ));
    //         $data_urusan= $this->db->get("ref_urusan")->row_array();  
 
    //         //GET DATA BIDAGN 
    //        $this->db->where(array(
    //             'KD_BIDANG' => $data->KD_BIDANG,
    //             'KD_URUSAN' => $data->KD_URUSAN,
    //         ));
    //         $data_bidang= $this->db->get("ref_bidang")->row_array();  

    //           //GET DATA BIDAGN 
    //        $this->db->where(array(
    //             'KD_BIDANG' => $data->KD_BIDANG,
    //             'KD_URUSAN' => $data->KD_URUSAN,
    //             'KD_KASDA' => $data->KD_KASDA,
    //         ));
    //         $data_unit= $this->db->get("ref_unit")->row_array();   

    //         //GET DATA KASDA 
    //         $this->db->where(array('KD_KASDA' => $data->KD_KASDA ));
    //         $data_kasda= $this->db->get("ref_kasda")->row_array();   
    // }
 
    function update($where,$data){

        //get data old_value
        $this->db->where($where); 
        $old_value=$this->db->get("ref_sub_unit")->result_array();    

       $this->db->where($where);
       $update= $this->db->update($this->table, $data); 

       $catatan_log= "";
       if ($update==true) 
       {
           # code...
            //pesan berhasil ke log
            $catatan_log = "Berhasil mengubah data sub unit";
       }
       else
       {
            //pesan gagal ke log 
            $catatan_log = "Gagal mengubah data sub unit";
       }

       //get data baru, untuk di masukkan ke log 
       $this->db->where($where); 
       $new_value=$this->db->get("ref_sub_unit")->result_array(); 

       //masukkkan data ke log 
        $username = $this->session->userdata('username');
        $insert_log=$this->M_log->insert_log($username, $catatan_log, $old_value, $new_value);

        return $insert_log;
    }
 
    function hapus($where){
 
        //get data old_value
        $this->db->where($where); 
        $old_value=$this->db->get("ref_sub_unit")->result_array();    
 
        //delete data  
        $this->db->where($where);
        $hapus =  $this->db->delete($this->table);
        $catatan_log= "";
        if ($hapus==true) 
        {
           # code...
            //pesan berhasil ke log
            $catatan_log = "Berhasil meghapus data sub unit";
        }
        else
        {
            //pesan gagal ke log 
            $catatan_log = "Gagal meghapus data sub unit";
        }

        $username = $this->session->userdata('username');
        return $this->M_log->insert_log_hapus($username, $catatan_log, $old_value);
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

}