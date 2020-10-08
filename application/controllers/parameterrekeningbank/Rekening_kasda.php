<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_kasda extends CI_Controller {

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
        $data['url'] = base_url()."parameterrekeningbank/Rekening_kasda/";    
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   

        $this->load->view('include/header'); 
		$this->load->view('pemeliharaan_rekening_bank/rek_kasda/index', $data);
        $this->load->view('include/footer');  
	} 

	public function get_form()
	{   
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();    
        $data['sumber_dana'] = $this->MRekeningSumber->getAll();  
        $data['jenis_aksi'] ="add"; 
        $data['NO_REK'] =null; 
        $data['KD_DATA'] =null; 
        $data['NM_PEMILIK'] =null; 
        $data['KD_KASDA'] =null;  
        $data['KD_SUMBER_DANA'] =null; 
        // $data['url_inquery']="parameterrekeningbank/Rekening_kasda/inquery";  
		$this->load->view('pemeliharaan_rekening_bank/rek_kasda/form',$data);
	}

	public function reload_data()
    {  
        $where = array('KD_KASDA' => $this->input->post('KD_KASDA')); 
        $this->db->where($where);
        $data['data']= $this->db->get('v_ref_rekKasda')->result_array();  
        $this->load->view('pemeliharaan_rekening_bank/rek_kasda/data', $data);   
    }

    public function get_kd_sumber_dana()
    {
        $KD_KASDA= $this->input->post('KD_KASDA'); 
        $where = array(
            'KD_KASDA' => $KD_KASDA, 
        );
        $data['jenis_aksi']=$this->input->post('jenis_aksi');
        $data['sumber_dana'] = $this->MRekeningSumber->getByResult($where); 
        $this->load->view('pemeliharaan_rekening_bank/rek_kasda/form_kd_data_sumber_dana',$data);
    }

      public function inquery()
    {
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $where = array('KD_KASDA' => $KD_KASDA );   
        $data['data'] = $this->MRekeningKasda->getByObject($where);  

        $this->load->view('pemeliharaan_rekening_bank/rek_kasda/data', $data);  
    }

    public function ajax_add()
    {    
        $hasil = array(); 
        $jenis_aksi = $this->input->post('jenis_aksi');  

        $this->form_validation->set_rules('KD_KASDA', 'Kasda', 'required|numeric');
        $this->form_validation->set_rules('KD_SUMBER_DANA', 'Kode sumber dana', 'required|numeric');   
        $this->form_validation->set_rules('NO_REK', 'Nomor rekening', 'required|numeric'); 
        $this->form_validation->set_rules('NM_PEMILIK', 'Nama pemilik');  
 
        if($this->form_validation->run() == FALSE)
        {
            $hasil['pesan'] = validation_errors(); 
        }
        else
        {  
            $NO_REK = $this->input->post('NO_REK');

            //chedk data existing
            $where = array(   
                'NO_REK' => $NO_REK,  
                'KD_KASDA' => $this->input->post('KD_KASDA', TRUE),
                'KD_SUMBER_DANA' => $this->input->post('KD_SUMBER_DANA', TRUE),
            );
            $this->db->where($where);
            $check = $this->db->get('ref_rek_kasda');
            if ($check->num_rows()>0)
            {
                //beritau keppada user kalau data sudah ada 
                # code...
                $hasil['status']=false;
                $hasil['pesan'] ="Rekening ".$NO_REK." sudah ada, silahkan ubah atau masukkan rekening lain"; 
            }
            else
            { 
                $data = array( 
                    'KD_KASDA' => $this->input->post('KD_KASDA', TRUE),
                    'KD_SUMBER_DANA' => $this->input->post('KD_SUMBER_DANA', TRUE),   
                    'NO_REK' => $this->input->post('NO_REK', TRUE), 
                    'NM_PEMILIK' => $this->input->post('NM_PEMILIK', TRUE),   
                    'STATUS' => 1, 
                );    
 
                // aksi Tambah  
                if($jenis_aksi=="add"){
                    $data['USER_INPUT'] = $this->input->post('USER_INPUT');
                    $hasil['status'] = $this->MRekeningKasda->save($data);   
                }   
                else{
                    $data['USER_UPDATE'] = $this->input->post('USER_INPUT'); 
                    $where = array('KD_DATA' => $this->input->post('KD_DATA') );
                    $hasil['status'] = $this->MRekeningKasda->update($where, $data);   
                } 

                if($hasil['status']==true && $jenis_aksi=="add"){
                    $hasil['pesan'] ="Proses Tambah Rekening Kasda berhasil";
                }
                else if ($hasil['status']==false && $jenis_aksi=="add")
                {
                    $hasil['pesan'] ="Proses Tambah Rekening Kasda gagal"; 
                }
                else if ($hasil['status']==true && $jenis_aksi=="edit")
                {
                    $hasil['pesan'] ="Proses ubah Rekening Kasda berhasil"; 
                }
                else
                {
                    $hasil['pesan'] ="Proses ubah Rekening Kasda gagal";  
                }  

                $hasil['data'] = $data;
                $hasil['jenis_aksi']=$jenis_aksi;  
            }        
        }
        echo json_encode($hasil);   
    }
 
     public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA'); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MRekeningKasda->getBy($where);   

        $data['KD_DATA']=$KD_DATA; 
        $data['KD_SUMBER_DANA']=$data['data']['KD_SUMBER_DANA'];   
        $data['NO_REK']=$data['data']['NO_REK'];      
        $data['NM_PEMILIK']=$data['data']['NM_PEMILIK'];  
        $data['KD_KASDA']=$data['data']['KD_KASDA'];  
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }  
        // $data['sumber_dana'] = $this->MRekeningSumber->getAll();   
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   
        $this->load->view('pemeliharaan_rekening_bank/rek_kasda/form',$data);
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MRekeningKasda->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus rekening kasda berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus rekening kasda berhasil";  
        }
        $hasil['KD_DATA'] = $KD_DATA;
        echo json_encode($hasil);
    }

}