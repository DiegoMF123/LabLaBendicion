<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mantenimiento de solicitudes</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/logo1.ico">

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


            <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css">

        <!-- scropt para Dar color a la tabla en la parte de los encabezados -->
        <style type="text/css">

        table{
          background-color: #EAEDED;
          border: 5px solid black;
          width: 100%;
        }

        </style>

        <script type="text/javascript">

        function confirmar() {


            Swal.fire({
                title: '¿Está seguro que desea eliminar la solictud?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: "No",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.value) {
                    return true;

                }
                return false;
            })
        }

        </script>

        <script type="text/javascript">

        function confirmarmuestra() {
            event.preventDefault();

            Swal.fire({
                title: '¿Está seguro que desea eliminar la muestra?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: "No",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.value) {
                    return true;

                }
                return false;
            })
        }

        </script>


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
                                 <div class="username hidden-xs"> <?php echo $_SESSION["nombre"]; ?></div>
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

                     <h3><i class="fa fa-home"></i>Mantenimiento de solicitudes</h3>
                 </div>
                 <div id="page-content">
                    <div class="row">
                          <div class="col-md-12">
                     <div class="panel">

                         <div class="panel-heading">

                             <h3 class="panel-title">Listado de solicitudes</h3>
                         </div>
                         <?php if ($response =="1") {
                           echo "<div class=\"alert alert-success fade in\" role=\"alert\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">
                                 Ha eliminado exitosamente la solictud.
                               </div>";
                         } ?>

                         <div class="panel-body">




                           <form method = "get">

                            <div class="form-group">
                                <!--CODIGO SOLICITUD-->
                                <label class="col-md-1 col-xs-12 control-label">Código Solicitud </label>
                                                          <div class="col-md-3 col-xs-12">
                                                              <input type="text" class="form-control" name="nosolicitud" id="nombre" placeholder="Ingrese Código" />
                                                          </div>

                                           <!-- EXPEDIENTE-->
                                           <label class="col-md-1 col-xs-12 control-label">No. expediente </label>
                                                          <div class="col-md-3 col-xs-12">
                                                              <input type="text" class="form-control" name="noexpediente" id="nombre" placeholder="Ingrese No. expediente" />
                                                          </div>

                                          <!-- SOPORTE-->
                                          <label class="col-md-1 col-xs-12 control-label">No. soporte  </label>
                                                          <div class="col-md-3 col-xs-12">
                                                              <input type="text" class="form-control" name="nosoporte" id="nombre" placeholder="Ingrese No. soporte " />
                                                          </div>

                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="form-group">
                              <!--USUARIO ASIGNACION -->
                              <label class="col-md-1 col-xs-12 control-label">Usuario </label>
                                             <div class="col-md-3 col-xs-12">
                                             <select class="form-control" name="usuario" id="tiposolid">
                                                     <option value="usuarioasignacionfiltro" hidden selected>Seleccione una opción
                                                     </option>
                                                     <?php foreach ($usuarioA as $usuarioA) {
                                                         // code...
                                                         ?>

                                                     <option value="<?=$usuarioA->idExpediente  ?>">
                                                         <?= $usuarioA->Nombre ?>
                                                         </option>

                                                     <?php    } ?>
                                                 </select>
                                             </div>
                              <!--FECHAS-->
                            <label class="col-md-1 col-xs-12 control-label">Fecha  </label>
                                             <div class="col-md-3 col-xs-12">
                                                 <input type="date" class="form-control" name="fechaini" id="nombre" placeholder="Ingrese Fecha" />
                                             </div>
                              <!--FECHAS-->
                            <label class="col-md-1 col-xs-12 control-label">Fecha hasta </label>
                                             <div class="col-md-3 col-xs-12">
                                                 <input type="date" class="form-control" name="fechafin" id="nombre" placeholder="Ingrese Nombre" />
                                             </div>



                            </div>
                            <br>
                            <br>

                            <div class="form-group">

                              <!-- NIT-->
                               <label class="col-md-1 col-xs-12 control-label">NIT </label>
                                               <div class="col-md-3 col-xs-12">
                                                  <input type="text" class="form-control" name="nit" id="nombre" placeholder="Ingrese NIT" />
                                              </div>

                              <!--TIPO SOLICITUD-->
                           <label class="col-md-1 col-xs-12 control-label">Tipo Solicitud</label>
                                              <div class="col-md-3 col-xs-12">
                                              <select class="form-control" name="tiposolid" id="tiposolid">
                                                      <option value="" hidden selected>Seleccione una opción
                                                      </option>
                                                      </option>
                                                      <?php foreach ($tiposolicitud as $tiposolicitud) {
                                                          // code...
                                                          ?>

                                                      <option value="<?=$tiposolicitud->idTipoSolicitud  ?>">
                                                          <?= $tiposolicitud->Abreviatura ?>
                                                          <?= $tiposolicitud->NombreTipo ?>
                                                          </option>

                                                      <?php    } ?>

                                                  </select>
                                              </div>

                          <!--estado  SOLICITUD-->
                          <label class="col-md-1 col-xs-12 control-label">Estado Solicitud</label>
                                              <div class="col-md-3 col-xs-12">
                                              <select class="form-control" name="estadosoli" id="estadosoli">
                                                      <option value="" hidden selected>Seleccione una opción
                                                      </option>
                                                      <?php foreach ($estadoS as $estadoS) {
                                                          // code...
                                                          ?>

                                                      <option value="<?=$estadoS->idEstados  ?>">
                                                          <?= $estadoS->Nombrestado ?></option>

                                                      <?php    } ?>

                                                  </select>
                                              </div>




                            </div>
                            <br>
                            <br>

                            <!--Boton buscar-->
                              <div class="col-md-4" margin-left: auto>
                                   <!-- Boton filtrar que nos va a servir para poder mandar la peticion a nuestro controlador y que capture nuestros datos que estamos solicitando-->
                                       <input name ="buscar" type="submit" value="Filtrar" class="btn btn-primary ">

                                       <a href="<?php echo base_url(); ?>index.php/mantenimientomm" class="btn btn-danger ">Limpiar</a>

                               </div>

                           </form>
                           <br>
                           <br>
                           <br>

                           <table  class="table table-striped table-bordered">
                                  <thead >

                                    <tr>
                                        <!--El nombre de los campos que se van a mostrar en la vista-->
                                        <th>No.Solicitud</th>

                                        <th>No.Expediente</th>

                                        <th>No.Soporte</th>

                                        <th>Usuario Asignación</th>

                                        <th>Fecha de creación</th>

                                        <th>Nit</th>

                                        <th>Tipo de solicitud</th>

                                        <th>Tipo de solicitante</th>

                                        <th>Estado</th>


                                        <th>
                                    </tr>
                                  </thead>
                                  <tbody align="center">
                                    <?php foreach ($datosoli as $datosoli){
                                      // code...
                                      ?>
                                      <tr>
                                            <!-- Llamado de campos de los datos que queremos mostrar  -->
                                            <td><?= $datosoli->idSolicitud ?></td>

                                            <td><?= $datosoli->Nosolicitud ?></td>

                                            <td><?= $datosoli->NumeroSoporte ?></td>

                                            <td><?= $datosoli->Nombre ?></td>

                                             <td><?= $datosoli->Fechacreacion ?></td>

                                             <td><?= $datosoli->Nit ?></td>

                                             <td><?= $datosoli->Abreviatura ?> = <?= $datosoli->NombreTipo ?></td>

                                             <td><?= $datosoli->Abreviaturats ?> = <?= $datosoli->Tiposolicitante ?></td>

                                             <td><?= $datosoli->Nombrestado ?></td>



                                          <td>





                                            <div class="btn-group dropup">
                                              <button type="button" class="btn btn-success">
                                                Opciones</button>

                                                <button type="button" class="btn btn-success dropdown-toggle"
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Desplegar menú</span>
                                                </button>

                                                <ul class="dropdown-menu">

                                                  <li>  <a href="" data-toggle="modal" data-target="#myModal4<?= $datosoli->idSolicitud ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Ver información del expediente"><span class="material-icons">folder</span></a></li>

                                                  <li><a href="" data-toggle="modal" data-target="#myModal3<?= $datosoli->idSolicitud ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right" title="Ver información del cliente"><span class="material-icons">contact_page</span></a></li>

                                                  <li><a href="" data-toggle="modal" data-target="#myModal<?= $datosoli->idSolicitud ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="Ver datos de la solicitud"><span class="material-icons">notes</span></a></li>

                                                  <li>    <a href="" data-toggle="modal" data-target="#myModal2<?= $datosoli->idSolicitud ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="right" title="Trazabilidad"><span class="material-icons">task</span></a></li>
                                              
                                                  <li>    <a href="<?php echo base_url(); ?>index.php/mantenimientomm/modificarestadodos?id=<?= $datosoli->idSolicitud  ?>"class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Asignado"><span class="material-icons">edit</span></a></li>


                                                </ul>



                                                    </div>

                                          </td>


                                      </tr>
                                      <!-- Modal 1 -->
                                      <div class="modal fade" id="myModal<?= $datosoli->idSolicitud ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                                          <div class="modal-dialog" role="document">

                                            <div class="modal-content">

                                              <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                <h4 class="modal-title" id="myModalLabel">

                                                  <b>Número de solictud:  <?= $datosoli->idSolicitud ?></b>



                                                </h4>

                                              </div>

                                              <div class="modal-body">

                                                  <div class="row">

                                                      <div class="col-md-2">


                                                      </div>

                                                      <div class="col-md-8">

                                                          <label for=""><b>Número de expediente</b></label><br>

                                                          <input type="text" class="form-control" value="<?= $datosoli->Nosolicitud?>" readonly>



                                                      </div>

                                                      <div class="col-md-2">



                                                      </div>

                                                  </div>




                                                  <div class="row">

                                                      <div class="col-md-2">



                                                      </div>

                                                      <div class="col-md-8">

                                                          <label for=""><b>Descripción</b></label><br>


                                                            <textarea type="text" class="form-control"  readonly><?= $datosoli->Descripcion ?></textarea>



                                                      </div>

                                                      <div class="col-md-2">



                                                      </div>

                                                  </div>

                                                  <div class="row">

                                                      <div class="col-md-2">



                                                      </div>

                                                      <div class="col-md-8">

                                                          <label for=""><b>Fecha de creación</b></label><br>

                                                          <input type="text" class="form-control" value="<?= $datosoli->Fechacreacion ?>" readonly>



                                                      </div>

                                                      <div class="col-md-2">



                                                      </div>

                                                  </div>

                                                  <div class="row">

                                                      <div class="col-md-2">



                                                      </div>

                                                      <div class="col-md-8">

                                                          <label for=""><b>Tipo de solictud</b></label><br>

                                                          <input type="text" class="form-control" value="<?= $datosoli->Abreviatura ?> = <?= $datosoli->NombreTipo ?>" readonly>



                                                      </div>

                                                      <div class="col-md-2">



                                                      </div>

                                                  </div>

                                                  <div class="row">

                                                      <div class="col-md-2">



                                                      </div>

                                                      <div class="col-md-8">

                                                          <label for=""><b>Tipo de solicitante</b></label><br>

                                                          <input type="text" class="form-control" value="<?= $datosoli->Abreviaturats ?> = <?= $datosoli->Tiposolicitante ?>" readonly>



                                                      </div>

                                                      <div class="col-md-2">



                                                      </div>

                                                  </div>

                                                  <div class="row">

                                                      <div class="col-md-2">



                                                      </div>

                                                      <div class="col-md-8">

                                                          <label for=""><b>Número de Soporte</b></label><br>

                                                          <input type="text" class="form-control" value="<?= $datosoli->NumeroSoporte  ?>" readonly>



                                                      </div>

                                                      <div class="col-md-2">



                                                      </div>

                                                  </div>

                                                  <div class="row">

                                                      <div class="col-md-2">



                                                      </div>

                                                      <div class="col-md-8">

                                                          <label for=""><b>Teléfono</b></label><br>

                                                          <input type="text" class="form-control" value="<?= $datosoli->Telefono  ?>" readonly>



                                                      </div>

                                                      <div class="col-md-2">



                                                      </div>

                                                  </div>

                                                  <div class="row">

                                                      <div class="col-md-2">

                                                      </div>

                                                      <div class="col-md-8">

                                                          <label for=""><b>Correo</b></label><br>

                                                          <input type="text" class="form-control" value="<?= $datosoli->Correo  ?>" readonly>



                                                      </div>

                                                      <div class="col-md-2">



                                                      </div>

                                                  </div>

                                                  <div class="row">

                                                      <div class="col-md-2">



                                                      </div>

                                                      <div class="col-md-8">

                                                          <label for=""><b>Estado de la solicitud</b></label><br>

                                                          <input type="text" class="form-control" value="<?= $datosoli->Nombrestado?>" readonly>



                                                      </div>

                                                      <div class="col-md-2">



                                                      </div>

                                                  </div>


                                              </div>

                                              <div class="modal-footer">

                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                              </div>

                                            </div>

                                          </div>

                                        </div>

                                        <!-- Modal 2-->

                                        <div class="modal fade" id="myModal2<?= $datosoli->idSolicitud ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                                            <div class="modal-dialog" role="document">

                                              <div class="modal-content">

                                                <div class="modal-header">

                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                  <h4 class="modal-title" id="myModalLabel">

                                                    <b>Estados por lo que la solicitud ha pasado, No de solicitud:  <?= $datosoli->idSolicitud ?></b>



                                                  </h4>

                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">

                                                        <div class="col-md-2">


                                                        </div>

                                                        <div class="col-md-8">

                                                            <label for=""><b>Estado</b></label><br>

                                                            <input type="text" class="form-control" value="<?= $datosoli->Nombrestado?>" readonly>



                                                        </div>

                                                        <div class="col-md-2">



                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-2">


                                                        </div>

                                                        <div class="col-md-8">

                                                            <label for=""><b></b></label><br>

                                                            <input type="text" class="form-control" value="" readonly>



                                                        </div>

                                                        <div class="col-md-2">



                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-2">


                                                        </div>

                                                        <div class="col-md-8">

                                                            <label for=""><b></b></label><br>

                                                            <input type="text" class="form-control" value="" readonly>



                                                        </div>

                                                        <div class="col-md-2">



                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-2">


                                                        </div>

                                                        <div class="col-md-8">

                                                            <label for=""><b></b></label><br>

                                                            <input type="text" class="form-control" value="" readonly>



                                                        </div>

                                                        <div class="col-md-2">



                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="modal-footer">

                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                                </div>

                                              </div>

                                            </div>

                                          </div>


                                          <!-- Modal 3-->

                                          <div class="modal fade" id="myModal3<?= $datosoli->idSolicitud ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                                              <div class="modal-dialog" role="document">

                                                <div class="modal-content">

                                                  <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                    <h4 class="modal-title" id="myModalLabel">

                                                      <b>Información del cliente</b>



                                                    </h4>

                                                  </div>

                                                  <div class="modal-body">

                                                      <div class="row">

                                                          <div class="col-md-2">


                                                          </div>

                                                          <div class="col-md-8">

                                                              <label for=""><b>NIT</b></label><br>

                                                              <input type="text" class="form-control" value="<?= $datosoli->Nit?>" readonly>



                                                          </div>

                                                          <div class="col-md-2">



                                                          </div>

                                                      </div>

                                                      <div class="row">

                                                          <div class="col-md-2">


                                                          </div>

                                                          <div class="col-md-8">

                                                              <label for=""><b>Nombre</b></label><br>

                                                              <input type="text" class="form-control" value="<?= $datosoli->Nombre ?>" readonly>



                                                          </div>

                                                          <div class="col-md-2">



                                                          </div>

                                                      </div>

                                                      <div class="row">

                                                          <div class="col-md-2">


                                                          </div>

                                                          <div class="col-md-8">

                                                              <label for=""><b>Dirección</b></label><br>

                                                              <input type="text" class="form-control" value="<?= $datosoli->Direccion ?>" readonly>



                                                          </div>

                                                          <div class="col-md-2">



                                                          </div>

                                                      </div>

                                                      <div class="row">

                                                          <div class="col-md-2">


                                                          </div>

                                                          <div class="col-md-8">

                                                              <label for=""><b>Teléfono</b></label><br>

                                                              <input type="text" class="form-control" value="<?= $datosoli->Telefono ?>" readonly>



                                                          </div>

                                                          <div class="col-md-2">



                                                          </div>

                                                      </div>

                                                      <div class="row">

                                                          <div class="col-md-2">


                                                          </div>

                                                          <div class="col-md-8">

                                                              <label for=""><b>Emails</b></label><br>

                                                              <input type="text" class="form-control" value="<?= $datosoli->Correo ?>" readonly>



                                                          </div>

                                                          <div class="col-md-2">



                                                          </div>

                                                      </div>


                                                  </div>

                                                  <div class="modal-footer">

                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                                  </div>

                                                </div>

                                              </div>

                                            </div>

                                            <!--Modal 4 -->

                                            <div class="modal fade" id="myModal4<?= $datosoli->idSolicitud ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                                                <div class="modal-dialog" role="document">

                                                  <div class="modal-content">

                                                    <div class="modal-header">

                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                      <h4 class="modal-title" id="myModalLabel">

                                                        <b>Información del expediente</b>



                                                      </h4>

                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="row">

                                                            <div class="col-md-2">


                                                            </div>

                                                            <div class="col-md-8">

                                                                <label for=""><b>No. expediente</b></label><br>

                                                                <input type="text" class="form-control" value="<?= $datosoli->Correlativo?>" readonly>



                                                            </div>

                                                            <div class="col-md-2">



                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-2">


                                                            </div>

                                                            <div class="col-md-8">

                                                                <label for=""><b>Origen</b></label><br>

                                                                <input type="text" class="form-control" value="" readonly>



                                                            </div>

                                                            <div class="col-md-2">



                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-2">


                                                            </div>

                                                            <div class="col-md-8">

                                                                <label for=""><b>Observaciones </b></label><br>

                                                                <textarea type="text" class="form-control"  readonly><?= $datosoli->Observaciones ?></textarea>

                                                            </div>

                                                            <div class="col-md-2">



                                                            </div>

                                                        </div>





                                                    </div>

                                                    <div class="modal-footer">

                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                                    </div>

                                                  </div>

                                                </div>

                                              </div>

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
                           <i><img src="<?php echo base_url(); ?>/assets/img/logo1.png" width="60"> <font size="5" face="georgia">Menú Lab</font></i>
                     </a>

                 </div>

                 <div id="mainnav">


                     <div id="mainnav-menu-wrap">

                         <div class="nano">

                             <div class="nano-content">

                                 <ul id="mainnav-menu" class="list-group">


                                     <li class="list-header">Opciones De Navegación</li>

                                     <li>

                                         <a href="#">

                                         <i class="fa fa-home"></i>

                                         <span class="menu-title">Inicio</span>

                                         <i class="arrow"></i>

                                         </a>

                                         <!--Submenu-->

                                         <ul class="collapse">

                                             <li><a href="<?php echo base_url(); ?>index.php/welcome"><i class="fa fa-caret-right"></i>Pantalla De Inicio</a></li>

                                         </ul>

                                     </li>


                                     <li>

                                         <a href="#">

                                         <i class="fa fa-briefcase"></i>

                                         <span class="menu-title">Opciones</span>

                                         <i class="arrow"></i>

                                         </a>

                                         <!--Submenu-->

                                         <ul class="collapse">

                                           <li><a href="<?php echo base_url(); ?>index.php/Autorizar"><i class="fa fa-caret-right"></i>Autorizador De Documentos Para Muestras</a></li>

                                          <li><a href="<?php echo base_url(); ?>index.php/mantenimientomm"><i class="fa fa-caret-right"></i>Autorizar solicitudes</a></li>

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
