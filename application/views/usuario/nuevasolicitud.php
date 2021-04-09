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
          <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/validards.js"></script>
          <link href="<?php echo base_url(); ?>assets/css/est.css" rel="stylesheet">


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
            title: '¿Está seguro que desea crear la solictud?',
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
                                   Su solicitud ha sido creada exitosamente, su número de solicitud es: '".$ids."'.
                                 </div>";
                           } ?>



                                            <!--Formulario que sirve para poder realizar la filtracion por regiones de un nuevo usuario-->
                                            <form id="regiration_form" name="formulario" action="guardar"
                                                method="GET" onsubmit="return confirmar()">
                                                <fieldset>

                                                    <div class="form-group">
                                                        <label class="col-md-1 col-xs-12 control-label">Tipo
                                                            solicitante</label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <select class="form-control" name="tiposoli" id="tiposoli"
                                                                required />
                                                                <option value="" hidden selected>Seleccione una opción
                                                                </option>
                                                                <?php if($tiposolicitante): foreach ($tiposolicitante as $tiposolicitante):   ?>



                                                                <option
                                                                    value="<?=$tiposolicitante->idTipoSolicitante  ?>">
                                                                    <?= $tiposolicitante->Abreviaturats ?>
                                                                    <?= $tiposolicitante->Tiposolicitante ?></option>

                                                                <?php     endforeach; endif; ?>
                                                            </select>

                                                        </div>

                                                        <label class="col-md-1 col-xs-12 control-label">Número de
                                                            Factura</label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <input type="text" class="form-control" name="numfac"
                                                                id="numfac"
                                                                placeholder="Ingrese el numero de la factura"
                                                                required />
                                                        </div>
                                                        <label class="col-md-1 col-xs-12 control-label">Tipo
                                                            solicitud</label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <select class="form-control" name="tiposolid" id="tiposolid"
                                                                required />
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
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <label
                                                                class="col-md-1 col-xs-12 control-label">Descripción</label>

                                                            <div class="col-md-3 col-xs-12">
                                                                <textarea rows="4" maxlength="200" id="mensaje"
                                                                    name="desc" rows="4" cols="107"
                                                                    placeholder="Escribe aqui tu descripcion, debe contener al menos 10 caracteres para que pueda ser valida. "
                                                                    required/></textarea>
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
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <label class="col-md-1 col-xs-12 control-label">No de
                                                                solicitud</label>
                                                            <div class="col-md-3 col-xs-12">

                                                                <input type="text" class="form-control" name="numsoli"
                                                                    id="function-data" id="numsoli"
                                                                    placeholder="Ingrese el numero del expediente"
                                                                    maxlength="25"
                                                                    onKeyPress="return soloNumeros(event)" required />
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <script type="text/javascript">
                                                    var options = {

                                            <?php
                                            //  echo "url: 'http://192.168.1.9:8888/BancoMiPistio/index.php/userspda/dpi',".$nombredetuvariable;
                                            ?>

                                            url: "http://192.168.0.7:8888/LabLaBendicion/index.php/mantenimientomm/expediente",
                                            getValue: "Correlativo",
                                            list: {
                                              onSelectItemEvent: function() {
                                                var value = $("#function-data").getSelectedItemData().Nit;
                                                $("#data-holder").val(value).trigger("change");
                                                var value = $("#function-data").getSelectedItemData().Nombre;
                                                $("#data-holder2").val(value).trigger("change");

                                              }
                                            }
                                          };
                                          $("#function-data").easyAutocomplete(options);

                                                    </script>

                                                    <a href="<?php echo base_url(); ?>index.php/mantenimientomm"
                                                        type="button" class="btn btn-danger"
                                                        onclick="limpiarFormulario()">Cancelar</a>

                                                    <input type="button" name="next" class="next btn btn-primary"
                                                        value="Buscar" />

                                                </fieldset>

                                                <fieldset>
                                                    <h2>Busqueda del expediente</h2>
                                                    <br>
                                                    <div class="form-group">

                                                        <div class="form-group">

                                                          <label class="col-md-1 col-xs-12 control-label">Nit
                                                              </label>
                                                          <div class="col-md-3 col-xs-12">

                                                              <input type="text" class="form-control" name="nombre" id="data-holder"  value="" readonly/>
                                                              <br>

                                                          </div>



                                                            <label
                                                                class="col-md-2 col-xs-12 control-label">Nombre</label>
                                                            <div class="col-md-3 col-xs-12">
                                                                <input type="text" class="form-control" name="Nombre" id="data-holder2"
                                                                    value="" placeholder=""
                                                                    readonly />
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <input type="button" name="previous"
                                                        class="previous btn btn-warning" value="Regresar" />

                                                    <input type="button" name="next" class="next btn btn-primary"
                                                        value="Siguiente" />
                                                </fieldset>
                                                <fieldset>
                                                    <h2>Soporte y contacto</h2>
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="col-md-1 col-xs-12 control-label">Tipo
                                                            de soporte</label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <select class="form-control" name="tiposoporte"
                                                                id="tiposoporte" required/>

                                                                <option value="" hidden selected>Seleccione una opción
                                                                </option>
                                                                <?php foreach ($tiposoporte as $tiposoporte) {
                                                                    // code...
                                                                    ?>

                                                                <option value="<?=$tiposoporte->idTipoSoporte  ?>">
                                                                    <?= $tiposoporte->Abreviatura ?>
                                                                    <?= $tiposoporte->Nombrets ?></option>

                                                                <?php    } ?>



                                                            </select>

                                                        </div>
                                                        <label class="col-md-1 col-xs-12 control-label">Número de
                                                            soporte</label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <input type="text" class="form-control" name="numsoporte"
                                                                id="numsoporte"
                                                                placeholder="Ingrese el numero de soporte" required />
                                                        </div>
                                                        <label class="col-md-1 col-xs-12 control-label">
                                                            Teléfono</label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <input type="text" class="form-control" name="telefono"
                                                                id="telefono"
                                                                placeholder="Ingrese un numero de teléfono" required />

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="col-md-1 col-xs-12 control-label">E-mail
                                                        </label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Ingrese su email" required />
                                                        </div>

                                                    </div>
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

                                                <li><a href=""><i class="fa fa-caret-right"></i>Prueba</a></li>

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

                                                <li><a href=""><i class="fa fa-caret-right"></i>Prueba</a></li>
                                                <li><a href=""><i class="fa fa-caret-right"></i>Prueba</a></li>



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
