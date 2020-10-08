<?php

use PhpParser\Node\Stmt\Else_;

class M_laporan_SP2D_sudah_cair extends CI_Model{	
 
    function get_laporan($SEARCH_DARI, $SEARCH_SAMPAI, $KD_KASDA, $JENIS_SPM)
    {   
        $hsl=""; 
        if ($JENIS_SPM!=0 || $JENIS_SPM!="0")
        {
            $hsl= $this->db->query("SELECT * FROM TrxSP2D WHERE (TglCair BETWEEN '$SEARCH_DARI' AND '$SEARCH_SAMPAI') and KD_KASDA='$KD_KASDA' and jn_SPM='$JENIS_SPM' AND STATUS=3"); 
        }
        else{
            $hsl= $this->db->query("SELECT * FROM TrxSP2D WHERE (TglCair BETWEEN '$SEARCH_DARI' AND '$SEARCH_SAMPAI') and KD_KASDA='$KD_KASDA' and STATUS=3"); 
        } 
        return $hsl; 
    } 

    function get_laporan_belum_cair($SEARCH_DARI, $SEARCH_SAMPAI, $KD_KASDA, $JENIS_SPM)
    {   
        $hsl=""; 
        if ($JENIS_SPM!=0 || $JENIS_SPM!="0")
        {
            $hsl= $this->db->query("SELECT * FROM TrxSP2D WHERE (TglCair BETWEEN '$SEARCH_DARI' AND '$SEARCH_SAMPAI') and KD_KASDA='$KD_KASDA' and jn_SPM='$JENIS_SPM' AND STATUS!=3"); 
        }
        else{
            $hsl= $this->db->query("SELECT * FROM TrxSP2D WHERE (TglCair BETWEEN '$SEARCH_DARI' AND '$SEARCH_SAMPAI') and KD_KASDA='$KD_KASDA' and STATUS!=3"); 
        } 
        return $hsl; 
    } 

    function get_laporan_status_per_sp2d($KD_KASDA, $No_SP2D)
    {    
        $hsl= $this->db->query("SELECT * FROM TrxSP2D WHERE KD_KASDA='$KD_KASDA' and No_SP2D='$No_SP2D'");  
        return $hsl; 
    } 

    public function get_user_id($KD_KASDA)
    {
        $hsl= $this->db->query("SELECT DISTINCT (USER_PENCAIRAN) FROM TrxSP2D WHERE KD_KASDA='".$KD_KASDA."' AND USER_PENCAIRAN IS NOT NULL");  
        return $hsl; 
    }

    public function get_user_pembuka_sp2d($KD_KASDA)
    {
        $hsl= $this->db->query("SELECT DISTINCT (user_input) FROM TrxSP2D WHERE KD_KASDA='".$KD_KASDA."' AND user_input IS NOT NULL");  
        return $hsl; 
    }

    public function get_user_pemverifikasi_sp2d($KD_KASDA)
    {
        $hsl= $this->db->query("SELECT DISTINCT (user_verifikasi) FROM TrxSP2D WHERE KD_KASDA='".$KD_KASDA."' AND user_verifikasi IS NOT NULL");  
        return $hsl; 
    }

    public function rekap_pencairan($KD_KASDA, $tglawal, $tglakhir)
    {
        $hsl= $this->db->query("SELECT No_SP2D, No_SPM, TglCair, Nilai, TOTAL_SP2D, STATUS FROM TrxSP2D WHERE (TglCair BETWEEN '$tglawal' AND '$tglakhir') AND KD_KASDA='$KD_KASDA' AND STATUS =3");  
        return $hsl; 
    }

    public function spmImport($KD_KASDA, $tgl_awal, $tglakhir, $status)
    { 
        $hsl="";  
        if ($status==0 || $status=="0")
        {
           $hsl= $this->db->query("SELECT * FROM v_importSPM WHERE kd_kasda='$KD_KASDA' AND (tanggal BETWEEN '$tgl_awal 00:00:00' AND '$tglakhir 23:59:59') and new_value not like '%".'"1"'."%' ");   
        }
        else
        {           
            $hsl= $this->db->query("SELECT * FROM v_importSPM WHERE kd_kasda='$KD_KASDA' AND (tanggal BETWEEN '$tgl_awal 00:00:00' AND '$tglakhir 23:59:59') and new_value like '%".'"1"'."%' ");   
        }
        return $hsl;
    }

    public function rekap_pembukaan($KD_KASDA, $tglawal, $tglakhir, $user_id)
    {
        $hsl= $this->db->query("SELECT No_SP2D, No_SPM, tgl_input, Nilai, TOTAL_SP2D, STATUS FROM TrxSP2D WHERE (tgl_input BETWEEN '$tglawal' AND '$tglakhir') AND KD_KASDA='$KD_KASDA' AND user_input='$user_id'");  
        return $hsl; 
    }

    public function rekap_pemverifikasi_sp2d($KD_KASDA, $tglawal, $tglakhir, $user_id)
    { 

        $timestamp = strtotime($tglakhir);
        $tanggal =  date("d", $timestamp)+1; 

        $timestamp = strtotime($tglakhir);
        $mount =  date("m", $timestamp);

        $timestamp = strtotime($tglakhir);
        $tahun =  date("Y", $timestamp); 

        $tanggal_lengkap = $tahun."-".$mount."-".$tanggal;


        $this->db->where('tgl_verifikasi >=', $tglawal);
        $this->db->where('tgl_verifikasi <=', $tanggal_lengkap);
        $this->db->where('user_verifikasi', $user_id);
        $this->db->where('KD_KASDA', $KD_KASDA);
        return $this->db->get('TrxSP2D'); 

        // $hsl= $this->db->query("SELECT No_SP2D, No_SPM, tgl_verifikasi, Nilai, TOTAL_SP2D, STATUS FROM TrxSP2D WHERE (tgl_verifikasi BETWEEN '$tglawal' AND '$tglakhir') AND KD_KASDA='$KD_KASDA' AND user_verifikasi='$user_id'");  
        // return $hsl; 
    }

    public function laporan_koreksi_sp2d($KD_KASDA)
    {
        $hsl= $this->db->query("SELECT No_SP2D, tanggal, alasan, kd_user FROM TrxSP2D_koreksi WHERE KD_KASDA='$KD_KASDA'");  
        return $hsl; 
    } 

    public function cetak_ulang($KD_KASDA, $No_SP2D)
    {
        $hsl= $this->db->query("SELECT * FROM TrxSP2D_koreksi WHERE KD_KASDA='$KD_KASDA' and No_SP2D='$No_SP2D'");  
        return $hsl; 
    }

    public function daftar_status_SP2D($KD_KASDA, $tgl_awal, $tglakhir)
    {
        $hsl= $this->db->query("SELECT * FROM TrxSP2D WHERE (tgl_input BETWEEN '$tgl_awal' AND '$tglakhir') and KD_KASDA='$KD_KASDA'"); 
        return $hsl;
    }

    public function sp2dGagalImport($KD_KASDA, $tgl_awal, $tglakhir)
    {
        $hsl= $this->db->query("SELECT * FROM TEMP_PENGUJI2 WHERE (tgl_import BETWEEN '$tgl_awal 00:00:00' AND '$tglakhir 23:59:59') and KD_KASDA='$KD_KASDA' and kd_proses=0"); 
        return $hsl;
    }

    public function sp2dBerhasilImport($KD_KASDA, $tgl_awal, $tglakhir, $JENIS_SPM)
    { 
        $hsl=""; 
        if ($JENIS_SPM!=0 || $JENIS_SPM!="0")
        {
            $hsl= $this->db->query("SELECT * FROM TEMP_PENGUJI2 WHERE (tgl_import BETWEEN '$tgl_awal 00:00:00' AND '$tglakhir 23:59:59') and KD_KASDA='$KD_KASDA' and kd_proses=1 and Jn_SPM='$JENIS_SPM'"); 
        }
        else
        {           
             $hsl= $this->db->query("SELECT * FROM TEMP_PENGUJI2 WHERE (tgl_import BETWEEN '$tgl_awal 00:00:00' AND '$tglakhir 23:59:59') and KD_KASDA='$KD_KASDA' and kd_proses=1"); 
        }
        return $hsl;
    }



    public function laporan_kolektif_potongan_dan_pajak($KD_KASDA, $tglawal, $tglakhir)
    {
        $balikan = array();
        $data3 = array(); 

        $timestamp = strtotime($tglakhir);
        $tanggal =  date("d", $timestamp)+1; 

        $timestamp = strtotime($tglakhir);
        $mount =  date("m", $timestamp);

        $timestamp = strtotime($tglakhir);
        $tahun =  date("Y", $timestamp); 

        $tanggal_lengkap = $tahun."-".$mount."-".$tanggal; 

        $this->db->select('No_SP2D');
        $this->db->where('Tgl_SP2D >=', $tglawal);
        $this->db->where('Tgl_SP2D <=', $tanggal_lengkap);
        // $this->db->where('user_verifikasi', $user_id);
        $this->db->where('KD_KASDA', $KD_KASDA);
        $data= $this->db->get('TrxSP2D'); 
       
        if ($data->num_rows()>0)
        {
            foreach ($data->result_array() as $key)
            { 
                $this->db->where('KD_KASDA', $KD_KASDA);
                $this->db->where('No_SP2D', $key['No_SP2D']);
                $data2= $this->db->get('TrxSP2D_Potongan');
                $jumlah=0;

                // foreach ($data2->result_array() as $key2)
                // {
                //     //get data kode rek
                //     $kd_rek = $key2['Kd_Rek_2'].$key2['Kd_Rek_2'].$key2['Kd_Rek_3'].$key2['Kd_Rek_4'].$key2['Kd_Rek_5'];

                //     $this->db->where('KD_MAP',$kd_rek );
                //     $nama_map = $this->db->get('ref_map')->row_array()['URAIAN'];

                //     $jumlah+=$key2['Nilai'];

                //     $data3[] = array(
                //         'kd_rek' => $kd_rek." - ".$nama_map, 
                //         'No_SP2D' => $key['No_SP2D'], 
                //         'Nilai' => "Rp. ".number_format($jumlah, 2), 
                //     );
                // }  
            }

             $balikan = array(
                'is_empty' => false, 
                'laporan' => $data2,
                'query' => $this->db->last_query(),
            ); 
                
        }
        else{
            $balikan = array(
                'is_empty' => true, 
            );
        }  

        return $balikan;
    }


    public function  get_pajak_kolektif($KD_KASDA, $tglawal, $tglakhir)
    {
       $balikan = array( );
       $check = $this->db->query("SELECT  Kd_Rek_1+Kd_Rek_2+Kd_Rek_3+Kd_Rek_4+Kd_Rek_5 as kd_rek, Nilai,  No_SP2D  FROM TrxSP2D_Potongan WHERE No_SP2D in (SELECT No_SP2D from TrxSP2D WHERE Tgl_SP2D BETWEEN '".$tglawal."' and '".$tglakhir."') and KD_KASDA='$KD_KASDA'");
        if ($check->num_rows()>0) {
            $balikan = array(
                'is_empty' => false, 
                'laporan' => $check->result_array(),
                'query' => $this->db->last_query(),
            );  
       }
       else 
       {
         $balikan = array(
                'is_empty' => true,   
            );  
       }

       return $balikan;
    }

}