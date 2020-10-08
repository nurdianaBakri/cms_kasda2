
<?php
class M_temp_penguji extends CI_Model{  

    public function detail($where)
    {
       $data_sub_unit = array();
       $sub_unit = $this->getBy($where, "TEMP_PENGUJI2");
        if ($sub_unit->num_rows()>0)
        { 
           foreach ($sub_unit->result_array() as $sub_unit2)
           {
                $data_sub_unit[] = array(
                    'kd_gabungan' => $where['KD_URUSAN'].".".$where['KD_BIDANG'].".".$where['KD_UNIT'].".".$sub_unit2['KD_SUB_UNIT'], 
                    'kd_sub_unit' => $sub_unit2['KD_SUB_UNIT'], 
                    'nm_sub_unit' => $sub_unit2['NM_SUB_UNIT']
                ); 
           }
       } 
       return $data_sub_unit;
    } 
 
    function update($where,$data, $data2){
         date_default_timezone_set('asia/jakarta');
        $now = new DateTime();    

        $data_input1 = array(
            'Bank_Penerima' => $data['trx']['Bank_Penerima'], 
            'DateCreate' => $data['trx']['DateCreate'], 
            'Kd_Bidang' => $data['trx']['Kd_Bidang'], 
            'Kd_Sub' => $data['trx']['Kd_Sub'], 
            'Kd_Unit' => $data['trx']['Kd_Unit'], 
            'Kd_Urusan' => $data['trx']['Kd_Urusan'], 
            'Keterangan' => $data['trx']['Keterangan'], 
            'NPWP' => $data['trx']['NPWP'], 
            'Nilai' => $data['trx']['Nilai'], 
            'Nm_Bank' => $data['trx']['Nm_Bank'], 
            'Nm_Penerima' => $data['trx']['Nm_Penerima'], 
            'No_Rekening' => $data2['No_Rekening'],  
            'No_SPM' => $data['trx']['No_SPM'], 
            'Rek_Penerima' => str_replace('-', '', (str_replace('.', '', $data['trx']['Rek_Penerima']))),  
            'Tgl_Penguji' => $data['trx']['Tgl_Penguji'], 
            'Tgl_SP2D' => $data['trx']['Tgl_SP2D'], 
            'Tgl_SPM' => $data['trx']['Tgl_SPM'],  
            'status' => $data2['status'],   
            //data SIMDA 04
            'Cair' => $data['trx']['Cair'],   
            'Gaji' => $data['trx']['Gaji'],   
            'Uraian' => $data['trx']['Uraian'],  
            'Nm_Sub_Unit' => $data['trx']['Nm_Sub_Unit'],  
            'Nm_Unit' => $data['trx']['Nm_Unit'],  
            'TglCair' => $now->format('Y-m-d H:i:s'),   
            //akhir dari SIMDA 
            'Jn_SPM' => $data['trx']['Jn_SPM'],    
            'KD_KASDA' => $data2['KD_KASDA'],     
            'tgl_import' => $now->format('Y-m-d H:i:s'),   
            'kd_proses' => 0,       
            'keterangan_import' => "Data Berhasil di import dari SIMDA",     
            'timestamp_client' => $now->format('Y-m-d H:i:s'),     
        );    

       $this->db->where($where);
       $hasil = $this->db->update('TEMP_PENGUJI2', $data);

       $return = array(
        'return' => $hasil, 
        'data_input1' => $data_input1, 
        );
       return $return;
    }

    public function sukses_import_trxSp2dAndPotongan($where)
    {
        $data = array(
            'status' => 2, 
            'kd_proses' => 2, 
        );
        $this->db->where($where);
       return $this->db->update('TEMP_PENGUJI2', $data);
    }

    public function insert($data, $data2)
    {
        date_default_timezone_set('asia/jakarta');
        $now = new DateTime();
        //insert
        $data_input1 = array(
            'Bank_Penerima' => $data['trx']['Bank_Penerima'], 
            'DateCreate' => $data['trx']['DateCreate'], 
            'Kd_Bidang' => $data['trx']['Kd_Bidang'], 
            'Kd_Sub' => $data['trx']['Kd_Sub'], 
            'Kd_Unit' => $data['trx']['Kd_Unit'], 
            'Kd_Urusan' => $data['trx']['Kd_Urusan'], 
            'Keterangan' => $data['trx']['Keterangan'], 
            'NPWP' => $data['trx']['NPWP'], 
            'Nilai' => $data['trx']['Nilai'], 
            'Nm_Bank' => $data['trx']['Nm_Bank'], 
            'Nm_Penerima' => $data['trx']['Nm_Penerima'], 
            'No_Rekening' => $data['trx']['No_Rekening'], 
            // 'No_Rekening' => $data['No_Rekening'], 
            'No_SP2D' => $data['trx']['No_SP2D'], 
            'No_SPM' => $data['trx']['No_SPM'], 
            // 'Rek_Penerima' => $data['trx']['Rek_Penerima'], 
            'Rek_Penerima' => $data2['Rek_Penerima'], 
            'Tahun' => $data['trx']['Tahun'], 
            'Tgl_Penguji' => $data['trx']['Tgl_Penguji'], 
            'Tgl_SP2D' => $data['trx']['Tgl_SP2D'], 
            'Tgl_SPM' => $data['trx']['Tgl_SPM'],  
            'status' => $data2['status'],   
            //data SIMDA 04
            'Cair' => $data['trx']['Cair'],   
            'Gaji' => $data['trx']['Gaji'],   
            'Uraian' => $data['trx']['Uraian'],  
            'Nm_Sub_Unit' => $data['trx']['Nm_Sub_Unit'],  
            'Nm_Unit' => $data['trx']['Nm_Unit'],  
            'TglCair' => $now->format('Y-m-d H:i:s'),   
            //akhir dari SIMDA 
            'Jn_SPM' => $data['trx']['Jn_SPM'],    
            'KD_KASDA' => $data2['KD_KASDA'],     
            'tgl_import' => $now->format('Y-m-d H:i:s'),   
            'kd_proses' => 0,       
            'keterangan_import' => "Data Berhasil di import dari SIMDA",     
            'timestamp_client' => $now->format('Y-m-d H:i:s'),     
        );    
        $hasil = $this->db->insert('TEMP_PENGUJI2',$data_input1);   
         $return = array(
            'return' => $hasil, 
            'data_input1' => $data_input1, 
        );
        return $return;
    }
 
    function hapus($where){
        $this->db->where($where);
       return $this->db->delete($this->table);
    } 
    
}