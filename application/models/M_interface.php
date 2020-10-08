<?php 

class M_interface extends CI_Model{	

    private $table = "interface";

	function detail($where){	
        $this->db->where($where);	
		return $this->db->get($this->table);
	}	

    public function getAll($KD_KASDA)
    {
       return $this->db->query("EXEC get_interface @KD_KASDA='".$KD_KASDA."'")->result_array(); 
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
            $catatan_log = "Berhasil mengubah data interface";
       }
       else
       {
            //pesan gagal ke log 
            $catatan_log = "Gagal mengubah data interface";
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
          $catatan_log ="Berhasil meng-entry data interface";

        }
        else
        {
          $catatan_log ="Gagal meng-entry data interface"; 
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
            $catatan_log = "Berhasil meghapus data interface";
        }
        else
        {                           
            //pesan gagal ke log 
            $catatan_log = "Gagal meghapus data interface";
        }

        $username = $this->session->userdata('username');
        return $this->M_log->insert_log_hapus($username, $catatan_log, $old_value);
    } 


	public function cek_rek($no_rek)
    {   
        $this->db->where('name_api','cek_saldo');
        $api_url = $this->db->get('config_api')->row()->api_url; 

        $ceksum = strtoupper(hash('sha256', '3NTB$2019'.$no_rek));    
        $url = $api_url."index.php/Data?checksum=".$ceksum."&type=3&norekening=".$no_rek;
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, $url);
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPGET, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
        $status = curl_exec($curl_bearer);
        curl_close($curl_bearer);
        $json_status=json_decode($status);  
        return $json_status;
    }

    public function cek_rekening_valid($no_rek)
    {
        //update status dan uraian
        $cek_rekening =  $this->cek_rek($no_rek); 
        $Uraian="";
        $uraian_tambahan="";
        $status="";

        //pengecekan berhasil 
        if ($cek_rekening->Status==true)
        {
            //rekeing valid
            $status = 1;   

            //check apakah nama sesuai dengan core  
            $data5 = $cek_rekening->Message->result;  
            if ($data5->ACCSTS==0 || $data5->ACCSTS==9 || $data5->ACCSTS=="0" || $data5->ACCSTS=="9")
            {
                $uraian_tambahan = "Rekening tidak aktif/tutup, ";
            }
            elseif ($data5->ACCSTS==7 || $data5->ACCSTS=="7") {
                $uraian_tambahan = "Rekening Pasif, ";
            }
            else
            {
                $uraian_tambahan = "Rekening Aktif, ";
            }

            if ($_POST['trx']['Nm_Penerima']==$data5->FULLNM)
            {
                // $Uraian = "Nama nasabah tidak sesuiai, nama yang sesuai adalah : ".$FULLNM;
                $Uraian = $uraian_tambahan."Nama nasabah sesuai : ".$data5->FULLNM;
            }
            else
            {
                $Uraian = $uraian_tambahan."Nama nasabah tidak sesuai, nama di-core : ".$data5->FULLNM;
            }
        }
        else
        {
            //rekening tidak valid, balikan dr core =99
            //pengecekan gagal
            // $status = 2;   
            if (strpos($_POST['trx']['Bank_Penerima'], 'NTB') !== false) {
                //jika bank penerima == bank NTB
                // echo 'true';
            } 
            else
            {
                //jika bank penerima == bukan bank NTB 
                $status = 3; 
            }

            $Uraian = $cek_rekening->Message; 
        }  

        $return = array(
            'status' => $status, 
            'uraian' => $Uraian.$uraian_tambahan, 
        ); 
        return $return;
    }


    public function rekening_koran($no_rek, $tglawal, $tglakhir)
    {
        $this->db->where('name_api','rekening_koran2'); 
        $api_url = $this->db->get('config_api')->row()->api_url;

        $ceksum = strtoupper(hash('sha256', '4NTB$2019'.$no_rek));    
        $url =$api_url.'index.php/Data?checksum='.$ceksum.'&type=4&norekening='.$no_rek.'&startDate='.$tglawal.'&endDate='.$tglakhir.'';
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, $url);
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPGET, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
        $status = curl_exec($curl_bearer);
        curl_close($curl_bearer);
        $json_status=json_decode($status);  
        // return $url;
        return $json_status;
    } 	 

    public function pemindahBukuan($_param)
    {    
        // echo strtoupper(hash('sha256', 'NTB$20190012299581015'));  
        $_param['checksum'] = strtoupper(hash('sha256', 'NTB$2019'.$_param['rek_pengirim'])); 
        
        $data_new = json_encode($_param); 

        $this->db->where('name_api','pemindahBukuan'); 
        $api_url = $this->db->get('config_api')->row()->api_url; 
     
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, $api_url);
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl_bearer, CURLOPT_POST, true);
        curl_setopt($curl_bearer, CURLOPT_POSTFIELDS, $data_new);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($curl_bearer);
        curl_close($curl_bearer);

        $json_status=json_decode($result);  
        return $json_status;
    }
}