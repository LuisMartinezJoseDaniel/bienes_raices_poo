<?php
  //* Para acceder a la global $_SESSION es necesario iniciarlo con session_start()
  //SI NO ESTA INICIADA LA SESION
  if(!isset($_SESSION)){
    session_start();
  }

  $auth = $_SESSION['login'] ?? false;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css" />
  </head>
  <body>
    <!-- isset($variable)-> revisa si una variable esta definida -->
    <!-- la variable $inicio ya se incluye en las funciones -->
    <header class="header <?=$inicio? "inicio": ""  ?>">
      <div class="contenedor contenido-header">
        <div class="barra">
          <a href="/">
            <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices" />
          </a>
          <div class="mobile-menu">
            <img src="/build/img/barras.svg" alt="Icono menu responsive" />
          </div>
          <div class="derecha">
            <img
              src="/build/img/dark-mode.svg"
              alt="Dark mode"
              class="dark-mode-boton"
            />
            <nav class="navegacion">
              <a href="nosotros.php">Nosotros</a>
              <a href="anuncios.php">Anuncios</a>
              <a href="blog.php">Blog</a>
              <a href="contacto.php">Contacto</a>
              <!-- Si existe una sesion -->
              <?php if($auth):?>
                <a href="/cerrar-sesion.php">Cerrar Sesión</a>
              <?php else:?>
                <a href="login.php">Iniciar sesión</a>
              <?php endif?>
            </nav>
          </div>
        </div>
        <!--Cierre barra-->
          <?=$inicio? 
            "<h1>Venta de Casas y Departamentos exclusivos de Lujo</h1>"
            :""
          ?>
      </div>
    </header>
