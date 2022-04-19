<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/Ico.ico">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

     <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/master2.css">
    <title>Login Vuelos</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form  method="GET">
            <img src="<?php echo base_url(); ?>assets/img/BMP.png" width="600" alt="">
            <br>
            <br>
            <img src="<?php echo base_url(); ?>assets/img/User.png" width="160" alt="">
            <h2 class="title">Bienvenido al sistema</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="Usuario" placeholder="Usuario" >
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="Password" placeholder="Contraseña" >
            </div>
            <input type="submit" name="Entrar" value="Entrar" class="btn solid" >


          </form>

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Bienvenido al Sistema de vuelos avioncito de papel</h3>
            <p>
              Inicia sesión
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Adelante
            </button>

          </div>

          <img src="<?php echo base_url(); ?>assets/img/register.svg" width="250" class="image" alt="" />
        </div>

      </div>
    </div>

    <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>
  </body>
</html>
