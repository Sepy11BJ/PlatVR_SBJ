<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta
    name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <title>Inicio</title>

    <link rel="shortcut icon" href="img/colegio.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz@10..48&family=DM+Serif+Display&family=Lobster&family=PT+Serif:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
   
    <script
      src="https://kit.fontawesome.com/d974d1dd72.js"
      crossorigin="anonymous"
    ></script>

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>

    <script src="js/main.js"></script>
    <script src="js/navegador.js"></script>
    <script src="js/menu.js"></script>

    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <link rel="stylesheet" href="css/Inicio.css">
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
              <a href="Inicio.php"><i class="fa-solid fa-house"></i>Inicio</a>
            </li>
            <li>
              <a href="Somos.php"><i class="fa-regular fa-handshake"></i>Quienes somos</a>
            </li>
            <li class="logo">
              <a href="Inicio.php"> <img src="img/fundadorlogo.png" alt="" /></a>
            </li>
            <li>
              <a href="index.php"><i class="fa-solid fa-phone-volume"></i>Contactanos</a>
            </li>
  
            <li>
              <a href="Recurso.php"
                ><i class="fa-solid fa-file-arrow-down"></i>Recurso</a
              >
            </li>
  
            <div class="redes">
              <li>
                  <a href="/login.php"
                    ><i class="fa-solid fa-right-to-bracket"></i>Iniciar Sesion</a
                  >
              </li>
            </div>
          </ul>
        </nav>
      </header>
  
      <div class="valores">
        <div class="details">
              <h1>Nuestros Valores</h1>
              <p>
              En el C.E.P "San Juan Bosco" potenciamos al máximo las competencias de
              los estudiantes con nuestro sistema de estudio.
              </p>
        </div>
      </div>
      
      <section class="info container">
        <div class="valor">
          <img src="img/Imagen4.png" alt="" />
          <h3>Armonia</h3>
        </div>
  
        <div class="valor">
          <img src="img/justicia2.png" alt="" />
          <h3>Justo</h3>
        </div>
  
        <div class="valor">
          <img src="img/Imagen1.png" alt="" />
          <h3>Solidario</h3>
        </div>
      </section>

    <div class="pop-up">
        <div class="pop-up-wrap">
            <div class="pop-up-title">
                <h2>¡Bienvenido a nuestra pagina!</h2>
                <p>Somos el colegio San Juan Bosco <br> ¡Que esperas ve a descargar la plataforma virtual para reforzar tus conocimientos! </p>
                <img src="img/niño.png" alt="">
            </div>
            <div class="subcription">
                <div class="line"></div>
                <i class="far fa-times-circle" id="close"></i>
                <div class="sub-content">
                    <h2>Pasos para descargar el software</h2>
                    <p> 1. Inicia sesión en nuestra pagina con tu correo institucional.</p>
                    <img src="img/sesion.png" alt="">
                    <p>2. Ve al navegador y dirigete a la opcion "Recurso".</p>
                    <img src="img/recurso.jpg" alt="">
                    <p>3.Finalmente, descargate el software e instalalo en tu dispositivo.</p>
                    <img src="img/descarga.jpg" alt="">
                </div>
                <div class="line"></div>
            </div>
        </div>
    </div>

    


    <div class="tit_noticia">
      <h1>Bosconoticias</h1>
    </div>
    <section class="cuerpo">
      <div class="container-all">
        <input type="radio" id="1" name="image-slide" hidden />
        <input type="radio" id="2" name="image-slide" hidden />
        <input type="radio" id="3" name="image-slide" hidden />
        <input type="radio" id="4" name="image-slide" hidden />
        <input type="radio" id="5" name="image-slide" hidden />
        <input type="radio" id="6" name="image-slide" hidden />

        <div class="slide">
          <div class="item-slide">
            <img src="img/noticia2.jpg" />
          </div>
          <div class="item-slide">
            <img src="img/noticia3.jpg" />
          </div>
          <div class="item-slide">
            <img src="img/noticia4.jpg" />
          </div>
          <div class="item-slide">
            <img src="img/noticia5.jpg" />
          </div>
          <div class="item-slide">
            <img src="img/noticia7.jpg" />
          </div>
          <div class="item-slide">
            <img src="img/noticia8.jpg" />
          </div>
        </div>

        <div class="pagination">
          <label class="pagination-item" for="1">
            <img src="img/noticia2.jpg" />
          </label>
          <label class="pagination-item" for="2">
            <img src="img/noticia3.jpg" />
          </label>
          <label class="pagination-item" for="3">
            <img src="img/noticia4.jpg" />
          </label>
          <label class="pagination-item" for="4">
            <img src="img/noticia5.jpg" />
          </label>
          <label class="pagination-item" for="5">
            <img src="img/noticia7.jpg" />
          </label>
          <label class="pagination-item" for="6">
            <img src="img/noticia8.jpg" />
          </label>
        </div>
      </div>
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
