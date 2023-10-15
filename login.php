<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="shortcut icon" href="https://tresplazas.com/web/img/big_punto_de_venta.png">
   <title>Inicio de sesión</title>

</head>

<body>
   <img class="wave" src="img/wave.png">
   <div class="container">
      <div class="img">
         <img src="img/LogoCole.png" alt="Logo">
      </div>
      <div class="login-content">
         <form method="post" action="">
            <img src="img/avatar.svg" alt="Avatar">
            <h2 class="title">BIENVENID@</h2>

            <?php
            include "modelo/conexion.php";
            include "controlador/controlador_login.php";
            ?>

            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5>Usuario</h5>
                  <input id="usuario" type="text" class="input" name="usuario">
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>Contraseña</h5>
                  <input type="password" id="input" class="input" name="password">
               </div>
            </div>
            <div class="view">
               <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>

            <div class="text-center">
               <a class="font-italic isai5" href="controlador/controlador_recuperacion.php">Olvidé mi contraseña</a>
            </div>
            <input name="btningresar" class="btn" type="submit" value="INICIAR SESIÓN">
         </form>
      </div>
   </div>
   
   <!-- Botón para ir a la página principal -->
   <a href="Pagina\Inicio.php" class="btn btn-secondary btn-custom">Ir a la página principal</a>

   <script src="js/fontawesome.js" defer></script>
   <script src="js/main.js" defer></script>
   <script src="js/main2.js" defer></script>
   <script src="js/jquery.min.js" defer></script>
   <script src="js/bootstrap.js" defer></script>
   <script src="js/bootstrap.bundle.js" defer></script>
</body>

</html>