<?php
class MUserSystem extends CI_Model{ 

    private $table = "user_system";

    function getAll(){
        $hasil=$this->db->get($this->table);
        return $hasil->result_array();
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        $username = $this->session->userdata('username');

        $activity="";
        if($hasil==true)
        {
            $activity = "Menambah user '".$data['USERNAME']."'";
        }
        else{
         $activity = "Gagal menambah user '".$data['USERNAME']."'"; 
        }
        return $this->insert_log($username, $activity, array(), $data); 
    }
 
    function getBy($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->row_array(); 
        return $hsl;
    }
 
    function update($where,$data)
    { 
        $this->db->where($where);
        $old_value =  $this->db->get($this->table)->result_array;

        $this->db->where($where);
        $hasil =  $this->db->update($this->table, $data);

        return $hasil;

       /* $this->db->where($where);
        $new_value =  $this->db->get($this->table)->result_array;
       
        $username = $this->session->userdata('username'); */
       /* $activity="";
        if($hasil==true)
        {
            $activity = "berhasil Mengubah user '".$where['USERNAME']."'";
        }
        else{
            $activity = "Gagal Mengubah user '".$where['USERNAME']."'"; 
        }
        return $this->insert_log($username, $activity, $old_value, $new_value); */
    }
 
    function hapus($where){
        $this->db->where($where);
       $hasil= $this->db->delete($this->table);
       $username = $this->session->userdata('username'); 
       $activity="";
       if($hasil==true)
       {
            $activity = "Mengubah user '".$where['USERNAME']."'";
       }
       else{
        $activity = "Gagal Mengubah user '".$where['USERNAME']."'"; 
       }
       return $this->insert_log($username, $activity, $where, array() ); 
    }

     function getResult($where){  
        $this->db->where($where);
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