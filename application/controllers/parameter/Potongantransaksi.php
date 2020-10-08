<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongantransaksi extends CI_Controller {

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
        $data['title'] = "Potongan Transaksi";
        $data['url'] = base_url()."parameter/Potongantransaksi/";

        $this->load->view('include/header'); 
		$this->load->view('parameter/potongan_transaksi/index',$data);
        $this->load->view('include/footer');  
	} 

	public function get_form()
	{    
        $data['jenis_aksi'] ="add"; 
        $data['KD_KASDA'] =null; 
        $data['KD_DATA'] =null; 
        $data['BATAS_BAWAH'] =null; 
        $data['BATAS_ATAS'] =null; 
        $data['POTONGAN'] =null; 
        $data['url_inquery']="parameter/Potongantransaksi/inquery"; 
		$this->load->view('parameter/potongan_transaksi/form',$data);
	}

	 public function reload_data()
    { 
        $data_balikan['data']= array();
        $data['data'] = $this->MPotongan_transaksi->getAll();   
        $this->load->view('parameter/potongan_transaksi/data', $data); 
    }  

    public function inquery()
    {    
        $data['data'] = $this->MPotongan_transaksi->getAll();   
        $this->load->view('parameter/potongan_transaksi/data', $data);  
    }

    public function ajax_add()
    {   
        $jenis_aksi = $this->input->post('jenis_aksi'); 
        $data = array( 
            'BATAS_BAWAH' => $this->input->post('BATAS_BAWAH', TRUE),
            'BATAS_ATAS' => $this->input->post('BATAS_ATAS', TRUE), 
            'POTONGAN' => $this->input->post('POTONGAN', TRUE),  
        );  
 
        $hasil = array();
        if($jenis_aksi=="add"){
            $data['USER_INPUT'] =$this->input->post('USER_INPUT');
            $hasil['status'] = $this->MPotongan_transaksi->save($data);  
        }   
        else{
            $data['USER_UPDATE'] =$this->input->post('USER_UPDATE');  
            $where = array('KD_DATA' => $this->input->post('KD_DATA') );
            $hasil['status'] = $this->MPotongan_transaksi->update($where, $data);   
        } 

        if($hasil['status']==true && $jenis_aksi=="add"){
            $hasil['pesan'] ="Proses Tambah potongan transaksi berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="add")
        {
            $hasil['pesan'] ="Proses Tambah potongan transaksi gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="edit")
        {
            $hasil['pesan'] ="Proses ubah potongan transaksi berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah potongan transaksi gagal";  
        }  

        $hasil['data'] = $data;
        $hasil['jenis_aksi']=$jenis_aksi; 
        echo json_encode($hasil);    
    }

     public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA'); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MPotongan_transaksi->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $KD_KASDA=null;     
        $data['BATAS_ATAS']=$data['data']['BATAS_ATAS'];   
        $data['BATAS_BAWAH']=$data['data']['BATAS_BAWAH'];   
        $data['POTONGAN']=$data['data']['POTONGAN'];     
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }  
        $data['url_inquery']="parameter/Potongantransaksi/inquery"; 
        $this->load->view('parameter/potongan_transaksi/form',$data);
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MPotongan_transaksi->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus potongan transaksi berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus potongan transaksi berhasil";  
        }
        echo json_encode($hasil);
    }

}