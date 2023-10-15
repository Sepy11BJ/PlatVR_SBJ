<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contáctenos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz@10..48&family=DM+Serif+Display&family=Lobster&family=PT+Serif:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="img/colegio.png" type="image/x-icon" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <script
      src="https://kit.fontawesome.com/d974d1dd72.js"
      crossorigin="anonymous"
    ></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
    <script src="js/navegador.js"></script>
    <script src="js/menu.js"></script>
</head>
<body>

    <!-- Cabecera -->
    <header>
      <div class="menu-bar">
        <a href="#" class="bt-menu"
          ><i class="fa-solid fa-bars"></i><img src="img/fundadorlogo.png"
        /></a>
      </div>
      <nav>
        <ul class="Nav-Menu">
          <li>
            <a href="Inicio2.php"><i class="fa-solid fa-house"></i>Inicio</a>
          </li>
          <li>
            <a href="Somos2.php"><i class="fa-regular fa-handshake"></i>Quienes somos</a>
          </li>
          <li class="logo">
            <a href="Inicio2.php"> <img src="img/fundadorlogo.png" alt="" /></a>
          </li>
          <li>
            <a href="index2.php"><i class="fa-solid fa-phone-volume"></i>Contactanos</a>
          </li>

          <li>
            <a href="Recurso2.php"
              ><i class="fa-solid fa-file-arrow-down"></i>Recurso</a
            >
          </li>

          <div class="redes">
            <li>
                <a href="/login.php"
                  ><i class="fa-solid fa-right-to-bracket"></i>Cerrar Sesion</a
                >
            </li>
          </div>
        </ul>
      </nav>
    </header>

    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>¡Contáctanos!</h2>
                <h3><br>Te invitamos a un mundo de conocimientos.<br><br>Déjanos un mensaje y te responderemos a la brevedad posible.</h3>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> colegiosjbhuarmey@gmail.com</p>
                <p><span class="fa fa-mobile"></span> 987654321</p>
            </section>
        </section>

        <form action="enviar.php" method="post" class="form_contact">
            <h1>¡CONTÁCTENOS!</h1>
            <h2><br>Envia un mensaje</h2>
            <div class="user_info">
                <label for="names">Nombres *</label>
                <input type="text" id="names" name="nombre" required>

                <label for="phone">Telefono / Celular</label>
                <input type="text" id="phone" name="telefono">

                <label for="email">Correo electronico *</label>
                <input type="text" id="email" name="correo" required>

                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" required></textarea>

                <input type="submit" value="Enviar Mensaje" id="btnSend">
            </div>
        </form>

    </section>


    <footer>
        <div class="wave" style="height: 150px; overflow: hidden">
          <svg
            viewBox="0 0 500 150"
            preserveAspectRatio="none"
            style="height: 100%; width: 100%"
          >
            <path
              d="M0.00,49.98 C125.56,260.05 325.90,-48.83 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
              style="stroke: none; fill: #ffffff"
            ></path>
          </svg>
        </div>
        <div class="contenedor-footer">
          <div class="content-foo">
            <h4>Número de telefono</h4>
            <p>983571415</p>
          </div>
          <div class="content-foo lo">
            <h4>Siguenos en</h4>
            <div class="icon whatsapp">
              <a
                href="https://api.whatsapp.com/send?phone=995502206&text=Hola!%20Estoy%20interesado%20en%20comprar%20productos%20de%20la%20categor%C3%ADa%20Ferreter%C3%ADa%20 Mate%C2%BFPodr%C3%ADas%20asistirme&#63; "
                class="btn-wsp"
                target="_blank"
              >
                <img
                  src="https://cdn-icons-png.flaticon.com/512/1384/1384023.png"
                  alt=""
                />
              </a>
            </div>
            <div class="icon youtube">
              <a
                href="https://www.instagram.com/p/CGnGnvtF5ZS/"
                class="btn-inst"
                target="_blank"
              >
                <img src="img/s4.svg" alt="" />
              </a>
            </div>
            <div class="icon face">
              <a
                href="https://youtu.be/h_XF411_E5g"
                class="btn-face"
                target="_blank"
              >
                <img
                  src="https://cdn-icons-png.flaticon.com/512/20/20673.png"
                  alt=""
                />
              </a>
            </div>
          </div>
          <div class="content-foo">
            <h4>Email</h4>
            <p>colegiosjbhuarmey@gmail.com</p>
          </div>
        </div>
  
        <h2 class="titulo-final">&copy; copyright2023 C.E.P. San Juan Bosco</h2>
      </footer>

</body>
</html>
