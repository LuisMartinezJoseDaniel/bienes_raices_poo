<?php

require '../../includes/app.php';
use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor();

$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $vendedor =  new Vendedor($_POST['vendedor']);

  //Validar que no haya campos vacios;
  $errores = $vendedor ->validar();

  if(empty($errores)){
    $vendedor -> guardar();
    
  }

  
}


incluirTemplate('header');
?>

    <main class="contenedor">
      <h1>Registrar Vendedor(a)</h1>

      <a href="/admin" class="boton boton-verde">
        Volver
      </a>

      <form class="formulario" method="POST" action="/admin/vendedores/crear.php">
        
        <?php include("../../includes/templates/formulario_vendedores.php") ?>

        <input type="submit" class="boton boton-verde" value="Registrar Vendedor">
      </form>
    </main>

<?php 
  incluirTemplate("Footer");
      