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
      $this->load->model('model_login');

    $rol= $_SESSION["role"];
    switch ($rol) {
      case '1':

      $user = $_SESSION["idusuario"];

      $data["datosoli"]= $this->Model_Solicitud->datosSolicitudusuario($user);
      $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
      $data["response"]=trim(isset($_REQUEST["response"]));
      $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
      $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

            $this->load->view('usuario/mantenimientomm',$data);

        break;
      case '2':

      $estadosoli= trim($_REQUEST["estadosoli"]);
      $noexpediente = trim($_REQUEST["noexpediente"]);
      $nosolicitud = trim($_REQUEST["nosolicitud"]);
      $tiposolid = trim($_REQUEST["tiposolid"]);
      $nosoporte = trim($_REQUEST["nosoporte"]);
      $nit = trim($_REQUEST["nit"]);
      $usuarioAsignacion = trim($_REQUEST["usuario"]);



       if (empty($estadosoli)) {

        //$data["tareas"]= $this->model_subproyectos->listado_subproyectos();
          if (empty($noexpediente)) {
            //si no posee datos muestra toda la tabla
                  if (empty($nosolicitud)) {
                   //si no posee datos  solicitud
                         if (empty($tiposolid)) {
                           //si no posee datos  tipo solicitud
                                 if (empty($nosoporte)) {
                                   //si no posee datos  no soporte
                                         if (empty($nit)) {
                                           //si no posee datos nit
                                                 if (empty($usuarioAsignacion)) {
                                                   //si no posee datos Usuario
                                                   $data["datosoli"]= $this->Model_Solicitud->datosSolicitud();
                                                   $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                   $data["response"]=trim(isset($_REQUEST["response"]));
                                                   $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                   $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

                                                         $this->load->view('usuinterno/mantenimientomm',$data);
                                                 }
                                                 else {
                                                       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroUsuarioAsigna($usuarioAsignacion);
                                                       $data["response"]=trim(isset($_REQUEST["response"]));
                                                       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                                       $this->load->view('usuinterno/mantenimientomm',$data);
                                                 }
                                         }
                                         else {
                                               $data["datosoli"]= $this->Model_Solicitud->busquedafiltroNit($nit);
                                               $data["response"]=trim(isset($_REQUEST["response"]));
                                               $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                               $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                               $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                               $this->load->view('usuinterno/mantenimientomm',$data);
                                         }
                                 }
                                 else {
                                       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSoporte($nosoporte);
                                       $data["response"]=trim(isset($_REQUEST["response"]));
                                       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                       $this->load->view('usuinterno/mantenimientomm',$data);
                                 }
                         }

                         else {
                               $data["datosoli"]= $this->Model_Solicitud->busquedafiltroTipoSolicitud($tiposolid);
                               $data["response"]=trim(isset($_REQUEST["response"]));
                               $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                               $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                               $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                               $this->load->view('usuinterno/mantenimientomm',$data);
                         }
                 }
                 else {
                       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSolicitud($nosolicitud);
                       $data["response"]=trim(isset($_REQUEST["response"]));
                       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                       $this->load->view('usuinterno/mantenimientomm',$data);
                 }

          }
          else {
                $data["datosoli"]= $this->Model_Solicitud->busquedafiltroExpendiente($noexpediente);
                $data["response"]=trim(isset($_REQUEST["response"]));
                $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                $this->load->view('usuinterno/mantenimientomm',$data);
          }


       }

    else {

     $data["datosoli"]= $this->Model_Solicitud->busquedafiltroEstado($estadosoli);
     $data["response"]=trim(isset($_REQUEST["response"]));
     $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
     $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
     $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

     $this->load->view('usuinterno/mantenimientomm',$data);

   }







        break;
      case '3':

      $estadosoli= trim($_REQUEST["estadosoli"]);
      $noexpediente = trim($_REQUEST["noexpediente"]);
      $nosolicitud = trim($_REQUEST["nosolicitud"]);
      $tiposolid = trim($_REQUEST["tiposolid"]);
      $nosoporte = trim($_REQUEST["nosoporte"]);
      $nit = trim($_REQUEST["nit"]);
      $usuarioAsignacion = trim($_REQUEST["usuario"]);



       if (empty($estadosoli)) {

        //$data["tareas"]= $this->model_subproyectos->listado_subproyectos();
          if (empty($noexpediente)) {
            //si no posee datos muestra toda la tabla
                  if (empty($nosolicitud)) {
                   //si no posee datos  solicitud
                         if (empty($tiposolid)) {
                           //si no posee datos  tipo solicitud
                                 if (empty($nosoporte)) {
                                   //si no posee datos  no soporte
                                         if (empty($nit)) {
                                           //si no posee datos nit
                                                 if (empty($usuarioAsignacion)) {
                                                   //si no posee datos Usuario
                                                   $data["datosoli"]= $this->Model_Solicitud->datosSolicitudautorizador();
                                                   $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                   $data["response"]=trim(isset($_REQUEST["response"]));
                                                   $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                   $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

                                                         $this->load->view('autorizador/mantenimientomm',$data);
                                                 }
                                                 else {
                                                       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroUsuarioAsigna($usuarioAsignacion);
                                                       $data["response"]=trim(isset($_REQUEST["response"]));
                                                       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                                       $this->load->view('autorizador/mantenimientomm',$data);
                                                 }
                                         }
                                         else {
                                               $data["datosoli"]= $this->Model_Solicitud->busquedafiltroNit($nit);
                                               $data["response"]=trim(isset($_REQUEST["response"]));
                                               $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                               $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                               $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                               $this->load->view('autorizador/mantenimientomm',$data);
                                         }
                                 }
                                 else {
                                       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSoporte($nosoporte);
                                       $data["response"]=trim(isset($_REQUEST["response"]));
                                       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                       $this->load->view('autorizador/mantenimientomm',$data);
                                 }
                         }

                         else {
                               $data["datosoli"]= $this->Model_Solicitud->busquedafiltroTipoSolicitud($tiposolid);
                               $data["response"]=trim(isset($_REQUEST["response"]));
                               $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                               $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                               $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                               $this->load->view('autorizador/mantenimientomm',$data);
                         }
                 }
                 else {
                       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSolicitud($nosolicitud);
                       $data["response"]=trim(isset($_REQUEST["response"]));
                       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                       $this->load->view('autorizador/mantenimientomm',$data);
                 }

          }
          else {
                $data["datosoli"]= $this->Model_Solicitud->busquedafiltroExpendiente($noexpediente);
                $data["response"]=trim(isset($_REQUEST["response"]));
                $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                $this->load->view('autorizador/mantenimientomm',$data);
          }


       }

    else {

     $data["datosoli"]= $this->Model_Solicitud->busquedafiltroEstado($estadosoli);
     $data["response"]=trim(isset($_REQUEST["response"]));
     $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
     $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
     $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

     $this->load->view('autorizador/mantenimientomm',$data);

   }


        break;
      case '4':
      $estadosoli= trim($_REQUEST["estadosoli"]);
      $noexpediente = trim($_REQUEST["noexpediente"]);
      $nosolicitud = trim($_REQUEST["nosolicitud"]);
      $tiposolid = trim($_REQUEST["tiposolid"]);
      $nosoporte = trim($_REQUEST["nosoporte"]);
      $nit = trim($_REQUEST["nit"]);
      $usuarioAsignacion = trim($_REQUEST["usuario"]);



       if (empty($estadosoli)) {

        //$data["tareas"]= $this->model_subproyectos->listado_subproyectos();
          if (empty($noexpediente)) {
            //si no posee datos muestra toda la tabla
                  if (empty($nosolicitud)) {
                   //si no posee datos  solicitud
                         if (empty($tiposolid)) {
                           //si no posee datos  tipo solicitud
                                 if (empty($nosoporte)) {
                                   //si no posee datos  no soporte
                                         if (empty($nit)) {
                                           //si no posee datos nit
                                                 if (empty($usuarioAsignacion)) {
                                                   //si no posee datos Usuario
                                                   $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudanalistados();
                                                   $data["datosoli"]= $this->Model_Solicitud->datosSolicitudanalista();
                                                   $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                   $data["response"]=trim(isset($_REQUEST["response"]));
                                                   $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                   $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

                                                         $this->load->view('analista/mantenimientomm',$data);
                                                 }
                                                 else {
                                                   $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudanalistados();
                                                       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroUsuarioAsigna($usuarioAsignacion);
                                                       $data["response"]=trim(isset($_REQUEST["response"]));
                                                       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                                       $this->load->view('analista/mantenimientomm',$data);
                                                 }
                                         }
                                         else {
                                           $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudanalistados();
                                               $data["datosoli"]= $this->Model_Solicitud->busquedafiltroNit($nit);
                                               $data["response"]=trim(isset($_REQUEST["response"]));
                                               $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                               $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                               $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                               $this->load->view('analista/mantenimientomm',$data);
                                         }
                                 }
                                 else {
                                   $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudanalistados();
                                       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSoporte($nosoporte);
                                       $data["response"]=trim(isset($_REQUEST["response"]));
                                       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                       $this->load->view('analista/mantenimientomm',$data);
                                 }
                         }

                         else {
                           $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudanalistados();
                               $data["datosoli"]= $this->Model_Solicitud->busquedafiltroTipoSolicitud($tiposolid);
                               $data["response"]=trim(isset($_REQUEST["response"]));
                               $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                               $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                               $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                               $this->load->view('analista/mantenimientomm',$data);
                         }
                 }
                 else {
                   $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudanalistados();
                       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSolicitud($nosolicitud);
                       $data["response"]=trim(isset($_REQUEST["response"]));
                       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                       $this->load->view('analista/mantenimientomm',$data);
                 }

          }
          else {
            $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudanalistados();
                $data["datosoli"]= $this->Model_Solicitud->busquedafiltroExpendiente($noexpediente);
                $data["response"]=trim(isset($_REQUEST["response"]));
                $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                $this->load->view('analista/mantenimientomm',$data);
          }


       }

    else {

     $data["datosoli"]= $this->Model_Solicitud->busquedafiltroEstado($estadosoli);
     $data["response"]=trim(isset($_REQUEST["response"]));
     $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
     $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
     $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

     $this->load->view('analista/mantenimientomm',$data);

   }
        break;
        case '5':

        $estadosoli= trim($_REQUEST["estadosoli"]);
        $noexpediente = trim($_REQUEST["noexpediente"]);
        $nosolicitud = trim($_REQUEST["nosolicitud"]);
        $tiposolid = trim($_REQUEST["tiposolid"]);
        $nosoporte = trim($_REQUEST["nosoporte"]);
        $nit = trim($_REQUEST["nit"]);
        $usuarioAsignacion = trim($_REQUEST["usuario"]);



         if (empty($estadosoli)) {

          //$data["tareas"]= $this->model_subproyectos->listado_subproyectos();
            if (empty($noexpediente)) {
              //si no posee datos muestra toda la tabla
                    if (empty($nosolicitud)) {
                     //si no posee datos  solicitud
                           if (empty($tiposolid)) {
                             //si no posee datos  tipo solicitud
                                   if (empty($nosoporte)) {
                                     //si no posee datos  no soporte
                                           if (empty($nit)) {
                                             //si no posee datos nit
                                                   if (empty($usuarioAsignacion)) {
                                                     //si no posee datos Usuario
                                                     $data["datosoli"]= $this->Model_Solicitud->datosSolicitudjefe();
                                                     $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudjefefinalizado();
                                                      $data["datosolitres"]= $this->Model_Solicitud->datosSolicitudjeferechazado();
                                                     $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                     $data["response"]=trim(isset($_REQUEST["response"]));
                                                     $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                     $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

                                                           $this->load->view('jefe/mantenimientomm',$data);
                                                   }
                                                   else {
                                                     $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudjefefinalizado();
                                                      $data["datosolitres"]= $this->Model_Solicitud->datosSolicitudjeferechazado();
                                                         $data["datosoli"]= $this->Model_Solicitud->busquedafiltroUsuarioAsigna($usuarioAsignacion);
                                                         $data["response"]=trim(isset($_REQUEST["response"]));
                                                         $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                         $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                         $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                                         $this->load->view('jefe/mantenimientomm',$data);
                                                   }
                                           }
                                           else {
                                             $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudjefefinalizado();
                                              $data["datosolitres"]= $this->Model_Solicitud->datosSolicitudjeferechazado();
                                                 $data["datosoli"]= $this->Model_Solicitud->busquedafiltroNit($nit);
                                                 $data["response"]=trim(isset($_REQUEST["response"]));
                                                 $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                 $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                 $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                                 $this->load->view('jefe/mantenimientomm',$data);
                                           }
                                   }
                                   else {
                                     $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudjefefinalizado();
                                      $data["datosolitres"]= $this->Model_Solicitud->datosSolicitudjeferechazado();
                                         $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSoporte($nosoporte);
                                         $data["response"]=trim(isset($_REQUEST["response"]));
                                         $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                         $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                         $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                         $this->load->view('jefe/mantenimientomm',$data);
                                   }
                           }

                           else {
                             $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudjefefinalizado();
                              $data["datosolitres"]= $this->Model_Solicitud->datosSolicitudjeferechazado();
                                 $data["datosoli"]= $this->Model_Solicitud->busquedafiltroTipoSolicitud($tiposolid);
                                 $data["response"]=trim(isset($_REQUEST["response"]));
                                 $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                 $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                 $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                 $this->load->view('jefe/mantenimientomm',$data);
                           }
                   }
                   else {
                     $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudjefefinalizado();
                      $data["datosolitres"]= $this->Model_Solicitud->datosSolicitudjeferechazado();
                         $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSolicitud($nosolicitud);
                         $data["response"]=trim(isset($_REQUEST["response"]));
                         $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                         $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                         $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                         $this->load->view('jefe/mantenimientomm',$data);
                   }

            }
            else {
              $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudjefefinalizado();
               $data["datosolitres"]= $this->Model_Solicitud->datosSolicitudjeferechazado();
                  $data["datosoli"]= $this->Model_Solicitud->busquedafiltroExpendiente($noexpediente);
                  $data["response"]=trim(isset($_REQUEST["response"]));
                  $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                  $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                  $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                  $this->load->view('jefe/mantenimientomm',$data);
            }


         }

      else {
        $data["datosolidos"]= $this->Model_Solicitud->datosSolicitudjefefinalizado();
         $data["datosolitres"]= $this->Model_Solicitud->datosSolicitudjeferechazado();

       $data["datosoli"]= $this->Model_Solicitud->busquedafiltroEstado($estadosoli);
       $data["response"]=trim(isset($_REQUEST["response"]));
       $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
       $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
       $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

       $this->load->view('jefe/mantenimientomm',$data);

     }
          break;

          case '6':

                  $estadosoli= trim($_REQUEST["estadosoli"]);
                  $noexpediente = trim($_REQUEST["noexpediente"]);
                  $nosolicitud = trim($_REQUEST["nosolicitud"]);
                  $tiposolid = trim($_REQUEST["tiposolid"]);
                  $nosoporte = trim($_REQUEST["nosoporte"]);
                  $nit = trim($_REQUEST["nit"]);
                  $usuarioAsignacion = trim($_REQUEST["usuario"]);



                   if (empty($estadosoli)) {

                    //$data["tareas"]= $this->model_subproyectos->listado_subproyectos();
                      if (empty($noexpediente)) {
                        //si no posee datos muestra toda la tabla
                              if (empty($nosolicitud)) {
                               //si no posee datos  solicitud
                                     if (empty($tiposolid)) {
                                       //si no posee datos  tipo solicitud
                                             if (empty($nosoporte)) {
                                               //si no posee datos  no soporte
                                                     if (empty($nit)) {
                                                       //si no posee datos nit
                                                             if (empty($usuarioAsignacion)) {
                                                               //si no posee datos Usuario
                                                               $data["datosoli"]= $this->Model_Solicitud->datosSolicitudasignacion();
                                                               $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                               $data["response"]=trim(isset($_REQUEST["response"]));
                                                               $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                               $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

                                                                     $this->load->view('usuarioasignacion/mantenimientomm',$data);
                                                             }
                                                             else {
                                                                   $data["datosoli"]= $this->Model_Solicitud->busquedafiltroUsuarioAsigna($usuarioAsignacion);
                                                                   $data["response"]=trim(isset($_REQUEST["response"]));
                                                                   $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                                   $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                                   $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                                                   $this->load->view('usuarioasignacion/mantenimientomm',$data);
                                                             }
                                                     }
                                                     else {
                                                           $data["datosoli"]= $this->Model_Solicitud->busquedafiltroNit($nit);
                                                           $data["response"]=trim(isset($_REQUEST["response"]));
                                                           $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                           $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                           $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                                           $this->load->view('usuarioasignacion/mantenimientomm',$data);
                                                     }
                                             }
                                             else {
                                                   $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSoporte($nosoporte);
                                                   $data["response"]=trim(isset($_REQUEST["response"]));
                                                   $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                                   $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                                   $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                                   $this->load->view('usuarioasignacion/mantenimientomm',$data);
                                             }
                                     }

                                     else {
                                           $data["datosoli"]= $this->Model_Solicitud->busquedafiltroTipoSolicitud($tiposolid);
                                           $data["response"]=trim(isset($_REQUEST["response"]));
                                           $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                           $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                           $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                           $this->load->view('usuarioasignacion/mantenimientomm',$data);
                                     }
                             }
                             else {
                                   $data["datosoli"]= $this->Model_Solicitud->busquedafiltroSolicitud($nosolicitud);
                                   $data["response"]=trim(isset($_REQUEST["response"]));
                                   $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                                   $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                                   $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                                   $this->load->view('usuarioasignacion/mantenimientomm',$data);
                             }

                      }
                      else {
                            $data["datosoli"]= $this->Model_Solicitud->busquedafiltroExpendiente($noexpediente);
                            $data["response"]=trim(isset($_REQUEST["response"]));
                            $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                            $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                            $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();
                            $this->load->view('usuarioasignacion/mantenimientomm',$data);
                      }


                   }

                else {

                 $data["datosoli"]= $this->Model_Solicitud->busquedafiltroEstado($estadosoli);
                 $data["response"]=trim(isset($_REQUEST["response"]));
                 $data["tiposolicitud"]= $this->Model_Solicitud->tiposolicitud();
                 $data["usuarioA"]= $this->Model_Solicitud->usuarioasignacion();
                 $data["estadoS"]= $this->Model_Solicitud->estadosolicitud();

                 $this->load->view('usuarioasignacion/mantenimientomm',$data);

               }


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

public function mostrardatosmuestra(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('Model_Muestra');
  $data["numuestra"]= $this->Model_Muestra->muestradatos();

  echo json_encode($data["numuestra"]);


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

    header("Location:  http://192.168.0.3:8888/LabLaBendicion/index.php/mantenimientomm/nuevoprueba?response=1");
      die();
    }

    else {
      header("Location:  http://192.168.0.3:8888/LabLaBendicion/index.php/mantenimientomm/nuevoprueba?response=2");
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

    $data["estado"]= $this->model_solicitud->estadoautorizar();
    $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
    $data["response"]=trim(isset($_REQUEST["response"]));
    $this->load->view('autorizador/editarsolicitud',$data);

      break;
    case '4':

    $data["estado"]= $this->model_solicitud->estadoanalista();
    $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
    $data["response"]=trim(isset($_REQUEST["response"]));
    $this->load->view('analista/editarsolicitud',$data);
      break;
      case '5':
      $data["estado"]= $this->model_solicitud->estadofinalizado();
      $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
      $data["response"]=trim(isset($_REQUEST["response"]));
      $this->load->view('jefe/editarsolicitud',$data);
        break;

        case '6':
        $data["estado"]= $this->model_solicitud->estadoasignar();
        $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
        $data["response"]=trim(isset($_REQUEST["response"]));
        $this->load->view('usuarioasignacion/editarsolicitud',$data);
          break;

    default:
    redirect('restrinct');
      break;
    }
}


public function modificarestadoanalista(){

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

    redirect('restrinct');

      break;
    case '3':


    redirect('restrinct');

      break;
    case '4':

    $data["estado"]= $this->model_solicitud->estadoanalistados();
    $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
    $data["response"]=trim(isset($_REQUEST["response"]));
    $this->load->view('analista/editarestado',$data);
      break;
      case '5':

      redirect('restrinct');
        break;

        case '6':

        redirect('restrinct');
          break;

    default:
    redirect('restrinct');
      break;
    }
}




public function modificarestadodos(){

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
    $this->load->view('usuinterno/editarestado',$data);

      break;
    case '3':

    $data["estado"]= $this->model_solicitud->estadoautorizar();
    $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
    $data["response"]=trim(isset($_REQUEST["response"]));
    $this->load->view('autorizador/editarestado',$data);

      break;
    case '4':
    $data["estado"]= $this->model_solicitud->estadoanalista();
    $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
    $data["response"]=trim(isset($_REQUEST["response"]));
    $this->load->view('analista/editarestado',$data);
      break;
      case '5':
      $data["estado"]= $this->model_solicitud->estadofinalizado();
      $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
      $data["response"]=trim(isset($_REQUEST["response"]));
      $this->load->view('jefe/editarestado',$data);

        break;

        case '6':
        $data["estado"]= $this->model_solicitud->estadoasignar();
        $data["datosoli"]= $this->model_solicitud->mostrardatoseditar($id);
        $data["response"]=trim(isset($_REQUEST["response"]));
        $this->load->view('usuarioasignacion/editarestado',$data);

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

  header("Location: http://192.168.0.3:8888/LabLaBendicion/index.php/mantenimientomm/modificarestado?response=1");
              die();

            }


            // Funcionalidad para editar el formulario de los puntos de atención vista editarpda
            public function updatedatados(){
              $this->load->helper('url');
              $this->load->library('session');
              $this->load->model('model_solicitud');
            // Estas variables vienen de las vista editarpda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta

              $id=trim($_REQUEST["id"]);
              $estado=trim($_REQUEST["estado"]);
              $fechamodifi= date('d-m-Y H:i:s');
              $observaciones=trim($_REQUEST["observaciones"]);


            // La variable "datos" que esta con letras color verde, viene del foreach que traslada los datos del formulario de la vista edtarpda, y las variables con signo $ son las que mandas a traer arriba
              $data["datosoli"]= $this->model_solicitud->updatestadodos($id,$estado,$fechamodifi,$observaciones);

              header("Location: http://192.168.0.3:8888/LabLaBendicion/index.php/mantenimientomm/modificarestadodos?response=1");
                          die();

                        }


          public function ip()
                	{
                          // funcion para capturar la ip del visitante y guardarla
                          if (getenv('HTTP_CLIENT_IP')) {
                              $ip = getenv('HTTP_CLIENT_IP');
                            } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                              $ip = getenv('HTTP_X_FORWARDED_FOR');
                            } elseif (getenv('HTTP_X_FORWARDED')) {
                              $ip = getenv('HTTP_X_FORWARDED');
                            } elseif (getenv('HTTP_FORWARDED_FOR')) {
                              $ip = getenv('HTTP_FORWARDED_FOR');
                            } elseif (getenv('HTTP_FORWARDED')) {
                              $ip = getenv('HTTP_FORWARDED');
                            } else {
                          // Método por defecto de obtener la IP del usuario
                          // Si se utiliza un proxy, esto nos daría la IP del proxy
                          // y no la IP real del usuario.
                              $ip = $_SERVER['REMOTE_ADDR'];
                              }
                              //echo "Su IP parece ser: ".$ip;
                      				return $ip;
                      	}


public function delete(){
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('model_solicitud');
  $id = trim($_REQUEST["id"]);
  $ip= $this->ip();
  $fechaeliminacion = date('d-m-Y H:i:s');
  $data["datosoli"]= $this->model_solicitud->eliminarsolicitud($id,$fechaeliminacion,$ip);

  header("Location: http://192.168.0.3:8888/LabLaBendicion/index.php/mantenimientomm?response=1");
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
                $codigomuestra = trim($_REQUEST["codigomuestra"]);
                $data["response"]=trim(isset($_REQUEST["response"]));
                $data["datosmuestra"]= $this->Model_Muestra->datosmuestraporid($codigomuestra);
                $data["items"]= $this->Model_Muestra->items();
                $this->load->view('usuinterno/mdatosasc',$data);

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

            // Funcionalidad para editar el formulario de los puntos de atención vista editarpda
            public function updateasociaritem(){
              $this->load->helper('url');
              $this->load->library('session');
              $this->load->model('Model_Muestra');
            // Estas variables vienen de las vista editarpda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta

              $codigomuestra=trim($_REQUEST["codigomuestra"]);
              $cbox1=trim($_REQUEST["cbox1"]);
              $cbox2=trim($_REQUEST["cbox2"]);
              $cbox3=trim($_REQUEST["cbox3"]);
              $cbox4=trim($_REQUEST["cbox4"]);
              $fechamodifi= date('d-m-Y H:i:s');


            // La variable "datos" que esta con letras color verde, viene del foreach que traslada los datos del formulario de la vista edtarpda, y las variables con signo $ son las que mandas a traer arriba
              $data["datosmuestra"]= $this->Model_Muestra->asociaritems($codigomuestra,$cbox1,$cbox2,$cbox3,$cbox4,$fechamodifi);

              header("Location: http://192.168.0.3:8888/LabLaBendicion/index.php/mantenimientomm/asociar?response=1");
                          die();

                        }


            public function desasociar(){
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

                $id = trim($_REQUEST["id"]);
                $data["response"]=trim(isset($_REQUEST["response"]));
                $data["datosmuestra"]= $this->Model_Muestra->datosmuestraporid($id);
                $data["items"]= $this->Model_Muestra->items();

                $this->load->view('usuinterno/desasociar',$data);

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

            public function updateasociaritemdos(){
              $this->load->helper('url');
              $this->load->library('session');
              $this->load->model('Model_Muestra');
            // Estas variables vienen de las vista editarpda, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta

              $codigomuestra=trim($_REQUEST["codigomuestra"]);
              $cbox1=trim($_REQUEST["cbox1"]);
              $cbox2=trim($_REQUEST["cbox2"]);
              $cbox3=trim($_REQUEST["cbox3"]);
              $cbox4=trim($_REQUEST["cbox4"]);
              $fechamodifi= date('d-m-Y H:i:s');


            // La variable "datos" que esta con letras color verde, viene del foreach que traslada los datos del formulario de la vista edtarpda, y las variables con signo $ son las que mandas a traer arriba
              $data["datosmuestra"]= $this->Model_Muestra->deasociaritems($codigomuestra,$fechamodifi,$cbox1,$cbox2,$cbox3,$cbox4);

              header("Location: http://192.168.0.3:8888/LabLaBendicion/index.php/mantenimientomm/desasociar?response=1");
                          die();

                        }

}






 ?>
