<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Autorizar extends CI_Controller {


  public function index(){
    // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
  $this->load->helper('url');
    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
  $this->load->library('session');
  // Cargamos el modelo que vamos a utilizar para esta función index
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
    // Esta variable data le mandamos los datos de la variable datosmuestra que esta en nuestra vista autorizador/autorizar
    //La cual necesita datos por ende le mandamos y llamamos los datos desde nuestro modelo
    $data["datosmuestra"]= $this->Model_Muestra->datosmuestrautorizador();
      $this->load->view('autorizador/autorizar',$data);

      break;



    default:
    // El rol 2 tiene restricción a esta vistas por ende redireccionará a la vista restrinct
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
// Cargamos el modelo que vamos a utilizar para esta función
$this->load->model('Model_Muestra');
$this->load->model('model_solicitud');
// Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
// mostrará las vistas respectivas.
$rol= $_SESSION["role"];
switch ($rol) {
  case '1':
  // El rol 2 tiene restricción a esta vistas por ende redireccionará a la vista restrinct
  redirect('restrinct');

    break;
  case '2':
  // El rol 2 tiene restricción a esta vistas por ende redireccionará a la vista restrinct
      redirect('restrinct');


    break;
  case '3':
  // Definimos una variable $codigomuestra nos tare el valor de la muestra que estamos seleccionando
    $codigomuestra = trim($_REQUEST["codigomuestra"]);
    // Esta variable data le mandamos los datos de la variable datosmuestra que esta en nuestra vista autorizador/editarestadoc
    //La cual necesita datos por ende le mandamos y llamamos los datos desde nuestro modelo
    $data["response"]=trim(isset($_REQUEST["response"]));
    // Esta variable data le mandamos los datos de la variable datosmuestra que esta en nuestra vista autorizador/editarestadoc
    //La cual necesita datos por ende le mandamos y llamamos los datos desde nuestro modelo y le mandamos el valor de la variable
    //$codigomuestra
    $data["datosmuestra"]= $this->Model_Muestra->datosmuestraporid($codigomuestra);
    // Esta variable data le mandamos los datos de la variable datosmuestra que esta en nuestra vista autorizador/editarestadoc
    //La cual necesita datos por ende le mandamos y llamamos los datos desde nuestro modelo y le mandamos el valor de la variable
    $data["estado"]= $this->model_solicitud->estadodocumento();
    // Cargamos la vista con la variable data para que nuestra vista pueda resivir nuestros datos que le estamos mandando
    $this->load->view('autorizador/editarestadoc',$data);

    break;



  default:
  redirect('restrinct');
    // code...
    break;
}

}



public function updatedata(){
  // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
  $this->load->helper('url');
    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
  $this->load->library('session');
  // Cargamos el modelo que vamos a utilizar para esta función
  $this->load->model('model_solicitud');
    $this->load->model('Model_Muestra');
// Definimos cada variable para mandar a traer los valores que nos envia el formulario
  $id=trim($_REQUEST["id"]);
  $estado=trim($_REQUEST["estado"]);
  $fechamodifi= date('d-m-Y H:i:s');


// La variable data "estados" que esta con letras color verde, viene del foreach que traslada los datos del formulario de la vista autorizar
//y las variables con signo $ son las que mandas a traer arriba, donde tambíen se carga el modelo y la función del modelo
  $data["estado"]= $this->Model_Muestra->documentoautorizar($id,$estado,$fechamodifi);
  // Si se cumple la condición nos redireccionará a la siguiente url
  header("Location: http://192.168.0.3:8888/LabLaBendicion/index.php/Autorizar/autorizardoc?response=1");
              die();

            }






}


 ?>
