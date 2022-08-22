<?php 
  require("../../includes/funciones.php");
  //Iniciar la sesion del login
  $auth = estaAutenticado();
  //Si no esta autenticaado redireccionar
  if(!$auth) {
    header('Location: /');
  }
  incluirTemplate("Header");
?>
    <main class="contenedor">
      <h1>Borrar</h1>
    </main>

<?php 
  incluirTemplate("Footer");
