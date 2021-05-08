<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// esta función hace referencia para poder mandar a llamar la vista que
// le queremos mandar.
class CrearPdf extends CI_Controller {

  public function descargar(){

    $this->load->model('Model_Muestra');

    $idMuestra = trim($_REQUEST["idMuestra"]);
    $muestra = $this->Model_Muestra->datamuestraid($idMuestra);

    $generado= "".$this->generarCodigo(8)."";
    $generadodos= "".$this->generarCodigodos(5)."";
    $generadotres= "".$this->generarCodigotres(8)."";
    $generadocuatro= "".$this->generarCodigocuatro(5)."";

    foreach ($muestra as $muestradatos) {
      // code...
    }

		$data = [];

		$hoy = date("d-m-Y");

        //load the view and saved it into $html variable
        $html =
        "<style>@page {
			    margin-top: 1cm;
			    margin-bottom: 2cm;
			    margin-left: 2cm;
			    margin-right: 2cm;
			}
			</style>".
      "<body>
      <div style='width:1000px; height:50px; text-align:center;'><b>Etiqueta muestra médica<b>  <div align='right'> <img src='assets/img/logo3.png' width='75'></div></div>"."
      <br>

      <div style='width:1000px; height:50px;'><b>Muestra:</b> ".$muestradatos->idMuestra." || <b>Soporte: </b>".$muestradatos->Abreviatura."-".$generado."-".$generadodos." </div>
      <div style='width:1000px; height:50px;'><b>Solicitud: </b>".$muestradatos->idSolicitud." ||  <b>Tipo de solicitante: </b> ".$muestradatos->Abreviaturats."-".$generadotres."-".$generadocuatro."</div>
      <div style='width:1000px; height:50px;'><b>Expediente: </b>".$muestradatos->Correlativo." </div>
      <div style='width:1000px; height:50px;'><b>Descripcion de la presentación: </b>".$muestradatos->Presentacion." </div>
      <div align='center'> <img src='assets/img/logo.png' width='250'></div>


        </body>";

        $pdfFilePath = "Etiqueta_".$hoy.".pdf";

        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'Carta');
 		    $mpdf->WriteHTML($html);
		    $mpdf->Output($pdfFilePath, "D");

	}

  public function generarCodigo($longitud) {
       $key = '';
       $pattern = '1234567890';
       $max = strlen($pattern)-1;
       for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
       return $key;
    }

    public function generarCodigodos($longitud) {
         $key = '';
         $pattern = '9632587410';
         $max = strlen($pattern)-1;
         for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
         return $key;
      }

      public function generarCodigotres($longitud) {
           $key = '';
           $pattern = '1234567890';
           $max = strlen($pattern)-1;
           for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
           return $key;
        }

        public function generarCodigocuatro($longitud) {
             $key = '';
             $pattern = '9632587410';
             $max = strlen($pattern)-1;
             for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
             return $key;
          }


}


 ?>
