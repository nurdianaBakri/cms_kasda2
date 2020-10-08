<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_skpd extends CI_Controller {

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
        $data['title'] = "Pemeliharaan Rekening SKPD";
        $data['url'] = base_url()."parameterrekeningbank/Rekening_skpd/";  
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   

        $this->load->view('include/header'); 
		$this->load->view('parameter/rekeningSkpd/index',$data);
        $this->load->view('include/footer');  
	} 

	public function get_form()
	{   
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   
        $data['skpd'] = $this->db->get('v_data_skpd')->result_array();   
        
        $data['jenis_aksi'] ="add"; 
        $data['NO_REK'] =null; 
        $data['KD_DATA'] =null; 
        $data['NM_PEMILIK'] =null;  
        $data['KD_KASDA'] =null;   
        $data['KD_SKPD'] =null;   
        $data['STATUS'] =0;   
		$this->load->view('parameter/rekeningSkpd/formPemeliharaaanRekSkpd',$data);
	}

	public function reload_data()
    { 
        $where = array('KD_KASDA' => $this->input->post('KD_KASDA')); 
        $this->db->where($where);
        $data['data']= $this->db->get('v_ref_rekSKPD')->result_array(); 

        $this->load->view('parameter/rekeningSkpd/data', $data); 
    } 

    public function get_kd_sumber_dana()
    {
        $KD_KASDA= $this->input->post('KD_KASDA'); 
        $where = array(
            'KD_KASDA' => $KD_KASDA, 
        );
        $data['jenis_aksi']=$this->input->post('jenis_aksi');
        $data['sumber_dana'] = $this->MRekeningSumber->getByResult($where); 
        $this->load->view('parameter/rekeningSkpd/form_kd_data_sumber_dana',$data);
    }

    public function get_skpd()
    {
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $where = array('KD_KASDA' => $KD_KASDA );   
        $data['data'] = $this->MRekeningSkpd->getByObject($where);  
        $this->load->view('parameter/rekeningSkpd/data', $data);  
    }

    public function ajax_add()
    {   
        $hasil = array();
        $jenis_aksi = $this->input->post('jenis_aksi'); 

        $this->form_validation->set_rules('KD_KASDA', 'Kasda', 'required|numeric');
        $this->form_validation->set_rules('KD_SKPD', 'Kode SKPD', 'required');   
        $this->form_validation->set_rules('NO_REK', 'Nomor rekening', 'required|numeric'); 
        $this->form_validation->set_rules('NM_PEMILIK', 'Nama pemilik');  
 
        if($this->form_validation->run() == FALSE)
        {
            $hasil['status']=false;
            $hasil['pesan'] = validation_errors(); 
        }
        else
        {  
            $data = array( 
                'KD_KASDA' => $this->input->post('KD_KASDA', TRUE), 
                'KD_SKPD' => $this->input->post('KD_SKPD', TRUE),  
                'NO_REK' => $this->input->post('NO_REK', TRUE), 
                'NM_PEMILIK' => $this->input->post('NM_PEMILIK', TRUE), 
                'USER_UPDATE' => $this->input->post('USER_UPDATE', TRUE), 
                'USER_INPUT' => $this->input->post('USER_INPUT', TRUE), 
                'STATUS' => $this->input->post('STATUS', TRUE), 
            );   

            // aksi Tambah 
            $hasil = array();
            if($jenis_aksi=="add"){
                $hasil['status'] = $this->MRekeningSkpd->save($data);   
            }   
            else{
                $where = array('KD_DATA' => $this->input->post('KD_DATA') );
                $hasil['status'] = $this->MRekeningSkpd->update($where, $data);   
            } 

            if($hasil['status']==true && $jenis_aksi=="add"){
                $hasil['pesan'] ="Proses Tambah Rekening SKPD berhasil";
            }
            else if ($hasil['status']==false && $jenis_aksi=="add")
            {
                $hasil['pesan'] ="Proses Tambah Rekening SKPD gagal"; 
            }
            else if ($hasil['status']==true && $jenis_aksi=="edit")
            {
                $hasil['pesan'] ="Proses ubah Rekening SKPD berhasil"; 
            }
            else
            {
                $hasil['pesan'] ="Proses ubah Rekening SKPD gagal";  
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
        $data['data']=$this->MRekeningSkpd->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $data['STATUS']=$data['data']['STATUS'];   
        $data['KD_SKPD']=$data['data']['KD_SKPD'];   
        $data['NO_REK']=$data['data']['NO_REK'];  
        $data['KD_KASDA']=$data['data']['KD_KASDA'];   
        $data['NM_PEMILIK']=$data['data']['NM_PEMILIK'];  
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }  
        $data['skpd'] = $this->db->get('v_data_skpd')->result_array();  

        $data['cabang'] = $this->MPemeliharaanCabang->getAll();  
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   
        $this->load->view('parameter/rekeningSkpd/formPemeliharaaanRekSkpd',$data);
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MRekeningSkpd->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus rekening SKPD berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus rekening SKPD berhasil";  
        }
        echo json_encode($hasil);
    }

}