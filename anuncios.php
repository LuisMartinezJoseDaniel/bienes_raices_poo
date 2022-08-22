<?php 
  require("includes/app.php");
  incluirTemplate("Header", true);
?>
    <main class="contenedor">
      <h2>Casas y Depas en Venta</h2>
      <?=include("./includes/templates/anuncios.php");?>
    </main>
<?php 
  incluirTemplate("Footer");
