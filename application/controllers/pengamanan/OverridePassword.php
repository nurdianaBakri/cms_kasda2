<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OverridePassword extends CI_Controller {

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
		$data['title'] = "Override Password ";
        $data['url'] = "pengamanan/OverridePassword/";  
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();    

		$this->load->view('include/header'); 
        $this->load->view('pengamanan/OverridePassword/index',$data);
		$this->load->view('include/footer'); 
    }   
  
    public function get_user_by_kd_kasda()
    {
        $where = array(  
            // 'ERROR_LOGIN' => 3, 
            'KD_KASDA' => $this->input->post('KD_KASDA', TRUE), 
         ); 
        $data['data'] = $this->MUserSystem->getResult($where);   
        $this->load->view('pengamanan/OverridePassword/user',$data); 
    }  

    public function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

 
    public function save()
    {      
        $hasil = array();    
        $where = array('USERNAME' =>  $this->input->post('USERNAME', TRUE) );   
 
        $data = $this->M_changePassword->detail($where);  

        if ($data->num_rows()>0)
        { 
            /*$salt = "ntb128Syariah";*/
            $password = $this->generateRandomString();
            // $pass_baru = md5($salt.$password);  
            $pass_baru = md5($password);  
             
            $data2 = array(
                'PASSWORD' => $pass_baru, 
            );
            $hasil['status'] = $this->M_changePassword->update($where, $data2);  
            if ($hasil['status']==true)
            { 
                 $hasil = array(
                    'status'=>true,
                    'password'=>"<div class='alert alert-success' role='alert'> Password baru : ".$password."</div>",
                    'pesan' => "Proses Override user berhasil",  
                ); 
            }
            else
            { 
                $hasil = array(
                    'status'=>true,
                    'pesan' => "Proses Override user gagal",  
                );  
            }  
        }
        else{
            $hasil = array(
                'status'=>false,
                'pesan' => "data username ".$this->input->post('USERNAME', TRUE)." tidak di temukan",  
            );
        }  
        echo json_encode($hasil);
    }   
}
