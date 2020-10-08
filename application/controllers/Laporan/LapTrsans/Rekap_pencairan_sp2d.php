<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_pencairan_sp2d extends CI_Controller {

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
		$data['title'] = "Laporan Rekap Pencairan SP2D";
        $data['url'] = "laporan/LapTrsans/Rekap_pencairan_sp2d/";    
        //kd kasda 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();

        // var_dump($data); 
		$this->load->view('include/header'); 
        $this->load->view('laporan/transaksi/rekap_pencairan_sp2d/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {    
        $data = $this->get_post_data();
        $data['judul_tabel'] = "Laporan Rekap Pencairan SP2D";
        $data['judul_sub_tabel'] = "Periode ".$data['tglawal']." s/d ".$data['tglakhir'];
        if ($data['is_empty']==true)
        {
            $this->load->view('laporan/transaksi/rekap_pencairan_sp2d/data_is_empty',$data); 
        }
        else
        { 
            $this->load->view('laporan/transaksi/rekap_pencairan_sp2d/data',$data); 
        }
    }

    public function get_post_data()
    { 
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');

        $cek = $this->M_laporan_SP2D_sudah_cair->rekap_pencairan($KD_KASDA, $tglawal, $tglakhir);
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
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $data['last_query'] =  $this->db->last_query(); 

        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);
        $data['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu']; 
        return $data;
    }

    public function print()
    {   
        $data = $this->get_post_data();
        $this->load->view('laporan/transaksi/rekap_pencairan_sp2d/print_view',$data);  
    }   
    
    function get_user_id()
    {
        $data = array(); 
        $KD_KASDA = $this->input->post('KD_KASDA'); 

        $cek = $this->M_laporan_SP2D_sudah_cair->get_user_id($KD_KASDA);
        if($cek->num_rows()>0)
        {
            $data['data_is_empty'] =  false;
            $data['data'] = $cek->result();
            // $data['data'] =$this->db->last_query();
        }
        else
        {
            $data['data_is_empty'] = true;
            $data['data'] = array();
        }
        $this->load->view('laporan/transaksi/rekap_pencairan_sp2d/user_pencairan',$data);  
    }
}
