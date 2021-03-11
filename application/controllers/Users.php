<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller{

  public function index(){
        // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
      // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
        // Cargamos el modelo que vamos a utilizar para esta función index
    $this->load->model('model_user');
    // Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
    // mostrará las vistas respectivas.
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':
      // declaramos la vari data para poder mostrar los datos del usuario, mandamos a traer la variable
      // usuarios que esta declarada en el foreach, cargamos el modelo a donde queremos que vaya a traer los datos en la
        $data["usuarios"]= $this->model_user->user();
        $data["response"]=trim(isset($_REQUEST["response"]));
        $this->load->view('admin/asusuarios',$data);


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
    $this->load->model('model_user');

    // Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
    // mostrará las vistas respectivas.
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':
      //la variable data va a traer los de la base de datos y los va a mostrar en "tiporol" y luego cargamos el modelo respectivo
      // con la función donde se encuentra la consulta en donde llamaremos los datos.
        $data["tiporol"]= $this->model_user->tipo_rol();
        // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
        $data["response"]=trim(isset($_REQUEST["response"]));
        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('admin/nuevoasusu',$data);


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


// Función para guardar los datos del formulario de la vista nuevoasusu
    public function guardar(){
      $this->load->helper('url');
      $this->load->library('session');
      $this->load->model('model_user');

      // Estas variables vienen de las vista nuevoasusu, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta
          $nombrepda=trim($_REQUEST["nombrepda"]);
      $dpi=trim($_REQUEST["dpi"]);
      $nombre=trim($_REQUEST["nombre"]);
      $tipo=trim($_REQUEST["rol"]);
      $usuario=trim($_REQUEST["usuario"]);
      $password=trim($_REQUEST["password"]);
      $fecha= date('d-m-Y H:i:s');
// si se cumple la funicón para poder guardar los datos, mandamos los respectivos  datos
      if(empty($usuario)){
          // si no se cumple la funcíón if, se quedará en la misma url y no mostrar ningun mensaje y los datos no se guardaran
        header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/users/nuevo");
        die();
      }

      else {
        // esta variable data agarra todos los datos que le estamos mandando, despues del data esta "guardar" esta es la accion del
        // formulario de la vista de nuevopda luego cargamos el modelo a donde vamos a mandar los datos para que los inserte en la culta
        // y luego se ejecute la consulta, lo de azul, es la función del modelo a donde vamos a mandar esos datos

        $data["guardar"] = $this->model_user->guardar($dpi,$nombre,$tipo,$usuario,$password,$fecha);
        // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
        // es el mensaje de exito que se insertaron los datos
      header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/users/nuevo?response=1");
        die();
        }

      }

      public function update(){

    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_user');
    //esta variable id almacena el id que le enviamos de la vista admin en el botón editar para poder
    // editar el punto de atención que queremos hacer cambios
    $id = trim($_REQUEST["id"]);
    $rol= $_SESSION["role"];


    switch ($rol) {
      case '1':
      //la variable data va a traer los de la base de datos y los va a mostrar en "tiporol" y luego cargamos el modelo respectivo
      // con la función donde se encuentra la consulta en donde llamaremos los datos.
      $data["tiporol"]= $this->model_user->tipo_rol();
      // esta varaible data tambien trae la variable datos del foreach de la vista editarasusuarios, para que muestre los datos
      // que tiene segun el id seleccionado, cargamos el modelo y la función donde mandamos a llamar los datos y
      // le cargamos la variable id para que muestre los datos segun el id seleccionado
      $data["datos"]= $this->model_user->selectid($id);
        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
      $this->load->view('admin/editarasusuarios',$data);

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

// Funcionalidad para editar el formulario de los puntos de atención vista editarasusuarios
  public function updatedata(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_user');
    // Estas variables vienen de las vista editarpda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta

    $dpi=trim($_REQUEST["dpi"]);
    $nombre=trim($_REQUEST["nombre"]);
    $tipo=trim($_REQUEST["rol"]);
    $usuario=trim($_REQUEST["usuario"]);
    $password=trim($_REQUEST["password"]);
    $fechamodi= date('d-m-Y H:i:s');

// La variable "datos" que esta con letras color verde, viene del foreach que traslada los datos del formulario de la vista edtarpda, y las variables con signo $ son las que mandas a traer arriba
     $data["datos"]= $this->model_user->update($dpi,$nombre,$tipo,$usuario,$password,$fechamodi);
// si se modifican los datos redireccionará a esta url, si no, no modificará los datos
    header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/users?response=1");
                die();

  }







}


 ?>
