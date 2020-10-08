<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakUlang extends CI_Controller {

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
		$data['title'] = "Cetak Ulang";
        $data['url'] = "laporan/LapTrsans/CetakUlang/";    
        //kd kasda 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();
 
		$this->load->view('include/header'); 
        $this->load->view('laporan/transaksi/cetak_ulang/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {    
        $data = $this->get_post_data(); 
        if ($data['is_empty']==true)
        {
            $this->load->view('laporan/transaksi/cetak_ulang/data_is_empty',$data); 
        }
        else
        { 
            $this->load->view('laporan/transaksi/cetak_ulang/data',$data); 
        }
    }

    public function get_post_data()
    { 
        $KD_KASDA = $this->input->post('KD_KASDA');  
        $no_sp2d = $this->input->post('no_sp2d');
        $dokumen = $this->input->post('dokumen');

        $cek = $this->M_laporan_SP2D_sudah_cair->cetak_ulang($KD_KASDA, $no_sp2d);
        if ($cek->num_rows()>0)
        {
            $data['is_empty'] = false; 
            $data['laporan'] = $cek->result_array();
        }
        else
        {
            $data['is_empty'] = true;  
            $data['laporan'] = array();
        }  
        $data['last_query'] =  $this->db->last_query(); 
        $data['dokumen'] =  $dokumen; 
        $data['no_sp2d'] =  $no_sp2d; 
        $data['judul_tabel'] = "Rekap Verifikasi SP2D";  
        $data['judul_sub_tabel'] = "Rekap Verifikasi SP2D";

        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);
        $data['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu'];   
        return $data;
    }

    public function get_post_data2()
    {
        $data = $this->get_post_data();  
        echo json_encode($data);
    }

    public function print()
    {    
        //get KODE MENU 
        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);

        $data = $this->get_post_data();   
        $data['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu'];

        if ($data['dokumen']==5 || $data['dokumen']=="5")
        {
            $this->load->view('laporan/transaksi/cetak_ulang/cetak_blanko',$data);   
        }
        else{

            $this->printBukriVerifikasi($data['no_sp2d']); 
            // $this->load->view('laporan/transaksi/cetak_ulang/print_view',$data);   
        } 
    }  

    public function printBukriVerifikasi($NO_SP2D)
    {   
        $NO_SP2D_replace = str_replace("_", "/", $NO_SP2D);
        $where = array('NO_SP2D' =>$NO_SP2D_replace );

        $data['data'] = $this->M_TrxSP2D->detail($where)->row_array();   
        $data['Nilai'] = $this->terbilang($data['data']['Nilai'])." Rupiah"; 

        //get historu print 
        $KD_KASDA = $this->session->userdata('KD_KASDA');
        $where = array('KD_KASDA' => $KD_KASDA );
        $cek  = $this->M_history_print->detail($where);

        if ($cek->num_rows()<=0){ 
            //insert
            $data = array(
                'KD_KASDA' =>$KD_KASDA,
                'bukti_verifikasi' =>0,
            ); 
            $cek  = $this->M_history_print->save($data);
        }
        $n=$cek->row_array()['bukti_verifikasi'] ;  
        $data['jumlah_print'] = str_pad($n + 1, 5, 0, STR_PAD_LEFT);

        //update 
        $data2 = array(
            'KD_KASDA' =>$KD_KASDA,
            'bukti_verifikasi' =>$data['jumlah_print'],
        );
        $cek  = $this->M_history_print->update($where, $data2);  
        $this->load->view('transaksi/verifikasiSP2D/printBukriVerifikasi',$data);
    }

    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }           
        return $hasil;
    }

    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = $this->penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    } 
 

}
