<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LapVerifikasi extends CI_Controller {

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
		$data['title'] = "Rekap Verifikasi SP2D";
        $data['url'] = "laporan/LapTrsans/LapVerifikasi/";    
        //kd kasda 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();
 
		$this->load->view('include/header'); 
        $this->load->view('laporan/transaksi/verifikasi/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {    
        $data = $this->get_post_data(); 
        if ($data['is_empty']==true)
        {
            $this->load->view('laporan/transaksi/verifikasi/data_is_empty',$data); 
        }
        else
        { 
            $this->load->view('laporan/transaksi/verifikasi/data',$data); 
        } 
    }

    public function get_post_data()
    { 
        $KD_KASDA = $this->input->post('KD_KASDA'); 
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');
        $user_id = $this->input->post('user_id');

        $cek = $this->M_laporan_SP2D_sudah_cair->rekap_pemverifikasi_sp2d($KD_KASDA, $tglawal, $tglakhir, $user_id);
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
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $data['last_query'] =  $this->db->last_query(); 
        $data['judul_tabel'] = "Rekap Verifikasi SP2D";
        $data['judul_sub_tabel'] = "Periode ".$data['tglawal']." s/d ".$data['tglakhir'];

        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);
        $data['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu']; 
        return $data;
    }

    public function print()
    {      
        $data = $this->get_post_data();   
        $this->load->view('laporan/transaksi/verifikasi/print_view',$data);  
    }   
    
    function get_user_id()
    {
        $data = array(); 
        $KD_KASDA = $this->input->post('KD_KASDA'); 

        $cek = $this->M_laporan_SP2D_sudah_cair->get_user_pemverifikasi_sp2d($KD_KASDA);
        if($cek->num_rows()>0)
        {
            $data['data_is_empty'] =  false;
            $data['data'] = $cek->result(); 
        }
        else
        {
            $data['data_is_empty'] = true;
            $data['data'] = array();
        }
        $this->load->view('laporan/transaksi/verifikasi/user_pencairan',$data);  
    }

    public function generate_excel ()
    { 
        $data2 = $this->get_post_data();

        include APPPATH.'third_party/PHPExcel/PHPExcel.php';  
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel 
        $excel->getProperties()->setCreator('My Notes Code')
                        ->setLastModifiedBy('My Notes Code')
                        ->setTitle("Rekap Verifikasi SP2D")
                        ->setSubject("Siswa")
                        ->setDescription("Rekap Verifikasi SP2D")
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "Rekap Verifikasi SP2D"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3

        // NO	TANGGAL	SKPD	NO SP2D	NO SPM	JENIS	NO REKENING	PENERIMA	KETERANGAN	JUMLAH 
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "TANGGAL"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NO SP2D"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NO SPM"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "NILAI TRANSFER"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "POTONGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "PAJAK"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "NILAI SP2D"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "STATUS"); // Set kolom E3 dengan tulisan "ALAMAT"
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
       
        foreach($data2['laporan'] as $key2){   
 
            $status="";
            if ($key2['STATUS']==0)
            {
                $status= "Import";
            }
            else if ($key2['STATUS']==1)
            {
                $status= "Input";
            }
            else if ($key2['STATUS']==2)
            {
                $status= "Verifikasi";
            }
            else
            {
                $status= "Cair";
            }  

            $timestamp = strtotime($key2['tgl_verifikasi']); 
            
            // Lakukan looping pada variabel siswa 
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, date('d-m-Y', $timestamp));
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $key2['No_SP2D']);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $key2['No_SPM']);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, number_format($key2['Nilai'],2));
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, number_format($key2['TOTAL_SP2D'] - $key2['Nilai'],2));
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, "0.00");
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, number_format($key2['TOTAL_SP2D'],2)); 
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $status);  
            
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
        header('Content-Disposition: attachment; filename="LAPORAN Verifikasi SP2D.xlsx"'); 
        $objWriter->save('php://output');   
    }
}
