<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanMAP extends CI_Controller {

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

    public function index()
    {  
        $data['title'] = "Pemeliharaan MAP";
        $data['url'] = base_url()."parameter/PemeliharaanMAP/";
        $this->load->view('include/header'); 
        $this->load->view('parameter/PemeliharaanMAP/index',$data);
        $this->load->view('include/footer');  
    } 

    public function get_form()
    {     
        $data['jenis_aksi'] ="add"; 
        $data['KD_MAP'] =null; 
        $data['URAIAN'] =null;  
        $data['KD_DATA'] =null;  
        $this->load->view('parameter/PemeliharaanMAP/form',$data);
    }

     public function reload_data()
    { 
        $data_balikan['data']= array();
        $data['data']= $this->MPemeliharaanMap->getAll();  
        $this->load->view('parameter/pemeliharaanMap/data', $data); 
    }  

    public function inquery($KD_KASDA=NULL)
    {
      $this->reload_data();
    }

      public function ajax_add()
    {   
        $jenis_aksi = $this->input->post('jenis_aksi'); 
        $data = array( 
            'KD_MAP' => $this->input->post('KD_MAP'), 
            'URAIAN' => $this->input->post('URAIAN'), 
            'USER_INPUT' => $this->input->post('USER_INPUT'), 
            'USER_UPDATE' => $this->input->post('USER_UPDATE'),  
        );   

        // aksi Tambah 
        $hasil = array();
        if($jenis_aksi=="add"){
            $hasil['status'] = $this->MPemeliharaanMap->save($data);   
        }   
        else{
            $where = array('KD_DATA' => $this->input->post('KD_DATA') );
            $hasil['status'] = $this->MPemeliharaanMap->update($where, $data);   
        } 

        if($hasil['status']==true && $jenis_aksi=="add"){
            $hasil['pesan'] ="Proses Tambah data pemeliharaan MAP berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="add")
        {
            $hasil['pesan'] ="Proses Tambah data pemeliharaan MAP gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="edit")
        {
            $hasil['pesan'] ="Proses ubah data pemeliharaan MAP berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah data pemeliharaan MAP gagal";  
        }  

        $hasil['data'] = $data; 
        $hasil['jenis_aksi']=$jenis_aksi; 
        echo json_encode($hasil);  
    }

     public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA'); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MPemeliharaanMap->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $data['KD_MAP']=$data['data']['KD_MAP'];   
        $data['URAIAN']=$data['data']['URAIAN'];    
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        } 
 
        $data['url_inquery']="parameter/PemeliharaanMAP/inquery"; 

        // var_dump($data);
        $this->load->view('parameter/pemeliharaanMap/form',$data);
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MPemeliharaanMap->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus data pemeliharaan Rekening berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus data pemeliharaan Rekening berhasil";  
        }
        echo json_encode($hasil);
    }

}