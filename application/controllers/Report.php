<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends CI_Controller {

  // construct
     public function __construct() {
         parent::__construct();
         // load model
         $this->load->model('reportes');
     }
public function prueba(){

  $listInfo = $this->reportes->reportegeneral();
  var_dump($listInfo);
}

//Creamos la función reportegeneral
  public function reportegeneral(){
    //Cargamos la libreria session
    $this->load->library('session');
    //Generamos una variable rol la cual nos adjuntara el tipo de rol al que estamos accediendo
    $rol = $_SESSION["role"];
    //Cargamos el helper form
    $this->load->helper('form');
    //Carmos la url para que nos cargue la pagina
        $this->load->helper('url');

    switch ($rol) {
      case '1':
      // Para el usuario con el rol 1 no tiene acceso a descargar el excel
        redirect('restrinct');
        break;
      case '2':
      //Definomos como se va a llamar el nombre del docuemento que vamos a descargar
      $fileName = 'data-'.time().'.xlsx';
      // Cargamos la libreria excel
      $this->load->library('excel');
      // Definimos una variable la cual le cargaremos los valores del modelo reportes de la función reportegeneral
      $listInfo = $this->reportes->reportegeneral();
      //Creamos un objeto para llamar la función phphexcel de la librería
      $objPHPExcel = new PHPExcel();
      // Con esto definimos que nuestro conteo de valores este vacío
      $objPHPExcel->setActiveSheetIndex(0);
      // Defininmos el valor de la primera fila en donde se pondrá el nombre de los campos que deseamos mostrar en el excel
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Código muestra');
      $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tipo muestra');
      $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Código solicitud');
      $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'No. Expediente');
      $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'NIT');
      $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Presentación');
      $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Usuario asignación');
      $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Usuario creación');
      $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Fecha creación');
      $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Fecha recepción');
      $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Estado solicitud');
      $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Cantidad Unidades');
      $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Unidad medida');
      $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Cantidad Ítems');
      $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Cantidad documentos');
      $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Días vencimiento');

      // set Row
      $rowCount = 2;
      // Definimos un foreach para poder mandarle los datos que queremos mostrarle al excel, la variable listinfo nos define todos los valores que estamos agarrando de nuestro modelo
      // Para luego mandarselos a una nueva variable llamada $list y esa variable list nos traera consigo el nombre de los campos que deseamos mandar a llamar.

      foreach ($listInfo as $list) {
          $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->idMuestra);
          $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->Presentacion);
          $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->Cantidad);
          $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->TipoMuestra_idTipoMuestra);
          $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->Umedida_idUmedida);
          $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->Nombre_archivo);
          $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->FechaCreacion);
          $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->FechaModificacion);
          $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->tamanio);
          $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->tipo);
          $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->Presentacion);
          $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->Cantidad);
          $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->TipoMuestra_idTipoMuestra);
          $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $list->Umedida_idUmedida);
          $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $list->Nombre_archivo);
          $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $list->FechaCreacion);

          $rowCount++;
      }
      //Por ultmo definimos el nombre del archivo, le mandamos la fecha en la que se está descargando el archivo y el tipo de archivo que va a descargar en este caso es un .xls
      // Que es un archivo de excel
      $filename = "Reporte general"."-".date("d-m-Y").".xls";
          header('Content-Type: application/vnd.ms-excel');
          // Acada mandamos la variable $fileName la cual pues solo almacena el dato que anteriormente se explico
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0');
          //Definimos nada mas como queremos que nos aparezca la estructura del excel en este caso nos saldra una estructura bonita
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          $objWriter->save('php://output');


        // code...
        //$this->load->view('dashboard');
        break;
      case '3':
      // Para el usuario con el rol 3 no tiene acceso a descargar el excel
      redirect('restrinct');
      break;
      case '4':

        redirect('restrinct');

      break;
        case '5':

        redirect('restrinct');

          break;
      default:
      redirect('restrinct');
        // code...
        break;
    }
  }

  public function reportegeneralcdos(){
    // create file name

//Cargamos la libreria session
    $this->load->library('session');
  //Generamos una variable rol la cual nos adjuntara el tipo de rol al que estamos accediendo
    $rol = $_SESSION["role"];
        //Cargamos el helper form
    $this->load->helper('form');
      //Carmos la url para que nos cargue la pagina
        $this->load->helper('url');

    switch ($rol) {
      case '1':
// Para el usuario con el rol 1 no tiene acceso a descargar el excel
        redirect('restrinct');
        break;
      case '2':
      //Definomos como se va a llamar el nombre del docuemento que vamos a descargar
      $fileName = 'data-'.time().'.xlsx';
      // Cargamos la libreria excel
      $this->load->library('excel');
      // Definimos una variable la cual le cargaremos los valores del modelo reportes de la función reportegeneral
      $listInfo = $this->reportes->reportegeneral();
      //Creamos un objeto para llamar la función phphexcel de la librería
      $objPHPExcel = new PHPExcel();
      // Con esto definimos que nuestro conteo de valores este vacío
      $objPHPExcel->setActiveSheetIndex(0);
      // Defininmos el valor de la primera fila en donde se pondrá el nombre de los campos que deseamos mostrar en el excel
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Codigo solicitud  ');
      $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'No. expediente');
      $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'NIT');
      $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'No. soporte');
      $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Tipo soporte');
      $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Tipo solicitante');
      $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Tipo solicitud');
      $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Usuario asignación');
      $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Estado solicitud');
      $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Usuario creación');
      $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Fecha creación');
      $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Cantidad muestras');
      $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Cantidad ítems');
      $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Cantidad documentos');
      $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Descripción  ');
      $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Solicitante');
      $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Teléfonos ');
      $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Emails');

      // set Row
      $rowCount = 2;
      // Definimos un foreach para poder mandarle los datos que queremos mostrarle al excel, la variable listinfo nos define todos los valores que estamos agarrando de nuestro modelo
      // Para luego mandarselos a una nueva variable llamada $list y esa variable list nos traera consigo el nombre de los campos que deseamos mandar a llamar.
      foreach ($listInfo as $list) {
          $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->idSolicitud);
          $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->Nosolicitud);
          $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->Nit);
          $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->NumeroSoporte);
          $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->Nombrets);
          $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->Tiposolicitante);
          $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->NombreTipo);
          $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->Nombre);
          $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->Nombrestado);
          $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->Nombre);
          $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->Fechacreacion);
          $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->Descripcion);
          $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->Descripcion);
          $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $list->Descripcion);
          $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $list->Descripcion);
          $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $list->Nombre);
          $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $list->Telefono);
          $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $list->Correo);

          $rowCount++;
      }
      //Por ultmo definimos el nombre del archivo, le mandamos la fecha en la que se está descargando el archivo y el tipo de archivo que va a descargar en este caso es un .xls
      // Que es un archivo de excel
      $filename = "Reporte general"."-".date("d-m-Y").".xls";
          header('Content-Type: application/vnd.ms-excel');
          // Acada mandamos la variable $fileName la cual pues solo almacena el dato que anteriormente se explico
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0');
          //Definimos nada mas como queremos que nos aparezca la estructura del excel en este caso nos saldra una estructura bonita
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          $objWriter->save('php://output');

        break;
      case '3':
      redirect('restrinct');
      break;
      case '4':

        redirect('restrinct');

      break;
        case '5':

        redirect('restrinct');

          break;
      default:
      redirect('restrinct');
        // code...
        break;
    }
  }

  public function reportestados(){
    //Cargamos la libreria session
        $this->load->library('session');
      //Generamos una variable rol la cual nos adjuntara el tipo de rol al que estamos accediendo
        $rol = $_SESSION["role"];
            //Cargamos el helper form
        $this->load->helper('form');
          //Carmos la url para que nos cargue la pagina
            $this->load->helper('url');


    switch ($rol) {
      case '1':
      // Para el usuario con el rol 1 no tiene acceso a descargar el excel
        redirect('restrinct');
        break;
      case '2':
      //Definomos como se va a llamar el nombre del docuemento que vamos a descargar
      $fileName = 'data-'.time().'.xlsx';
      // Cargamos la libreria excel
      $this->load->library('excel');
      // Definimos una variable la cual le cargaremos los valores del modelo reportes de la función reportegeneral
      $listInfo = $this->reportes->reportegeneral();
      //Creamos un objeto para llamar la función phphexcel de la librería
      $objPHPExcel = new PHPExcel();
      // Con esto definimos que nuestro conteo de valores este vacío
      $objPHPExcel->setActiveSheetIndex(0);
            // Defininmos el valor de la primera fila en donde se pondrá el nombre de los campos que deseamos mostrar en el excel
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Codigo solicitud  ');
      $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Estados solicitud');



      // set Row
      $rowCount = 2;
      // Definimos un foreach para poder mandarle los datos que queremos mostrarle al excel, la variable listinfo nos define todos los valores que estamos agarrando de nuestro modelo
      // Para luego mandarselos a una nueva variable llamada $list y esa variable list nos traera consigo el nombre de los campos que deseamos mandar a llamar.
      foreach ($listInfo as $list) {
          $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->idSolicitud);
          $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->Nombrestado);


          $rowCount++;
      }
      //Por ultmo definimos el nombre del archivo, le mandamos la fecha en la que se está descargando el archivo y el tipo de archivo que va a descargar en este caso es un .xls
      // Que es un archivo de excel
      $filename = "Reporte de estados"."-".date("d-m-Y").".xls";
          header('Content-Type: application/vnd.ms-excel');
                // Acada mandamos la variable $fileName la cual pues solo almacena el dato que anteriormente se explico
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0');
          //Definimos nada mas como queremos que nos aparezca la estructura del excel en este caso nos saldra una estructura bonita
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          $objWriter->save('php://output');

        break;
      case '3':
      redirect('restrinct');
      break;
      case '4':

        redirect('restrinct');

      break;
        case '5':

        redirect('restrinct');

          break;
      default:
      redirect('restrinct');
        // code...
        break;
    }
  }


  public function reportedeitems(){
    // create file name

    // en los excel el campo de  categoria es el campo de operador
    $this->load->library('session');
    $rol = $_SESSION["role"];
    $this->load->helper('form');
        $this->load->helper('url');

    switch ($rol) {
      case '1':
  // Para el usuario con el rol 1 no tiene acceso a descargar el excel
        redirect('restrinct');
        break;
      case '2':

      //Definomos como se va a llamar el nombre del docuemento que vamos a descargar
      $fileName = 'data-'.time().'.xlsx';
      // Cargamos la libreria excel
      $this->load->library('excel');
      // Definimos una variable la cual le cargaremos los valores del modelo reportes de la función reportegeneral
      $listInfo = $this->reportes->reportegeneral();
      //Creamos un objeto para llamar la función phphexcel de la librería
      $objPHPExcel = new PHPExcel();
      // Con esto definimos que nuestro conteo de valores este vacío
      $objPHPExcel->setActiveSheetIndex(0);
      // Defininmos el valor de la primera fila en donde se pondrá el nombre de los campos que deseamos mostrar en el excel
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Codigo de muestra  ');
      $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Cantidad de items');
      $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Caracteristicas');



      // set Row
      $rowCount = 2;
      // Definimos un foreach para poder mandarle los datos que queremos mostrarle al excel, la variable listinfo nos define todos los valores que estamos agarrando de nuestro modelo
      // Para luego mandarselos a una nueva variable llamada $list y esa variable list nos traera consigo el nombre de los campos que deseamos mandar a llamar.
      foreach ($listInfo as $list) {
          $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->idSolicitud);
          $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->Nombrestado);


          $rowCount++;
      }
      //Por ultmo definimos el nombre del archivo, le mandamos la fecha en la que se está descargando el archivo y el tipo de archivo que va a descargar en este caso es un .xls
      // Que es un archivo de excel
      $filename = "Reporte de estados"."-".date("d-m-Y").".xls";
          header('Content-Type: application/vnd.ms-excel');
              // Acada mandamos la variable $fileName la cual pues solo almacena el dato que anteriormente se explico
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0');
          //Definimos nada mas como queremos que nos aparezca la estructura del excel en este caso nos saldra una estructura bonita
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          $objWriter->save('php://output');

        break;
      case '3':
      redirect('restrinct');
      break;
      case '4':

        redirect('restrinct');

      break;
        case '5':

        redirect('restrinct');

          break;
      default:
      redirect('restrinct');
        // code...
        break;
    }
  }

  public function resportemuestras(){
    // create file name

    // en los excel el campo de  categoria es el campo de operador
    $this->load->library('session');
    $rol = $_SESSION["role"];
    $this->load->helper('form');
        $this->load->helper('url');

    switch ($rol) {
      case '1':

        redirect('restrinct');
        break;
      case '2':
      //Definomos como se va a llamar el nombre del docuemento que vamos a descargar
      $fileName = 'data-'.time().'.xlsx';
      // Cargamos la libreria excel
      $this->load->library('excel');
      // Definimos una variable la cual le cargaremos los valores del modelo reportes de la función reportegeneral
      $listInfo = $this->reportes->reportegeneralmuestras();
      //Creamos un objeto para llamar la función phphexcel de la librería
      $objPHPExcel = new PHPExcel();
      // Con esto definimos que nuestro conteo de valores este vacío
      $objPHPExcel->setActiveSheetIndex(0);
      // Defininmos el valor de la primera fila en donde se pondrá el nombre de los campos que deseamos mostrar en el excel
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Código muestra  ');
      $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tipo de muestra');
      $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Código Solicitud');
      $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'No. Expediente');
      $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'NIT');
      $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Presentación');
      $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Usuario asignación');
      $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Usuario creación');
      $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Fecha creación');
      $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Fecha recepción');
      $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Estado solicitud');
      $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Cantidad Unidades');
      $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Unidad medida');
      $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Cantidad Ítems');
      $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Cantidad documentos');
      $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Días vencimiento');


      // set Row
      $rowCount = 2;
      // Definimos un foreach para poder mandarle los datos que queremos mostrarle al excel, la variable listinfo nos define todos los valores que estamos agarrando de nuestro modelo
      // Para luego mandarselos a una nueva variable llamada $list y esa variable list nos traera consigo el nombre de los campos que deseamos mandar a llamar.
      foreach ($listInfo as $list) {
          $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->idMuestra);
          $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->NombreMuestra);
          $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->idSolicitud);
          $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->Nosolicitud);
          $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->Nit);
          $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->Presentacion);
          $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->Nombre);
          $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->Nombre);
          $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->FechaCreacion);
          $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->FechaModificacion);
          $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->Nombrestado);
          $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->Cantidad);
          $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->Nombreum);
          $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $list->Nombreitem);
          $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $list->Nombre_archivo);
          $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $list->Diasvencimiento);


          $rowCount++;
      }
      //Por ultmo definimos el nombre del archivo, le mandamos la fecha en la que se está descargando el archivo y el tipo de archivo que va a descargar en este caso es un .xls
      // Que es un archivo de excel
      $filename = "Reporte general muestras"."-".date("d-m-Y").".xls";
          header('Content-Type: application/vnd.ms-excel');
                    // Acada mandamos la variable $fileName la cual pues solo almacena el dato que anteriormente se explico
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0');
          //Definimos nada mas como queremos que nos aparezca la estructura del excel en este caso nos saldra una estructura bonita
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          $objWriter->save('php://output');

        break;
      case '3':
      redirect('restrinct');
      break;
      case '4':

        redirect('restrinct');

      break;
        case '5':

        redirect('restrinct');

          break;
      default:
      redirect('restrinct');
        // code...
        break;
    }
  }






}
