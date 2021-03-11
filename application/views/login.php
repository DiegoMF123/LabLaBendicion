<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login LabLaBendicion</title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/logo1.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="<?php echo base_url(); ?>assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?php echo base_url(); ?>assets/img/logo3.1.png">
		</div>
		<div class="login-content">

			<form method="get">

				<img src="<?php echo base_url(); ?>assets/img/avatar.svg">
				<h2 class="title">Bienvenido</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
           		   		<input type="text" class="input" name="Usuario">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" class="input" name="Password">
            	   </div>
            	</div>
            	<a href="#">Restaurar Contraseña</a>
            	<input type="submit" class="btn" value="Entrar" name="Entrar">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>
