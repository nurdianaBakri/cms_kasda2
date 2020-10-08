<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanSubUnit extends CI_Controller {

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
        /*$KD_KASDA = $this->input->post('KD_KASDA'); 
        $data['data'] = $this->MPemeliharaanUnit->getAll($KD_KASDA);*/ 
        $this->load->view('include/header');
        $this->load->view('pemeliharaan_sub_unit/index');
        $this->load->view('include/footer'); 
    } 
    
    public function reload_data()
    {  
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $data['data'] = $this->MPemeliharaanSubUnit->getAll($KD_KASDA);  
        $this->load->view('pemeliharaan_sub_unit/data', $data); 
    } 

    public function form()
    { 
        //get last KD_DATA_SUB_UNIT + 1
        $data['data']['KD_SUB_UNIT'] =""; 
        $data['data']['NM_SUB_UNIT'] = ""; 
        $data['data']['KD_UNIT'] = ""; 
        $data['data']['KD_BIDANG'] = "";  
        $data['data']['KD_DATA_SUB_UNIT'] = "";  
        $data['jenis_aksi']="add";
        $data['urusan'] = $this->MPemeliharaanUrusan->getAll();
        $data['bidang'] = $this->MPemeliharaanBidang->getAll(); 

        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $data['unit'] = $this->MPemeliharaanUnit->getAll($KD_KASDA);  

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
        $this->load->view('pemeliharaan_sub_unit/form', $data);  
    }
     public function detail($KD_DATA_SUB_UNIT=null)
    { 
        $where = array('KD_DATA_SUB_UNIT' => $KD_DATA_SUB_UNIT );
        $data=$this->MPemeliharaanSubUnit->getBy($where);  
        $data['jenis_aksi']="edit"; 
        echo json_encode($data); 
    }  

     public function hapus($KD_DATA_SUB_UNIT)
    {
        $hasil = array(); 

        $where = array('KD_DATA_SUB_UNIT' => $KD_DATA_SUB_UNIT ); 
        $hasil['status']=$this->MPemeliharaanSubUnit->hapus($where);  
    
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus data Unit berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus data Unit berhasil";  
        } 
        //masukkan data ke log
        echo json_encode($hasil);
    }

	public function  cari_kesda($kode)
	{ 
        $where = array('KD_UNIT' => $kode );
        $data=$this->MPemeliharaanSubUnit->getBy($where);   
        echo json_encode($data); 
    }  
    
    public function  save()
	{   
        $jenis_aksi = $this->input->post('jenis_aksi');   
        $data = array( 
            'KD_KASDA'=>$this->input->post('KD_KASDA'), 
            'KD_URUSAN'=>$this->input->post('KD_URUSAN'), 
            'KD_BIDANG'=>$this->input->post('KD_BIDANG'), 
            'KD_UNIT'=>$this->input->post('KD_UNIT'),  
            'KD_SUB_UNIT'=>$this->input->post('KD_SUB_UNIT'), 
            'NM_SUB_UNIT'=>$this->input->post('NM_SUB_UNIT'),  
            'USER_UPDATE' => $this->input->post('USER_UPDATE'), 
            'USER_INPUT' => $this->input->post('USER_INPUT'), 
        ); 

        // //aksi Tambah 
        $hasil = array();
        if($jenis_aksi=="add"){
            $hasil['status'] = $this->MPemeliharaanSubUnit->save($data);  
        }

        //aksi edit
        else{

            //masukkan data ke log
            $where = array('KD_DATA_SUB_UNIT' => $this->input->post('KD_DATA_SUB_UNIT') ); 

            //update
            $hasil['status'] = $this->MPemeliharaanSubUnit->update($where, $data);   
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
        // $hasil['last_query'] = $this->db->last_query();  
        echo json_encode($hasil);
	}

    public function get_bidang()
    {  
        $KD_URUSAN= $this->input->post('KD_URUSAN'); 
        $where = array(
            'KD_URUSAN' => $KD_URUSAN, 
        );
        $data['jenis_aksi']=$this->input->post('jenis_aksi');
        $data['data']['KD_BIDANG']=$this->input->post('KD_BIDANG');
        $data['bidang'] = $this->MPemeliharaanBidang->getByResult($where);
        // var_dump($data['bidang']);
        $this->load->view('pemeliharaan_sub_unit/form_data_bidang',$data);
    } 

    public function get_unit()
    {
        $KD_BIDANG= $this->input->post('KD_BIDANG');  
        $KD_URUSAN= $this->input->post('KD_URUSAN');  
        $KD_KASDA= $this->input->post('KD_KASDA');  
       
        $data['jenis_aksi']=$this->input->post('jenis_aksi');
        $data['data']['KD_UNIT']=$this->input->post('KD_UNIT');
        $data['unit'] = $this->MPemeliharaanUnit->getByResult($KD_URUSAN, $KD_BIDANG, $KD_KASDA);
        $data['last_query']=$this->db->last_query();
        $this->load->view('pemeliharaan_sub_unit/form_data_unit',$data);
        // var_dump($data['data']['KD_UNIT']);
    } 
	 
}
