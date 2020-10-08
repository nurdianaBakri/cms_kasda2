<?php
class MImpoertSKPD extends CI_Model{ 

    private $table = "ref_import_skpd";

    function getAll(){
        $hasil=$this->db->get($this->table);
        return $hasil->result();
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    }

    // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
    public function insert_multiple($tabel, $data){

      if ($tabel=="ref_urusan")
      { 
        $data_urusan = array();
        $data_balikan = array();
        //jangan masukkan data yang duplikat
        foreach ($data as $key) {

          $this->db->where('KD_URUSAN',$key['KD_URUSAN']);
          $cek = $this->db->get('ref_urusan');
          if ($cek->num_rows()>0) { 
            //update 
            $data_update = array( 
              'NM_URUSAN'=>$key['NM_URUSAN'], 
              'USER_UPDATE'=>$key['USER_UPDATE'],
              'USER_INPUT'=>$key['USER_INPUT'],
            );
            $this->db->where('KD_URUSAN',$key['KD_URUSAN']);
            $update = $this->db->update('ref_urusan',$data_update);  

            $data_balikan[] = array(
              'sukses' => $update, 
              'prsoses' => "update", 
              'tabel' => $tabel, 
            );
          }
          else
          {
            // tambah data 
            $data_inputan = array( 
              'KD_URUSAN'=>$key['KD_URUSAN'], 
              'NM_URUSAN'=>$key['NM_URUSAN'], 
              'USER_UPDATE'=>$key['USER_UPDATE'],
              'USER_INPUT'=>$key['USER_INPUT'],
            );

            $tambah = $this->db->insert('ref_urusan',$data_inputan);
            $data_balikan[] = array(
              'sukses' => $tambah, 
              'prsoses' => "insert", 
              'tabel' => $tabel, 
            );
          }
        }
      }

      else { 
          
        $tambah= $this->db->insert_batch($tabel, $data); 
         $data_balikan[] = array(
              'sukses' => $tambah, 
              'prsoses' => "tambah", 
              'tabel' => $tabel, 
            );
      } 
    }
 
    function getBy($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->row_array(); 
        return $hsl;
    }
 
    function update($where,$data){
       $this->db->where($where);
       return $this->db->update($this->table, $data);
    }
 
    function hapus($where){
        $this->db->where($where);
       return $this->db->delete($this->table);
    }

   // Fungsi untuk melakukan proses upload file
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size'] = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
}