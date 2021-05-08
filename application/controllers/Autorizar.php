<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Autorizar extends CI_Controller {


  public function index(){
    // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
  $this->load->helper('url');
    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
  $this->load->library('session');
  // Cargamos el modelo que vamos a utilizar para esta función nuevo
  $this->load->model('Model_Muestra');

  // Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
  // mostrará las vistas respectivas.
  $rol= $_SESSION["role"];
  switch ($rol) {
    case '1':
  redirect('restrinct');



      break;
    case '2':
    // El rol 2 tiene restricción a esta vistas por ende redireccionará a la vista restrinct
        redirect('restrinct');


      break;
    case '3':

    $data["datosmuestra"]= $this->Model_Muestra->datosmuestra();
      $this->load->view('autorizador/autorizar',$data);

      break;



    default:
    redirect('restrinct');
      // code...
      break;
  }

}


public function autorizardoc(){
  // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
$this->load->helper('url');
  // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
$this->load->library('session');
// Cargamos el modelo que vamos a utilizar para esta función nuevo
$this->load->model('Model_Muestra');
$this->load->model('model_solicitud');


// Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
// mostrará las vistas respectivas.
$rol= $_SESSION["role"];
switch ($rol) {
  case '1':
redirect('restrinct');



    break;
  case '2':
  // El rol 2 tiene restricción a esta vistas por ende redireccionará a la vista restrinct
      redirect('restrinct');


    break;
  case '3':
    $codigomuestra = trim($_REQUEST["codigomuestra"]);
        $data["response"]=trim(isset($_REQUEST["response"]));
    $data["datosmuestra"]= $this->Model_Muestra->datosmuestraporid($codigomuestra);
    $data["estado"]= $this->model_solicitud->estadodocumento();
    $this->load->view('autorizador/editarestadoc',$data);

    break;



  default:
  redirect('restrinct');
    // code...
    break;
}

}



public function updatedata(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_solicitud');
    $this->load->model('Model_Muestra');
// Estas variables vienen de las vista editarpda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta

  $id=trim($_REQUEST["id"]);
  $estado=trim($_REQUEST["estado"]);
  $fechamodifi= date('d-m-Y H:i:s');


// La variable "datos" que esta con letras color verde, viene del foreach que traslada los datos del formulario de la vista edtarpda, y las variables con signo $ son las que mandas a traer arriba
  $data["estado"]= $this->Model_Muestra->documentoautorizar($id,$estado,$fechamodifi);

  header("Location: http://192.168.0.10:8888/LabLaBendicion/index.php/Autorizar/autorizardoc?response=1");
              die();

            }






}


 ?>
