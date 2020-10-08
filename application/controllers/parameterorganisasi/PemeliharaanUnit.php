<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanUnit extends CI_Controller {

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
        //get data kasda 
        // $data['data'] = $this->MPemeliharaanUnit->getAll(); 
        $this->load->view('include/header');
        $this->load->view('pemeliharaan_unit/index');
        $this->load->view('include/footer'); 
    }

    public function reload_data()
    {  
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $data['data'] = $this->MPemeliharaanUnit->getAll($KD_KASDA);  
        $this->load->view('pemeliharaan_unit/data', $data); 
    }

    public function form()
    { 
        // $data['data']['KD_DATA_UNIT'] = $this->MPemeliharaanUnit->get_last($where = array());
        $data['data']['KD_DATA_UNIT'] = "";
        $data['data']['NM_UNIT'] = "";
        $data['data']['KD_UNIT'] = "";
        $data['data']['KD_BIDANG'] = "";
        $data['jenis_aksi']="add";
        $data['urusan'] = $this->MPemeliharaanUrusan->getAll();   

        if ($this->session->userdata('KD_KASDA')=="99999")
        { 
            $data['kasda'] = $this->MPemeliharaanKasda->getAll();  
        }
        else
        { 
             $data['kasda'][]  = (object) array(
                'KD_KASDA' => $this->session->userdata('KD_KASDA'), 
                'NM_KASDA' => $this->session->userdata('NM_KASDA'), 
            );
        }
        $this->load->view('pemeliharaan_unit/form', $data);  
    }

    public function detail($KD_DATA_UNIT=null)
    {
        $where = array('KD_DATA_UNIT' => $KD_DATA_UNIT );
        $data['data']=$this->MPemeliharaanUnit->getBy($where);   
        $data['jenis_aksi']="edit"; 
        echo json_encode($data); 
    }

    public function hapus($KD_DATA_UNIT)
    {
        $hasil = array(); 
        $where = array('KD_DATA_UNIT' => $KD_DATA_UNIT );
        $hasil['status']=$this->MPemeliharaanUnit->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus data Unit berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus data Unit berhasil";  
        }
        echo json_encode($hasil);
    }

	public function  cari_kesda($kode)
	{ 
        $where = array('KD_UNIT' => $kode );
        $data=$this->MPemeliharaanUnit->getBy($where);   
        echo json_encode($data); 
    }  
    
    public function  save()
	{   
        $jenis_aksi = $this->input->post('jenis_aksi'); 
         
        $data = array( 
            'KD_KASDA'=>$this->input->post('KD_KASDA'),   
            'KD_UNIT'=>$this->input->post('KD_UNIT'), 
            'NM_UNIT'=>$this->input->post('NM_UNIT'),  
            'USER_UPDATE' => $this->input->post('USER_UPDATE'), 
            'USER_INPUT' => $this->input->post('USER_INPUT'), 
            'KD_URUSAN'=>$this->input->post('KD_URUSAN'), 
            'KD_BIDANG'=>$this->input->post('KD_BIDANG'), 
        );

        // //aksi Tambah 
        $hasil = array();
        if($jenis_aksi=="add"){
            $hasil['status'] = $this->MPemeliharaanUnit->save($data);  
        }

        //aksi edit
        else{
            $where = array('KD_DATA_UNIT' => $this->input->post('KD_DATA_UNIT') );
            $hasil['status'] = $this->MPemeliharaanUnit->update($where, $data);   
        } 

        if($hasil['status']==true && $jenis_aksi=="add"){
            $hasil['pesan'] ="Proses Tambah data Unit berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="add")
        {
            $hasil['pesan'] ="Proses Tambah data Unit gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="edit")
        {
            $hasil['pesan'] ="Proses ubah data Unit berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah data Unit gagal";  
        }  

        $hasil['data'] = $data;
        $hasil['query'] = $this->db->last_query();
        // $hasil['jenis_aksi']=$jenis_aksi; 
        echo json_encode($hasil);
	}

    public function get_bidang()
    {  
        $KD_URUSAN= $this->input->post('KD_URUSAN'); 
        $where = array(
            'KD_URUSAN' => $KD_URUSAN, 
        );
        $data['jenis_aksi']=$this->input->post('jenis_aksi');
        $data['bidang'] = $this->MPemeliharaanBidang->getByResult($where);
        $this->load->view('pemeliharaan_unit/form_data_bidang',$data);
    } 

    // public function get_kode_unit()
    // {
    //     $where = array(
    //         'KD_BIDANG' => $this->input->post('KD_BIDANG'), 
    //     );
    //     $KD_UNIT = $this->MPemeliharaanUnit->get_last($where);
    //     echo json_encode($KD_UNIT);
    // } 
	 
}
