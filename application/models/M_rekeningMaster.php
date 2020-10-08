
<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class M_rekeningMaster extends CI_Model{ 

    public function RekKoran()
    {
    //     $nasabah = $this->db->query('select a.*, b.deskripsi from tb_nasabah a, ref_rekening b where a.type_rek=b.kode and a.is_aktif="1"')->result();
    //     $firstdate = date("Y-m-d", strtotime("first day of previous month"));
    //     $lastdate = date("Y-m-d", strtotime("last day of previous month"));
    //     $periode = $firstdate.' s.d '.$lastdate;
    //     $periodeBln = date("F Y", strtotime("first day of previous month"));
    //     if (!empty($nasabah)) {
    //         foreach ($nasabah as $key) {				
    //             $ceksum = strtoupper(hash('sha256', '4NTB$2019'.$key->norek));
    //             $get = 'checksum='.$ceksum.'&type=4&norekening='.$key->norek.'&startDate='.$firstdate.'&endDate='.$lastdate;
    //             $data['nasabah']=$key;
    //             $data['periode']=$periode;
    //             $data['periodeBln']=$periodeBln;
    //             $passlengt= strlen($key->norek);
    //             $password = substr($key->norek, $passlengt-6);
    //             $get_data = $this->callAPI('GET', "199.97.20.11/mbanking/index.php/Data?".$get, false);
    //             $response = json_decode($get_data, false);
    //             $data['rekkoran']= $response->Message->result;
    //             $data['saldoawal']=$response->Message->saldoAwal;
    //             $data['saldoakhir']=$response->Message->saldoAkhir;
    //             $this->load->library('Pdfgenerator');
    //             $html = $this->load->view('laporan', $data, true);
    //             $key->nama=str_replace(' ', '', $key->nama) ;
    //             $filename = $key->nama.date('d-m-y').'.pdf';
    //             $file = $this->pdfgenerator->generate($html, false, 'A4', 'landscape', $password);
	// 			// $files=file_put_contents($filename, $file);
	// 			$path = FCPATH.'/file/'.$key->norek.'/'.$filename;
	// 			if (!is_dir(FCPATH.'/file/'.$key->norek)) {
	// 				mkdir(FCPATH.'file/'.$key->norek, 0777, true);
	// 			}
    //             if (! write_file($path,$file)) {
    //                 echo 'Unable to write the file';
    //             } else {
    //                 echo 'File written!';
    //             }
    //             $data['norek']= substr($key->norek, 0, $passlengt-6).'******'; 
    //         }            
    //     }
    //     var_dump($nasabah);
    }
 
}