<?php
  use App\Propiedad;
  require "includes/app.php";
  
  //Validar el id -> retorna value | false
  $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
  //Si es un id invalido -> redireccionar
  if(!$id){
    header("Location: /");
  }

  $propiedad = Propiedad::findById($id);

  incluirTemplate("Header", true);
?>
    <main class="contenedor seccion contenido-centrado">
      <h1><?=$propiedad -> titulo ?></h1>
      <img
        loading="lazy"
        src="/imagenes/<?=$propiedad -> imagen ?>"
        alt="Imagen de la propiedad"
      />
      <div class="resumen-propiedad">
        <p class="precio"><?=$propiedad -> precio ?></p>
        <ul class="iconos-caracteristicas">
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_wc.svg"
              alt="Icono wc"
            />
            <p><?=$propiedad -> wc ?></p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_estacionamiento.svg"
              alt="Icono estacionamiento"
            />
            <p><?=$propiedad -> estacionamiento ?></p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_dormitorio.svg"
              alt="Icono habitaciones"
            />
            <p><?=$propiedad -> habitaciones ?></p>
          </li>
        </ul>
        <p>
          <?=$propiedad -> descripcion ?>
        </p>

      </div>
    </main>

<?php 
  incluirTemplate("Footer");

