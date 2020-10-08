<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KolektifPotongandanPajak extends CI_Controller {

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
		$data['title'] = "Laporan Kolektif Potongan dan Pajak";
        $data['url'] = "laporan/LapTrsans/KolektifPotongandanPajak/";    
        //kd kasda 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();
 
		$this->load->view('include/header'); 
        $this->load->view('laporan/transaksi/kolektif_potongan_dan_pajak/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {    
        $data = $this->get_post_data();  

        // var_dump($data['KD_KASDA']);  
        
        // echo $this->db->last_query();
        if ($data['data']['is_empty']==true)
        {
            $this->load->view('laporan/transaksi/kolektif_potongan_dan_pajak/data_is_empty',$data); 
        }
        else
        { 
            $this->load->view('laporan/transaksi/kolektif_potongan_dan_pajak/data',$data); 
        }
    }

    public function get_post_data()
    { 
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir'); 

        // $data['data'] = $this->M_laporan_SP2D_sudah_cair->laporan_kolektif_potongan_dan_pajak($KD_KASDA, $tglawal, $tglakhir); 
        $data['data'] = $this->M_laporan_SP2D_sudah_cair->get_pajak_kolektif($KD_KASDA, $tglawal, $tglakhir); 
 
        $data['judul_tabel'] = "LAPORAN POTONGAN SP2D NON ANGGARAN";
        $data['judul_sub_tabel'] = "Periode ".$tglawal." s/d ".$tglakhir;
        $data['KD_KASDA'] = $KD_KASDA;

        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);
        $data['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu']; 
        return $data;
    }
 

    public function print()
    {   
        $data = $this->get_post_data();
        $this->load->view('laporan/transaksi/kolektif_potongan_dan_pajak/print_view',$data);  
    }   
  
}
