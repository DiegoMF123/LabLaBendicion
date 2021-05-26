<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Error </title>
        <link rel="shortcut icon" href="img/favicon.ico">

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
    </head>
    <body>

        <div id="container" class="cls-container">

            <div class="cls-content">
                <div class="error-full-page">
                    <!-- start: 404 -->
                    <div class="col-sm-12 page-error pad-30">
                        <div class="error-number text-primary"> ERROR </div>
                        <div class="error-details col-sm-6 col-sm-offset-3">
                            <h3> Oops! Tu usuario no tiene acceso a esta pantalla | Acceso Denegado | Error 5</h3>
                            <p> Lo sentimos!
                                <br> Si quieres tener acceso a esta pantalla necesitas tener otro tipo de usuario
                                <br> Regresa a tu pantalla principal.
                                <br>
                                <br>
                                <a href="http://192.168.0.3:8888/LabLaBendicion/index.php/welcome" class="btn btn-primary">Regresar a la pantalla principal</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/fast-click/fastclick.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    </body>
</html>
