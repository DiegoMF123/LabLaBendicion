<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuarios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Usuario.</title>
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

        <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">

        <!--Switchery [ OPTIONAL ]-->

        <link href="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet">

        <!--Bootstrap Select [ OPTIONAL ]-->

        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

        <!--Bootstrap Table [ OPTIONAL ]-->

        <link href="<?php echo base_url(); ?>assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!--Demo [ DEMONSTRATION ]-->
         <link href="<?php echo base_url(); ?>assets/css/demo/jquery-steps.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="<?php echo base_url(); ?>assets/css/demo/jasmine.css" rel="stylesheet">


        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



        <!--SCRIPT-->

        <!--=================================================-->

        <!--Page Load Progress Bar [ OPTIONAL ]-->

        <link href="<?php echo base_url(); ?>assets/plugins/pace/pace.min.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>

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
                    <h3><i class="fa fa-home"></i>Usuarios</h3>
                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                   <div class="row">
                     <div class="col-md-1">

                     </div>
                     <div class="col-md-10">
                       <div class="panel">
                           <div class="panel-heading">
                               <h3 class="panel-title">Listado de usuarios del sistema</h3>
                           </div>
                           <div class="panel-body">
                             <div class="btn-group">
                                <a href="<?php echo base_url(); ?>index.php/users/nuevo" class="btn btn-default"><i class="fa fa-plus"> Nuevo</i></a>





                             </div>
                             <br>
                             <br>
                             <table  class="table table-striped table-bordered">
                                 <thead>
                                     <tr>
                                         <th>Region</th>
                                         <th>Punto de atención</th>
                                         <th>Usuario</th>
                                         <th class="min-tablet">Departamento</th>
                                         <th>Rol</th>
                                         <th>E-mail</th>

                                     </tr>
                                 </thead>
                                 <tbody>

                                     <tr>
                                        <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                        <td></td>
                                        <td></td>
                                         <td>
                                           <div class="btn-group">
                                               <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-default"><i class="fa fa-edit"></i></a>



                                           </div>
                                         </td>
                                     </tr>

                                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ingreso de datos</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <form class="" action="guardar" method="get">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">ID</label>
                                                            <input type="text" name="id" class="form-control" readonly>
                                                        </div>


                                                    </div>
                                                    <br>
                                                     <div class="row">

                                                        <div class="col-md-6">

                                                          <label for="">Nombre</label>
                                                            <input type="text" class="form-control" name="nombre" required>


                                                        </div>
                                                        <div class="col-md-6">

                                                          <label for="">Nombre</label>
                                                            <input type="text" class="form-control" name="apellido" required>


                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                          <label for="">Nombre de usuario</label>

                                                             <input type="text" class="form-control" name="username" required>


                                                      </div>
                                                      <div class="col-md-6">
                                                          <label for="">Password</label>
                                                          <input type="password" class="form-control" name="password" required>
                                                      </div>
                                                    </div>
                                                    <br>
                                                     <div class="row">
                                                      <div class="col-md-6">
                                                          <label for="">Dpi</label>

                                                             <input type="text" class="form-control" name="dpi" required>


                                                      </div>
                                                      <div class="col-md-6">
                                                          <label for="">Correo</label>
                                                          <input type="email" class="form-control" name="email" required>
                                                      </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Seleccione tipo de usuario</label>
                                                             <select class="form-control" name="tipo">

                                                        <option value="">Ejemplo</option>
                                                        <option value="">Ejemplo</option>
                                                        <option value="">Ejemplo</option>
                                                        <option value="">Ejemplo</option>



                                                        </select>
                                                           </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-4">

                                                        </div>
                                                        <div class="col-md-4">

                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="submit" value="Guardar" class="btn btn-primary btn-block btn-sm">


                                                        </div>
                                                         <div class="col-md-0">


                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>

                                                </form>
                                              </div>

                                            </div>
                                          </div>
                                        </div>


                                 </tbody>
                             </table>

                           </div>
                         </div>

                   </div>

                    <div class="col-md-1">

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
                    <a href="" class="navbar-brand">

                          <i><img src="<?php echo base_url(); ?>assets/img/SCL.png" width="60"> <font size="5" face="georgia">Menú BMP</font></i>
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

                                        <li class="list-header">Navegacion</li>

                                        <!--Menu list item-->

                                        <li> <a href="<?php echo base_url(); ?>index.php/welcome/admin"> <i class="fa fa-home"></i> <span class="menu-title"> Inicio </span> </a> </li>

                                        <!--Category name-->

                                        <li class="list-header">Prueba</li>

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

                                                 <li><a href="<?php echo base_url(); ?>index.php/users/"><i class="fa fa-caret-right"></i>Usuarios</a></li>

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

                                                                                  <span class="menu-title">Indicadores</span>

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
            <div class="hide-fixed pull-right pad-rgt">Actualmente v1.0</div>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <p class="pad-lft">&#0169; 2020 Sistema Quejas "Banco mi pistio S.A"</p>
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
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/metismenu/metismenu.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-steps/jquery-steps.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Bootstrap Wizard [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/masked-input/bootstrap-inputmask.min.js"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <!--Bootbox Modals [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>assets/plugins/screenfull/screenfull.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="<?php echo base_url(); ?>assets/js/demo/ui-modals.js"></script>
  </body>
</html>
