<?php

//* define -> constante en PHP 
//* __DIR__ -> toma el directorio actual del SO -> desde C://laragon ...
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ .'funciones.php');
define('CARPERTA_IMAGENES', __DIR__ .'/../imagenes/');



//* $inicio -> se recupera en el template de header
function incluirTemplate(string $nombreTemplate, bool $inicio = false){
  
  //* TEMPLATES_URL -> llamar a una constante de app.php
  include TEMPLATES_URL .  "/{$nombreTemplate}.php"; 
}

//* Auth

function estaAutenticado () : void {
  session_start();//Iniciar la sesion
  if(!$_SESSION['login']){
    header( "Location: /"); // Redireccionar si no esta presente la variable de login
  }
  // header("Location: /admin");
  // return isset($_SESSION['login']);//retornar login -> debe ser un bool
}
// Funcion para debuguear objetos y arreglos
function debuguear( $item ) : void {
  echo "<pre>";
  var_dump($item);
  echo "</pre>";
  exit;
}

//Escapar/Sanitizar el html
function sanitizar (string $html): string{
  return htmlspecialchars($html);
}

// Validar tipo de contenido para borrar de la base de datos
function validarTipoContenido($tipo){
  $tipos = ['vendedor', 'propiedad'];
  return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo){
  $mensaje = '';
  switch ($codigo) {
    case 1:
      $mensaje  = "Creado correctamente";
      break;
    case 2:
      $mensaje  = "Actualizado correctamente";
      break;
    case 3:
      $mensaje  = "Eliminado correctamente";
      break;
    
    default:
      $mensaje  = false;
      break;
  }

  return $mensaje;
}