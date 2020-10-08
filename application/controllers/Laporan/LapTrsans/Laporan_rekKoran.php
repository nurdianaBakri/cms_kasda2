<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Laporan_rekKoran extends CI_Controller {

    private $root_url = "Laporan/LapTrsans/Laporan_rekKoran"; 
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
            $class_menu = $this->session->userdata('class_menu');  

            // $data = uri_string();  
            // $uri = substr($data, strpos($data, "cms_kasda") );  

            $irl = $this->root_url;
            $accesable=$this->M_login->cekMenu002($irl, $class_menu);  
        }
    }  

	public function index()
	{ 
		$data['title'] = "Laporan Rekening Koran";
		$data['url'] = "laporan/LapTrsans/Laporan_rekKoran/";  

        // var_dump($data); 
		$this->load->view('include/header'); 
        $this->load->view('laporan/transaksi/rek_koran/index',$data);
		$this->load->view('include/footer'); 
    }

    public function get_form()
    {
        //GET DATA REKENING KASDA BY KD_KASDA
        $where = array(
            'KD_KASDA' => $this->session->userdata('KD_KASDA'), 
        );
        $get_rekening = $this->M_laporan_rekKoran->get_rekening_kasda($where);
        
        if ($get_rekening->num_rows()>0)
        {
            $data['rekening'] = $get_rekening->result_array();
        }
        else
        {
            $data['rekening'] = null; 
        } 

        //kd kasda 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();
        
        $this->load->view('laporan/transaksi/rek_koran/form',$data); 
    }
    
    public function reload_data()
    {    
        $data = $this->get_post_data(); 

        if ($data['pesan']=="")
        {
            if ($data['tanggal_invalid']==true)
            { 
                $this->session->set_flashdata('pesan',"Tanggal awal tidak boleh lebih besar dari tanggal akhir");
            }  
            else if ($data['no_rek_is_null']==true)
            { 
                $this->session->set_flashdata('pesan',"Nomor rekening tidak boleh kosong");
            }
            else if($data['data']->Status==false){
                $this->session->set_flashdata('pesan',$data['data']->Message); 
            }
            else{}    
        }
        else
        {
            $this->session->set_flashdata('pesan',$data['pesan']); 
        }
           
        // var_dump($data);   
        $this->load->view('laporan/transaksi/rek_koran/data',$data);   
        // echo json_encode($data);
    }  

    public function print()
    {   
        $data = $this->get_post_data(); 

        if ($data['tanggal_invalid']==true)
        { 
            $this->session->set_flashdata('pesan',"Tanggal awal tidak boleh lebih besar dari tanggal akhir");
            $this->load->view('laporan/transaksi/rek_koran/alert');   
        }
        else if ($data['no_rek_is_null']==true)
        { 
            $this->session->set_flashdata('pesan',"Nomor rekening tidak boleh kosong");
            $this->load->view('laporan/transaksi/rek_koran/alert');   
        }
        else if($data['data']==false){
            $this->session->set_flashdata('pesan',"Data kosong");
            $this->load->view('laporan/transaksi/rek_koran/alert');
        }
        else
        { 
            $this->load->view('laporan/transaksi/rek_koran/print_view',$data);  
        }
    } 
	
	public function get_post_data()
    {  
        $no_rek = $this->input->post('no_rekening');
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir'); 

        $balikan = array(); 
        $balikan['pesan'] = "";
        $balikan['internalError'] = false;
        $balikan['xternalError'] = false;
        if ((strtotime($tglawal)) > (strtotime($tglakhir)))
        { 
            $balikan['tanggal_invalid'] = true; 
            $balikan['no_rek_is_null'] = false; 
            $balikan['data'] =  array( );  
        }
        else if($no_rek=="" || $no_rek==NULL)
        { 
            $balikan['tanggal_invalid'] = false; 
            $balikan['no_rek_is_null'] = true; 
            $balikan['data'] =  array( );  
        }
        else
        { 
            $json_status = $this->M_interface->rekening_koran($no_rek, $tglawal, $tglakhir); 
            $balikan['data'] = $json_status;
            $balikan['tanggal_invalid'] = false; 
            $balikan['no_rek_is_null'] = false;   
        }   

        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);
        $balikan['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu']; 

        if ($balikan['data']==NULL)
        {
            $balikan['internalError'] = true; 

            //jika terjadi internal server error, hubungi mas roni
            //kemungkinan ada error di code mas roni
            $balikan['pesan'] = "Internal server error";
        }
        else
        {
            if ($balikan['data']->Status==false)
            {
                if ($balikan['data']->Message=="TIDAK ADA MUTASI TRANSAKSI")
                {
                    $balikan['xternalError'] = true;  
                    $balikan['pesan'] = $balikan['data']->Message;
                }
                else
                {
                    $balikan['xternalError'] = true;  
                    $balikan['pesan'] = $balikan['data']->Message;
                } 
            }
            else{
                $balikan['xternalError'] = false;  
            } 

            /*if ($balikan['data']->rCode=="99")
            {
                $balikan['xternalError'] = true;  
                $balikan['pesan'] = $balikan['data']->Message;
            } */
        }
        return $balikan;   
    }

    public function exportToExel()
    {  
        $data = $this->get_post_data();   
        if ($data['tanggal_invalid']==true)
        { 
            $this->session->set_flashdata('pesan',"Tanggal awal tidak boleh lebih besar dari tanggal akhir");
        }  
        else if ($data['no_rek_is_null']==true)
        { 
            $this->session->set_flashdata('pesan',"Nomor rekening tidak boleh kosong");
        }
        else if($data['data']==NULL){
            $this->session->set_flashdata('pesan',"Data kosong"); 
        }
        else{}    
            $this->generate_excel($data);    

        // $data2 = $this->get_post_data();  
        // Load plugin PHPExcel nya
        // if($data2['tanggal_invalid']==true)
        // {
        //     $this->session->set_flashdata('pesan',"Tanggal awal tidak boleh lebih besar dari tanggal akhir");
        //     $this->load->view('laporan/transaksi/rek_koran/alert');   
        // }
        // else if ($data2['no_rek_is_null']==true)
        // { 
        //     $this->session->set_flashdata('pesan',"Nomor rekening tidak boleh kosong");
        //     $this->load->view('laporan/transaksi/rek_koran/alert');    
        // }
        // else if($data2['data']==false){
        //     $this->session->set_flashdata('pesan',"Data kosong");
        //     $this->load->view('laporan/transaksi/rek_koran/alert');
        // }
        // else
        // {
        //     $this->generate_excel($data2);   
        // }
    }

    public function generate_excel ($data2)
    {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';  
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel 
        $excel->getProperties()->setCreator('My Notes Code')
                        ->setLastModifiedBy('My Notes Code')
                        ->setTitle("Data Laporan Rekening Koran")
                        ->setSubject("Siswa")
                        ->setDescription("Data Laporan Rekening Koran")
                        ->setKeywords("Rekening Koran");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN REKENING KORAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3

        // NO	TANGGAL	SKPD	NO SP2D	NO SPM	JENIS	NO REKENING	PENERIMA	KETERANGAN	JUMLAH 
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "TANGGAL_TX"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "KD_CAB"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NO_REKENING"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NO_ARSIP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "KD_TX"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "KET_TX"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "JUMLAH_TRX"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "SALDO_AKHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "KD_USER"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

       
        foreach($data2['data']->Message as $key2){ 

            if (!isset($key2->TXDATE) && !isset($key2->TXID) && !isset($key2->TXCODE)  && !isset($key2->TXMSG)  && !isset($key2->DBCR)  && !isset($key2->SisaSaldo) && !isset($key2->USERID))
            {
                 
            }
            else{

                $REFFACC="";
                if (isset($key2->REFFACC))
                {
                    # code...
                    $REFFACC = $key2->REFFACC;
                } 

                // Lakukan looping pada variabel siswa
                $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $key2->TXDATE);
                $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $key2->TXBRANCH);
                $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $key2->ACCNBR);
                $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $REFFACC);
                $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $key2->TXCODE);
                $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $key2->TXMSG);
                $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $key2->TXAMT);
                $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $key2->SisaSaldo);
                $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $key2->USERID); 
                
                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
            } 
            
            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }   

        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        // $excel->getActiveSheet(0)->setTitle("Daftar SP2D Sudah Cair");
        $excel->setActiveSheetIndex(0);
        // Proses file excel 

        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean();
        // We'll be outputting an excel file
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="LAPORAN REKENING KORAN.xlsx"'); 
        $objWriter->save('php://output');  

    }

    public function getRekSumberByKdKasda($KD_KASDA)
    {
        $data['data'] = $this->M_laporan_rekKoran->getRekSumberByKdKasda($KD_KASDA);
        $this->load->view('laporan/transaksi/no_rek',$data);  
    }

    // public function cek_rekening2()
    // {  
    //     $no_rek = $this->input->get('no_rek');

    //     $this->db->where('name_api','cek_saldo');
    //     $api_url = $this->db->get('config_api')->row()->api_url; 

    //     $ceksum = strtoupper(hash('sha256', '3NTB$2019'.$no_rek));    
    //     $url = "http://199.97.20.11/cbs/index.php/Data?checksum=".$ceksum."&type=3&norekening=".$no_rek;
    //     $curl_bearer = curl_init();
    //     curl_setopt($curl_bearer, CURLOPT_URL, $url);
    //     curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($curl_bearer, CURLOPT_HTTPGET, true);
    //     curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
    //     $status = curl_exec($curl_bearer);
    //     curl_close($curl_bearer);
    //     $json_status=json_decode($status);  
    //     var_dump($json_status);
    // }

     public function test($no_rek)
    { 
        $cek_rekening =  $this->M_interface->cek_rek($no_rek);
        var_dump($cek_rekening);

        /*$this->db->where('name_api','cek_saldo');
        $api_url = $this->db->get('config_api')->row()->api_url; 

        $ceksum = strtoupper(hash('sha256', '3NTB$2019'.$no_rek));    
        $url = $api_url."index.php/Data?checksum=".$ceksum."&type=3&norekening=".$no_rek;
 
        var_dump($url);*/
    }

    public function get($no_rek)
    {
        $tglawal = "2020-07-01";
        $tglakhir = "2021-12-12";

        $this->db->where('name_api','rekening_koran2'); 
        $api_url = $this->db->get('config_api')->row()->api_url;

        $ceksum = strtoupper(hash('sha256', '4NTB$2019'.$no_rek));    
        $url =$api_url.'index.php/Data?checksum='.$ceksum.'&type=4&norekening='.$no_rek.'&startDate='.$tglawal.'&endDate='.$tglakhir.''; 

        echo ($url); 

        // $this->db->where('name_api','cek_saldo');
        // $api_url = $this->db->get('config_api')->row()->api_url; 

        // $ceksum = strtoupper(hash('sha256', '3NTB$2019'.$no_rek));    
        // $url = $api_url."index.php/Data?checksum=".$ceksum."&type=3&norekening=".$no_rek;
        // $curl_bearer = curl_init();
        // curl_setopt($curl_bearer, CURLOPT_URL, $url);
        // curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl_bearer, CURLOPT_HTTPGET, true);
        // curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
        // $status = curl_exec($curl_bearer);
        // curl_close($curl_bearer);
        // $json_status=json_decode($status);  
        // echo json_encode($json_status);
 

        //=========================================================================//
        // $this->db->where('name_api','rekening_koran2'); 
        // $api_url = $this->db->get('config_api')->row()->api_url;

        // $ceksum = strtoupper(hash('sha256', '4NTB$2019'.$no_rek));    
        // $url =$api_url.'index.php/Data?checksum='.$ceksum.'&type=4&norekening='.$no_rek.'&startDate='.$tglawal.'&endDate='.$tglakhir.'';
        // $curl_bearer = curl_init();
        // curl_setopt($curl_bearer, CURLOPT_URL, $url);
        // curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl_bearer, CURLOPT_HTTPGET, true);
        // curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
        // $status = curl_exec($curl_bearer);
        // curl_close($curl_bearer);
        // $json_status=json_decode($status);  
        // echo json_encode($json_status);
        // echo $url;
    } 
}
