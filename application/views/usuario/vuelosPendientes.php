<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vuelos Pendientes</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- scropt para Dar color a la tabla en la parte de los encabezados -->
    <style type="text/css">
        table {
            background-color: #EAEDED;
            border: 5px solid black;
            width: 100%;
        }
    </style>
    <!--Script para poder cancelar el ingreso de los datos y dejarlos a como estaba-->
    <script>
        function limpiarFormulario() {
            document.getElementById("registrationForm").reset();
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

                    <h3><i class="fa fa-home"></i>Vuelos pendientes</h3>
                </div>
                <div id="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">


                                <div class="panel-heading">

                                    <h3 class="panel-title">Listado de vuelos pendientes</h3>

                                </div>



                                <div class="panel-body">
                                    <?php if ($response == "1") {
                                        echo "<div class=\"alert alert-danger fade in\" role=\"alert\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">
                                        Código de vuelo invalido, ingrese un código valido.
                               </div>";
                                    } ?>

                                    <form class="" id="registrationForm" action="" method="GET">

                                        <div class="row">

                                            <div class="col-md-1">

                                                <label for="">Código de vuelo</label>

                                            </div>

                                            <div class="col-md-3 col-xs-12">

                                                <input type="text" class="form-control" name="codigoVuelo" id="codigoVuelo" placeholder="Ingrese el código de vuelo" />

                                            </div>

                                            <div class="col-md-4">

                                                <!-- Boton filtrar que nos va a servir para poder mandar la peticion a nuestro controlador y que capture nuestros datos
                                                que estamos solicitando-->

                                                <input type="submit" value="Consultar" class="btn btn-primary">
                                                <a href="<?php echo base_url(); ?>index.php/vuelos" type="button" class="btn btn-danger" onclick="limpiarFormulario()">Limpiar</a>


                                            </div>


                                            <div class="col-md-1">


                                            </div>

                                        </div>

                                    </form>

                                    <br>

                                    <table class="table table-striped table-bordered">
                                        <thead>

                                            <tr>
                                                <!--El nombre de los campos que se van a mostrar en la vista-->
                                                <th>Id Vuelo</th>

                                                <th>Número de pasaporte</th>

                                                <th>Código de vuelo</th>

                                                <th>Aeropuerto salido</th>

                                                <th>Aeropuerto entrada</th>

                                                <th>Fecha y Hora salida </th>

                                                <th>Fecha y hora Ingreso</th>

                                                <th>Opciones</th>

                                              
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                            <?php foreach ($datosvuelo as $datosvuelo) {
                                                // code...
                                            ?>
                                                <tr>
                                                    <!-- Llamado de campos de los datos que queremos mostrar  -->
                                                    <td><?= $datosvuelo->IdVuelosPendientes ?></td>

                                                    <td><?= $datosvuelo->NumeroPasaporte ?></td>

                                                    <td><?= $datosvuelo->CodigoVuelo ?></td>

                                                    <td><?= $datosvuelo->AeropuertoSalido ?></td>

                                                    <td><?= $datosvuelo->AeropuertoEntrada ?></td>

                                                    <td><?= $datosvuelo->FechaHoraSalida ?></td>

                                                    <td><?= $datosvuelo->FechaHoraEntrada ?></td>

                                                    <td>


                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <!-- Boton editar, llamamos nuestro controlador pda con la funcion update y le mandamos el id del punto de atención que queremos modificar para que nos muestre
                                              los datos del punto de atención que queremos editar-->
                                                            <a href="<?php echo base_url(); ?>index.php/report/reporte?id=<?=$datosvuelo->IdVuelosPendientes?>" class="btn btn-default " data-toggle="tooltip" data-placement="left" title="Exportar excel"><span class="iconify" data-icon="mdi-file-excel" data-inline="false" width="25"></span> Exportar Excel</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php          } ?>


                                        </tbody>

                                    </table>

                                    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
                                  
                                </div>

                            </div>

                        </div>

                    </div>

                </div>



            </div>



            <nav id="mainnav-container">


                <div class="navbar-header">

                    <a href="<?php echo base_url(); ?>" class="navbar-brand">



                        <i><img src="<?php echo base_url(); ?>/assets/img/logo1.png" width="60">
                            <font size="5" face="georgia">Menú ADP</font>
                        </i>



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

                                            <span class="menu-title">Consulta</span>

                                            <i class="arrow"></i>

                                        </a>

                                        <!--Submenu-->

                                        <ul class="collapse">

                                            <li><a href="<?php echo base_url(); ?>index.php/vuelos"><i class="fa fa-caret-right"></i>Vuelos Pendientes</a></li>

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
            <p class="pad-lft">&#0169; 2022 Sistema de vuelos avioncito de papel S.A</p>

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