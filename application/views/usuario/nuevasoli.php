<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Creacion de nueva solicitud</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/logo1.ico">

    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400"
        rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/datatables/media/css/dataTables.bootstrap.css"
        rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/validacion.js">
    </script>
    <link href="<?php echo base_url(); ?>assets/css/est.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Script para poder cancelar el ingreso de los datos y dejarlos a como estaba-->
    <script>
    function limpiarFormulario() {
        document.getElementById("registrationForm").reset();
    }
    </script>

  

    <script type="text/javascript">
    $(document).ready(Principal);

    function Principal() {
        var flag1 = true;
        $(document).on('keyup', '[id=numsoli]', function(e) {
            if ($(this).val().length == 4 && flag1) {
                $(this).val($(this).val() + "-");
                flag1 = true;
            } else if ($(this).val().length == 7 && flag1) {
                $(this).val($(this).val() + "-");
                flag1 = false;
            }

        });
    }
    </script>

    <script type="text/javascript">
    $(document).ready(Principaldos);


    function Principaldos() {
        var flag1 = true;
        $(document).on('keyup', '[id=numsoli]', function(e) {
            if ($(this).val().length == 10 && flag1) {
                $(this).val($(this).val() + "-");
                flag1 = true;
            } else if ($(this).val().length == 13 && flag1) {
                $(this).val($(this).val() + "-");
                flag1 = false;
            }

        });
    }
    </script>

    <script type="text/javascript">
    // Solo permite ingresar numeros.
    function soloNumeros(e) {

        var key = window.Event ? e.which : e.keyCode
        return (key >= 48 && key <= 57)


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
                                <div class="username hidden-xs"><?php echo $_SESSION["nombre"]; ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right with-arrow">

                                <ul class="head-list">
                                    <li>
                                        <!-- Boton que sirve para poder redireccionar a la vista del login, cuando el usuario quiera salir, en este caso la funcion esta en el controlador
                                          welcome y la funcion se llama salir -->
                                        <a href="<?php echo base_url(); ?>index.php/welcome/salir"> <i
                                                class="fa fa-user fa-fw fa-lg"></i> Salir</a>
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
                    <h3><i class="fa fa-home"></i> Creación de Nueva Solicitud</h3>


                </div>

                <div id="page-content">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Datos de la nueva Solicitud</h3>
                                </div>

                                <div class="panel">

                                    <div class="panel-body">

                                        <div class="panel-body">


                                            <!-- Se abren llaves php para poder realizar un if con codigo php, es este caso declaramos una variable
                                            llamada "response" en la cual le estamos indicando que si es == 1, nos mostrara un mensaje, en este caso
                                          si los datos se actualizan y hacen bien su proceso en el controlador Users y en el respectivo modelo. -->
                                            <?php if ($response =="1") {
                                                echo "<div class=\"alert alert-primary fade in\" role=\"alert\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">
                                                      Se guardaron correctamente los datros del nuevo usuario
                                                    </div>";
                                              } ?>

                                            <!--Formulario que sirve para poder realizar la filtracion por regiones de un nuevo usuario-->
                                            <form id="registrationForm" name="registrationForm" class="form-horizontal"
                                                action="" method="POST">




                                                <div class="form-group">
                                                    <label class="col-md-1 col-xs-12 control-label">Tipo
                                                        solicitante</label>
                                                    <div class="col-md-3 col-xs-12">
                                                        <select class="form-control" name="tiposoli" id="tiposoli"
                                                            required>
                                                            <option value="" hidden selected>Seleccione una opción
                                                            </option>
                                                            <?php foreach ($tiposolicitante as $tiposolicitante) {
                                                                    // code...
                                                                    ?>

                                                            <option value="<?=$tiposolicitante->idTipoSolicitante  ?>">
                                                                <?= $tiposolicitante->Abreviaturats ?>
                                                                <?= $tiposolicitante->Tiposolicitante ?></option>


                                                            <?php    } ?>
                                                        </select>

                                                    </div>
                                                    <label class="col-md-1 col-xs-12 control-label">Número de
                                                        Factura</label>
                                                    <div class="col-md-3 col-xs-12">
                                                        <input type="text" class="form-control" name="numfac"
                                                            id="numfac" placeholder="Ingrese el numero de la factura"
                                                            required />
                                                    </div>
                                                    <label class="col-md-1 col-xs-12 control-label">Tipo
                                                        solicitud</label>
                                                    <div class="col-md-3 col-xs-12">
                                                        <select class="form-control" name="tiposolid" id="tiposolid"
                                                            required>
                                                            <option value="" hidden selected>Seleccione una opción
                                                            </option>
                                                            <?php foreach ($tiposolicitud as $tiposolicitud) {
                                                                    // code...
                                                                    ?>

                                                            <option value="<?=$tiposolicitud->idTipoSolicitud  ?>">
                                                                <?= $tiposolicitud->Abreviatura ?>
                                                                <?= $tiposolicitud->NombreTipo ?></option>


                                                            <?php    } ?>
                                                        </select>

                                                    </div>
                                                </div>



                                                <br>

                                                <div class="form-group">

                                                    <label class="col-md-1 col-xs-12 control-label">Descripción</label>

                                                    <div class="col-md-3 col-xs-12">
                                                        <textarea rows="4" maxlength="200" id="mensaje" name="desc"
                                                            rows="4" cols="107"
                                                            placeholder="Escribe aqui tu descripcion, debe contener al menos 10 caracteres para que pueda ser valida. "
                                                            required></textarea>
                                                        <div id="contador">0/200</div>
                                                        <!-- Contador y limitar letras en campo -->
                                                        <script>
                                                        const mensaje = document.getElementById('mensaje');
                                                        const contador = document.getElementById('contador');
                                                        mensaje.addEventListener('input', function(e) {
                                                            const target = e.target;
                                                            const longitudMax = target.getAttribute(
                                                                'maxlength');
                                                            const longitudAct = target.value.length;
                                                            contador.innerHTML =
                                                                `${longitudAct}/${longitudMax}`;
                                                        });
                                                        </script>
                                                    </div>

                                                </div>
                                                <br>

                                               

                                                    
                                                    <label class="col-md-1 col-xs-12 control-label">No de
                                                        solicitud</label>
                                                    <div class="col-md-3 col-xs-12">

                                                        <input type="text" class="form-control" name="numsoli"
                                                            id="numsoli" placeholder="Ingrese el numero del expediente"
                                                            maxlength="25" onKeyPress="return soloNumeros(event)"
                                                            required />
                                                            <br>

                                                     
                                                


                                                </div>

                                                
                                                <br>
                                                
                                                <br>
                                                <br>
                                                <br>
                                                <br>



                                                <div class="panel-footer">
                                                    <div class="form-group">
                                                        <div class="col-md-5 col-xs-12">
                                                            <!--  Boton guardar, y guardar los datos y mandar los datos a modificar ingresados al controlador -->
                                                            <input type="submit" data-toggle="modal" data-target="#staticBackdrop1" class="btn btn-primary" name="btnSend"
                                                                value="Buscar" id="btnSend">
                                                            <!--  Boton Cancelar los datos y direccionar a la vista donde se muestran el listado de usuarios creados-->
                                                            <!--llamamos el Script que esta arriba con un onclick para que puedar realizar la validacion del mismo-->
                                                            <a href="<?php echo base_url(); ?>index.php/mantenimientomm"
                                                                type="button" class="btn btn-danger"
                                                                onclick="limpiarFormulario()">Cancelar</a>
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
                    
               
                <?php
                                                  foreach ($datosexp as $dato) {
                                                      // code...
                                                        }
                                                        ?>
  

                <div class="modal fade bs-example-modal-lg" id="staticBackdrop1">
           
                    <div class="modal-dialog modal-lg">
       
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><label>Datos del expediente</label></h4>
                            </div>
                            <div class="modal-body">
           

                                <div class="contendor_kn">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                        
                                            <form id="registrationForm" name="registrationForm" class="form-horizontal"
                                                action="updatedata" method="GET">
                                                <div class="col-md-5">

                                                    <label class="col-sm-1 control-label">NIT </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?= $dato->NIT?>" name="nit"
                                                            id="nit" placeholder="NIT" readonly>
                                                        <br>
                                                    </div>

                                                </div>

                                                <div class="col-md-7">
                                                    <label class="col-sm-2 control-label">Nombre</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nombre" <?= $dato->Nombre?>
                                                            id="nombre" value="" placeholder="Nombre" readonly>

                                                        <br>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
                                                    <br>
                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-4">


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
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#staticBackdrop2"><span
                                        class="glyphicon glyphicon-floppy-saved"></span>&nbsp;<b>Siguiente</b></button>
                                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i
                                        class="fa fa-close"></i><strong> Cerrar</strong></button>
                                      
                            </div>
                        

                        </div>
                    </div>
                  
                </div>
                


                

                <div class="modal fade bs-example-modal-lg" id="staticBackdrop2">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><label>Datos de prueba para el segundo
                                        modal</label></h4>
                            </div>
                            <div class="modal-body">
                                <div class="contendor_kn">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <form id="registrationForm" name="registrationForm" class="form-horizontal"
                                                action="updatedata" method="GET">
                                                <div class="col-md-5">

                                                    <label class="col-sm-1 control-label">NIT </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="" name="nit"
                                                            id="nit" placeholder="NIT" readonly>
                                                        <br>
                                                    </div>

                                                </div>

                                                <div class="col-md-7">
                                                    <label class="col-sm-2 control-label">Nombre</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nombre"
                                                            id="nombre" value="" placeholder="Nombre" readonly>

                                                        <br>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 col-lg-12 col-xs-12" style="text-align:center;">
                                                    <br>
                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-4">


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
                                <button type="button" class="btn btn-success"><span
                                        class="glyphicon glyphicon-floppy-saved"></span>&nbsp;<b>Guardar</b></button>
                                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i
                                        class="fa fa-close"></i><strong> Anterior</strong></button>
                            </div>
                        </div>
                    </div>
                </div>

                <nav id="mainnav-container">
                    <div class="navbar-header">
                        <a href="<?php echo base_url(); ?>" class="navbar-brand">
                            <i><img src="<?php echo base_url(); ?>/assets/img/logo1.png" width="60">
                                <font size="5" face="georgia">Menú Lab</font>
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

                                                <li><a href="<?php echo base_url(); ?>index.php/welcome"><i
                                                            class="fa fa-caret-right"></i>Pantalla De Inicio</a></li>

                                            </ul>

                                        </li>

                                        <li>

                                            <a href="#">

                                                <i class="fa fa-briefcase"></i>

                                                <span class="menu-title">Mantenimiento</span>

                                                <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">

                                                <li><a href="<?php echo base_url(); ?>index.php/mantenimientomm"><i
                                                            class="fa fa-caret-right"></i>Análisis de muestras medicas /
                                                        Clasificación / Mantenimiento</a></li>

                                                <li><a href="<?php echo base_url(); ?>index.php/IngQueja"><i
                                                            class="fa fa-caret-right"></i>Ingreso Quejas por Mal
                                                        Servicio o servicio no conforme</a></li>

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

                                                <li><a href="<?php echo base_url(); ?>index.php/users"><i
                                                            class="fa fa-caret-right"></i>Asignar nuevos Usuarios</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>index.php/userspda"><i
                                                            class="fa fa-caret-right"></i>Asignar Usuarios por pda</a>
                                                </li>



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


        <script
            src="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js">
        </script>


        <script src="<?php echo base_url(); ?>/assets/plugins/screenfull/screenfull.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/demo/tables-datatables.js"></script>

</body>

</html>