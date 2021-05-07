<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Muestra extends CI_Controller{

  public function index(){
      // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
  $this->load->helper('url');
    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
  $this->load->library('session');
  $this->load->model('Model_Muestra');
  $this->load->model('model_solicitud');
  $id = trim($_REQUEST["id"]);
  $rol= $_SESSION["role"];
  switch ($rol) {
    case '1':

  redirect('restrinct');

      break;
    case '2':

   //Filtrar las muestras
    $numerosolicitud = trim($_REQUEST["numerosolicitud"]);
    $noitem = trim($_REQUEST["noitem"]);

  if (empty($noitem)) {

      if (empty($numerosolicitud)) {
        $data["response"]=trim(isset($_REQUEST["response"]));
         $data["responsemuestra"]=trim(isset($_REQUEST["responsemuestra"]));
          $data["datosmuestra"]= $this->Model_Muestra->datosmuestra();
            $this->load->view('usuinterno/mdatosmuestra',$data);

      }else {


        $data["datosmuestra"]= $this->Model_Muestra->busquedafiltro($numerosolicitud);
        $data["response"]=trim(isset($_REQUEST["response"]));
        $data["responsemuestra"]=trim(isset($_REQUEST["responsemuestra"]));


        $this->load->view('usuinterno/mdatosmuestra',$data);

      }

    }else {


      $data["datosmuestra"]= $this->Model_Muestra->busquedafiltroporitem($noitem);
      $data["response"]=trim(isset($_REQUEST["response"]));
      $data["responsemuestra"]=trim(isset($_REQUEST["responsemuestra"]));


      $this->load->view('usuinterno/mdatosmuestra',$data);

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




    public function nuevo(){
        // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
      // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
    $this->load->model('Model_Muestra');
    $this->load->model('model_solicitud');
    $id = trim($_REQUEST["id"]);
    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':

    redirect('restrinct');

        break;
      case '2':

      $codigo = $this->Model_Muestra->ultimamuestra();

      foreach ($codigo as $key) {

        $ids = "".$key->idMuestra."";
        // code...
      }

      $data["ids"]=$ids;

        $data["tipomuestra"]= $this->Model_Muestra->tipomuestra();
        $data["datos"]= $this->model_solicitud->sidSolicitud($id);
        $data["response"]=trim(isset($_REQUEST["response"]));
        $data["umedida"]= $this->Model_Muestra->umedida();
        $this->load->view('usuinterno/nuevamuestra',$data);
        if (isset($_POST['subir'])) {
        $nombre = $_FILES['archivo']['name'];
        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $ruta = $_FILES['archivo']['tmp_name'];
        $destino = "assets/archivos/". $nombre;

     if ($nombre != "") {
      if (copy($ruta, $destino)) {
        $tipodemuestra=trim($_REQUEST["tipodemuestra"]);
        $presentacion=trim($_REQUEST["presentacion"]);
        $cantunid=trim($_REQUEST["cantunid"]);
        $unidadmed=trim($_REQUEST["unidadmed"]);
        $fecha= date('d-m-Y H:i:s');


     }

       $this->Model_Muestra->guardar($tipodemuestra,$presentacion,$cantunid,$unidadmed,$fecha,$nombre,$tamanio,$tipo,$id);
       header("Location: http://192.168.0.10:8888/LabLaBendicion/index.php/muestra/nuevo?response=1");


      }

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




  public function mostrar(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('Model_Muestra');
  $id=trim($_REQUEST["id"]);
 $data=$this->Model_Muestra->mostrare($id);

foreach ($data as $key) {
  // code...
  if($key->Nombre_archivo==""){
   echo "<p>NO tiene archivos</p>";
   }else{

    header('content-type: application/pdf');
    readfile('assets/archivos/'.$key->Nombre_archivo);

   }
}

 //var_dump($data);
 //echo $data;

}

  public function guardar(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Model_Muestra');

    if (isset($_POST['btnSend'])) {
    $nombre = $_FILES['archivo']['name'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "assets/archivos/". $nombre;

 if ($nombre != "") {
  if (copy($ruta, $destino)) {
    $tipodemuestra=trim($_REQUEST["tipodemuestra"]);
    $presentacion=trim($_REQUEST["presentacion"]);
    $cantunid=trim($_REQUEST["cantunid"]);
    $unidadmed=trim($_REQUEST["unidadmed"]);
    $fecha= date('d-m-Y H:i:s');


 }

 if(empty($usuario)){

   $data["guardar"] = $this->Model_Muestra->guardar($tipodemuestra,$presentacion,$cantunid,$unidadmed,$fecha,$nombre);
   header("Location: http://192.168.0.10:8888/LabLaBendicion/index.php/muestra/nuevo?response=1");
   die();
 }

 else {
   header("Location:  http://192.168.0.10:8888/LabLaBendicion/index.php/muestra/nuevo");
   die();
   }


  }

}



    }


    public function delete(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Model_Muestra');

        $id = trim($_REQUEST["id"]);
        $data["datosmuestra"] = $this->Model_Muestra->delete($id);

        header("Location: http://192.168.0.10:8888/LabLaBendicion/index.php/muestra?responsemuestra=1");
        die();

}









    }

?>
