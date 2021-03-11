<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Puntos de atención</title>
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


        <style type="text/css">

        table{
          background-color: #EAEDED;
          border: 5px solid black;
          width: 100%;

        }

        </style>

        <script type="text/javascript">


// Solo permite ingresar numeros.

        function soloNumeros(e){
	       var key = window.Event ? e.which : e.keyCode
	         return (key >= 48 && key <= 57)

         }
      </script>
      <style media="screen">
          a {
              /* Disabled link styles */
          }
          a:link, a:visited { /* or a[href] */
              /* Enabled link styles */
          }
          .isDisabled {

              pointer-events: none;
          }
          .isDisabled {
              color: currentColor;
              cursor: not-allowed;
              opacity: 0.5;
              text-decoration: none;
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

                                 <div class="username hidden-xs"> Bienvenido: <?php echo $_SESSION["nombre"]; ?></div>
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



                 </div>


             </div>

         </header>



         <div class="boxed">



             <div id="content-container">

                 <div class="pageheader hidden-xs">

                     <h3><i class="fa fa-home"></i> Inicio </h3>





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

                             <h3 class="panel-title">Bienvenido Usuario Operador</h3>

                         </div>

                        <br>

                      <center>  <img src="<?php echo base_url(); ?>/assets/img/bmp.png" width="1000"></center>

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



                           <i><img src="<?php echo base_url(); ?>/assets/img/bmps.png" width="60"> <font size="5" face="georgia">Menú BMP </font></i>



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

                                             <li><a href="<?php echo base_url(); ?>index.php/welcome/"><i class="fa fa-caret-right"></i>Pantalla Principal</a></li>



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

             <div class="hide-fixed pull-right pad-rgt">Actualmente v1.0</div>

             <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

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
