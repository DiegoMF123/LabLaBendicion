<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Editar punto de atención</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/Ico.ico">

        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">

        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>/assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/alertify.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/semantic.min.css">
        <script src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>



        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css">
        <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
          <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.js"></script>

                <!-- Script para poder cancelar el ingreso de los datos y dejarlos a como estaba-->
          <script>
          function limpiarFormulario() {
            document.getElementById("registrationForm").reset();
            }
          </script>

         <script type="text/javascript">

          function validar(){

            var id = document.getElementById('estado').value;

            if (id == 1) {

                return true;

            }else if (id == 2) {
              var respuesta = confirm("Seguro que quieres inactivar el punto de atención");

              if (respuesta == true) {
                return true;
              }
              else {
                  return false;
              }
            }

          }

          </script>

          <script type="text/javascript">

          function validar(){
          event.preventDefault();


          var id = document.getElementById('estado').value;

          if (id == 1) {


            document.formulario.submit();


          }else if (id == 2) {

            Swal.fire({
            title: '¿Seguro que quieres inactivar el punto de atención?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: "No",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
          }).then((result) => {
            if (result.value) {
            document.formulario.submit();
            }
            return false;
          })

          }


          }

          </script>



        <!--  <script type="text/javascript">

          function validar(){

            var id = document.getElementById('estado').value;

            if (id == 1) {

                return true;

            }else if (id == 2) {
              var respuesta = alertify.confirm('Confirmación','Seguro que quieres inactivar el punto de atención',null,null).set('labels', {ok:'Si', cancel:'No'});

              if (respuesta == 2) {


                return 2;
              }
              else {
                  return false;
              }
            }

          }


        </script>-->

      <!--  <script type="text/javascript">

        function validar(){

          var id = document.getElementById('estado').value;

          if (id == 2) {

            swal({
      title: "Existen x cantidad de usuarios asociados al punto de atención, TODOS los usuarios serán automáticamente Inactivados",
      text: "¿Continua con el proceso de Inactivación del Punto de Atención? ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
      } else {
        swal("Your imaginary file is safe!");
      }
    });
    return false;

  } else if (id == 1) {
    return true;
  }


        }

      </script>-->






    </head>
    <body>
        <div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">

            <header id="navbar">
                <div id="navbar-container" class="boxed">

                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">

                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                            </li>

                        </ul>
                        <ul class="nav navbar-top-links pull-right">

                            <li class="hidden-xs" id="toggleFullscreen">
                                <a class="fa fa-expand" data-toggle="fullscreen" href="#" role="button">
                                    <span class="sr-only">Toggle fullscreen</span>
                                </a>
                            </li>

                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                  <!--Abrimos llaves de php para poder llamar el tipo de variable session PARA llamar
                                   el campo nombre que es el que se muestra en la vista, "parte superior derecha donde indica
                                   el nombre del usuario que se ha logeado"-->
                                    <div class="username hidden-xs"><?php echo $_SESSION["nombre"]; ?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">

                                    <ul class="head-list">
                                        <li>
                                          <!-- Boton que sirve para poder redireccionar a la vista del login, cuando el usuario quiera salir, en este caso la funcion esta en el controlador
                                          welcome y la funcion se llama salir -->
                                            <a href="<?php echo base_url(); ?>index.php/welcome/salir"> <i class="fa fa-user fa-fw fa-lg"></i> Salir</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>
            </header>

            <div class="boxed">

                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-home"></i> Actualizar punto de atención </h3>


                    </div>

                    <div id="page-content">
                        <div class="row">
                            <div class="col-md-12">


                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datos Punto de atención</h3>
                                    </div>

                                    <div class="panel">

                                        <div class="panel-body">

                                            <div class="panel-body">

                                              <!-- Empieza el formulario  -->
                                                <form id="registrationForm" name="formulario" class="form-horizontal" action="updatedata" method="GET" onsubmit="return validar();">
                                                  <!-- Comenzamos un foreach ya que como es un vista de editar, tenemos que mostar los datos que
                                                tiene ese usuario segun el id, comenzamos con un foreach y en este caso declaramos una variable
                                              llamada datos que es la que llamaremos en nuestro controlador pda en la funcion index deñ controlador pda, luego del as
                                            tenemos otra variable dato que es la que vamos a usar para poder mandar a llamar los campos que queremos mostrar de la base de datos por
                                          parte de nuestro modelo igualmente en la funcion update del controlador pda -->
                                                    <?php
                                                    foreach ($datos as $dato) {
                                                        // code...
                                                          }
                                                          ?>


                                                  <div class="form-group">
                                                      <label class="col-md-2 col-xs-12 control-label">Correlativo de punto de atención:</label>
                                                      <div class="col-md-3 col-xs-12">
                                                          <!-- las llaves de php es donde llamamos y mostramos los datos segun el id que mandamos a editar del punto de atención-->
                                                          <input type="text" class="form-control" name="idpda" value="<?= $dato->IDPuntos_De_Atencion ?>" placeholder="" readonly/>
                                                      </div>

                                                  </div>

                                                  <br>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-xs-12 control-label">Región:</label>
                                                        <div class="col-md-3 col-xs-12">
                                                          <input type="text" class="form-control" name="region" value="<?= $dato->region ?>" placeholder="" readonly/>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-xs-12 control-label">Nombre punto de atención:</label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <input type="text" class="form-control" name="nombrepda" value="<?= $dato->Nombre_Punto ?>" placeholder="Ejemplo: San Marcos" required/>


                                                          </div>
                                                    </div>

                                                    <br>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-xs-12 control-label">Estado</label>
                                                          <div class="col-md-3 col-xs-12">
                                                            <select class="form-control" name="estado" id="estado" required>
                                                              <!-- Para poder llamar los datos de la base de datos, que en este caso son los cargos
                                                             abrimos llaves php y realizamos un nuevo foreach que en este caso le declaramos una variable que es la que
                                                           vamos a llamar en el controlador para poder mandarselos a nuestro modelo y que en el modelo nos retorne los datos
                                                         que necesitamos, luego de as declaramos otra variable que es la que vamos a usar practicamente en nuestra vista para poder
                                                         mostrar los datos o el dato que nos devuelva nuestra consulta del modelo-->
                                                               <option value="" hidden selected >Seleccione una opción</option>
                                                         <?php foreach ($estado as $estado) {
                                                           // code...
                                                         ?>
                                                         <!--Abrimos llaves de php para poder llamar los datos que necesitamos para poder mostrar los valores que en este caso
                                                       sera la el nombre del estado, pero para ello necesitamos el id y el nombre del estado que se seleccione segun el ID-->
                                                           <option value="<?=$estado->idEstados  ?>"><?= $estado->NombreEstado ?></option>


                                                     <?php    } ?>
                                                     </select>

                                                        </div>

                                                    </div>

                                                    <br>


                                                    <div class="panel-footer">
                                                        <div class="form-group">
                                                            <div class="col-md-5 col-xs-12">
                                                                <!--  Boton guardar los datos y mandar los datos ingresados al controlador -->
                                                                <input  type="submit" class="btn btn-info" name="btnSend" value="Guardar" id="btnSend">
                                                                  <!--  Boton Cancelar los datos y direccionar a la vista donde se muestran el listado de puntos de atención-->
                                                                <a href="<?php echo base_url(); ?>index.php/welcome/admin" type="button" class="btn btn-info" class="btn btn-primary"  onclick="limpiarFormulario()" value="Cancelar">Cancelar</a>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </form>


                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                </div>
                            </div>

                        </div>

                    </div>

                    <nav id="mainnav-container">


                        <div class="navbar-header">

                            <a href="<?php echo base_url(); ?>" class="navbar-brand">
                                               <!--Llamada  de imagen para el menú de nuestras vistas-->

                                <i><img src="<?php echo base_url(); ?>/assets/img/bmps.png" width="60"> <font size="5" face="georgia">Menú BMP</font></i>

                            </a>

                        </div>


                        <div id="mainnav">


                            <div id="mainnav-menu-wrap">

                                <div class="nano">

                                    <div class="nano-content">

                                        <ul id="mainnav-menu" class="list-group">

                                            <li class="list-header">Navegación</li>

                                            <li> <a href="<?php echo base_url(); ?>index.php/welcome/admin"> <i class="fa fa-home"></i> <span class="menu-title"> Inicio </span> </a> </li>

                                            <li class="list-header">Opciones</li>

                                            <li>

                                                <a href="#">

                                                    <i class="fa fa-table"></i>

                                                    <span class="menu-title">Principal</span>

                                                    <i class="arrow"></i>

                                                </a>

                                                <!--Submenu-->

                                                <ul class="collapse">

                                                    <li><a href="<?php echo base_url(); ?>index.php/welcome/"><i class="fa fa-caret-right"></i>Pantalla Principal</a></li>

                                                </ul>

                                            </li>

                                            <li>

                                                <a href="#">

                                                <i class="fa fa-briefcase"></i>

                                                <span class="menu-title">Quejas</span>

                                                <i class="arrow"></i>

                                                </a>

                                                <!--Submenu-->

                                                <ul class="collapse">

                                                    <li><a href="<?php echo base_url(); ?>index.php/quejasauto"><i class="fa fa-caret-right"></i>Asignar Tipo de queja / Listado de quejas</a></li>

                                                      <li><a href="<?php echo base_url(); ?>index.php/IngQueja"><i class="fa fa-caret-right"></i>Ingreso Quejas por Mal Servicio o servicio no conforme</a></li>

                                                </ul>

                                            </li>

                                            <li>

                                                <a href="#">

                                                    <i class="fa fa-briefcase"></i>

                                                    <span class="menu-title">Configuración</span>

                                                    <i class="arrow"></i>

                                                </a>

                                                <!--Submenu-->

                                                <ul class="collapse">

                                                    <li><a href="<?php echo base_url(); ?>index.php/users"><i class="fa fa-caret-right"></i>Asignar nuevos Usuarios</a></li>
                                                    <li><a href="<?php echo base_url(); ?>index.php/userspda"><i class="fa fa-caret-right"></i>Asignar Usuarios por pda</a></li>



                                                </ul>

                                            </li>





                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </nav>

                </div>

                <footer id="footer">

                    <div class="show-fixed pull-right">
                        <ul class="footer-list list-inline">
                            <li>
                                <p class="text-sm">SEO Proggres</p>
                                <div class="progress progress-sm progress-light-base">
                                    <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                                </div>
                            </li>
                            <li>
                                <p class="text-sm">Online Tutorial</p>
                                <div class="progress progress-sm progress-light-base">
                                    <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                                </div>
                            </li>
                            <li>
                                <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                            </li>
                        </ul>
                    </div>

                    <div class="hide-fixed pull-right pad-rgt">Currently v2.2</div>

                    <p class="pad-lft">&#0169; 2015 Your Company</p>
                </footer>

                <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>

            </div>

            <script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.1.min.js"></script>

            <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>

            <script src="<?php echo base_url(); ?>/assets/plugins/fast-click/fastclick.min.js"></script>

            <script src="<?php echo base_url(); ?>/assets/js/scripts.js"></script>

            <script src="<?php echo base_url(); ?>/assets/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>

            <script src="<?php echo base_url(); ?>/assets/plugins/metismenu/metismenu.min.js"></script>

            <script src="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.js"></script>

            <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

            <script src="<?php echo base_url(); ?>/assets/plugins/datatables/media/js/jquery.dataTables.js"></script>


            <script src="<?php echo base_url(); ?>/assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>


            <script src="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

            <script src="<?php echo base_url(); ?>/assets/plugins/screenfull/screenfull.js"></script>

            <script src="<?php echo base_url(); ?>/assets/js/demo/tables-datatables.js"></script>



    </body>
