<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfigurasiKasda extends CI_Controller {

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
        $data['title'] = "Konfiigurasi KASDA";
        $data['url'] = base_url()."/parameter/KonfigurasiKasda/";

        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   

        $this->load->view('include/header'); 
		$this->load->view('parameter/konfigurasi_kasda/index',$data);
        $this->load->view('include/footer');  
	} 

	public function get_form($KD_KASDA=null)
	{   
        if ($KD_KASDA==null)
        {
            $KD_KASDA='99999';
        }
        else
        {
            $KD_KASDA = $KD_KASDA;
        }
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();  
        $data['nama_konfigurasi'] = $this->MKonfigurasi_kasda->getNamaKonfigurasi($KD_KASDA);  
        $data['jenis_aksi'] ="add"; 
        $data['KD_KASDA'] =null; 
        $data['KD_DATA'] =null; 
        $data['NM_KONFIGURASI'] =null; 
        $data['VALUE'] =null; 
        $data['url_inquery']="parameter/KonfigurasiKasda/inquery"; 
		$this->load->view('parameter/konfigurasi_kasda/form',$data);
	}

	 public function reload_data()
    {   
        $KD_KASDA = $this->input->post('KD_KASDA', TRUE);  
        $where = array('KD_KASDA' => $KD_KASDA );   

        $data['data'] = $this->MKonfigurasi_kasda->getAll();   
        $this->load->view('parameter/konfigurasi_kasda/data', $data); 
    } 

    public function get_data_by_kd_kasda($KD_KASDA)
    { 
        $where = array('KD_KASDA' => $KD_KASDA );
        $data['data']=$this->MKonfigurasi_kasda->getResult($where); 
        $this->load->view('parameter/konfigurasi_kasda/data', $data); 
    } 

    public function inquery()
    {
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $where = array('KD_KASDA' => $KD_KASDA );   
        $data['data'] = $this->MKonfigurasi_kasda->getByObject($where);   
        $this->load->view('parameter/konfigurasi_kasda/data', $data);  
    }

    public function ajax_add()
    {   
        $jenis_aksi = $this->input->post('jenis_aksi', TRUE); 
        $data = array( 
            'KD_KASDA' => $this->input->post('KD_KASDA', TRUE),
            'NM_KONFIGURASI' => $this->input->post('NM_KONFIGURASI', TRUE), 
            'VALUE' => $this->input->post('VALUE', TRUE),  
        );    

        // aksi Tambah 
        $hasil = array();
        if($jenis_aksi=="add"){
            $data['USER_INPUT'] =$this->input->post('USER_INPUT', TRUE);
            $hasil['status'] = $this->MKonfigurasi_kasda->save($data);  
        }   
        else{
            $data['USER_UPDATE'] =$this->input->post('USER_UPDATE', TRUE);  
            $where = array('KD_DATA' => $this->input->post('KD_DATA', TRUE) );
            $hasil['status'] = $this->MKonfigurasi_kasda->update($where, $data);   
        } 

        if($hasil['status']==true && $jenis_aksi=="add"){
            $hasil['pesan'] ="Proses Tambah konfigurasi kasda berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="add")
        {
            $hasil['pesan'] ="Proses Tambah konfigurasi kasda gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="edit")
        {
            $hasil['pesan'] ="Proses ubah konfigurasi kasda berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah konfigurasi kasda gagal";  
        }  

        $hasil['data'] = $data;
        $hasil['jenis_aksi']=$jenis_aksi; 
        echo json_encode($hasil);   
    }

     public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA', TRUE); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MKonfigurasi_kasda->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $KD_KASDA=$data['data']['KD_KASDA']; 
        $data['KD_KASDA']=$KD_KASDA;   
        $data['VALUE']=$data['data']['VALUE'];   
        $data['NM_KONFIGURASI']=$data['data']['NM_KONFIGURASI'];   
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        } 
        $data['nama_konfigurasi'] = $this->MKonfigurasi_kasda->getNamaKonfigurasi($KD_KASDA); 
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();  
        $data['url_inquery']="parameter/KonfigurasiKasda/inquery"; 
        $this->load->view('parameter/konfigurasi_kasda/form',$data);
    }

    public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA', TRUE);
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MKonfigurasi_kasda->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus konfigurasi KASDA berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus konfigurasi KASDA berhasil";  
        }
        echo json_encode($hasil);
    }

    

}