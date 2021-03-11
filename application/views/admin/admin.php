<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Muestras médicas</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/Logo1.ico">
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

        <!-- scropt para Dar color a la tabla en la parte de los encabezados -->
        <style type="text/css">

        table{
          background-color: #EAEDED;
          border: 5px solid black;
          width: 100%;

        }

        </style>


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

                                 <div class="username hidden-xs"> Bienvenido: <?php echo $_SESSION["nombre"]; ?></div>

                             </a>

                             <div class="dropdown-menu dropdown-menu-right with-arrow">


                                 <ul class="head-list">

                                     <li>

                                       <!-- Boton que sirve para poder redireccionar a la vista del login, cuando el usuario quiera salir, en este caso la funcion esta en el controlador
                                     welcome y la funcion se llama salir -->

                                           <a href="<?php echo base_url(); ?>index.php/welcome/salir"> <i class="fa fa-sign-out fa-fw"></i> Salir </a>

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

                     <h3><i class="fa fa-home"></i> Inicio </h3>


                 </div>



                 <div id="page-content">
                    <div class="row">
                          <div class="col-md-12">
                     <div class="panel">
                         <div class="panel-heading">
                             <h3 class="panel-title">Listado de solicitud de muestras médicas</h3>
                         </div>

                         <div class="panel-body">
                           <!-- Se abren llaves php para poder realizar un if con codigo php, es este caso declaramos una variable
                         llamada "response" en la cual le estamos indicando que si es == 1, nos mostrara un mensaje, en este caso
                       si los datos se actualizan y hacen bien su proceso en el controlador Pda y en el respectivo modelo. -->
                           <?php if ($response =="1") {
                             echo "<div class=\"alert alert-success fade in\" role=\"alert\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">
                                   Datos Actualizados Exitosamente.
                                 </div>";
                           } ?>
                           <!--Formulario que sirve para poder realizar la filtracion por regiones de un punto de atención-->
                           <form class="" action="" method="GET">

                               <div class="row">

                                   <div class="col-md-2">

                                       <label for="">Seleccione la Región a buscar</label>

                                   </div>

                                     <div class="col-md-3 col-xs-12">
                                       <!-- Para poder llamar los datos de la base de datos, que en este caso son las regiones
                                      abrimos llaves php y realizamos un nuevo foreach que en este caso le declaramos una variable que es la que
                                    vamos a llamar en el controlador para poder mandarselos a nuestro modelo y que en el modelo nos retorne los datos
                                  que necesitamos, luego de as declaramos otra variable que es la que vamos a usar practicamente en nuestra vista para poder
                                  mostrar los datos o el dato que nos devuelva nuestra consulta del modelo-->
                                       <select class="form-control" name="region">
                                         <option value="" hidden selected>Seleccione una opción</option>
                                    <?php foreach ($tiporegion as $tiporegion) {
                                      // code...
                                    ?>
                                    <!--Abrimos llaves de php para poder llamar los datos que necesitamos para poder mostrar los valores que en este caso
                                  sera la el nombre de la region, pero para ello necesitamos el id y el nombre de la region que se seleccione segun el ID-->
                                      <option value="<?=$tiporegion->idRegion  ?>"><?= $tiporegion->region ?></option>


                                <?php    } ?>
                                </select>

                                                     </div>

                                   <div class="col-md-4">

                                     <!-- Boton filtrar que nos va a servir para poder mandar la peticion a nuestro controlador y que capture nuestros datos
                                   que estamos solicitando-->

                                     <input type="submit" value="Filtrar" class="btn btn-primary btn-block">


                                   </div>


                                   <div class="col-md-1">


                                   </div>

                                   <div class="col-md-2">

                                     <div class="btn-group" role="group" aria-label="...">


                                       <!-- Boton que direcciona a la vista para agregar un nuevo punto de atención, lo llamamos por medio del controlador pda y usamos la funcion nuevo para poder
                                     mostrar la vista-->
                                         <a  href="http://192.168.1.14:8888/BancoMiPistio/index.php/pda/nuevo" class="btn btn-link btn-lg" data-toggle="tooltip" data-placement="right" title="Agregar Nuevo Punto de atención">

                                           <span class="material-icons">

                                             add_circle_outline

                                           </span>

                                         </a>



                                       </div>

                                   </div>



                               </div>

                           </form>

                           <br>

                           <table  class="table table-striped table-bordered">
                             <!--El nombre de los campos que se van a mostrar en la vista-->
                                  <thead>
                                      <tr>
                                        <th>ID</th>

                                        <th>Correlativo</th>

                                        <th>Nombre punto</th>

                                        <th>Estado</th>

                                        <th>Region</th>
                                      </tr>
                                  </thead>


                                  <tbody align="center" >
                                      <!--abrimos llaves php para poder llamar los datos que queremos mostrar en nuestra vista
                                    de los puntos de atención existentes, comenzamos un foreach y en este caso declaramos una variable
                                  llamada datos que es la que llamaremos en nuestro controlador pda en la funcion index, luego del as
                                tenemos otra variable dato que es la que vamos a usar para poder mandar a llamar los campos que queremos mostrar de la base de datos por
                              parte de nuestro modelo igualmente en la funcion index -->

                              <?php
                                  foreach ($datos as $dato) {
                                    // code..
                                    ?>
                                    <tr>


                                          <!-- Llamado de campos de los datos que queremos mostrar  -->
                                          <td><?= $dato->IDPuntos_De_Atencion ?></td>

                                            <td><?= $dato->Correlativo ?></td>

                                             <td><?= $dato->Nombre_Punto ?></td>

                                             <td><?= $dato->NombreEstado ?></td>

                                             <td><?= $dato->region ?></td>
                                          <td>


                                            <div class="btn-group" role="group" aria-label="...">
                                                <!-- Boton editar, llamamos nuestro controlador pda con la funcion update y le mandamos el id del punto de atención que queremos modificar para que nos muestre
                                              los datos del punto de atención que queremos editar-->
                                                <a  data-toggle="modal" data-target="#staticBackdrop1<?=$dato->IDPuntos_De_Atencion ?>" class="btn btn-primary"  data-placement="left" title="Editar los datos del punto de atención"><span class="material-icons">edit</span> </a>


                                                <div class="modal fade bs-example-modal-lg" id="staticBackdrop1<?=$dato->IDPuntos_De_Atencion ?>" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel"><label> EDITAR DATOS PERSONALES</label></h4>
               </div>
              <div class="modal-body">
                <div class="contendor_kn">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <form id="registrationForm" name="registrationForm" class="form-horizontal" action="updatedata" method="GET">
                        <div class="col-md-6">

                          <label  class="col-sm-4 control-label">Correlativo </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" onkeypress="return soloLetras(event)" value="<?= $dato->IDPuntos_De_Atencion ?>" name="idpda" id="nombres_personal" placeholder="Prueba" maxlength="" readonly>
                            <br>
                          </div>
                          <label  class="col-sm-4 control-label">Region</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" onkeypress="return soloLetras(event)" name="region" id="apePate_personal" value="<?= $dato->region ?>"  placeholder="Prueba" maxlength="" readonly>
                            <br>
                          </div>
                          <label  class="col-sm-4 control-label">Nombre punto  </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" onkeypress="return soloLetras(event)"  name="nombrepda" id="apeMate_personal" value="<?= $dato->Nombre_Punto ?>" placeholder="Prueba" maxlength="">
                            <br>
                          </div>
                        </div>



                          <label  class="col-sm-2 control-label">Estado</label>
                          <div class="col-sm-4">
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

                            <br>
                          </div>


                        <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;" >
                          <br>
                          <div class="col-md-4">
                          </div>
                          <div class="col-md-4" >

                             <button type="submit" class="btn btn-success" name="btnSend" id="btnSend" style="width: 100%" ><span class="glyphicon glyphicon-floppy-saved" ></span>&nbsp;<b>Modificar Datos</b></button><br>
                          </div>
                          <div class="col-md-4">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-close"></i><strong> Close</strong></button>
              </div>
          </div>
        </div>
      </div>
                                            </div>
                                          </td>
                                      </tr>

                                        <?php          } ?>

                                  </tbody>

                              </table>

                         </div>

                     </div>

                   </div>

                 </div>

               </div>



             </div>



             <nav id="mainnav-container">


                 <div class="navbar-header">

                     <a href="<?php echo base_url(); ?>" class="navbar-brand">

                         <!--Llamada  de imagen para el menú de nuestras vistas-->

                           <i><img src="<?php echo base_url(); ?>/assets/img/logo1.png" width="60"> <font size="5" face="georgia">Menú LAB </font></i>



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


             <div class="hide-fixed pull-right pad-rgt">Actualmente v1.0</div>
             <p class="pad-lft">&#0169; 2021 Sistema Laboratorio "La Bendición S.A"</p>
         </footer>


         <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>

         <!--===================================================-->

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


</html>
