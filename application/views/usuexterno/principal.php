<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Principal</title>
               <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/LOGO1.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

     <style media="screen">

     </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #001582;">
        <a class="navbar-brand" href="#" style="color: white">Lab La Bendicion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto my-2 my-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
                  <!--Abrimos llaves de php para poder llamar el tipo de variable session PARA llamar
                   el campo nombre que es el que se muestra en la vista, "parte superior derecha donde indica
                   el nombre del usuario que se ha logeado"-->

                Bienvenido: <div class="username hidden-xs"><?php echo $_SESSION["nombre"]; ?></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <!-- Boton que sirve para poder redireccionar a la vista del login, cuando el usuario quiera salir, en este caso la funcion esta en el controlador
                welcome y la funcion se llama salir -->
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/welcome/salir">Salir</a>
                </div>
              </li>



          </ul>


        </div>
      </nav>

    <br>
    <br>
    <br>

    <center>
    <div >
      <div class="col-md-5" aling="center">
        <div class="card">
          <img src="<?php echo base_url(); ?>/assets/img/LOGO.png" class="card-img-top" alt="..." height="200">
          <div class="card-body">
            <h5 class="card-title">Entrar al sistema del Laboratorio La Bendición</h5>
            <p class="card-text">Bienvenido:<?php $_SESSION["username"]; ?>Lugar en donde podras accesar a dar tus muestras médicas.</p>

            <!-- Boton que sirve para poder redireccionar a la vista Principal de elistado de puntos de atención activos,en el controlador welcome y la funcion admin -->
            <a href="<?php echo base_url(); ?>index.php/welcome/usuario" class="btn btn-primary btn-block btn-sm">Entrar</a>


          </div>
        </div>
      </div>
     </div>
    </center>

  <br>
<br>
<br>
<br>
<br>
<br>
<hr>

    <footer class="footer">
      <nav class="navbar navbar-light" style="background-color: #001582">

        <a class="navbar-brand" href="#" style="color: white">Creado por: Laboratorio La Bendición S.A.</a>
      </nav>
      </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>
