<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanJamTransaksi extends CI_Controller {

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

	public function  index()
	{ 
		$data['title'] = "Pemeliharaan Jam Transaksi ";
        $data['url'] = "pengamanan/PemeliharaanJamTransaksi/";  

        //SELECT MAX  ID TANGGAL_LIBUR
        $this->db->select_max('ID');
        $data['ID_'] = $this->db->get('tgl_libur')->row_array()['ID']+1;  
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();    

		$this->load->view('include/header'); 
        $this->load->view('pengamanan/PemeliharaanJamTransaksi/index',$data);
		$this->load->view('include/footer'); 
    }    
   
 
    public function save()
    {      
        $hasil = array();   
        $data = $this->get_post_data();  
          
        if ($data['JAM_BUKA']=="" || $data['JAM_TUTUP']=="")
        {
            $hasil['pesan'] ="Silahkan isi form dengan lengkap";  
        }
        else{   
            // cek apakan kasda sudah existing
            $where = array('KD_KASDA' => $data['KD_KASDA'] );
            $this->db->where($where);
            $cek = $this->db->get('ref_jam_transaksi'); 
            // $hasil['cek']=$cek->num_rows();
            // $hasil['where']=$data['KD_KASDA'];

            if ($cek->num_rows()>0)
            {
                $where = array('KD_KASDA' => $data['KD_KASDA'] );    
                $hasil['status'] = $this->M_pemeliharaanJamTransaksi->update($where, $data); 

                if ($hasil['status']==true )
                {
                    $hasil['pesan'] ="Proses ubah jam transaksi berhasil"; 
                }
                else
                {
                    $hasil['pesan'] ="Proses ubah jam transaksi gagal";  
                }  
                // $hasil['last_query'] = $this->db->last_query();
            }
            else{ 
                $hasil['status'] = $this->M_pemeliharaanJamTransaksi->save($data);   
            
                if($hasil['status']==true ){
                    $hasil['pesan'] ="Proses Tambah jam transaksi berhasil";
                }
                else if ($hasil['status']==false)
                {
                    $hasil['pesan'] ="Proses Tambah jam transaksi gagal"; 
                } 
            }  
        }     
        echo json_encode($hasil);
    }    

    public function hapus($ID)
    {     
        $hasil = array(); 
        $where = array('ID' => $ID);
        $data = $this->M_pemeliharaanJamTransaksi->hapus($where);  
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
        $data['JAM_BUKA'] = $this->input->post('JAM_BUKA');  
        $data['JAM_TUTUP'] = $this->input->post('JAM_TUTUP');   
        $data['KD_KASDA'] = $this->input->post('KD_KASDA');   
        // $data['jenis_aksi'] = $this->input->post('jenis_aksi');   
        return $data;
    }   

    public function reload_data()
    {     
        $data = $this->get_post_data(); 
        $data['data'] = $this->M_pemeliharaanJamTransaksi->getAll();    
        $this->load->view('pengamanan/PemeliharaanJamTransaksi/data',$data);  
    }  

    public function detail()
    {
        $where = array('KD_KASDA' =>  $this->input->post('KD_KASDA') );   
        $data2 = $this->M_pemeliharaanJamTransaksi->detail($where)->row_array();   
        $data2['JAM_BUKA'] = substr($data2['JAM_BUKA'],0,8);
        $data2['JAM_TUTUP'] = substr($data2['JAM_TUTUP'],0,8);
        echo json_encode($data2);  
    }
}
