<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeliharaan_akses_rek_koran extends CI_Controller {

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
        $data['title'] = "Pemeliharaan Akses Rek Koran";
        $data['url'] = base_url()."parameter/Pemeliharaan_akses_rek_koran/";
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   
        
        $this->load->view('include/header'); 
		$this->load->view('parameter/pem_akses_rek_koran/index',$data);
        $this->load->view('include/footer');  
	} 

	public function get_form($KD_KASDA=null)
	{    
        if ($KD_KASDA==null)
        {
            $KD_KASDA='99999';
        }
        else
        {
            $KD_KASDA=$KD_KASDA;
        }

        $data['jenis_aksi'] ="add"; 
        $data['KD_KASDA'] =$KD_KASDA; 
        $data['KD_DATA'] =null; 
        $data['KD_USER'] =null; 
        $data['JENIS_REK'] =null;  
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();   
        $data['user'] = $this->MUserSystem->getResult( array('KD_KASDA' => $KD_KASDA ));   
        $data['url_inquery']="parameter/Pemeliharaan_akses_rek_koran/inquery"; 
		$this->load->view('parameter/pem_akses_rek_koran/form',$data);
	}  
    

    public function get_user()
    {
        $KD_KASDA = $this->input->post('KD_KASDA');
        $data['jenis_aksi'] = $this->input->post('jenis_aksi');
        $data['user'] = $this->MUserSystem->getResult( array('KD_KASDA' => $KD_KASDA ));   
        $this->load->view('parameter/pem_akses_rek_koran/form_user',$data);
    }

	public function reload_data()
    { 
        $KD_USER = $this->input->post('KD_USER');  
        $KD_KASDA = $this->input->post('KD_KASDA');  
        $where = array('KD_KASDA' => $KD_KASDA );  
        $data['data'] = $this->MPemeliharaanAksesRekKoran->getByResult($where, $KD_USER);   
        $this->load->view('parameter/pem_akses_rek_koran/data', $data);  
    }  

    public function inquery()
    {    
        $data['data'] = $this->MPemeliharaanAksesRekKoran->getAll();   
        $this->load->view('parameter/pem_akses_rek_koran/data', $data);  
    }

    public function save()
    {   
        $hasil = array();
        $ADMIN_REK = $this->input->post('KD_USER'); 
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $data = array(   
            'ADMIN_REK'=>$ADMIN_REK, 
            'KD_KASDA'=>$KD_KASDA, 
        );   
        $NO_REKENING  = $this->input->post('NO_REKENING'); 

        //cek data pemeliharaan akses rekening koran  
        $where = array(
            // 'KD_KASDA' => $KD_KASDA,
            'ADMIN_REK' => $ADMIN_REK,
        );
        $this->db->where($where);
        $hsl= $this->db->get("ref_pemeliharaan_akses_rek_koran");

        if ($hsl->num_rows()>0)
        {
            //hapus data sebelumnya 
            $hasil['status'] = $this->MPemeliharaanAksesRekKoran->hapus($where);  
        }  


        foreach ($NO_REKENING as $key) { 
            if ($key!="on")
            { 
                $data['NO_REK'] = $key;

                
                $data['USER_INPUT'] =$this->input->post('USER_INPUT');   
                $hasil['status'] = $this->MPemeliharaanAksesRekKoran->save($data);   
            } 
        }  

        if($hasil['status']==true){
            $hasil['pesan'] ="Proses update atau tambah data pemeliharaan rekening korang berhasil";
        } 
        else
        {
            $hasil['pesan'] ="Proses update atau tambah data pemeliharaan rekening korang gagal, silahkan coba lagi";  
        }   
        echo json_encode($hasil);    
    }

     public function detail()
    { 
        $KD_DATA = $this->input->post('KD_DATA'); 
        $where = array('KD_DATA' => $KD_DATA );
        $data['data']=$this->MPotongan_transaksi->getBy($where);   
        $data['KD_DATA']=$KD_DATA; 
        $KD_KASDA=null;     
        $data['BATAS_ATAS']=$data['data']['BATAS_ATAS'];   
        $data['BATAS_BAWAH']=$data['data']['BATAS_BAWAH'];   
        $data['POTONGAN']=$data['data']['POTONGAN'];     
        if ($KD_DATA==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }  
        $data['url_inquery']="parameter/Pemeliharaan_akses_rek_koran/inquery"; 
        $this->load->view('parameter/pem_akses_rek_koran/form',$data);
    }

     public function hapus()
    {
        $hasil = array(); 
        $KD_DATA = $this->input->post('KD_DATA');
        $where = array('KD_DATA' => $KD_DATA );
        $hasil['status']=$this->MPotongan_transaksi->hapus($where);    
        
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus konfigurasi KASDA berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus konfigurasi KASDA berhasil";  
        }
        echo json_encode($hasil);
    }

}