

<?php
class MPemeliharaanAksesRekKoran extends CI_Model{ 

   private $table = "ref_pemeliharaan_akses_rek_koran";

    function getAll($where){
        $this->db->where($where);
        $hasil=$this->db->get($this->table);
        return $hasil->result_array();
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    }
 
    function getBy($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->row_array(); 
        return $hsl;
    }

      function getByObject($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result(); 
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

     function getByResult($where, $KD_USER){  

        $data = array();
        $this->db->where($where);
        $rekasda = $this->MRekeningKasda->getAllBykasda($where);   
        foreach ($rekasda as $key )
        {
            $chekcked = $this->cek_admin_rek($KD_USER, $key['NO_REK']);
            $data[] = array(
                'NM_PEMILIK' => $key['NM_PEMILIK'], 
                'NO_REKENING' => $key['NO_REK'], 
                'JENIS_REK' => 'RKUD',  
                'KD_DATA' => $key['KD_DATA'],  
                'CHECKED' => $chekcked,  
            );
        }

        $rekpotongan = $this->MRekeningPotongan->getByObject($where);   
        foreach ($rekpotongan as $key ) {
            $chekcked = $this->cek_admin_rek($KD_USER, $key['NO_REK']);  
            $data[] = array(
                'NM_PEMILIK' => $key['NM_PEMILIK'], 
                'NO_REKENING' => $key['NO_REK'], 
                'KD_DATA' => $key['KD_DATA'],  
                 'JENIS_REK' => 'REKENING POTONGAN',
                 'CHECKED' => $chekcked,    
            );
        }

        $rekSKPD = $this->MRekeningSkpd->getByResult($where);   
        foreach ($rekSKPD as $key ) {
            $chekcked = $this->cek_admin_rek($KD_USER, $key['NO_REK']);
            
            $data[] = array(
                'NM_PEMILIK' => $key['NM_PEMILIK'], 
                'NO_REKENING' => $key['NO_REK'], 
                'JENIS_REK' => 'REKENING SKPD', 
                'KD_DATA' => $key['KD_DATA'],  
                'CHECKED' => $chekcked,  
            );
        }  
       
        return $data;
    }

    public function cek_admin_rek($KD_USER, $NO_REKENING)
    {
        $this->db->where('ADMIN_REK',$KD_USER);
        $this->db->where('NO_REK',$NO_REKENING);
        $data2 = $this->db->get($this->table);
        if ($data2->num_rows()>0)
        {
           return "checked";
        }
        else
        {
            return "";
        }
    }

    
}