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

  public function reportegeneral(){
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
      $fileName = 'data-'.time().'.xlsx';
      // load excel library
      $this->load->library('excel');
      $listInfo = $this->reportes->reportegeneral();
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->setActiveSheetIndex(0);
      // set Header
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
      $filename = "Reporte general"."-".date("d-m-Y").".xls";
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0');
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          $objWriter->save('php://output');


        // code...
        //$this->load->view('dashboard');
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

  public function reportegeneralcdos(){
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
      $fileName = 'data-'.time().'.xlsx';
      // load excel library
      $this->load->library('excel');
      $listInfo = $this->reportes->reportegeneral();
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->setActiveSheetIndex(0);
      // set Header
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
      $filename = "Reporte general"."-".date("d-m-Y").".xls";
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0');
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
      $fileName = 'data-'.time().'.xlsx';
      // load excel library
      $this->load->library('excel');
      $listInfo = $this->reportes->reportegeneral();
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->setActiveSheetIndex(0);
      // set Header
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Codigo solicitud  ');
      $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Estados solicitud');



      // set Row
      $rowCount = 2;
      foreach ($listInfo as $list) {
          $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->idSolicitud);
          $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->Nombrestado);


          $rowCount++;
      }
      $filename = "Reporte de estados"."-".date("d-m-Y").".xls";
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0');
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

        redirect('restrinct');
        break;
      case '2':
      $fileName = 'data-'.time().'.xlsx';
      // load excel library
      $this->load->library('excel');
      $listInfo = $this->reportes->reportegeneral();
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->setActiveSheetIndex(0);
      // set Header
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Codigo de muestra  ');
      $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Cantidad de items');
      $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Caracteristicas');



      // set Row
      $rowCount = 2;
      foreach ($listInfo as $list) {
          $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->idSolicitud);
          $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->Nombrestado);


          $rowCount++;
      }
      $filename = "Reporte de estados"."-".date("d-m-Y").".xls";
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="'.$filename.'"');
          header('Cache-Control: max-age=0');
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
