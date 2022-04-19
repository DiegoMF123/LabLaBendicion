<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('reportes');
    }
    public function prueba()
    {

        $listInfo = $this->reportes->reportegeneral();
        var_dump($listInfo);
    }

    //Creamos la función reportegeneral
    public function reporte()
    {
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
                $id = trim($_REQUEST["id"]);
                //Definomos como se va a llamar el nombre del docuemento que vamos a descargar
                $fileName = 'data-' . time() . '.xlsx';
                // Cargamos la libreria excel
                $this->load->library('excel');
                // Definimos una variable la cual le cargaremos los valores del modelo reportes de la función reportegeneral
                $listInfo = $this->reportes->reporte($id);
                //Creamos un objeto para llamar la función phphexcel de la librería
                $objPHPExcel = new PHPExcel();
                // Con esto definimos que nuestro conteo de valores este vacío
                $objPHPExcel->setActiveSheetIndex(0);
                // Defininmos el valor de la primera fila en donde se pondrá el nombre de los campos que deseamos mostrar en el excel
                $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Id Vuelo');
                $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Número de pasaporte');
                $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Código de vuelo');
                $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Aeropuerto Salido');
                $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Aeropuerto Entrada');
                $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Fecha y hora de salida');
                $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Fecha y hora de entrada');

                // set Row
                $rowCount = 2;
                // Definimos un foreach para poder mandarle los datos que queremos mostrarle al excel, la variable listinfo nos define todos los valores que estamos agarrando de nuestro modelo
                // Para luego mandarselos a una nueva variable llamada $list y esa variable list nos traera consigo el nombre de los campos que deseamos mandar a llamar.

                foreach ($listInfo as $list) {
                    $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->IdVuelosPendientes);
                    $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->NumeroPasaporte);
                    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->CodigoVuelo);
                    $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->AeropuertoSalido);
                    $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->AeropuertoEntrada);
                    $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->FechaHoraSalida);
                    $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->FechaHoraEntrada);

                    $rowCount++;
                }
                //Por ultmo definimos el nombre del archivo, le mandamos la fecha en la que se está descargando el archivo y el tipo de archivo que va a descargar en este caso es un .xls
                // Que es un archivo de excel
                $filename = "Reporte Vuelos pendientes" . "-" . date("d-m-Y") . ".xls";
                header('Content-Type: application/vnd.ms-excel');
                // Acada mandamos la variable $fileName la cual pues solo almacena el dato que anteriormente se explico
                header('Content-Disposition: attachment;filename="' . $filename . '"');
                header('Cache-Control: max-age=0');
                //Definimos nada mas como queremos que nos aparezca la estructura del excel en este caso nos saldra una estructura bonita
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');


                // code...
                //$this->load->view('dashboard');

                break;
            case '2':

                redirect('restrinct');
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
}
