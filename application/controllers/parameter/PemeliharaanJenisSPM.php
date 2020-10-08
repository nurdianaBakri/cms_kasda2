<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanJenisSPM extends CI_Controller {

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
        $data['title'] = "Pemeliharaan Jenis SPM";
        $data['url'] = base_url()."parameter/PemeliharaanJenisSPM/";
        $this->load->view('include/header'); 
        $this->load->view('parameter/PemeliharaanJenisSPM/index',$data);
        $this->load->view('include/footer');  
    } 

    public function get_form()
    {     
        $data['jenis_aksi'] ="add"; 
        $data['KD_JENIS_SPM'] =null; 
        $data['NM_JENIS_SPM'] =null;  
        $data['KD_DATA'] =null;  
        $data['url_inquery']="parameter/PemeliharaanJenisSPM/inquery"; 
        $this->load->view('parameter/PemeliharaanJenisSPM/form',$data);
    }

     public function reload_data()
    { 
        $data_balikan['data']= array();
        $data['data']= $this->MPemeliharaanJenisSPM->getAll();  
        $this->load->view('parameter/pemeliharaanJenisSPM/data', $data); 
    }  

    public function inquery($KD_KASDA=NULL)
    {
      $this->reload_data();
    }

      public function ajax_add()
    {   
        $jenis_aksi = $this->input->post('jenis_aksi'); 
        $data = array( 
            'KD_JENIS_SPM' => $this->input->post('KD_JENIS_SPM'), 
            'NM_JENIS_SPM' => $this->input->post('NM_JENIS_SPM'), 
            'USER_INPUT' => $this->input->post('USER_INPUT'), 
            'USER_UPDATE' => $this->input->post('USER_UPDATE'),  
        );   

        // aksi Tambah 
        $hasil = array();
        if($jenis_aksi=="add"){
            $hasil['status'] = $this->MPemeliharaanJenisSPM->save($data);   
        }   
        else{
            $where = array('KD_DATA' => $this->input->post('KD_DATA') );
            $hasil['status'] = $this->MPemeliharaanJenisSPM->update($where, $data);   
        } 

        if($hasil['status']==true && $jenis_aksi=="add"){
            $hasil['pesan'] ="Proses Tambah data pemeliharaan jenis SPM berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="add")
        {
            $hasil['pesan'] ="Proses Tambah data pemeliharaan jenis SPM gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="edit")
        {
            $hasil['pesan'] ="Proses ubah data pemeliharaan jenis SPM berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah data pemeliharaan jenis SPM gagal";  
        }  

        $hasil['data'] = $data; 
        $hasil['jenis_aksi']=$jenis_aksi; 
        echo json_encode($hasil);  
    }

     public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA'); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MPemeliharaanJenisSPM->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $data['KD_JENIS_SPM']=$data['data']['KD_JENIS_SPM'];   
        $data['NM_JENIS_SPM']=$data['data']['NM_JENIS_SPM'];    
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }  
        $this->load->view('parameter/pemeliharaanJenisSPM/form',$data);
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MPemeliharaanJenisSPM->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus data pemeliharaan jenis SPM berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus data pemeliharaan jenis SPM berhasil";  
        }
        echo json_encode($hasil);
    } 
}