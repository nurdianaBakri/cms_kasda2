<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_potongan extends CI_Controller {

     public function __construct()
    {
        parent ::__construct();
        $cek = $this->M_login->cek_userIsLogedIn();
        if ($cek==FALSE)
        { 
            $this->session->set_flashdata('pesan',"Anda harus login jika ingin mengakses halaman lain");
            redirect('Login');
        } 
    } 

    public function index()
    {  
        $data['title'] = "Pemeliharaan Rekening Potongan";
        $data['url'] = base_url()."parameterrekeningbank/Rekening_potongan/";  
        $data['map'] = $this->MPemeliharaanMap->getAll();  
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   

        $this->load->view('include/header'); 
        $this->load->view('pemeliharaan_rekening_bank/rek_potongan/index',$data);
        $this->load->view('include/footer');  
    } 
 
    
    public function ajax_add()
    {    
        $hasil = array(); 
        $jenis_aksi = $this->input->post('jenis_aksi'); 

        $this->form_validation->set_rules('NM_PEMILIK', 'Nama Pemilik Rekening', 'required');
        $this->form_validation->set_rules('NO_REK', 'Nomor rekening', 'required|numeric');
        $this->form_validation->set_rules('KD_KASDA', 'KASDA', 'required');
        $this->form_validation->set_rules('KD_MAP', 'KODE MAP', 'required'); 

        $this->form_validation->set_message('NO_REK', 'Nomor rekening harus di isi');
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
                'KD_KASDA' => $this->input->post('KD_KASDA'),
                'KD_MAP' => $this->input->post('KD_MAP'),
            );
            $check = $this->db->get('ref_rek_potongan');
            if ($check->num_rows()>0)
            {
                //beritau keppada user kalau data sudah ada 
                # code...
                $hasil['status']=false;
                $hasil['pesan'] ="Rekening ".$NO_REK." sudah ada, silahkan ubah atau masukkan data rekening lain"; 
            }
            else
            {
                $data = array(  
                    'NM_PEMILIK' => $this->input->post('NM_PEMILIK'), 
                    'USER_UPDATE' => $this->input->post('USER_UPDATE'), 
                    'USER_INPUT' => $this->input->post('USER_INPUT'), 
                    'NO_REK' => $NO_REK, 
                    'STATUS' => 1, 
                    'KD_KASDA' => $this->input->post('KD_KASDA'),
                    'KD_MAP' => $this->input->post('KD_MAP'),
                );

                // //aksi Tambah 
                if($jenis_aksi=="add"){
                    $hasil['status'] = $this->MRekeningPotongan->save($data);   
                }   
                else{
                    $where = array('KD_DATA' => $this->input->post('KD_DATA') );
                    $hasil['status'] = $this->MRekeningPotongan->update($where, $data);   
                } 

                if($hasil['status']==true && $jenis_aksi=="add"){
                    $hasil['pesan'] ="Proses Tambah Rekening Potongan berhasil";
                }
                else if ($hasil['status']==false && $jenis_aksi=="add")
                {
                    $hasil['pesan'] ="Proses Tambah Rekening Potongan gagal"; 
                }
                else if ($hasil['status']==true && $jenis_aksi=="edit")
                {
                    $hasil['pesan'] ="Proses ubah Rekening Potongan berhasil"; 
                }
                else
                {
                    $hasil['pesan'] ="Proses ubah Rekening Potongan gagal";  
                } 
            }        
        }
        echo json_encode($hasil);   
    }
 
    public function ajax_update()
    {
        $data = array(
            'KD_CAB' => $this->input->post('KD_CAB'),
            'ALAMAT_KANTOR' => $this->input->post('ALAMAT_KANTOR'),
            'URAIAN' => $this->input->post('URAIAN'),
            'KOTA' => $this->input->post('KOTA'), 
        );
        $this->MRekeningPotongan_ajax->update(array('KD_CAB' => $this->input->post('KD_CAB_OLD')), $data);
        echo json_encode(array("status" => TRUE));
    }

     public function detail()
    { 
        $KD_DATA= $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MRekeningPotongan->getBy($where); 
 
        $data['KD_DATA']=$KD_DATA;
        $data['NO_REK']=$data['data']['NO_REK']; 
        $data['NM_PEMILIK']=$data['data']['NM_PEMILIK']; 
        $data['KD_MAP']=$data['data']['KD_MAP']; 
        $data['KD_KASDA']=$data['data']['KD_KASDA']; 
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }
        
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();    
        $data['map'] = $this->MPemeliharaanMap->getAll();    
        $this->load->view('pemeliharaan_rekening_bank/rek_potongan/form',$data);
    }
 
    public function ajax_delete()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MRekeningPotongan->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus rekening potongan berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus rekening potongan berhasil";  
        }
        echo json_encode($hasil);  
    }  


private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('firstName') == '')
        {
            $data['inputerror'][] = 'firstName';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('lastName') == '')
        {
            $data['inputerror'][] = 'lastName';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('dob') == '')
        {
            $data['inputerror'][] = 'dob';
            $data['error_string'][] = 'Date of Birth is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('gender') == '')
        {
            $data['inputerror'][] = 'gender';
            $data['error_string'][] = 'Please select gender';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Addess is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    } 

    public function reload_data()
    {     
        $where = array('KD_KASDA' => $this->input->post('KD_KASDA'));

        $this->db->where($where);
        $data['data']= $this->db->get('v_refRekPotongan')->result_array();  
        $this->load->view('pemeliharaan_rekening_bank/rek_potongan/data', $data);   
    }

    public function get_form()
    {  
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();    
        $data['map'] = $this->MPemeliharaanMap->getAll();  
        $data['jenis_aksi'] ="add";
        $data['KD_DATA'] =NULL;
        $data['NO_REK']=NULL;
        $data['NM_PEMILIK']=NULL;
        $data['KD_MAP']=NULL; 
        $data['KD_KASDA']=NULL;  
        $this->load->view('pemeliharaan_rekening_bank/rek_potongan/form',$data);
    } 

    public function get_pemilik_rekening($no_rek)
    {   
        $hasil = $this->M_interface->cek_rek($no_rek); 
        echo json_encode($hasil);
    }  
}