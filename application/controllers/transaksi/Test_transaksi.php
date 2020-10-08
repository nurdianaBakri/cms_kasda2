<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Test_transaksi extends CI_Controller {   
    
    public function __construct()
    {
        parent ::__construct();
        $cek = $this->M_login->cek_userIsLogedIn();
        if ($cek==FALSE)
        {
            $this->session->set_flashdata('pesan',"Anda harus login jika ingin mengakses halaman lain");
            // redirect('Login');
        } 
    }  

     public function test($no_rek)
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
        // return $json_status; 

        var_dump($json_status); 
        echo "<br>".$url;
    }


    public function pemindahBukuan2()
    {     
         $_param = array(
            // 'rek_pengirim' => "5040312068014", 
            'rek_pengirim' => "0012299581015", 
            // 'rek_penerima' => "5040312068014", 
            'rek_penerima' => "0010200512271", 
            'nilai_transfer' => 1000000, 
            'ket_transfer' => "Pencairan SP2D",  
            'checksum' => "",  
        );

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

        echo "<pre>";
        var_dump( $json_status);
        echo "</pre>";
        echo($_param['checksum']); 
    }

    public function rekran()
    {
        $no_rek = "0012299584018";
        $tglawal = "2020-08-02";
        $tglakhir= "2020-09-02";

       /*$data =  $this->M_interface->rekening_koran($no_rek, $tglawal, $tglakhir); 
        var_dump($data);
        */
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
        echo $url;
        // return $json_status;  
    }

    public function sms()
    {
        $isi='Kredit di rekening Anda sebesar 1.200.000';
                    $fields_string  = "";
                    $fields = array(
                        'user'      =>  'ntbnotif',
                        'pass'      =>  'Bntb$128',
                        'type'      =>  '0',
                        // 'to'        =>  6282340210605,
                        'to'        =>  6282339400521,
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
        return $result; 
        // echo($fields_string); 
    }

    public function  test_get5menit()
    {
        $timeee = $this->db->query("SELECT GETDATE() current_date_time")->row()->current_date_time;

        // singlebyte strings
        $time1 = substr($timeee, 0, 16); 

       $minutes_to_add = 5;  
        // $time = date("Y-m-d H:m") ;
        $time =  new DateTime( $time1);
        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

        $stamp = $time->format('Y-m-d H:i');

        echo $time1."<br>";
        echo $stamp;
    } 

    public function get_checksum()
    {
        echo strtoupper(hash('sha256', 'NTB$20190012299581015'));
    }

    public function cek_saldo($no_rekening)
    {
        // $no_rek = "5040312068014"; 
        $this->db->where('name_api','cek_saldo');
        $api_url = $this->db->get('config_api')->row()->api_url; 

        $ceksum = strtoupper(hash('sha256', '3NTB$2019'.$no_rekening));    
        $url = $api_url."index.php/Data?checksum=".$ceksum."&type=3&norekening=".$no_rekening;
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, $url);
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPGET, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
        $status = curl_exec($curl_bearer);
        curl_close($curl_bearer);
        $json_status=json_decode($status);  
        echo json_encode($json_status); 
        /*echo $url;*/ 
    }

    public function rekening_koran($no_rekening, $tglawal, $tglakhir)
    {
        $this->db->where('name_api','rekening_koran2'); 
        $api_url = $this->db->get('config_api')->row()->api_url;

        $ceksum = strtoupper(hash('sha256', '4NTB$2019'.$no_rekening));    
        $url =$api_url.'index.php/Data?checksum='.$ceksum.'&type=4&norekening='.$no_rekening.'&startDate='.$tglawal.'&endDate='.$tglakhir.'';
        $curl_bearer = curl_init();
        curl_setopt($curl_bearer, CURLOPT_URL, $url);
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPGET, true);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
        $status = curl_exec($curl_bearer);
        curl_close($curl_bearer);
        $json_status=json_decode($status);  
        echo json_encode($json_status);  
       /* echo $url;*/
    }

    
    //Our custom function.
    public function generatePIN($digits = 4){
        $i = 0; //counter
        $pin = ""; //our default pin is blank.
        while($i < $digits){
            //generate a random number between 0 and 9.
            $pin .= mt_rand(0, 9);
            $i++;
        }
        return $pin;
    }

    public function get_5meniteForward()
    { 
        $timeee = $this->db->query("SELECT GETDATE() current_date_time")->row()->current_date_time;

        // singlebyte strings
        $time1 = substr($timeee, 0, 16); 

        $minutes_to_add = 1;  
        // $time = date("Y-m-d H:m") ;
        $time =  new DateTime( $time1);
        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

        $stamp = $time->format('Y-m-d H:i');

        // echo $time1."<br>";
        return $stamp; 
    }

 
}