<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanTerminalUser extends CI_Controller {

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
		$data['title'] = "Pemeliharaan Terminal";
        $data['url'] = "pengamanan/PemeliharaanTerminal/";  
 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();   
		$this->load->view('include/header'); 
        $this->load->view('pengamanan/pemeliharaanTerminal/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {     
        $data = $this->get_post_data();

        //get data menu
        //get menu level 1
        $where = array('KD_KASDA' => $data['KD_KASDA'] );
        $data2['data'] = $this->M_pemeliharaanTerminal->detail($where)->result_array();  
        $this->load->view('pengamanan/pemeliharaanTerminal/data',$data2);  
    } 
     
    public function get_post_data()
    {  
        $data['KD_KASDA'] = $this->input->post('KD_KASDA');  
        $data['NAMA_TERMINAL'] = $this->input->post('NAMA_TERMINAL'); 
        $data['MAC_ADDRESS'] = $this->input->post('MAC_ADDRESS'); 
        $data['IP_ADDRESS'] = $this->input->post('IP_ADDRESS'); 
        $data['STATUS'] = $this->input->post('STATUS'); 
        return $data;
    }  
 
    public function save()
    {    
        $data = $this->get_post_data(); 

        $hasil = array();  
        $jenis_aksi = ""; 

        if ($this->input->post('jenis_aksi')=="update")
        {
            # code...
            $where = array('KD_TERMINAL' =>  $this->input->post('KD_TERMINAL2') );  
            $data['KD_TERMINAL'] = $this->input->post('KD_TERMINAL'); 

            $hasil['status'] = $this->M_pemeliharaanTerminal->update($where, $data);  
            $jenis_aksi="ubah";
        }
        else
        {    
            $data['KD_TERMINAL'] = $this->input->post('KD_TERMINAL');  
            $hasil['status'] = $this->M_pemeliharaanTerminal->save($data);   
            $jenis_aksi="tambah";  
        }

        $this->db->where('KD_TERMINAL', $this->input->post('KD_TERMINAL'));
        $cek = $this->db->get('ref_terminal');
        $hasil['cek'] = $cek->num_rows();
        

         if($hasil['status']==true && $jenis_aksi=="tambah"){
             $hasil['pesan'] ="Proses Tambah terminal berhasil";
         }
         else if ($hasil['status']==false && $jenis_aksi=="tambah")
         {
             $hasil['pesan'] ="Proses Tambah  terminal gagal"; 
         }
         else if ($hasil['status']==true && $jenis_aksi=="ubah")
         {
             $hasil['pesan'] ="Proses ubah  terminal berhasil"; 
         }
         else
         {
             $hasil['pesan'] ="Proses ubah  terminal gagal";  
         } 
        echo json_encode($hasil);
    }    

    public function detail()
    {
        $where = array('KD_TERMINAL' => $this->input->post('kd_terminal') ); 
        $hasil = $this->M_pemeliharaanTerminal->detail($where); 
        echo json_encode($hasil->row_array());
    }  

    public function hapus()
    {     
        $hasil = array();

        $where = array('KD_TERMINAL' =>  $this->input->post('KD_TERMINAL')  );
        $data['data'] = $this->M_pemeliharaanTerminal->hapus($where);  
        if ($data==true)
        {
            $hasil['pesan'] ="Proses hapus terminal berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses hapus  terminal gagal";  
        }  
        echo json_encode($hasil);
    }
}
