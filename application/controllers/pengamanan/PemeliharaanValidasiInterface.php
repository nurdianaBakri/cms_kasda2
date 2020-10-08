<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanValidasiInterface extends CI_Controller {

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
		$data['title'] = "Pemeliharaan  Validasi Interface ";
        $data['url'] = "pengamanan/PemeliharaanValidasiInterface/";  
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();    

		$this->load->view('include/header'); 
        $this->load->view('pengamanan/PemeliharaanValidasiInterface/index',$data);
		$this->load->view('include/footer'); 
    }   

    public function reload_data()
    {     
        $data = $this->get_post_data();  
        $where = array('kd_kasda' => $data['kd_kasda'] );  
        $data2['data'] = $this->M_PemeliharaanValidasiInterface->getBy($where)->result_array(); 
        $data2['kd_kasda'] = $data['kd_kasda']; 

        $data2['validasi_interface'] = $this->db->get('validasi_interface')->result_array();    
        $this->load->view('pengamanan/PemeliharaanValidasiInterface/data',$data2);  
    } 

    public function get_post_data()
    {
        $data['kd_kasda'] = $this->input->post('kd_kasda');
        return $data;
    }
  
    public function get_user_by_kd_kasda()
    {
        $where = array(  
            'ERROR_LOGIN' => 3, 
            'KD_KASDA' => $this->input->post('KD_KASDA'), 
         ); 
        $data['data'] = $this->MUserSystem->getResult($where);   
        $this->load->view('pengamanan/PemeliharaanValidasiInterface/user',$data); 
    }  
 
    public function save()
    {      
        $hasil = array();    
        $where = array('USERNAME' =>  $this->input->post('USERNAME') );   
        $data = $this->M_changePassword->detail($where);  

        if ($data->num_rows()>0)
        {
            $data_db = $data->row_array(); 
            $pass_lama1  = $this->input->post('PASSWORD_LAMA');
            $pass_lama = md5($pass_lama1);

            $pass_baru1  = $this->input->post('PASSWORD_BARU');
            $pass_baru = md5($pass_baru1); 

            //cek if password di db sama dengan password inputan 
            if ($pass_lama!=$data_db['PASSWORD'])
            { 
                $hasil = array(
                    'status'=>false,
                    'pesan' => "Password yang ada di database untuk user ".$this->input->post('USERNAME')." tidak tidak cocok dengan password yang di input", 
                );
            }
            else
            { 
                $data2 = array(
                    'PASSWORD' => $pass_baru, 
                );
                $hasil['status'] = $this->M_changePassword->update($where, $data2);  
                if ($hasil['status']==true)
                { 
                    $hasil['pesan'] ="Proses ubah password user berhasil"; 
                }
                else
                { 
                    $hasil['pesan'] ="Proses ubah password user gagal";  
                } 
            } 
        }
        else{
            $hasil = array(
                'status'=>false,
                'pesan' => "data username ".$this->input->post('USERNAME')." tidak di temukan", 
            );
        }  
        echo json_encode($hasil);
    }    
}
