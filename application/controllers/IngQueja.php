<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class IngQueja extends CI_Controller{

  public function index(){
    // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
    // Cargamos el modelo que vamos a utilizar para esta función nuevo
    $this->load->model('model_quejasingresadas');
    $this->load->model('model_login');
// Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
// mostrará las vistas respectivas.
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':
      $user = $_SESSION["Dpi"];
        //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
        // con la función donde se encuentra la consulta en donde llamaremos los datos.
        $data["quejas"]= $this->model_quejasingresadas->listadoquejas($user);

        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('usuario/mostrarqueja',$data);
        break;
      case '2':
      $user = $_SESSION["Dpi"];
        //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
        // con la función donde se encuentra la consulta en donde llamaremos los datos.
        $data["quejas"]= $this->model_quejasingresadas->listadoquejas($user);

        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('operador/mostrarqueja',$data);

        break;

      case '3':
      $user = $_SESSION["Dpi"];
        //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
        // con la función donde se encuentra la consulta en donde llamaremos los datos.
        $data["quejas"]= $this->model_quejasingresadas->listadoquejas($user);

        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('centralizador/mostrarqueja',$data);
        break;
      case '4':
      $user = $_SESSION["Dpi"];
    //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
    // con la función donde se encuentra la consulta en donde llamaremos los datos.
    $data["quejas"]= $this->model_quejasingresadas->listadoquejas($user);

    // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
    $this->load->view('usuario/mostrarqueja',$data);

        break;




        case '5':
          $user = $_SESSION["Dpi"];
        //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
        // con la función donde se encuentra la consulta en donde llamaremos los datos.
        $data["quejas"]= $this->model_quejasingresadas->listadoquejas($user);

        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('receptor/mostrarqueja',$data);
          break;

      default:
      redirect('restrinct');
        // code...
        break;
    }

  }

  public function nuevaqueja(){
    // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
    // Cargamos el modelo que vamos a utilizar para esta función nuevo
    $this->load->model('model_pda');
      $this->load->model('model_quejasingresadas');
// Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
// mostrará las vistas respectivas.
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':
        //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
        // con la función donde se encuentra la consulta en donde llamaremos los datos.
        $correlativo = $this->model_quejasingresadas->siglas();

              foreach ($correlativo as $key) {


                $rs = "".$key->Correlativo."";
                // code...
              }

              $data["rs"]=$rs;
              $data["des"]=$des;
        $data["tiporegion"]= $this->model_pda->tipo_region();
        $data["puntosda"]= $this->model_pda->pda();
        // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
        $data["response"]=trim(isset($_REQUEST["response"]));
        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('usuario/ingresoqueja',$data);


        break;
      case '2':

      $correlativo = $this->model_quejasingresadas->siglas();

            foreach ($correlativo as $key) {


              $rs = "".$key->Correlativo."";
              // code...
            }

            $data["rs"]=$rs;
            $data["des"]=$des;
      //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
      // con la función donde se encuentra la consulta en donde llamaremos los datos.
      $data["tiporegion"]= $this->model_pda->tipo_region();
      $data["puntosda"]= $this->model_pda->pda();
      // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
      $data["response"]=trim(isset($_REQUEST["response"]));
      // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
      $this->load->view('operador/ingresoqueja',$data);


        break;
      case '3':
      $correlativo = $this->model_quejasingresadas->siglas();

            foreach ($correlativo as $key) {


              $rs = "".$key->Correlativo."";
              // code...
            }

            $data["rs"]=$rs;
            $data["des"]=$des;
      //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
      // con la función donde se encuentra la consulta en donde llamaremos los datos.
      $data["tiporegion"]= $this->model_pda->tipo_region();
      $data["puntosda"]= $this->model_pda->pda();
      // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
      $data["response"]=trim(isset($_REQUEST["response"]));
      // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
      $this->load->view('centralizador/ingresoqueja',$data);

        break;
      case '4':

      $correlativo = $this->model_quejasingresadas->siglas();

            foreach ($correlativo as $key) {


              $rs = "".$key->Correlativo."";
              // code...
            }

            $data["rs"]=$rs;
            $data["des"]=$des;
      //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
      // con la función donde se encuentra la consulta en donde llamaremos los datos.
      $data["tiporegion"]= $this->model_pda->tipo_region();
      $data["puntosda"]= $this->model_pda->pda();
      // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
      $data["response"]=trim(isset($_REQUEST["response"]));
      // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
      $this->load->view('usuario/ingresoqueja',$data);
        break;
        case '5':

        $correlativo = $this->model_quejasingresadas->siglas();

              foreach ($correlativo as $key) {


                $rs = "".$key->Correlativo."";
                // code...
              }

              $data["rs"]=$rs;
              $data["des"]=$des;

        //la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
        // con la función donde se encuentra la consulta en donde llamaremos los datos.
        $data["tiporegion"]= $this->model_pda->tipo_region();
        $data["puntosda"]= $this->model_pda->pda();
        // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
        $data["response"]=trim(isset($_REQUEST["response"]));
        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('receptor/ingresoqueja',$data);

          break;

      default:
      redirect('restrinct');
        // code...
        break;
    }

  }
 public function correlativo(){
$this->load->model('model_quejasingresadas');
$correlativo = $this->model_quejasingresadas->correlativo();
foreach ($correlativo as $key) {


  $rs = "QMS-".$key->id."-2020";
  // code...
}
echo $rs;

 }
  // Función para guardar los datos del formulario de la vista nuevopda
    public function guardar(){
      $this->load->helper('url');
      $this->load->library('session');
      $this->load->model('model_quejasingresadas');
      $this->load->model('model_login');

      $correlativo = $this->model_quejasingresadas->correlativo();
      foreach ($correlativo as $key) {


        $rs = "QMS-".$key->id."-2020";
        // code...
      }
  // Estas variables vienen de las vista nuevopda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta
      $cbox1=trim($_REQUEST["cbox1"]);
      $nombre=trim($_REQUEST["nombre"]);
      $correo=trim($_REQUEST["correo"]);
      $telefono=trim($_REQUEST["telefono"]);
      $pda=trim($_REQUEST["pda"]);
      $nombredos=trim($_REQUEST["nombredos"]);
      $desc=trim($_REQUEST["desc"]);
      $fecha= date('d-m-Y H:i:s');
      $user = $_SESSION["Dpi"];
      $nombrearch = $_FILES['archivo']['name'];
  // si se cumple la funicón para poder guardar los datos, mandamos los respectivos  datos
      if(empty($usuario)){
        // esta variable data agarra todos los datos que le estamos mandando, despues del data esta "guardar" esta es la accion del
        // formulario de la vista de nuevopda luego cargamos el modelo a donde vamos a mandar los datos para que los inserte en la culta
        // y luego se ejecute la consulta, lo de azul, es la función del modelo a donde vamos a mandar esos datos
        $data["guardar"] = $this->model_quejasingresadas->guardar($cbox1,$nombre,$correo,$telefono,$pda,$nombredos,$desc,$fecha,$user,$rs,$nombrearch);
        $this->solicitud_correo($correo,$rs);
        // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
        // es el mensaje de exito que se insertaron los datos
      header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/IngQueja/nuevaqueja?response=1");
        die();
      }
      // si no se cumple la funcíón if, se quedará en la misma url y no mostrar ningun mensaje y los datos no se guardaran
      else {
        header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/IngQueja/nuevaqueja");
        die();
        }

      }

      public function guardarcuentaha(){
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model_quejasingresadas');
        $this->load->model('model_login');

        $correlativo = $this->model_quejasingresadas->correlativo();
        foreach ($correlativo as $key) {

          $rs = "QMS-".$key->id."-2020";
          // code...
        }
    // Estas variables vienen de las vista nuevopda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta

        $nombre=trim($_REQUEST["nombre"]);
        $correo=trim($_REQUEST["correo"]);
        $telefono=trim($_REQUEST["telefono"]);
        $pda=trim($_REQUEST["pda"]);
        $nombredos=trim($_REQUEST["nombredos"]);
        $desc=trim($_REQUEST["desc"]);
        $fecha= date('d-m-Y H:i:s');
        $user = $_SESSION["Dpi"];
        $nombrearch = $_FILES['archivo']['name'];
    // si se cumple la funicón para poder guardar los datos, mandamos los respectivos  datos
        if(empty($usuario)){



          // esta variable data agarra todos los datos que le estamos mandando, despues del data esta "guardar" esta es la accion del
          // formulario de la vista de nuevopda luego cargamos el modelo a donde vamos a mandar los datos para que los inserte en la culta
          // y luego se ejecute la consulta, lo de azul, es la función del modelo a donde vamos a mandar esos datos
          $data["guardar"] = $this->model_quejasingresadas->guardarcuentaha($nombre,$correo,$telefono,$pda,$nombredos,$desc,$fecha,$user,$rs,$nombrearch);
          $this->solicitud_correo($correo,$rs);
          // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
          // es el mensaje de exito que se insertaron los datos
        header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/IngQueja/nuevaqueja?response=1");
          die();
        }
        // si no se cumple la funcíón if, se quedará en la misma url y no mostrar ningun mensaje y los datos no se guardaran
        else {
          header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/IngQueja/nuevaqueja");
          die();
          }

        }


      public function  solicitud_correo($correo,$rs){

	      $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://gator4167.hostgator.com',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@ltechweb.org',
            'smtp_pass' => 'pruebadecorreo123',
            'mailtype' => 'html',
            'charset' => 'UTF-8',
            'newline' => '\r\n',
            'crlf' => '\r\n',

        );


       $this->load->library('email',$config);

        $this->load->library('parser');

      //  $correo='diegisseb@gmail.com';

        $asunto="EXITO AL INGRESAR LA QUEJA ";
        $data ['correlativo'] = $rs;

        $enviar = $this->load->view('plantilla_correo_archivos',$data,TRUE);

      //  $enviar= "Señor cuentahabiente,  agradecemos su comunicación,  le informamos que su queja ha sido recibida exitosamente. Para el seguimiento o cualquier consulta relacionada, no olvide que el número de su queja es QMS-Correlativo-Añoactual".$rs;
        $this->email->from('bancomp@ddtechweb.com.gt', 'noreply');

        $this->email->to($correo);

        $this->email->subject($asunto);

        $this->email->message($enviar);

        $this->email->send();



        //$this->load->mail();



    }





}

 ?>
