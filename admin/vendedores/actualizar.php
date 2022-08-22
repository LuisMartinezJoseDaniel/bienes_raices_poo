<?php

require '../../includes/app.php';
use App\Vendedor;



estaAutenticado();

// RETORNAR EL VALOR | FALSE
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if(!$id){
  header("Location: /admin");
}

$vendedor = Vendedor::findById($id);

$errores = Vendedor::getErrores();



if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $args = $_POST['vendedor'];
  
  $vendedor -> sincronizar($args);
  $errores = $vendedor -> validar();

  if(empty($errores)){
    $vendedor ->guardar();
  }
}


incluirTemplate('header');
?>

    <main class="contenedor">
      <h1>Actualizar Vendedor(a)</h1>

      <a href="/admin" class="boton boton-verde">
        Volver
      </a>

      <form class="formulario" method="POST">
        
        <?php include("../../includes/templates/formulario_vendedores.php") ?>

        <input type="submit" class="boton boton-verde" value="Guardar cambios">
      </form>
    </main>

<?php 
  incluirTemplate("Footer");
      