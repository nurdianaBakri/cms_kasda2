<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarSKPD extends CI_Controller {

    private $root_url = "Laporan/parameter/DaftarSKPD"; 
    public function __construct()
    {
        parent ::__construct();
        $this->load->library('pdf');
        $cek = $this->M_login->cek_userIsLogedIn();
        if ($cek==FALSE)
        {
            $this->session->set_flashdata('pesan',"Anda harus login jika ingin mengakses halaman lain");
            redirect('Login');
        } 
        else
        {  
            $class_menu = $this->session->userdata('class_menu');   

            $irl = $this->root_url;
            $accesable=$this->M_login->cekMenu002($irl, $class_menu);  
        }
    }  

	public function  index()
	{ 
		$data['title'] = "Daftar SKPD";
        $data['url'] = "Laporan/parameter/DaftarSKPD/";  
 
        //kd kasda 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();

        // var_dump($data); 
		$this->load->view('include/header'); 
        $this->load->view('laporan/parameter/daftarSKPD/index',$data);
		$this->load->view('include/footer'); 
	} 

    public function reload_data()
    {    
        $data = $this->get_post_data();
        $this->load->view('laporan/parameter/daftarSKPD/data',$data); 
    } 

    function print2(){

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(25,6,'Kode SKPD',1,0);
        $pdf->Cell(80,6,'Nama SKPD',1,1); 

        $pdf->SetFont('Arial','',10);


        $KD_KASDA = "00001"; 
        $cek = $this->db->query("EXEC get_daftar_skpd @Kasda ='$KD_KASDA'");
        if ($cek->num_rows()>0)
        {
            $data['laporan'] = $cek->result_array();
        }
        else
        {
            $data['laporan'] = array();
        }
        
        $no=1;
        foreach ($data['laporan'] as $row){
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(25,6,$row['kd_gabungan'],1,0);
            $pdf->Cell(80,6,$row['nama_skpd'],1,1);
        } 
        $pdf->Output();
    }

    public function get_post_data()
    { 
        $data = array();
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $cek = $this->db->query("EXEC get_daftar_skpd @Kasda ='$KD_KASDA'");
        if ($cek->num_rows()>0)
        {
            $data['laporan'] = $cek->result_array();
        }
        else
        {
            $data['laporan'] = array();
        }

        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);
        $data['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu'];
            
        return $data;
    }

    public function print()
    {   
        $data = $this->get_post_data();
        $this->load->view('laporan/transaksi/SP2D_sudah_cair/print_view',$data);  
    } 
}
