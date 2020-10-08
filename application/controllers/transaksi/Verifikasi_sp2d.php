<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_sp2d extends CI_Controller {   
    
    public function __construct()
    {
        parent ::__construct();
        $cek = $this->M_login->cek_userIsLogedIn();
        if ($cek==FALSE)
        {
            $this->session->set_flashdata('pesan',"Anda harus login jika ingin mengakses halaman lain");
            redirect('Login');
        } 
        else
        {  
            $class_menu = $this->session->userdata('class_menu');  
            $accesable="false";
            $data = uri_string();  
            $uri = substr($data, strpos($data, "cms_kasda") );  
            $accesable=$this->M_login->cekMenu002($uri, $class_menu);  
        } 
    }  

    public function  index()
    {  
        $data['title'] = "Verifikasi SP2D";
        $data['url'] = "transaksi/Verifikasi_sp2d/"; 

        $this->load->view('include/header'); 
        $this->load->view('transaksi/verifikasiSP2D/index',$data);
        $this->load->view('include/footer');  
    }   
    
   /* public function cari_sp2d()
    {
        $data = array();   
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $STATUS = $this->input->post('STATUS'); 
        $STATUS_1 = $STATUS-1;   

        // var_dump($_POST);
        if ($this->input->post('NO_SP2D')!=null)
        { 
            $NO_SP2D = $this->input->post('NO_SP2D');
            $cek = $this->db->query("SELECT * FROM TrxSP2D where No_SP2D LIKE '%$NO_SP2D%' AND KD_KASDA='$KD_KASDA' AND STATUS IN ($STATUS, $STATUS_1) ORDER BY DateCreate DESC");   
             
            // $cek = $this->M_TrxSP2D->cari_sp2d($NO_SP2D, $KD_KASDA);   
            if ($cek->num_rows()>0)
            {
                $data = $cek->result_array(); 
            }
            else{
                $data = array(); 
            }
            $data['data'] = $data;  
        } 
        else
        {   
            $SEARCH_DARI = $this->input->post('SEARCH_DARI');
            $SEARCH_SAMPAI = $this->input->post('SEARCH_SAMPAI');  
            $data['data'] = $this->M_TrxSP2D->detail_beetwen($SEARCH_DARI, $SEARCH_SAMPAI, $KD_KASDA, $STATUS, $STATUS_1)->result_array(); 
        }      
        $this->load->view('transaksi/pembukaanSP2D/hasil_cari',$data);   
    }*/ 
 
    public function getPotonganByNoSP2D()
    {      
        $No_SP2D = $this->input->post('No_SP2D');
        $where = array(
            'No_SP2D' => $No_SP2D, 
        );
       $data['data'] = $this->M_TrxSP2D_Potongan->detail($where);  
       $this->load->view('transaksi/pembukaanSP2D/detail_potongan',$data);
    }

    public function get_form()
    {   
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();  
        $data['spm'] = $this->MPemeliharaanJenisSPM->getAll();  

        $KD_KASDA = $this->session->userdata('KD_KASDA');  
        $data['rek_sumber'] = $this->MRekeningSumber->getByResult(array('KD_KASDA' => $KD_KASDA ));  
        $data['dt_rek'] = $this->MRekeningKasda->getAllBykasda(array('KD_KASDA' => $KD_KASDA ));   
       
        $dt = new DateTime();
        $date =  $dt->format('Y-m-d'); 
        $data['jenis_aksi'] ="add";  
        $data['NO_SP2D'] =null; 
        $data['NO_REK'] =null; 
        $data['NM_PEMILIK'] =null; 
        $data['NPWP'] =null; 
        $data['NILAI_SP2D'] =null; 
        $data['NILAI_POTONGAN'] =null; 
        $data['No_SPM'] =null;  
        $data['NILAI_TRANSFER'] =null; 
        $data['Keterangan'] =null; 
        $data['Tgl_SP2D'] =$date;  
        $data['Tgl_SPM'] =$date;  
        $data['TGL_CAIR'] =date('d/m/Y');  
        $data['SEARCH_DARI'] =date('d/m/Y');  
        $data['SEARCH_SAMPAI'] =date('d/m/Y');  
        $data['KD_DATA'] =null; 
        $data['url_inquery']="transaksi/Verifikasi_sp2d/inquery"; 
        $this->load->view('transaksi/verifikasiSP2D/form2',$data);
    }

    public function get_kd_skpd()
    {
        $data = array();  
        $data['KD_SKPD'] = $this->input->post('KD_SKPD');  
        $data['skpd']= $this->MPemeliharaanSubUnit->getAll_view();   
        $this->load->view('transaksi/verifikasiSP2D/get_kd_skpd',$data);
    } 

    public function get_bank_penerima()
    {
        $data['KD_BANK'] = $this->input->post('KD_BANK');   
        $data['bank'] = $this->MPemeliharaanBank->getAll();   
        $this->load->view('transaksi/verifikasiSP2D/get_bank_penerima',$data);
    }  

    public function save()
    {     
        $data_potongan = array();
        $NO_SP2D = $this->input->post('NO_SP2D');  
        $data = array(     
            'TglCair'=>$this->input->post('TGL_CAIR'), 
            'STATUS'=>2,
            'user_verifikasi'=> $this->input->post('username'),
            'tgl_verifikasi'=>date("Y-m-d H:i:s"),
        );

        if (isset($_POST['kd_billing']))
        { 
            foreach ($_POST['kd_billing'] as $key => $value) {
                $where2 = array( 
                    'Kd_Rek_1' => $_POST['Kd_Rek_1'][$key], 
                    'Kd_Rek_2' => $_POST['Kd_Rek_2'][$key], 
                    'Kd_Rek_3' => $_POST['Kd_Rek_3'][$key], 
                    'Kd_Rek_4' => $_POST['Kd_Rek_4'][$key], 
                    'Kd_Rek_5' => $_POST['Kd_Rek_5'][$key], 
                    'No_SP2D' =>  $NO_SP2D, 
                ); 

                //update data potongan 
                $hasil['status'] = $this->M_TrxSP2D_Potongan->update($where2, array('kd_billing' => $_POST['kd_billing'][$key] )); 
            }
        } 
 
        // // aksi update data menjadi verifikasi  
        $hasil['status'] = $this->M_TrxSP2D->update(array('No_SP2D' => $NO_SP2D ), $data);  

        // $NO_SP2D_replace = str_replace("/", "_", $NO_SP2D); 
        if($hasil['status']==true){
            // $hasil['pesan'] ="Proses Verifikasi SP2D berhasil. Apakah Anda ingin mencetak bukti verifikasi SP2D ?";
            $hasil['pesan'] ="Proses Verifikasi SP2D berhasil.";
        }
        else if ($hasil['status']==false)
        {
            $hasil['pesan'] ="Proses Verifikasi SP2D gagal, silahkan coba lagi"; 
        } 
        // $this->session->set_flashdata('pesan',$hasil['pesan']);
        // redirect('transaksi/Verifikasi_sp2d'); 
        echo  $hasil['pesan'];
    }

    public function getDataVerifikasi($NO_SP2D)
    {   
        $NO_SP2D_replace = str_replace("_", "/", $NO_SP2D);
        $where = array('NO_SP2D' =>$NO_SP2D_replace );

        $data['data'] = $this->M_TrxSP2D->detail($where)->row_array();   
        $data['Nilai'] = terbilang($data['data']['Nilai'])." Rupiah"; 

        //get historu print 
        $KD_KASDA = $this->session->userdata('KD_KASDA');
        $where = array('KD_KASDA' => $KD_KASDA );
        $cek  = $this->M_history_print->detail($where);

        if ($cek->num_rows()<=0){ 
            //insert
            $data = array(
                'KD_KASDA' =>$KD_KASDA,
                'bukti_verifikasi' =>0,
            ); 
            $cek  = $this->M_history_print->save($data);
        }
        $n=$cek->row_array()['bukti_verifikasi'] ;  
        $data['jumlah_print'] = str_pad($n + 1, 5, 0, STR_PAD_LEFT);

        //update 
        $data2 = array(
            'KD_KASDA' =>$KD_KASDA,
            'bukti_verifikasi' =>$data['jumlah_print'],
        );
        $cek  = $this->M_history_print->update($where, $data2);  
        return $data;
    }

    public function printBukriVerifikasi($NO_SP2D)
    {    
        $data= $this->getDataVerifikasi($NO_SP2D); 

        $this->load->view('transaksi/verifikasiSP2D/printBukriVerifikasi', $data);
/*
        $this->load->library('pdf'); 

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,' ****** BUKTI VERIFIKASI TRANSAKSI SP2D ******',0,1,'C');
        $pdf->SetFont('Arial','B',12); 
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(80,6,'Tanggal SP2D',1,0);
        $pdf->Cell(80,6, date('d-m-Y',strtotime($data['data']['Tgl_SP2D'])) ,1,0); 

        $pdf->Cell(40,6,'Tanggal SP2D',1,0);
        $pdf->Cell(40,6, date('d-m-Y',strtotime($data['data']['Tgl_SP2D'])) ,1,0);  
        $pdf->Output(); */
    } 
    
    public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA'); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MMapping_Map->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $data['KD_MAP']=$data['data']['KD_MAP'];   
        $data['KD_MAP_SIMDA']=$data['data']['KD_MAP_SIMDA'];  
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        } 
        $data['map'] = $this->MPemeliharaanMap->getAll();   
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();  
        $data['url_inquery']="parameter/Verifikasi_sp2d/inquery"; 

        $this->load->view('transaksi/verifikasiSP2D/form',$data);
    }

    public function get_rek_by_reksumber($KD_SUMBER_DANA=null)
    { 
        $data = array();
        $data['jenis_aksi'] = $this->input->post('jenis_aksi');
        $KD_KASDA = $this->session->userdata('KD_KASDA');

        if ($KD_SUMBER_DANA==null)
        {
            //get kode sumber dana berdasarkan kd_kasda 
            $where = array(
                'KD_KASDA' => $KD_KASDA, 
            );
            $KD_SUMBER_DANA=$this->MRekeningKasda->getBy($where)['KD_SUMBER_DANA']; 
 
            $where = array(
                'KD_KASDA' => $KD_KASDA,
                'KD_SUMBER_DANA' => $KD_SUMBER_DANA,
            );
            $data['data']=$this->MRekeningKasda->getAllBykasda($where); 
        }
        else
        {
            $where = array(
                'KD_KASDA' => $KD_KASDA,
                'KD_SUMBER_DANA' => $KD_SUMBER_DANA,
            );
            $data['data']=$this->MRekeningKasda->getAllBykasda($where);  
        }

        // var_dump($data); 
        $this->load->view('transaksi/verifikasiSP2D/get_rek_by_reksumber', $data); 
    } 

    public function get_rek_sumber($USERNAME=null)
    {   
        $data['jenis_aksi'] = $this->input->post('jenis_aksi');  

        //get KD_KASDA by kd_user  
        $where = array(
            'USERNAME' => $USERNAME, 
        );
        $KD_KASDA=$this->MUserSystem->getBy($where)['KD_KASDA'];   
 
        $where = array(
            'KD_KASDA' => $KD_KASDA, 
        );
        $data['data']=$this->MRekeningSumber->resultArray($where);   

        // var_dump($data); 
        $this->load->view('transaksi/verifikasiSP2D/get_rek_sumber', $data); 
    }
 
}