<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;

class Gateway_server extends CI_Controller {   
    
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
        }
    } 

    public function  index()
    {  
        $data['title'] = "Gateway Server";
        $data['url'] = "transaksi/Gateway_server/";  

        $this->load->view('include/header'); 
        $this->load->view('transaksi/gateway_server/index',$data);
        $this->load->view('include/footer');  
    }   
 
    public function get_form()
    {    
        $data['url_inquery']="transaksi/Gateway_server/inquery"; 
        $this->load->view('transaksi/gateway_server/form2',$data);
    }     

   /* public function test($no_rek)
    { 
        $cek_rekening =  $this->M_interface->cek_rek($no_rek);
        var_dump($cek_rekening->Status);
    }*/

    public function input_potongan_tmp($data_potongan)
    {
        //INSERT DATA KE TABEL TMP  
        $temp_potongan = array();    
        $jumlah_potongan = 0;  
 
        // masukkan data TEMP POTONGAN 
        foreach ($data_potongan as $key) 
        { 
            if (strlen($key['Kd_Bidang'])==1)
            {
                $key['Kd_Bidang']="0".$key['Kd_Bidang'];
            } 

            $data2 = array(
                'No_SPM'=>$key['No_SPM'],
                'Kd_Urusan'=>$key['Kd_Urusan'],
                'Kd_Sub_Unit'=>$key['Kd_Sub'], 
                // 'User_Update'=>'', 
                'Nilai'=>$key['Nilai'],
                'Masa'=>date('m'),
                'No_SP2D'=>$key['No_SP2D'], 
                'User_Input'=>$this->session->userdata('username'),
                'Kd_Rek_1'=>$key['Kd_Rek_1'],
                'Kd_Rek_2'=>$key['Kd_Rek_2'],
                'Kd_Rek_3'=>$key['Kd_Rek_3'],
                'Kd_Rek_4'=>$key['Kd_Rek_4'], 
                'Kd_Rek_5'=>$key['Kd_Rek_5'],
                'Tahun'=>$key['Tahun'],
                // 'No_SP2D_Non_Anggaran'=>'', 
                'Kd_Bidang'=>$key['Kd_Bidang'], 
                'Kd_Unit'=>$key['Kd_Unit'], 
                'Jn_SPM'=>$key['Jn_SPM'],  
                'Nm_Rekening'=>$key['Nm_Rekening'],  
                'Kd_Billing'=>$key['Kd_Billing'],  
                'NTPN'=>$key['NTPN'],  
                'TglTrx_NTPN'=>NULL,  
                'TglBuku_NTPN'=>NULL,  
                'Kd_Kasda'=>$this->session->userdata('KD_KASDA'),  
            ); 
            //msaukkan data temp_potongan
            $input3=$this->db->insert('TEMP_POTONGAN',$data2);  

            //masukkan data potongan
            $input3=$this->db->insert('TrxSP2D_Potongan',$data2);  

            //simpan hasil insert
            $jumlah_potongan = $jumlah_potongan+$key['Nilai']; 
            $temp_potongan[] = array( 
                'status' => $input3,  
                'No_SP2D' => $key['No_SP2D'],   
            );  
            //masukan  data ke tabel potongan   
        }  

        $temp_potongan['jumlah_potongan'] = $jumlah_potongan; 
        $data2 = array(  
           'temp_potongan'=> $temp_potongan, 
        ); 
        return $data2; 
    }

    public function do_import_tmp_penguji()
    {
        //INSERT DATA KE TABEL TMP  
        $status=0;    
        $status_import="";  
        $hasil_potongan="";  
        $last_query="";  
        $data_input1 = array();  
        $KD_KASDA = $this->session->userdata('KD_KASDA');    

        $no_rek = str_replace(' ', '', str_replace('-', '', (str_replace('.', '', $_POST['trx']['Rek_Penerima']))));   

        //PANGGIL CBS
        $cek_rekening =  $this->M_interface->cek_rekening_valid($no_rek); 
        $status =  $cek_rekening['status'];   

        if (strlen($_POST['trx']['Kd_Bidang'])==1)
        {
            $_POST['trx']['Kd_Bidang']="0".$_POST['trx']['Kd_Bidang'];
        }   

        //check apakah NO_sp2d dan tahun sama 
        $check_exixting_NoSP2D = $this->check_exixting_NoSP2D($_POST['trx']['No_SP2D'], $_POST['trx']['No_SPM'], "TrxSP2D");   

        //setiap kali import, masukkan data ke table penguji 
        $data2 = array(
            'Rek_Penerima' => $no_rek,  
            'KD_KASDA' => $KD_KASDA, 
            'status' => $status, 
        );
        $hasil_query = $this->M_temp_penguji->insert($_POST, $data2);
        $data_input1 = $hasil_query['data_input1'];

        //masukkan data temp_potongan
        if ($_POST['potongan']!=null)
        { 
            //masukkin data trx 
            $hasil_potongan = $this->input_potongan_tmp($_POST['potongan']); 
            $data_input1['jumlah_potongan']= $hasil_potongan['temp_potongan']['jumlah_potongan']; 
        } 
        else
        {
            $hasil_potongan=false;
            $data_input1['jumlah_potongan']= 0; 
        }   

        if ($check_exixting_NoSP2D['num_rows']<1)
        {
            //jika data belum ada, masukkan data ke trxSP2D  
            $data_input1['user_input']= $this->session->userdata('username');
            $input_trxSP2D = $this->input_trxSP2D($data_input1);
  
            // jika berhasil memasukkan data ke table trxSP2, maka update status dan kode_proses di tabel penguji,
            if ($input_trxSP2D==true)
            {
                //update status di table penguji 
                $where = array(
                    'No_SP2D' => $_POST['trx']['No_SP2D'], 
                    'No_SPM' => $_POST['trx']['No_SPM'], 
                ); 
                $status_import = $this->M_temp_penguji->sukses_import_trxSp2dAndPotongan($where); 
            }  
        }  

        $data2 = array( 
            'status'=>$status_import,   
            'potongan'=>$hasil_potongan,          
            // 'TglCair'=>$now->format('Y-m-d H:i:s'),         
            // 'potongan2'=>$hasil_potongan['temp_potongan']['jumlah_potongan'],         
        ); 
        echo json_encode($data2);   
    }

    public function check_exixting_NoSP2D($No_SP2D, $No_SPM, $table)
    { 
       $this->db->where("No_SP2D='$No_SP2D' OR No_SPM='$No_SPM'");
       $check = $this->db->get($table);
       $return = array(
        'num_rows' => $check->num_rows(), 
        'No_SP2D' => $check->row_array()['No_SP2D'], 
        ); 
       return $return;
    } 

    public function input_trxSP2D($data)
    {
        if (strlen($data['Kd_Bidang'])==1)
        {
            $data['Kd_Bidang']="0".$data['Kd_Bidang'];
        } 

        date_default_timezone_set('asia/jakarta');
        $now = new DateTime();  
        $data_input2 = array(
            'Bank_Penerima' => $data['Bank_Penerima'], 
            'DateCreate' => $data['DateCreate'], 
            'Kd_Bidang' => $data['Kd_Bidang'], 
            'Kd_Sub' => $data['Kd_Sub'], 
            'Kd_Unit' => $data['Kd_Unit'], 
            'Kd_Urusan' => $data['Kd_Urusan'], 
            'Keterangan' => $data['Keterangan'], 
            'NPWP' => $data['NPWP'], 
            'Nilai' => $data['Nilai']-$data['jumlah_potongan'], 
            'Nm_Bank' => $data['Nm_Bank'], 
            'Nm_Penerima' => $data['Nm_Penerima'], 
            'No_Rekening' =>  str_replace('-', '', (str_replace('.', '', str_replace(' ', '', $data['No_Rekening'])))), 
            'No_SP2D' => $data['No_SP2D'], 
            'No_SPM' => $data['No_SPM'], 
            'Rek_Penerima' => str_replace('-', '', (str_replace('.', '', str_replace(' ', '', $data['Rek_Penerima'])))), 
            'Tahun' => $data['Tahun'], 
            'Tgl_Penguji' => $data['Tgl_Penguji'], 
            'Tgl_SP2D' => $data['Tgl_SP2D'], 
            'Tgl_SPM' => $data['Tgl_SPM'],  
            'Jn_SPM' => $data['Jn_SPM'],   
            'user_input' => $data['user_input'],   
            'KD_KASDA' => $data['KD_KASDA'],   
            'STATUS' => 0,   
            //data SIMDA 04
            'TglCair' => $now->format('Y-m-d'),   
            'Cair' => $data['Cair'],    
            'Uraian' => $data['Uraian'],  // di gantikan dengan field keterangan
            'Gaji' => $data['Gaji'],   
            'Nm_Sub_Unit' => $data['Nm_Sub_Unit'],  
            'Nm_Unit' => $data['Nm_Unit'],  
            //akhir data SIMDA 04   
            'TOTAL_SP2D' => $data['Nilai'],  
        );   
         return $this->db->insert('TrxSP2D',$data_input2);  
        // return $data_input2;
    }

    public function get_potongan($No_SP2D=null)
    {   
        //select data konfig database setiap kasda
        $KD_KASDA = $this->session->userdata('KD_KASDA');
        $data_database = $this->M_interface->detail( array('KD_KASDA' => $KD_KASDA ))->row_array(); 

        // $No_SP2D = $this->input->post('No_SP2D');
        $data = array(
            'No_SP2D' => $No_SP2D, 
            // 'No_SP2D' => '238/SP2D/LS-GAJI/DIKBUD/2015', 
            'HOST' => $data_database['HOST'], 
            'USERNAME' => $data_database['USERNAME'], 
            'PASSWORD' => $data_database['PASSWORD'], 
            'PORT' => $data_database['PORT'], 
        );    

        $data_new = json_encode($data); 
        $curl_bearer = curl_init();
        // curl_setopt($curl_bearer, CURLOPT_URL, 'http://localhost/cms_kasda_api/Potongan_rest/');
        curl_setopt($curl_bearer, CURLOPT_URL, 'http://'.$DATA['HOST'].':'.$DATA['PORT'].'/cms_kasda_api/Potongan_rest/');
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl_bearer, CURLOPT_POST, true);
        curl_setopt($curl_bearer, CURLOPT_POSTFIELDS, $data_new);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($curl_bearer);
        curl_close($curl_bearer); 
        $hasil = json_decode($result, true);  
        return $hasil;  
        // echo json_encode($hasil);
    } 

    public function start_inport()
    {      
        //get data tanggal date create 
        $data_hasil_import = $this->M_TrxSP2D->get_last_dateAndTime();
        $data['tgl_terakhir_import'] = substr($data_hasil_import, 0,10);  
        /*$data['jam_terakhir_import'] = substr($data_hasil_import, strpos($data_hasil_import, " ") + 1);   */  
        $data['jam_terakhir_import'] = substr($data_hasil_import, 11,8);  
        
        if ($data['jam_terakhir_import']==false)
        {
            $data['jam_terakhir_import']="00:00:00";
        }  

        $data['KD_KASDA'] = $this->session->userdata('KD_KASDA');
        $data_database = $this->M_interface->detail( array('KD_KASDA' => $data['KD_KASDA'] ))->row_array(); 

        //post data config database 
        $data['USERNAME'] =$data_database['USERNAME'];
        $data['PASSWORD'] =$data_database['PASSWORD'];
        $data['HOST'] =$data_database['HOST'];
        $data['DB_NAME'] =$data_database['DB_NAME'];
        $data['PORT'] =$data_database['PORT'];
        $data['jam'] =$data['jam_terakhir_import'];
        $data['tanggal'] =$data['tgl_terakhir_import']; 
        $data['balikan_server'] = $this->get_trxSP2D($data);
        echo json_encode($data);  
    }  

    public function get_trxSP2D($data)
    {    
        $data_new = json_encode($data);     
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, 'http://'.$data['HOST'].':'.$data['PORT'].'/cms_kasda_api/Transaksi_rest');
        // curl_setopt($curl_bearer, CURLOPT_URL, 'http://localhost/cms_kasda_api/Transaksi_rest');
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

    public function truncate()
    {
        $this->db->query('truncate table TrxSP2D');
        $this->db->query('truncate table TrxSP2D_Potongan');
        $this->db->query('truncate table TEMP_POTONGAN');
        $this->db->query('truncate table TEMP_PENGUJI2');
    } 
    
}