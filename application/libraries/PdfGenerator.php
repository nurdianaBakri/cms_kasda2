<?php
 
class PdfGenerator
{
  public function generate($html,$filename)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);

    //include ori
    // require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");

    //inlcude not ori
	// require_once("/dompdf/dompdf_config.inc.php"); 
    include_once APPPATH . 'third_party/dompdf_config.inc.php'; 
 
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
}