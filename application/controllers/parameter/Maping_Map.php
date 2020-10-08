<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maping_Map extends CI_Controller {

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
        $data['title'] = "Mapping Map";
        $data['url'] = base_url()."/parameter/Maping_Map/";
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();  

        $this->load->view('include/header'); 
		$this->load->view('parameter/mapping_map/index',$data);
        $this->load->view('include/footer');  
	} 

	public function get_form()
	{   
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();  
        $data['map'] = $this->MPemeliharaanMap->getAll();  
        $data['jenis_aksi'] ="add"; 
        $data['KD_MAP'] =null; 
        $data['KD_DATA'] =null; 
        $data['KD_MAP_SIMDA'] =null; 
        $data['url_inquery']="parameter/Maping_Map/inquery"; 
		$this->load->view('parameter/mapping_map/form',$data);
	}

	public function reload_data()
    {   
        $KD_KASDA = $this->input->post('KD_KASDA', TRUE);  
        $where = array('KD_KASDA' => $KD_KASDA );  

        $data['data'] = $this->MMapping_Map->getBywhere($where);  
        $this->load->view('parameter/mapping_map/data', $data); 
    }  

    public function inquery()
    {
        $KD_KASDA = $this->input->post('KD_KASDA', TRUE); 
        $where = array('KD_KASDA' => $KD_KASDA );   
        $data['data'] = $this->MMapping_Map->getByObject($where);  

        $this->load->view('parameter/mapping_map/data', $data);  
    }

      public function ajax_add()
    {   
        $jenis_aksi = $this->input->post('jenis_aksi', TRUE); 
        $data = array( 
            'KD_KASDA' => $this->input->post('KD_KASDA', TRUE), 
            'KD_MAP_SIMDA' => $this->input->post('KD_MAP_SIMDA', TRUE), 
            'KD_MAP' => $this->input->post('KD_MAP', TRUE),  
            'USER_UPDATE' => $this->input->post('USER_UPDATE', TRUE), 
            'USER_INPUT' => $this->input->post('USER_INPUT', TRUE),  
        );   

        // aksi Tambah 
        $hasil = array();
        if($jenis_aksi=="add"){
            $hasil['status'] = $this->MMapping_Map->save($data);   
        }   
        else{
            $where = array('KD_DATA' => $this->input->post('KD_DATA', TRUE) );
            $hasil['status'] = $this->MMapping_Map->update($where, $data);   
        } 

        if($hasil['status']==true && $jenis_aksi=="add"){
            $hasil['pesan'] ="Proses Tambah Mapping Map berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="add")
        {
            $hasil['pesan'] ="Proses Tambah Mapping Map gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="edit")
        {
            $hasil['pesan'] ="Proses ubah Mapping Map berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah Mapping Map gagal";  
        }  

        $hasil['data'] = $data; 
        $hasil['jenis_aksi']=$jenis_aksi; 
        echo json_encode($hasil);  
    }

     public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA', TRUE); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MMapping_Map->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $data['KD_MAP']=$data['data']['KD_MAP'];   
        $data['KD_MAP_SIMDA']=$data['data']['KD_MAP_SIMDA'];  
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        } 
        $data['map'] = $this->MPemeliharaanMap->getAll();   
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();  
        $data['url_inquery']="parameter/Maping_Map/inquery"; 
        $this->load->view('parameter/mapping_map/form',$data);
    }

    public function get_mapping_map_by_kd_kasda($KD_KASDA)
    { 
        $where = array('KD_KASDA' => $KD_KASDA );
        $data['data']=$this->MMapping_Map->getResult($where); 
        $this->load->view('parameter/mapping_map/data', $data); 
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA', TRUE);
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MMapping_Map->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus data Mapping Map berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus data Mapping Map berhasil";  
        }
        echo json_encode($hasil);
    }

}