<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koreksi_sp2d extends CI_Controller {


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
		$data['title'] = "Laporan Koreksi SP2D";
        $data['url'] = "laporan/LapTrsans/Koreksi_sp2d/";    
        //kd kasda 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();

        // var_dump($data); 
		$this->load->view('include/header'); 
        $this->load->view('laporan/transaksi/koreksi_sp2d/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {    
        $data = $this->get_post_data();
        if ($data['is_empty']==true)
        {
            $this->load->view('laporan/transaksi/koreksi_sp2d/data_is_empty',$data); 
        }
        else
        { 
            $this->load->view('laporan/transaksi/koreksi_sp2d/data',$data); 
        }  
    }

    public function get_post_data()
    { 
        $KD_KASDA = $this->input->post('kd_kasda');  
        $cek = $this->M_laporan_SP2D_sudah_cair->laporan_koreksi_sp2d($KD_KASDA);
        if ($cek->num_rows()>0)
        {
            $data['is_empty'] = false; 
            $data['laporan'] = $cek->result_array();
        }
        else
        {
            $data['is_empty'] = true;  
            $data['laporan'] = array();
        }  
        $data['judul_tabel'] = "Daftar Pembatalan SP2D";
        // $data['last_query'] =  $this->db->last_query(); 

        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);
        $data['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu']; 
        return $data;
    }

    public function print()
    {   
        $data = $this->get_post_data(); 
        $this->load->view('laporan/transaksi/koreksi_sp2d/print_view',$data);   
    }  
}
