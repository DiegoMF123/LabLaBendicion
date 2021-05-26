<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// esta función hace referencia para poder mandar a llamar la vista que
// le queremos mandar.
class CrearPdf extends CI_Controller {

  public function descargar(){

    // Cargamos el modelo para mostar nuestros datosSolicitud
    $this->load->model('Model_Muestra');
    // Definimos una variable idMuestra la cual nos va a traer el id de la muestra que estamos seleccionando
    //para poder generar el pdf con la etiqueta de la  muestra
    $idMuestra = trim($_REQUEST["idMuestra"]);
    // En esta variable muestra le mandamos la variable $idMuestra la cual se lamndamos a nuestra función datamuestraid de nuestro modelo
    $muestra = $this->Model_Muestra->datamuestraid($idMuestra);
    //Definimos una varaible generado la cual nos va a guardar el valor de la función generarCodigo la cual dentro del parentesis le mandamos a decir
    // cuantos datos necesitamos que nos muestre. Y así es lo mismo para los demás generados
    $generado= "".$this->generarCodigo(8)."";
    $generadodos= "".$this->generarCodigodos(5)."";
    $generadotres= "".$this->generarCodigotres(8)."";
    $generadocuatro= "".$this->generarCodigocuatro(5)."";
    //Definimos un foreach lo cual vamos a mandar a mostra los datos de la muestra que queremos mostar en el pdf de la etiqueta de la muestra
    foreach ($muestra as $muestradatos) {
      // code...
    }

		$data = [];
    //Cargamos una variable hoy la cual nos guarda la fecha en la que se va a descargar el documento
		$hoy = date("d-m-Y");

        //Vamos formando el pdf como queremos que se vaya mostrando en el pdf,
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
        // En esta variable mandamos el nombre de que va a llevar la etiqeuta junto con la variable hoy la cual nos manda la fecha en la que se esta
        // descargando el documento
        $pdfFilePath = "Etiqueta_".$hoy.".pdf";

        //Cargamos la librería mPDF
        $this->load->library('M_pdf');
        //Definimos el tamaño del pdf en el que se va a descargar
        $mpdf = new mPDF('c', 'Carta');
        //Llamaos el html formado para crear el pdf
 		    $mpdf->WriteHTML($html);

		    $mpdf->Output($pdfFilePath, "D");

	}


  public function generarCodigo($longitud) {
       $key = '';
       //Definimos los numeros que vamos a usar para generar los códigos para el pdf
       $pattern = '1234567890';
       //Maximo de numeración
       $max = strlen($pattern)-1;
       //Generamos un for el cual nos define cuantos y cuales numeros va a mostar, en este caso nos generará
       // Un codigo de n digitos los cuales les mandemos a pedir.
       for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
       return $key;
    }

    public function generarCodigodos($longitud) {
         $key = '';
         //Definimos los numeros que vamos a usar para generar los códigos para el pdf
         $pattern = '9632587410';
          //Maximo de numeración
         $max = strlen($pattern)-1;
         //Generamos un for el cual nos define cuantos y cuales numeros va a mostar, en este caso nos generará
         // Un codigo de n digitos los cuales les mandemos a pedir.
         for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
         return $key;
      }

      public function generarCodigotres($longitud) {
           $key = '';
          //Definimos los numeros que vamos a usar para generar los códigos para el pdf
           $pattern = '1234567890';
           $max = strlen($pattern)-1;
           //Generamos un for el cual nos define cuantos y cuales numeros va a mostar, en este caso nos generará
           // Un codigo de n digitos los cuales les mandemos a pedir.
           for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
           return $key;
        }

        public function generarCodigocuatro($longitud) {
             $key = '';
            //Definimos los numeros que vamos a usar para generar los códigos para el pdf
             $pattern = '9632587410';
             $max = strlen($pattern)-1;
             //Generamos un for el cual nos define cuantos y cuales numeros va a mostar, en este caso nos generará
             // Un codigo de n digitos los cuales les mandemos a pedir.
             for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
             return $key;
          }


}


 ?>
