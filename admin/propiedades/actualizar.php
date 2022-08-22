<?php
require("../../includes/app.php");

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

  estaAutenticado();

  //* Validar el queryParameter, con un filtro
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT); 

  //si no es un id valido redireccionar
  if(!$id){
    header('Location: /admin');
  }

  //* Base de datos
  $db = conectarDB();

  //* Consultar para obtener la propiedad
  $propiedad = Propiedad::findById($id);
  
  //* Consultar para obtener los vendedores
  $vendedores = Vendedor::all();

  //* Mensajes de errores
  $errores = Propiedad::getErrores();
  

  if($_SERVER["REQUEST_METHOD"] === "POST"){
    $args = $_POST["propiedad"]; //Ver names de formulario_propiedades.php

    //Asignar los atributos
    $propiedad->sincronizar($args);
    
    $errores = $propiedad->validar();

    //Validacion subida de archivos
    $imagen = $_FILES['propiedad']['tmp_name'];//* es necesario el enctype en el form
    
    $nombreImagen = md5( uniqid( rand(), true ) ).".jpg";

    if($imagen['imagen']){//Si existe la imagen subida
      // Realiza un resize a la imagen con Intervention\Image (paquete) para evitar archivos muy pesados
      // Recuperar la imagen de $_FILES y acceder al nombre temporal -> usar el metodo fit que corta y cambia el tamaño de la img
      $img = Image::make($imagen['imagen'])->fit(800, 600); //*Archivo
      $propiedad -> setImagen($nombreImagen); //* BD-> Setear solo el nombre de la imagen
    }

    if(empty($errores)){

      //*El scope de $img es static -> por ello pese a estar en un if se puede acceder
      if(isset($img)){
        $img -> save(CARPERTA_IMAGENES . $nombreImagen);

      }
      $propiedad ->guardar();
      //Almacenar la imagen


        
    }
      


  }
  
  //*Templates
  incluirTemplate("Header");
?>
    <main class="contenedor">
      <h1>Actualizar Propiedad</h1>
      <a href="/admin" class="boton boton-verde">
        Volver
      </a>

      <!-- enctype="multipart/form-data" permite la subida de archivos -->
      <!-- Sin el action="" lo envia al mismo archivo -->
      <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include ("../../includes/templates/formulario_propiedades.php")?>
        <input type="submit" class="boton boton-verde" value="Actualizar Propiedad">
      </form>
    </main>

<?php 
  incluirTemplate("Footer");
