<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Creación de nueva tipo de queja</title>
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
        <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/valqueja.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/est.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>


        <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css">


        <!-- Boton Cancelar Script, en este caso cancela los datos para ingresar en el formulario y redirecciona al listado de las tipo de qujas creadas -->
        <script>
        function limpiarFormulario() {
          document.getElementById("registrationForm").reset();
          }

        </script>

        <script type="text/javascript">

/*
  		function confirmar(){
         var respuesta = confirm("¿Está seguro de que desea guardar el tipo de queja ingresada?");


        if (respuesta == true) {
          return true;
        }
        else {
            return false;
        }

  		}*/
  	</script>



    <script type="text/javascript">

    function confirmar(){
    event.preventDefault();

        Swal.fire({
        title: '¿Está seguro de que desea guardar el tipo de queja ingresada?',
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

    </script>

    <script type="text/javascript">

    var valor = document.getElementsByName('name').value;


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

                                    <div class="username hidden-xs"><?php echo $_SESSION["nombre"]; ?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">

                                    <ul class="head-list">
                                        <li>
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
                        <h3><i class="fa fa-home"></i> Creación de un tipo de queja </h3>


                    </div>

                    <div id="page-content">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datos para el tipo de queja</h3>
                                    </div>

                                    <div class="panel">

                                        <div class="panel-body">

                                            <div class="panel-body">

                                              <!-- Se abren llaves php para poder realizar un if con codigo php, es este caso declaramos una variable
                                            llamada "response" en la cual le estamos indicando que si es == 1, nos mostrara un mensaje, en este caso
                                          si los datos se actualizan y hacen bien su proceso en el controlador Pda y en el respectivo modelo. -->
                                          <?php if ($response =="1") {
                                            echo "<div class=\"alert alert-primary fade in\" role=\"alert\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">
                                            El tipo de queja '".$rs."'-'".$des."', fue guardado correctamente
                                            </div>";
                                            } ?>
                                              <!--  Comienza formulario para agregar un nuevo tipo de queja -->
                                                <form id="registrationForm" name="formulario" class="form-horizontal" action="guardar" method="GET" onsubmit="return confirmar();">

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-xs-12 control-label">Siglas de la queja</label>
                                                        <div class="col-md-3 col-xs-12">
                                                        <input type="text" class="form-control" name="sigcor" id="sigcor" placeholder="Ejemplo: QMS" required/>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-xs-12 control-label">Descripcion del tipo de queja</label>

                                                        <div class="col-md-3 col-xs-12">
                                                            <textarea rows="3" maxlength="100" id="mensaje"  name="desc" rows="4" cols="42" placeholder="Escribe aqui tu mensaje" required></textarea>
                                                            <div id="contador">0/100</div>
                                                            <!-- Contador y limitar letras en campo -->
                                                              <script>
                                                                  const mensaje = document.getElementById('mensaje');
                                                                  const contador = document.getElementById('contador');
                                                                      mensaje.addEventListener('input', function(e) {
                                                                          const target = e.target;
                                                                          const longitudMax = target.getAttribute('maxlength');
                                                                          const longitudAct = target.value.length;
                                                                          contador.innerHTML = `${longitudAct}/${longitudMax}`;
                                                                      });
                                                              </script>
                                                        </div>

                                                    </div>


                                                    <br>


                                                    <div class="panel-footer">
                                                        <div class="form-group">
                                                            <div class="col-md-5 col-xs-12">
                                                                <!--  Boton guardar los datos y mandar los datos ingresados al controlador -->
                                                                <input  type="submit" class="btn btn-info" name="btnSend" value="Guardar" id="btnSend">
                                                                <!--  Boton Cancelar los datos y direccionar a la vista donde se muestran el listado de tipos de quejas-->
                                                                <a href="<?php echo base_url(); ?>index.php/quejasauto" type="button" class="btn btn-info" onclick="limpiarFormulario()">Cancelar</a>
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


                          <!--   llamamos la imagen que aparece en menú -->
                            <i><img src="<?php echo base_url(); ?>/assets/img/bmps.png" width="60"> <font size="5" face="georgia">Menú BMP </font></i>

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
</html>
