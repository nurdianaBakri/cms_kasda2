<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_sumber extends CI_Controller {

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
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   
        $data['url'] = base_url()."parameterrekeningbank/Rekening_sumber/";  

        $this->load->view('include/header'); 
		$this->load->view('pemeliharaan_rekening_bank/rek_sumber/index', $data);
        $this->load->view('include/footer');  
	} 

	public function get_form()
	{  
		$data['jenis_aksi'] ="add";
        $data['KD_DATA'] =NULL; 
        $data['KD_SUMBER_DANA']=NULL;
        $data['NM_SUMBER_DANA']=NULL;
        $data['KD_KASDA']=NULL; 
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   
        $data['rek_sumber'] = $this->MPemeliharaanKasda->getAll();   
		$this->load->view('pemeliharaan_rekening_bank/rek_sumber/form',$data);
	}
 

    public function reload_data()
    {
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $data = array('KD_KASDA' => $KD_KASDA );   
        $data['data'] = $this->MRekeningSumber->resultArray($data);  
        $this->load->view('pemeliharaan_rekening_bank/rek_sumber/data', $data);  
    }  

     public function save()
    {   
        $jenis_aksi = $this->input->post('jenis_aksi');  
 
        $this->form_validation->set_rules('KD_SUMBER_DANA', 'Kode Sumber dana', 'required|numeric');
        $this->form_validation->set_rules('KD_KASDA', 'KASDA', 'required');
        $this->form_validation->set_rules('NM_SUMBER_DANA', 'Nama sumber dana', 'required'); 
 
        if($this->form_validation->run() == FALSE)
        {
            $hasil['pesan'] = validation_errors(); 
        }
        else
        { 
             $data = array( 
                'KD_KASDA' => $this->input->post('KD_KASDA'),
                'NM_SUMBER_DANA' => $this->input->post('NM_SUMBER_DANA'), 
                'USER_UPDATE' => $this->input->post('USER_UPDATE'), 
                'USER_INPUT' => $this->input->post('USER_INPUT'), 
                'KD_SUMBER_DANA' => $this->input->post('KD_SUMBER_DANA'), 
            );

            // //aksi Tambah 
            $hasil = array();
            if($jenis_aksi=="add"){
                $hasil['status'] = $this->MRekeningSumber->save($data);   
            }   
            else{
                $where = array('KD_DATA' => $this->input->post('KD_DATA') );
                $hasil['status'] = $this->MRekeningSumber->update($where, $data);   
            } 

            if($hasil['status']==true && $jenis_aksi=="add"){
                $hasil['pesan'] ="Proses Tambah Rekening Sumber berhasil";
            }
            else if ($hasil['status']==false && $jenis_aksi=="add")
            {
                $hasil['pesan'] ="Proses Tambah Rekening Sumber gagal"; 
            }
            else if ($hasil['status']==true && $jenis_aksi=="edit")
            {
                $hasil['pesan'] ="Proses ubah Rekening Sumber berhasil"; 
            }
            else
            {
                $hasil['pesan'] ="Proses ubah Rekening Sumber gagal";  
            }  

            $hasil['data'] = $data;
            $hasil['jenis_aksi']=$jenis_aksi; 
        } 
        echo json_encode($hasil);  
    }

     public function detail($KD_DATA=null)
    { 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MRekeningSumber->getBy($where);   
        $data['KD_DATA']=$KD_DATA;
        $data['KD_SUMBER_DANA']=$data['data']['KD_SUMBER_DANA']; 
        $data['KD_KASDA']=$data['data']['KD_KASDA']; 
        $data['NM_SUMBER_DANA']=$data['data']['NM_SUMBER_DANA']; 
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        } 
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   
        $this->load->view('pemeliharaan_rekening_bank/rek_sumber/form',$data);
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MRekeningSumber->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus rekening sumber berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus rekening sumber berhasil";  
        }
        echo json_encode($hasil);
    }

}