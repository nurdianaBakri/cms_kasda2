<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->view('include/header');
        $this->load->view('login/index');
        $this->load->view('include/footer');
	} 

    public function  invalidPage()
    { 
        $data['title'] = "Invalid Page";    
        $this->load->view('include/header'); 
        $this->load->view('home/invalidPage', $data);
        $this->load->view('include/footer'); 
    }  
}