<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;

class Gateway_trxSPM extends CI_Controller {   
    
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

    public function index()
    {  
        $data['title'] = "Gateway Server Transaksi SPM";
        $data['url'] = "transaksi/Gateway_trxSPM/";  

        $this->load->view('include/header'); 
        $this->load->view('transaksi/gateway_trxSpm/index',$data);
        $this->load->view('include/footer');  
    }   
 
    public function get_form()
    {    
        $data['url_inquery']="transaksi/Gateway_trxSPM/inquery"; 
        $this->load->view('transaksi/gateway_trxSpm/form2',$data);
    }      

    public function input_trx_spm()
    {
        //INSERT DATA KE TABEL TMP  
        $status=0;    
        $cek_rekening="";    
        $hasil_potongan="";   
        $input1 = ""; 
        $Uraian="";

        $KD_KASDA = $this->session->userdata('KD_KASDA');
        $Rek_Penerima = str_replace(' ', '', str_replace('-', '', (str_replace('.', '', $_POST['trx']['Rek_Penerima'])))) ; 

        $now = new DateTime();   
       
        $word = "NTB";
        $word2 = "NUSA TENGGARA BARAT";
        $mystring = $_POST['trx']['Bank_Penerima'];
         
        // Test if string contains the word 
        if((strpos($mystring, $word) !== false) || (strpos($mystring, $word2) !== false))
        { 
            //CHECK REKENING 
            //update status dan uraian
            $cek_rekening =  $this->M_interface->cek_rek($Rek_Penerima);  
            if ($cek_rekening==null)
            {
                $Uraian ="Koneksi ke server internal terputus";
            }
            else
            {
                //pengecekan berhasil 
                if ($cek_rekening->Status==true)
                {
                    //rekeing valid
                    $status = 1;  
                    $uraian_tambahan="";

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
            }  
        }  
        else     
        {
            //jika bank penerima == bukan bank NTB 
            $status = 3;   
            $Uraian = "Bank penerima bukan bank NTB Syariah. "; 
        } 
            

        //update status dan uraian di table TrxSPM
        $data_input1 = array(
            'Tahun' => $_POST['trx']['Tahun'], 
            'No_SPM' => $_POST['trx']['No_SPM'], 
            'Nm_Penerima' => $_POST['trx']['Nm_Penerima'], 
            'Bank_Penerima' => $_POST['trx']['Bank_Penerima'], 
            'Status' => $_POST['trx']['Status'], 
            'DateCreate' => $_POST['trx']['DateCreate'], 
            'Uraian' => $_POST['trx']['Uraian'], 
            'Nm_Unit' => $_POST['trx']['Nm_Unit'], 
            'Nm_Sub_Unit' => $_POST['trx']['Nm_Sub_Unit'],  
            // 'Rek_Penerima' => $Rek_Penerima,  
            'Rek_Penerima' => $_POST['trx']['Rek_Penerima'],  
            'Status_new' => $status,  
            'Uraian_new' => $Uraian,  
        );   

        //get config database
        $KD_KASDA = $this->session->userdata('KD_KASDA');
        $data_database = $this->M_interface->detail( array('KD_KASDA' => $KD_KASDA ))->row_array(); 

        // //post data config database 
        $data_input1['USERNAME'] =$data_database['USERNAME'];
        $data_input1['PASSWORD'] =$data_database['PASSWORD'];
        $data_input1['HOST'] =$data_database['HOST'];
        $data_input1['IP_PC_OPR'] =$data_database['IP_PC_OPR'];
        $data_input1['DB_NAME'] =$data_database['DB_NAME']; 
 
        $update = $this->update_TrxSPM_simda($data_input1);  

        if ($update==true)
        {  
            //remove array 
            // USERNAME, PASSWORD, HOST, DB_NAME
            //  pada array data_input1  
            unset($data_input1['USERNAME']);
            unset($data_input1['PASSWORD']);
            unset($data_input1['IP_PC_OPR']);
            unset($data_input1['HOST']);
            unset($data_input1['DB_NAME']);   
            // $data_input1['status_import']=$update;

            //masukkan data ke tabel TRX_SMP database CMS
            $insertDataLocal = $this->db->insert('TrxSPM', $data_input1);
            if ($insertDataLocal==true)
            { 
                $data_input1['aktifitas']= "Import data trxSPM dari SIMDA_4 berhasil";  
            }
            else
            {
                $data_input1['aktifitas']= "Import data trxSPM dari SIMDA_4 gagal, sistem hanya mengupdate status pada table trxSPM database SIMDA_4";   
            }
        }
        else{
            $data_input1['aktifitas']= "Import data trxSPM dari SIMDA_4 gagal, sistem gagal mengupdate data trxSPM pada DB SIMDA_4 dan trxSPM pada DB CMS_KASDA";     
        }  

        //get username user yang login 
        $username = $this->session->userdata('username');
        $old_value = array( array()); 
        //insert ke log 
        $this->M_log->insert_log($username, $data_input1['aktifitas'], $old_value, $data_input1);

        $data2 = array( 
            // 'update'=>$update,                   
            'status'=>$update['status'],                   
            'Rek_Penerima'=>$Rek_Penerima,                   
            'Uraian_new'=>$data_input1['Uraian_new'],       
        ); 

        $data_input1['cek_rekening'] =$cek_rekening;  
        echo json_encode($data_input1); 
    } 

    public function start_inport()
    {      
        //get data tanggal date create 
        $data_hasil_import = $this->M_TrxSPM->get_last_dateAndTime();

        if ($data_hasil_import==null)
        {
            $data['jam_terakhir_import']=null;
            $data['tgl_terakhir_import']=null;
        }
        else
        {
            $data['tgl_terakhir_import'] = substr($data_hasil_import, 0,10);  
            $data['jam_terakhir_import'] = substr($data_hasil_import, strpos($data_hasil_import, " ") + 1);      
            if ($data['jam_terakhir_import']==false)
            {
                $data['jam_terakhir_import']="00:00:00";
            }  
        } 

        $KD_KASDA = $this->session->userdata('KD_KASDA');
        // // $KD_KASDA = '00001';
        $data_database = $this->M_interface->detail( array('KD_KASDA' => $KD_KASDA ))->row_array(); 

        // //post data config database 
        $data['USERNAME'] =$data_database['USERNAME'];
        $data['PASSWORD'] =$data_database['PASSWORD'];
        $data['HOST'] =$data_database['HOST'];
        $data['DB_NAME'] =$data_database['DB_NAME'];
        $data['IP_PC_OPR'] =$data_database['IP_PC_OPR'];
        $data['jam'] =$data['jam_terakhir_import'];
        $data['tanggal'] =$data['tgl_terakhir_import']; 
        $data['Kd_Kasda'] = $KD_KASDA;
   
        $data['balikan_server'] = $this->get_data_server($data);
        echo json_encode($data); 
        // var_dump($data);
    }  


    public function get_data_server($data)
    {    
        $IP_PC_OPR  = $data['IP_PC_OPR'];
        $data_new = json_encode($data);     
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, 'http://'.$IP_PC_OPR.'/cms_kasda_api/Transaksi_SPM_rest');
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl_bearer, CURLOPT_POST, true);
        curl_setopt($curl_bearer, CURLOPT_POSTFIELDS, $data_new);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($curl_bearer);
        curl_close($curl_bearer); 
        $hasil = json_decode($result, true);  
        return $hasil;
    }  

    public function update_TrxSPM_simda($data)
    { 
        $IP_PC_OPR  = $data['IP_PC_OPR'];
        $data_new = json_encode($data);     
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, 'http://'.$IP_PC_OPR.'/cms_kasda_api/Transaksi_SPM_update_rest');
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl_bearer, CURLOPT_POST, true);
        curl_setopt($curl_bearer, CURLOPT_POSTFIELDS, $data_new);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($curl_bearer);
        curl_close($curl_bearer); 
        $hasil = json_decode($result, true);  
        return $hasil;
    } 
}