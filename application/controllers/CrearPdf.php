<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// esta función hace referencia para poder mandar a llamar la vista que
// le queremos mandar.
class CrearPdf extends CI_Controller {

  public function descargar(){

		$data = [];

		$hoy = date("d-m-Y");

        //load the view and saved it into $html variable
        $html =
        "<style>@page {
			    margin-top: 2cm;
			    margin-bottom: 2cm;
			    margin-left: 2cm;
			    margin-right: 2cm;
			}
			</style>".''."


      <div style='width:1000px; height:100px; text-align:center;'><b>Formato para crear el pdf<b></div>
      <br>
      <div style='width:1000px; height:50px;'><b>Muestra: <b></div>
      <div style='width:1000px; height:50px;'><b>Solicitud: <b></div>
      <div style='width:1000px; height:50px;'><b>Expediente: <b></div>
      <div style='width:1000px; height:50px;'><b>Descripción: <b></div>
        </body>";

        // $html = $this->load->view('v_dpdf',$date,true);

 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "Etiqueta_".$hoy.".pdf";

        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'Carta');
 		    $mpdf->WriteHTML($html);
		    $mpdf->Output($pdfFilePath, "D");
       // //generate the PDF from the given html
       //  $this->m_pdf->pdf->WriteHTML($html);

       //  //download it.
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D");
	}


}


 ?>
