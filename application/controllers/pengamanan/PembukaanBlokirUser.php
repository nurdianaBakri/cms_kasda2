<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembukaanBlokirUser extends CI_Controller {

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
		$data['title'] = "Pembukaan Blokir Password ";
        $data['url'] = "pengamanan/PembukaanBlokirUser/";  
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();    

		$this->load->view('include/header'); 
        $this->load->view('pengamanan/PembukaanBlokirUser/index',$data);
		$this->load->view('include/footer'); 
    }   
   
    public function get_user_by_kd_kasda()
    {
        $where = array(  
            'ERROR_LOGIN' => 3, 
            'KD_KASDA' => $this->input->post('KD_KASDA'), 
         ); 
        $data['data'] = $this->MUserSystem->getResult($where);   
        $this->load->view('pengamanan/PembukaanBlokirUser/user',$data); 
    }   
   
    public function bukaBlokir()
    {      
        $hasil = array();    
        $where = array('USERNAME' =>  $this->input->post('USERNAME') );   

        // $this->db->where($where);
        // $hasil['cek']=$this->db->get("user_system")->num_rows();

        $data2 = array(
            'ERROR_LOGIN' => 0, 
            'STATUS' => 1, 
        );
        $hasil['status'] = $this->MUserSystem->update($where, $data2);  
        if ($hasil['status']==true)
        { 
            $hasil['pesan'] ="Proses buka blokir user berhasil"; 
        }
        else
        { 
            $hasil['pesan'] ="Proses buka blokir user gagal";  
        }    

        echo json_encode($hasil);
    }    
}
