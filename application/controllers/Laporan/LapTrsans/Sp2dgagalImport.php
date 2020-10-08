<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sp2dgagalImport extends CI_Controller {

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
		$data['title'] = "Laporan SP2D Gagal Import";
        $data['url'] = "laporan/LapTrsans/Sp2dgagalImport/";    
        //kd kasda 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();
 
		$this->load->view('include/header'); 
        $this->load->view('laporan/transaksi/sp2d_gagal_import/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {    
        $data = $this->get_post_data();    
        // var_dump($data);
        if ($data['is_empty']==true)
        {
            $this->load->view('laporan/transaksi/sp2d_gagal_import/data_is_empty',$data); 
        }
        else
        { 
            $this->load->view('laporan/transaksi/sp2d_gagal_import/data',$data); 
        }
    }

    public function get_post_data()
    { 
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir'); 

        $cek = $this->M_laporan_SP2D_sudah_cair->sp2dGagalImport($KD_KASDA, $tglawal, $tglakhir);
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
        $data['judul_tabel'] = "Laporan Gagal Import";
        $data['judul_sub_tabel'] = "Periode ".$data['tglawal']." s/d ".$data['tglakhir'];

        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);
        $data['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu']; 
        return $data;
    }

    public function print()
    {   
        $data = $this->get_post_data();
        $this->load->view('laporan/transaksi/sp2d_gagal_import/print_view',$data);  
    }   
  
}
