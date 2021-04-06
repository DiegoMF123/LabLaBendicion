<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mantenimientomm extends CI_Controller{

  public function index(){
        // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
      // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');

    $this->load->model('Model_Solicitud');

    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':
        $data["datosoli"]= $this->Model_Solicitud->datosSolicitud();

        $this->load->view('usuario/mantenimientomm',$data);

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

  //Función nuevo paara mostrar la vista para agregar un nuevo usuario

  public function nuevo(){
      // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
      // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
    // Cargamos el modelo que vamos a utilizar para esta función nuevo
    $this->load->model('Model_Solicitud');

    // Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
    // mostrará las vistas respectivas.
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':

        if (empty($_REQUEST["numsoli"])) {
          // code...
          $data["tiposolicitante"]= $this->Model_Solicitud->tiposolicitante();
          $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
          $this->load->view('usuario/nuevasoli',$data);
        }else{
          if (isset($_REQUEST["numsoli"])) {
            $numsoli=$_REQUEST["numsoli"];
            $data["datosexp"] = $this->Model_Solicitud->buscarsoli($numsoli);
            $this->load->view('usuario/datosexpediente',$data);
          // code...
          }else{
            $data["tiposolicitante"]= $this->Model_Solicitud->tiposolicitante();
          $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
              $this->load->view('usuario/nuevasoli',$data);
          }
        }

        break;
      case '2':
      // El rol 2 tiene restricción a esta vistas por ende redireccionará a la vista restrinct
          redirect('restrinct');


        break;
      case '3':
      redirect('restrinct');

        break;



      default:
      redirect('restrinct');
        // code...
        break;
    }

  }

  public function nuevoprueba(){
    // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
  $this->load->helper('url');
    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
  $this->load->library('session');
  // Cargamos el modelo que vamos a utilizar para esta función nuevo
  $this->load->model('Model_Solicitud');

  // Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
  // mostrará las vistas respectivas.
  $rol= $_SESSION["role"];
  switch ($rol) {
    case '1':

    if (empty($_REQUEST["numsoli"])) {
      // code...
      $data["tiposolicitante"]= $this->Model_Solicitud->tiposolicitante();
      $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
      $data["tiposoporte"]= $this->Model_Solicitud->tiposoporte();

      $codigo = $this->Model_Solicitud->numerosolicitud();

       foreach ($codigo as $key) {

         $ids = $key->idSolicitud;
         // code...
       }
       $data["ids"]=$ids;
       $data["response"]=trim(isset($_REQUEST["response"]));

      $this->load->view('usuario/nuevasolicitud',$data);
    }else{
      if (isset($_REQUEST["numsoli"])) {
        $numsoli=$_REQUEST["numsoli"];
        $data["datosexp"] = $this->Model_Solicitud->buscarsoli($numsoli);
        $this->load->view('usuario/nuevasolicitud',$data);
      // code...
      }else{
        $data["tiposolicitante"]= $this->Model_Solicitud->tiposolicitante();
        $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
        $data["tiposoporte"]= $this->Model_Solicitud->tiposoporte();

          $this->load->view('usuario/nuevasolicitud',$data);
      }
    }



      break;
    case '2':
    // El rol 2 tiene restricción a esta vistas por ende redireccionará a la vista restrinct
        redirect('restrinct');


      break;
    case '3':
    redirect('restrinct');

      break;



    default:
    redirect('restrinct');
      // code...
      break;
  }

}

public function correlativo(){
 $this->load->model('model_solicitud');
 $correlativo = $this->model_solicitud->codigosolisoporte();

 foreach ($correlativo as $key) {

   $rs = $key->idSolicitud;
   // code...
 }
 echo $rs;
}

public function expediente(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_solicitud');
  $data["numsoli"]= $this->model_solicitud->expediente();

  echo json_encode($data["numsoli"]);


}


// Función para guardar los datos del formulario de la vista nuevopda
  public function guardar(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_solicitud');

    $correlativo = $this->model_solicitud->codigosolisoporte();
    foreach ($correlativo as $key) {

      $rs = $key->idSolicitud;
      // code...
    }

    $tiposoli=trim($_REQUEST["tiposoli"]);
    $tiposolid=trim($_REQUEST["tiposolid"]);
    $desc=trim($_REQUEST["desc"]);
    $numsoli=trim($_REQUEST["numsoli"]);
    $fecha= date('d-m-Y H:i:s');

    $tiposoporte=trim($_REQUEST["tiposoporte"]);
    $numsoporte=trim($_REQUEST["numsoporte"]);
    $telefono=trim($_REQUEST["telefono"]);
    $email=trim($_REQUEST["email"]);


    if(empty($usuario)){

      $data["guardar"] = $this->model_solicitud->guardartsoli($tiposoli,$numsoli,$tiposolid,$desc,$fecha);
      $data["guardar"] = $this->model_solicitud->guardarsopcon($tiposoporte,$numsoporte,$telefono,$email,$rs);

    header("Location:  http://192.168.0.7:8888/LabLaBendicion/index.php/mantenimientomm/nuevoprueba?response=1");
      die();
    }

    else {
      header("Location:  http://192.168.0.7:8888/LabLaBendicion/index.php/mantenimientomm/nuevoprueba?response=2");
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
    $this->load->view('usuario/editaquejaauto',$data);

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

  header("Location: http://192.168.0.7:8888/LabLaBendicion/index.php/quejasauto?response=1");
              die();

            }
}
 ?>
