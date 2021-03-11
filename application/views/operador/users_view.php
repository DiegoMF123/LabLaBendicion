<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Importar Excel</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/preview-Claro.ico">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Bootstrap Table [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>/assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="<?php echo base_url(); ?>/assets/<?php echo base_url(); ?>/assets/css/demo/jasmine.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>/assets/plugins/pace/pace.min.js"></script>



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

                                    <div class="username hidden-xs"> <?php echo $_SESSION["username"]; ?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">
                                    <!-- User dropdown menu -->
                                    <ul class="head-list">

                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/welcome/salir"> <i class="fa fa-sign-out fa-fw"></i> Salir </a>
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
                        <h3><i class="fa fa-home"></i> Importación de documentos XLS </h3>

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
                                <h3 class="panel-title">Importación</h3>
                            </div>


																<form method='post' action='' enctype="multipart/form-data" >
																	<br>

																	<div>
																		<center><img src="<?php echo base_url(); ?>/assets/img/documento.png" width="150"  >	<h1>Seleccionar un archivo para la exportación de su documento.</h1></center>
																	</div>
																	<br>
																	<br>
																	<br>


																	<div>

																<center>
																	<input type='file' name='file' class="btn btn-info">
																	<br>
																	<br>
																	<?php
																		if(isset($response)){
																				echo $response;
																					}
																					?>




																</center>
																	<br>
																	<br>
																	<br>
																	</div>


																	<div>

																		<center><input type='submit' value='Subir Archivo' name='upload' class="btn btn-info"></center>
																		<br>
																		<br>


																	</div>

																	<div>
																	<center>	<img src="<?php echo base_url(); ?>/assets/img/subir.png" width="100" ></center>
																	</div>

																</form>

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

                            <i><img src="<?php echo base_url(); ?>/assets/img/SCL.png" width="60"> <font size="5" face="georgia">Obra Civil</font></i>
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


                                        <li> <a href="<?php echo base_url(); ?>index.php/welcome/admin"> <i class="fa fa-home"></i> <span class="menu-title"> Dashboard </span> </a> </li>


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


                                            <span class="menu-title">Normativos</span>


                                            <i class="arrow"></i>


                                            </a>


                                            <!--Submenu-->


                                            <ul class="collapse">


                                                <li><a href="<?php echo base_url(); ?>index.php/archivo"><i class="fa fa-caret-right"></i>Subir archivos</a></li>





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


                                                <li><a href="<?php echo base_url(); ?>index.php/importar"><i class="fa fa-caret-right"></i>Importar datos</a></li>


                                                <li><a href="<?php echo base_url(); ?>index.php/users/"><i class="fa fa-caret-right"></i>Usuarios</a></li>


                                                <li><a href="<?php echo base_url(); ?>index.php/tipoproyecto"><i class="fa fa-caret-right"></i>Tipos de Proyectos</a></li>


                                                <li><a href="<?php echo base_url(); ?>index.php/substatus/"><i class="fa fa-caret-right"></i>Estados</a></li>


                                                <li><a href="<?php echo base_url(); ?>index.php/asigstatus/"><i class="fa fa-caret-right"></i>Asignacion y valoracion</a></li>


                                            </ul>


                                        </li>





                                        <!--Menu list item-->



                                        <!--Menu list item-->


                                        <li>


                                            <a href="#">


                                            <i class="fa fa-edit"></i>


                                            <span class="menu-title">Reportes</span>


                                            <i class="arrow"></i>


                                            </a>


                                            <!--Submenu-->


                                            <ul class="collapse">


                                                <li><a href="<?php echo base_url(); ?>index.php/report/arealegal"><i class="fa fa-caret-right"></i> Area Legal</a></li>


                                                <li><a href="<?php echo base_url(); ?>index.php/report/permisos_municipales"><i class="fa fa-caret-right"></i> Permisos M</a></li>


                                                <li><a href="forms-components.html"><i class="fa fa-caret-right"></i> Reporte 3 </a></li>





                                            </ul>


                                        </li>


                                        <!--Menu list item-->


                                        <li>


                                            <a href="#">


                                            <i class="fa fa-envelope-o"></i>


                                            <span class="menu-title">Solicitud</span>


                                            <i class="arrow"></i>


                                            </a>


                                            <!--Submenu-->


                                            <ul class="collapse">


                                                <li><a href="<?php echo base_url(); ?>index.php/repository"><i class="fa fa-caret-right"></i>Archivos</a></li>





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


                                                                                        <li><a href="<?php echo base_url(); ?>index.php/indicadoresdos/"><i class="fa fa-caret-right"></i>Sitios Construcción y finalizado</a></li>


                                                                                        <li><a href="<?php echo base_url(); ?>index.php/indicadoresocho/"><i class="fa fa-caret-right"></i>Proyectos por estados</a></li>





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
        <script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>/assets/plugins/fast-click/fastclick.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="<?php echo base_url(); ?>/assets/js/scripts.js"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="<?php echo base_url(); ?>/assets/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="<?php echo base_url(); ?>/assets/plugins/metismenu/metismenu.min.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>/assets/plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--DataTables [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>/assets/plugins/datatables/media/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>/assets/plugins/screenfull/screenfull.js"></script>
        <!--DataTables Sample [ SAMPLE ]-->
        <script src="<?php echo base_url(); ?>/assets/js/demo/tables-datatables.js"></script>
    </body>
</html>
