<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Editar usuario</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/Ico.ico">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->

               <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="<?php echo base_url(); ?>assets/css/demo/jasmine.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>assets/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>


        <script type="text/javascript" >
                        function comprobar() {
                                var Usuario = document.registrationForm.Usuario.value;
                                var cofirmarusername = document.registrationForm.cofirmarusername.value;

                                if (Usuario != cofirmarusername) {
                                        document.getElementById("mensaje").innerHTML = "El usuario no coincide";
                                } else {
                                        document.getElementById("mensaje").innerHTML = "El usuario coincide";
                                }
                        }
                </script>

                <script type="text/javascript" >
                                function comprobacion() {
                                        var Contraseña = document.registrationForm.Contraseña.value;
                                        var confirmarpassword = document.registrationForm.confirmarpassword.value;

                                        if (Contraseña != confirmarpassword) {
                                                document.getElementById("mensaje2").innerHTML = "La contraseña no coincide";
                                        } else {
                                                document.getElementById("mensaje2").innerHTML = "La contraseña coincide";
                                        }
                                }
                        </script>

                        <script>
                        function limpiarFormulario() {
                          document.getElementById("registrationForm").reset();
                          }
                        </script>





    </head>
    <body>
        <div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">
            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
              <div id="navbar-container" class="boxed">
                  <!--Navbar Dropdown-->
                  <!--================================-->
                  <div class="navbar-content clearfix">
                      <ul class="nav navbar-top-links pull-left">
                          <!--Navigation toogle button-->
                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                          <li class="tgl-menu-btn">
                              <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                          </li>
                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                          <!--End Navigation toogle button-->
                          <!--Messages Dropdown-->
                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                          <!--End message dropdown-->
                          <!--Notification dropdown-->
                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                          <!--End notifications dropdown-->
                      </ul>
                      <ul class="nav navbar-top-links pull-right">
                          <!--Profile toogle button-->
                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                          <li class="hidden-xs" id="toggleFullscreen">
                              <a class="fa fa-expand" data-toggle="fullscreen" href="#" role="button">
                              <span class="sr-only">Toggle fullscreen</span>
                              </a>
                          </li>
                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                          <!--End Profile toogle button-->
                          <!--User dropdown-->
                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                          <li id="dropdown-user" class="dropdown">
                              <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">

                                  <div class="username hidden-xs"><?php echo $_SESSION["username"]; ?></div>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right with-arrow">
                                  <!-- User dropdown menu -->
                                  <ul class="head-list">
                                      <li>
                                          <a href="<?php echo base_url(); ?>index.php/welcome/salir"> <i class="fa fa-user fa-fw fa-lg"></i> Salir</a>
                                      </li>

                                  </ul>
                              </div>
                          </li>
                          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                          <!--End user dropdown-->
                      </ul>
                  </div>
                  <!--================================-->
                  <!--End Navbar Dropdown-->
              </div>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-home"></i> Creación de nuevos usuarios </h3>

                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                       <div class="row">
                             <div class="col-md-12">

                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos del nuevo usuario</h3>
                            </div>
                            <div class="panel-body">
                              <form id="registrationForm" name="registrationForm" class="form-horizontal" action="guardar" method="GET">




                                            <div class="form-group">
                                                <label class="col-md-2 col-xs-12  control-label">Region</label>
                                                <div class="col-md-5 col-xs-12 ">
                                                  <select class="form-control" name="region" id="region" onchange="selectpda()">
                                               <?php foreach ($tiporegion as $tiporegion) {
                                                 // code...
                                               ?>
                                                 <option value="<?=$tiporegion->idRegion  ?>"><?= $tiporegion->region ?></option>


                                           <?php    } ?>
                                           </select>

                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2  col-xs-12 control-label">Listado PDA Activos</label>
                                                <div class="col-md-5 col-xs-12">
                                                  <select class="form-control" name="pda">
                                               <?php foreach ($puntosda as $puntosda) {
                                                 // code...
                                               ?>
                                                 <option value="<?=$puntosda->IDPuntos_De_Atencion  ?>"><?= $puntosda->Nombre_Punto ?></option>


                                           <?php    } ?>
                                           </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 col-xs-12 control-label">Dpi</label>
                                                <div class="col-md-5 col-xs-12">
                                                    <input type="text" class="form-control" name="dpi" id="dpi" placeholder="Ingrese Dpi" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 col-xs-12 control-label">Nombre</label>
                                                <div class="col-md-5 col-xs-12">
                                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Alex plosivo" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 col-xs-12 control-label">Correo</label>
                                                <div class="col-md-5 col-xs-12">

                                                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese Correo" required/>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 col-xs-12 control-label">Cargo</label>
                                                <div class="col-md-5 col-xs-12">
                                                  <select class="form-control" name="cargo">
                                                <?php foreach ($tipocargos as $tipocargos) {
                                                 // code...
                                                ?>
                                                 <option value="<?=$tipocargos->idCargos  ?>"><?= $tipocargos->Nombre_Cargo ?></option>


                                                <?php    } ?>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 col-xs-12 control-label">Usuario</label>
                                                <div class="col-md-5 col-xs-12">

                                                    <input type="text" class="form-control" name="Usuario" id="Usuario" placeholder="Ingrese Usuario" required/>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 col-xs-12 control-label">Contraseña</label>
                                                <div class="col-md-5 col-xs-12">

                                                    <input type="password" class="form-control" name="Contraseña" id="Contraseña" placeholder="Ingrese Contraseña" required/>

                                                </div>
                                            </div>





                                        <div class="panel-heading">
                                            <h3 class="panel-title">Validación para el nuevo usuario</h3>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div >
                                                    <label >
                                                   Vuelva a escribir el usuario y contraseña para validarlos
                                                  </label>

                                                </div>
                                                <br>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 col-xs-12 control-label">Nombre de Usuario</label>
                                            <div class="col-md-3 col-xs-12">
                                                <input type="text" class="form-control" name="cofirmarusername" id="cofirmarusername" placeholder="Usuario" required onkeyup="comprobar();"/><div id="mensaje"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 col-xs-12 control-label">Contraseña</label>
                                            <div class="col-md-3 col-xs-12">
                                                <input type="password" class="form-control" name="confirmarpassword" id="confirmarpassword" placeholder="Contraseña" required onkeyup="comprobacion();"/><div id="mensaje2"></div>
                                            </div>
                                        </div>


<br>
										<div class="panel-footer">
                                            <div class="form-group">
                                                <div class="col-md-5 col-xs-12">
                                                    <input  type="submit" class="btn btn-info" name="btnSend" value="Guardar" id="btnSend">
                                                    <a href="<?php echo base_url(); ?>index.php/users" type="button" class="btn btn-info" class="btn btn-primary" onclick="limpiarFormulario()" value="Cancelar">Cancelar</a>

                                                </div>
                                            </div>
										</div>
                                    </form>
                              <br>


                            </div>
                        </div>
					</div>
				</div>

                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <!--MAIN NAVIGATION-->
                <!--===================================================-->
                 <nav id="mainnav-container">

                    <!--Brand logo & name-->

                    <!--================================-->

                    <div class="navbar-header">

                        <a href="<?php echo base_url(); ?>" class="navbar-brand">



                            <i><img src="<?php echo base_url(); ?>/assets/img/SCL.png" width="60"> <font size="5" face="georgia">Menú BMP</font></i>

                        </a>

                    </div>

                    <!--================================-->

                    <!--End brand logo & name-->

                    <div id="mainnav">

                        <!--Menu-->

                        <!--================================-->

                        <div id="mainnav-menu-wrap">

                            <div class="nano">

                                <div class="nano-content">

                                    <ul id="mainnav-menu" class="list-group">

                                        <!--Category name-->

                                        <li class="list-header">Navegación</li>

                                        <!--Menu list item-->

                                        <li> <a href="<?php echo base_url(); ?>index.php/welcome/admin"> <i class="fa fa-home"></i> <span class="menu-title"> Inicio </span> </a> </li>

                                        <!--Category name-->

                                        <li class="list-header">Opciones</li>

                                        <li>

                                            <a href="#">

                                            <i class="fa fa-table"></i>

                                            <span class="menu-title">Principal</span>

                                            <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">

                                                <li><a href="<?php echo base_url(); ?>index.php/welcome"><i class="fa fa-caret-right"></i>Pantalla Principal</a></li>



                                            </ul>

                                        </li>

                                        <li>

                                            <a href="#">

                                            <i class="fa fa-briefcase"></i>

                                            <span class="menu-title">Prueba</span>

                                            <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">

                                                <li><a href=""><i class="fa fa-caret-right"></i>Prueba</a></li>



                                            </ul>

                                        </li>

                                        <!--Menu list item-->

                                        <li>

                                            <a href="#">

                                            <i class="fa fa-briefcase"></i>

                                            <span class="menu-title">Configuración</span>

                                            <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">


                                                <li><a href="<?php echo base_url(); ?>index.php/users"><i class="fa fa-caret-right"></i>Usuarios</a></li>
                                                <li><a href=""><i class="fa fa-caret-right"></i>Prueba</a></li>


                                            </ul>

                                        </li>



                                        <!--Menu list item-->


                                        <!--Menu list item-->

                                        <li>

                                            <a href="#">

                                            <i class="fa fa-edit"></i>

                                            <span class="menu-title">Prueba</span>

                                            <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">

                                                <li><a href=""><i class="fa fa-caret-right"></i>Prueba</a></li>


                                            </ul>

                                        </li>

                                        <!--Menu list item-->

                                        <li>

                                            <a href="#">

                                            <i class="fa fa-envelope-o"></i>

                                            <span class="menu-title">Prueba</span>

                                            <i class="arrow"></i>

                                            </a>

                                            <!--Submenu-->

                                            <ul class="collapse">

                                                <li><a href=""><i class="fa fa-caret-right"></i>Prueba</a></li>



                                            </ul>

                                        </li>





                                                                                <li>

                                                                                  <a href="#">

                                                                                  <i class="fa fa-briefcase"></i>

                                                                                  <span class="menu-title">Prueba</span>

                                                                                  <i class="arrow"></i>

                                                                                  </a>

                                                                                    <!--Submenu-->

                                                                                    <ul class="collapse">

                                                                                        <li><a href=""><i class="fa fa-caret-right"></i>Prueba</a></li>

                                                                                        <li><a href=""><i class="fa fa-caret-right"></i>Prueba</a></li>




                                                                                    </ul>

                                                                                </li>








                                    </ul>

                                    <!--Widget-->

                                    <!--================================-->



                                    <!--================================-->

                                    <!--End widget-->

                                </div>

                            </div>

                        </div>

                        <!--================================-->

                        <!--End menu-->

                    </div>

                </nav>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
            </div>
            <!-- FOOTER -->
            <!--===================================================-->
            <footer id="footer">
                <!-- Visible when footer positions are fixed -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
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
                <!-- Visible when footer positions are static -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="hide-fixed pull-right pad-rgt">Currently v2.2</div>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <p class="pad-lft">&#0169; 2015 Your Company</p>
            </footer>
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->


            <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/fast-click/fastclick.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/metismenu/metismenu.min.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/screenfull/screenfull.js"></script>
    </body>
</html>
