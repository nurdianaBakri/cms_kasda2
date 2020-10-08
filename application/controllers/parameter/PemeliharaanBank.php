<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanBank extends CI_Controller {

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
        $data['title'] = "Pemeliharaan Bank";
        $data['url'] = base_url()."parameter/PemeliharaanBank/";
        $this->load->view('include/header'); 
        $this->load->view('parameter/PemeliharaanBank/index',$data);
        $this->load->view('include/footer');  
    } 

    public function get_form()
    {     
        $data['jenis_aksi'] ="add"; 
        $data['KD_BANK'] =null; 
        $data['NM_BANK'] =null;  
        $data['KD_DATA'] =null;   
        $this->load->view('parameter/PemeliharaanBank/form',$data);
    }

     public function reload_data()
    { 
        $data_balikan['data']= array();
        $data['data']= $this->MPemeliharaanBank->getAll();  
        $this->load->view('parameter/pemeliharaanBank/data', $data); 
    }  

    public function inquery($KD_KASDA=NULL)
    {
      $this->reload_data();
    }


    public function ajax_add()
    {
        $hasil = array();
        $jenis_aksi = $this->input->post('jenis_aksi'); 

        $this->form_validation->set_rules('KD_BANK', 'Kode Bnak', 'required|numeric');
        $this->form_validation->set_rules('NM_BANK', 'Nama Bank', 'required');  
 
        if($this->form_validation->run() == FALSE)
        {
            $hasil['status']=false;
            $hasil['pesan'] = validation_errors(); 
        }
        else
        {  
            $data = array( 
                'KD_BANK' => $this->input->post('KD_BANK', TRUE), 
                'NM_BANK' => $this->input->post('NM_BANK', TRUE), 
                'USER_INPUT' => $this->input->post('USER_INPUT', TRUE), 
                'USER_UPDATE' => $this->input->post('USER_UPDATE', TRUE),  
            );   

            // aksi Tambah 
            $hasil = array();
            if($jenis_aksi=="add"){
                $hasil['status'] = $this->MPemeliharaanBank->save($data);   
            }   
            else{
                $where = array('KD_DATA' => $this->input->post('KD_DATA') );
                $hasil['status'] = $this->MPemeliharaanBank->update($where, $data);   
            } 

            if($hasil['status']==true && $jenis_aksi=="add"){
                $hasil['pesan'] ="Proses Tambah data pemeliharaan Bank berhasil";
            }
            else if ($hasil['status']==false && $jenis_aksi=="add")
            {
                $hasil['pesan'] ="Proses Tambah data pemeliharaan Bank gagal"; 
            }
            else if ($hasil['status']==true && $jenis_aksi=="edit")
            {
                $hasil['pesan'] ="Proses ubah data pemeliharaan Bank berhasil"; 
            }
            else
            {
                $hasil['pesan'] ="Proses ubah data pemeliharaan Bank gagal";  
            }  

            $hasil['data'] = $data; 
            $hasil['jenis_aksi']=$jenis_aksi; 
        } 
        echo json_encode($hasil);  
    }
 
     public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA'); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MPemeliharaanBank->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $data['KD_BANK']=$data['data']['KD_BANK'];   
        $data['NM_BANK']=$data['data']['NM_BANK'];    
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }  
        $this->load->view('parameter/pemeliharaanBank/form',$data);
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MPemeliharaanBank->hapus($where);    
        
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