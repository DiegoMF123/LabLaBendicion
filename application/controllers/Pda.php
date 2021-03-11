<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pda extends CI_Controller{
  // esta función hace referencia para poder mandar a llamar la vista que
  // le queremos mandar.
  public function nuevo(){
    // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
    // Cargamos el modelo que vamos a utilizar para esta función nuevo
    $this->load->model('model_pda');
// Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
// mostrará las vistas respectivas.
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':

      $codigo = $this->model_pda->codigo();
      $nompda = $this->model_pda->nombreultimopda();

      foreach ($codigo as $key) {


        $ids = "".$key->IDPuntos_De_Atencion."";
        // code...
      }



      foreach ($nompda as $key) {


        $rs = "".$key->Nombre_Punto."";
        // code...
      }

        $data["ids"]=$ids;
        $data["rs"]=$rs;
        //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
        // con la función donde se encuentra la consulta en donde llamaremos los datos.
        $data["tiporegion"]= $this->model_pda->tipo_region();
        // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
        $data["response"]=trim(isset($_REQUEST["response"]));
        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('admin/nuevopda',$data);


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
 $this->load->model('model_pda');
 $codigo = $this->model_pda->codigo();
 $nompda = $this->model_pda->nombreultimopda();

 foreach ($codigo as $key) {


   $ids = "ID-".$key->IDPuntos_De_Atencion." ";
   // code...
 }
 echo $ids;



 foreach ($nompda as $key) {


   $rs = "Nombre pda-".$key->Nombre_Punto."";
   // code...
 }
 echo $rs;

  }


// Función para guardar los datos del formulario de la vista nuevopda
  public function guardar(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_pda');

    $correlativo = $this->model_pda->correlativopda();
    foreach ($correlativo as $key) {

      $rs = "PDA-".$key->IDPuntos_De_Atencion."-2020";
      // code...
    }
// Estas variables vienen de las vista nuevopda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta
    $nombrepda=trim($_REQUEST["nombrepda"]);
    $tipo=trim($_REQUEST["tipo"]);
    $fecha= date('d-m-Y H:i:s');
// si se cumple la funicón para poder guardar los datos, mandamos los respectivos  datos
    if(empty($usuario)){
      // esta variable data agarra todos los datos que le estamos mandando, despues del data esta "guardar" esta es la accion del
      // formulario de la vista de nuevopda luego cargamos el modelo a donde vamos a mandar los datos para que los inserte en la culta
      // y luego se ejecute la consulta, lo de azul, es la función del modelo a donde vamos a mandar esos datos

      $data["guardar"] = $this->model_pda->guardar($nombrepda,$tipo,$fecha,$rs);
      // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
      // es el mensaje de exito que se insertaron los datos
    header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/pda/nuevo?response=1");
      die();
    }
    // si no se cumple la funcíón if, se quedará en la misma url y no mostrar ningun mensaje y los datos no se guardaran
    else {
      header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/pda/nuevo");
      die();
      }

    }


// Función que Sirve para mostrar la vista de editarpda
    public function update(){

  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_pda');
  //esta variable id almacena el id que le enviamos de la vista admin en el botón editar para poder
  // editar el punto de atención que queremos hacer cambios
  $id = trim($_REQUEST["id"]);
  $rol= $_SESSION["role"];


  switch ($rol) {
    case '1':
    // esta variable data trae los datos de los estados respectivos, cuando queramos editar el estado
    // estado viene del name del select de la vista editarpda carga el modelo y la función estado donde esta nuestra
    // consulta y enviamos el id para que muestre el dato que se tenga seleccionado.
    $data["estado"]= $this->model_pda->estado($id);
    // esta varaible data tambien trae la variable datos del foreach de la vista editarpda, para que muestre los datos
    // que tiene segun el id seleccionado, cargamos el modelo y la función donde mandamos a llamar los datos y
    // le cargamos la variable id para que muestre los datos segun el id seleccionado
    $data["datos"]= $this->model_pda->selectindi($id);
      // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
    $this->load->view('admin/editarpda',$data);

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
  $this->load->model('model_pda');
// Estas variables vienen de las vista editarpda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta

  $nombrepda=trim($_REQUEST["nombrepda"]);
  $idpda=trim($_REQUEST["idpda"]);
  $nombrepda=trim($_REQUEST["nombrepda"]);
  $estado=trim($_REQUEST["estado"]);
  $fechamodi= date('d-m-Y H:i:s');


// La variable "datos" que esta con letras color verde, viene del foreach que traslada los datos del formulario de la vista edtarpda, y las variables con signo $ son las que mandas a traer arriba
  $data["datos"]= $this->model_pda->update($idpda,$nombrepda,$estado,$fechamodi);
// si se modifican los datos redireccionará a esta url, si no, no modificará los datos
  header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/welcome/admin?response=1");
              die();

}








}



 ?>
