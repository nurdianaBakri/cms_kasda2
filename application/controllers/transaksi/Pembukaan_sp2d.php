<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Pembukaan_sp2d extends CI_Controller {   
    
    public function __construct()
    {
        parent ::__construct();
        $cek = $this->M_login->cek_userIsLogedIn();
        if ($cek==FALSE)
        {
            $this->session->set_flashdata('pesan',"Anda harus login jika ingin mengakses halaman lain");
            redirect('Login');
        } 
    } 

	public function  index()
	{  
        $data['title'] = "Pembukaan SP2D";
        $data['url'] = "transaksi/Pembukaan_sp2d/";   

        $this->load->view('include/header'); 
		$this->load->view('transaksi/pembukaanSP2D/index',$data);
        $this->load->view('include/footer');  
	}  

	public function cek_no_sp2d()
    {     
        $data = array();
        $where = array();
        $cek="";
        $pesan="";

        $NO_SP2D = $this->input->post('NO_SP2D');
        $KD_KASDA = $this->input->post('KD_KASDA');
        $STATUS = $this->input->post('STATUS');
        $STATUS_1 = $STATUS-1;
        $where = array(
            'No_SP2D' => $NO_SP2D, 
            'KD_KASDA' => $KD_KASDA, 
        );
        // $cek = $this->M_TrxSP2D->detail($where);   

        $cek = $this->db->query("SELECT * FROM TrxSP2D where No_SP2D LIKE '%$NO_SP2D%' AND KD_KASDA='$KD_KASDA' ORDER BY DateCreate DESC"); 

        $data3 = array(
            'num_rows' => $cek->num_rows(), 
            'data' => $where,  
        );

        if ($cek->num_rows()>0)
        { 
            $data = $cek->row_array();  
           
            //cek apakah rekening valid,  
            $no_rek = str_replace(" ","",$data['Rek_Penerima']); 
            // $data_rekening_from_api = $this->M_interface->cek_rek($no_rek);
            
            // $data2 = json_encode($data_rekening_from_api);
            // // /CEK APAKAH REKENING TERDAFTAR 
            // if ($data2['Status']==false)
            // {
            //     $pesan = "Nomor rekening tidak terdaftar/ respons dari API lambat";
            // }
            // // JIKA REKENING TERDAFTAR 
            // else{
            //     // cek apakah nama sama 
            //     if ($data2['Message']['result']['NICKNM']==$data['Nm_Penerima'])
            //     {
                    
            //     }
            //     else{

            //     }  
            // } 

            if ($data['STATUS']==1 || $data['STATUS']==4)
            {
                $pesan="NO SP2D ".$NO_SP2D." Sudah terdaftar";
            }
            else if ($data['STATUS']==2)
            {
                $pesan="NO SP2D ".$NO_SP2D." Sudah terverifikasi";
            }  
            else if ($data['STATUS']==3)
            {
                $pesan="NO SP2D ".$NO_SP2D." Sudah dicairkan";
            }  
            else
            {
                $pesan="NO SP2D ".$NO_SP2D." belum terverifikasi";
            }
            
            //cek jumlah balikan  
            $data['ada'] = true;
            // $data['data_rekening_from_api'] = $data_rekening_from_api;
            $data['Rek_Penerima'] = $no_rek;
            $data['Tgl_SPM'] = substr($data['Tgl_SPM'],0,10);
            $data['pesan'] = $pesan;
            // $data['Nm_Penerima'] = $data['Nm_Penerima'];
            // $data['NICKNM'] = $data2['Message']['result']['NICKNM'];
            $data['Tgl_Penguji'] = substr($data['Tgl_Penguji'],0,10);
            $data['Tgl_SP2D'] = substr($data['Tgl_SP2D'],0,10); 
            $data['Nilai'] = substr($data['Nilai'], 0, strpos($data['Nilai'], ".")); 
            $data['TOTAL_SP2D'] = substr($data['TOTAL_SP2D'], 0, strpos($data['TOTAL_SP2D'], ".")); 
 
            $data['dissable_button'] = true; 
 
            $data3 = $data; 
        }
        else
        {
           $data3['pesan'] = "Nomor SP2D belum terdaftar, silahkan isi form untuk menambah data SP2D"; 
           $data3['ada'] = false;   
        }   
        // $data3['query'] = $this->db->last_query();
        echo json_encode($data3);
    }   

    public function cari_sp2d()
    {
        $data = array();
        $where = array();
        $cek="";
        if ($this->input->post('NO_SP2D')!=null)
        {
            $NO_SP2D = $this->input->post('NO_SP2D');
            $KD_KASDA = $this->input->post('KD_KASDA');
            $STATUS = $this->input->post('STATUS'); 
            $STATUS_1 = $STATUS-1;  

            $cek = $this->db->query("SELECT No_SP2D, Tgl_SP2D, No_SPM, Kd_Urusan, Kd_Bidang, Kd_Unit, Kd_Sub, Nilai, Nm_Bank, Tahun FROM TrxSP2D where No_SP2D LIKE '%$NO_SP2D%' AND KD_KASDA='$KD_KASDA' AND STATUS IN ($STATUS, $STATUS_1) ORDER BY DateCreate DESC");    
            
           $data = $cek->result_array();
           $data['data'] = $data;  
        } 
        else
        {   
            $SEARCH_DARI = $this->input->post('SEARCH_DARI');
            $SEARCH_SAMPAI = $this->input->post('SEARCH_SAMPAI'); 
            $KD_KASDA = $this->input->post('KD_KASDA'); 
            $STATUS = $this->input->post('STATUS'); 
            $STATUS_1 = $STATUS-1; 
 
            $data['data'] = $this->M_TrxSP2D->detail_beetwen($SEARCH_DARI, $SEARCH_SAMPAI, $KD_KASDA, $STATUS, $STATUS_1)->result_array(); 
        }   
        $this->load->view('transaksi/pembukaanSP2D/hasil_cari',$data);  
    }
 

    public function get_potongan()
    {  
        $NO_SP2D = $this->input->post('NO_SP2D');
        $KD_KASDA = $this->input->post('KD_KASDA');
        if ($NO_SP2D=="")
        {
            //tampilkan form kosong
            $data['data'] = $this->MPemeliharaanMap->get_MAP1($KD_KASDA); 

            $data['NO_SP2D'] = "";
            $data['jumlah_potongan'] = 0;  
            $data['STATUS']=1;
            $this->load->view('transaksi/pembukaanSP2D/data_potongan',$data); 
        }
        else
        {    
            // 1. CHECK APAKAH ADA DATA POTONGAN
            /*$check =   $this->db->query("SELECT * FROM v_map_join_potongan where KD_KASDA='$KD_KASDA' and (No_SP2D = '$NO_SP2D' )")->result_array();  
            if (sizeof($check) > 0)
            {

                $list_potongan = $this->db->query("SELECT URAIAN, KD_MAP FROM ref_map WHERE KD_MAP IN( select KD_MAP FROM ref_maping_map WHERE KD_KASDA='".$KD_KASDA."')");
                foreach ($list_potongan->result_array() as $key)
                {
                    $this->db->where('KD_KASDA', $KD_KASDA);
                    $this->db->where('KD_MAP', $key['KD_MAP']);
                    $this->db->where('NO_SP2D', $NO_SP2D);
                    $check_potongan = $this->db->get('v_map_join_potongan');
                    if ($check_potongan->num_rows()>0)
                    {
                        # code...
                    }

                } 

                $data['data'] =   $this->db->query("SELECT * FROM v_map_join_potongan where KD_KASDA='$KD_KASDA' and (No_SP2D = '$NO_SP2D' or No_SP2D is null )")->result_array();   
                $data['jumlah_potongan'] = sizeof($check);  
            } 
            else
            {
                $data['jumlah_potongan'] = 0;   
            }*/

            $data2 = array(); 
            $list_potongan = $this->db->query("SELECT URAIAN, KD_MAP FROM ref_map WHERE KD_MAP IN( select KD_MAP FROM ref_maping_map WHERE KD_KASDA='".$KD_KASDA."')");
            foreach ($list_potongan->result_array() as $key)
            {
                $this->db->where('KD_KASDA', $KD_KASDA);
                $this->db->where('KD_MAP', $key['KD_MAP']);
                $this->db->where('NO_SP2D', $NO_SP2D);
                $check_potongan = $this->db->get('v_map_join_potongan'); 
                $row_potongan = $check_potongan->num_rows();

                $data2['row_potongan'] = $row_potongan;

                // var_dump($data2['row_potongan']);
                if ($row_potongan>0)
                {  
                    $key2 = $check_potongan->row_array();  
                    $data2['Kd_Rek_1'] = $key2['Kd_Rek_1'];
                    $data2['Kd_Rek_2'] = $key2['Kd_Rek_2'];
                    $data2['Kd_Rek_3'] = $key2['Kd_Rek_3'];
                    $data2['Kd_Rek_4'] = $key2['Kd_Rek_4'];
                    $data2['Kd_Rek_5'] = $key2['Kd_Rek_5'];
                    $data2['kd_billing'] = $key2['kd_billing'];
                    $data2['Tahun'] = $key2['Tahun'];
                    $data2['Masa'] = $key2['Masa'];
                    $data2['Nilai'] = $key2['Nilai'];
                    $data2['No_SP2D'] = $key2['No_SP2D']; 
                    $data2['URAIAN'] = $key2['URAIAN']; 
                    $data2['KD_MAP'] = $key2['KD_MAP']; 
                }
                else
                {
                    $data2['Kd_Rek_1'] = "";
                    $data2['Kd_Rek_2'] = "";
                    $data2['Kd_Rek_3'] = "";
                    $data2['Kd_Rek_4'] = "";
                    $data2['Kd_Rek_5'] = "";
                    $data2['kd_billing'] = "";
                    $data2['Tahun'] = "";
                    $data2['Masa'] = "";
                    $data2['Nilai'] = 0;
                    $data2['No_SP2D'] = $NO_SP2D; 
                    $data2['URAIAN'] = $key['URAIAN'];
                    $data2['KD_MAP'] = $key['KD_MAP'];  
                }  
                $data['data'][]=$data2;  
                // var_dump($row_potongan);
            } 
            $data['NO_SP2D'] = $NO_SP2D;  
            // $data['data'] = $list_potongan->result_array();  

            $data['jumlah_potongan']=10;

            //2.1. CHECK STATUS, JIKA STATUS ==2,3, MAKA JANGAN AMBIL DATA POTONGAN KOSONG
            $data['STATUS'] = $this->db->query("SELECT STATUS FROM TrxSP2D where KD_KASDA='$KD_KASDA' and No_SP2D = '$NO_SP2D'")->row_array()['STATUS']; 
               
            //TAMPILAN UNTUK PENCAIRAN DAN VERIFIKASI 
            //check jika status sp2d = 2, 3. maka tampilan table potongan berbeda 
            if ($data['STATUS']==2 || $data['STATUS']==3)
            {
                $this->load->view('transaksi/pembukaanSP2D/detail_potongan',$data);  
            } 
            //TAMPILAN UNTUK MENU PEMBUKAAN SP2D
            else
            { 
                $this->load->view('transaksi/pembukaanSP2D/data_potongan',$data); 
            } 
        }     
    } 

    /*public function getPotonganByNoSP2D()
    {      
        $No_SP2D = $this->input->post('No_SP2D');
        $where = array(
            'No_SP2D' => $No_SP2D, 
        );
       $data['data'] = $this->M_TrxSP2D_Potongan->detail($where);  
       $this->load->view('transaksi/pembukaanSP2D/detail_potongan',$data);
    }*/

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
        $data['STATUS'] =1; 
        $data['Tgl_SP2D'] =$date;  
        $data['Tgl_SPM'] =$date;  
        $data['TGL_CAIR'] =date('d/m/Y');  
        $data['SEARCH_DARI'] =date('d/m/Y');  
        $data['SEARCH_SAMPAI'] =date('d/m/Y');  
        $data['KD_DATA'] =null; 
        $data['url_inquery']="transaksi/Verifikasi_sp2d/inquery"; 

        // var_dump($data);
        $this->load->view('transaksi/pembukaanSP2D/form2',$data);
    }

    public function get_kd_skpd()
    {
        $data = array();  
        $data['KD_SKPD'] = $this->input->post('KD_SKPD');  
        $data['skpd']= $this->MPemeliharaanSubUnit->getAll_view();   
        $this->load->view('transaksi/pembukaanSP2D/get_kd_skpd',$data);
    } 

    public function get_bank_penerima()
    {
        $data['KD_BANK'] = $this->input->post('KD_BANK');  
        $user_level = $this->input->post('user_level');
        
        if ($user_level==1)
        {
            $data['bank'] = $this->MPemeliharaanBank->getAll();   
        }
        else
        {
            $where = array(
                'NM_BANK' => "BPD NUSA TENGGARA BARAT", 
            ); 
            $data2[] = $this->MPemeliharaanBank->getBy($where);  
            $data['bank'] = $data2; 
        }  
        $this->load->view('transaksi/pembukaanSP2D/get_bank_penerima',$data);
    }  

    public function save()
    {    
        $hasil = array();
        $no_skpd = $this->input->post('KD_SKPD');
        $jenis_aksi = $this->input->post('jenis_aksi');

        $Kd_Urusan = substr($no_skpd, 0, 1);    
        $Kd_Bidang = substr($no_skpd, 2, 2); 
        $Kd_Unit = substr($no_skpd, 5, 1); 
        $Kd_Sub = substr($no_skpd, 7);   

        $NILAI_SP2D = $this->input->post('NILAI_SP2D'); 
        $NILAI_SP2D_tmpTitik= str_replace(".","",$NILAI_SP2D);
        $NILAI_SP2D_fix= str_replace(",",".",$NILAI_SP2D_tmpTitik);

        $NILAI_TRANSFER = $this->input->post('NILAI_TRANSFER'); 
        $NILAI_TRANSFER_tmpTitik= str_replace(".","",$NILAI_TRANSFER);
        $NILAI_TRANSFER_fix= str_replace(",",".",$NILAI_TRANSFER_tmpTitik);

        $NO_SP2D = $this->input->post('NO_SP2D', TRUE);
        $check_existing = $this->db->query("SELECT No_SP2D FROM TrxSP2D where NO_SP2D='$NO_SP2D'");
        // var_dump($this->db->last_query());

        if ($check_existing->num_rows()>0)
        {
            $hasil['pesan'] ="<div class='alert alert-danger'>
                                  <strong>Gagal!</strong> karena nomor SP2D sudah ada.
                                </div> ";  
        }
        else
        {
            $data = array(   
                'Kd_Urusan'=>$Kd_Urusan,
                'Kd_Bidang'=>$Kd_Bidang,
                'Kd_Unit'=>$Kd_Unit,
                'Kd_Sub'=>$Kd_Sub, 
                'Tahun'=>date('Y'),
                'No_SP2D'=>$NO_SP2D, 
                'Tgl_SP2D'=>date("Y-m-d H:i:s"), 
                'No_SPM'=>$this->input->post('No_SPM'), 
                'Tgl_SPM'=>$this->input->post('Tgl_SPM'), 
                'Jn_SPM'=>$this->input->post('Jn_SPM'),
                'Keterangan'=>$this->input->post('Keterangan'),
                'NPWP'=>$this->input->post('NPWP'),
                'KD_KASDA'=>$this->input->post('KD_KASDA'),
                'user_input'=> $this->input->post('username'),
                'tgl_input'=> date("Y-m-d H:i:s"),

                //data penerima dana 
                'Nm_Penerima'=>$this->input->post('NM_PEMILIK'),
                'Bank_Penerima'=>$this->input->post('bank_penerima'),
                'Rek_Penerima'=>$this->input->post('NO_REK'),
                'Tgl_Penguji'=>date("Y-m-d H:i:s"), 

                //data tambahan
                'DateCreate'=>date("Y-m-d H:i:s"),
                'TglCair'=>$this->input->post('TGL_CAIR'),
                'TOTAL_SP2D'=>$NILAI_SP2D_fix,
                'Nilai'=>$NILAI_TRANSFER_fix, 
                'STATUS'=>1,
            );

            //get rekening pengirim dari kode kasda   
            $where = array(
                'KD_KASDA' => $this->input->post('KD_KASDA'), 
                'KD_SUMBER_DANA' => '01', 
            );
            // var_dump($where);
            $this->db->where($where); 
            $hsl= $this->db->get('ref_rek_kasda');
            if ($hsl->num_rows()>0)
            {
                //data pengirim dana 
                $data['Nm_Bank']=$hsl->row_array()['NM_PEMILIK'];
                $data['No_Rekening']=$hsl->row_array()['NO_REK'];
            }
            else{
                $where = array(
                    'KD_KASDA' => $this->input->post('KD_KASDA'),  
                );
                $this->db->where($where);
                $hsl= $this->db->get('ref_rek_kasda');
                if ($hsl->num_rows()>0)
                {
                    //data pengirim dana 
                    $data['Nm_Bank']=$hsl->row_array()['NM_PEMILIK'];
                    $data['No_Rekening']=$hsl->row_array()['NO_REK'];
                }
            }    

            $dt = new DateTime();
            $year =  $dt->format('Y');

            $data2 = array(
                'Tahun'=>$year,
                'Kd_Urusan'=>$Kd_Urusan,
                'Kd_Bidang'=>$Kd_Bidang,
                'Kd_Unit'=>$Kd_Unit,
                'Kd_Sub'=>$Kd_Sub, 
                'No_SP2D'=>$NO_SP2D, 
                'No_SPM'=>$this->input->post('No_SPM'),
                'Jn_SPM'=>$this->input->post('Jn_SPM'),
                'Nm_Rekening'=>$this->input->post('NO_REK'), 
            ); 
            
            // // aksi Tambah 
            $hasil = array();
            if($jenis_aksi=="add"){ 
                $hasil['status'] = $this->M_TrxSP2D->save($data);  

                //masukkan data ke tabel tabel sp2d potongan  
                $NILAI_PAJAK =$this->input->post('NILAI_PAJAK'); 

                $KD_MAP =$this->input->post('KD_MAP');
                $Masa =$this->input->post('Masa');  
                 
                foreach($NILAI_PAJAK as $key=>$value) { 

                    //JIKA NILAI PAJAK DI ISI OLEH PENGGUNA
                    if ($NILAI_PAJAK[$key]!="")
                    { 
                        $value_tmpTitik= str_replace(".","",$value);
                        $value_fix= str_replace(",",".",$value_tmpTitik);

                        $data2['Nilai']=$value_fix; 
                        $data2['Kd_Rek_1']=substr($KD_MAP[$key],0,1);
                        $data2['Kd_Rek_2']=substr($KD_MAP[$key],1,1);
                        $data2['Kd_Rek_3']=substr($KD_MAP[$key],2,1);
                        $data2['Kd_Rek_4']=substr($KD_MAP[$key],3,1);
                        $data2['Kd_Rek_5']=substr($KD_MAP[$key],4);   
                        $data2['Masa']=$Masa[$key];    

                        $data2['Kd_Sub_Unit'] = $Kd_Sub;

                        //remove inde array
                        unset($data2['Kd_Sub']);    
                        // Re-index the array elements 
                        array_values($data2);  

                        $hasil['status'] = $this->M_TrxSP2D_Potongan->save($data2);  
                    }  
                }  
            }   
            else{  
                // var_dump($data);
                // var_dump($where);
                $hasil['status'] = $this->M_TrxSP2D->update($where, $data);   
            } 

            if($hasil['status']==true && $jenis_aksi=="add"){
                $hasil['pesan'] ="<div class='alert alert-success'>
                                  <strong>Sukses!</strong> Proses Pembukaan SP2D berhasil 
                                </div> "; 
            }
            else if ($hasil['status']==false && $jenis_aksi=="add")
            {
                $hasil['pesan'] ="<div class='alert alert-danger'>
                                  <strong>Gagal!</strong> Proses Pembukaan SP2D gagal, silahkan coba lagi.
                                </div> "; 
            }
            else if ($hasil['status']==true && $jenis_aksi=="edit")
            {
                $hasil['pesan'] ="<div class='alert alert-success'>
                                  <strong>Sukses!</strong> Proses update SP2D berhasil.
                                </div> "; 
            }
            else
            {
                $hasil['pesan'] ="<div class='alert alert-danger'>
                                  <strong>Gagal!</strong> Proses update SP2D gagal, silahkan coba kembali.
                                </div> ";  
            }
        } 
            
        $this->session->set_flashdata('pesan',$hasil['pesan']); 
        redirect('transaksi/Pembukaan_sp2d');
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
        $data['url_inquery']="parameter/Pembukaan_sp2d/inquery"; 

        $this->load->view('transaksi/pembukaanSP2D/form',$data);
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
        $this->load->view('transaksi/pembukaanSP2D/get_rek_by_reksumber', $data); 
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
        $this->load->view('transaksi/pembukaanSP2D/get_rek_sumber', $data); 
    }  
     

     public function test($no_rek)
    { 

        $this->db->where('name_api','cek_saldo');
        $api_url = $this->db->get('config_api')->row()->api_url; 

        $ceksum = strtoupper(hash('sha256', '3NTB$2019'.$no_rek));    
        $url = $api_url."index.php/Data?checksum=".$ceksum."&type=3&norekening=".$no_rek;
        /*$curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, $url);
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPGET, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
        $status = curl_exec($curl_bearer);
        curl_close($curl_bearer);
        $json_status=json_decode($status);  
        return $json_status;*/

        /*$cek_rekening =  $this->M_interface->cek_rek($no_rek);
        var_dump($cek_rekening);*/

        echo $url;
    }
 
}