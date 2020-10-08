<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalUserAdmin extends CI_Controller {

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
		$data['title'] = "Approval User Admin ";
        $data['url'] = "pengamanan/ApprovalUserAdmin/";  

        $where = array(  
            'STATUS' => 0,  
         ); 
        $data['data'] = $this->MUserSystem->getResult($where);    
        // var_dump($data['data']);

		$this->load->view('include/header'); 
        $this->load->view('pengamanan/ApprovalUserAdmin/index',$data);
		$this->load->view('include/footer'); 
    }   

    public function  get_user()
	{   
        $where = array(  
            'STATUS' => 0,  
         ); 
        $data['data'] = $this->MUserSystem->getResult($where);   
        $this->load->view('pengamanan/ApprovalUserAdmin/user',$data); 
    }   
   
    public function get_status()
    {
        $where = array(   
            'USERNAME' => $this->input->post('USERNAME'), 
         ); 
        $data['data'] = $this->MUserSystem->getBy($where);    
        echo json_encode($data['data']);
    }  

   
    public function save()
    {      
        $hasil = array();    
        $where = array('USERNAME' =>  $this->input->post('USERNAME') );    

        $data2 = array(
            'STATUS' =>$this->input->post('STATUS'), 
        );
        $hasil['status'] = $this->MUserSystem->update($where, $data2);  
        if ($hasil['status']==true)
        { 
            $hasil['pesan'] ="Proses Appproval user admin berhasil"; 
        }
        else
        { 
            $hasil['pesan'] ="Proses Appproval user admin gagal";  
        }      
        echo json_encode($hasil);
    }    
}
