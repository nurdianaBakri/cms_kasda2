<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencairan_sp2d extends CI_Controller {   
    
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
        $data['title'] = "Pencairan SP2D";
        $data['url'] = "transaksi/Pencairan_sp2d/"; 

        $this->load->view('include/header'); 
        $this->load->view('transaksi/pencairanSP2D/index',$data);
        $this->load->view('include/footer');  
    }  

   /*public function cek_no_sp2d()
    {     
        $data = array();
        $where = array();
        $cek="";
        $pesan="";

        $NO_SP2D = $this->input->post('NO_SP2D');
        $KD_KASDA = $this->input->post('KD_KASDA');
        $where = array(
            'No_SP2D' => $NO_SP2D, 
            'KD_KASDA' => $KD_KASDA, 
        );
        $cek = $this->M_TrxSP2D->detail($where);   

        if ($cek->num_rows()>0)
        { 
            $data = $cek->row_array();   
           if ($data['STATUS']!=2 )
           { 
               $pesan="NO SP2D ".$NO_SP2D." Belum terverifikasi";
           } 
           else
           {

           }
            //cek jumlah balikan  
           $data['ada'] = true;
           $data['Tgl_SPM'] = substr($data['Tgl_SPM'],0,10);
           $data['pesan'] = $pesan;
           $data['Tgl_Penguji'] = substr($data['Tgl_Penguji'],0,10);
           $data['Tgl_SP2D'] = substr($data['Tgl_SP2D'],0,10); 
           $data['Nilai'] =  substr($data['Nilai'], 0, strpos($data['Nilai'], ".")); 
           $data['TOTAL_SP2D'] =  substr($data['TOTAL_SP2D'], 0, strpos($data['TOTAL_SP2D'], ".")); 
           $data = $data;
           echo json_encode($data);
        }
        else
        {
           $data['ada'] = false;  
            $pesan="NO SP2D ".$NO_SP2D." Tidak terdaftar";
           echo json_encode($data);
        }  
    } */   
 
   /* public function getPotonganByNoSP2D()
    {      
        $No_SP2D = $this->input->post('No_SP2D');
        $where = array(
            'No_SP2D' => $No_SP2D, 
        );
       $data['data'] = $this->M_TrxSP2D_Potongan->detail($where);  
       $this->load->view('transaksi/pembukaanSP2D/detail_potongan',$data);
    }*/

    public function konfirmKirimSMS()
    {
        $this->load->view('transaksi/pencairanSP2D/konfirmKirimSMS');  
    } 
 

    public function kirimSMS()
    {
        //get nomor telepon dari user yang login 
        $username = $this->session->userdata('username');
        $No_SP2D = $this->input->post('NO_SP2D');

        $no_hp = $this->db->query("SELECT NO_HP from user_system WHERE USERNAME='$username'")->row_array()['NO_HP'];

        //generate PIN
        $pin = $this->generatePIN();

        $isi="JANGAN MEMBERITAHU KODE RAHASIA INI KE SIAPAPUN. WASPADA TERHADAP KASUS MANIPULASI DATA! PIN untuk pencairan SKPD adalah: ". $pin;
        $fields_string  = "";
        $fields = array(
            'user'      =>  'ntbnotif',
            'pass'      =>  'Bntb$128',
            'type'      =>  '0',
            'to'        =>  $no_hp,
            'from'      =>  'NTB Syariah',
            'text'      =>  $isi,
            'servid'    =>  'NTB002'
        );
        
        foreach ($fields as $key=>$value) {
            $fields_string .= $key.'='.$value.'&';
        }
        
        $fields_string=rtrim($fields_string, '&');
        $url        =   "http://www.etracker.cc/bulksms/mesapi.aspx";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        $result=curl_exec($ch);
        curl_close($ch);


        if ($result)
        {  
            $stamp = $this->get_5meniteForward();  

            $pin_hash = md5($pin);
            //update PIN pada table trxSP2D
            $update = $this->db->query("UPDATE TrxSP2D SET PIN='$pin_hash', MASA_BERLAKU_PIN='$stamp'  WHERE No_SP2D='$No_SP2D'");
            if ($update)
            {
                echo $this->db->last_query();
            }
            else
            {
                echo "Internal error, silahkan coba kembali"; 
            }
        }
        else
        {
            echo "Proses kirim SMS gagal, silahkan coba kembali";
        }

        // return $result;
        // echo $result;
    }

    public function buktiPencairan($NO_SP2D2)
    {     
        //REPLACE _ WITH / 
        $NO_SP2D = str_replace("_","/",$NO_SP2D2);

        // $NO_SP2D = $this->input->post('NO_SP2D');
        $this->load->library('pdf');

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'BUKTI PENCAIRAN SP2D',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'NOMOR SP2D : '.$NO_SP2D,0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(85,6,'Nomor Rekening',1,0);
        $pdf->Cell(27,6,'Nilai',1,0);
        $pdf->Cell(30,6,'Jenis Transaksi',1,1);
        $pdf->SetFont('Arial','',10);

        $no=1;
         //get data sp2d
        $sp2d = $this->db->query("SELECT * FROM log_pencairan where NO_SP2D ='$NO_SP2D'")->result(); 

        foreach ($sp2d as $row){
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(85,6,$row->no_rekening,1,0);
            $pdf->Cell(27,6, number_format($row->nilai,2),1,0);
            $pdf->Cell(30,6,$row->jenis_transaksi,1,1); 
        }
        $pdf->Output(); 
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
        $data['url_inquery']="transaksi/Pencairan_sp2d/inquery"; 

        // var_dump($data);
        $this->load->view('transaksi/pencairanSP2D/form2',$data);
    }

    public function get_kd_skpd()
    {
        $data = array();  
        $data['KD_SKPD'] = $this->input->post('KD_SKPD');  
        $data['skpd']= $this->MPemeliharaanSubUnit->getAll_view();   
        $this->load->view('transaksi/pencairanSP2D/get_kd_skpd',$data);
    } 

    public function get_bank_penerima()
    {
        $data['KD_BANK'] = $this->input->post('KD_BANK');   
        $data['bank'] = $this->MPemeliharaanBank->getAll();   
        $this->load->view('transaksi/pencairanSP2D/get_bank_penerima',$data);
    }  

    public function pemindahBukuan($data)
    {
        $data = array(
            'rek_pengirim' => $data['rek_pengirim'], 
            'rek_penerima' => $data['rek_penerima'], 
            'nilai_transfer' => $data['nilai_transfer'], 
            'ket_transfer' => $data['ket_transfer'],  
            'checksum' => "",  
        );
        return $this->M_interface->pemindahBukuan($data);
    }

    public function insertLogPencairan($NO_SP2D)
    {
        $dataTrxSP2D = $this->db->query("SELECT * FROM TrxSP2D where NO_SP2D ='$NO_SP2D'")->row();  
        $data_log_potongan = array(  
            'NO_SP2D'=> $NO_SP2D,
            'no_rekening'=> $dataTrxSP2D->No_Rekening,
            'nilai'=> $dataTrxSP2D->Nilai,
            'jenis_transaksi'=> "D",
            'status'=> 0, 
            'date'=> date('Y-m-d H:m:s'), 
        ); 
        $this->db->insert('log_pencairan', $data_log_potongan); 

        $data_log_potongan = array(  
            'NO_SP2D'=> $NO_SP2D,
            'no_rekening'=> $dataTrxSP2D->Rek_Penerima,
            'nilai'=> $dataTrxSP2D->Nilai,
            'jenis_transaksi'=> "K",
            'status'=> 0, 
            'date'=> date('Y-m-d H:m:s'), 
        ); 
        $this->db->insert('log_pencairan', $data_log_potongan);

        //transfer 
        $data = array(
            'rek_pengirim' => $dataTrxSP2D->No_Rekening, 
            'rek_penerima' =>$dataTrxSP2D->Rek_Penerima, 
            'nilai_transfer' => $dataTrxSP2D->Nilai, 
            'ket_transfer' => "transfer dana ".$NO_SP2D,  
            'checksum' => "",  
        ); 
        return $data;
    }

    public function save()
    {    
        $activity='';
        $hasil = array(); 
        $NO_SP2D = $this->input->post('NO_SP2D');   
        $KD_KASDA = $this->input->post('KD_KASDA');   
        $KD_KASDA_Session = $this->session->userdata('KD_KASDA');   
        $username = $this->session->userdata('username');      
        $password_ = $this->input->post('password_');   
        $password_hash = md5($password_);

        //check apakah ada password 
        if ($password_=="") 
        {
            $data = array(
                'pesan' => "Password tidak boleh kosong, silahkan masukkan password anda", 
                'status' => false
            ); 
            echo json_encode($data);
        }
        else
        {

            //check apakah user merupakan user yang berhak mencairkan
            $cek_level = $this->db->query("SELECT USERNAME, PIN from user_system WHERE USERNAME='".$username."' and KD_KASDA='".$KD_KASDA."' AND LEVEL_USER='03'");

            if ($cek_level->num_rows()>0)
            {

                //cek kesesuain PIN
                if ($cek_level->row_array()['PIN'] == $password_hash)
                {
                    //lakukan pencairan
                    //check apakah SP2D punya KASDA TERSEBUT 
                    $check_existing = $this->db->query("SELECT KD_KASDA from TrxSP2D where No_SP2D='".$NO_SP2D."' AND KD_KASDA='".$KD_KASDA."'");
                    if ($check_existing->num_rows()>0)
                    { 
                        // jangan di cairkan, karena bukan otoritas si verivikator
                        $data = array(
                            'pesan' => "lakukan pencairan", 
                            'status' => true
                        ); 
                        echo json_encode($data);  
                    }
                    else
                    {
                        // jangan di cairkan, karena bukan otoritas si verivikator
                        $data = array(
                            'pesan' => "SP2D ini bukan dari PEMDA Anda", 
                            'status' => false
                        ); 
                        echo json_encode($data); 
                    }

                }
                else
                {
                    // jika tidak, maka tolak pencairan
                    $data = array(
                        'pesan' => "PIN tidak sesuai, silahkan masukkan PIN yang sesuai atau ubat PIN melalui operator Bank", 
                        'status' => false, 
                    ); 
                    echo json_encode($data); 
                }

                    
            }
            else
            { 
                // jangan di cairkan, karena bukan otoritas si verivikator
                $data = array(
                    'pesan' => "anda tidak berhak melakukan pencairan, karena nomor SP2D tidak terdaftar di PEMDA anda atau Anda tidak terdaftar sebagai user pencairan", 
                    'status' => false
                ); 
                echo json_encode($data);  
            }  
        }        
    } 

    public function  transferPotongan($kd_billing, $Kd_Rek_1, $Kd_Rek_2, $Kd_Rek_3, $Kd_Rek_4, $Kd_Rek_5, $NO_SP2D)
    { 
        //UPDATE DATA POTONGAN, MASUKKAN KODE BILLING
        $data = array(     
            'kd_billing'=>$kd_billing,   
        ); 

        $data_update_potongan = array(
            'kd_billing' => $kd_billing, 
            'Kd_Rek_1'=> $Kd_Rek_1,
            'Kd_Rek_2'=> $Kd_Rek_2,
            'Kd_Rek_3'=> $Kd_Rek_3,
            'Kd_Rek_4'=> $Kd_Rek_4,
            'Kd_Rek_5'=> $Kd_Rek_5,
            'NO_SP2D'=> $NO_SP2D,
        ); 
        return $this->update_TrxSP2D_Potongan($data_update_potongan);
    }

    public function form_konfimasi_pencairan()
    { 
        $this->load->view('transaksi/pencairanSP2D/form_konfimasi_pencairan'); 
    }


     /* public function save()
    {    
        $activity='';
        $hasil = array(); 
        $NO_SP2D = $this->input->post('NO_SP2D');  


        //LANGKAH 3
        //status cair 1= cair, 2=pending
        $data = array(     
            'TglCair'=>$this->input->post('TGL_CAIR'), 
            'STATUS'=>3,
            'Status_Cair'=>1,
            'USER_PENCAIRAN'=>$this->input->post('username'), 
        );
 
        // // aksi update data menjadi verifikasi  
        $proses_update_TrxSP2D = $this->M_TrxSP2D->update(array('No_SP2D' => $NO_SP2D ), $data);  
        //AKHIR DARI LANGKAH 3

        //LANGKAH 1, INSERT LOG PENCAIRAN
        //transaksi pencairan 
        //masukkan data ke log
        $data_pemindah_bukuan = $this->insertLogPencairan($NO_SP2D);   

        //LANGKAH 2, TRANSFER UANG 
        

        //jika ada data potongan 
        if (isset($_POST['kd_billing']))
        {
            //UPDATE DATA POTONGAN, MASUKKAN KODE BILLING
            $data = array(     
                'kd_billing'=>$this->input->post('kd_billing'),   
            ); 

            $data_update_potongan = array(
                'kd_billing' => $this->input->post('kd_billing'), 
                'Kd_Rek_1'=> $this->input->post('Kd_Rek_1'),
                'Kd_Rek_2'=> $this->input->post('Kd_Rek_2'),
                'Kd_Rek_3'=> $this->input->post('Kd_Rek_3'),
                'Kd_Rek_4'=> $this->input->post('Kd_Rek_4'),
                'Kd_Rek_5'=> $this->input->post('Kd_Rek_5'),
                'NO_SP2D'=> $NO_SP2D,
            ); 

            // var_dump($data_update_potongan);
            $hasil['status'] = $this->update_TrxSP2D_Potongan($data_update_potongan);
        }

        //jika tidak ada data potongan
        else
        {
            //INISIALISASI DATA LOG
            $activity = ""; 
            $username = $this->session->userdata('username');
            $old_value = array('No_SP2D' => $NO_SP2D); 
            if ($proses_update_TrxSP2D==true)
            {
                //SET KETERANGAN DI LOG
                $activity = "Mencairkan sp2d '".$NO_SP2D."', status cair pending. Sistem akan mencairkan dana pada pukul 20.00 setiap harinya"; 
            }
            else
            {
                //SET KETERNGAN DI LOG, KETERANGAN GAGAL
                $activity = "Mencairkan sp2d '".$NO_SP2D."', status cair gagal "; 
            }

            //masukkan data ke TABLE log   
            $hasil['status']=$this->M_log->insert_log($username, $activity, $old_value, $data);
        } 

        $hasil_pemindahbukuan = "";

        if($hasil['status']==true){

            //transfer  
            $hasil_pemindahbukuan = $this->pemindahBukuan($data_pemindah_bukuan);  
            $hasil['pesan'] =" Proses Pencairan SP2D berhasil ";
        }
        else if ($hasil['status']==false)
        {
            $hasil['pesan'] ="Proses Pencairan SP2D gagal, silahkan coba lagi"; 
        } 
        // $this->session->set_flashdata('pesan',$hasil['pesan']);
        // redirect('transaksi/Pencairan_sp2d'); 
        // echo $hasil['pesan'];

        var_dump($hasil_pemindahbukuan);
    } */
   

    public function update_TrxSP2D_Potongan($data)
    {
        $return="";
         foreach ($data['kd_billing'] as $key => $value) 
         { 
            $where = array(
                'No_SP2D' => $data['NO_SP2D'], 
                'Kd_Rek_1' => $data['Kd_Rek_1'][$key], 
                'Kd_Rek_2' => $data['Kd_Rek_2'][$key], 
                'Kd_Rek_3' => $data['Kd_Rek_3'][$key], 
                'Kd_Rek_4' => $data['Kd_Rek_4'][$key], 
                'Kd_Rek_5' => $data['Kd_Rek_5'][$key],  
            );

            $data2 = array(
                'kd_billing' => $data['kd_billing'][$key], 
            );

            $this->db->where($where);
            $return = $this->db->update('TrxSP2D_Potongan', $data2);

            //set data log 
            $data_log = array(
                'username' => $this->session->usedata('username'),  
                'tanggal' => date('Y-m-d H:m:s'), 
                'old_value' => "",  
                'kd_kasda' =>$this->session->usedata('KD_KASDA'), 
            ); 
            if ($return==true)
            {
                $data_log['activity']="Proses set kode billing pada nomor SP2D ".$NO_SP2D." Berhasil";
            }
            else
            {
                $data_log['activity']="Proses set kode billing pada nomor SP2D ".$NO_SP2D." Gagal"; 
            }
            $return = $this->db->insert('log_activity', $data_log);  


            //transfer dana potongan, get nomor rekening berdasarkan kode rekning 1-5  
        }  
        return $return;
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
        $data['url_inquery']="parameter/Pencairan_sp2d/inquery"; 

        $this->load->view('transaksi/pencairanSP2D/form',$data);
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
        $this->load->view('transaksi/pencairanSP2D/get_rek_by_reksumber', $data); 
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
        $this->load->view('transaksi/pencairanSP2D/get_rek_sumber', $data); 
    }  



                            // lakukan pencairan 
                        //TRANSFER POTONGAN JIKA ADA 
                        //jika ada data potongan, masukkan ke log
                       /* if (isset($_POST['kd_billing']))
                        {

                            $kd_billing=>$this->input->post('kd_billing'); 
                            $kd_billing=> $this->input->post('kd_billing'); 
                            $Kd_Rek_1=> $this->input->post('Kd_Rek_1');
                            $Kd_Rek_2=> $this->input->post('Kd_Rek_2');
                            $Kd_Rek_3=> $this->input->post('Kd_Rek_3');
                            $Kd_Rek_4=> $this->input->post('Kd_Rek_4');
                            $Kd_Rek_5=> $this->input->post('Kd_Rek_5');
                            $NO_SP2D=> $NO_SP2D;

                            $hasil['status'] = $this->transferPotongan($kd_billing, $Kd_Rek_1, $Kd_Rek_2, $Kd_Rek_3, $Kd_Rek_4, $Kd_Rek_5, $NO_SP2D); 
                        }

                        //jika tidak ada data potongan
                        else
                        {
                            
                            $status=false;
                            $pesan ="";

                            //LANGKAH 1, INSERT LOG PENCAIRAN
                            //masukkan data ke log
                            $data_pemindah_bukuan = $this->insertLogPencairan($NO_SP2D);   

                            //LANGKAH 2, TRANSFER UANG SP2D
                            $hasil_transfer = $this->pemindahBukuan($data_pemindah_bukuan);
                            if ($hasil_transfer->Message->message=="TRANSAKSI BERHASIL")
                            {
                                //keluarkan pesan
                                $pesan = $hasil_transfer->Message->message;

                                //update pencarairan dari 0 ke 1
                                $data = array(     
                                    'TglCair'=>$this->input->post('TGL_CAIR'), 
                                    'STATUS'=>3,
                                    'Status_Cair'=>1,
                                    'USER_PENCAIRAN'=>$this->session->userdata('username'), 
                                );
                         
                                // // aksi update data menjadi verifikasi  
                                $status = $this->M_TrxSP2D->update(array('No_SP2D' => $NO_SP2D ), $data);  
                                if ($status==true)
                                {
                                    $pesan ="Proses update pencairan SP2D dari 0 -> 1 berhasil";  
                                }
                                else
                                {
                                    $pesan ="Proses update pencairan SP2D dari 0 -> 1 gagal <br>".$this->db->last_query();
                                } 
                            }
                            else
                            {
                                $status = false; 
                                $pesan ="Proses update pencairan SP2D dari 0 -> 1 gagal <br>".$hasil_transfer->Message->message; 
                            }
                            $data = array(
                                'pesan' => $pesan, 
                                'status' => $status
                            ); 
                            echo json_encode($data); 
                        }*/








/*$("input[type='password'][id='PIN_BARU']").keyup(function() {
  var bottom = $("input[type='password'][id='PIN_BARU']").val();
  console.log("bottom = " + bottom);
  return bottom;
});

$("input[type='password'][id='CONF_PIN_BARU']").change(function() {
  var top = $("input[type='password'][id='CONF_PIN_BARU']").val();
  console.log("top = " + top);
  return top;
});     

$("input").blur(function() {
  if ($("input[type='password'][id='text_box_bottom_range']").val() > this.val) {
    console.log("Bottom is higher than Top");
    return false;
  } else { 
  return true; 
  }
});*/
    

}