<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Muestra extends CI_Controller{

    public function nuevo(){
        // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
      // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
    $this->load->model('Model_Muestra');

    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':

      //  $data["tiposoporte"]= $this->model_solicitud->tiposoporte();
      //  $this->load->view('usuinterno/nuevamuestra',$data);

        break;
      case '2':
        $data["tipomuestra"]= $this->Model_Muestra->tipomuestra();
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

       $this->Model_Muestra->guardar($tipodemuestra,$presentacion,$cantunid,$unidadmed,$fecha,$nombre,$tamanio,$tipo);
       header("Location: http://192.168.0.7:8888/LabLaBendicion/index.php/muestra/nuevo?response=1");


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
   header("Location: http://192.168.0.7:8888/LabLaBendicion/index.php/muestra/nuevo?response=1");
   die();
 }

 else {
   header("Location:  http://192.168.0.7:8888/LabLaBendicion/index.php/muestra/nuevo");
   die();
   }


  }

}



    }





    }

?>
