
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersPda extends CI_Controller {

  public function index()
  {

    $this->load->helper('url');
      $this->load->library('session');
        // Cargamos el modelo que vamos a utilizar para esta función nuevo
    $this->load->model('model_userpda');
      // Cargamos el modelo que vamos a utilizar para esta función nuevo
    $this->load->model('model_pda');

    // Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
    // mostrará las vistas respectivas.
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':
        // code...
        if (empty($_REQUEST["region"])) {
                    // code...
                    // declaramos la vari data para poder mostrar los datos del usuario, mandamos a traer la variable
                    // usuarios que esta declarada en el foreach, cargamos el modelo a donde queremos que vaya a traer los datos en la vista
                    $data["usuarios"]= $this->model_userpda->userpda();
                    //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
                    // con la función donde se encuentra la consulta en donde llamaremos los datos.
                    $data["tiporegion"]= $this->model_pda->puntosdactivos();
                    $data["response"]=trim(isset($_REQUEST["response"]));
                    $this->load->view('usuario/pdausuarios',$data);

                  }else{
                    if (isset($_REQUEST["region"])) {
                      // esta variable codigo la llenamos con el valor del name que toma cuando se elige una region de la vista usuario y
                      // mandamos el id
                      $codigo = $_REQUEST["region"];
                      // declaramos la vari data para poder mostrar los datos del usuario, mandamos a traer la variable
                      // usuarios que esta declarada en el foreach, cargamos el modelo a donde queremos que vaya a traer los datos en la vista;
                      $data["usuarios"] =$this->model_userpda->buscar($codigo);
                      // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
                      $data["response"]=trim(isset($_REQUEST["response"]));
                        // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
                      $data["tiporegion"]= $this->model_pda->puntosdactivos();
                        $this->load->view('usuario/pdausuarios',$data);
                      // code...
                    }else{
                      // esta función dejara nada más los valores como esta si no se realiza ninguna busqueda
                    $data["usuarios"]= $this->model_userpda->user();
                      $data["tiporegion"]= $this->model_pda->puntosdactivos();
                      $data["response"]=trim(isset($_REQUEST["response"]));
                        $this->load->view('usuario/pdausuarios',$data);
                    }
                  }

        break;
      case '2':
        // code...
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




public function dpi(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_user');
  $data["dpi"]= $this->model_user->mostrardpi();

  echo json_encode($data["dpi"]);


}





public function nuevo(){

  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_pda');
  $this->load->model('model_user');
//  $id = id2;


  $rol= $_SESSION["role"];
  switch ($rol) {
    case '1':
      // code...
      $valor="document.write(opcion)";

      $data["tiporegion"]= $this->model_pda->tipo_region();
      $data["datos"]= $this->model_pda->nombre($valor);
      //$id=trim(isset($_REQUEST["region"]));
     //$data["puntosda"]= $this->model_pda->pdanuevo($id);

     $data["puntosda"]= $this->model_pda->pda();
      $data["tipocargos"]= $this->model_pda->tipo_cargo();
      $data["tiporol"]= $this->model_user->tipo_rol();
      $data["response"]=trim(isset($_REQUEST["response"]));
      $this->load->view('usuario/nuevousuariopda',$data);
      break;
    case '2':
      // code...
      redirect('restrinct');
      break;
    case '3':

    redirect('restrinct');


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

public function guardar(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_userpda');



  $pda = trim($_REQUEST["pda"]);
  $dpi = trim($_REQUEST["dpi"]);
  $correo = trim($_REQUEST["correo"]);
  $cargo = trim($_REQUEST["cargo"]);
  $fecha= date('d-m-Y H:i:s');


  if (empty($usuario)) {
    $data["guardar"] = $this->model_userpda->guardar($pda,$dpi,$correo,$cargo,$fecha);
    header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/userspda/nuevo?response=1");
    die();


  }else{
    echo "Error, no se pudieron guardar los datos";
    header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/userspda/nuevo");
    die();

  }
}



public function update(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_userpda');
  $this->load->model('model_pda');
   $id = trim($_REQUEST["id"]);

  $rol= $_SESSION["role"];
  switch ($rol) {
    case '1':
      // code...
      $data["estado"]= $this->model_pda->estado($id);
      $data["datos"]= $this->model_userpda->selectindi($id);
      $data["tipocargos"]= $this->model_pda->tipo_cargo();
      $this->load->view('usuario/editarusuariopda',$data);


      break;
    case '2':
      // code...
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

public function updatedata(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_userpda');

  $id=trim($_REQUEST["id"]);
  $correo=trim($_REQUEST["correo"]);
  $cargo=trim($_REQUEST["cargo"]);
  $estado=trim($_REQUEST["estado"]);
  $fechamodi= date('d-m-Y H:i:s');

  $data["datos"]= $this->model_userpda->update($id,$correo,$cargo,$estado,$fechamodi);

  header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/userspda?response=1");
              die();

            }

}
