<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Creacion de nueva solicitud</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/logo1.ico">

          <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
          <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">

          <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

          <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

          <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

          <link href="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet">

          <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

          <link href="<?php echo base_url(); ?>assets/css/demo/jasmine.css" rel="stylesheet">

          <link href="<?php echo base_url(); ?>assets/plugins/pace/pace.min.css" rel="stylesheet">
          <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>
          <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
          <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/validarasoitem.js"></script>
          <link href="<?php echo base_url(); ?>assets/css/est.css" rel="stylesheet">

          <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.js"></script>
          <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
          <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css">


          <script src="<?php echo base_url(); ?>assets/easyautocomplete/jquery.easy-autocomplete.min.js"></script>

  <!-- CSS file -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/easyautocomplete/easy-autocomplete.min.css">

  <!-- Additional CSS Themes file - not required-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/easyautocomplete/easy-autocomplete.themes.min.css">

    <script>
    $(document).ready(function() {
        var current = 1,
            current_step, next_step, steps;
        steps = $("fieldset").length;
        $(".next").click(function() {
            current_step = $(this).parent();
            next_step = $(this).parent().next();
            next_step.show();
            current_step.hide();
            setProgressBar(++current);
        });
        $(".previous").click(function() {
            current_step = $(this).parent();
            next_step = $(this).parent().prev();
            next_step.show();
            current_step.hide();
            setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action
        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
    });
    </script>

    <style>
    #regiration_form fieldset:not(:first-of-type) {
        display: none;
    }
    </style>


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

    <script type="text/javascript">
    function confirmar() {
        event.preventDefault();

        Swal.fire({
            title: '¿Está seguro que desea desasociar los items a la muestra?',
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






</head>

<body>
    <div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">

        <header id="navbar">
            <div id="navbar-container" class="boxed">
              <?php
                $opcion = "opcion";
               ?>

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


                                <div class="username hidden-xs"> Bienvenido: <?php echo $_SESSION["nombre"]; ?></div>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right with-arrow">


                                <ul class="head-list">

                                    <li>


                                        <a href="<?php echo base_url(); ?>index.php/welcome/salir"> <i
                                                class="fa fa-sign-out fa-fw"></i> Salir </a>

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

                                            <?php if ($response =="1") {
                             echo "<div class=\"alert alert-success fade in\" role=\"alert\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">
                                   Su desasociación se ha realizado exitosamente.
                                 </div>";
                           } ?>



                                            <!--Formulario que sirve para poder realizar la filtracion por regiones de un nuevo usuario-->
                                            <form id="regiration_form" name="formulario" action="updateasociaritemdos"
                                                method="GET" onsubmit="return confirmar()">
                                                <br>

                                                <?php
                                                  foreach ($datosmuestra as $datos) {
                                                      // code...
                                                        }
                                                        ?>
                                                <fieldset>

                                                    <div class="form-group">
                                                        <label class="col-md-1 col-xs-12 control-label">Código de muestra  </label>

                                                        <div class="col-md-3 col-xs-12">

                                                              <input type="text" class="form-control" name="codigomuestra" value="<?= $datos->idMuestra ?>"
                                                                   id="codigomuestra" placeholder=""  readonly />




                                                        </div>





                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>



                                                    <a href="<?php echo base_url(); ?>index.php/muestra"
                                                        type="button" class="btn btn-danger"
                                                        onclick="limpiarFormulario()">Cancelar</a>

                                                    <input type="button" name="next" class="next btn btn-primary"
                                                        value="Siguiente" />

                                                </fieldset>


                                                <fieldset>
                                                    <h2>Items a desasociar</h2>
                                                    <br>
                                                    <div class="form-group">


                                                      <div class="col-md-3 col-xs-12">
                                                        <label><input type="checkbox" id="cbox1" name="cbox1" value="5" > Microbiotico</label><br>
                                                      </div>


                                                    </div>

                                                    <div class="form-group">


                                                      <div class="col-md-3 col-xs-12">
                                                        <label><input type="checkbox" id="cbox2"  name="cbox2" value="5"> Trigliceridos-diabetes-embarazo</label><br>
                                                      </div>


                                                    </div>

                                                    <div class="form-group">


                                                      <div class="col-md-3 col-xs-12">
                                                        <label><input type="checkbox" id="cbox3"  name="cbox3" value="5">Test de dogras-Test de enfermedades renal </label><br>
                                                      </div>

                                                    </div>

                                                    <div class="form-group">

                                                      <div class="col-md-3 col-xs-12">
                                                        <label><input type="checkbox" id="cbox4"  name="cbox4" value="5">Bacteriana </label><br>
                                                      </div>

                                                    </div>

                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>


                                                    <br>
                                                    <br>
                                                    <input type="button" name="previous"
                                                        class="previous btn btn-warning" value="Regresar" />

                                                    <input type="submit" name="btnSend" id="btnSend"
                                                        class="submit btn btn-success" value="Guardar" />
                                                </fieldset>
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

        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

          <script src="<?php echo base_url(); ?>assets/plugins/fast-click/fastclick.min.js"></script>

          <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

          <script src="<?php echo base_url(); ?>assets/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>

          <script src="<?php echo base_url(); ?>assets/plugins/metismenu/metismenu.min.js"></script>

          <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>

          <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

          <script src="<?php echo base_url(); ?>assets/plugins/screenfull/screenfull.js"></script>
</body>

</html>
