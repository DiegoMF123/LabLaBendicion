<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mantenimientomm extends CI_Controller{

  public function index(){
        // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
      // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');

    $this->load->model('Model_Solicitud');
      $this->load->model('Model_Muestra');





    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':
        $data["datosoli"]= $this->Model_Solicitud->datosSolicitud();
        $data["response"]=trim(isset($_REQUEST["response"]));
        $data["responsemuestra"]=trim(isset($_REQUEST["responsemuestra"]));
        $this->load->view('usuario/mantenimientomm',$data);

        break;
      case '2':

      $estadosoli= trim($_REQUEST["estadosoli"]);
      $noexpediente = trim($_REQUEST["noexpediente"]);
      $nosolicitud = trim($_REQUEST["nosolicitud"]);
      $noitem = trim($_REQUEST["noitem"]);

        if (empty($nosolicitud)) {

          if (empty($estadosoli)) {
          //$data["tareas"]= $this->model_subproyectos->listado_subproyectos();
            if (empty($noexpediente)) {
              $data["datosoli"]= $this->Model_Solicitud->datosSolicitud();
              $data["datosmuestra"]= $this->Model_Muestra->datosmuestra();
              $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
              $data["response"]=trim(isset($_REQUEST["response"]));
              $data["responsemuestra"]=trim(isset($_REQUEST["responsemuestra"]));
              $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
              $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

              $this->load->view('usuinterno/mantenimientomm',$data);

            }else {


                              $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSolicitud($noexpediente);
                              $data["datosmuestra"]= $this->Model_Muestra->datosmuestra();
                              $data["response"]=trim(isset($_REQUEST["response"]));
                              $data["responsemuestra"]=trim(isset($_REQUEST["responsemuestra"]));
                              $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();

                              $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                              $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

                              $this->load->view('usuinterno/mantenimientomm',$data);


            }
        }else {

          $data["datosoli"]= $this->Model_Solicitud->busquedafiltro($estadosoli);
          $data["datosmuestra"]= $this->Model_Muestra->datosmuestra();
          $data["response"]=trim(isset($_REQUEST["response"]));
          $data["responsemuestra"]=trim(isset($_REQUEST["responsemuestra"]));
          $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();

          $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
          $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

          $this->load->view('usuinterno/mantenimientomm',$data);

        }
      }else {

        $data["datosoli"]= $this->Model_Solicitud->datosSolicitud();
        $data["datosmuestra"]= $this->Model_Muestra->busquedafiltro($nosolicitud);
        $data["response"]=trim(isset($_REQUEST["response"]));
        $data["responsemuestra"]=trim(isset($_REQUEST["responsemuestra"]));
        $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();

        $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
        $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

        $this->load->view('usuinterno/mantenimientomm',$data);

      }





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



  public function pruebanitnombre(){

    $this->load->helper('url');
      // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
    // Cargamos el modelo que vamos a utilizar para esta función nuevo
    $this->load->model('Model_Solicitud');

      $nombrenit = $this->Model_Solicitud->expediente();

      foreach ($nombrenit as $key) {

        $datos = "".$key->Nit." , ".$key->Nombre.",";

        echo $datos;
      }

      //echo $correlativo;

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

      // code...
      $data["tiposolicitante"]= $this->Model_Solicitud->tiposolicitante();
      $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
      $data["tiposoporte"]= $this->Model_Solicitud->tiposoporte();

     $valor="document.write(opcion)";
      $data["datos"]= $this->Model_Solicitud->nombrenit($valor);



      $codigo = $this->Model_Solicitud->numerosolicitud();

       foreach ($codigo as $key) {

         $ids = $key->idSolicitud;
         // code...
       }
       $data["ids"]=$ids;
       $data["response"]=trim(isset($_REQUEST["response"]));

      $this->load->view('usuario/nuevasolicitud',$data);




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

public function expediente(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_solicitud');
  $data["numsoli"]= $this->model_solicitud->expediente();

  echo json_encode($data["numsoli"]);


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


// Función para guardar los datos del formulario de la vista nuevopda
  public function guardar(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_solicitud');
    $this->load->model('model_login');



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
    $idusuario = $_SESSION["idusuario"];

    $tiposoporte=trim($_REQUEST["tiposoporte"]);
    $numsoporte=trim($_REQUEST["numsoporte"]);
    $telefono=trim($_REQUEST["telefono"]);
    $email=trim($_REQUEST["email"]);


    if(empty($usuario)){

      $data["guardar"] = $this->model_solicitud->guardartsoli($tiposoli,$numsoli,$tiposolid,$desc,$fecha,$idusuario);
      $data["guardar"] = $this->model_solicitud->guardarsopcon($tiposoporte,$numsoporte,$telefono,$email,$rs);

    header("Location:  http://192.168.0.10:8888/LabLaBendicion/index.php/mantenimientomm/nuevoprueba?response=1");
      die();
    }

    else {
      header("Location:  http://192.168.0.10:8888/LabLaBendicion/index.php/mantenimientomm/nuevoprueba?response=2");
      die();
      }

    }




// Sirve para mostrar la vista de editarsolicitud
public function modificarestado(){

  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_solicitud');
  $id = trim($_REQUEST["id"]);
  $rol= $_SESSION["role"];


  switch ($rol) {
    case '1':

redirect('restrinct');
      break;
    case '2':
    $data["estado"]= $this->model_solicitud->estado();
    $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
    $data["response"]=trim(isset($_REQUEST["response"]));
    $this->load->view('usuinterno/editarsolicitud',$data);

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
  $this->load->model('model_solicitud');
// Estas variables vienen de las vista editarpda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta

  $id=trim($_REQUEST["id"]);
  $estado=trim($_REQUEST["estado"]);
  $fechamodifi= date('d-m-Y H:i:s');


// La variable "datos" que esta con letras color verde, viene del foreach que traslada los datos del formulario de la vista edtarpda, y las variables con signo $ son las que mandas a traer arriba
  $data["datosoli"]= $this->model_solicitud->update($id,$estado,$fechamodifi);

  header("Location: http://192.168.0.10:8888/LabLaBendicion/index.php/mantenimientomm/modificarestado?response=1");
              die();

            }


public function delete(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_solicitud');
  $id = trim($_REQUEST["id"]);
  $data["datosoli"]= $this->model_solicitud->eliminarsolicitud($id);

  header("Location: http://192.168.0.10:8888/LabLaBendicion/index.php/mantenimientomm?response=1");
              die();

            }



            public function asociar(){
                  // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
              $this->load->helper('url');
                // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
              $this->load->library('session');

              $this->load->model('Model_Solicitud');
                $this->load->model('Model_Muestra');

              $rol= $_SESSION["role"];
              switch ($rol) {
                case '1':
                redirect('restrinct');

                  break;
                case '2':

                $this->load->view('usuinterno/mdatosasc');

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

            public function asociarnuevo(){
                  // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
              $this->load->helper('url');
                // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
              $this->load->library('session');

              $this->load->model('Model_Solicitud');
                $this->load->model('Model_Muestra');

              $rol= $_SESSION["role"];
              switch ($rol) {
                case '1':
                redirect('restrinct');

                  break;
                case '2':

                $this->load->view('usuinterno/asociardatos');

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






 ?>
