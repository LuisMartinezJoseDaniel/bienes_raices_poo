<?php
  use App\Propiedad;
  //* Revisar la ruta, con ayuda de la superglobal SERVER
  if($_SERVER['SCRIPT_NAME'] === "/anuncios.php"){
    $propiedades = Propiedad::all();
  }else{
    //get -> similar a all(),pero con limite
    $propiedades = Propiedad::get(3);
  }
?>      

<div class="contenedor-anuncios">
  <?php foreach($propiedades as $propiedad):?>
        <div class="anuncio">
          <img src="/imagenes/<?=$propiedad -> imagen?>" alt="anuncio de <?=$propiedad -> titulo?>">

          <div class="contenido-anuncio">
            <h3><?=$propiedad -> titulo?></h3>
            <p><?=$propiedad -> descripcion?></p>
            <p class="precio">$<?=$propiedad -> precio?></p>
            <ul class="iconos-caracteristicas">
              <li>
                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                <p><?=$propiedad -> wc?></p>
              </li>
              <li>
                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                <p><?=$propiedad -> estacionamiento?></p>
              </li>
              <li>
                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
                <p><?=$propiedad -> habitaciones?></p>
              </li>
            </ul>
            <a href="anuncio.php?id=<?=$propiedad -> id?>" class="boton-amarillo-block">
              Ver Propiedad
            </a>
          </div><!--.contenido-anuncio-->
        </div><!--.anuncio-->
  <?php endforeach; ?>
</div><!--.contenedor-anuncio-->

