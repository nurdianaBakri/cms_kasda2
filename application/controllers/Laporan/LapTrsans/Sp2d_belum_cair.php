<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sp2d_belum_cair extends CI_Controller {

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
		$data['title'] = "Daftar SP2D belum Cair";
        $data['url'] = "laporan/LapTrsans/Sp2d_belum_cair/";   

     
        // var_dump($data); 
		$this->load->view('include/header'); 
        $this->load->view('laporan/transaksi/SP2D_belum_cair/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {    
        $data = $this->get_post_data();
        $this->load->view('laporan/transaksi/SP2D_belum_cair/data',$data); 
    }

       public function get_form()
    {
         //get jenis spm 
        $data['kd_spm']=$this->MPemeliharaanJenisSPM->getAll();
        //kd kasda 
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda(); 
        
        $this->load->view('laporan/transaksi/SP2D_belum_cair/form',$data); 
    } 

    public function get_post_data()
    { 
        $KD_KASDA = $this->input->post('KD_KASDA');
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');
        $jenis_spm = $this->input->post('jenis_spm');
        $jenis_rek = $this->input->post('jenis_rek'); 
        $cek = $this->M_laporan_SP2D_sudah_cair->get_laporan_belum_cair($tglawal, $tglakhir, $KD_KASDA, $jenis_spm);
        if ($cek->num_rows()>0)
        {
            $data['laporan'] = $cek->result_array();
        }
        else
        {
            $data['laporan'] = array();
        } 
        $data['last_query'] =  $this->db->last_query();
        $data['periode'] = $tglawal." s/d ".$tglakhir;

        $class_name = $this->router->fetch_class(); 
        $this->db->like('class_name', $class_name);
        $data['id_menu'] = $this->db->get('ref_menu')->row_array()['id_menu']; 
          
        return $data;
    }

    public function print()
    {   
        $data = $this->get_post_data();
        $this->load->view('laporan/transaksi/SP2D_belum_cair/print_view',$data);  
    }

    public function export()
    {  
        $data2 = $this->get_post_data();  
        // var_dump($data2);

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel 
        $excel->getProperties()->setCreator('My Notes Code')
                        ->setLastModifiedBy('My Notes Code')
                        ->setTitle("Data Siswa")
                        ->setSubject("Siswa")
                        ->setDescription("Laporan Semua Data Siswa")
                        ->setKeywords("Data Siswa");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN SP2D YANG SUDAH CAIR (Periode : ".$data2['periode'].")"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3

        // NO	TANGGAL	SKPD	NO SP2D	NO SPM	JENIS	NO REKENING	PENERIMA	KETERANGAN	JUMLAH

        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "TANGGAL"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "SKPD"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NO SPM"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "JENIS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "NO REKENING"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "PENERIMA"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "JUMLAH"); // Set kolom E3 dengan tulisan "ALAMAT"
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
 
        foreach($data2['laporan'] as $data){ // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['TglCair']);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['Kd_Urusan'].".".$data['Kd_Bidang'].".".$data['Kd_Unit'].".".$data['Kd_Sub']);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['No_SPM']);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['Jn_SPM']);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['Rek_Penerima']);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['Nm_Penerima']);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['Keterangan']);
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, number_format($data['TOTAL_SP2D']));
            
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
        $excel->getActiveSheet(0)->setTitle("Daftar SP2D Sudah Cair");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
        // header('Content-Disposition: attachment; filename="LaporanSP2DyangSudahCair.xlsx"'); // Set nama file excel nya
        // header('Cache-Control: max-age=0');
        // $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');

        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean();
        // We'll be outputting an excel file
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="DaftarSP2DSudahCair.xlsx"');
        $objWriter->save('php://output'); 
        
    }

    public function tes_dom_pdf()
    {
        $data['users']=array(
            array('firstname'=>'Agung','lastname'=>'Setiawan','email'=>'ag@setiawan.com'),
            array('firstname'=>'Hauril','lastname'=>'Maulida Nisfar','email'=>'hm@setiawan.com'),
            array('firstname'=>'Akhtar','lastname'=>'Setiawan','email'=>'akh@setiawan.com'),
            array('firstname'=>'Gitarja','lastname'=>'Setiawan','email'=>'git@setiawan.com')
        );   
       /* $html = $this->load->view('laporan/transaksi/SP2D_belum_cair/tes_dom_pdf', $data, true);
        
        $this->pdfgenerator->generate($html,'contoh');*/

        // $data['surat']=$this->M_nasabah->cetak($ktp);
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_.pdf";
        $this->pdf->load_view('laporan/transaksi/SP2D_belum_cair/tes_dom_pdf', $data);
        
    }
}
