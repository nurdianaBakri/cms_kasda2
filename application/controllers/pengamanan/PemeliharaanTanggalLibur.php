<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanTanggalLibur extends CI_Controller {

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
		$data['title'] = "Pemeliharaan Tanggal Libur ";
        $data['url'] = "pengamanan/PemeliharaanTanggalLibur/";  

        //SELECT MAX  ID TANGGAL_LIBUR
        $this->db->select_max('ID');
        $data['ID_'] = $this->db->get('tgl_libur')->row_array()['ID']+1;  
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();    

		$this->load->view('include/header'); 
        $this->load->view('pengamanan/PemeliharaanTanggalLibur/index',$data);
		$this->load->view('include/footer'); 
    }    
   
 
    public function save()
    {      
        $hasil = array();  

        $data = $this->get_post_data(); 
        // $where = array('KD_KASDA' =>  $data['KD_KASDA'] );   
        // $data2 = $this->M_tanggalLibur->detail($where);   
          
        if ($data['KETERANGAN']=="")
        {
            $hasil['pesan'] ="Silahkan isi form dengan lengkap";  
        }
        else{
            $jenis_aksi = $this->input->post('jenis_aksi');     
            if($jenis_aksi=="tambah"){    
                $hasil['status'] = $this->M_tanggalLibur->save($data);  

            
                if($hasil['status']==true ){
                    $hasil['pesan'] ="Proses Tambah tanggal libur berhasil";
                }
                else if ($hasil['status']==false)
                {
                    $hasil['pesan'] ="Proses Tambah tanggal libur gagal"; 
                }
            

            }   
            else{  
                $where = array('ID' => $this->input->post('ID') );    
                $hasil['status'] = $this->M_tanggalLibur->update($where, $data); 

                if ($hasil['status']==true )
                {
                    $hasil['pesan'] ="Proses ubah tanggal libur berhasil"; 
                }
                else
                {
                    $hasil['pesan'] ="Proses ubah tanggal libur gagal";  
                }   
            }   
        }   
        echo json_encode($hasil);
    }    

    public function hapus($ID)
    {     
        $hasil = array(); 
        $where = array('ID' => $ID);
        $data = $this->M_tanggalLibur->hapus($where);  
        if ($data==true)
        {
            $hasil['pesan'] ="Proses hapus terminal berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses hapus  terminal gagal";  
        }  

        $this->db->select_max('ID');
        $hasil['ID_'] = $this->db->get('tgl_libur')->row_array()['ID']+1;  

        // $hasil['id']=32; 
        echo json_encode($hasil);
    }

    public function get_post_data()
    {  
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');  
        $data['KD_KASDA'] = $this->input->post('KD_KASDA');  
        $data['TANGGAL'] = $this->input->post('TANGGAL');  
        $data['ID'] = $this->input->post('ID');  
        return $data;
    }   

    public function reload_data()
    {     
        $data = $this->get_post_data();
 
        $where = array('KD_KASDA' => $data['KD_KASDA'] );
        $data['KD_KASDA']=$data['KD_KASDA']; 
        $data['data'] = $this->M_tanggalLibur->detail($where)->result_array();   

        $this->load->view('pengamanan/PemeliharaanTanggalLibur/data',$data);  
    }  

    public function detail()
    {
        $where = array('ID' =>  $this->input->post('ID') );   
        $data2 = $this->M_tanggalLibur->detail($where)->row_array();   
        echo json_encode($data2);  
    }
}
