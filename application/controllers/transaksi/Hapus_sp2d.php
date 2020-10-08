<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hapus_sp2d extends CI_Controller {

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
        $this->load->view('include/header'); 
		$this->load->view('transaksi/hapusSP2D/index');
        $this->load->view('include/footer');  
	}   

	 public function reload_data()
    {  
        $data_balikan['data'] = $this->M_TrxSP2D->getAll();  
        $this->load->view('transaksi/hapusSP2D/data', $data_balikan); 
    }

     public function inquery()
    {
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $data = array('KD_KASDA' => $KD_KASDA );   
        $data['data'] = $this->MRekeningSumber->getByObject($data);  
        $this->load->view('transaksi/hapusSP2D/data', $data);  
    }

    public function hapus()
    {
        $hasil = array(); 
        $No_SP2D = $this->input->post('No_SP2D');
        $where = array('No_SP2D' => $No_SP2D );
 
        $hasil['status']=$this->M_TrxSP2D->hapus($where);    
        $hasil['status']=$this->M_TrxSP2D_Potongan->hapus($where);    
       /* $hasil['status']=$this->M_hapusSKPD->hapus($where,"TEMP_PENGUJI2");    
        $hasil['status']=$this->M_hapusSKPD->hapus($where,"TEMP_POTONGAN");  */  
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus ".$No_SP2D." berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus ".$No_SP2D." gagal, silakan coba kembali";  
        }
        echo json_encode($hasil);
    }
   
    
}