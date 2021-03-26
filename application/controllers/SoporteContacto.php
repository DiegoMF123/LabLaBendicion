<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SoporteContacto extends CI_Controller{

  public function index(){
        // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
      // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
    $this->load->model('model_solicitud');

    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':

        $data["tiposoporte"]= $this->model_solicitud->tiposoporte();
        $this->load->view('usuario/soportecontacto',$data);

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
}

?>