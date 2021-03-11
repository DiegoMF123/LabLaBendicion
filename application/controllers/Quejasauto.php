<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quejasauto extends CI_Controller{

  public function index(){
        // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
      // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
        // Cargamos el modelo que vamos a utilizar para esta función index
    $this->load->model('model_quejasauto');
    // Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
    // mostrará las vistas respectivas.
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':
      // declaramos la vari data para poder mostrar los datos del usuario, mandamos a traer la variable
      // usuarios que esta declarada en el foreach, cargamos el modelo a donde queremos que vaya a traer los datos en la

        $data["datosqueja"]= $this->model_quejasauto->listadoq();
        $data["response"]=trim(isset($_REQUEST["response"]));
        $this->load->view('admin/quejasporauto',$data);


        break;
      case '2':
  // El rol 2 tiene restricción a esta vistas por ende redireccionará a la vista restrinct
          redirect('restrinct');


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

  //funcion nuevatipoq, esta función hace referencia cuando se quiera agregar una nueva queja
  public function nuevatipoq(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_pda');
  $this->load->model('model_quejasauto');
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':

      $correlativo = $this->model_quejasauto->siglas();
      $descripcion = $this->model_quejasauto->descripcion();

      foreach ($descripcion as $key) {


        $des = "".$key->Descripcion."";
        // code...
      }



      foreach ($correlativo as $key) {


        $rs = "".$key->Correlativo."";
        // code...
      }

          // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
          $data["rs"]=$rs;
          $data["des"]=$des;
        $data["response"]=trim(isset($_REQUEST["response"]));
                // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('admin/nuevotipoqueja',$data);


        break;
      case '2':
            // El rol 2 tiene restricción a esta vistas por ende redireccionará a la vista restrinct

          redirect('restrinct');


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

  public function correlativo(){
 $this->load->model('model_quejasauto');
 $correlativo = $this->model_quejasauto->siglas();
 $descripcion = $this->model_quejasauto->descripcion();

 foreach ($descripcion as $key) {


   $des = "Con la descripcion-".$key->Descripcion." ";
   // code...
 }
 echo $des;



 foreach ($correlativo as $key) {


   $rs = "La queja ingresada con las siglas-".$key->Correlativo."";
   // code...
 }
 echo $rs;

  }

// Función para guardar los datos del formulario de la vista nuevopda
  public function guardar(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_quejasauto');
    $correlativo = $this->model_quejasauto->idqueja();
    foreach ($correlativo as $key) {

      $rs = "".$key->id."-2020";
      // code...
    }
// Estas variables vienen de las vista nuevopda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta
    $sigcor=trim($_REQUEST["sigcor"]);
    $desc=trim($_REQUEST["desc"]);
    $fecha= date('d-m-Y H:i:s');

    if(empty($usuario)){

      $data["guardar"] = $this->model_quejasauto->guardar($sigcor,$desc,$fecha,$rs);

    header("Location:  http://192.168.0.4:8888/LabLaBendicion/index.php/quejasauto/nuevatipoq?response=1");
      die();
    }

    else {
      header("Location:  http://192.168.0.4:8888/LabLaBendicion/index.php/quejasauto/nuevatipoq");
      die();
      }

    }

// Sirve para mostrar la vista de editarpda
    public function modificatipoq(){

  $this->load->helper('url');
  $this->load->library('session');
    $this->load->model('model_pda');
  $this->load->model('model_quejasauto');
  $id = trim($_REQUEST["id"]);
  $rol= $_SESSION["role"];


  switch ($rol) {
    case '1':
    $data["estado"]= $this->model_pda->estado($id);
    $data["datosqueja"]= $this->model_quejasauto->selectidlistadoq($id);
    $this->load->view('admin/editaquejaauto',$data);

      break;
    case '2':

      redirect('restrinct');
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
      break;
    }
}




// Funcionalidad para editar el formulario de los puntos de atención vista editarpda
public function updatedata(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_quejasauto');
// Estas variables vienen de las vista editarpda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta

  $id=trim($_REQUEST["id"]);
  $estado=trim($_REQUEST["estado"]);
  $desc=trim($_REQUEST["desc"]);
  $fechamodifi= date('d-m-Y H:i:s');


// La variable "datos" que esta con letras color verde, viene del foreach que traslada los datos del formulario de la vista edtarpda, y las variables con signo $ son las que mandas a traer arriba
  $data["datosqueja"]= $this->model_quejasauto->update($id,$estado,$desc,$fechamodifi);

  header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/quejasauto?response=1");
              die();

            }
}
 ?>
