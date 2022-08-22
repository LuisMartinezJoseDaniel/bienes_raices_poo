<?php
 
  require("../../includes/app.php");
  //Namespaces\clase
  use App\Propiedad;
  use App\Vendedor;
  use Intervention\Image\ImageManagerStatic as Image;
  
  
  //Iniciar la sesion del login
  estaAutenticado();
  

  //* Consultar para obtener los vendedores
  $vendedores = Vendedor::all();

  //* mensajes de errores
  $errores = Propiedad::getErrores();
  //* Mantener mensajes anteriores-> añadir value a los input

  
  //* Super Globales
  //* $_GET -> leer datos de el form en la URL
  //* $_POST -> ARRAY DE DATOS-> obtiene los datos del form.
  //* $_SERVER -> Contiene informacion del servidor-> ARRAY con toda la informacion
  //* $_FILES -> Contiene informacion de los archivos en un ARRAY
  $propiedad = new Propiedad(); 
  
  if($_SERVER["REQUEST_METHOD"] === "POST"){
    //Crear el objeto con el arreglo de la superglobal
    //tambien se utiliza para los valores anteriores
    $propiedad = new Propiedad($_POST['propiedad']); 
    
    
    /** Subida de archivos */
    //ver el name de imagen en formulario_propidades.php
    $imagen = $_FILES['propiedad']['tmp_name'];//* es necesario el enctype en el form

    // Generar un nombre unico por cada imagen subida
    // md5-> hash ( idUnico(de un numero random))
    $nombreImagen = md5( uniqid( rand(), true ) ).".jpg";

    if($imagen['imagen']){//Si existe la imagen subida
      // Realiza un resize a la imagen con Intervention\Image (paquete) para evitar archivos muy pesados
      // Recuperar la imagen de $_FILES y acceder al nombre temporal -> usar el metodo fit que corta y cambia el tamaño de la img
      $img = Image::make($imagen['imagen'])->fit(800, 600); //*Archivo
      $propiedad -> setImagen($nombreImagen); //* BD-> Setear solo el nombre de la imagen
    }
    // Despues de hacer el fit() de la img
    $errores = $propiedad->validar();
    

    if(empty($errores)){
        

        // Crear si no exite el directorio-> CARPETA_IMAGENES -> definida en funciones como constante
        if(!is_dir(CARPERTA_IMAGENES)){
          mkdir(CARPERTA_IMAGENES);
        }
        //*Guardar el archivo en el servidor
        //*El scope de $img es static -> por ello pese a estar en un if se puede acceder

        $img -> save(CARPERTA_IMAGENES . $propiedad->imagen);//*Guardar la imagen en el directorio especificado
        
        $propiedad -> guardar();


    }
      


  }
  
  //*Templates
  
  incluirTemplate("Header");
?>
    <main class="contenedor">
      <h1>Crear</h1>
      <a href="/admin" class="boton boton-verde">
        Volver
      </a>

      <!-- enctype="multipart/form-data" permite la subida de archivos -->
      <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        
        <?php include("../../includes/templates/formulario_propiedades.php") ?>

        <input type="submit" class="boton boton-verde" value="Crear Propiedad">
      </form>
    </main>

<?php 
  incluirTemplate("Footer");
      