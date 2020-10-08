<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aproval_rek_kasda extends CI_Controller {

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
        $data['title'] = "Approval Rekening Kasda";
        $data['url'] = base_url()."parameter/Aproval_rek_kasda/";
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   

        $this->load->view('include/header'); 
        $this->load->view('parameter/Aproval_rek_kasda/index',$data);
        $this->load->view('include/footer');  
    } 

    public function get_form()
    {    
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   
        $data['sumber_dana'] = $this->MRekeningSumber->getAll();  
        $data['jenis_aksi'] ="add"; 
        $data['NO_REK'] =null; 
        $data['KD_KASDA'] =null; 
        $data['STATUS'] =null; 
        $data['KD_DATA'] =null; 
        $data['NM_PEMILIK'] =null; 
        $data['url_inquery']="parameter/Aproval_rek_kasda/inquery"; 
        $this->load->view('parameter/Aproval_rek_kasda/form',$data);
    }

    public function reload_data()
    {   
        $where = array('KD_KASDA' => $this->input->post('KD_KASDA')); 
        $this->db->where($where);  
        $data['data'] = $this->db->get('v_ref_approval_rek_kasda')->result_array(); 
        
        $this->load->view('parameter/aproval_rek_kasda/data', $data); 
    }  

   /* public function inquery($KD_KASDA=NULL)
    {
      $this->reload_data();
    }*/

      public function save()
    {   
         $jenis_aksi = $this->input->post('jenis_aksi'); 
        $data = array( 
            'KD_KASDA' => $this->input->post('KD_KASDA'),
            'KD_SUMBER_DANA' => $this->input->post('KD_SUMBER_DANA'), 
            'USER_UPDATE' => $this->input->post('USER_UPDATE'), 
            'USER_INPUT' => $this->input->post('USER_INPUT'), 
            'KD_CAB' => $this->input->post('KD_CAB'), 
            'NO_REK' => $this->input->post('NO_REK'), 
            'NM_PEMILIK' => $this->input->post('NM_PEMILIK'), 
            'STATUS' => $this->input->post('STATUS'), 
        );   
        // aksi Tambah 
        $hasil = array();
        if($jenis_aksi=="add"){
            $hasil['status'] = $this->MAproval_rek_kasda->save($data);   
        }   
        else{
            $where = array('KD_DATA' => $this->input->post('KD_DATA') );
            $hasil['status'] = $this->MAproval_rek_kasda->update($where, $data);   
        } 

        if($hasil['status']==true && $jenis_aksi=="add"){
            $hasil['pesan'] ="Proses Tambah data approval rekening kasda berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="add")
        {
            $hasil['pesan'] ="Proses Tambah data approval rekening kasda gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="edit")
        {
            $hasil['pesan'] ="Proses ubah data approval rekening kasda berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah data approval rekening kasda gagal";  
        }  

        $hasil['data'] = $data; 
        $hasil['jenis_aksi']=$jenis_aksi; 
        echo json_encode($hasil);  
    }

     public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA'); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MAproval_rek_kasda->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $data['KD_SUMBER_DANA']=$data['data']['KD_SUMBER_DANA'];  
        $data['KD_CAB']=$data['data']['KD_CAB'];  
        $data['NO_REK']=$data['data']['NO_REK'];  
        $data['KD_CAB']=$data['data']['KD_CAB'];  
        $data['STATUS']=$data['data']['STATUS'];  
        $data['NM_PEMILIK']=$data['data']['NM_PEMILIK'];  
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        } 
        // var_dump($data);
        $data['cabang'] = $this->MPemeliharaanCabang->getAll();  
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();  
        $data['url_inquery']="parameter/Aproval_rek_kasda/inquery"; 
        $this->load->view('parameter/aproval_rek_kasda/form',$data);
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MAproval_rek_kasda->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus data approval rekening kasda berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus data approval rekening kasda berhasil";  
        }
        echo json_encode($hasil);
    }

}